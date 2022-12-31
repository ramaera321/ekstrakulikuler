<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?> 

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            Perhitungan
          </li>
          <li class="breadcrumb-item active">Proses hitung</li>
          <!-- Breadcrumb Menu-->
         
        </ol>


        
        <div class="container-fluid justify-content-center">
          <div class="animated fadeIn">

          <div class="row d-flex justify-content-center">
              <div class="col-md-6">
                <div class="card">

                <div class="card-header">
                    <strong>Fuzzy Tsukamoto</strong>
                  </div>

                <div class="card-body">
                  <form class="form-horizontal" action="<?= site_url('produksi/C_produksi/simpan_produksi') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="Id_p" value="<?= $Id ?>">
                        <input type="hidden" name="tgl_p" value="<?= $tgl_p ?>">
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">K1</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="K1" value="<?= $K1 ?>" readonly>
                     
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">K2 terakhir</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="K2" value="<?=$K2 ?>"readonly>
                     
                        </div>
                          <label class="col-md-2 col-form-label" for="text-input">K3</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="K3" value="<?= $K3 ?>"readonly>
                      
                        </div>
                      </div>

                      <div class="form-group">
                        <label>1. K1 <strong>Banyak</strong> AND K2 <strong>Banyak</strong> AND K3 <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>2. K1 <strong>Banyak</strong> AND K2 <strong>Banyak</strong> AND K3 <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>3. K1 <strong>Banyak</strong> AND K2 <strong>Sedikit</strong> AND K3 <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>4. K1 <strong>Banyak</strong> AND K2 <strong>Sedikit</strong> AND K3 <strong>Sedikit</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>5. K1 <strong>Sedikit</strong> AND K2 <strong>Banyak</strong> AND K3 <strong>Banyak</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>6. K1 <strong>Sedikit</strong> AND K2 <strong>Banyak</strong> AND K3 <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>7. K1 <strong>Sedikit</strong> AND K2 <strong>Sedikit</strong> AND K3 <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>8. K1 <strong>Sedikit</strong> AND K2 <strong>Sedikit</strong> AND K3 <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                    
                   </div>
                   <hr>
                   <div class="text-align-center">
                     <p><strong>Nilai Keanggotaan</strong></p>
                   </div>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>Fungsi Keanggotaan</th>
                          <th>Nilai</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>K1 Sedikit</td>
                          <td><?= $K1Cu ?></td>
                        </tr>
                        <tr>
                          <td>K1 Banyak</td>
                          <td><?= $K1Ba ?></td>
                       
                        </tr>
                        <tr>
                          <td>K2 Sedikit</td>
                          <td><?= $K2Cu ?></td>
                        
                        </tr>
                        <tr>
                          <td>K2 Banyak</td>
                          <td><?= $K2Ba?></td>
                        
                        </tr>
                        <tr>
                          <td>K3 Sedikit</td>
                          <td><?= $K3Cu ?></td>
                         
                        </tr>
                        <tr>
                          <td>K3 Banyak</td>
                          <td><?= $K3Ba ?></td>
                         
                        </tr>
                      </tbody>
                    </table>
                   <hr>
                   <p><strong>Hasil Dari Aturan</strong></p>
                   <table class="table table-responsive-sm table-bordered table-striped table-sm" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>Aturan</th>
                          <th>Nilai MIN</th>
                          <th></th>
                          <th>Nilai Z</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Aturan 1</td>
                          <td><?= $a1 ?></td>
                          <td>----></td>
                          <td><?= $z1 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 2</td>
                          <td><?= $a2 ?></td>
                          <td>----></td>
                          <td><?= $z2 ?></td>
                       
                        </tr>
                        <tr>
                          <td>Aturan 3</td>
                          <td><?= $a3 ?></td>
                          <td>----></td>
                          <td><?= $z3 ?></td>
                        
                        </tr>
                        <tr>
                          <td>Aturan 4</td>
                          <td><?= $a4 ?></td>
                          <td>----></td>
                          <td><?= $z4 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 5</td>
                          <td><?= $a5 ?></td>
                          <td>----></td>
                          <td><?= $z5 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 6</td>
                          <td><?= $a6 ?></td>
                          <td>----></td>
                          <td><?= $z6 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 7</td>
                          <td><?= $a7 ?></td>
                          <td>----></td>
                          <td><?= $z7 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 8</td>
                          <td><?= $a8 ?></td>
                          <td>----></td>
                          <td><?= $z8 ?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <hr>
                    <p><strong>Defuzzifikasi</strong></p>
                    <div class="form-group">
                     <p>Total Rata-rata dari tiap aturan =<strong><?= $z ?></strong></p>
                        <div class="text-align-center">
                           <h4>Produksi = <?= round($z,0,PHP_ROUND_HALF_DOWN) ?></h4>
                           <input type="hidden" name="z" value="<?= round($z,0,PHP_ROUND_HALF_DOWN) ?>">
                          </div>
                   </div>
                                         
                  </div>

                  
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Simpan</button>
                    
                      <a href="<?=site_url('produksi/C_produksi/hitung/'.$Id) ?>">
                      <button class="btn btn-sm btn-danger" >Kembali</button>
                      </a>
                  
                   </div>

                  </form>

                </div>


                 
                 
              
              </div>
              
              <!-- /.col-->
            </div>
          
        </div>
          
        </div>


       </main>
      </div>
<?php $this->load->view("includes/footer"); ?>


