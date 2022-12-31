<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">List Akun</a>
          </li>
          <li class="breadcrumb-item active">Tambah akun</li>
          <!-- Breadcrumb Menu-->
        
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Tambah Siswa</strong>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php echo site_url('akun/c_akun/add') ?>" method="post" >
                     
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" name="nama" value="<?= set_value('nama')?>">
                          <?= form_error('nama')?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Username</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" name="user" value="<?= set_value('user')?>">
                           <?= form_error('user')?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Password</label>
                        <div class="col-md-9">
                          <input class="form-control" type="Password" name="pass" value="<?= set_value('pass')?>">
                           <?= form_error('pass')?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input"> Ulang Password</label>
                        <div class="col-md-9">
                          <input class="form-control" type="Password" name="rpass" value="<?= set_value('rpass')?>">
                           <?= form_error('rpass')?>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input"> Level</label>
                         <div class="form-group col-sm-4">
                        <select class="form-control" name="level">
                          <option value=""></option>
                          <option value="1" <?= set_value('level') == 1 ? "Selected" : null?>>Admin</option>
                          <option value="2" <?= set_value('level') == 2 ? "Selected" : null?>>Siswa</option>
                        </select>
                         <?= form_error('level')?>
                      </div>
                      </div>
                    
                        <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
                    <button class="btn btn-sm btn-danger" type="reset">
                      <i class="fa fa-ban"></i> Reset</button>
                  </div>

                    </form>
                  </div>
                
                </div>
                </div>
            </div> 
              </div>
              <!-- /.col-->
       </div>
       </main>
      </div>
      <?php $this->load->view("includes/footer") ?>


