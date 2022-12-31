<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
 
  function __construct(){
    parent::__construct();
    $this->load->model('M_login');
  }

  function index(){
    $this->load->view('Login');
  }

  function Auth(){
    $username    = $this->input->post('username',TRUE);
    $password = md5($this->input->post('password',TRUE));
  
    $validate = $this->M_login->validate($username,$password);
    
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $Id_user  = $data['Id_user'];
        $nama = $data['Nama'];
        $level = $data['Level'];
        $sesdata = array(
            'Id_user'  => $Id_user,
            'Nama'=> $nama,
            'Level'  => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === 'Admin'){
            redirect('Index');

        // access login for staff
        }elseif($level === 'Siswa'){
            redirect('Indexsiswa');

        // access login for author
        }
    }else{
        echo $this->session->set_flashdata('msg','Username atau Password salah');
        redirect('Login');
    }
  
  }


  function out(){
      $this->session->sess_destroy();
      redirect('Login');
  }

}
