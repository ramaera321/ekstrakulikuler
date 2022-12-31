<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_roti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("roti/M_roti");
        $this->load->library('form_validation');
        $this->load->model("M_login");
        $this->load->helper(array('url'));
		if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    }

    public function index()
 
 {
    
     
$jumlah_data= $this->M_roti->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/roti/C_roti/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
          $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
       
        $data['nama_ekstra'] = $this->M_roti->page($config['per_page'],$from);
       
      
     $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
        $this->load->view('roti/list_roti',$data);
    }



    public function add()
    {
        $product = $this->M_roti;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
        $validation->set_message('required','%s silahkan di isi dahulu');
        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
      
       redirect(site_url("roti/C_roti"));
        }

        $this->load->view("roti/tambah_roti");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('roti/C_roti');
       
        $product = $this->M_roti;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data berhasil diupdate</div>');
        redirect(site_url("roti/C_roti"));
        }

        $data["nama_ekstra"] = $product->getById($id);
        if (!$data["nama_ekstra"]) show_404();
        
        $this->load->view("roti/edit_roti", $data);
    }

   

    public function delete($id=null){

       $this->M_roti->delete($id);
       $error = $this->db->error();
       if ($error['code'] != 0) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data gagal dihapus karena masih dipakai di data lain</div>');
          redirect(site_url('roti/C_roti'));
       }else{
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
          redirect(site_url('roti/C_roti'));
      }
  }
    
}
