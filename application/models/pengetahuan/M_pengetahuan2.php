<?php

/**
 *
 */
class M_pengetahuan2 extends CI_Model
{
    private $_table = "perhitungan";
    //   private $_pro="produksi";

    public function rules_pengetahuan()
    {

        return [
            ['field' => 'Id_ekstra',
                'label' => 'Nama Ekstra',
                'rules' => 'required'],

                ['field' => 'Username',
                'label' => 'Username',
                'rules' => 'required'],

            ['field' => 'tanggal',
                'label' => 'Tanggal/Bulan/Tahun',
                'rules' => 'required'],

            ['field' => 'K1_min',
                'label' => 'K1 Minimal',
                'rules' => 'required'],

            ['field' => 'K1_max',
                'label' => 'K1 Maksimal',
                'rules' => 'required'],

            ['field' => 'K2_min',
                'label' => 'K2 Minimal',
                'rules' => 'required'],

            ['field' => 'K2_max',
                'label' => 'K2 Maksimal',
                'rules' => 'required'],

            ['field' => 'K3_min',
                'label' => 'K3 Minimal',
                'rules' => 'required'],

            ['field' => 'K3_max',
                'label' => 'K3 Maksimal',
                'rules' => 'required'],

            ['field' => 'K4_min',
                'label' => 'K4 Minimal',
                'rules' => 'required'],

            ['field' => 'K4_max',
                'label' => 'K4 Maksimal',
                'rules' => 'required'],

            ['field' => 'K5_min',
                'label' => 'K5 Minimal',
                'rules' => 'required'],

            ['field' => 'K5_max',
                'label' => 'K5 Maksimal',
                'rules' => 'required'],

            ['field' => 'K6_min',
                'label' => 'K6 Minimal',
                'rules' => 'required'],

            ['field' => 'K6_max',
                'label' => 'K6 Maksimal',
                'rules' => 'required'],

            ['field' => 'K7_min',
                'label' => 'K7 Minimal',
                'rules' => 'required'],

            ['field' => 'K7_max',
                'label' => 'K7 Maksimal',
                'rules' => 'required'],

            ['field' => 'nilai_ekstra_min',
                'label' => 'Produksi Minimal',
                'rules' => 'required'],

            ['field' => 'nilai_ekstra_max',
                'label' => 'Produksi Maksimal',
                'rules' => 'required'],

            ['field' => 'nilai_ekstra_min',
                'label' => 'Produksi Minimal',
                'rules' => 'required'],

            ['field' => 'nilai_ekstra_max',
                'label' => 'Produksi Maksimal',
                'rules' => 'required'],
        ];

    }

    public function page($number, $offset)
    {
        // return $this->db->get($this->_table,$number,$offset)->result();
        $this->db->select('perhitungan.tanggal, count(perhitungan.tanggal) as total');
//$this->db->from('perhitungan');
        $this->db->group_by('perhitungan.tanggal');
        $this->db->order_by('perhitungan.tanggal', 'desc');
        //$query = $this->db->get($this->_table,$number,$offset);

        return $this->db->get($this->_table, $number, $offset)->result();
/*if($query->num_rows()>0)
{
return $query->result();
}
 */
    }

    public function jumlah_data()
    {
        $this->db->select('perhitungan.tanggal, count(perhitungan.tanggal) as total');
//$this->db->from('perhitungan');
        $this->db->group_by('perhitungan.tanggal');
        //$query = $this->db->get($this->_table);
        $this->db->order_by('perhitungan.tanggal', 'desc');
        return $this->db->get($this->_table)->num_rows();

        //return $this->db->get($this->_table)->num_rows();
    }

    public function hal($tgl)
    {
        // $this->session->set_userdata($sesdata)
        $Id = $this->session->userdata['logged_in']['Id'];
        $this->db->select('*');
        $this->db->from('nama_ekstra');
        $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
        $this->db->where('tanggal', $tgl);
        $this->db->order_by('perhitungan.tanggal', 'desc');
        return $this->db->get()->result();
    }

    public function hal1()
    {
        // $this->session->set_userdata($sesdata)
            $Id = $this->session->userdata['logged_in']['Id']; // dapatkan id user yg login
            $this->db->select('Id, Username');
            $this->db->where('Username', $Id);//
            $this->db->from('user');
            $query = $this->db->get();
            return $query->result();
          
    }

