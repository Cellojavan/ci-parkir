<?php 
$this->load->view('templates/header2',$judul);
?>
<style>
.drop-box{  
	border: 7px solid rgb(34, 45, 50);  
	cursor: pointer;
	margin-right: 80px;
	position: relative;
	text-align: center;
	width: 200px;
	min-height: 100px;
	background-color: rgb(34, 45, 50);
	z-index: 1;
}
.drop-box p{
	width: 100%;
	display: block;
	color: #fff;
	margin: 25% auto;
}

.drop-box:before {
	content: " ";
	position: absolute;
	z-index: 2;
	top: 1px;
	left: 1px;
	right: 1px;
	bottom: 1px;
	border: 2px dashed rgba(243, 237, 237, 0.32); 
}
#upl{
	display: none;
}
</style>
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
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Pengelolaan</h5>
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
                  Lokasi sudah <strong><?= $this->session->flashdata('cek');?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>
                <?php if($this->session->flashdata('login')) :?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('login');?>&nbsp<strong><?= $nama['nama_user']?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php endif ?>

				<?php date_default_timezone_set("Asia/Jakarta"); ?>
                <form action="<?= base_url('P_parkir/tambah')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="datein">Tanggal Masuk</label>
                        <input type="text" value="<?= date('Y-m-d H.i.s')?>" class="form-control" id="datein"  name="tglin"  autocomplete="off" readonly>
                        <small class="form-text text-danger"><?= form_error('tglin'); ?></small>
                    </div>
						<div class="box">
							<div class="box-header with-border">
                      <label for="nopol">Foto Masuk</label>
				            </div>
				            <div class="box-body">
				            	<div class="form-group">
				            		<div class="column-small-12 padd0 align-center">
				            			<div id="ambil_foto_tamu" class="drop-box" onclick="ambil_foto()">
				            				<p><i class="fa fa-camera" aria-hidden="true"></i><br>Ambil Foto Masuk </p>
				            			</div>
				            			<div class="text-center" id="hapus_foto_temporer" hidden>
				            				<i class="btn btn-danger" onclick="hapus_foto_temporer_tamu()" aria-hidden="true" > Hapus Foto Masuk</i> 
				            			</div>
				            		</div>
				            		<input type="hidden" class="form-control" id="xnama_file_foto" name="xnama_file_foto"  >
				            	</div>
				            </div>
				        </div>
						
						<div class="form-group">
							<label for="nopol">Nopol</label>
							<input type="text" class="form-control" id="nopol"   name="nopol" placeholder="Enter Name Nopol" autocomplete="off">
							<small class="form-text text-danger"><?= form_error('nopol'); ?></small>
                    	</div>
						<div class="form-group">
							<label for="petugas">Petugas In</label>
							<input type="text" class="form-control" id="petugas"   name="petugasin" value="<?= $this->session->userdata("nama_user");?>" autocomplete="off" readonly>
							<small class="form-text text-danger"><?= form_error('petugasin'); ?></small>
                    	</div>
						<div class="form-group">
                        <label for="datein">Lokasi</label>
                        <input type="text" value="<?= $lokasi['nama_lokasi']?>" class="form-control" id="datein"  name="lokasiid"  autocomplete="off" readonly>
                    	</div>
						<div class="form-group">
                        <label for="lokasiid">Kendaraan </label>
                        <select class="form-control" name="nim" id="nim" onchange="isi_otomatis()">
                        <option>--Pilih Kendaraan--</option>
                          <?php foreach($kendaraan as $kndr) :?>
                            <option value="<?=$kndr['id_jenis_kendaraan']?>"  ><?= $kndr['jenis_kendaraan'] ?></option>
                          <?php endforeach ?> 
                        </select>
						<div class="form-group">
							<label for="tarif">Tarif</label>
							<input type="text" value="<?=$this->input->get('nim')?>" class="form-control" id="tarif"  name="tarif">
							<small class="form-text text-danger"><?= form_error('tarif'); ?></small>
                    	</div>

                        </select>
                        <small class="form-text text-danger"><?= form_error('jeniskendaraanid'); ?></small>
                    	</div>
						<button class="btn btn-primary" name="tambah" type="submit">TAMBAH</button>
                   		<button class="btn btn-warning" type="reset">RESET</button>
                  		<a href="<?= base_url("P_parkir") ?>" class="btn btn-danger">BACK</a>
						<?php 
						
						?>
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
  <div id="modal-foto" class="modal fade " style="z-index: 99999 !important;" >
	<div class="modal-dialog" style="width:670px">
		<div class="modal-content">
			<div class="modal-body">
				<div id="webcam"></div>
				<div id="nama_file_foto"></div>
				<select id="webcamdevice" class="form-control"></select>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-warning pull-left" id="foto_ulang" onclick="foto_ulang()">Reset Cam</button>
				<button type="button" class="btn btn-success" id="ambil_foto">ambil foto</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
  

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  

  <!-- Main Footer -->
