<?php

class C_hasil extends CI_Controller
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
        $config['base_url'] = base_url() . 'index.php/produksi/C_hasil/index/';
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

    public function hitung($id = null)
    {

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
            $a = $this->input->post('K1');
            $b = $this->input->post('K2');
            $c = $this->input->post('K3');
            $d = $this->input->post('K4');
            $e = $this->input->post('PE');
            $f = $this->input->post('KO');
            $g = $this->input->post('K7');
            $extra["extra"][0] = $this->M_pengetahuan->hitung($a, $b, $c); // bulu tangkis
            $extra["extra"][1] = $this->M_pengetahuan->hitung($a, $b, $d); // futsal
            $extra["extra"][2] = $this->M_pengetahuan->hitung($e, $b, $c); // modern dance
            $extra["extra"][3] = $this->M_pengetahuan->hitung($d, $b, $c); // tapak suci
            $extra["extra"][4] = $this->M_pengetahuan->hitung($d, $e, $c); // tari
            $extra["extra"][5] = $this->M_pengetahuan->hitung($e, $a, $c); // paskibra
            $extra["extra"][6] = $this->M_pengetahuan->hitung($d, $f, $b); // film
            $extra["extra"][7] = $this->M_pengetahuan->hitung($e, $f, $b); // seni musik
            $extra["extra"][8] = $this->M_pengetahuan->hitung($d, $e, $b); // pemrograman
            $extra["extra"][9] = $this->M_pengetahuan->hitung($g, $d, $e); // hizbul wathan
            $extra["extra"][10] = $this->M_pengetahuan->hitung($f, $d, $e); // KIR
            $extra["extra"][11] = $this->M_pengetahuan->hitung($f, $b, $a); // PMR
            $extra["extra"][12] = $this->M_pengetahuan->hitung($g, $e, $b); // Qiroa'ah
            return $this->load->view('cobacoba', $extra);
        }

    }

    public function simpan_produksi()
    {

        $product = $this->M_produksi;
        $roti = $this->M_roti;
        $product->saveH();

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
        redirect(site_url("pengetahuan/c_pengetahuan/"));
    }

    public function lihat($tgl = null)
    {

        $data['detail_produksi'] = $this->M_produksi->hal($tgl);

        $this->load->view('produksi/list_produksi', $data);

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