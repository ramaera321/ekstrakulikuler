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
                    
                 <form class="form-horizontal"
                                    action="<?=site_url('produksi/c_produksi/saveData')?>"
                                    method="post">
                                    
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label"
                                            for="text-input">K1</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K1"
                                                value="92">
                                            <?=form_error('K1')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K2</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K2"
                                                value="89">
                                            <?=form_error('K2')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K3</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K3"
                                                value="178">
                                            <?=form_error('K3')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K4</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K4"
                                                value="90">
                                            <?=form_error('K4')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K5</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K5"
                                                value="87">
                                            <?=form_error('K5')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K6</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K6"
                                                value="86">
                                            <?=form_error('K6')?>
                                        </div>
                                        <label class="col-md-2 col-form-label" for="text-input">K7</label>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="number" name="K7"
                                                value="88">
                                            <?=form_error('K7')?>
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

                    <!-- <div class="form-group row">
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
                    </div> -->
                    <!-- <div class="form-group row">
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
                    </div> -->
                    
                    
                    

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
