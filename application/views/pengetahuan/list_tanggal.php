<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

        
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">List Tanggal Perhitungan</li>
          <!-- Breadcrumb Menu-->
        
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Tanggal perhitungan</div>
                  <?php echo $this->session->flashdata('pesan'); ?>  
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Tanggal/Bulan/Tahun</th>
                         <th>Jumlah perhitungan</th>
                       <th>Aksi</th>
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>
<?php 
$no=$this->uri->segment('4')+1;
foreach ($pengetahuan as $p):
  

?>
                        <tr>
                          <td><?php echo $no++ ;?></td>
                          <td><?php echo date('d/m/Y',strtotime($p->tanggal))?></td>
                         <td><?php echo $p->total ;?></td>
                          
                          <td>
                           <div class="form-group row">
                           
                       
                        
                          <fieldset>
                            <form action="<?php echo site_url('pengetahuan/c_pengetahuan/lihat/'.$p->tanggal) ?>">
                           
                             <button type="submit"  class="btn btn-secondary btn-dark">Lihat</button>
                          </form>
                          </fieldset>
                      
                        
                      </div>
                          </td>
                        </tr>
                       
                <?php endforeach; ?>
                
                      </tbody>

                    </table>
                   
                       <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                  <a href="<?php echo site_url('pengetahuan/c_pengetahuan/addP') ?>">
                    <button class="btn btn-primary" type="button">
                      <i class="icon-plus "></i> Tambah</button></a>
                  </div>
             
                    <nav>
                      <ul class="pagination">
<li class="page-item">
   <?php 
  echo $pagination;
  ?>
   </li>
                                        </ul> 
                    </nav>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            </div>
       </main>
     </div>
      <?php $this->load->view("includes/footer"); ?>

