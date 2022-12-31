<!DOCTYPE html>

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Ekstrakulikuler</title>
    <!-- Icons-->
    <link href="<?php echo base_url('assets/@coreui/icons/css/coreui-icons.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/flag-icon-css/css/flag-icon.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/simple-line-icons/css/simple-line-icons.css') ?>" rel="stylesheet">
    <!-- Main styles for this application-->
   
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/pace-progress/css/pace.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('index'); ?>">
        <img class="navbar-brand-full" src="<?= base_url('img/brand/JONA.png') ?>" widt="120" height="40" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="<?= base_url('img/brand/MIN.png') ?>" width="30" height="30" alt="CoreUI Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
     
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
         
            <i class="nav-icon icon-user"></i>
            <span><b>
              <?php  echo $this->session->userdata("Nama") ?>
</b>
            </span>
         
        </li>

      </ul>
      <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
       
      </button>
     
    </header>
    
