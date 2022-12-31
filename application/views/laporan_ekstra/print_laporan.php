<!DOCTYPE html>
<html>
<head>
  <title>Laporan Produksi</title>

 
    <!-- Icons-->
    <link href="<?php echo base_url('assets/@coreui/icons/css/coreui-icons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/flag-icon-css/css/flag-icon.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/simple-line-icons/css/simple-line-icons.css') ?>" rel="stylesheet">
    <!-- Main styles for this application-->
   
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

  
</head>
<body onload="window.print()">

          <div class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <img class="navbar-brand-minimized pull-right" src="<?= base_url('img/brand/MIN.png') ?>" width="100" height="100" alt="CoreUI Logo">
      </div>
      <div class="col-md-7">
       <label>
        <H1 style="
        margin-top: 18px;">Ekstrakulikuler</H1>
        <H3>Laporan Produksi</H3>
      </label>
    </div>
  </div>
</div>

<hr>

<div class="card-header">
 <strong><?= $pro; ?></strong></div>
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

      </div>
    </tr>
  </thead>

  <tbody>

    <?php 
    $no=1;
    foreach ($lap as $p): 
     
      ?>


      <tr>
        <td><?= $no++; ?></td>
        <td><?= date('d/m/Y',strtotime($p->Tanggal_Produksi));?></td>
        <td><?= $p->Nama; ?></td>
        <td><?= $p->K1; ?></td>
        <td><?= $p->K2; ?></td>
        <td><?= $p->K3; ?></td>
        <td><strong><?= $p->Total_produksi; ?></strong></td>

      </tr>

      <?php

    endforeach;

    ?>

  </tbody>

</table>
<div class="col-md-11 col-md-offset-8 text-right">
  <strong><?= $total_pro; ?></strong>
</div>
</body>
<footer class="app-footer">
   
    </footer>
    <!-- CoreUI and necessary plugins-->
   <script src="<?php echo base_url('assets/jquery/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/popper.js/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/pace-progress/js/pace.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/perfect-scrollbar/js/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/@coreui/coreui/js/coreui.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
     <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
    
    <!-- Plugins and scripts required by this view-->
    <script src="<?php echo base_url('assets/chart.js/js/Chart.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js') ?>"></script>

</html>        
                  
          
           <!-- /.col-->
           


