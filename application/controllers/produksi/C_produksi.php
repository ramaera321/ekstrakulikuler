<?php

class C_produksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('produksi/M_produksi');
        $this->load->model('pengetahuan/M_pengetahuan');
        $this->load->model('roti/M_roti');
        $this->load->model('M_login');
        $this->load->helper(array('url'));
        if ($this->session->userdata('logged_in') !== true) {
            redirect('login');
        }
    }

    public function index()
    {

        $jumlah_data = $this->M_produksi->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/produksi/C_produksi/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);

        $data['produksi'] = $this->M_produksi->page($config['per_page'], $from);

        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('produksi/list_tanggal_produksi', $data);
    }

    public function hitung($id)
    {
        // $inputan = $this->input->post();

        // var_dump($id);
        // die;

        $product = $this->M_produksi;
        $roti = $this->M_roti;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules_hitung());
        $validation->set_message('required', '%s silahkan di isi dahulu');

        if ($validation->run() == false) {

            $data["detail_pengetahuan"] = $product->idEdit($id);
            $data["roti"] = $roti->tampil();
            if (!$data["detail_pengetahuan"]) {
                show_404();
            }

            $this->load->view("pengetahuan/hitung", $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
        } else {
            $a = $this->input->post('K1'); // Kemampuan Olahraga
            $b = $this->input->post('K2'); // Hasil Tes Minat
            $c = $this->input->post('K3'); // Fisik
            $d = $this->input->post('K4'); // Kemampuan Dasar
            $e = $this->input->post('K5'); // Pengalaman Ekstra
            $f = $this->input->post('K6'); // Kemampuan Organisasi 
            $g = $this->input->post('K7'); // Kemampuan membaca alquran tajwid
            $ekstra["ekstra"][0] = $this->M_pengetahuan->hitung1($a, $b, $c); // bulu tangkis
            $ekstra["ekstra"][1] = $this->M_pengetahuan->hitung($a, $b, $d); // futsal
            $ekstra["ekstra"][2] = $this->M_pengetahuan->hitung1($e, $b, $c); // modern dance
            $ekstra["ekstra"][3] = $this->M_pengetahuan->hitung1($d, $b, $c); // tapak suci
            $ekstra["ekstra"][4] = $this->M_pengetahuan->hitung1($d, $e, $c); // tari
            $ekstra["ekstra"][5] = $this->M_pengetahuan->hitung1($e, $a, $c); // paskibra
            $ekstra["ekstra"][6] = $this->M_pengetahuan->hitung($d, $f, $b); // film
            $ekstra["ekstra"][7] = $this->M_pengetahuan->hitung($e, $f, $b); // seni musik
            $ekstra["ekstra"][8] = $this->M_pengetahuan->hitung($d, $e, $b); // pemrograman
            $ekstra["ekstra"][9] = $this->M_pengetahuan->hitung($b, $d, $f); // hizbul wathan
            $ekstra["ekstra"][10] = $this->M_pengetahuan->hitung($f, $d, $e); // KIR
            $ekstra["ekstra"][11] = $this->M_pengetahuan->hitung($f, $b, $a); // PMR
            $ekstra["ekstra"][12] = $this->M_pengetahuan->hitung($g, $e, $b); // Qiroa'ah
            $ekstra["ekstra"][13] = $this->M_pengetahuan->hitung2($a, $b, $c, $d); // 8 kriteria 1
            $ekstra["ekstra"][14] = $this->M_pengetahuan->hitung2($a, $b, $c, $f); // 8 kriteria 2
            $ekstra["id"][0] = $id;
            // echo "<pre>";
            // print_r($a . '/');
            // print_r($b . '/');
            // print_r($c . '/');
            // print_r($d . '/');
            // print_r($e . '/');
            // print_r($f . '/');
            // print_r($g . '/');
            // die();
            return $this->load->view('cobacoba', $ekstra);
        }
    }

    public function saveData()
    {
        $inputan = $this->input->post();

        var_dump($inputan);
    }

    public function simpan_produksi()
    {

        $product = $this->M_produksi;
        $roti = $this->M_roti;
        $product->saveH();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
        redirect(site_url("pengetahuan/c_pengetahuan/"));
    }

    public function save()
    {

        $data['save'] = $this->M_produksi;
        $data['save']->savedata();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
        return $this->load->view('cobacoba1', $data);
    }




    public function lihat($tgl = null)
    {

        $data['detail_produksi'] = $this->M_produksi->hal($tgl);

        $this->load->view('produksi/list_produksi', $data);
    }

    public function detail($id)
    {
        $data = $this->M_produksi->detailhal($id);

        $a = $data[0]->K1; // Kemampuan Olahraga
        $b = $data[0]->K2; // Hasil Tes Minat
        $c = $data[0]->K3; // Fisik
        $d = $data[0]->K4; // Kemampuan Dasar
        $e = $data[0]->K5; // Pengalaman Ekstra
        $f = $data[0]->K6; // Kemampuan Organisasi 
        $g = $data[0]->K7; // Kemampuan membaca alquran tajwid
        $ekstra["ekstra"][0] = $this->M_pengetahuan->hitung1($a, $b, $c); // bulu tangkis
        $ekstra["ekstra"][1] = $this->M_pengetahuan->hitung($a, $b, $d); // futsal
        $ekstra["ekstra"][2] = $this->M_pengetahuan->hitung1($e, $b, $c); // modern dance
        $ekstra["ekstra"][3] = $this->M_pengetahuan->hitung1($d, $b, $c); // tapak suci
        $ekstra["ekstra"][4] = $this->M_pengetahuan->hitung1($d, $e, $c); // tari
        $ekstra["ekstra"][5] = $this->M_pengetahuan->hitung1($e, $a, $c); // paskibra
        $ekstra["ekstra"][6] = $this->M_pengetahuan->hitung($d, $f, $b); // film
        $ekstra["ekstra"][7] = $this->M_pengetahuan->hitung($e, $f, $b); // seni musik
        $ekstra["ekstra"][8] = $this->M_pengetahuan->hitung($d, $e, $b); // pemrograman
        $ekstra["ekstra"][9] = $this->M_pengetahuan->hitung($b, $d, $f); // hizbul wathan
        $ekstra["ekstra"][10] = $this->M_pengetahuan->hitung($f, $d, $e); // KIR
        $ekstra["ekstra"][11] = $this->M_pengetahuan->hitung($f, $b, $a); // PMR
        $ekstra["ekstra"][12] = $this->M_pengetahuan->hitung($g, $e, $b); // Qiroa'ah
        $ekstra["ekstra"][13] = $this->M_pengetahuan->hitung2($a, $b, $c, $d); // 8 kriteria 1
        $ekstra["ekstra"][14] = $this->M_pengetahuan->hitung2($a, $b, $c, $f); // 8 kriteria 2
        $ekstra["id"][0] = $data[0]->Id_ekstra;
        $ekstra["tanggal"] = $data[0]->Tanggal_Produksi;
        // echo "<pre>";
        // print_r($data);
        // die();
        return $this->load->view('cobacoba1', $ekstra);
    }

    public function cetak($tgl = null)
    {
        $data['detail_produksi'] = $this->M_produksi->hal($tgl);

        $this->load->view('produksi/print', $data);
    }

    public function hapus($id = null)
    {

        if (!isset($id)) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi gagal dihapus</div>');
            redirect(site_url('produksi/C_produksi'));
        } elseif ($this->M_produksi->hapus($id)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi berhasil dihapus</div>');
            redirect(site_url('produksi/C_produksi'));
        }
    }
}
