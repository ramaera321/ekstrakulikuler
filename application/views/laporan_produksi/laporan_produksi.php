<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

  <main class="main">
    
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Laporan Produksi</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i><strong><?= $pro;?></strong></div>
                  <div class="card-body">
                       <form class="form-horizontal" action="<?php site_url('Laporan_produksi/C_laporan') ?>" method="get" >
                    <div class="form-group row">

                        <label class="col-md-2 col-form-label" for="birthday">Tanggal Awal</label>
                        <div class="col-sm-2">
                          <input  class="form-control" type="date" name="tanggal1" placeholder="Tanggal Awal" for="Date of Birth" value="<?= @$_GET['tanggal1'] ?>" autocomplete="off" > 
                        </div>
                          <label class="col-md-2 col-form-label" for="birthday">Tanggal Akhir</label>
                        <div class="col-sm-2">
                          <input  class="form-control " type="date" name="tanggal2" placeholder="Tanggal Akhir" for="Date of Birth" value="<?= @$_GET['tanggal2'] ?>" autocomplete="off" > 
                        </div>
                        <br>
                 <button class="btn btn-sm btn-primary"  type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
                   
                
                </div>
                    </form>
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
                     
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>

<?php 
$no=$this->uri->segment('4')+1;
foreach ($laporan as $p): 

?>


                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= date('d/m/Y',strtotime($p->Tanggal_Produksi));?></td>
                          <td><?= $p->Nama; ?></td>
                          <td><?= $p->K1; ?></td>
                          <td><?= $p->K2; ?></td>
                          <td><?= $p->K3; ?></td>
                          <td><strong><?= ceil($p->Total_produksi); ?></strong></td>
                         <td> </td>
                        </tr>
                       
                   <?php endforeach; ?>
                
                      </tbody>
                 
                    </table>
                  <div class="col-md-11 col-md-offset-11 text-right">
                    <strong><?= $total_pro; ?></strong>
                </div>
                   <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                     <form action="<?= site_url('Laporan_produksi/C_laporan/print') ?>"  method="get" target="_blank">
                           <input type="hidden" name="tanggal1" value="<?= @$_GET['tanggal1'] ?>">
                          <input type="hidden" name="tanggal2" value="<?= @$_GET['tanggal2'] ?>">
                          <fieldset>  
                            <button type="submit"  class="btn btn-secondary btn-warning"><i class="icons cui-print"></i>Print</button>
                          </fieldset>

                        </form>
                  </div>

                  <?php if (empty($tanggal1) && empty($tanggal2)): ?>
                  <nav>
                    <ul class="pagination">
                      <li class="page-item">
                       <?php 
                       echo @$pagination;
                       ?>
                     </li>
                   </ul> 
                 </nav>
                 
                 <?php else : ?>
                  
                <?php endif; ?>


                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
     </div>
     <?php $this->load->view("includes/footer.php") ?>
      


