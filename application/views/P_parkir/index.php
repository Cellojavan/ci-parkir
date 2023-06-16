
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
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Data Parkir</h5>
              </div>
              <div class="card-body">

              
                <?php if($this->session->flashdata('flash')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Data berhasil <strong><?= $this->session->flashdata('flash');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('flashh')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  Kendaraan Berhasil <strong><?= $this->session->flashdata('flashh');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('error')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong><?= $this->session->flashdata('error');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $this->session->userdata('hak_akses');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>

                <div class="row">
                  <div class="col-md-5">
                    <form action="" method="post">
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search" autocomplete="off">
                        <div class="input-group-append">
                          <input type="submit" class="btn btn-primary"  name="submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <form action="" method="post">
                    <div class="row g-3 align-items-center">
                    
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" >
                    </div>
                    -
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" >
                    </div>
                    
                    <div class="col-auto">
                    <input type="submit" value="cari" class="btn btn-primary" name="cari">
                    </div>
                    </div>
                    </form>
         
                  </div>
                </div>
                <?php if($this->session->userdata("hak_akses") == "admin") {?>
                </br>
                <?php } ?>


                <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                  <a href="<?= base_url('')?>P_parkir/tambah" class="btn btn-primary mb-3 mt-2">Masuk</a>
                  <?php $id= 1;?>
                  <nav aria-label="...">
                <ul class="pagination">
                  <?php if($this->input->post('submit') !== null) : ?>
                  <?php redirect(base_url('P_parkir?halaman=1'))?>
                  <?php endif?>
                  <?php if($this->input->post('cari') !== null) :?>
                  <?php redirect(base_url('P_parkir?halaman=1'))?>
                  <?php endif?>
                  
                <?php if($halamanAktif1 > 1) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$halamanAktif1 - 1;?>">&laquo <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif?>

                
               <?php ?>
                <?php for( $i = 1; $i <= $jumlahHalaman1; $i++ ) :?>
                <?php if($i == $halamanAktif1 ) :?>
                  <?php $id = ($halamanAktif1 * 2) - 1; ?>
                  <li class="page-item active">
                    <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                  </li>
                <?php else :?>
                  <?php $id = ($halamanAktif1 * 2) - 1; ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif ;?>
                <?php endfor?>
                
                <?php if($halamanAktif1 < $jumlahHalaman1) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$halamanAktif1 + 1 ;?>">&raquo <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif?>
                </ul>
                </nav>
                <?php } ?>


                <?php if($this->session->userdata("hak_akses") == "manager") {?>
                  </br>
                <?php } ?>




                <?php if($this->session->userdata("hak_akses") != "petugas") {?>
                  <?php $id= 1;?>

                <nav aria-label="...">
                <ul class="pagination">
                  <?php if($this->input->post('submit') !== null) : ?>
                  <?php redirect(base_url('P_parkir?halaman=1'))?>
                  <?php endif?>
                  <?php if($this->input->post('cari') !== null) :?>
                  <?php redirect(base_url('P_parkir?halaman=1'))?>
                  <?php endif?>
                  
                <?php if($halamanAktif > 1) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$halamanAktif - 1;?>">&laquo <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif?>
               <?php ?>
                <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) :?>
                <?php if($i == $halamanAktif ) :?>
                  <?php $id = ($halamanAktif * 2) - 1; ?>
                  <li class="page-item active">
                    <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                  </li>
                <?php else :?>
                  <?php $id = ($halamanAktif * 2) - 1; ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$i;?>"><?=$i;?> <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif ;?>
                <?php endfor?>
                <?php if($halamanAktif < $jumlahHalaman) : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?=$halamanAktif + 1 ;?>">&raquo <span class="sr-only">(current)</span></a>
                  </li>
                <?php endif?>
                </ul>
                </nav>
                <?php } ?>

                
                  <table class="table table-bordered table-responsive">
                      <thead>
                          <tr>
							  <th>No</th>
							  <th>Tgl In</th>
							  <th>Petugas In</th>
							  <th>Foto In</th>
							  <th>Tgl Out</th>
							  <th>Petugas Out</th>
							  <th>Foto Out</th>
							  <th>Nopol</th>
							  <th>Lokasi</th>
							  <th>Kendaraan</th>
							  <th>Tarif</th>
							  <th>Status</th>
                              <?php if($this->session->userdata("hak_akses") == "admin") {?>
                        
                              <?php } ?>
                              <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                                <th scope="col">Aksi</th>
                              <?php } ?>
                              <?php if($this->session->userdata("hak_akses") == "manager") {?>
              
                              <?php } ?>

                          </tr>
                      </thead>
                      
                      <tbody>
                      <?php if(empty($parkir)): ?>
                      
                      <div class="alert alert-danger" role="alert">
                          Data not found!
                      </div>
                    
                      <?php endif ;?>
                          <?php foreach($parkir as $pkr) : ?>
                          <tr>
                              <td><?= $id++?></td>
                              <td><?= $pkr['tgl_in'] ?></td>
                              <td><?= $pkr['petugas_in'] ?></td>
                              <td><img src="<?= base_url().'/dist/img/fotomasuk/'.$pkr['foto_in']?>" width="150" ></td>
                              <td><?= $pkr['tgl_out'] ?></td>
                              <td><?= $pkr['petugas_out'] ?></td>
                              <td><?php if($pkr['foto_out'] == null) :?>
                                  <img src="<?= base_url().'/dist/img/fotoout/user_blank.png'?>" width="80" center ></td>
                              <td><?php else:?>
                                  <img src="<?= base_url().'/dist/img/fotoout/'.$pkr['foto_out']?>" width="150" ></td>
                              <td><?php endif?>
                              <td><?= $pkr['nopol'] ?></td>
                              <td><?= $pkr['nama_lokasi'] ?></td>
                              <td><?= $pkr['jenis_kendaraan'] ?></td>
                            
                              <td><?= $pkr['tarif_parkir']?></td>
                              <td>
                                <?php if($pkr['status'] == 'Done') {?>
                                  <small class="form-text text-success"><?= $pkr['status'] ?></small>
                                <?php }else{?>  
                                  <small class="form-text text-danger"><?= $pkr['status'] ?></small>
                                <?php }?>   
                              </td>
                            
                              <?php if($this->session->userdata("hak_akses") == "admin") {?>
                        
                              <?php } ?>
                              <?php if($this->session->userdata("hak_akses") == "petugas") {?>
                                <td>
                                  <a href="<?= base_url()?>P_parkir/keluar/<?= $pkr['id_pengelolaan_parkir']?>" class="btn btn-warning">Keluar</a>
                                  <!-- Button trigger modal -->
                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $pkr['id_pengelolaan_parkir']?>">
                                    Hapus
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="hapus<?= $pkr['id_pengelolaan_parkir']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Apakah anda ingin menghapus data <?= $pkr['nopol']?>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a href="<?= base_url()?>P_parkir/hapus/<?= $pkr['id_pengelolaan_parkir']?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </td>                        
                              <?php } ?>
                              <?php if($this->session->userdata("hak_akses") == "manager") {?>
                        
                              <?php } ?>

                                
                            
                          </tr>
                      </tbody>
                      
                      
                      <?php endforeach; ?>
                  </table>
                 

               
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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
