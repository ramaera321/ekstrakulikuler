<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="index.php?module=list_tanggal">List Tanggal Perhitungan</a>
          </li>
          <li class="breadcrumb-item active">List Hitung</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> List Hitung</div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Tanggal/Bulan/Tahun</th>
                          <th>Nama Ekstra</th>
                          
                       <th>Aksi</th>
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>
<?php 
$no=1;
foreach ($detail_tanggal as $d):  
      ?>
   
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo date('d/m/Y',strtotime($d->tanggal));?></td>
                          <td><?php echo 'ekstra '.$no; ?></td>
                          
                          <td>
                           <div class="form-group row">
                           <form action="<?= site_url('pengetahuan/c_pengetahuan/hapus/'.$d->Id_perhitungan)?>" method="post">
                            
                          <fieldset>
                            <button  onclick= "return confirm('yakin hapus data')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                          </fieldset>

                        </form>
                       
                          <fieldset>
                            
                             <a href="<?= site_url('pengetahuan/c_pengetahuan/edit/'.$d->Id_perhitungan) ?>">
                             
                             <button type="button"  class="btn btn-secondary btn-dark">Edit</button>
                         </a>
                          </fieldset>

                         <form action="<?= site_url('produksi/c_produksi/hitung/'.$d->Id_perhitungan) ?>" >
                            <input type="hidden" name="id_p" value="<?php echo $d->Id_perhitungan ?>">
                          <fieldset>
                         
                            <button type="submit"  class="btn btn-secondary btn-warning">Hitung</button>
                          </fieldset>

                        </form>
                      </div>
                          </td>
                        </tr>
                        
                <?php endforeach; ?>
                      </tbody>

                    </table>
                  
                  
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
      </div>
      <?php $this->load->view("includes/footer"); ?>