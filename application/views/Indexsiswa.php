<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.5
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->


<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menusiswa.php") ?>
<script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>
 <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
          
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
         
            <!-- /.row-->
  
            <!-- /.card-->
         
            <!-- /.row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Total Pilihan Ekstrakulikuler</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="<?php site_url('Index/indexsiswa') ?>" method="get" >
                    <div class="form-group row">

                        <label class="col-md-2 col-form-label" for="birthday">Tanggal Awal</label>
                        <div class="col-sm-2">
                          <input  class="form-control" type="date" name="tanggal1" placeholder="Tanggal Awal" value="<?= @$_GET['tanggal1']?>" > 
                        </div>
                          <label class="col-md-2 col-form-label" for="birthday">Tanggal Akhir</label>
                        <div class="col-sm-2">
                          <input  class="form-control" type="date" name="tanggal2" placeholder="Tanggal Akhir" value="<?= @$_GET['tanggal2']?>"> 
                        </div>
                        <br>
                 <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
            
                </div>
                    </form>
                    <!-- /.row-->
                    <br>
                    <canvas id="myChart"></canvas>
    <?php
    //Inisialisasi nilai variabel awal
    $tanggal= "";
    $total=null;
    foreach ($chart as $item)
    {
        $tgl=date('d-m-Y',strtotime($item->Tanggal_Produksi));
        $tanggal .= "'$tgl'". ", ";
        $tl=ceil($item->total);
        $total .= "$tl". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $tanggal; ?>],
            datasets: [{
                label:'Tanggal Total Pilihan Ekstrakulikuler',
              
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                               
                data: [<?php echo $total; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
            </div>
                  </div>
                </div>
              </div>



               
              <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Total Data</div>
                  <div class="card-body">
                    <br>
                    <div class="row">
               <?php foreach ($roti as $r ):
               ?>
              
               <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" >K1 :&nbsp 10</a>
                        
                      </div>
                    </div>
                    <div class="text-value"><?php echo $r->total; ?></div>
                    <div>Ekstrakulikuler</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:50px;">
                     <canvas class="chart" id="card-chart2" height="50"></canvas>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
              <?php foreach ($akun as $a ):
               ?>
              
               <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" >K1 :&nbsp 10</a>
                        
                      </div>
                    </div>
                    <div class="text-value"><?php echo $a->total; ?></div>
                    <div>Total Akun</div>
                  </div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:50px;">
                     <canvas class="chart" id="card-chart1" height="50"></canvas>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            </div>



                  </div>
                </div>
                </div>
              </div>
            
          
</div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>
      </main>



   </div>
 
<?php $this->load->view("includes/footer.php")?>

