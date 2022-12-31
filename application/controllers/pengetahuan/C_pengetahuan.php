<?php


class C_pengetahuan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('pengetahuan/M_pengetahuan');
    $this->load->model('produksi/M_produksi');
    $this->load->model('roti/M_roti');
    $this->load->model('M_login');
    $this->load->helper(array('url'));
    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login');
    }
  }


  public function index()
  {


    $jumlah_data = $this->M_pengetahuan->jumlah_data();
    $this->load->library('pagination');
    $config['base_url'] = base_url() . 'index.php/pengetahuan/C_pengetahuan/index/';
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

    $data['pengetahuan'] = $this->M_pengetahuan->page($config['per_page'], $from);


    $data['pagination'] = $this->pagination->create_links();

    $this->load->view('pengetahuan/list_tanggal', $data);
  }

  public function lihat($tgl = null)
  {

    $data['detail_tanggal']   = $this->M_pengetahuan->hal($tgl);
    if ($this->session->userdata('Level') == 'Siswa') {
      $product = $this->M_produksi;
      $roti = $this->M_roti;
      $data["detail_pengetahuan"] = $product->getdata($this->session->userdata('Nama'), $tgl);
      $data["roti"] = $roti->tampil();
      // echo "<pre>";
      // print_r($data);
      // die;
      $this->load->view("pengetahuan/hitung", $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
    } else
      $this->load->view('pengetahuan/list_pengetahuan', $data);
  }


  public function edit($id = null)
  {
    if (!isset($id)) redirect('pengetahuan/C_pengetahuan/');

    $product = $this->M_pengetahuan;
    $roti = $this->M_roti;
    $validation = $this->form_validation;
    $validation->set_rules($product->rules_pengetahuan());

    $validation->set_message('required', '%s silahkan di isi dahulu');
    if ($validation->run()) {
      $product->update();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
      redirect(site_url("pengetahuan/C_pengetahuan/"));
    }


    $data["detail_pengetahuan"] = $product->idEdit($id);

    $data["roti"] = $roti->tampil();
    if (!$data["detail_pengetahuan"]) show_404();

    $this->load->view("pengetahuan/edit_pengetahuan", $data);
  }



  public function addP()
  {

    $product = $this->M_pengetahuan;

    $validation = $this->form_validation;
    $validation->set_rules($product->rules_pengetahuan());
    $validation->set_message('required', '%s silahkan di isi dahulu');

    if ($validation->run()) {
      $product->saveP();
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
      redirect(site_url("pengetahuan/C_pengetahuan/"));
    }



    $data["roti"] = $this->M_roti->tampil();
    $this->load->view("pengetahuan/tambah_pengetahuan", $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Data gagal disimpan, pastikan mengisi dengan benar</div>');
  }

  function hapus($id = null)
  {

    if (!isset($id)) {

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
      redirect(site_url('pengetahuan/C_pengetahuan'));
    } elseif ($this->M_pengetahuan->hapus($id)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
      redirect(site_url('pengetahuan/C_pengetahuan'));
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal dihapus, karena masih dipakai di data lain</div>');
      redirect(site_url('pengetahuan/C_pengetahuan'));
    }
  }

  public function Tampil_hitung($id = null)
  {
    if (!isset($id)) redirect('pengetahuan/C_pengetahuan/');

    $product = $this->M_pengetahuan;
    $roti = $this->M_roti;
    $data["detail_pengetahuan"] = $product->idEdit($id);
    $data["roti"] = $roti->tampil();
    if (!$data["detail_pengetahuan"]) show_404();

    $this->load->view("pengetahuan/hitung", $data);
  }
}
