<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<a type="button" onclick="window.location.href='administrator'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<ol class="breadcrumb float-sm-left">
								<li class="breadcrumb-item"><a type="button" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="fa fa-dashboard (alias)"></i></a></li>
								<li class="breadcrumb-item active">Data Desa/Kelurahan</li>
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
			<form class='form-horizontal' role='form' method=POST action='action/kelurahan_save.php' enctype='multipart/form-data'>
				<div class="card card-<?php echo "$iden[sidebar]"; ?>">											
					<div class="card-header">
						<h3 class="card-title"><i class="fa fa-plus-circle"></i> TAMBAH DATA KECAMATAN</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
									<i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3 col-xs-3">
										<select  name="a" class="form-control select2" style="width: 100%;" required>
											<option value="" selected="selected">Pilih Kecamatan</option>
											<?php 
											$tampil = mysqli_query($con, "SELECT * FROM districts ORDER BY id_kec ");
											while($r=mysqli_fetch_array($tampil))
											{
												echo "<option value='".$r['id_kec']."'>".$r['id_kec']." - ".$r['nama_kecamatan']."</option>";
											}
											?>
										</select>
									</div>
									<div class="col-sm-3 col-xs-3">
										<input type="text" name="b" class="form-control" placeholder="Tuliskan 10 Angka Kode Kel/Desa" required maxlength="10" onkeypress="return hanyaAngka (event)"/>
									</div>
									<div class="col-sm-3 col-xs-3">
										<input type="text" name="c" class="form-control" placeholder="Tuliskan Nama Kecamatan" required>
									</div>

									<div class="col-sm-3 col-xs-3">
										<center><button style='border-radius: 20px;border: 2px solid #D3D3D3;' type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan Data</button></center>
									</div>
								</div>
							</div>
							<div class="card-footer">
								Kode kelurahan/Desa yang terdiri 10 digit angka diambil dari web <a href="https://sig-dev.bps.go.id/webgis/pencariankodenama" data-toggle="tooltip" title="Klik Untuk Melihat Kode Wilayah">Badan Pusat Statistik</a> yang berdasarkan wilayah kerja statistik BPS.
							</div>
						</div>
					</form>
					<!-- Default box -->
					<div class="card">
						<div class="card-header <?php echo "$iden[color]"; ?>">
							<h3 class="card-title"><i class="fa fa fa-table"></i> <b>DATA TABEL DESA/KELURAHAN</b></h3>
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
									<?php
									if(isset($_GET['alert'])){
										if($_GET['alert']=="tambah"){
											?>
											<script type="text/javascript">
												$(function() {
													const Toast = Swal.mixin({
														toast: true,
														position: 'top-end',
														showConfirmButton: false,
														timer: 1000
													});

													Swal.fire({
														icon: 'success',
														showConfirmButton: false,
														timer: 1000,
														timerProgressBar: true,
														title: 'BERHASIL! TAMBAH DATA',
														text: 'Data kelurahan/desa berhasil ditambah',
														footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
													}).then(function() {
														window.location = "kelurahan";
													});
												});
											</script>
										<?php }       
									}
									?>
									<!-- Sweetalert 2 delete data -->
									<?php
									if(isset($_GET['alert'])){
										if($_GET['alert']=="ubah"){
											?>
											<script type="text/javascript">
												$(function() {
													const Toast = Swal.mixin({
														toast: true,
														position: 'top-end',
														showConfirmButton: false,
														timer: 1000
													});

													Swal.fire({
														icon: 'success',
														showConfirmButton: false,
														timer: 1500,
														timerProgressBar: true,
														title: 'BERHASIL! UPDATE DATA',
														text: 'Data kelurahan/desa berhasil diupdate',
														footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
													}).then(function() {
														window.location = "kelurahan";
													});
												});
											</script>
										<?php }       
									}
									?>
									<!-- Sweetalert 2 delete data -->
									<?php
									if(isset($_GET['alert'])){
										if($_GET['alert']=="hapus"){
											?>
											<script type="text/javascript">
												$(function() {
													const Toast = Swal.mixin({
														toast: true,
														position: 'top-end',
														showConfirmButton: false,
														timer: 1000
													});

													Swal.fire({
														icon: 'success',
														showConfirmButton: false,
														timer: 1000,
														timerProgressBar: true,
														title: 'BERHASIL! MENGHAPUS DATA',
														text: 'Data kelurahan/desa berhasil dihapus',
														footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
													}).then(function() {
														window.location = "kelurahan";
													});
												});
											</script>
										<?php }       
									}
									?>
									<div class="table-responsive">
										<table id="kecamatan" class="table table-hover small">
											<thead class="">
												<tr class="<?php echo "$i[color]"; ?>">
													<th>NO</th>
													<th>KODE KECAMATAN</th>
													<th>KODE KELURAHAN/DESA</th>
													<th>NAMA KELURAHAN/DESA</th>
													<th><center>AKSI</center></th>
												</tr>
											</thead>
										</table>
										<script type="text/javascript">
											function hanyaAngka(evt) {
												var charCode = (evt.which) ? evt.which : event.keyCode
												if (charCode > 31 && (charCode < 48 || charCode > 57))

													return false;
												return true;
											}
										</script>
										<script type="text/javascript">
											$(document).ready(function(){

												$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
												{
													return {
														"iStart": oSettings._iDisplayStart,
														"iEnd": oSettings.fnDisplayEnd(),
														"iLength": oSettings._iDisplayLength,
														"iTotal": oSettings.fnRecordsTotal(),
														"iFilteredTotal": oSettings.fnRecordsDisplay(),
														"iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
														"iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
													};
												};

												var table = $('#kecamatan').DataTable( {
													"bAutoWidth": false,
												// "scrollY": '50vh',
												"scrollCollapse": false,
												"processing": true,
												"serverSide": true,
												"ajax": 'serverside/kelurahan.php',     
												"columnDefs": [ 
												{ "targets": 0, "data": null, "orderable": true, "searchable": true, "width": '30px', "className": 'center' },
												{
													"targets": 1, "className": 'center', "width": '250px',
													"render": function(data, type, row) {
														return '<span class="badge bg-navy">'+data+'<span>'
													} 
												},
												{
													"targets": 2, "className": 'center', "width": '250px',
													"render": function(data, type, row) {
														return '<span class="badge bg-red">'+data+'<span>'
													} 
												},
												{ "targets": 3, "width": '500px', "className": 'center' },
												{
													"targets": 4, "data": 4,"width": '250px', 
													"render": function(data, type, full) {
														return '<center><div class="btn-group"><p class=\"btn btn-sm bg-info\" data-toggle=\"tooltip\" title=\"Edit\"><a href="ubahkelurahan?id='+data+'"><i class="fa fa-pencil"></i></a></p><p  class=\"btn btn-sm bg-red\" data-toggle=\"tooltip\" title=\"Hapus\"><a data-toggle="modal" type="button" data-target="#hapus"><i class="fa fa-trash"></i></a></p></div><form action="action/kelurahan_delete.php?id='+data+'" method="POST" enctype="multipart/form-data"><div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header  <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><h1><center><i class="fa  fa-question-circle"></i></center></h1><h4>Apa anda yakin akan menghapus data ini?</h4><p>Data yang dihapus tidak dapat dikembalikan...</p></div><div class="modal-footer"><button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-close (alias) faa-tada animated-hover"></i> Tidak</button><button type="submit" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa  fa-check faa-tada animated-hover"></i>  Ya, Hapus</button></div></div></div></div></form</center>';
													} 
												} 
												],
					                "order": [[ 1, "asc"]],           // urutkan data berdasarkan id_transaksi secara descending
					                "iDisplayLength": 10,               // tampilkan 10 data
					                "rowCallback": function (row, data, iDisplayIndex) {
					                	var info   = this.fnPagingInfo();
					                	var page   = info.iPage;
					                	var length = info.iLength;
					                	var index  = page * length + (iDisplayIndex + 1);
					                	$('td:eq(0)', row).html(index);
					                }
					            } );
											});
										</script>
									</div>
								</div>
							</div>
						</div>
					</div>


					<!-- Control Sidebar -->
					<aside class="control-sidebar control-sidebar-dark">
						<!-- Control sidebar content goes here -->
					</aside>


					<?php include "admin-footer.php"; ?>