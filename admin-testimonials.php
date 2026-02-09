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
								<li class="breadcrumb-item active">Lihat Data </li>
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
					<h3 class="card-title"><i class="fa fa-list-ol"></i> <b>DATA TABEL TESTIMONIALS</b></h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						
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
											window.location = "testimonials";
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
										<th>Nama</th>
										<th>Pekerjaan</th>
										<th>Testimoni</th>
										<th>Status</th>
										<th>Photo</th>
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

									var table = $('#data').DataTable( {
										"bAutoWidth": false,
										// "scrollY": '50vh',
										"scrollCollapse": false,
										"processing": true,
										"serverSide": true,
										"ajax": 'serverside/testimonials.php',     
										"columnDefs": [ 
										{ "targets": 0, "data": null, "orderable": true, "searchable": true, "width": '30px', "className": 'center' },{
											"targets": 1, "className": 'center', 
											"render": function(data, type, row) {
												return '<small">'+data+'<small>'
											} 
										},
										{ "targets": 2,  "className": 'center' },
										{ "targets": 3,  "className": 'center' },
										{
											"targets": 4,
											"render": function (data, type, row) {
												if (data == 0) {
													return "<label class='badge bg-red'><i class='fa fa-times-circle'></i> Tidak Di Publis</label>";
												}
												else
													return "<label class='badge bg-info'><i class='fa fa-check-circle'></i> Di Publis</label>";
											}
										},
										{
											"targets": 5, "orderable": false, "searchable": true, "className": 'center',
											"render": function(data, type, row) {
												return '<center><a data-toggle=\"tooltip\" title=\"Lihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" width=\"40px\"></a></center>'
											} 
										}, 
										{
											"targets": 6, "data":6, "width": '100px', 
											"render": function(data, type, row) {
													return '<center><div class="btn-group"><button type="button" style="width:25px;" class="btn btn-xs bg-primary ubahtestimonials" data-id="'+data+'" data-toggle="tooltip" title="Publis Data"><i class="fa fa-check-circle"></i></button><button type="button" style="width:25px;" class="btn btn-xs bg-red ubahtestimonialss" data-id="'+data+'" data-toggle="tooltip" title="Unpublis Data"><i class="fa fa-times-circle"></i></button></div></center>';
											} 
										} 
										],
					                "order": [[ 6, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
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
		<script>
			$(function()
			{
				$(document).on('click','.ubahtestimonials',function(e)
				{
					e.preventDefault();
					$("#ubahModal").modal('show');
					$.post('testimoni_publis.php',
						{id_testi:$(this).attr('data-id')},
						function(html)
						{
							$(".modal-body").html(html);
						});
				});
			});
		</script>
		<form action="action/testimonials_update_publis.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
			<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header <?php echo "$iden[color]";?>">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Form Data Testimonials</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">x</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Publis</button>
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<script>
			$(function()
			{
				$(document).on('click','.ubahtestimonialss',function(e)
				{
					e.preventDefault();
					$("#ubahhModal").modal('show');
					$.post('testimoni_publis.php',
						{id_testi:$(this).attr('data-id')},
						function(html)
						{
							$(".modal-body").html(html);
						});
				});
			});
		</script>
		<form action="action/testimonials_update_unpublis.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
			<div class="modal fade" id="ubahhModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header <?php echo "$iden[color]";?>">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Form Data Testimonials</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">x</span>
							</button>
						</div>
						<div class="modal-body">
							
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Unpublis</button>
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php include_once("admin-footer.php"); ?>
		