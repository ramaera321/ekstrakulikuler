<?php


/**
 *
 */
class M_produksi extends CI_Model
{
  private $_table = "produksi";
  private $_save = "ekstra";



  public function rules_hitung()
  {

    return [

      [
        'field' => 'tgl_p',
        'label' => 'Tanggal Produksi',
        'rules' => 'required'
      ],

      [
        'field' => 'K1',
        'label' => 'K1',
        'rules' => 'required'
      ],

      [
        'field' => 'K2',
        'label' => 'K2 terakhir',
        'rules' => 'required'
      ],

      [
        'field' => 'K3',
        'label' => 'K3',
        'rules' => 'required'
      ]
    ];
  }


  public function page($number, $offset)
  {


    $this->db->select('produksi.Tanggal_Produksi, count(produksi.Tanggal_Produksi) as total');
    //$this->db->from('perhitungan');
    $this->db->join('perhitungan', 'produksi.Id_perhitungan=perhitungan.Id_perhitungan');
    $this->db->group_by('produksi.Tanggal_Produksi');
    $this->db->order_by('produksi.Tanggal_Produksi', 'desc');
    return $this->db->get($this->_table, $number, $offset)->result();
  }

  public function jumlah_data()
  {
    $this->db->select('produksi.Tanggal_Produksi, count(produksi.Tanggal_Produksi) as total');
    //$this->db->from('perhitungan');
    $this->db->join('perhitungan', 'produksi.Id_perhitungan=perhitungan.Id_perhitungan');
    $this->db->group_by('produksi.Tanggal_Produksi');
    $this->db->order_by('produksi.Tanggal_Produksi', 'desc');

    return $this->db->get($this->_table)->num_rows();
  }

  public function idEdit($id)
  {

    $this->db->select('*');
    $this->db->from('nama_ekstra');
    $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
    $this->db->where('perhitungan.Id_perhitungan', $id);
    return $this->db->get()->result();
  }
  public function saveH()
  {

    $post = $this->input->post();
    //$this->K1_baik = $post["K1_max"];
    $this->Id_perhitungan = $post['Id_p'];
    $this->Tanggal_Produksi = date('Y/m/d', strtotime($post["tgl_p"]));
    $this->K1 = $post['K1'];
    $this->K2 = $post['K2'];
    $this->K3 = $post['K3'];
    $this->K1 = $post['K4'];
    $this->K2 = $post['K5'];
    $this->K3 = $post['K6'];
    $this->K1 = $post['K7'];

    // $this->K1 = $K1;
    // $this->K2 = $K2;
    // $this->K3sik;
    $this->Total_produksi = $post['z'];
    // $this->Total_produksi = round($z,0,PHP_ROUND_HALF_DOWN);


    $this->db->insert($this->_table, $this);
  }

  public function savedata()

  {

    $data = array(
      "BuluTangkis" => $this->input->post('extra0'),
      "Futsal" => $this->input->post('extra1'),
      "ModernDance" => $this->input->post('extra2'),
      "TapakSuci" => $this->input->post('extra3'),
      "Tari" => $this->input->post('extra4'),
      "Paskibra" => $this->input->post('extra5'),
      "Film" => $this->input->post('extra6'),
      "SeniMusik" => $this->input->post('extra7'),
      "Pemrograman" => $this->input->post('extra8'),
      "HizbulWathan" => $this->input->post('extra9'),
      "KIR" => $this->input->post('extra10'),
      "PMR" => $this->input->post('extra11'),
      "Qiroah" => $this->input->post('extra12'),
      "Basket" => $this->input->post('extra13'),
      "Jurnalistik" => $this->input->post('extra14'),
    );
    return $this->db->insert('ekstra', $data);
  }

  public function getdata($name, $tgl)
  {
    $this->db->select('*');
    $this->db->from('nama_ekstra');
    $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
    $this->db->where('perhitungan.Username', $name);
    $this->db->where('perhitungan.tanggal', $tgl);
    $this->db->limit(1)->order_by('perhitungan.Id_perhitungan', 'DESC');
    return $this->db->get()->result();
  }


  public function hal($tgl)
  {

    $this->db->select('*');
    $this->db->from('nama_ekstra');
    $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
    $this->db->join('produksi', 'produksi.Id_perhitungan = perhitungan.Id_perhitungan');
    $this->db->where('Tanggal_Produksi', $tgl);
    $this->db->order_by('produksi.Tanggal_Produksi', 'desc');
    return $this->db->get()->result();
  }

  public function detailhal($id)
  {

    $this->db->select('*');
    $this->db->from('nama_ekstra');
    $this->db->join('perhitungan', 'perhitungan.Id_ekstra = nama_ekstra.Id_ekstra');
    $this->db->join('produksi', 'produksi.Id_perhitungan = perhitungan.Id_perhitungan');
    $this->db->where('produksi.Id_produksi', $id);
    $this->db->order_by('produksi.Tanggal_Produksi', 'desc');
    return $this->db->get()->result();
  }


  function hapus($id)
  {

    return $this->db->delete($this->_table, array('Id_produksi' => $id));
  }
}
