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
					window.location = "mediasosial";
				});
			});
		</script>
	<?php }       
}
?>
<div class="content-wrapper">
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
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<div class="card-header  <?php echo "$iden[color]"; ?>">
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM UBAH DATA MEDIA SOSIAL</b></h3>
					<center></center>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="card-body">
							<form class='form-horizontal' role='form' method=POST action='action/mediasosial_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas WHERE id='1'"));
								?>
								<input type='hidden' class='form-control' name='id' value="<?php echo $r['id']; ?>">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<label>Twitter</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa fa-twitter"></i></span>
												</div>
												<input type="text" name="tw" class="form-control" placeholder="Tuliskan Url/Link Akun Twitter" value="<?php echo $r['tw']; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<label>Facebook</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa fa-facebook"></i></span>
												</div>
												<input type="text" name="fb" class="form-control" placeholder="Tuliskan Url/Link Akun Facebook" value="<?php echo $r['fb']; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<label>Whatsapp</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
												</div>
												<input type="text" name="wa" class="form-control" placeholder="Tuliskan Nomor Whatsapp Diawali Dengan 62" value="<?php echo $r['wa']; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-12">
											<label>Instagram</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa fa-instagram"></i></span>
												</div>
												<input type="text" name="ig" class="form-control" placeholder="Tuliskan Nomor Whatsapp Diawali Dengan 62" value="<?php echo $r['ig']; ?>">
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

			<aside class="control-sidebar control-sidebar-dark">
			</aside>
			
			<?php include_once("admin-footer.php"); ?>