  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="#">Sugik.io</a>.</strong> All rights reserved.
  </footer>
</div>
<div id="myModalImage" class="modal">
		<span onclick="closemodal()" data-dismiss="modal" class="close">&times;</span>
		<img class="modal-content" id="img01">
	</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url()?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- FastClick -->
<script src="<?= base_url()?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url()?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url()?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url()?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url()?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url()?>/plugins/chartjs_old/Chart.js"></script>
<!-- toast -->
<script type="text/javascript" src="<?= base_url()?>/plugins/toast/jquery.toast.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url()?>/plugins/select2/select2.full.min.js"></script>

<script type="text/javascript"  src="<?= base_url()?>/dist/js/demo.js"></script>
<script type="text/javascript">
	$(window).on('load', function(){
		$("#preloader").fadeOut(300);
	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});

	function modalimage(img){
		var modal = document.getElementById("myModalImage");
		var modalImg = document.getElementById("img01");
    	modal.style.display = "block";
    	modalImg.src = img;
	}
	function closemodal(){
		var modal = document.getElementById("myModalImage");
		modal.style.display = "none";
	}
	$('#pagination').on('click','a',function(e){
		e.preventDefault(); 
		var pageno = $(this).attr('data-ci-pagination-page');
		$("#pagenomer").val(pageno);
		loadPagination(pageno);
	});
</script>

