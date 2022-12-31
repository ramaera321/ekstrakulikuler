
<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
         
          <li class="breadcrumb-item active">Ekstrakulikuler</li>
          <!-- Breadcrumb Menu-->
          
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Daftar Ekstrakulikuler</div>
                  <?php echo $this->session->flashdata('pesan'); ?>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Nama Ekstra</th>
                          
                          <th>Aksi</th>
                        </tr>
                      </thead>
       
                      <tbody>
                 <?php
                 $no = $this->uri->segment('4') + 1;
                  foreach ($nama_ekstra as $roti){
                    ?>
                          <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $roti->Nama; ?></td>
                         
                          <td>
                          <div class="form-group row">
                            <form action="<?php echo site_url('roti/c_roti/delete/'.$roti->Id_ekstra) ?>" >
                          <fieldset>
                            <button onclick="return confirm('Yakin Hapus Data Ekstrakulikuler?')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                          </fieldset>
                        </form>
                         
                        
                         <form action="<?php echo site_url('roti/c_roti/edit/'.$roti->Id_ekstra) ?>" >
                          <fieldset>
                             <button type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                          </fieldset>
                        </form>
                      </div>
                          </td>

                        </tr>
                  
                       
                <?php } ?>
                
                      </tbody>

                    </table>
                       <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                    <a href="<?php echo site_url('roti/c_roti/add') ?>">
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

<?php $this->load->view("includes/footer.php")?>

