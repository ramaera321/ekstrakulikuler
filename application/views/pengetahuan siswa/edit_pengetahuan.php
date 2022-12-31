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
          <li class="breadcrumb-item active">Edit Perhitungan</li>
          <!-- Breadcrumb Menu-->
        
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>hitung</strong>
                    </div>
                    <?= $this->session->flashdata('pesan') ?>
                     
                  <div class="card-body">
                    <?php foreach($detail_pengetahuan as $p): ?>
                      <form class="form-horizontal" action="<?php site_url('pengetahuan/c_pengetahuan/edit'. $p->Id_perhitungan) ?>" method="post" >
                       <input class="form-control"  type="hidden" name="id" placeholder="Text" value="<?= $p->Id_perhitungan ?>">

                       <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama Ekstra</label>

                        <div class="form-group col-sm-4">
                          <select class="form-control" name="Id_ekstra">
                           <?php foreach ($roti as $r):
                            ?>

                            <option value="<?= $r->Id_ekstra ?>" <?= $r->Id_ekstra == $p->Id_ekstra ? "selected" : null ?>><?= $r->Nama ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?=form_error('Id_ekstra') ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                      <div class="col-sm-4">
                        <input  class="form-control tanggal1" type="text" name="tanggal" placeholder="Text" value="<?= $this->input->post('tanggal') ?? date('d-m-Y',strtotime($p->tanggal)) ?>"> 
                        <?=form_error('tanggal') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K1 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K1_min" placeholder="Text" value="<?= $this->input->post('K1_min') ?? $p->K1_cukup ?>">
                        <?=form_error('K1_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K1 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K1_max" placeholder="Text" value="<?= $this->input->post('K1_max') ?? $p->K1_baik ?>">
                        <?=form_error('K1_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K2 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K2_min" placeholder="Text" value="<?= $this->input->post('K2_min') ?? $p->K2_cukup ?>">
                        <?=form_error('K2_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K2 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K2_max" placeholder="Text" value="<?= $this->input->post('K2_max') ?? $p->K2_baik ?>">
                        <?=form_error('K2_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K3 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K3_min" placeholder="Text" value="<?= $this->input->post('K3_min') ?? $p->K3_cukup ?>">
                        <?=form_error('K3_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K3 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K3_max" placeholder="Text" value="<?= $this->input->post('K3_max') ?? $p->K3_baik ?>">
                        <?=form_error('K3_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K4 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K4_min" placeholder="Text" value="<?= $this->input->post('K4_min') ?? $p->K4_cukup ?>">
                        <?=form_error('K4_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K4 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K4_max" placeholder="Text" value="<?= $this->input->post('K4_max') ?? $p->K4_baik ?>">
                        <?=form_error('K4_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K5 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K5_min" placeholder="Text" value="<?= $this->input->post('K5_min') ?? $p->K4_cukup ?>">
                        <?=form_error('K5_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K5 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K5_max" placeholder="Text" value="<?= $this->input->post('K5_max') ?? $p->K4_baik ?>">
                        <?=form_error('K5_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K6 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K6_min" placeholder="Text" value="<?= $this->input->post('K6_min') ?? $p->K4_cukup ?>">
                        <?=form_error('K6_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K6 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K6_max" placeholder="Text" value="<?= $this->input->post('K5_max') ?? $p->K4_baik ?>">
                        <?=form_error('K6_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">K7 Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K7_min" placeholder="Text" value="<?= $this->input->post('K7_min') ?? $p->K4_cukup ?>">
                        <?=form_error('K7_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">K7 Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="K7_max" placeholder="Text" value="<?= $this->input->post('K5_max') ?? $p->K4_baik ?>">
                        <?=form_error('K7_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Futsal Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="nilai_ekstra_min" placeholder="Text" value="<?= $this->input->post('nilai_ekstra_min') ?? $p->nilai_ekstra_cukup ?>">
                        <?=form_error('nilai_ekstra_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Futsal Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="nilai_ekstra_max" placeholder="Text" value="<?= $this->input->post('nilai_ekstra_max') ?? $p->nilai_ekstra_baik ?>">
                        <?=form_error('nilai_ekstra_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Bulutangkis Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="EkstraBulutangkis_min" placeholder="Text" value="<?= $this->input->post('EkstraBulutangkis_min') ?? $p->EkstraBulutangkis_cukup ?>">
                        <?=form_error('EkstraBulutangkis_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Bulutangkis Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="EkstraBulutangkis_max" placeholder="Text" value="<?= $this->input->post('EkstraBulutangkis_max') ?? $p->EkstraBulutangkis_baik ?>">
                        <?=form_error('EkstraBulutangkis_max') ?>
                      </div>
                    </div>



                    
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button class="btn btn-sm btn-danger" type="reset">
                          <i class="fa fa-ban"></i> Reset</button>

                        </div>

                      </form>
               <?php endforeach; ?>
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
