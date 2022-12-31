<?php


/**
 *
 */
class M_hasil extends CI_Model
{
  private $_table="ekstra";



public function rules_hitung()
    {
         
    return [

             ['field' => 'tgl_p',
            'label' => 'Tanggal Ekstra',
            'rules' => 'required'],

            ['field' => 'K1',
            'label' => 'K1',
            'rules' => 'required'],

             ['field' => 'K2',
            'label' => 'K2',
            'rules' => 'required'],

             ['field' => 'K3',
            'label' => 'K3',
            'rules' => 'required']
        ];

    }


    public function page($number,$offset){
       
       
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra0') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra1') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra2') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra3') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra4') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra5') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra6') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra7') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra8') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra9') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra10') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra11') ;
       $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra12') ;
//$this->db->from('perhitungan');
$this->db->join('perhitungan','ekstra.Id_perhitungan=perhitungan.Id_perhitungan');
 $this->db->group_by('ekstra.Tanggal_ekstra');
 $this->db->order_by('ekstra.Tanggal_ekstra','desc');
 return $this->db->get($this->_table,$number,$offset)->result();
    }
 
   public function jumlah_data(){
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra0') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra1') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra2') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra3') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra4') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra5') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra6') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra7') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra8') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra9') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra10') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra11') ;
    $this->db->select('ekstra.Tanggal_ekstra, count(ekstra.Tanggal_ekstra) as ekstra12') ;
//$this->db->from('perhitungan');
$this->db->join('perhitungan','ekstra.Id_perhitungan=perhitungan.Id_perhitungan');
$this->db->group_by('ekstra.Tanggal_ekstra');
$this->db->order_by('ekstra.Tanggal_ekstra','desc');
 
 return $this->db->get($this->_table)->num_rows();
        
            }

 public function idEdit($id)
    {
      
  $this->db->select('*');
  $this->db->from('nama_ekstra');
  $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
  $this->db->where('perhitungan.Id_perhitungan',$id);
  return $this->db->get();

}
     public function saveH()
    {

        $post = $this->input->post();
        //$this->K1_baik = $post["K1_max"];
          $this->Id_perhitungan = $post['Id_p'];
          $this->Tanggal_ekstra = date('Y/m/d',strtotime($post["tgl_p"]));
          $this->K1 =$post['K1'];
          $this->K2 = $post['K2'];
          $this->K3 = $post['K3'];
          $this->K4 = $post['K4'];
          $this->K5 = $post['K5'];
          $this->K6 = $post['K6'];
          $this->K7 = $post['K7'];
        // $this->K1 = $K1;
        // $this->K2 = $K2;
        // $this->K3sik;
         $this->ekstra0=$post['z'];
         $this->ekstra1=$post['z'];
         $this->ekstra2=$post['z'];
         $this->ekstra3=$post['z'];
         $this->ekstra4=$post['z'];
         $this->ekstra5=$post['z'];
         $this->ekstra6=$post['z'];
         $this->ekstra7=$post['z'];
         $this->ekstra8=$post['z'];
         $this->ekstra9=$post['z'];
         $this->ekstra10=$post['z'];
         $this->ekstra11=$post['z'];
         $this->ekstra12=$post['z'];
        // $this->Total_ekstra = round($z,0,PHP_ROUND_HALF_DOWN);

            
        $this->db->insert($this->_table, $this);

    }

 public function hal($tgl)
    {
      
      $this->db->select('*');
      $this->db->from('nama_ekstra');
      $this->db->join('perhitungan','perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
      $this->db->join('ekstra','ekstra.Id_perhitungan = perhitungan.Id_perhitungan');
      $this->db->where('Tanggal_ekstra',$tgl);
      $this->db->order_by('ekstra.Tanggal_ekstra','desc');
      return $this->db->get()->result();
  }


 function hapus($id){

       return $this->db->delete($this->_table, array('Id_ekstra'=>$id));
    }
}
?>