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
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM UBAH DATA ADMINISTRATOR</b></h3>
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
							<form class='form-horizontal' role='form' method=POST action='action/admin_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user ='$_GET[id]'"));
								?>
								<input type='hidden' class='form-control' name='id_user' value="<?php echo $r['id_user']; ?>">

								<div class="form-group">
									<div class="row">
										<div class="col-sm-6">
											<label>Nama </label><br/>
											<input type="text" name="name" class="form-control" value="<?php echo $r['name']; ?>" required="required">
										</div>
										<div class="col-sm-6">
											<label>Ganti Photo</label><br/>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" name="gambar" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile">
													<label class="custom-file-label" for="exampleInputFile">Unggah Photo Baru</label>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<label>Email </label><br/>
											<input type="text" name="email" class="form-control" value="<?php echo $r['email']; ?>" required="required">
										</div>
										<div class="col-sm-6">
											<label>Password </label><br/>
											<input type="password" name="password" class="form-control" placeholder="Kosongkan Password Jika Tidak Ingin Diganti">
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
										<a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./admin'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
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