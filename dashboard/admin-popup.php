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
					window.location = "popup";
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
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM UBAH DATA POPUP</b></h3>
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
							<form class='form-horizontal' role='form' method=POST action='action/popup_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM iklan WHERE id_iklan ='1'"));
								?>
								<input type='hidden' class='form-control' name='id_iklan' value="<?php echo $r['id_iklan']; ?>">

								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<label>GAMBAR IKLAN POPUP</label><br/>
											<img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/dist/img/iklan/<?php echo $r['gambar_iklan'];?>" style="width: 100%; height: 300px; object-fit: cover;overflow: hidden;" alt="img-responsive">
											<br/>
											<label>Ganti Gambar</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" name="gambar_iklan" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile">
													<label class="custom-file-label" for="exampleInputFile">Unggah Gambar Baru</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<div class="pad">
												<textarea class="textarea" name="judul_iklan" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo $r['judul_iklan']; ?></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="card-footer">
								<div class="row">
									<div class="col-sm-8 btn-xs-4">
										<i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk meng-update data!	
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
			<!-- /.card -->
			<!-- /.content-wrapper -->


			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			
			<?php include_once("admin-footer.php"); ?>