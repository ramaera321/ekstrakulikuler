<?php

class C_akun extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        $this->load->model("akun/M_akun");
        $this->load->library('form_validation');
        $this->load->model("M_login");
        
    if($this->session->userdata('Level') !== 'Admin' || $this->session->userdata('logged_in') !== TRUE){

      $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">anda bukan Admin, dilarang masuk halaman ini,silahkan login kembali</div>');

      redirect('login');
      $this->session->sess_destroy();
    }
    }
  

    public function index()
    {
       $jumlah_data= $this->M_akun->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/akun/C_akun/index/';
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
       
        $data['user'] = $this->M_akun->page($config['per_page'],$from);
       
      
     $data['pagination'] = $this->pagination->create_links();
 
   
        $this->load->view('akun/list_akun',$data);
    }

   
    public function add()
    {

        $product = $this->M_akun;
        $validation = $this->form_validation;

        $validation->set_rules($product->rules());
        $validation->set_message('required','%s silahkan di isi dahulu');
        $validation->set_message('min_length','%s harus lebih dari 5 karakter');
        $validation->set_message('is_unique','%s sudah dipakai, cari yang lain');
        $validation->set_message('matches','%s tidak sama');
        if ($validation->run()) {
           $product->saveakun();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data akun berhasil ditambah</div>');
      
       redirect(site_url("akun/C_akun"));
        }
    
       $this->load->view("akun/tambah_akun");
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data gagal disimpan</div>');
    }
    

    public function edit($id = null)
    {
       $product = $this->M_akun;
       $validation = $this->form_validation;
       $validation->set_rules($product->rules_edit()); 
       $validation->set_message('required','%s silahkan di isi dahulu');
       $validation->set_message('min_length','%s harus lebih dari 5 karakter');
     
       $validation->set_message('matches','%s tidak sama');

     if ($validation->run() == FALSE) {

        $data["user"] = $product->getById($id);
        $this->load->view("akun/edit_akun", $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data gagal disimpan</div>');

    }else{
       $product->update();
       $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data berhasil diupdate</div>');
       redirect(site_url("akun/C_akun"));
   }
}

public function username_check(){

    $post=$this->input->post(null, TRUE);
    $query = $this->db->query("select * from user where Username = '$post[user]' AND Id != '$post[id]'");


    if ($query->num_rows() > 0 ) {
        $this->form_validation->set_message('username_check','%s sudah dipakai, cari yang lain');
     return FALSE; 
 }else{
    return TRUE;
}

}



    public function delete($id_user=null)
    {
        if (!isset($id_user)){

         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data gagal dihapus</div>');
        redirect(site_url('akun/C_akun'));
      }elseif ($this->M_akun->delete($id_user)) {
       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
            redirect(site_url('akun/C_akun'));
    }
      }  
}



?>