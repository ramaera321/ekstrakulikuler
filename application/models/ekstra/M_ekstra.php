<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_ekstra extends CI_Model
{
    private $_table = "nama_ekstra";

    public $Id_ekstra;
    public $Nama;
   
 public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Nama ekstra',
            'rules' => 'required']

           
        ];
    }
/*
 function get_roti($limit, $start){
        $query = $this->db->get($this->_table, $limit, $start);
        return $query;
    }
*/

   public function page($number,$offset){
        $this->db->order_by('nama_ekstra.Nama','desc');
         
        return $this->db->get($this->_table,$number,$offset)->result();       
    }
 
   public function jumlah_data(){
    $this->db->order_by('nama_ekstra.Nama','desc');
        return $this->db->get($this->_table)->num_rows();
    }

   
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["Id_ekstra" => $id])->row();
    }
    public function tampil()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
      //  $this->Id_ekstra = $post["id"];
        $this->Nama = $post["name"];
		
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Id_ekstra = $post["id"];
        $this->Nama = $post["name"];
		
        $this->db->update($this->_table, $this, array('Id_ekstra' => $post['id']));
    
    }

    public function delete($id)
    {
		//$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("Id_ekstra" => $id));
	}
	/*
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->Id_ekstra;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
	}
*/
}
