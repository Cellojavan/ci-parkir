
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>

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
          <div class="col-lg-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Edit Petugas</h5>
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
                <?php if($this->session->flashdata('cek')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('cek');?><strong>Digunakan</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('cekk')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('cekk');?><strong>Digunakan</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <form action="" method="post">
                <div class="form-group">
                        <label for="lokasiid">Lokasi</label>
                        <select class="form-control" name="lokasiid" id="lokasiid">
                          <?php foreach($lokasi as $lks) :?>
                            <?php if($lks['id_lokasi'] == $petugas['lokasi_id']) : ?>
                              <option value="<?=$lks['id_lokasi']?>"selected><?= $lks['nama_lokasi'] ?></option>
                            <?php else :?>
                              <option value="<?=$lks['id_lokasi']?>"><?= $lks['nama_lokasi'] ?></option>
                            <?php endif ?>  
                          <?php endforeach ?> 
                        </select>
                        <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
                    </div>
                <div class="form-group">
                        <label for="lokasiid">Petugas</label>
                        <input type="hidden" name="id" value="<?= $petugas['id_petugas']?>">
                        <select class="form-control" name="namapetugas" id="lokasiid">
                          <?php foreach($hooh as $hh) :?>
                            <?php if($hh['nama_user'] == $petugas['nama_petugas']) : ?>
                              <option selected><?= $hh['nama_user'] ?></option>
                            <?php else :?>
                              <option ><?= $hh['nama_user'] ?></option>
                            <?php endif ?>  
                          <?php endforeach ?> 
                        </select>
                        <small class="form-text text-danger"><?= form_error('lokasiid'); ?></small>
                    </div>
                    <button class="btn btn-success" type="submit">UBAH</button>
                    <button class="btn btn-warning" type="reset">RESET</button>
                    <a href="<?= base_url() ?>petugas" class="btn btn-danger">BACK</a>   
                </form>
                        
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
