<?php

/**
 * 
 */
class M_Laporan extends CI_Model
{

private $_table="nama_ekstra";
private $_pro="produksi";

 

public function page($number,$offset){
  
  $this->db->select('*');
 
  $this->db->join('perhitungan','perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
  $this->db->join('produksi','produksi.Id_perhitungan = perhitungan.Id_perhitungan');

  $this->db->order_by('produksi.Tanggal_Produksi','desc');
      
	return $this->db->get($this->_table,$number,$offset)->result();

 }
 
 	public function jumlah_data(){
      $this->db->select('*');
  
  $this->db->join('perhitungan','perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
  $this->db->join('produksi','produksi.Id_perhitungan = perhitungan.Id_perhitungan');
  $this->db->order_by('produksi.Tanggal_Produksi','desc');
 return $this->db->get($this->_table)->num_rows();
        
 }

 public function range($daterange){
  $this->db->select('*');
  
  $this->db->join('perhitungan','perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
  $this->db->join('produksi','produksi.Id_perhitungan = perhitungan.Id_perhitungan');
  if($daterange[0])
    $this->db->where('Tanggal_Produksi >=',$daterange[0]);
  if($daterange[1])
    $this->db->where('Tanggal_Produksi <=',$daterange[1]);
  $this->db->order_by('produksi.Tanggal_Produksi','desc');

  return $this->db->get($this->_table)->result();

}

public function total_produksi($date){
  $this->db->select('SUM(produksi.Total_produksi) as total');
  
  if($date[0])
    $this->db->where('Tanggal_Produksi >=',$date[0]);
  if($date[1])
    $this->db->where('Tanggal_Produksi <=',$date[1]);
 $this->db->order_by('produksi.Tanggal_Produksi','desc');

  return $this->db->get($this->_pro)->result();

}

}



?>