    public function hitung($v1, $v2, $v3)
    {
        $post = $this->input->post();
        $id_p = $this->input->post('id_p');

        $K1_min = 60;
        $K1_max = 100;
        $K2_min = 60;
        $K2_max = 100;
        $K3_min = 150;
        $K3_max = 180;
        $K4_min = 60;
        $K4_max = 100;
        $nilai_ekstra_min = 0;
        $nilai_ekstra_max = 100;

        $tgl_p = $this->input->post('tgl_p');
        $K1 = $v1;
        $K2 = $v2;
        $K3 = $v3;

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

//rumus derajat K3 kerja

        if ($K3 > $K3_min && $K3 < $K3_max) {
            $Tng = $K3_max - $K3_min;
            if ($Tng <= 0) {
                $Tng = 1;
            }

            $K3C = ($K3_max - $K3) / $Tng;
            $K3Cu = round($K3C, PHP_ROUND_HALF_DOWN);
        } elseif ($K3 <= $K3_min) {
            $K3Cu = 1;
        } elseif ($K3 >= $K3_max) {
            $K3Cu = 0;
        }

        if ($K3 > $K3_min && $K3 < $K3_max) {
            $Tng = $K3_max - $K3_min;
            if ($Tng <= 0) {
                $Tng = 1;
            }

            $K3B = ($K3 - $K3_min) / $Tng;
            $K3Ba = round($K3B, PHP_ROUND_HALF_DOWN);
        } elseif ($K3 <= $K3_min) {
            $K3Ba = 0;
        } elseif ($K3 >= $K3_max) {
            $K3Ba = 1;
        }

//nilai a predikat 1
        $a1 = min($K1Ba, $K2Ba, $K3Ba);
//K1 naik K2 banyak K3 kerja banyak produksi bertambah
        $z1 = ($a1 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 2
        $a2 = min($K1Ba, $K2Ba, $K3Cu);
//K1 naik K2 banyak K3 kerja sedikit produksi berkurang
        $z2 = $nilai_ekstra_max - ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 3
        $a3 = min($K1Ba, $K2Cu, $K3Ba);
//K1 naik K2 sedikit K3 kerja banyak produksi bertambah
        $z3 = ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 4
        $a4 = min($K1Ba, $K2Cu, $K3Cu);
//K1 naik K2 sedikit K3 kerja sedikit produksi bertambah
        $z4 = ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 5
        $a5 = min($K1Cu, $K2Ba, $K3Ba);
//K1 turun K2 banyak K3 kerja banyak produksi berkurang
        $z5 = $nilai_ekstra_max - ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 6
        $a6 = min($K1Cu, $K2Ba, $K3Cu);
//K1 turun K2 banyak K3 kerja sedikit produksi berkurang
        $z6 = $nilai_ekstra_max - ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 7
        $a7 = min($K1Cu, $K2Cu, $K3Ba);
//K1 turun K2 sedikit K3 kerja banyak produksi bertambah
        $z7 = ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 8
        $a8 = min($K1Cu, $K2Cu, $K3Cu);
//K1 turun K2 sedikit K3 kerja sedikit produksi berkurang
        $z8 = $nilai_ekstra_max - ($a8 * ($nilai_ekstra_max - $nilai_ekstra_min));

// Nilai z total
        $a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8;
        if ($a <= 0) {
            $a = 1;
        }

        return $z = (($a1 * $z1)
             + ($a2 * $z2)
             + ($a3 * $z3)
             + ($a4 * $z4)
             + ($a5 * $z5)
             + ($a6 * $z6)
             + ($a7 * $z7)
             + ($a8 * $z8)) / $a;
    }

    public function hitung2($v1,$v2,$v3,$v4)
    {
            $post = $this->input->post();
            //  $this->Id_ekstra = $post["id"];
            $id_p = $this->input->post('id_p');

            $K1_min = 60;
            $K1_max = 100;
            $K2_min = 60;
            $K2_max = 100;
            $K3_min = 150;
            $K3_max = 180;
            $K4_min = 60;
            $K4_max = 100;
            $nilai_ekstra_min = 0;
            $nilai_ekstra_max = 100;

            $tgl_p = $this->input->post('tgl_p');
            $K1 = $v1;
            $K2 = $v2;
            $K4 = $v4;
            $K3 = $v3;

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

            return $z = (($a1 * $z1)
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
    }

    public function idEdit($id)
    {
        $this->db->select('*');
        $this->db->from('nama_ekstra');
        $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
        $this->db->where('perhitungan.Id_perhitungan', $id);
        return $this->db->get()->result();

    }

    public function saveP()
    {
        $post = $this->input->post();
        //  $this->Id_ekstra = $post["id"];

        $this->Id_ekstra = $post["Id_ekstra"];
        $this->tanggal = date('Y/m/d', strtotime($post["tanggal"]));
        $this->K1_baik = $post["K1_max"];
        $this->K1_cukup = $post["K1_min"];
        $this->K2_baik = $post["K2_max"];
        $this->K2_cukup = $post["K2_min"];
        $this->K3_baik = $post["K3_max"];
        $this->K3_cukup = $post["K3_min"];
        $this->K4_baik = $post["K4_max"];
        $this->K4_cukup = $post["K4_min"];
        $this->nilai_ekstra_baik = $post["nilai_ekstra_max"];
        $this->nilai_ekstra_cukup = $post["nilai_ekstra_min"];
        $this->EkstraBulutangkis_baik = $post["EkstraBulutangkis_max"];
        $this->EkstraBulutangkis_cukup = $post["EkstraBulutangkis_min"];

        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Id_perhitungan = $post["id"];
        $this->Id_ekstra = $post["Id_ekstra"];
        $this->tanggal = date('Y/m/d', strtotime($post["tanggal"]));
        $this->K1_baik = $post["K1_max"];
        $this->K1_cukup = $post["K1_min"];
        $this->K2_baik = $post["K2_max"];
        $this->K2_cukup = $post["K2_min"];
        $this->K3_baik = $post["K3_max"];
        $this->K3_cukup = $post["K3_min"];
        $this->K4_baik = $post["K4_max"];
        $this->K4_cukup = $post["K4_min"];
        $this->nilai_ekstra_baik = $post["nilai_ekstra_max"];
        $this->nilai_ekstra_cukup = $post["nilai_ekstra_min"];
        $this->EkstraBulutangkis_baik = $post["EkstraBulutangkis_max"];
        $this->EkstraBulutangkis_cukup = $post["EkstraBulutangkis_min"];

        $this->db->update($this->_table, $this, array('Id_perhitungan' => $post['id']));

    }
    public function hapus($id)
    {

        return $this->db->delete($this->_table, array('Id_perhitungan' => $id));
    }

}