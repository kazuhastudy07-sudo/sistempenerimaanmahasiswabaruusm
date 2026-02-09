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
								<li class="breadcrumb-item active">Balangko</li>
							</ol>
						</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
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
						title: 'BERHASIL!',
						text: 'Data berhasil diupdate',
						footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
					}).then(function() {
						window.location = "blangko";
					});
				});
			</script>
		<?php }       
	}
	?>
	<section class="content">
		<div class="container-fluid">
			<!-- Default box -->
			<div class="card">
				<div class="card-header <?php echo "$iden[color]";?>">
					<h3 class="card-title"><i class="fa fa-credit-card"></i> <b>DESAIN BLANGKO KARTU</b></h3>
					<center></center>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
							</div>
						</div>

						<div class="card-body">
							



							<div class="table-responsive">
								<table id="blangko" class="table table-bordered table-hover small">
									<thead class="">
										<tr class="<?php echo "$iden[color]";?>">											<th>NO</th>
											<th>NAMA BLANGKO</th>
											<th>UKURAN</th>
											<th>JENIS KERTAS</th>
											<th>BLANGKO DEPAN</th>
											<th>BLANGKO BELAKANG</th>
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

										var table = $('#blangko').DataTable( {
											"bAutoWidth": false,
										// "scrollY": '50vh',
										"scrollCollapse": false,
										"processing": true,
										"serverSide": true,
										"ajax": 'serverside/blangko.php',     
										"columnDefs": [ 
										{ "targets": 0, "data": null, "orderable": true, "searchable": true, "width": '30px', "className": 'center' },{
											"targets": 1, "className": 'center', 
											"render": function(data, type, row) {
												return '<span class="badge bg-dark">'+data+'<span>'
											} 
										},
										{ "targets": 2, "className": 'center' },
										{ "targets": 3, "className": 'center' },
										{
											"targets": 4,  "orderable": false, "searchable": true, "className": 'center',
											"render": function(data, type, row) {
												return '<center><a data-toggle=\"tooltip\" title=\"Klik Untuk Melihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/blangko/'+data+'\',\'popuppage\',\'width=820,toolbar=0,resizable=0,scrollbars=yes,height=800,top=100,left=300\');\" ><img class=\"img-responsive img-thumbnail" alt="Responsive image\" src=\"../assets/dist/img/blangko/'+data+'\" height=\"50px\"></a><br><br><p class=\"btn btn-sm bg-navy\" data-toggle=\"tooltip\" title=\"Download\"><a onclick="window.location.href=\'admin-dtcunduh.php?nama_file=../assets/dist/img/blangko/'+data+'\'"><i class="fa fa-download faa-vertical animated"></i></a></p><center>'
											} 
										},
										{
											"targets": 5,  "orderable": false, "searchable": true, "className": 'center',
											"render": function(data, type, row) {
												return '<center><a data-toggle=\"tooltip\" title=\"Klik Untuk Melihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/blangko/'+data+'\',\'popuppage\',\'width=820,toolbar=0,resizable=0,scrollbars=yes,height=800,top=100,left=300\');\" ><img class=\"img-responsive img-thumbnail" alt="Responsive image\" src=\"../assets/dist/img/blangko/'+data+'\" height=\"50px\"></a><br><br><p class=\"btn btn-sm bg-navy\" data-toggle=\"tooltip\" title=\"Download\"><a onclick="window.location.href=\'admin-dtcunduh.php?nama_file=../assets/dist/img/blangko/'+data+'\'"><i class="fa fa-download faa-vertical animated"></i></a></p><center>'
											} 
										},
										{
											"targets": 6, "data": 6, 
											"render": function(data, type, full) {
												return '<center><div class="btn-group"><p class=\"btn btn-sm bg-info\" data-toggle=\"tooltip\" title=\"Edit\"><a href="ubahblangko?id='+data+'"><i class="fa fa-pencil "></i></a></p></div></center>';
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
										jQuery(document).ready(function($){ $('.delete-link').on('click',function(){ var getLink = $(this).attr('href'); Swal.fire({ title: 'Anda yakin akan menghapus data ini?', text: 'Data yang dihapus tidak dapat dikembalikan',icon: 'question',  confirmButtonText: 'Ya, Hapus!', showCancelButton: true,cancelButtonColor: "#dc3545", cancelButtonText: 'Batal',  }).then(function(){ window.location.href = getLink }); return false; }); });
									});

								</script>
							</div>
							<!-- /.card-body -->
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