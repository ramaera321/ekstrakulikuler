 <?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Edit Akun</li>
          <!-- Breadcrumb Menu-->
        
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Edit Ekstra</strong>
                    </div>
                    <?=$this->session->flashdata('pesan'); ?>
                  <div class="card-body">
             
              
                    <form class="form-horizontal" action="<?php echo site_url('akun/c_akun/edit/'.$user->Id_user)?>" method="post">
                     <input class="form-control"  type="hidden" name="id_user" placeholder="Text" value="<?= $user->Id_user ?>">

                     
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                          <input class="form-control"  type="text" name="nama"  value="<?=$this->input->post('nama') ?? $user->Nama ?>">
                          <?=form_error('nama') ?>
                        </div>
                      </div>
                     <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Username</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" name="user" value="<?=$this->input->post('user') ?? $user->Username ?>">
                          <?=form_error('user') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Password</label>
                        <div class="col-md-9">
                          <small>biarkan password jika tidak ingin mengganti password</small>
                          <input class="form-control" type="Password" name="pass" value="<?= $this->input->post('pass') ?>">
                          <?=form_error('pass') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input"> Ulang Password</label>
                        <div class="col-md-9">
                          <input class="form-control" type="Password" name="rpass" value="<?= $this->input->post('rpass') ?>">
                          <?=form_error('rpass') ?>
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input"> Level</label>
                         <div class="form-group col-sm-4">
                        <select class="form-control" name="level">
<?php if ($user->Level =='Admin'): ?>

                          <option value="Admin" selected>Admin</option>
                           <option value="Siswa">Siswa</option>
    <?php else: ?>
                            <option value="Admin">Admin</option>
                           <option value="Siswa" selected>Siswa</option>
                        <?php endif; ?>
                        <?=form_error('level') ?>
                        </select>

                      </div>
                      </div>
                    
                        <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit" >
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
    <?php $this->load->view("includes/footer.php")?>  