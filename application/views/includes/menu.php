 
 <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('index') ?>">
                <i class="nav-icon icon-speedometer"></i> Dashboard
                
              </a>
            </li>
            <?php if($this->session->userdata('Level')==='Admin'):?>
            <li class="nav-title">Data</li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('roti/c_roti') ?>">
                <i class="nav-icon icon-drop"></i>Ekstrakulikuler</a>
            </li>
             
      
            <li class="nav-title">Perhitungan</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i> Ekstrakulikuler</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('produksi/c_produksi') ?>">
                    <i class="nav-icon icon-list"></i>Daftar Ekstrakulikuler</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('pengetahuan/C_pengetahuan') ?>">
                    <i class="nav-icon icon-list"></i> Daftar Perhitungan</a>
                </li> 
               
              </ul>
            </li>

            <li class="nav-title">Variabel</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i> Variabel</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('Variabel') ?>">
                    <i class="nav-icon icon-list"></i>Daftar Variabel</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('admin/variabel/tampil') ?>">
                    <i class="nav-icon icon-list"></i> Daftar Perhitungan</a>
                </li>  -->
               
              </ul>
            </li>
              <li class="nav-title">Cek</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i> Cek</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('Cek') ?>">
                    <i class="nav-icon icon-list"></i>Cek Perhitungan</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('admin/variabel/tampil') ?>">
                    <i class="nav-icon icon-list"></i> Daftar Perhitungan</a>
                </li>  -->
               
              </ul>
            </li>
      <li class="nav-title">Perhitungan</li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('Laporan_produksi/C_laporan') ?>">
                <i class="nav-icon icon-list"></i>Laporan Bulanan</a>
            </li>
            
            
   
      
     
         
            <li class="divider"></li>
            <li class="nav-title">Pengaturan</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-people"></i> Akun</a>
              <ul class="nav-dropdown-items">
              
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('akun/c_akun') ?>"target="_top">
                    <i class="nav-icon icon-user-follow"></i> Kelola akun</a>
                </li>
              
               
              </ul>
            </li>



        
            <?php elseif($this->session->userdata('Level')==='Siswa'):?>
              
              <li class="nav-title">Data</li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url('roti/c_roti') ?>">
                <i class="nav-icon icon-drop"></i>Ekstrakulikuler</a>
            </li>
             
      
            <li class="nav-title">Produksi</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i> Produksi</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('produksi/c_produksi') ?>">
                    <i class="nav-icon icon-list"></i>Daftar Produksi</a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link" href="<?= site_url('pengetahuan/C_pengetahuan') ?>">
                    <i class="nav-icon icon-list"></i> Daftar Perhitungan</a>
                </li>
               
              </ul>
            </li>
      
        
            <?php endif;?>
             <li class="nav-item">
              <a class="nav-link nav-link-danger" onclick="return confirm('Apakah anda ingin logout')" href="<?= site_url('login/out/') ?>">
                <i class="nav-icon cui-account-logout"></i> Log Out</a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
       