<script src="<?=base_url()?>assets/js/jquery-3.7.0.js"></script>
<script type="text/javascript">
            function isi_otomatis(){
                var nim = $("#nim").val();
				$.ajax({
					url : "<?= base_url()?>P_parkir/autofill",
					data : 'nim='+nim,
				}).success(function(data){
					//alert('ambatukam');
					var json = data,
                    obj = JSON.parse(json);
                    $('#tarif').val(obj.tarif);
				});
            }
</script>

<?php
	$this->load->view('templates/footer2');
?>
  <script src="<?=base_url()?>assets/webcamjs/webcam.js"></script>
  <script type="text/javascript">

	function hapus_foto_temporer_tamu(){
		var isitext = "<p><i class=\"fa fa-camera\" aria-hidden=\"true\"></i><br>Ambil Foto Tamu  </p>";
		$("#ambil_foto_tamu").html(isitext);
		$('#xnama_file_foto').val("");
		$('#hapus_foto_temporer').hide();
	}
	//AMBIL FOTO 
	function ambil_foto(){
		$("#modal-foto").modal('show');
	}
	//Foto Ulang 
	function foto_ulang(){
		Webcam.reset();
		$("#ambil_foto").show();
		$('#webcam' ).val("");
		Webcam.set('constraints', {
			width: 465,//width: 320,//width: 465,
			height: 260,//height: 250,//height: 260,
			image_format: 'jpeg',
			jpeg_quality: 100,
			fps: 50,
			'constraints': {
				width: 465,
				height: 260,
				facingMode:'environment' 
			}
		});
		Webcam.attach( '#webcam' );
	} 

	var cameras = new Array();
	navigator.mediaDevices.enumerateDevices().then(function(devices) {
		var i = 0;
		devices.forEach(function(device) {
			if(device.kind=== "videoinput"){
				cameras[i]= device.deviceId;
				$("#webcamdevice").append("<option value='"+ i +"'> Kamera "+ i +"</option>");
				i
			}
		});
	});
	$('#modal-foto').on('shown.bs.modal', function (e) {
		Webcam.set({
			width: 465,//width: 320,//width: 465,
			height: 260,//height: 250,//height: 260,
			image_format: 'jpeg',
			jpeg_quality: 100,
			video: true,
			'constraints': {
				width: 465,
				height: 260,
				facingMode:'environment' 
			}
	
		});
		Webcam.attach( '#webcam' );
	
		$("#webcamdevice").change(function (){
			if ($("#webcamdevice").val() == 0 ) {
			Webcam.reset();
			Webcam.set({
					width: 465,//width: 320,//width: 465,
					height: 260,//height: 250,//height: 260,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 465,
						height: 260,
						facingMode:'environment' 
					}
				}); 
				Webcam.attach( '#webcam' );
			} else if($("#webcamdevice").val() == 1 ) {
				Webcam.reset();
				Webcam.set({
					width: 465,//width: 320,//width: 465,
					height: 260,//height: 250,//height: 260,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 465,
						height: 260,
						facingMode:'users' 
					}
				}); 
				Webcam.attach( '#webcam' );
			} else {
				Webcam.reset();
				Webcam.set({
					width: 640,//width: 320,//width: 465,
					height: 480,//height: 250,//height: 260,
					image_format: 'jpeg',
					jpeg_quality: 100,
					fps: 50,
					'constraints': {
						width: 640,
						height: 480,
						facingMode:'environment' 
					}
				}); 
				Webcam.attach( '#webcam' );
			}
		});
		$("#ambil_foto").click(function () { 
			$("#foto_ulang").show();
			Webcam.snap( function(data_uri) {
				image = "";
				image = data_uri;
				
				$('#webcam').html('<img src="'+data_uri+'" />');
				$('#ambil_foto_tamu').html('<img  src="'+image+'" style="width:100%" />');
				$('#xnama_file_foto').val(image);
				$('#hapus_foto_temporer').show();
			});
	
		});
		
		
		$('#modal-foto').on('hidden.bs.modal', function () {
			Webcam.reset();
		});
	});
	

	
	


	


    </script>








</body>
</html>



