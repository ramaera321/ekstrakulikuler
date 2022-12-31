<?php

class C_ekstra2 extends CI_Controller
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

            $this->load->view("pengetahuan/hitung1", $data);
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
            $K3_min = $w->K3_cukup;
            $K3_max = $w->K3_baik;
            $nilai_ekstra_min = $w->nilai_ekstra_cukup;
            $nilai_ekstra_max = $w->nilai_ekstra_baik;

            $tgl_p = $this->input->post('tgl_p');
            $K1 = $this->input->post('K1');
            $K2 = $this->input->post('K2');
            $K4 = $this->input->post('K4');
            $K3 = $this->input->post('K3');

//rumus derajat K1

            if ($K1 > $K1_min && $K1 < $K1_max) {
                $K1 = $K1_max - $K1_min;
                if ($K1 <= 0) {
                    $K1 = 1;
                }

                $K1C = ($K1_max - $K1) / $K1;
                $K1Cu = round($K1C, PHP_ROUND_HALF_DOWN);
            } elseif ($K1 <= $K1_min) {
                $K1Cu = 1;
            } elseif ($K1 >= $K1_max) {
                $K1Cu = 0;
            }

            if ($K1 > $K1_min && $K1 < $K1_max) {
                $K1 = $K1_max - $K1_min;
                if ($K1 <= 0) {
                    $K1 = 1;
                }

                $K1B = ($K1 - $K1_min) / $K1;
                $K1Ba = round($K1B, PHP_ROUND_HALF_DOWN);

            } elseif ($K1 <= $K1_min) {
                $K1Ba = 0;
            } elseif ($K1 >= $K1_max) {
                $K1Ba = 1;
            }

