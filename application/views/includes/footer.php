 <footer class="app-footer">
        
      <div class="ml-auto">
        <span>SMA Muhammadiyah 1 Taman Sidoarjo</span>
        <a href="<?= site_url('index');?>">Ekstrakulikuler</a>
      </div>
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
      <script>
    $(document).ready(function(){
        setDateRangePicker(".tanggal1", ".tanggal2")
    })
    </script>
  </body>
</html>
 