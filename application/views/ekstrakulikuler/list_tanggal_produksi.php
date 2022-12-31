<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

        
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">List Tanggal Produksi</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i><strong>Tanggal produksi</strong></div>
                  <?php echo $this->session->flashdata('pesan'); ?>   
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Tanggal/Bulan/Tahun</th>
                         <th>Jumlah Ekstrakulikuler</th>
                       <th>Aksi</th>
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>
<?php 
$no=$this->uri->segment('4')+1;
foreach ($produksi as $p):
  

?>
                        <tr>
                          <td><?php echo $no++ ;?></td>
                          <td><?php echo date('d/m/Y',strtotime($p->Tanggal_Produksi));?></td>
                         <td><?php echo $p->total ;?></td>
                          
                          <td>
                           <div class="form-group row">
                           
                       
                        
                          <fieldset>
                            <form action="<?php echo site_url('produksi/c_produksi/lihat/'.$p->Tanggal_Produksi) ?>">
                           
                             <button type="submit"  class="btn btn-secondary btn-dark">Lihat</button>
                          </form>
                          </fieldset>
                      
                        
                      </div>
                          </td>
                        </tr>
                       
                <?php endforeach; ?>
                
                      </tbody>

                    </table>
                   
                      
              
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

