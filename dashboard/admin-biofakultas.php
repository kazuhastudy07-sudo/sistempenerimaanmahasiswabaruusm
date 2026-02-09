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
								<li class="breadcrumb-item active">Lihat Data</li>
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
				<div class="card-header <?php echo "$iden[color]"; ?>">
					<h3 class="card-title"><i class="fa fa-table"></i> <b>DATA BIODATA FAKULTAS</b></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

							<!-- Sweetalert 2 delete data -->
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
												window.location = "biofakultas";
											});
										});
									</script>
								<?php }       
							}
							?>
							

							<div class="table-responsive">
								<table id="tabeldata" class="table table-hover small">
									<thead class="">
										<tr class="<?php echo "$i[color]"; ?>">
											<th>No.</th>
											<th>Nama Fakultas</th>
											<th>Deskripsi Fakultas</th>
											<th>Gambar Iklan</th>
											<th><center>Aksi</center></th>
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

										var table = $('#tabeldata').DataTable( {
											"bAutoWidth": true,
										"scrollY": '100vh',
										"scrollCollapse": false,
										"processing": true,
										"serverSide": true,
										"ajax": 'serverside/biofakultas.php',     
										"columnDefs": [ 
										{ "targets": 0, "data": null, "orderable": true, "searchable": true, "width": '30px', "className": 'center' },
										{
											"targets": 1, "className": 'center',
											"render": function(data, type, row) {
												return '<span class="badge bg-primary"><i class="fa fa-flag"></i> '+data+'<span>'
											} 
										},

										
										{	
											"targets": 2,
											"render": function(data, type, row) {
												return '<div  style="font-size:10px;">'+data+'</div>'
											} 
										},
										
										{
											"targets": 3, "orderable": false, "searchable": true, "className": 'center',
											"render": function(data, type, row) {
												return '<center><a data-toggle=\"tooltip\" title=\"Lihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/logo/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/logo/'+data+'\" width=\"100px\"></a></center>'
											} 
										}, 
										{
											"targets": 4, "data": 4, 
											"render": function(data, type, full) {
												return '<center><div class="btn-group"><button type="button" style="width:25px;" onclick="window.location.href=\'biofakultasubah?id='+data+'\'" class="btn btn-xs bg-primary" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> </button></div></center>';
											} 
										} 
										],
					                "order": [[ 1, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
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
			<!-- /.card -->
			<!-- /.content-wrapper -->


			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>

			<?php include_once("admin-footer.php"); ?>