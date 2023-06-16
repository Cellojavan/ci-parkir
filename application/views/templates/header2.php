<!DOCTYPE html>
<?php
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
?>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url()?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/dist/css/adminlte.min.css">
  <!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url().'plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/toast/jquery.toast.min.css'?>"/>

  
  <style>
		#preloader {
			position: fixed;
			z-index: 99999999999;
			top: 0;
			left: 0;
			overflow: visible;
			width: 100%;
			height: 100%;
			background: #fff url("<?php echo base_url();?>assets/images/hourglass.svg") no-repeat center center;
			background-color: #ffffff8f;
		}
		body{
			/*background-color: #222d32 !important; */
		}
		.select2{
			width: 100% !important;
		}

		
		/* The Modal (background) */
		#myModalImage{
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (image) */
		#myModalImage .modal-content {
		  margin: auto;
		  display: block;
		  max-width: 700px;
		  border-radius: 20px;
		}

		/* Add Animation */
		#myModalImage .modal-content, #caption {  
		  -webkit-animation-name: zoom;
		  -webkit-animation-duration: 0.6s;
		  animation-name: zoom;
		  animation-duration: 0.6s;
		}

		@-webkit-keyframes zoom {
		  from {-webkit-transform:scale(0)} 
		  to {-webkit-transform:scale(1)}
		}

		@keyframes zoom {
		  from {transform:scale(0)} 
		  to {transform:scale(1)}
		}

		/* The Close Button */
		#myModalImage .close {
		  position: absolute;
		  top: 50px;
		  right: 40px;
		  color: #f1f1f1;
		  font-size: 40px;
		  font-weight: bold;
		  transition: 0.3s;
		  opacity: 100;
		}

		#myModalImage .close:hover,
		#myModalImage .close:focus {
		  color: #bbb;
		  text-decoration: none;
		  cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		  #myModalImage .modal-content {
		    width: 100%;
		  }
		}
	</style>
</head>
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
         <a href="<?= base_url()?>user" class="nav-link">
         <i class="fas fa-users">&nbsp</i>
         <p>
             User
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>kendaraan" class="nav-link">
         <i class="fas fa-car">&nbsp</i>    
         <p>
             Jenis Kendaraan
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>P_parkir" class="nav-link">
         <i class="fas fa-parking">&nbsp&nbsp</i>
         <p>
             Parkir
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>petugas" class="nav-link">
         <i class="fas fa-user-cog">&nbsp</i>
         <p>
             Petugas
         </p>
         </a>       
     </li>
<li class="nav-item">
         <a href="<?= base_url()?>lokasi" class="nav-link">
         <i class="fas fa-map-marker-alt">&nbsp&nbsp</i>
         <p>
             Lokasi
         </p>
         </a>       
     </li>
   <?php } ?>
   <?php if($this->session->userdata("hak_akses") == "manager") { ?>
    <li class="nav-item">
         <a href="<?= base_url()?>kendaraan" class="nav-link">
         <i class="fas fa-car">&nbsp</i>    
         <p>
             Jenis Kendaraan
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>P_parkir" class="nav-link">
         <i class="fas fa-parking">&nbsp&nbsp</i>
         <p>
             Parkir
         </p>
         </a>       
     </li>
    <li class="nav-item">
         <a href="<?= base_url()?>petugas" class="nav-link">
         <i class="fas fa-user-cog">&nbsp</i>
         <p>
             Petugas
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
   <?php } ?>
    

               
        </ul>
      </nav>