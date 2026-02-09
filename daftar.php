<?php 
require_once "../assets/config/koneksi.php";
session_start();
error_reporting(1);

$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['id_rekomendasi'] = $_POST['id_rekomendasi'];
$_SESSION['rekomendasi'] = $_POST['rekomendasi'];
error_reporting(1); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Aplikasi Pendaftaran Mahasiswa <?php echo "$iden[nama]"; ?>">
    <meta name="author" content="<?php echo "$i[aplikasi]"; ?>">
    <title><?php $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1"));  echo "$iden[aplikasi] "; ?></title>
    <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$i[logo]"; ?>">
    <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css"/>
    <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="wizard.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="content">
          <div class="container">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <form action="" method="post" class="f1"  style="text-align: center;">
                    <h3>
                        <img width="70px" src="../assets/dist/img/logo/<?php echo "$i[logo]"; ?>"><br/>
                        <?php echo $i['aplikasi']; ?>
                    </h3>
                    <p>
                        <b style="text-transform: uppercase;"><?php echo $i['nama']; ?></b><br/><i class="fa fa-edit"></i> Form Pendaftaran Mahasiswa Baru <?php $g = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb INNER JOIN gelombang ON panitia_pmb.id_gelombang = gelombang.id_gelombang LIMIT 1"));
                        $tgl_a = date("d-m-Y", strtotime($g['tgl_a'])); 
                        $tgl_b = date("d-m-Y", strtotime($g['tgl_b'])); ?>
                        <label class="badge bg-info"><i class="fa fa-star"></i> <?php echo "$g[nama_gelombang]";  ?></label>
                        <br/><small>Tanggal: <?php echo "$tgl_a";?> s/d <?php echo "$tgl_b";?></small>
                    </p>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                            <p><small>Akun</small></p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                            <p><small>Alamat</small></p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-users"></i></div>
                            <p><small>Keluarga</small></p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-sitemap"></i></div>
                            <p><small>Prodi</small></p>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon"><i class="fa fa-cloud-upload"></i></div>
                            <p><small>Unggah</small></p>
                        </div>
                    </div>
                    <!-- step 1 -->
                    <fieldset>
                        <h4>Data Akun & Informasi</h4>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group">
                                  <label>Email <badge class="badge bg-red">Digunakan Sebagai Username Login</badge></label>
                                  <input class="form-control" type="email" placeholder="Tuliskan Alamat Email" name="email" required="required">
                              </div>
                          </div> 
                          <div class="col-sm-6 col-xs-6">
                            <div class="form-group">
                              <label>Password <badge class="badge bg-red">Digunakan Sebagai Password Login</badge></label>
                              <input class="form-control" type="password" placeholder="Tuliskan Password" name="password"  required="required">
                          </div>
                      </div> 
                  </div>

                  <div class="row">
                      <div class="col-sm-6 col-xs-6">
                        <div class="form-group">
                          <label>Dari Mana Mengertahui <?php echo $i['nama']; ?>?</label>
                          <select class="form-control" name="id_rekomendasi" id="rekomendasi" required="required">
                            <option></option>
                            <?php
                            $tampil = mysqli_query($con, "SELECT * FROM rekomendasi ORDER BY id_rekomendasi");
                            while($row=mysqli_fetch_array($tampil)) 
                            {
                              ?>
                              <option class="<?php echo $_SESSION['id_rekomendasi'] ?>"  value="<?php echo $row['id_rekomendasi'];?>" <?php echo $row['id_rekomendasi'] == $_SESSION['id_rekomendasi'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_rekomendasi']; ?></option>
                              <?php
                          }
                          ?>
                      </select>
                  </div>
              </div> <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label>Yang Memberi Rekomendasi <badge class="badge bg-red">Bila Tidak Ada Isi Dengan Tanda (-)</badge></label>
                  <input class="form-control" type="text" placeholder="Tuliskan Nama Yang Memberi Rekomendasi" name="rekomendasi" required="required">
              </div>
          </div> 
      </div> 
      <div class="row">
        <div class="col-12">
            <div class="form-group">
              <div class="f1-buttons">
                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>
            </div>
        </div>
    </div>
</div>
</fieldset>
<!-- step 2 -->
<fieldset>
    <h4>Alamat Lengkap</h4>
    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="file" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
    </div>
    <div class="form-group">
        <label>Alamat Rumah</label>
        <input type="text" name="alamat_rumah" placeholder="Alamat Rumah" class="form-control">
    </div>
    <div class="form-group">
        <label>Alamat Kantor</label>
        <textarea name="alamat_kantor" placeholder="Alamat Kantor" class="form-control"></textarea>
    </div>
    <div class="f1-buttons">
        <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
        <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
    </div>
</fieldset>
<!-- step 3 -->
<fieldset>
    <h4>Buat Akun</h4>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="" placeholder="Password" class="form-control">
    </div>
    <div class="form-group">
        <label>Ulangi password</label>
        <input type="password" name="ulangi_password" placeholder="Ulangi password" class="form-control">
    </div>
    <div class="f1-buttons">
        <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
        <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
    </div>
</fieldset>
<!-- step 4 -->
<fieldset>
    <h4>Sosial Media</h4>
    <div class="form-group">
        <label>Facebook</label>
        <input type="text" name="facebook" placeholder="Facebook" class="form-control">
    </div>
    <div class="form-group">
        <label>Twitter</label>
        <input type="text" name="twitter" placeholder="Twitter" class="form-control">
    </div>
    <div class="form-group">
        <label>Google plus</label>
        <input type="text" name="google_plus" placeholder="Google plus" class="form-control">
    </div>
    <div class="f1-buttons">
        <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
        <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Submit</button>
    </div>
</fieldset>
</form>
</div>
</div>
</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
<script type="text/javascript">
   function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
});
  var uploadField = document.getElementById("exampleInputFile");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
      {   Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
  this.value = "";
};
};
</script>
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
});
  var uploadField = document.getElementById("exampleInputFilee");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
      this.value = "";
  };
};
</script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
});
</script>

