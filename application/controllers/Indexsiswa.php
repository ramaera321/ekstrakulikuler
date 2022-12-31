<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Indexsiswa extends CI_Controller{
  function __construct(){
    parent::__construct();
        $this->load->model('M_indexsiswa');
        $this->load->library('form_validation');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }

  }

  function index(){

      if($this->session->userdata('Level')==='Admin'){
        $tanggal1=$this->input->get('tanggal1',TRUE);
        $tanggal2=$this->input->get('tanggal2',TRUE);

        // $tgl1=date('d-m-Y',strtotime($tanggal1));
        // $tgl2 =date('d-m-Y',strtotime($tanggal2));
        $data['chart']=$this->M_index->range_chart(array($tanggal1,$tanggal2));
        $data['roti']=$this->M_index->get_roti();
        $data['akun']=$this->M_index->get_akun();
          $this->load->view('Index',$data);
      }else{
       
        $this->session->userdata('Level')==='Siswa';
        $tanggal1=$this->input->get('tanggal1', true);
        $tanggal2=$this->input->get('tanggal2', true);
        $data['chart']=$this->M_indexsiswa->range_chart(array($tanggal1,$tanggal2));
        $data['roti']=$this->M_indexsiswa->get_roti();
        $data['akun']=$this->M_indexsiswa->get_akun();
       $this->load->view('Indexsiswa',$data);
      }

  }

  // function staff(){
  //   //Allowing akses to staff only
  //   if($this->session->userdata('level')==='2'){
  //     $this->load->view('dashboard_view');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }

  // function author(){
  //   //Allowing akses to author only
  //   if($this->session->userdata('level')==='3'){
  //     $this->load->view('dashboard_view');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }

}

