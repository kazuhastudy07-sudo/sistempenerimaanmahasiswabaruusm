<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

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
					<h3 class="card-title"><i class="fa fa-edit"></i> <b>FORM UBAH DATA SOAL</b></h3>
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
							<form class='form-horizontal' role='form' method="POST" action='action/soal_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_soal WHERE id_soal ='$_GET[id]'"));
								?>

								<input type='hidden' class='form-control' name='id_soal' value="<?php echo $r['id_soal']; ?>">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Buat Soal<sup class="text-red">*</sup> <badge class="badge bg-red">Harap Tidak menambah/mengunggah gambar di form ini, form unggah gambar soal telah di sediakan di bawah form in!</badge></label>
											<div class="pad">
												<textarea class="textarea" name="soal" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['soal']; ?></textarea>
											</div>
										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Gambar Soal Saat Ini  <a href="#" onclick="window.open('../assets/dist/img/soal/<?php echo "$r[gambar]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Gambar"><i class="fa fa-eye"></i> Lihat Gambar</a></label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" name="gambar" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile">
													<label class="custom-file-label" for="exampleInputFile">Unggah Gambar Soal Baru</label>
												</div>
											</div>
										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Pilih Jawaban Benar</label>
											<select class="form-control" name="knc_jawaban" id="pilihan" required="required" style="width:100%; text-transform: uppercase;">
												<?php
												$tampil = mysqli_query($con, "SELECT * FROM pilihan ORDER BY id_plh");
												while($row=mysqli_fetch_array($tampil)) {
													?>
													<option class="<?php echo $r['knc_jawaban'] ?>"  value="<?php echo $row['nama_plh'];?>" <?php echo $row['nama_plh'] == $r['knc_jawaban'] ? 'selected="selected"' : '' ?>><?php echo $row['kode_plh']; ?></option>
													<?php
												}
												?>
											</select>


										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Jawaban A<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Jawaban Untuk Pilihan Ganda A</badge></label>
											<div class="pad">
												<textarea class="textarea" name="a" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['a']; ?></textarea>
											</div>
										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Jawaban B<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Jawaban Untuk Pilihan Ganda B</badge></label>
											<div class="pad">
												<textarea class="textarea" name="b" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['b']; ?></textarea>
											</div>
										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Jawaban C<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Jawaban Untuk Pilihan Ganda C</badge></label>
											<div class="pad">
												<textarea class="textarea" name="c" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['c']; ?></textarea>
											</div>
										</div>
									</div> 
									<div class="col-sm-6">
										<div class="form-group">
											<label>Jawaban D<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Jawaban Untuk Pilihan Ganda D</badge></label>
											<div class="pad">
												<textarea class="textarea" name="d" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['d']; ?></textarea>
											</div>
										</div>
									</div> 
								</div> 
							</div> 


							<div class="card-footer">
								<div class="row">
									<div class="col-sm-8 btn-xs-4">
										<i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk menyimpan data!	
									</div>

									<div class="col-sm-4 col-xs-4">
										<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN</button>
										<a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./soal'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer small <?php echo "$iden[color]"; ?>">
				<strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="http://adminlte.io" class="text-white" style="text-transform: uppercase;">Aplikasi <?php echo $iden['nama'];?></a></strong>
				<div class="float-right d-none d-sm-inline-block">
				  <b>powered by <a type="button" href="#" onclick="window.open(href='./')" target='_blank' class="badge bg-white" data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-code faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
				</div>
			</footer>
		</div>
	</div>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
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
			if(this.files[0].size > 600000)
				{   Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
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

<script>
	$( document ).ready(function() {
		$('#pilihan').select2({
			placeholder: 'Pilih Jawaban Benar',
			language: "id"
		});
		$('#rekomendasi').select2({
			placeholder: 'Pilih Pemberi Rekomendasi',
			language: "id"
		});
		$('#agama').select2({
			placeholder: 'Pilih Agama',
			language: "id"
		});
		$('#kw').select2({
			placeholder: 'Pilih Kewarganegaraan',
			language: "id"
		});
		$('#kk').select2({
			placeholder: 'Pilih Kebutuhan Khusus',
			language: "id"
		});
		$('#jk').select2({
			placeholder: 'Pilih Jenis Kelamin',
			language: "id"
		});
		$('#jurusan').select2({
			placeholder: 'Pilih Jurusan',
			language: "id"
		});
		$('#almamater').select2({
			placeholder: 'Pilih Ukuran Almamater',
			language: "id"
		});
		$('#pendidikanayah').select2({
			placeholder: 'Pilih Pendidikan',
			language: "id"
		});
		$('#pekerjaanayah').select2({
			placeholder: 'Pilih Pekerjaan',
			language: "id"
		});
		$('#penghasilanayah').select2({
			placeholder: 'Pilih Penghasilan',
			language: "id"
		});
		$('#pendidikanibu').select2({
			placeholder: 'Pilih Pendidikan',
			language: "id"
		});
		$('#pekerjaanibu').select2({
			placeholder: 'Pilih Pekerjaan',
			language: "id"
		});
		$('#penghasilanibu').select2({
			placeholder: 'Pilih Penghasilan',
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
		$('#statuspegawai').select2({
			placeholder: 'Pilih Fakultas',
			language: "id"
		});

		$('#pangkat').select2({
			placeholder: 'Pilih Program Studi',
			language: "id"
		});

		$('#tahun').select2({
			placeholder: 'Pilih Tahun Bergabung',
			language: "id"
		});

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

		$("#statuspegawai").change(function(){
			$("img#load4").show();
			var id_fak = $(this).val(); 
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "data-pangkat.php?jenis=pangkat",
				data: "id_fak="+id_fak,
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
	$(document).ajaxStart(function() { Pace.restart(); });
	$('.ajax').click(function(){
		$.ajax({url: '#', success: function(result){
			$('.ajax-content').html('<hr>Ajax Request Completed !');
		}});
	});
</script>

</div>
</div>
<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>


<<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
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