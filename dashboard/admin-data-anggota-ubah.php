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
                <li class="breadcrumb-item active">Ubah Data</li>
              </ol>
            </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
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
            timer: 1500,
            timerProgressBar: true,
            title: 'BERHASIL!',
            text: 'Data Anggota Berhasil Diupdate',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          }).then(function() {
            window.location = "dataanggota";
          });
        });
      </script>
      <?php 
    }elseif ($_GET['alert']=="gagal") {
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
            icon: 'error',
            title: 'GAGAL!',
            text: 'Email/NIK Sudah Terdaftar',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          })
        });
      </script>
      <?php
    }       
  }
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card">
        <div class="card-header <?php echo "$iden[color]";?>">
          <h3 class="card-title"><b><i class="fa fa-edit"></i> Form Ubah Data Anggota</b></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="card-body">
              <?php
              $r = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user='$_GET[id]'"));
              // $tgl = date("Y-m-d", strtotime($data['tgl_lhr']));
              // $id = $data['id'];
              // $ids = sprintf("%07s", $id);
              ?>
              <form action="action/data_anggota_update.php" method='POST' enctype='multipart/form-data'>
                <input type="hidden" name="id_user" value="<?php echo $r['id_user']; ?>">
                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Bidang Keanggotaan</label>
                      <select class="form-control" name="id_jeniskeanggotaan" id="jeniskeanggotaan">
                        <option></option>
                        <?php
                        $tampil = mysqli_query($con, "SELECT * FROM jenis_keanggotaan ORDER BY id_jeniskeanggotaan");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option class="<?php echo $r['id_jeniskeanggotaan'] ?>" value="<?php echo $row['id_jeniskeanggotaan'];?>" <?php echo $row['id_jeniskeanggotaan'] == $r['id_jeniskeanggotaan'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jeniskeanggotaan']; ?> - <?php echo $row['ket_jeniskeanggotaan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input class="form-control" type="text" value="<?php echo $r['jabatan'];?>"  name="jabatan" placeholder="Tuliskan Nama Jabatan">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-sm-3 col-xs-3">
                    <div class="form-group">
                      <label>NO. KTA</label>
                      <input class="form-control" type="text" value="<?php echo $r['noreg'];?>" name="noreg" placeholder="Tuliskan Nomor Kartu Tanda Anggota">
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-3">
                    <div class="form-group">
                      <label>NIK</label>
                      <input class="form-control" type="text" value="<?php echo $r['nik'];?>" name="nik" placeholder="Tuliskan Nomor Induk Kependudukan maksimal 16 Angka" maxlength="16" onkeypress="return hanyaAngka (event)">
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Nama Lengkap <badge class="badge bg-red">Bisa Ditambahkan Gelar</badge></label>
                      <input class="form-control" type="text" name="name" placeholder="Tuliskan Nama Lengkap dan Gelar" value="<?php echo $r['name'];?>" >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input class="form-control" type="text" name="tmp_lhr" placeholder="Tuliskan Nama Tempat Lahir" value="<?php echo $r['tmp_lhr']; ?>" >

                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input class="form-control" type="date" id="tgl_lhr" name="tgl_lhr" value="<?php echo $r['tgl_lhr'] ?>" >
                    </div>
                  </div>
                </div>

                <div class="row"> 
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="id_jk" id="jk" >
                        <option></option>
                        <?php
                        $tampil = mysqli_query($con, "SELECT * FROM jenis_kelamin ORDER BY id_jk");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option class="<?php echo $r['id_jk'] ?>"  value="<?php echo $row['id_jk'];?>" <?php echo $row['id_jk'] == $r['id_jk'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jk']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Agama</label><br>
                      <select class='form-control' id="agama" name="id_agm" >
                        <option></option>
                        <?php
                        $tampil = mysqli_query($con, "SELECT * FROM agama ORDER BY id_agm ASC");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option class="<?php echo $r['id_agm'] ?>"  value="<?php echo $row['id_agm']; ?>" <?php echo $row['id_agm'] == $r['id_agm'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_agm']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Provinsi</label><br>
                      <select class="form-control" id="provinsi" name="id_prov" >
                        <option></option>
                        <?php 
                        $sql_provinsi = mysqli_query($con, "SELECT * FROM provinces ORDER BY nama_provinsi ASC");                      
                        while($rs_provinsi = mysqli_fetch_array($sql_provinsi)){ ?> 
                          <option class="<?php echo $r['id_prov'];?>" value="<?php echo $rs_provinsi['id_prov']; ?>" <?php echo $rs_provinsi['id_prov'] == $r['id_prov'] ? 'selected="selected"' : '' ?>><?php echo $rs_provinsi['nama_provinsi']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load1" style="display:none;" />
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Kota/Kabupaten</label><br>
                      <select class="form-control" id="kota" name="id_kab" >
                        <option> </option>
                        <?php  $sql_kabupaten = mysqli_query($con, "SELECT * FROM regencies WHERE id_prov ='$r[id_prov]' ORDER BY nama_kabupaten ASC");                      
                        while($rs_kabupaten = mysqli_fetch_array($sql_kabupaten)){ ?> 
                          <option class="<?php echo $r['id_kab'];?>" value="<?php echo $rs_kabupaten['id_kab']; ?>" <?php echo $rs_kabupaten['id_kab'] == $r['id_kab'] ? 'selected="selected"' : '' ?>><?php echo $rs_kabupaten['nama_kabupaten']; ?></option>
                        <?php } ?>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load2" style="display:none;" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Kecamatan</label><br>
                      <select class="form-control" id="kecamatan" name="id_kec" >
                        <option></option>
                        <?php 
                        $sql_kecamatan = mysqli_query($con, "SELECT * FROM districts WHERE id_kab ='$r[id_kab]' ORDER BY id_kec ASC");                      
                        while($rs_kecamatan = mysqli_fetch_array($sql_kecamatan)){ ?> 
                          <option class="<?php echo $r['id_kec'];?>" value="<?php echo $rs_kecamatan['id_kec']; ?>" <?php echo $rs_kecamatan['id_kec'] == $r['id_kec'] ? 'selected="selected"' : '' ?>><?php echo $rs_kecamatan['nama_kecamatan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load3" style="display:none;" />
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Kelurahan/Desa</label><br>
                      <select class="form-control" id="kelurahan" name="id_kel" >
                        <option></option>
                        <?php 
                        $sql_kelurahan = mysqli_query($con, "SELECT * FROM villages WHERE id_kec ='$r[id_kec]' ORDER BY nama_kelurahan ASC");                      
                        while($rs_kelurahan = mysqli_fetch_array($sql_kelurahan)){ ?> 
                          <option class="<?php echo $r['id_kel'];?>" value="<?php echo $rs_kelurahan['id_kel']; ?>" <?php echo $rs_kelurahan['id_kel'] == $r['id_kel'] ? 'selected="selected"' : '' ?>><?php echo $rs_kelurahan['nama_kelurahan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <img src="../assets/dist/img/load/loading.gif" width="35" id="load3" style="display:none;" />
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input class="form-control" type="text" name="alamat" placeholder="Tuliskan Alamat Jalan/RT/RW/Lingkungan/Kompleks" value="<?php echo $r['alamat'] ?>">
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input class="form-control" type="text" name="tgl_bergabung" value="<?php echo $r['tgl_bergabung'] ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <select class="form-control" name="id_pekerjaan" id="pekerjaan" >
                        <option></option>
                        <?php
                        $tampil = mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option class="<?php echo $r['id_pekerjaan'] ?>"  value="<?php echo $row['id_pekerjaan'];?>" <?php echo $row['id_pekerjaan'] == $r['id_pekerjaan'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pekerjaan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label>
                      <select class="form-control" name="id_pendidikan" id="pendidikan" >
                        <option></option>
                        <?php
                        $tampil = mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan");
                        while($row=mysqli_fetch_array($tampil)) {
                          ?>
                          <option class="<?php echo $r['id_pendidikan'] ?>"  value="<?php echo $row['id_pendidikan'];?>" <?php echo $row['id_pendidikan'] == $r['id_pendidikan'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pendidikan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Email <badge class="badge bg-red">Digunakan Sebagai Username Login</badge></label>
                      <input class="form-control" type="email" placeholder="Tuliskan Alamat Email Yang Aktif" name="mail" value="<?php echo $r['email']; ?>" >
                    </div>
                  </div> 
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label>Nomor Handphone/Whatsapp <badge class="badge bg-red">Digunakan Sebagai Password Default Login</badge></label>
                      <input class="form-control" type="number" placeholder="Tuliskan Nomor HP/Whatsapp Yang Aktif" name="hp" value="<?php echo $r['hp']; ?>" >
                    </div>
                  </div> 
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFilee">KTP</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="ktp" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFilee">
                          <label class="custom-file-label" for="exampleInputFile">Unggah Baru File KTP</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFilee">Pas Photo <badge class="badge bg-red">Abaikan Jika Ambil Photo </badge></label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" multiple="true" name="gambar" accept='image/*' class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Unggah Baru Pas Photo</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <div class="card card-info">
                        <div class="card-header">
                          <h3 class="card-title">Photo Webcam</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <center>
                            <div id="my_camera" style="margin-bottom: 15px;">
                            </div>
                            <button class="class='form-control btn btn-sm btn-default bg-navy" type=button onClick="take_snapshot()"><i class="fa fa-camera"></i> Ambil Photo</button>
                            <input type="hidden" name="webcam" class="image-tag"> 
                          </center>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <div class="card card-navy">
                        <div class="card-header">
                          <h3 class="card-title">Hasil Photo Webcam</h3>
                        </div>
                        <center><!-- /.card-header -->
                          <div class="card-body" id="results">
                           <!-- Hasil Webcam akan tampil disini -->
                         </div>
                       </center>
                     </div>
                     <!-- /.card-body -->
                   </div>
                 </div>
               </div> 

             </div> <!-- tutup card body -->

             <div class="card-footer">
              <div class="row">
                <div class="col-sm-8 btn-xs-4">
                  <small><i class="fa  fa-info-circle"></i> Pas Photo dapat diambil dengan mengunakan kamera webcam atau unggah file Photo.jpg</small>
                </div>

                <div class="col-sm-4">
                  <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN</button>
                  <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="window.location.href='dataanggota'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
 <script type="text/javascript">// script pembatasan jumlah angka nik
 function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>
<script src="../assets/plugins/webcam/java.js"></script>
<script src="../assets/plugins/webcam/webcam.min.js"></script>
<!-- /.control-sidebar -->
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 1000000)
{ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
  Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
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
    if(this.files[0].size > 1000000)
{ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
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
<!-- /.card-body -->

<script>
  $( document ).ready(function() {
//untuk memanggil plugin select2
$('#jeniskeanggotaan').select2({
  placeholder: 'Pilih Jenis Keanggotaan',
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
jpeg_quality: 300
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
    <b>Version 2021 | powered by <a type="button" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'" href="" class="badge bg-white" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-code faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
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
</body>
</html>