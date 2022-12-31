

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
					
                  <div class="card-body">
				  <a class="btn btn-primary" href="<?php echo base_url('admin/variabel/tambah') ?>"><i class="fa fa-plus"></i> Tambah Kriteria</a>
                    <table class="table table-responsive-sm table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                       <th>Aksi</th>
                          </div>
                        </tr>
                      </thead>
       
                      <tbody>
						
<!-- <div class="table-responsive">
	<table class="table table-condensed table-hover table-striped" id="thetable">
		<thead>
			<tr>
				<td width="5%">Nomor</td>
				<td width="80%">Nama</td>
				<td width="30%">Opsi</td>
			</tr>
		</thead>
		<tbody> -->
			<?php foreach ($variabel as $index => $data): ?>
				<tr>
					<td><?php echo $index+1 ?></td>
					<td><?php echo $data['nama_variabel'] ?></td>
					<td>
						<a href="<?php echo base_url("index.php/variabel/ubah/".$data['id_variabel']) ?>"><i class="fa fa-edit"></i> Edit</a>
						<a href="<?php echo base_url("admin/variabel/hapus/".$data['id_variabel']) ?>" onclick="return confirm('Apakah Anda Akan Menghapus Faktor Risiko Ini?')"><i class="fa fa-trash"></i> Hapus</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>


<!-- <?php $this->load->view("includes/footer"); ?>