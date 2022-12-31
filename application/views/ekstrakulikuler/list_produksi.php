<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Produksi</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i><strong>Produksi</strong></div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Tanggal/Bulan/Tahun</th>
                          <th>Nama Ekstra</th>
                          <th>K1</th>
                          <th>K2</th>
                          <th>K3</th>
                          <th>Jumlah produksi</th>
                       <th>Aksi</th>
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>

<?php 
$no=1;
foreach ($detail_produksi as $p): 

?>


                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= date('d/m/Y',strtotime($p->Tanggal_Produksi));?></td>
                          <td><?= $p->Nama; ?></td>
                          <td><?= $p->K1; ?></td>
                          <td><?= $p->K2; ?></td>
                          <td><?= $p->K3; ?></td>
                          <td><strong><?= ceil($p->Total_produksi); ?></strong></td>
                          <td>
                           <div class="form-group row">
                           <form  action="<?= site_url('produksi/c_produksi/hapus/'.$p->Id_produksi) ?>" method="post" >
                            
                          <fieldset>
                            
                            <button onclick= "return confirm('yakin hapus data produksi')" type="submit" class="btn btn-secondary btn-danger" >Hapus</button>
                          </fieldset>

                        </form>
                       
                        
                      
                      </div>
                          </td>
                        </tr>
                       
                   <?php endforeach; ?>
                
                      </tbody>

                    </table>
                   <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                     <form action="<?= site_url('produksi/c_produksi/cetak/'.$p->Tanggal_Produksi) ?>" method="post" target="_blank">
                            
                          <fieldset>
                           
                            <button type="submit"  class="btn btn-secondary btn-warning"><i class="icons cui-print"></i>Print</button>
                          </fieldset>

                        </form>
                  </div>
                    <nav>
                     
       
                    </nav>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
     </div>
     <?php $this->load->view("includes/footer.php") ?>
      


