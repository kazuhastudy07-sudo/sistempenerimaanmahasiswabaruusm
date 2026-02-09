<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<?php
if(isset($_GET['alert'])){
	if($_GET['alert']=="ubah"){
		?>
		<script type="text/javascript">
			$(function() {
				Swal.fire({
					icon: 'success',
					showConfirmButton: false,
					timer: 1500,
					timerProgressBar: true,
					title: 'Sukses!',
					text: 'Data Berhasil Diubah',
					footer: 'APLIKASI <?php echo "$aplikasi";?>'
				}).then(function() {
					window.location = "pengaturanpmb";
				});
			});
		</script>
	<?php }       
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<a type="button" onclick="window.location.href='./'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<ol class="breadcrumb float-sm-left">
								<li class="breadcrumb-item"><a type="button" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="fa fa-dashboard (alias)"></i></a></li>
								<li class="breadcrumb-item active">Ubah Data </li>
							</ol>
						</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">

			<!-- Default box -->
			<div class="card">
				<div class="card-header  <?php echo "$iden[color]"; ?>">
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM PENGATURAN PMB</b></h3>
					<center></center>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form class='form-horizontal' role='form' method=POST action='action/pengaturanpmb_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb
									WHERE id_panitia ='1'"));
								$b=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gelombang
									WHERE id_gelombang = $r[id_gelombang]"));
									?>
									<input type='hidden' class='form-control' name='id_panitia' value="<?php echo $r['id_panitia']; ?>">

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Ketua Panitia PMB<span class="badge text-red">*</span></label>
												<input type="text" class="form-control" name="nama_panitia" value="<?php echo $r['nama_panitia']; ?>">
											</div>
											<div class="col-sm-6">
												<label>NIDN/NIDK<span class="badge text-red">*</span></label>
												<input type="text" name="nidn" class="form-control" value="<?php echo $r['nidn']; ?>">
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Gelombang Pendaftaran<span class="badge text-red">*</span></label><br>
												<select class='form-control' id="gelombang" name="id_gelombang" >
													<option></option>
													<?php
													$tampil = mysqli_query($con, "SELECT * FROM gelombang ORDER BY id_gelombang ASC");
													while($row=mysqli_fetch_array($tampil)) 
													{
														$tgl_a = date("d-m-Y", strtotime($row['tgl_a']));
														$tgl_b = date("d-m-Y", strtotime($row['tgl_b']));
														?>
														<option class="<?php echo $r['id_gelombang'] ?>"  value="<?php echo $row['id_gelombang']; ?>" <?php echo $row['id_gelombang'] == $r['id_gelombang'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_gelombang']; ?> | <?php echo $tgl_a; ?> s/d  <?php echo $tgl_b; ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<div class="col-sm-6">
												<label>Biaya Pendaftaran</label>
												<input type="text" class="form-control" value="<?php echo "Rp " . number_format("$b[biaya]", 0, ",", "."); ?>" readonly>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label>Tanggal Ujian Masuk<span class="badge text-red">*</span></label>
												<input type="date" class="form-control" name="tgl_ujian" value="<?php echo $r['tgl_ujian']; ?>">
											</div>
											<div class="col-sm-6">
												<label>Tanda Tangan Elektronik Ketua Panitia</label>
												<br/>
												<img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/dist/img/logo/<?php echo $r['qrcode'];?>" width="100px" alt="img-responsive">
											</div>
										</div>
									</div>

									<div class="card-footer">
										<div class="row">
											<div class="col-sm-8 btn-xs-4">
												<small><i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk meng-update data anda!</small>
											</div>

											<div class="col-sm-4 col-xs-4">
												<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN</button>
												<a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<aside class="control-sidebar control-sidebar-dark">
					</aside>
				</section>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function () 
		{
			bsCustomFileInput.init();
		});
		var uploadField = document.getElementById("exampleInputFile");
		uploadField.onchange = function() 
		{
			if(this.files[0].size > 1000000)
			{ 
				Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
				this.value = "";
			};
		};
	</script>
	<script type="text/javascript">
		$(document).ready(function () 
		{
			bsCustomFileInput.init();
		});
		var uploadField = document.getElementById("exampleInputFilee");
		uploadField.onchange = function() 
		{
			if(this.files[0].size > 1000000)
			{ 
				Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
				this.value = "";
			};
		};
	</script>
	<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
	<!-- /.card-body -->

	<script>
		$( document ).ready(function() {
//untuk memanggil plugin select2
$('#gelombang').select2({
	placeholder: 'Pilih Gelombang Pendaftaran',
	language: "id"
});
$('#agama').select2({
	placeholder: 'Pilih Agama',
	language: "id"
});
$('#kdk').select2({
	placeholder: 'Pilih Kedudukan/Jenis Pengurus',
	language: "id"
});
$('#jk').select2({
	placeholder: 'Pilih Jenis Kelamin',
	language: "id"
});
$('#provinsi').select2({
	placeholder: 'Pilih Provinsi',
	language: "id"
});
$('#kota').select2({
	placeholder: 'Pilih Kota/Kabupaten',
	language: "id"
});
$('#kecamatan').select2({
	placeholder: 'Pilih Kecamatan',
	language: "id"
});
$('#kelurahan').select2({
	placeholder: 'Pilih Kelurahan',
	language: "id"
});
$('#pendidikan').select2({
	placeholder: 'Pilih Pendidikan',
	language: "id"
});
$('#pekerjaan').select2({
	placeholder: 'Pilih Pekerjaan',
	language: "id"
});

$('#pangkat').select2({
	placeholder: 'Pilih Pangkat',
	language: "id"
});

$('#tahun').select2({
	placeholder: 'Pilih Tahun Bergabung',
	language: "id"
});

//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
$("#provinsi").change(function(){
	$("img#load1").show();
	var id_prov = $(this).val(); 
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "data-wilayah-satu.php?jenis=kota",
		data: "id_prov="+id_prov,
		success: function(msg){
			$("select#kota").html(msg);                                                       
			$("img#load1").hide();
			getAjaxKota();                                                        
		}
	});                    
});  

$("#kota").change(getAjaxKota);
function getAjaxKota(){
	$("img#load2").show();
	var id_kab = $("#kota").val();
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "data-wilayah-satu.php?jenis=kecamatan",
		data: "id_kab="+id_kab,
		success: function(msg){
			$("select#kecamatan").html(msg);                              
			$("img#load2").hide(); 
			getAjaxKecamatan();                                                    
		}
	});
}

