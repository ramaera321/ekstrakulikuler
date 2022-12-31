

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?>

<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
      
          <li class="breadcrumb-item active">Daftar Kriteria</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
	
           <div class="row">
           <div class="container-fluid">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Nama Kriteria</div>
<h3>Edit Kriteria</h3>
	<hr>
	<form method="post">
		<div class="form-group">
			<label>Nama Kriteria</label>
			<input style="width: 40%" class="form-control" type="text" name="nama_variabel" value="<?php echo $variabel['nama_variabel']?>">
		</div>
		<div class="form-group">
			<button class="btn btn-primary">Simpan</button>
			<a class="btn btn-primary" href="<?php echo base_url("index.php/variabel") ?>">Batal</a>
		</div>
	</form>
	<?php if($gagal): ?>
		<div class="alert alert-danger"><?php echo $gagal ?></div>
	<?php endif ?>