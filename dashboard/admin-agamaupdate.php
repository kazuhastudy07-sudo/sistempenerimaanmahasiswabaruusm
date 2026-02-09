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
					<h3 class="card-title"><i class="fa fa-edit (alias)"></i> <b>FORM UBAH DATA AGAMA</b></h3>
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
							<form class='form-horizontal' role='form' method=POST action='action/agama_update.php' enctype='multipart/form-data'>
								<?php
								$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM agama
									WHERE id_agm ='$_GET[id]'"));
									?>
									<input type='hidden' class='form-control' name='id_agm' value="<?php echo $r['id_agm']; ?>">

									<div class="form-group">
										<div class="row">
											<div class="col-sm-4 col-xs-4">
												<label>KODE AGAMA<span class="badge text-red">*</span></label>
												<input type="text" class="form-control" value="<?php echo $r['id_agm']; ?>" disabled>
											</div>
											<div class="col-sm-8 col-xs-8">
												<label>NAMA AGAMA<span class="badge text-red">*</span></label>
												<input type="text" name="a" class="form-control" value="<?php echo $r['nama_agm']; ?>">
											</div>
										</div>
									</div>
								</div>
								
								<div class="card-footer">
									<div class="row">
										<div class="col-sm-8 btn-xs-4">
											<i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk meng-update data anda
										</div>

										<div class="col-sm-4 col-xs-4">
											<button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check"></i> S I M P A N</button>
											<a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='agama'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-remove (alias)"></i> B A T A L</a>
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
				<!-- /.control-sidebar -->

				<script src="../assets/dist/webcam/java.js"></script>
				<script src="../assets/dist/webcam/webcam.min.js"></script>

				<script src="../assets/plugins/jquery/jquery.min.js"></script>
				<script src="../assets/dist/js/jquery-1.10.2.min.js"></script>
				<script src="../assets/dist/js/jquery.chained.min.js"></script>
				<script>

					$("#pegawai_bidang").chained("#pegawai_bidang");
					$("#pegawai_status").chained("#pegawai_status");
					$("#jk").chained("#jk");
					$("#agama").chained("#agama");
					$("#status_kawin").chained("#status_kawin");
					$("#kabupaten").chained("#provinsi");
					$("#kecamatan").chained("#kabupaten");
					$("#kelurahan").chained("#kecamatan");
				</script>
				<script src="../assets/dist/js/bootstrap.min.js"></script>
				<script src="../assets/dist/js/bootstrap.min.css"></script>
				<script src="../assets/plugins/jquery/jquery.min.js"></script>
				<!-- Bootstrap 4 -->
				<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
				<!-- DataTables -->
				<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
				<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
				<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
				<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
				<?php include_once("admin-footer.php"); ?>