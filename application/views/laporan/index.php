
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
          <div class="col-sm-4">

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
                <h5 class="m-0">Cari Data Laporan</h5>
              </div>
              <div class="card-body">
              <div class="row">
                  <div class="col-md-4">
                    
                  <form action="" method="get">
                  <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <select class="form-control" name="lokasi" id="lokasi">
                          <option>--Pilih Lokasi--</option>
                          <?php foreach($lokasi as $lks) : ?>
                            <option value="<?=$lks['id_lokasi']?>"><?=$lks['nama_lokasi']?></option>
                          <?php endforeach ?>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggala">Tanggal Awal</label>
                        <input type="date"  class="form-control" id="tanggala"  name="tanggalawal" >
                    </div>
                    <div class="form-group">
                        <label for="tanggalak">Tanggal Akhir</label>
                        <input type="date"  class="form-control" id="tanggalak"  name="tanggalakhir" >
                    </div>
                    <input type="submit" class="btn btn-primary" value="proses"  name="submit">
                  </form>
                  </div>
                </div>
                <div class=""></br></div>
                <?php if($this->session->flashdata('error')) :?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong><?= $this->session->flashdata('error');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>


                </br>
                <?php if($this->input->get('tanggalawal') == ''): ?>
                      
                      
                <?php else: ?>
                  <a href="<?=base_url('laporan/report')?>?lokasi=<?=$this->input->get('lokasi')?>&tanggalawal=<?=$this->input->get('tanggalawal')?>&tanggalakhir=<?=$this->input->get('tanggalakhir')?>&submit=<?=$this->input->get('submit')?>" target="_blank" class="btn btn-warning"><i class="fas fa-file"> </i> Cetak data</a>
                  <div></br></div>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Parkir</th>
                                <th scope="col">Jenis Kendaraan</th>
                                <th scope="col">Tarif</th>
                                <th scope="col">Qt</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $cart = array();
                            $i = $this->input->get('tanggalawal');
                            $b = $this->input->get('tanggalakhir');
                            for($i;$i<=$b;$i++){
                              $cart[] = $i;  
                            }
                            ?>
                            <?php foreach($cart as $cr ) :?>
                              <?php $cek = $this->laporan_model->cekTanggal($cr) ?>
                              <?php $kndr = $this->laporan_model->cekkendaraan($cr) ?>
                              <?php $kndr2 = $this->laporan_model->cekkendaraan($cr) ?>
                              
                              
                                <?php if($cek != 0) : ?>
                                  <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$cr?></td>
                                    <td><?php
                                    foreach($kndr as $knd){
                                      echo $knd["jenis_kendaraan"];
                                      echo "</br>";
                                    }
                                    
                                    ?></td>
                                    
                                    <td><?php
                                    foreach($kndr as $knd){
                                      
                                      $kndr = $knd["jenis_kendaraan"];
                                      $tarif =  $this->laporan_model->cekTarif($kndr);
                                      foreach($tarif as $trf){
                                        $hasil =  $trf["tarif_parkir"];
                                        echo "Rp" . number_format($hasil, '0', '', '.');
                                        echo "</br>";
                                        
                                      }
                                    }
                                    ?>
                                    </td>

                                    <td><?php
                                    foreach($kndr2 as $kn2){
                                      $kndr = $kn2["jenis_kendaraan"];
                                      $tarif =  $this->laporan_model->cekTarif($kndr);
                                      foreach($tarif as $trf){
                                        $tariff = $trf["tarif_parkir"];
                                        $tarifid =  $this->laporan_model->cekIdTarif($tariff);
                                        foreach($tarifid as $id){
                                          $done = $id["id_jenis_kendaraan"];
                                          $result = $this->laporan_model->cekRowskendaraan($cr,$done);
                                            print_r($result);
                                            echo "</br>";
                                          
                                        }

                                      }
                                      
                                      }
                                    
                                    ?>
                                    </td>
                                    
        
                                    <td><?php
                                    foreach($kndr2 as $kn2){
                                      $kndr = $kn2["jenis_kendaraan"];
                                      $tarif =  $this->laporan_model->cekTarif($kndr);
                                      foreach($tarif as $trf){
                                        $tariff = $trf["tarif_parkir"];
                                        $tarifid =  $this->laporan_model->cekIdTarif($tariff);
                                        foreach($tarifid as $id){
                                          $done = $id["id_jenis_kendaraan"];
                                          $result = $this->laporan_model->cekRowskendaraan($cr,$done);
                                            $hasil = ($result * $trf["tarif_parkir"]);
                                            echo "Rp" . number_format($hasil, '0', '', '.');
                                            echo "</br>";
                                            
                                        }

                                      }
                                      
                                      }
                                    
                                    ?>
                                    </td>
                                    
                                </tr>  
                                
                                                                  
                                <?php else : ?>
                                  
                                  
                                <?php endif ?>
                                
                                
                           
                        </tbody>
                        <?php endforeach ?>
                        <tr>
                          <th colspan="4"><center><p style="text-transform: uppercase;">Total</p></center></th>
                          <th><?php
                          $totalQt = $this->laporan_model->rowsQt();
                          print_r($totalQt);
                          
                          ?></th>
                          <?php function rupiah($angka){ 
                                    $duit = "Rp" . number_format($angka, '0', '', '.'); 
                                    return $duit; 
            
                          }?>
                          <th><?php
                          $total = $this->laporan_model->rowsTotal();
                          foreach($total as $ttl){
                            $hargatotal1[] = $ttl['tarif_parkir'];
                          }
                          if(empty($hargatotal1)){

                          }else{

                            $total1 = array_sum($hargatotal1);
                            echo rupiah($total1);
                          }
                        
                          
                          ?></th>
                          
                        </tr>
                        </table>

                <?php endif ;?>
               
               

               
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