//rumus derajat K2

            if ($K2 > $K2_min && $K2 < $K2_max) {
                $K2 = $K2_max - $K2_min;
                if ($K2 <= 0) {
                    $K2 = 1;
                }

                $K2C = ($K2_max - $K2) / $K2;
                $K2Cu = round($K2C, PHP_ROUND_HALF_DOWN);
            } elseif ($K2 <= $K2_min) {
                $K2Cu = 1;
            } elseif ($K2 >= $K2_max) {
                $K2Cu = 0;
            }

            if ($K2 > $K2_min && $K2 < $K2_max) {
                $K2 = $K2_max - $K2_min;
                if ($K2 <= 0) {
                    $K2 = 1;
                }

                $K2B = ($K2 - $K2_min) / $K2;
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

//rumus derajat K3

            if ($K3 > $K3_min && $K3 < $K3_max) {
                $K3 = $K3_max - $K3_min;
                if ($K3 <= 0) {
                    $K3 = 1;
                }

                $K3C = ($K3_max - $K3) / $K3;
                $K3Cu = round($K3C, PHP_ROUND_HALF_DOWN);
            } elseif ($K3 <= $K3_min) {
                $K3Cu = 1;
            } elseif ($K3 >= $K3_max) {
                $K3Cu = 0;
            }

            if ($K3 > $K3_min && $K3 < $K3_max) {
                $K3 = $K3_max - $K3_min;
                if ($K3 <= 0) {
                    $K3 = 1;
                }

                $K3B = ($K3 - $K3_min) / $K3;
                $K3_Ba = round($K3B, PHP_ROUND_HALF_DOWN);

            } elseif ($K3 <= $K3_min) {
                $K3Ba = 0;
            } elseif ($K3 >= $K3_max) {
                $K3Ba = 1;
            }

//nilai a predikat 1
            $a1 = min($K1Ba, $K2Ba, $K4Ba, $K3Ba);
//K1 naik K2 banyak K4 kerja banyak produksi bertambah
            $z1 = ($a1 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 2
            $a2 = min($K1Ba, $K2Ba, $K4Ba, $K3Cu);
//K1 naik K2 banyak K4 kerja banyak produksi bertambah
            $z2 = ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 3
            $a3 = min($K1Ba, $K2Ba, $K4Cu, $K3Cu);
//K1 naik K2 banyak K4 kerja sedikit produksi berkurang
            $z3 = $nilai_ekstra_max - ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 4
            $a4 = min($K1Ba, $K2Cu, $K4Cu, $K3Cu);
//K1 naik K2 sedikit K4 kerja sedikit produksi berkurang
            $z4 = $nilai_ekstra_max - ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 5
            $a5 = min($K1Ba, $K2Cu, $K4Ba, $K3Ba);
//K1 naik K2 sedikit K4 kerja banyak produksi bertambah
            $z5 = ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 6
            $a6 = min($K1Ba, $K2Ba, $K4Cu, $K3Ba);
//K1 turun K2 banyak K4 kerja banyak produksi bertambah
            $z6 = ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 7
            $a7 = min($K1Ba, $K2Cu, $K4Cu, $K3Ba);
//K1 turun K2 banyak K4 kerja sedikit produksi berkurang
            $z7 = $nilai_ekstra_max - ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 8
            $a8 = min($K1Ba, $K2Cu, $K4Ba, $K3Cu);
//K1 turun K2 sedikit K4 kerja banyak produksi bertambah
            $z8 = $nilai_ekstra_max - ($a8 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 9
            $a9 = min($K1Cu, $K2Cu, $K4Cu, $K3Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z9 = $nilai_ekstra_max - ($a9 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 10
            $a10 = min($K1Cu, $K2Cu, $K4Cu, $K3Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z10 = $nilai_ekstra_max - ($a10 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 11
            $a11 = min($K1Cu, $K2Cu, $K4Ba, $K3Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z11 = $nilai_ekstra_max - ($a11 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 12
            $a12 = min($K1Cu, $K2Ba, $K4Ba, $K3Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi bertambah
            $z12 = ($a12 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 13
            $a13 = min($K1Cu, $K2Ba, $K4Cu, $K3Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z13 = $nilai_ekstra_max - ($a13 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 14
            $a14 = min($K1Cu, $K2Cu, $K4Ba, $K3Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z14 = $nilai_ekstra_max - ($a14 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 15
            $a15 = min($K1Cu, $K2Ba, $K4Ba, $K3Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z15 = $nilai_ekstra_max - ($a15 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 16
            $a16 = min($K1Cu, $K2Ba, $K4Cu, $K3Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z16 = $nilai_ekstra_max - ($a16 * ($nilai_ekstra_max - $nilai_ekstra_min));

// Nilai z total
            $a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10 + $a11 + $a12 + $a13 + $a14 + $a15 + $a16;
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
                 + ($a8 * $z8) 
                 + ($a9 * $z9)
                 + ($a10 * $z10)
                 + ($a11 * $z11)
                 + ($a12 * $z12)
                 + ($a13 * $z13)
                 + ($a14 * $z14)
                 + ($a15 * $z15)
                 + ($a16 * $z16)) / $a;

            $data2 = array(
                // 'Koh_min'=>$K1_min,
                // 'Koh_max'=>$K1_max,
                // 'Htm_min'=>$K2_min,
                // 'Htm_max'=>$K2_max,
                // 'K4_min'=>$K4_min,
                // 'K4_max'=>$K4_max,
                'Id' => $id,
                'tgl_p' => $tgl_p,
                'nilai_ekstra_min' => $nilai_ekstra_min,
                'nilai_ekstra_max' => $nilai_ekstra_max,
                'K1' => $K1,
                'K2' => $K2,
                'K4' => $K4,
                'KohCu' => $K1Cu,
                'KohBa' => $K1Ba,
                'HtmCu' => $K2Cu,
                'HtmBa' => $K2Ba,
                'K4Cu' => $K4Cu,
                'K4Ba' => $K4Ba,
                'K3Cu' => $K3Cu,
                'K3Ba' => $K3Ba,

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
                'a9' => $a9,
                'z9' => $z9,
                'a10' => $a10,
                'z10' => $z10,
                'a11' => $a11,
                'z11' => $z11,
                'a12' => $a12,
                'z12' => $z12,
                'a13' => $a13,
                'z13' => $z13,
                'a14' => $a14,
                'z14' => $z14,
                'a15' => $a15,
                'z15' => $z15,
                'a16' => $a16,
                'z16' => $z16,

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
