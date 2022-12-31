<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

        
  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="index.php?module=home">Daftar Akun</a>
          </li>
          
          <!-- Breadcrumb Menu-->
         
        </ol>
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Daftar Akun</div>
                    <?php echo $this->session->flashdata('pesan'); ?>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>no</th>
                          <th>Nama</th>
                          <th>Username</th>
                          
                          <th>level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
       
                      <tbody>
                        <?php 
                        $no= $this->uri->segment('4')+1;
                        foreach ($user as $u): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $u->Nama;?></td>
                          <td><?php echo $u->Username;?></td>
                         
                          <td><?php echo $u->Level;?></td>
                          <td>
                              <div class="row">
                           <form action="<?php echo site_url('akun/c_akun/delete/'.$u->Id_user) ?>">
                            <button  onclick= "return confirm('yakin hapus akun')" type="submit"  class="btn btn-secondary btn-danger">Hapus</button>
                          </form>
                          <form action="<?php echo site_url('akun/c_akun/edit/'.$u->Id_user.$u->Level) ?>">
                           <button  type="submit"  class="btn btn-secondary btn-dark">Edit</button>
                         </form>
                       </div>
                          </td>
                        </tr>
                       
         
                <?php endforeach; ?>
                      </tbody>

                    </table>
                       <div  class="col-6 col-sm-4 col-md mb-3 mb-xl-0 text-center">
                    <a href="<?= site_url('akun/c_akun/add') ?>">
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

