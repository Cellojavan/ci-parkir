<?php
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>/dist/css/adminlte.min.css">
<body class="hold-transition sidebar-mini">

<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>/dist/img/2526586_transportation_vehicle_icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Parkir</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>/dist/img/352174_user_icon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><?=$this->session->userdata("nama_user")?></a>

        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
               <?php if($this->session->userdata("hak_akses") == "admin") { ?>
		
    <li class="nav-item">
         <a href="<?= base_url()?>dashboard" <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-users">&nbsp</i>
         <p>
             Dashboard
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>user" <?=$this->uri->segment(1) == 'user' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-users">&nbsp</i>
         <p>
             User
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>kendaraan" <?=$this->uri->segment(1) == 'kendaraan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-car">&nbsp</i>    
         <p>
             Jenis Kendaraan
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>P_parkir" <?=$this->uri->segment(1) == 'P_parkir' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-parking">&nbsp&nbsp</i>
         <p>
             Parkir
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>petugas" <?=$this->uri->segment(1) == 'petugas' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-user-cog">&nbsp</i>
         <p>
             Petugas
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>lokasi" <?=$this->uri->segment(1) == 'lokasi' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-map-marker-alt">&nbsp&nbsp</i>
         <p>
             Lokasi
         </p>
         </a>       
     </li>
     <li class="nav-item">
         <a href="<?= base_url()?>laporan" <?=$this->uri->segment(1) == 'laporan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-file">&nbsp&nbsp</i>
         <p>
             Laporan
         </p>
         </a>       
     </li>
   <?php } ?>
   <?php if($this->session->userdata("hak_akses") == "manager") { ?>
    <li class="nav-item">
         <a href="<?= base_url()?>kendaraan" <?=$this->uri->segment(1) == 'kendaraan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-car">&nbsp</i>    
         <p>
             Jenis Kendaraan
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>P_parkir" <?=$this->uri->segment(1) == 'parkir' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-parking">&nbsp&nbsp</i>
         <p>
             Parkir
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>petugas" <?=$this->uri->segment(1) == 'petugas' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-user-cog">&nbsp</i>
         <p>
             Petugas
         </p>
         </a>       
     </li>
     <li class="nav-item">
         <a href="<?= base_url()?>laporan" <?=$this->uri->segment(1) == 'laporan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-file">&nbsp&nbsp</i>
         <p>
             Laporan
         </p>
         </a>       
     </li>
   <?php } ?>
   <?php if($this->session->userdata("hak_akses") == "petugas") { ?>
    <li class="nav-item">
         <a href="<?= base_url()?>dashboard" <?=$this->uri->segment(1) == 'dashboard' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-users">&nbsp</i>
         <p>
             Dashboard
         </p>
         </a>       
     </li>
     <li class="nav-item">
         <a href="<?= base_url()?>P_parkir" <?=$this->uri->segment(1) == 'P_parkir' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-parking">&nbsp&nbsp</i>
         <p>
             Parkir
         </p>
         </a>       
     </li>
     <li class="nav-item">
         <a href="<?= base_url()?>laporan" <?=$this->uri->segment(1) == 'laporan' ? 'class="nav-link active"' : 'class="nav-link"' ?>>
         <i class="fas fa-file">&nbsp&nbsp</i>
         <p>
             Laporan
         </p>
         </a>       
     </li>
   <?php } ?>
    

               
        </ul>
      </nav>