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
                <li class="breadcrumb-item active">Data Indentitas </li>
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
                timer: 1000
              });

              Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                title: 'BERHASIL! UPDATE DATA',
                text: 'Data identitas anda berhasl diupdate',
                footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
              }).then(function() {
                window.location = "identitas";
              });
            });
          </script>
          <?php 
        }elseif ($_GET['alert']=="reset") {
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
                title: 'BERHASIL! RESET PASSWORD',
                text: 'Password berhasil direset',
                footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
              }).then(function() {
                window.location = "identitas";
              });
            });
          </script>
          <?php
        }       
      }
      ?>
      <!-- Default box -->
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title"><b><i class="fa fa-edit"></i> Form Ubah Data Identitas Aplikasi</b></h3>
          <div class="card-tools">
            <div class="btn-group">
              <a type="button" class="btn btn-xs bg-red" onclick="window.location.href='./'"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="card-body">
              <form class='form-horizontal' role='form' method=POST action='action/identitas_update.php' enctype='multipart/form-data'>
                <?php
                $r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas WHERE id ='1'"));
                ?>

                <input type='hidden' class='form-control' name='id' value="<?php echo $r['id']; ?>">

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Logo Aplikasi<span class="badge text-red">*</span></label><br>
                      <img style="width: 25%;" class="img-thumbnail" src="../assets/dist/img/logo/<?php echo $r['logo']; ?>">

                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <br>
                      <br>
                      <label>Logo aplikasi digunakan untuk logo pada EKTA<span class="badge text-red">* Jika anda meng-ganti logo maka logo pada kartu tanda anggota juga akan ber-ubah</span></label>
                      <br>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                        <label class="custom-file-label" multiple accept='image/*' for="exampleInputFile">Ganti Logo Aplikasi</label>
                        <input type="hiiden" class="custom-file-input" id="exampleInputFile" name="logoo">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Judul Aplikasi<span class="badge text-red">*</span></label>
                      <input type="text" class="form-control" name="aplikasi" value="<?php echo $r['aplikasi']; ?>">
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <label>Nama Lengkap Aplikasi<span class="badge text-red">*</span></label>
                      <input type="text" class="form-control" name="nama" value="<?php echo $r['nama']; ?>">
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Email<span class="badge text-red">* Digunakan sebagai pengirim kode OTP User</span></label>
                      <input type="email" class="form-control" name="email" value="<?php echo $r['email']; ?>">
                    </div>
                    <div class="col-sm-3 col-xs-3">
                      <label>Nomor Telp./HP<span class="badge text-red">*</span></label>
                      <input type="number" class="form-control" name="hp" value="<?php echo $r['hp']; ?>">
                    </div>
                    <div class="col-sm-3 col-xs-3">
                      <label>Nomor HP (Whatsapp)<span class="badge text-red">*</span></label>
                      <input type="number" class="form-control" name="wa" value="<?php echo $r['wa']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Provinsi<span class="badge text-red">*</span></label>
                      <select class="form-control" name="id_prov" id="provinsi">
                        <option></option>
                        <?php 
                        $sql_provinsi = mysqli_query($con,"SELECT * FROM provinces ORDER BY nama_provinsi ASC");                      
                        while($rs_provinsi = mysqli_fetch_array($sql_provinsi)){ ?> 
                          <option class='<?php echo $r['id_prov'];?>' value="<?php echo $rs_provinsi['id_prov']; ?>" <?php echo $rs_provinsi['id_prov'] == $r['id_prov'] ? 'selected="selected"' : '' ?>><?php echo $rs_provinsi['nama_provinsi']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <img src="../asset/dist/img/load/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <label>Kabupaten/Kota<span class="badge text-red">*</span></label>
                      <select class="form-control" name="id_kab" id="kota">
                        <option>
                          <?php 
                          $sql_kabupaten = mysqli_query($con,"SELECT * FROM regencies WHERE id_prov ='$r[id_prov]' ORDER BY nama_kabupaten ASC");                      
                          while($rs_kabupaten = mysqli_fetch_array($sql_kabupaten)){ ?> 
                            <option class='<?php echo $r['id_kab'];?>' value="<?php echo $rs_kabupaten['id_kab']; ?>" <?php echo $rs_kabupaten['id_kab'] == $r['id_kab'] ? 'selected="selected"' : '' ?>><?php echo $rs_kabupaten['nama_kabupaten']; ?></option>
                            <?php
                          }
                          ?>
                        </option>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Kecamatan<span class="badge text-red">*</span></label>
                      <select class="form-control" name="id_kec" id="kecamatan">
                        <option>
                          <?php 
                          $sql_kecamatan = mysqli_query($con,"SELECT * FROM districts WHERE id_kab ='$r[id_kab]' ORDER BY id_kec ASC");                      
                          while($rs_kecamatan = mysqli_fetch_array($sql_kecamatan)){ ?> 
                            <option class='<?php echo $r['id_kec'];?>' value="<?php echo $rs_kecamatan['id_kec']; ?>" <?php echo $rs_kecamatan['id_kec'] == $r['id_kec'] ? 'selected="selected"' : '' ?>><?php echo $rs_kecamatan['nama_kecamatan']; ?></option>
                            <?php
                          }
                          ?>
                        </option>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <label>Desa/Kelurahan<span class="badge text-red">*</span></label>
                      <select class="form-control" name="id_kel" id="kelurahan">
                        <option>
                          <?php 
                          $sql_kelurahan = mysqli_query($con,"SELECT * FROM villages WHERE id_kec ='$r[id_kec]' ORDER BY nama_kelurahan ASC");                      
                          while($rs_kelurahan = mysqli_fetch_array($sql_kelurahan)){ ?> 
                            <option class='<?php echo $r['id_kel'];?>' value="<?php echo $rs_kelurahan['id_kel']; ?>" <?php echo $rs_kelurahan['id_kel'] == $r['id_kel'] ? 'selected="selected"' : '' ?>><?php echo $rs_kelurahan['nama_kelurahan']; ?></option>
                            <?php
                          }
                          ?>
                        </option>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <label>Alamat<span class="badge text-red">* Nama Jalan, RT, RW dan Komples</span></label>
                      <textarea type="text" class="form-control" name="alamat" style="height: 110px;" ><?php echo $r['alamat']; ?></textarea>
                    </div>
                  <div class="col-sm-6 col-xs-6">
                    <label>Rekening Pembayaran<span class="badge text-red">*</span></label>
                    <input type="text" class="form-control" name="rekening" placeholder="Tuliskan Nama Bank dan Nomor Rekening" value="<?php echo $r['rekening']; ?>">
                    <label>Atas Nama Rekening<span class="badge text-red">*</span></label>
                    <input type="text" class="form-control" name="an_rekening" placeholder="Tuliskan Atas Nama Rekening" value="<?php echo $r['an_rekening']; ?>">
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    
                  </div>
                </div>
              </div>


              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-8 btn-xs-4">
                    <i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk meng-update data anda
                  </div>

                  <div class="col-sm-4">
                    <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> S I M P A N</button>
                    <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> B A T A L</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- Data Tooltip -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
          $(function () {
            $('[data-toggle="tooltip"]').tooltip();
          });
        </script>
 <script type="text/javascript">// script pembatasan jumlah angka nik
 function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>

<!-- /.control-sidebar -->
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 500000)
{ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
  Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 500 KB, Silahkan Ganti File...");
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
<!-- /.card-body -->

<script>
  $( document ).ready(function() {
//untuk memanggil plugin select2
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
$('#bidang').select2({
  placeholder: 'Pilih Bidang',
  language: "id"
});
$('#statuspegawai').select2({
  placeholder: 'Pilih Status Pegawai',
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

//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
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




//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
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
// To make Pace works on Ajax calls
$(document).ajaxStart(function() { Pace.restart(); });
$('.ajax').click(function(){
  $.ajax({url: '#', success: function(result){
    $('.ajax-content').html('<hr>Ajax Request Completed !');
  }});
});
</script>
<script language="JavaScript">
  Webcam.set({
// live preview size
width: 300,
height: 230,

// device capture size
dest_width: 300,
dest_height: 230,

// final cropped size
crop_width: 184,
crop_height: 230,

// format and quality
image_format: 'jpeg',
jpeg_quality: 90
});

  Webcam.attach( '#my_camera' );

  function take_snapshot() {
    Webcam.snap( function(data_uri) {
      $(".image-tag").val(data_uri);
      document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
  }
</script>

<!-- Select2 -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>

<!-- /.content-wrapper -->
<footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="http://adminlte.io" class="text-white">Aplikasi <?php echo $iden['nama'];?></a></strong>
  <div class="float-right d-none d-sm-inline-block">
      <b>powered by <a type="button" href="#" onclick="window.open(href='./')" target='_blank' class="badge bg-white" data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-code faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
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
<form action="action/pembinaan_reset.php" method="POST" enctype="multipart/form-data"><div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI KARPEG <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><h1><center><i class="fa  fa-question-circle"></i></center></h1><center><h4>Apa anda yakin akan me-reset password?</h4><p class="small">Nomor Handphone akan menjadi Password Default...</p><input type="hidden" name="id_user" value="<?php echo "$data[id_user]";?> "><input type="hidden" class="form-control" name="hp" value="<?php echo "$data[hp]";?> "><input type="text" class="form-control" value="<?php echo "$data[hp]";?>" disabled></ins></center></div><div class="modal-footer"><button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-close (alias) faa-tada animated-hover"></i> Tidak</button><button type="submit" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa  fa-check faa-tada animated-hover"></i>  Ya, Reset</button></div></div></div></div></form>

</div><!-- /.content-wrapper -->


</body>
</html>