<script>
  $( document ).ready(function() {
    $('#rekomendasi').select2({
      placeholder: 'Pilih Pemberi Rekomendasi',
      language: "id"
  });
    $('#agama').select2({
      placeholder: 'Pilih Agama',
      language: "id"
  });
    $('#kdk').select2({
      placeholder: 'Pilih Kedudukan/Jenis Pengurus',
      language: "id"
  });
    $('#jk').select2({
      placeholder: 'Pilih Jenis Kelamin',
      language: "id"
  });
    $('#provinsi').select2({
      placeholder: 'Pilih Provinsi',
      language: "id"
  });
    $('#kota').select2({
      placeholder: 'Pilih Kota/Kabupaten',
      language: "id"
  });
    $('#kecamatan').select2({
      placeholder: 'Pilih Kecamatan',
      language: "id"
  });
    $('#kelurahan').select2({
      placeholder: 'Pilih Kelurahan',
      language: "id"
  });
    $('#pendidikan').select2({
      placeholder: 'Pilih Pendidikan',
      language: "id"
  });
    $('#pekerjaan').select2({
      placeholder: 'Pilih Pekerjaan',
      language: "id"
  });

    $('#pangkat').select2({
      placeholder: 'Pilih Pangkat',
      language: "id"
  });

    $('#tahun').select2({
      placeholder: 'Pilih Tahun Bergabung',
      language: "id"
  });

    $("#provinsi").change(function(){
      $("img#load1").show();
      var id_prov = $(this).val(); 
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "data-wilayah-satu.php?jenis=kota",
        data: "id_prov="+id_prov,
        success: function(msg){
          $("select#kota").html(msg);                                                       
          $("img#load1").hide();
          getAjaxKota();                                                        
      }
  });                    
  });  

    $("#kota").change(getAjaxKota);
    function getAjaxKota(){
      $("img#load2").show();
      var id_kab = $("#kota").val();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "data-wilayah-satu.php?jenis=kecamatan",
        data: "id_kab="+id_kab,
        success: function(msg){
          $("select#kecamatan").html(msg);                              
          $("img#load2").hide(); 
          getAjaxKecamatan();                                                    
      }
  });
  }

  $("#kecamatan").change(getAjaxKecamatan);
  function getAjaxKecamatan(){
      $("img#load3").show();
      var id_kec = $("#kecamatan").val();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "data-wilayah-satu.php?jenis=kelurahan",
        data: "id_kec="+id_kec,
        success: function(msg){
          $("select#kelurahan").html(msg);                              
          $("img#load3").hide();                                                 
      }
  });
  }

  $("#statuspegawai").change(function(){
      $("img#load4").show();
      var id_sp = $(this).val(); 
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "data-pangkat.php?jenis=pangkat",
        data: "id_sp="+id_sp,
        success: function(msg){
          $("select#pangkat").html(msg);                                                       
          $("img#load4").hide();
          getAjaxPangkat();                                                        
      }
  });                    
  });  

});
</script>
<script type="text/javascript">
  $(document).ajaxStart(function() { Pace.restart(); });
  $('.ajax').click(function(){
    $.ajax({url: '#', success: function(result){
      $('.ajax-content').html('<hr>Ajax Request Completed !');
  }});
});
</script>

<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
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