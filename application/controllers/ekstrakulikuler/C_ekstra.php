<?php

class C_ekstra extends CI_Controller
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

    public function hitung($id_user_user_user_user_user_user_user = null)
    {

        $product = $this->M_produksi;
        $roti = $this->M_roti;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules_hitung());
        $validation->set_message('required', '%s silahkan di isi dahulu');

        if ($validation->run() == false) {

            $data["detail_pengetahuan"] = $product->idEdit($id_user);
            $data["roti"] = $roti->tampil();
            if (!$data["detail_pengetahuan"]) {
                show_404();
            }

            $this->load->view("pengetahuan/hitung", $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');

        } else {
          $hasill = $this->M_pengetahuan->abc();
          $nomer = 0;
          foreach ($hasill as $w):
          

            $post = $this->input->post();
            //  $this->Id_ekstra = $post["id"];
            $id_p = $this->input->post('id_p');

            $K1_min = $w->K1_cukup;
            $K1_max = $w->K1_baik;
            $K2_min = $w->K2_cukup;
            $K2_max = $w->K2_baik;
            $K4_min = $w->K4_cukup;
            $K4_max = $w->K4_baik;
            $nilai_ekstra_min = $w->nilai_ekstra_cukup;
            $nilai_ekstra_max = $w->nilai_ekstra_baik;

            $tgl_p = $this->input->post('tgl_p');
            $K1 = $this->input->post('K1');
            $K2 = $this->input->post('K2');
            $K4 = $this->input->post('K4');

//rumus derajat K1

            if ($K1 > $K1_min && $K1 < $K1_max) {
                $Koh = $K1_max - $K1_min;
                if ($Koh <= 0) {
                    $Koh = 1;
                }

                $K1C = ($K1_max - $K1) / $Koh;
                $K1Cu = round($K1C, PHP_ROUND_HALF_DOWN);
            } elseif ($K1 <= $K1_min) {
                $K1Cu = 1;
            } elseif ($K1 >= $K1_max) {
                $K1Cu = 0;
            }

            if ($K1 > $K1_min && $K1 < $K1_max) {
                $Koh = $K1_max - $K1_min;
                if ($Koh <= 0) {
                    $Koh = 1;
                }

                $K1B = ($K1 - $K1_min) / $Koh;
                $K1Ba = round($K1B, PHP_ROUND_HALF_DOWN);

            } elseif ($K1 <= $K1_min) {
                $K1Ba = 0;
            } elseif ($K1 >= $K1_max) {
                $K1Ba = 1;
            }

//rumus derajat K2

            if ($K2 > $K2_min && $K2 < $K2_max) {
                $Htm = $K2_max - $K2_min;
                if ($Htm <= 0) {
                    $Htm = 1;
                }

                $K2C = ($K2_max - $K2) / $Htm;
                $K2Cu = round($K2C, PHP_ROUND_HALF_DOWN);
            } elseif ($K2 <= $K2_min) {
                $K2Cu = 1;
            } elseif ($K2 >= $K2_max) {
                $K2Cu = 0;
            }

            if ($K2 > $K2_min && $K2 < $K2_max) {
                $Htm = $K2_max - $K2_min;
                if ($Htm <= 0) {
                    $Htm = 1;
                }

                $K2B = ($K2 - $K2_min) / $Htm;
                $K2Ba = round($K2B, PHP_ROUND_HALF_DOWN);
            } elseif ($K2 <= $K2_min) {
                $K2Ba = 0;
            } elseif ($K2 >= $K2_max) {
                $K2Ba = 1;
            }

//rumus derajat K4

            if ($K4 > $K4_min && $K4 < $K4_max) {
                $Tng = $K4_max - $K4_min;
                if ($Tng <= 0) {
                    $Tng = 1;
                }

                $K4C = ($K4_max - $K4) / $Tng;
                $K4Cu = round($K4C, PHP_ROUND_HALF_DOWN);
            } elseif ($K4 <= $K4_min) {
                $K4Cu = 1;
            } elseif ($K4 >= $K4_max) {
                $K4Cu = 0;
            }

            if ($K4 > $K4_min && $K4 < $K4_max) {
                $Tng = $K4_max - $K4_min;
                if ($Tng <= 0) {
                    $Tng = 1;
                }

                $K4B = ($K4 - $K4_min) / $Tng;
                $K4Ba = round($K4B, PHP_ROUND_HALF_DOWN);
            } elseif ($K4 <= $K4_min) {
                $K4Ba = 0;
            } elseif ($K4 >= $K4_max) {
                $K4Ba = 1;
            }

//nilai a predikat 1
            $a1 = min($K1Ba, $K2Ba, $K4Ba);
//K1 naik K2 banyak K4 kerja banyak produksi bertambah
            $z1 = ($a1 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 2
            $a2 = min($K1Ba, $K2Ba, $K4Cu);
//K1 naik K2 banyak K4 kerja sedikit produksi berkurang
            $z2 = ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 3
            $a3 = min($K1Ba, $K2Cu, $K4Ba);
//K1 naik K2 sedikit K4 kerja banyak produksi bertambah
            $z3 = ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 4
            $a4 = min($K1Ba, $K2Cu, $K4Cu);
//K1 naik K2 sedikit K4 kerja sedikit produksi bertambah
            $z4 = $nilai_ekstra_max - ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 5
            $a5 = min($K1Cu, $K2Ba, $K4Ba);
//K1 turun K2 banyak K4 kerja banyak produksi berkurang
            $z5 = ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 6
            $a6 = min($K1Cu, $K2Ba, $K4Cu);
//K1 turun K2 banyak K4 kerja sedikit produksi berkurang
            $z6 = $nilai_ekstra_max - ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 7
            $a7 = min($K1Cu, $K2Cu, $K4Ba);
//K1 turun K2 sedikit K4 kerja banyak produksi bertambah
            $z7 = $nilai_ekstra_max - ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 8
            $a8 = min($K1Cu, $K2Cu, $K4Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z8 = $nilai_ekstra_max - ($a8 * ($nilai_ekstra_max - $nilai_ekstra_min));

// Nilai z total
            $a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8;
            if ($a <= 0) {
                $a = 1;
            }

            $z = (($a1 * $z1)
                 + ($a2 * $z2)
                 + ($a3 * $z3)
                 + ($a4 * $z4)
                 + ($a5 * $z5)
                 + ($a6 * $z6)
                 + ($a7 * $z7)
                 + ($a8 * $z8)) / $a;

            $data2 = array(
                // 'Koh_min'=>$K1_min,
                // 'Koh_max'=>$K1_max,
                // 'Htm_min'=>$K2_min,
                // 'Htm_max'=>$K2_max,
                // 'K4_min'=>$K4_min,
                // 'K4_max'=>$K4_max,
                'Id' => $id_user,
                'tgl_p' => $tgl_p,
                'nilai_ekstra_min' => $nilai_ekstra_min,
                'nilai_ekstra_max' => $nilai_ekstra_max,
                'K1' => $K1,
                'K2' => $K2,
                'K4' => $K4,
                'K1Cu' => $K1Cu,
                'K1Ba' => $K1Ba,
                'K2Cu' => $K2Cu,

                'K2Ba' => $K2Ba,
                'K4Cu' => $K4Cu,

                'K4Ba' => $K4Ba,

                'a1' => $a1,
                'z1' => $z1,
                'a2' => $a2,
                'z2' => $z2,
                'a3' => $a3,
                'z3' => $z3,
                'a4' => $a4,
                'z4' => $z4,
                'a5' => $a5,
                'z5' => $z5,
                'a6' => $a6,
                'z6' => $z6,
                'a7' => $a7,
                'z7' => $z7,
                'a8' => $a8,
                'z8' => $z8,

                'a' => $a,
                'z' => $z,

            );

            // $product->saveH();
            // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
            // redirect(site_url("pengetahuan/c_pengetahuan/"));

            // $this->load->view("pengetahuan/proses_hitung", $data);
            $data['hasilz'][$nomer] = $z;
            $data['id_perhitungan'][$nomer] = $w->Id_perhitungan;
            $nomer++;
          endforeach;
            return $this->load->view('cobacoba1', $data);

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

    public function hapus($id_user = null)
    {

        if (!isset($id)) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi gagal dihapus</div>');
            redirect(site_url('produksi/C_produksi'));
        } elseif ($this->M_produksi->hapus($id_user)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi berhasil dihapus</div>');
            redirect(site_url('produksi/C_produksi'));
        }
    }

}