$("#kecamatan").change(getAjaxKecamatan);
function getAjaxKecamatan(){
	$("img#load3").show();
	var id_kec = $("#kecamatan").val();
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "data-wilayah-satu.php?jenis=kelurahan",
		data: "id_kec="+id_kec,
		success: function(msg){
			$("select#kelurahan").html(msg);                              
			$("img#load3").hide();                                                 
		}
	});
}

//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
$("#statuspegawai").change(function(){
	$("img#load4").show();
	var id_sp = $(this).val(); 
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "data-pangkat.php?jenis=pangkat",
		data: "id_sp="+id_sp,
		success: function(msg){
			$("select#pangkat").html(msg);                                                       
			$("img#load4").hide();
			getAjaxPangkat();                                                        
		}
	});                    
});  

});
</script>
<script type="text/javascript">
// To make Pace works on Ajax calls
$(document).ajaxStart(function() { Pace.restart(); });
$('.ajax').click(function(){
	$.ajax({url: '#', success: function(result){
		$('.ajax-content').html('<hr>Ajax Request Completed !');
	}});
});
</script>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>

<!-- /.content-wrapper -->
<footer class="main-footer small <?php echo "$iden[color]"; ?>">
	<strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="http://adminlte.io" class="text-white" style="text-transform: uppercase;">Aplikasi <?php echo $iden['nama'];?></a></strong>
	<div class="float-right d-none d-sm-inline-block">
	  <b>powered by <a type="button" href="#" onclick="window.open(href='./')" target='_blank' class="badge bg-white" data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-code faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
	</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->

<!-- jQuery Mapael -->
<script src="../assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../assets/plugins/raphael/raphael.min.js"></script>
<script src="../assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../assets/dist/js/pages/dashboard2.js"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</body>
</html>