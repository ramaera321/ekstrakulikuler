<?php

/**
 * 
 */
class M_indexsiswa extends CI_Model
{
	
/*
	public function chart(){


 $this->db->select('*');
 $this->db->from('perhitungan');
 $this->db->join('produksi','produksi.Id_perhitungan=perhitungan.Id_perhitungan');
 $this->db->where($aktif);
 $query = $this->db->get();
 return $query->result();
	}
*/
	/* public function chart(){
 $this->db->select('produksi.Tanggal_Produksi, sum(produksi.Total_produksi) as total'); 
$this->db->from('perhitungan');
$this->db->join('produksi','perhitungan.Id_perhitungan=produksi.Id_perhitungan');
//$this->db->where('perhitungan.Id_perhitungan=produksi.Id_perhitungan');
 $this->db->group_by('produksi.Tanggal_Produksi');
 $this->db->order_by('produksi.Tanggal_Produksi','asc');
return $this->db->get()->result();

    }

    */
       public function range_chart($daterange){
 $this->db->select('produksi.Tanggal_Produksi, sum(produksi.Total_produksi) as total'); 
$this->db->from('perhitungan');
$this->db->join('produksi','perhitungan.Id_perhitungan=produksi.Id_perhitungan');
if($daterange[0])
$this->db->where('Tanggal_Produksi >=',$daterange[0]);
if($daterange[1])
$this->db->where('Tanggal_Produksi <=',$daterange[1]);
 $this->db->group_by('produksi.Tanggal_Produksi');
 $this->db->order_by('produksi.Tanggal_Produksi','asc');
return $this->db->get()->result();

    }

    public function get_roti(){
       // return $this->db->get($this->_table,$number,$offset)->result();
       $this->db->select('count(nama_ekstra.Id_ekstra) as total'); 
$this->db->from('nama_ekstra');

 return $this->db->get()->result();
/*if($query->num_rows()>0)
 {
 return $query->result();
 }
  */
    }


    public function get_akun(){
       // return $this->db->get($this->_table,$number,$offset)->result();
       $this->db->select('count(user.Id_user) as total'); 
$this->db->from('user');
 return $this->db->get()->result();
/*if($query->num_rows()>0)
 {
 return $query->result();
 }
  */
    }



}



?>