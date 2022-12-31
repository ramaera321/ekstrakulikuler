<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Perhitungan</a>
          </li>
          <li class="breadcrumb-item active">Tambah Hitungan</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>Input Pengetahuan</strong>
                    
                    </div>
                    <?= $this->session->flashdata('pesan'); ?> 
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="<?php site_url('pengetahuan/c_pengetahuan/addP') ?>" method="post" >
                      
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama Ekstra</label>
                        
                        <div class="form-group col-sm-4">
                          <select class="form-control" name="Id_ekstra">
                            <option></option>
                            <?php foreach ($roti as $r): ?>
                              
                             <option value="<?= $r->Id_ekstra ?>"<?= set_value('Id_ekstra') == $r->Id_ekstra ? "selected" : null?>><?= $r->Nama ?></option>
                           <?php endforeach; ?>
                         </select>
                         <?= form_error('Id_ekstra')?>
                       </div>
                     </div>

                     <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                      <div class="col-sm-4">
                        <input  class="form-control tanggal1" type="text" name="tanggal" placeholder="Tanggal" value="<?= set_value('tanggal') ?>"> 
                        <?= form_error('tanggal') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K1 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K1_min" placeholder="K1 Minimal" value="<?= set_value('K1_min')?>">
                        <?= form_error('K1_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K1 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K1_max" placeholder="K1 Maksimal" value="<?= set_value('K1_max')?>">
                        <?= form_error('K1_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K2 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K2_min" placeholder="K2 Minimal" value="<?= set_value('K2_min')?>">
                        <?= form_error('K2_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K2 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K2_max" placeholder="K2 Maksimal" value="<?= set_value('K2_max')?>">
                        <?= form_error('K2_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K3 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K3_min" placeholder="K3 Minimal" value="<?= set_value('K3_min')?>">
                        <?= form_error('K3_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K3 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="K3_max" placeholder="K3 Maksimal" value="<?= set_value('K3_max')?>" >
                        <?= form_error('K3_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="EkstraBulutangkis_min" placeholder="Produksi Minimal" value="<?= set_value('EkstraBulutangkis_min')?>">
                        <?= form_error('EkstraBulutangkis_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="EkstraBulutangkis_max" placeholder="Produksi Maksimal" value="<?= set_value('EkstraBulutangkis_max')?>" >
                        <?= form_error('EkstraBulutangkis_max') ?>
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
<?php $this->load->view("includes/footer"); ?>
