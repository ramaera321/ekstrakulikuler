<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">Tambah Ekstrakulikuler</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Tambah Ekstrakulikuler</strong>
                    </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php echo site_url('roti/c_roti/add') ?>" method="post" >
                     
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama Ekstra</label>
                        <div class="col-md-9">
                          <input  type="" class="form-control" type="text" name="name" placeholder="Nama Ekstra">
                         <?= form_error('name') ?>
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

<?php $this->load->view("includes/footer.php")?>
