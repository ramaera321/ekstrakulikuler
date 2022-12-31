<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(!$this->session->userdata("admin")){
			redirect('admin/login','refresh');
		}
		$this->load->model('Mclient');
	}

	public function index()
	{
		$data['client']=$this->Mclient->tampil_client();
		$data['title'] = 'client';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/client/tampil');
		$this->load->view('admin/footer');
	}

	public function tambah()
	{
		$data['client']=$this->Mclient->tampil_client();
		$data['title'] = 'Client';
		$input=$this->input->post();
		if ($input) {
			$this->Mclient->tambah_client($input);
			redirect('admin/client/tambah','refresh');
		} else {
			$this->load->view('admin/header',$data);
			$this->load->view('admin/client/tambah');
			$this->load->view('admin/footer');
		}		
	}

	public function ubah1($id_client)
	{
		$data['client']=$this->Mclient->detail_client($id_client);
		$data['client']=$this->Mclient->tampil_client();
		$data['title'] = 'Client';
		$input=$this->input->post();
		if ($input) {
			$this->Mclient->ubah_client($input,$id_client);
			redirect('admin/client','refresh');
		} else {
			
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/client/ubah');
		$this->load->view('admin/footer');
	}

	public function ubah($id_client)
	{
		$data['title'] = 'Profil';
		$data['client']=$this->session->userdata('client');
		$inputan=$this->input->post();
		if ($inputan) {
			$inputan['id_client']=$id_client;
			$inputan['password']=$data['client']['password'];
			$this->Mclient->ubah_profil($inputan,$id_client);
			redirect('admin/client','refresh');
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/client/ubah');
		$this->load->view('admin/footer');
	}

	public function ubah_password($id_client)
	{
		$data['title'] = 'Profil';
		$data['client']=$this->session->userdata('client');
		$inputan=$this->input->post();
		if ($inputan) {
			$hasil=$this->Mclient->ubah_password($inputan,$id_client);
			if ($hasil=="sukses") {
				redirect('admin/client','refresh');
			}elseif ($hasil=="password_lama_salah") {
				echo "<script>alert('Password Lama Salah')</script>";
			}elseif ($hasil=="password_konfirmasi_salah") {
				echo "<script>alert('Password Konfirmasi Salah')</script>";
			}
		}
		$this->load->view('client/header',$data);
		$this->load->view('admin/client/ubah');
		$this->load->view('client/footer');
	}

	// public function ubah_pass($id_client)
	// {
	// 	$data['title'] = 'Profil';
	// 	$data['client']=$this->session->userdata('client');
	// 	$inputan=$this->input->post();
	// 		$hasil=$this->Mclient->ubah_pass($inputan,$id_client);
	// 		$hasil=="sukses";
	// 			redirect('admin/client','refresh');
			
		
	// 	$this->load->view('client/header',$data);
	// 	$this->load->view('admin/client/ubah');
	// 	$this->load->view('client/footer');
	// }

	

	public function hapus($id_client){
		$this->Mclient->hapus_client($id_client);
		redirect('admin/client','refresh');
	}

}

/* End of file client.php */
/* Location: ./application/controllers/admin/client.php */