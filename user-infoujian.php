<?php include "user-header.php"; ?>
<?php include "user-menu.php"; ?>
<div class="container">
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">DATA ANGGOTA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a type="button" onclick="window.location.href='user'"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Detail Data</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <?php
  $r=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS jumlah tbl_soal WHERE aktif='Y'"));
  $hitung=mysqli_num_rows($r);
  $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));?>
  <div class="content">
    <div class="container">
      <?php 
      $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));?>
      <div class="card card-primary card-outline">
        <div class="card-body">
          <h5 class="card-title"><i class="fa fa-info-circle"></i> Informasi Ujian</h5>
          <center>

            <p class="card-text">

            <img src="../assets/dist/img/logo/<?php echo "$i[logo] "; ?>" style="width: 100px"><br/>
              <?php echo $pu['nama_ujian']; ?><br/><?php echo $aplikasi; ?><br/>Saat ini belum dibuka, silahkan klik lihat informasi jadwal
            </p>
            <a href="ujian" class="card-link badge bg-warning"><i class="fa fa-list-alt"></i> Informasi Jadwal</a>
          </center>
        </div>
      </div>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>

    </div>
  </div>

  <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <br />
  <br />
  <br />
  <?php

  $idxx = encrypt_decrypt('encrypt', $_SESSION[idx]);
  if(isset($_GET['alert'])){
    if($_GET['alert']=="berhasil"){

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
            text: 'Data Anggota berhasil diupdate',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          }).then(function() {
            window.location = "detail?id=<?php echo "$idxx" ?>";
          });
        });
      </script>
      <?php 
    }
  }
  ?>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div><!-- /.content-wrapper -->
<footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <div class="container">
    <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="./user" class="text-white">Aplikasi <?php echo $iden['nama'];?></a></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>powered by <a type="button" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'" href="" class="badge bg-white" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-code faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
    </div></div>
  </footer>
  <!-- ./wrapper -->
  <!-- jQuery UI 1.11.4 -->
  <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/dist/js/demo.js"></script>
  <!-- SweetAlert2 -->
  <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../assets/plugins/toastr/toastr.min.js"></script>
  <!-- Bootstrap -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="../assets/dist/js/demo.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../assets/dist/js/pages/dashboard2.js"></script>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
