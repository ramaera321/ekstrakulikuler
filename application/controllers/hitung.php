<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hitung extends CI_Controller {

	function __construct(){
		parent::__construct();
		// if(!$this->session->userdata("admin")){
		// 	redirect('admin/login','refresh');
		
		$this->load->model('Mcek');
	}

	public function index()
	{
		$data['cek']=$this->Mcek->tampil_hitung();
		$data['title'] = 'Hitung';
        $this->load->view('includes/header.php', $data);
		// $this->load->view('admin/variabel/ubah');
		$this->load->view('includes/footer.php',$data);
		$this->load->view('pengetahuan/hitung',$data);
	}

    public function tambah()
	{
		$data['title'] = 'Pengecekan';
		$data['variabel']=$this->Mvariabel->tampil_variabel();
		foreach ($data['variabel'] as $key => $value) {
			$data['himpunan'][$value['id_variabel']] = $this->Mhimpunan->himpunan_variabel($value['id_variabel']);
		}
		$inputan=$this->input->post();
		if ($inputan) {
			$id_riwayat=$this->Mcek->tambah($inputan);
			redirect('pengetahuan/hitung'.$id_riwayat,'refresh');
		}
		
        $this->load->view('includes/header.php', $data);
		// $this->load->view('admin/variabel/ubah');
		$this->load->view('includes/footer.php',$data);
		$this->load->view('pengetahuan/hitung', $data);
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/admin/Member.php */