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
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark"><i class="nav-icon fa fa-search-plus faa-tada animated-hover"></i> SCAN QRCODE <?php echo "$i[aplikasi] "; ?> <i class="fa fa-qrcode"></i></h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a type="button" onclick="window.location.href='administrator'"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Scan QRcode</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header <?php echo "$iden[color]"; ?>">
              <h3 class="card-title"> <i class="fa fa-qrcode"></i> Scanner QRcode Kartu Anggota </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="d-md-flex">
                <div class="p-2 flex-fill" style="overflow: hidden">
                  <!-- Map will be created here -->
                  <div id="world-map-markers">
                    <div class="map">
                     <center>
                      <canvas style="width: 500px;height: 100%;"></canvas>

                      <select class="form-control select2" ></select>

                    </center>
                    <script type="text/javascript" src="validasi/js/jquery.js"></script>
                    <script type="text/javascript" src="validasi/js/qrcodelib.js"></script>
                    <script type="text/javascript" src="validasi/js/webcodecamjquery.js"></script>
                    <script type="text/javascript">
                      var arg = {
                        resultFunction: function(result) {
                         var redirect = 'validasikta';
                         $.redirectPost(redirect, {npa: result.code});
                       }
                     };

                     var decoder = $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
                     decoder.buildSelectMenu("select");
                     decoder.play();
                     $('select').on('change', function(){
                      decoder.stop().play();
                    });

                     $.extend(
                     {
                      redirectPost: function(location, args)
                      {
                        var form = '';
                        $.each( args, function( key, value ) {
                          form += '<input type="hidden" name="'+key+'" value="'+value+'">';
                        });
                        $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
                      }
                    });
                  </script>
                </div>
              </div>
            </div>

          </div><!-- /.d-md-flex -->
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
    <div class="col-md-4">
      <div class="callout callout-danger">
        <h5><i class="fa fa-info-circle"></i> Petunjuk Penggunaan!</h5>

        <p>Silahkan arahkan  Kode QR pada kartu anggota ke kamera untuk melakukan scan, jika data anggota ditemukan maka akan ada notifikasi lalu mengarahkan ke halaman data anggota dan jika tidak ditemukan akan ada notifikasi bahwa data tidak ditemukan. </p>
        <center><img width="75%" src="../assets/dist/img/logo/<?php echo "$iden[qr]"; ?>" class="img-responsive img-thumbnail" alt="Responsive image"></center>
      </div>
      <!-- Info Boxes Style 2 -->
      
    </div>
  </div>
</div>
</div>
</div>
</section>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div><footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="http://adminlte.io" class="text-white">Aplikasi <?php echo $iden['nama'];?></a></strong>
  <div class="float-right d-none d-sm-inline-block">
    <b>Version 2021 | powered by <a type="button" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'" href="" class="badge bg-white" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-heartbeat faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
  </div>
</footer>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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
<!-- DataTables -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
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
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets/dist/js/demo.js"></script>
<!-- bs-custom-file-input -->

<!-- jQuery Mapael -->
<script src="../assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../assets/plugins/raphael/raphael.min.js"></script>
<script src="../assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../assets/dist/js/pages/dashboard2.js"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
</body>
</html>