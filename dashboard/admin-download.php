<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<?php
if(isset($_GET['alert'])){
  if($_GET['alert']=="berhasil"){

    ?>
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 1500
        });

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1000,
          timerProgressBar: true,
          title: 'BERHASIL!',
          text: 'Anda Berhasil Masuk Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "administrator";
        });
      });
    </script>
    <?php 
  }elseif ($_GET['alert']=="keluar") {
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
          title: 'BERHASIL!',
          text: 'Anda Berhasil Keluar Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "../logout";
        });
      });
    </script>
    <?php
  }   
  elseif ($_GET['alert']=="reset") {
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
          timer: 2000,
          timerProgressBar: true,
          title: 'BERHASIL! GANTI PASSWORD',
          text: 'Anda berhasil merubah password, silahkan login kembali',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "../logout";
        });
      });
    </script>
    <?php
  }           
  elseif ($_GET['alert']=="profil") {
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
          timer: 2000,
          timerProgressBar: true,
          title: 'BERHASIL! GANTI PHOTO',
          text: 'Anda berhasil merubah photo profil',
          footer: 'APLIKASI KARPEG <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "administrator";
        });
      });
    </script>
    <?php
  }           
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Unduh Data Pegawai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a type="button" onclick="window.location.href='administrator'"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Unduh Data</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="card card-<?php echo "$iden[sidebar]"; ?>">                     
      <div class="card-header">
        <h3 class="card-title"><i class="fa fa-cloud-download"></i> Form Unduh Data Pegawai</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">
            <form class='form-horizontal' role='form' method=POST target='blank' action='unduhpegawai' enctype='multipart/form-data'> 
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4 col-xs-4">
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Dari Tanggal</span>
                      </div>
                      <input type="date" class="form-control" name="from" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                  </div>
                  <div class="col-sm-5 col-xs-5">
                    <div class="input-group mb-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Sampai Tanggal</span>
                      </div>
                      <input type="date" class="form-control" name="end" value="<?php echo date('Y-m-d'); ?>" >
                    </div>
                  </div>

                  <div class="col-sm-3 col-xs-3">
                    <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Ekspor Data Excel</button>
                  </div>
                </div>
              </form>


            </div>
          </div>
        </div>
        <!-- /.card -->
        <!-- /.content-wrapper -->
      </section>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <?php include "admin-footer.php"; ?>
