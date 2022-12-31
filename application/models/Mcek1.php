<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcek extends CI_Model {

	public function tampil_hitung()
	{
		$this->db->join('cek', 'cek.id_cek = cek.id_riwayat');
		$ambil=$this->db->get('cek');
		$data=$ambil->result_array();
		return $data;
	}

	public function cek_riwayat($id_riwayat)
	{
		$this->db->join('variabel', 'variabel.id_variabel = cek.id_variabel', 'left');
		$this->db->where('cek.id_riwayat', $id_riwayat);
		$ambil=$this->db->get('cek');
		$data=$ambil->result_array();
		return $data;
	}

	public function tambah($inputan)
	{
		$data_user=$this->session->userdata("user");
		$inputan_riwayat['id_user']=$data_user['id_user'];
		date_default_timezone_set("Asia/Jakarta");
		$inputan_riwayat['tanggal_riwayat']=date("Y-m-d H:i:s");
		$this->db->insert('riwayat', $inputan_riwayat);
		
		//Mengambil id_riwayat yang baru saja disimpan
		$inputan_cek['id_riwayat']=$this->db->insert_id();
		foreach ($inputan['id_variabel'] as $inputan_cek['id_variabel'] => $inputan_cek['data_cek']) {
			$this->db->insert('cek', $inputan_cek);
		}
		return $inputan_cek['id_riwayat'];
	}

	public function hitung($v1, $v2, $v3)
    {
        $post = $this->input->post();
        $id_p = $this->input->post('id_p');

        $K1_min = 60;
        $K1_max = 100;
        $K2_min = 60;
        $K2_max = 100;
        // $K3_min = 150;
        // $K3_max = 200;
        $K4_min = 60;
        $K4_max = 100;
        $nilai_ekstra_min = 0;
        $nilai_ekstra_max = 100;

        $tgl_p = $this->input->post('tgl_p');
        $K1 = $v1;
        $K2 = $v2;
        $K4 = $v3;

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
//K1 naik K2 banyak K3 kerja banyak produksi bertambah
        $z1 = ($a1 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 2
        $a2 = min($K1Ba, $K2Ba, $K4Cu);
//K1 naik K2 banyak K3 kerja sedikit produksi berkurang
        $z2 = ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 3
        $a3 = min($K1Ba, $K2Cu, $K4Ba);
//K1 naik K2 sedikit K3 kerja banyak produksi bertambah
        $z3 = ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 4
        $a4 = min($K1Ba, $K2Cu, $K4Cu);
//K1 naik K2 sedikit K3 kerja sedikit produksi bertambah
        $z4 = $nilai_ekstra_max - ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 5
        $a5 = min($K1Cu, $K2Ba, $K4Ba);
//K1 turun K2 banyak K3 kerja banyak produksi berkurang
        $z5 = ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 6
        $a6 = min($K1Cu, $K2Ba, $K4Cu);
//K1 turun K2 banyak K3 kerja sedikit produksi berkurang
        $z6 = $nilai_ekstra_max - ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 7
        $a7 = min($K1Cu, $K2Cu, $K4Ba);
//K1 turun K2 sedikit K3 kerja banyak produksi bertambah
        $z7 = $nilai_ekstra_max - ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 8
        $a8 = min($K1Cu, $K2Cu, $K4Cu);
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

    public function hitung1($v1, $v2, $v3)
    {
        $post = $this->input->post();
        $id_p = $this->input->post('id_p');

        $K1_min = 60;
        $K1_max = 100;
        $K2_min = 60;
        $K2_max = 100;
        $K3_min = 150;
        $K3_max = 200;
        // $K4_min = 60;
        // $K4_max = 100;
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
        $z2 = ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 3
        $a3 = min($K1Ba, $K2Cu, $K3Ba);
//K1 naik K2 sedikit K3 kerja banyak produksi bertambah
        $z3 = ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 4
        $a4 = min($K1Ba, $K2Cu, $K3Cu);
//K1 naik K2 sedikit K3 kerja sedikit produksi bertambah
        $z4 = $nilai_ekstra_max - ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 5
        $a5 = min($K1Cu, $K2Ba, $K3Ba);
//K1 turun K2 banyak K3 kerja banyak produksi berkurang
        $z5 = ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 6
        $a6 = min($K1Cu, $K2Ba, $K3Cu);
//K1 turun K2 banyak K3 kerja sedikit produksi berkurang
        $z6 = $nilai_ekstra_max - ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 7
        $a7 = min($K1Cu, $K2Cu, $K3Ba);
//K1 turun K2 sedikit K3 kerja banyak produksi bertambah
        $z7 = $nilai_ekstra_max - ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min));
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
            $K3 = $v3;
            $K4 = $v4;

//rumus derajat K1
if ($K1 > $K1_min && $K1 < $K1_max) {
    $Koh=$K1_max-$K1_min;
    if ($Koh <= 0) $Koh = 1;  
    $K1C=($K1_max-$K1)/$Koh;
    $K1Cu=round($K1C,PHP_ROUND_HALF_DOWN); 
    }elseif ($K1 <= $K1_min) {
    $K1Cu = 1;
    }elseif($K1 >= $K1_max){
    $K1Cu=0;
    }
    
    if ($K1 > $K1_min && $K1 < $K1_max) {
    $Koh=$K1_max-$K1_min;
    if ($Koh <= 0) $Koh = 1;  
    $K1B=($K1-$K1_min)/$Koh;
    $K1Ba=round($K1B,PHP_ROUND_HALF_DOWN);  
    }elseif ($K1 <= $K1_min) {
    $K1Ba = 0;
    }elseif($K1 >= $K1_max){
    $K1Ba=1;
    }

            // if ($K1 > $K1_min && $K1 < $K1_max) {
            //     $Koh = $K1_max - $K1_min;
            //     if ($Koh <= 0) {
            //         $Koh = 1;
            //     }

            //     $K1C = ($K1_max - $K1) / $Koh;
            //     $K1Cu = round($K1C, PHP_ROUND_HALF_DOWN);
            // } elseif ($K1 <= $K1_min) {
            //     $K1Cu = 1;
            // } elseif ($K1 >= $K1_max) {
            //     $K1Cu = 0;
            // }

            // if ($K1 > $K1_min && $K1 < $K1_max) {
            //     $Koh = $K1_max - $K1_min;
            //     if ($Koh <= 0) {
            //         $Koh = 1;
            //     }

            //     $K1B = ($K1 - $K1_min) / $Koh;
            //     $K1Ba = round($K1B, PHP_ROUND_HALF_DOWN);

            // } elseif ($K1 <= $K1_min) {
            //     $K1Ba = 0;
            // } elseif ($K1 >= $K1_max) {
            //     $K1Ba = 1;
            // }

//rumus derajat K2

if ($K2 > $K2_min && $K2 < $K2_max) {
    $Htm=$K2_max-$K2_min;
    if ($Htm <= 0) $Htm = 1;  
    $K2C=($K2_max-$K2)/$Htm;
    $K2Cu=round($K2C,PHP_ROUND_HALF_DOWN); 
    }elseif ($K2 <= $K2_min) {
    $K2Cu = 1;
    }elseif($K2 >= $K2_max){
    $K2Cu=0;
    }
    
    if ($K2 > $K2_min && $K2 < $K2_max) {
    $Htm=$K2_max-$K2_min;
    if ($Htm <= 0) $Htm = 1;  
    $K2B=($K2-$K2_min)/$Htm;
    $K2Ba=round($K2B,PHP_ROUND_HALF_DOWN);  
    }elseif ($K2 <= $K2_min) {
    $K2Ba = 0;
    }elseif($K2 >= $K2_max){
    $K2Ba=1;
    }

            // if ($K2 > $K2_min && $K2 < $K2_max) {
            //     $Htm = $K2_max - $K2_min;
            //     if ($Htm <= 0) {
            //         $Htm = 1;
            //     }

            //     $K2C = ($K2_max - $K2) / $Htm;
            //     $K2Cu = round($K2C, PHP_ROUND_HALF_DOWN);
            // } elseif ($K2 <= $K2_min) {
            //     $K2Cu = 1;
            // } elseif ($K2 >= $K2_max) {
            //     $K2Cu = 0;
            // }

            // if ($K2 > $K2_min && $K2 < $K2_max) {
            //     $Htm = $K2_max - $K2_min;
            //     if ($Htm <= 0) {
            //         $Htm = 1;
            //     }

            //     $K2B = ($K2 - $K2_min) / $Htm;
            //     $K2Ba = round($K2B, PHP_ROUND_HALF_DOWN);
            // } elseif ($K2 <= $K2_min) {
            //     $K2Ba = 0;
            // } elseif ($K2 >= $K2_max) {
            //     $K2Ba = 1;
            // }

            //rumus derajat K3

            if ($K3 > $K3_min && $K3 < $K3_max) {
                $Tes=$K3_max-$K3_min;
                if ($Tes <= 0) $Tes = 1;  
                $K3C=($K3_max-$K3)/$Tes;
                $K3Cu=round($K3C,PHP_ROUND_HALF_DOWN); 
                }elseif ($K3 <= $K3_min) {
                $K3Cu = 1;
                }elseif($K3 >= $K3_max){
                $K3Cu=0;
                }
                
                if ($K3 > $K3_min && $K3 < $K3_max) {
                $Tes=$K3_max-$K3_min;
                if ($Tes <= 0) $Tes = 1;  
                $K3B=($K3-$K3_min)/$Tes;
                $K3Ba=round($K3B,PHP_ROUND_HALF_DOWN);  
                }elseif ($K3 <= $K3_min) {
                $K3Ba = 0;
                }elseif($K3 >= $K3_max){
                $K3Ba=1;
                }

            // if ($K3 > $K3_min && $K3 < $K3_max) {
            //     $Tes = $K3_max - $K3_min;
            //     if ($Tes <= 0) {
            //         $Tes = 1;
            //     }

            //     $K3C = ($K3_max - $K3) / $Tes;
            //     $K3Cu = round($K3C, PHP_ROUND_HALF_DOWN);
            // } elseif ($K3 <= $K3_min) {
            //     $K3Cu = 1;
            // } elseif ($K3 >= $K3_max) {
            //     $K3Cu = 0;
            // }

            // if ($K3 > $K3_min && $K3 < $K3_max) {
            //     $Tes = $K3_max - $K3_min;
            //     if ($Tes <= 0) {
            //         $Tes = 1;
            //     }

            //     $K3B = ($K3 - $K3_min) / $Tes;
            //     $K3_Ba = round($K3B, PHP_ROUND_HALF_DOWN);

            // } elseif ($K3 <= $K3_min) {
            //     $K3Ba = 0;
            // } elseif ($K3 >= $K3_max) {
            //     $K3Ba = 1;
            // }


//rumus derajat K4

// if ($K4 > $K4_min && $K4 < $K4_max) {
//     $Psd=$K4_max-$K4_min;
//     if ($Psd <= 0) $Psd = 1;  
//     $K4C=($K4_max-$K4)/$Psd;
//     $K4Cu=round($K4C,PHP_ROUND_HALF_DOWN); 
//     }elseif ($K4 <= $K4_min) {
//     $K4Cu = 1;
//     }elseif($K4 >= $K4_max){
//     $K4Cu=0;
//     }
    
//     if ($K4 > $K4_min && $K4 < $K4_max) {
//     $Psd=$K4_max-$K4_min;
//     if ($Psd <= 0) $Psd = 1;  
//     $K4B=($K4-$K4_min)/$Psd;
//     $K4Ba=round($K4B,PHP_ROUND_HALF_DOWN);  
//     }elseif ($K4 <= $K4_min) {
//     $K4Ba = 0;
//     }elseif($K4 >= $K4_max){
//     $K4Ba=1;
//     }
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
            $a1 = min($K1Ba, $K2Ba, $K3Ba, $K4Ba);
//K1 naik K2 banyak K4 kerja banyak produksi bertambah
            $z1 = ($a1 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 2
            $a2 = min($K1Ba, $K2Ba, $K3Ba, $K4Cu);
//K1 naik K2 banyak K4 kerja banyak produksi bertambah
            $z2 = ($a2 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 3
            $a3 = min($K1Ba, $K2Ba, $K3Cu, $K4Cu);
//K1 naik K2 banyak K4 kerja sedikit produksi berkurang
            $z3 = $nilai_ekstra_max - ($a3 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 4
            $a4 = min($K1Ba, $K2Cu, $K3Cu, $K4Cu);
//K1 naik K2 sedikit K4 kerja sedikit produksi berkurang
            $z4 = $nilai_ekstra_max - ($a4 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 5
            $a5 = min($K1Ba, $K2Cu, $K3Ba, $K4Ba);
//K1 naik K2 sedikit K4 kerja banyak produksi bertambah
            $z5 = ($a5 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 6
            $a6 = min($K1Ba, $K2Ba, $K3Cu, $K4Ba);
//K1 turun K2 banyak K4 kerja banyak produksi bertambah
            $z6 = ($a6 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 7
            $a7 = min($K1Ba, $K2Cu, $K3Cu, $K4Ba);
//K1 turun K2 banyak K4 kerja sedikit produksi berkurang
            $z7 = $nilai_ekstra_max - ($a7 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 8
            $a8 = min($K1Ba, $K2Cu, $K3Ba, $K4Cu);
//K1 turun K2 sedikit K4 kerja banyak produksi bertambah
            $z8 = $nilai_ekstra_max - ($a8 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 9
            $a9 = min($K1Cu, $K2Cu, $K3Cu, $K4Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z9 = $nilai_ekstra_max - ($a9 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 10
            $a10 = min($K1Cu, $K2Cu, $K3Cu, $K4Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z10 = $nilai_ekstra_max - ($a10 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 11
            $a11 = min($K1Cu, $K2Cu, $K3Ba, $K4Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z11 = $nilai_ekstra_max - ($a11 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 12
            $a12 = min($K1Cu, $K2Ba, $K3Ba, $K4Ba);
//K1 turun K2 sedikit K4 kerja sedikit produksi bertambah
            $z12 = ($a12 * ($nilai_ekstra_max - $nilai_ekstra_min)) + $nilai_ekstra_min;
//nilai a predikat 13
            $a13 = min($K1Cu, $K2Ba, $K3Cu, $K4Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z13 = $nilai_ekstra_max - ($a13 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 14
            $a14 = min($K1Cu, $K2Cu, $K3Ba, $K4Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z14 = $nilai_ekstra_max - ($a14 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 15
            $a15 = min($K1Cu, $K2Ba, $K3Ba, $K4Cu);
//K1 turun K2 sedikit K4 kerja sedikit produksi berkurang
            $z15 = $nilai_ekstra_max - ($a15 * ($nilai_ekstra_max - $nilai_ekstra_min));
//nilai a predikat 16
            $a16 = min($K1Cu, $K2Ba, $K3Cu, $K4Ba);
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
	// public function hitung($id_riwayat)
	// {
	// 	$this->load->model('Mhimpunan');
	// 	$this->load->model('Maturan');
	// 	$this->load->model('Mresiko');
	// 	$data['inputan']=$this->cek_riwayat($id_riwayat);

	// 	//Fuzzyfikasi
	// 	foreach ($data['inputan'] as $key_i => $value_i) {

	// 		$inputan = $value_i['data_cek'];
	// 		$idv = $value_i['id_variabel'];
	// 		$data_himpunan = $this->Mhimpunan->himpunan_variabel($idv);

	// 		foreach ($data_himpunan as $key_h => $value_h) {
	// 			$bb[$idv][$value_h['id_himpunan']] = $value_h['batas_bawah_himpunan'];
	// 			$ba[$idv][$value_h['id_himpunan']] = $value_h['batas_atas_himpunan'];
	// 		}

			

		// 	foreach ($bb[$idv] as $idh => $nilai_batas_bawah) {
		// 		if ($bb[$idv][$idh]==$bt1[$idv][$idh] AND $bb[$idv][$idh]==$bt2[$idv][$idh] AND $bb[$idv][$idh]==$ba[$idv][$idh]){
		// 			if ($inputan==0) {
		// 				$nilai_keanggotaan[$idv][$idh] = 0;
		// 			} else {
		// 				$nilai_keanggotaan[$idv][$idh] = 1;
		// 			}
					
		// 		} else {
		// 			if ($nilai_batas_bawah==min($bb[$idv])) {
		// 				if($inputan >= $ba[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = 0;
		// 				}elseif($inputan >= $bt2[$idv][$idh] AND $inputan <= $ba[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = round(($ba[$idv][$idh] - $inputan)/($ba[$idv][$idh] - $bt2[$idv][$idh]),2);
		// 				}elseif($inputan <= $bt2[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = 1;
		// 				}

		// 			} elseif($nilai_batas_bawah!==min($bb[$idv]) AND $nilai_batas_bawah!==max($bb[$idv])) {
		// 				if($inputan <= $bb[$idv][$idh] OR $inputan >= $ba[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = 0;
		// 				}elseif($inputan >= $bb[$idv][$idh] AND $inputan <= $bt1[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = round(($inputan - $bb[$idv][$idh])/($bt1[$idv][$idh] - $bb[$idv][$idh]),2);
		// 				}elseif($inputan >= $bt1[$idv][$idh] AND $inputan <= $bt2[$idv][$idh]) {
		// 					$nilai_keanggotaan[$idv][$idh] = 1;
		// 				} elseif($inputan >= $bt2[$idv][$idh] AND $inputan <= $ba[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = round(($ba[$idv][$idh] - $inputan)/($ba[$idv][$idh] - $bt2[$idv][$idh]),2);
		// 				}
		// 			} elseif($nilai_batas_bawah==max($bb[$idv])){
		// 				if($inputan <= $bb[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = "0";
		// 				}elseif($inputan >= $bb[$idv][$idh] AND $inputan <= $bt1[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = round(($inputan - $bb[$idv][$idh])/($bt1[$idv][$idh] - $bb[$idv][$idh]),2);
		// 				}elseif($inputan >= $bt1[$idv][$idh]){
		// 					$nilai_keanggotaan[$idv][$idh] = "1";
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		//Inferensi
	// 	$data_aturan=$this->Maturan->tampil_aturan();
	// 	foreach ($data_aturan as $key_a => $value_a) {
	// 		$idr = $value_a['id_aturan'];
	// 		$data_detail=$this->Maturan->tampil_detail_aturan($idr);
	// 		foreach ($data_detail as $key_d => $value_d) {
	// 			$idv = $value_d['id_variabel'];
	// 			$idh = $value_d['id_himpunan'];
	// 			$kelompok_aturan[$idr][$idh] = $nilai_keanggotaan[$idv][$idh];
	// 		}
	// 		$predikat[$idr] = min($kelompok_aturan[$idr]);

	// 		if ($value_a['id_keputusan']=="1") {
	// 			$nilai_z[$idr] = round($value_a['batas_atas_keputusan'] - ($predikat[$idr] * ($value_a['batas_atas_keputusan'] - $value_a['batas_bawah_keputusan'])), 2);
	// 		}else{
	// 			$nilai_z[$idr] = round($predikat[$idr] * ($value_a['batas_atas_keputusan'] - $value_a['batas_bawah_keputusan']) + $value_a['batas_bawah_keputusan'], 2);
	// 		}

	// 		$kali_dfz[$idr] = round($predikat[$idr] * $nilai_z[$idr], 2);
	// 	}
	// 	$hasil_dfz=round(array_sum($kali_dfz) / array_sum($predikat), 2);
	// 	$dfz = round(array_sum($kali_dfz) / array_sum($predikat), 2)." %";

	// 	$resiko=$this->Mresiko->tampil_resiko();
	// 	foreach ($resiko as $index => $value) {
	// 		if ($hasil_dfz >= $value['batas_bawah_resiko'] AND $hasil_dfz <= $value['batas_atas_resiko']) {
	// 			$hasil_resiko=$value['nama_resiko'];
	// 			$id_resiko=$value['id_resiko'];
	// 		}
	// 	}

	// 	//Menyimpan hasil dan keterangan
	// 	$input['hasil']=$hasil_dfz;
	// 	$input['id_resiko']=$id_resiko;
	// 	$this->db->where('id_riwayat', $id_riwayat);
	// 	$this->db->update('riwayat', $input);

	// 	//Menampilkan
	// 	foreach ($nilai_keanggotaan as $id_variabel => $value) {
	// 		foreach ($value as $id_himpunan => $hasil) {
	// 			$data_himpunan = $this->Mhimpunan->detail_himpunan($id_himpunan);
	// 			$data['nilai_keanggotaan'][$data_himpunan['nama_variabel']][$data_himpunan['nama_himpunan']] = $hasil;
	// 		}
	// 	}

	// 	foreach ($predikat as $id_aturan => $value) {
	// 		$data_aturan = $this->Maturan->detail_aturan($id_aturan);
	// 		$data['predikat'][$data_aturan['nama_aturan']] = $nilai_z[$id_aturan];
	// 		$data['nilai_z'][$data_aturan['nama_aturan']]=$nilai_z[$id_aturan];
	// 	}

	// 	$data['defuzzifikasi'] = $dfz;
	// 	$data['resiko'] = $hasil_resiko;
	// 	$data['id_resiko'] = $id_resiko;

	// 	return $data;
	// }
}

/* End of file Mcek.php */
/* Location: ./application/models/Mcek.php */