<?php

/**
 * 
 */
class C_laporan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('roti/M_roti');
		$this->load->model('produksi/M_produksi');
		$this->load->model('laporan_produksi/M_laporan');
		$this->load->model('M_login');
		$this->load->helper(array('url'));
    if($this->session->userdata('Level') !== 'Admin' || $this->session->userdata('logged_in') !== TRUE){
      
      $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">anda bukan Admin, dilarang masuk halaman ini,silahkan login kembali</div>');
      redirect('login');
         $this->session->sess_destroy();
    }
	}

  public function index(){

    $tanggal1=$this->input->get('tanggal1', true);
    $tanggal2=$this->input->get('tanggal2', true);

    if (empty($tanggal1) && empty($tanggal2)) {

      $jumlah_data= $this->M_laporan->jumlah_data();
      $this->load->library('pagination');
      $config['base_url'] = base_url().'index.php/Laporan_produksi/C_laporan/index/';
      $config['total_rows'] = $jumlah_data;
      $config['per_page'] = 10;

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

      $data['laporan'] = $this->M_laporan->page($config['per_page'],$from);

      $data['pro']="Produksi";
      $data['total_pro'] = "Total = 0";
      $data['pagination'] = $this->pagination->create_links();


      $this->load->view('laporan_produksi/laporan_produksi',$data);
    }else{

     $data['laporan'] = $this->M_laporan->range(array($tanggal1,$tanggal2));
     $total = $this->M_laporan->total_produksi(array($tanggal1,$tanggal2));
      $data['total_pro']= "Total = ". $total[0]->total;
     $data['pro']='Produksi '.date('d/m/Y',strtotime($tanggal1)). ' S/d '.date('d/m/Y',strtotime($tanggal2));
     $this->load->view('laporan_produksi/laporan_produksi',$data);

   }



  }


  public function print(){
	$tanggal1=$this->input->get('tanggal1', true);
        $tanggal2=$this->input->get('tanggal2', true);
          $data['lap'] = $this->M_laporan->range(array($tanggal1,$tanggal2));
          $total = $this->M_laporan->total_produksi(array($tanggal1,$tanggal2));
          if (empty($tanggal1) && empty($tanggal2)) {
          $data['pro']='Produksi';	
           $data['total_pro'] = "Total = 0";
          }else{
              $data['total_pro']= "Total = ". $total[0]->total;
          $data['pro']='Produksi '.date('d/m/Y',strtotime($tanggal1)). ' S/d '.date('d/m/Y',strtotime($tanggal2));
      }
  	 $this->load->view('laporan_produksi/print_laporan',$data);
  }


}






?>