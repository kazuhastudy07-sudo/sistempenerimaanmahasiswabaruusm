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
								<li class="breadcrumb-item active"> Lihat Data</li>
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
					<h3 class="card-title"><i class="fa fa-list-ol"></i> <b>DATA TABEL FAQ</b></h3>
					<div class="card-tools">
						<button type="button" onclick="window.location.href='faqtambah'" class="btn btn-tool bg-navy" data-card-widget="collapse" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus-circle"></i> Tambah Data</button>
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<!-- Sweetalert 2 create data -->
						<?php
						if(isset($_GET['alert'])){
							if($_GET['alert']=="tambah"){
								?>
								<script type="text/javascript">
									$(function() {
										Swal.fire({
											icon: 'success',
											showConfirmButton: false,
											timer: 1000,
											timerProgressBar: true,
											title: 'Sukses!',
											text: 'Data Berhasil Ditambah',
											footer: 'APLIKASI <?php echo "$aplikasi";?>'
										}).then(function() {
											window.location = "faq";
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

										Swal.fire({
											icon: 'success',
											showConfirmButton: false,
											timer: 1500,
											timerProgressBar: true,
											title: 'Sukses!',
											text: 'Data Berhasil Diupdate',
											footer: 'APLIKASI <?php echo "$aplikasi";?>'
										}).then(function() {
											window.location = "faq";
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
											title: 'Sukses!',
											text: 'Data Berhasil Dihapus',
											footer: 'APLIKASI <?php echo "$aplikasi";?>'
										}).then(function() {
											window.location = "faq";
										});
									});
								</script>
							<?php }       
						}
						?>



						<div class="table-responsive">
							<table id="data" class="table table-hover small">
								<thead class="">
									<tr class="<?php echo "$i[color]"; ?>">
										<th>No.</th>
										<th>Pertanyaan</th>
										<th>Jawaban</th>
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

									var table = $('#data').DataTable( {
										"bAutoWidth": false,
										// "scrollY": '50vh',
										"scrollCollapse": false,
										"processing": true,
										"serverSide": true,
										"ajax": 'serverside/faq.php',     
										"columnDefs": [ 
										{ "targets": 0, "data": null, "orderable": true, "searchable": true, "width": '30px', "className": 'center' },{
											"targets": 1, "className": 'center', 
											"render": function(data, type, row) {
												return '<small">'+data+'<small>'
											} 
										},
										{ "targets": 2,  "className": 'center' },
										{
											"targets": 3, "data": 3, 
											"render": function(data, type, full) {
												return '<center><div class="btn-group"><button type="button" style="width:25px;" onclick="window.location.href=\'faqubah?id='+data+'\'" class="btn btn-xs bg-primary" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> </button><button type="button" style="width:25px;" class="btn btn-xs bg-red hapusfaq" data-id="'+data+'" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></button></div></center>';
											} 
										} 
										],
					                "order": [[ 3, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
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
					<div class="card-footer small text-red">
						<i class="fa fa-info-circle"></i> Mohon untuk tidak meng-hapus data, jika telah melakukan penginputan data, karena akan menyebabkan data error!
					</div>
				</div>
			</div>
		</div>
		<aside class="control-sidebar control-sidebar-dark">
		</aside>

		<?php include_once("admin-footer.php"); ?>
		<script>
			$(function()
			{
				$(document).on('click','.hapusfaq',function(e)
				{
					e.preventDefault();
					$("#hapusModal").modal('show');
					$.post('faq_hapus.php',
						{id_faq:$(this).attr('data-id')},
						function(html)
						{
							$(".modal-body").html(html);
						});
				});
			});
		</script>
		<form action="action/faq_delete.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
			<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header <?php echo "$iden[color]";?>">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Form Data Faq</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">x</span>
							</button>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Hapus</button>
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
						</div>
					</div>
				</div>
			</div>
		</form>