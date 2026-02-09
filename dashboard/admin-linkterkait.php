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
					window.location = "linkterkait";
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
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM UBAH DATA LINK TERKAIT</b></h3>
					<center></center>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="card-body">
							<form class='form-horizontal' role='form' method=POST action='action/linkterkait_update.php' enctype='multipart/form-data'>
								<?php
								$r1=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='1'"));
								?>
								<input type='hidden' class='form-control' name='id_link' value="<?php echo $r1['id_link']; ?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="nama_link" class="form-control" placeholder="Tuliskan Nama Link Terkait" value="<?php echo $r1['nama_link']; ?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="url_link" class="form-control" placeholder="Tuliskan Url/Link Terkait" value="<?php echo $r1['url_link']; ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> UPDATE</button>
										</div>
									</div>
								</div>
							</form>
							<form class='form-horizontal' role='form' method=POST action='action/linkterkait_update.php' enctype='multipart/form-data'>
								<?php
								$r2=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='2'"));
								?>
								<input type='hidden' class='form-control' name='id_link' value="<?php echo $r2['id_link']; ?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="nama_link" class="form-control" placeholder="Tuliskan Nama Link Terkait" value="<?php echo $r2['nama_link']; ?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="url_link" class="form-control" placeholder="Tuliskan Url/Link Terkait" value="<?php echo $r2['url_link']; ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> UPDATE</button>
										</div>
									</div>
								</div>
							</form>
							<form class='form-horizontal' role='form' method=POST action='action/linkterkait_update.php' enctype='multipart/form-data'>
								<?php
								$r3=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='3'"));
								?>
								<input type='hidden' class='form-control' name='id_link' value="<?php echo $r3['id_link']; ?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="nama_link" class="form-control" placeholder="Tuliskan Nama Link Terkait" value="<?php echo $r3['nama_link']; ?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="url_link" class="form-control" placeholder="Tuliskan Url/Link Terkait" value="<?php echo $r3['url_link']; ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> UPDATE</button>
										</div>
									</div>
								</div>
							</form>
							<form class='form-horizontal' role='form' method=POST action='action/linkterkait_update.php' enctype='multipart/form-data'>
								<?php
								$r4=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='4'"));
								?>
								<input type='hidden' class='form-control' name='id_link' value="<?php echo $r4['id_link']; ?>">
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<input type="text" name="nama_link" class="form-control" placeholder="Tuliskan Nama Link Terkait" value="<?php echo $r4['nama_link']; ?>">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" name="url_link" class="form-control" placeholder="Tuliskan Url/Link Terkait" value="<?php echo $r4['url_link']; ?>">
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> UPDATE</button>
										</div>
									</div>
								</div>
							</form>
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="col-sm-10 btn-xs-10">
									<i class="fa  fa-info-circle"></i> Silahkan klik tombol Update untuk meng-ubah data!	
								</div>

								<div class="col-sm-2 col-xs-2">
									<a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-arrow-left"></i> KEMBALI</a>
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