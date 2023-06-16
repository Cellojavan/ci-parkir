
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a href="<?= base_url('')?>login/logout" class="btn btn-danger  float-right ">Logout</a>
              </li>
            </ul>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
          <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $this->session->userdata('nama_user');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <?php endif ?>
          </div><!-- /.col -->
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                    <div class="inner">
                    <?php function rupiah($angka){ 
                             $duit = "Rp" . number_format($angka, '0', '', '.'); 
                             return $duit; 
    
                    }?>
        
                    <?php if(empty($duit)) { ?>
                        <?="<h2>Belum Masuk</h2>";?>
                      <?php }else{ ?>
                      <?php  foreach($duit as $dt) { ?>
                          
                          <?php $hargatotal1[] = $dt['tarif_parkir']; ?>
                          
                      <?php  } ?>
                          <?php $total1 = array_sum($hargatotal1); ?>
                        
                          <h3><?= rupiah($total1)?></h3>
                          
                          
                        
                          

                     <?php } ?> 
                    <h3></h3>
                    

                    <p>Transaksi Bulan ini</p>
                    </div>
                    <div class="icon">
                    
                    <!-- <i class="fa fa-shopping-bag"></i>-->
                    </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                    <div class="inner">
                    
                      <?php if(empty($tday)) { ?>
                        <?="<h2>Belum Masuk</h2>";?>
                      <?php }else{ ?>
                      <?php  foreach($tday as $td) { ?>
                          
                          <?php $hargatotal[] = $td['tarif_parkir']; ?>
                          
                      <?php  } ?>
                          <?php $total = array_sum($hargatotal); ?>
                        
                          <h3><?= rupiah($total)?></h3>
                          
                          
                        
                          

                     <?php } ?> 
                      
                      
                
                      
               
                 
                      
                      
                      <p>Transaksi Hari ini</p>
                    </div>
                    <div class="icon">
                    <!-- <i class="fa fa-chart-bar"></i>-->
                    </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3><?=$side;?></h3>

                    <p>In Side</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-chart-bar"></i>
                    </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3><?=$waktu;?></h3>

                    <p>Parkir Hari Ini</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-chart-bar"></i>
                    </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>
    <!-- Main content -->

  <!-- /.content-wrapper -->

    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
