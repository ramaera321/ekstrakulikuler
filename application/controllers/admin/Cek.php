<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("admin")){
		// 	redirect('admin/login','refresh');
		// }
		$this->load->model('Mcek');
	}
	

	}

	public function index()
	{
		$data['cek']=$this->Mcek->tampil_cek();
		$data['title'] = 'Pengecekan';
		$this->load->view('includes/header.php', $data);
		// $this->load->view('admin/variabel/ubah');
		$this->load->view('includes/footer.php',$data);
		$this->load->view('pengetahuan/hitung');
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/admin/Member.php */