<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url()?>/dist/css/adminlte.min.css">
</head>

<body onload="window.print()">
<?php $isi = $this->laporan_model->cariLokasi();?>
<center>

  <h3>Data parkir lokasi <?php foreach($isi as $as){
    echo ucfirst($as['nama_lokasi']);
  } ?></br> Periode <?= date('d-m-Y',strtotime($this->input->get('tanggalawal')))?>&nbsp - &nbsp<?=date('d-m-Y',strtotime($this->input->get('tanggalakhir')))?></h3>
</center>
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
                                        $hasill = $trf["tarif_parkir"];
                                        echo "Rp" . number_format($hasill, '0', '', '.');
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
                          $total1 = array_sum($hargatotal1);
                        
                          echo rupiah($total1);
                          
                          ?></th>
                          
                        </tr>
                        </table>

               
</body>
</html>