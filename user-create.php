<?php 
require_once "../assets/config/koneksi.php";
session_start();
error_reporting(1);
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['id_rekomendasi'] = $_POST['id_rekomendasi'];
$_SESSION['rekomendasi'] = $_POST['rekomendasi'];

$_SESSION['nik'] = $_POST['nik'];
$_SESSION['nisn'] = $_POST['nisn'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['tmp_lhr'] = $_POST['tmp_lhr'];
$_SESSION['tgl_lhr'] = $_POST['tgl_lhr'];
$_SESSION['id_jk'] = $_POST['id_jk'];
$_SESSION['id_agm'] = $_POST['id_agm'];
$_SESSION['id_kw'] = $_POST['id_kw'];
$_SESSION['id_kk'] = $_POST['id_kk'];
$_SESSION['alamat'] = $_POST['alamat'];
$_SESSION['id_prov'] = $_POST['id_prov'];
$_SESSION['id_kab'] = $_POST['id_kab'];
$_SESSION['id_kec'] = $_POST['id_kec'];
$_SESSION['id_kel'] = $_POST['id_kel'];
$_SESSION['sekolah'] = $_POST['sekolah'];
$_SESSION['id_jurusan'] = $_POST['id_jurusan'];
$_SESSION['thn_lulus'] = $_POST['thn_lulus'];
$_SESSION['alamat_sekolah'] = $_POST['alamat_sekolah'];
$_SESSION['no_ijazah'] = $_POST['no_ijazah'];
$_SESSION['thn_ijazah'] = $_POST['thn_ijazah'];
$_SESSION['nilai_rr'] = $_POST['nilai_rr'];
$_SESSION['id_alm'] = $_POST['id_alm'];
$_SESSION['prestasi'] = $_POST['prestasi'];
$_SESSION['hp'] = $_POST['hp'];

$_SESSION['nik_ayah'] = $_POST['nik_ayah'];
$_SESSION['nama_ayah'] = $_POST['nama_ayah'];
$_SESSION['pendidikan_ayah'] = $_POST['pendidikan_ayah'];
$_SESSION['hp_ayah'] = $_POST['hp_ayah'];
$_SESSION['pekerjaan_ayah'] = $_POST['pekerjaan_ayah'];
$_SESSION['jabatan_ayah'] = $_POST['jabatan_ayah'];
$_SESSION['penghasilan_ayah'] = $_POST['penghasilan_ayah'];
$_SESSION['penghasilan_ayah_lainya'] = $_POST['penghasilan_ayah_lainya'];
$_SESSION['kantor_ayah'] = $_POST['kantor_ayah'];
$_SESSION['alamat_kantor_ayah'] = $_POST['alamat_kantor_ayah'];

$_SESSION['nik_ibu'] = $_POST['nik_ibu'];
$_SESSION['nama_ibu'] = $_POST['nama_ibu'];
$_SESSION['pendidikan_ibu'] = $_POST['pendidikan_ibu'];
$_SESSION['hp_ibu'] = $_POST['hp_ibu'];
$_SESSION['pekerjaan_ibu'] = $_POST['pekerjaan_ibu'];
$_SESSION['jabatan_ibu'] = $_POST['jabatan_ibu'];
$_SESSION['penghasilan_ibu'] = $_POST['penghasilan_ibu'];
$_SESSION['penghasilan_ibu_lainya'] = $_POST['penghasilan_ibu_lainya'];
$_SESSION['kantor_ibu'] = $_POST['kantor_ibu'];
$_SESSION['alamat_kantor_ibu'] = $_POST['alamat_kantor_ibu'];
$_SESSION['alamat_ortu'] = $_POST['alamat_ortu'];
$_SESSION['alasan_ortu'] = $_POST['alasan_ortu'];

$_SESSION['id_fak'] = $_POST['id_fak'];
$_SESSION['id_pro'] = $_POST['id_pro'];

$_SESSION['ktp'] = $_POST['ktp'];
$_SESSION['kk'] = $_POST['kk'];
$_SESSION['akta'] = $_POST['akta'];
$_SESSION['gambar'] = $_POST['gambar'];
$_SESSION['ijazah'] = $_POST['ijazah'];
$_SESSION['surat_kerja'] = $_POST['surat_kerja'];
$_SESSION['piagam'] = $_POST['piagam'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Aplikasi Pendaftaran Mahasiswa <?php echo "$iden[nama]"; ?>">
  <meta name="author" content="<?php echo "$iden[aplikasi]"; ?>">
  <title><?php $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1"));  echo "$iden[aplikasi] "; ?></title>
  <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>">
  <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <!-- Theme style -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css"/>
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <center><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 80px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"><br/>APLIKASI <?php echo "$iden[aplikasi]";?><br/><b class="text-uppercase"><?php echo "$iden[nama]";?></b>
            <br/>
            <a class="btn <?php echo "$iden[color]";?>" type="button" onclick="window.location.href='#'"><i class="fa fa-users"></i> Pendaftaran Mahasiswa Baru <?php $g = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb INNER JOIN gelombang ON panitia_pmb.id_gelombang = gelombang.id_gelombang LIMIT 1"));
            $tgl_a = date("d-m-Y", strtotime($g['tgl_a'])); 
            $tgl_b = date("d-m-Y", strtotime($g['tgl_b'])); ?>
            <span class="badge bg-warning"><?php echo "$g[nama_gelombang]";  ?></a><br/><small>Tanggal: <?php echo "$tgl_a";?> s/d <?php echo "$tgl_b";?></small></span>
          </center>
        </div>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fa fa-key"></i> Data Akun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fa fa-user"></i> Data Pribadi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fa fa-users"></i> Data Keluarga</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fa fa-sitemap"></i> Data Fakultas/Prodi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fa fa-cloud-upload"></i> Unggah Berkas</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="custom-tabs-four-tabContent">

                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                  <form role="form" method="POST" action="daftar-step2" enctype='multipart/form-data'>

                   <input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>">
                   <input type="hidden" name="password" value="<?php echo $_SESSION['password'];?>">
                   <input type="hidden" name="id_rekomendasi" value="<?php echo $_SESSION['id_rekomendasi'];?>">
                   <input type="hidden" name="rekomendasi" value="<?php echo $_SESSION['rekomendasi'];?>">

                   <input type="hidden" name="nisn" value="<?php echo $_SESSION['nisn'];?>">
<input type="hidden" name="nik" value="<?php echo $_SESSION['nik'];?>">
                   <input type="hidden" name="name" value="<?php echo $_SESSION['name'];?>">
                   <input type="hidden" name="tmp_lhr" value="<?php echo $_SESSION['tmp_lhr'];?>">
                   <input type="hidden" name="tgl_lhr" value="<?php echo $_SESSION['tgl_lhr'];?>">
                   <input type="hidden" name="id_jk" value="<?php echo $_SESSION['id_jk'];?>">
                   <input type="hidden" name="id_agm" value="<?php echo $_SESSION['id_agm'];?>">
                   <input type="hidden" name="id_kw" value="<?php echo $_SESSION['id_kw'];?>">
                   <input type="hidden" name="id_kk" value="<?php echo $_SESSION['id_kk'];?>">
                   <input type="hidden" name="alamat" value="<?php echo $_SESSION['alamat'];?>">
                   <input type="hidden" name="id_prov" value="<?php echo $_SESSION['id_prov'];?>">
                   <input type="hidden" name="id_kab" value="<?php echo $_SESSION['id_kab'];?>">
                   <input type="hidden" name="id_kec" value="<?php echo $_SESSION['id_kec'];?>">
                   <input type="hidden" name="id_kel" value="<?php echo $_SESSION['id_kel'];?>">
                   <input type="hidden" name="sekolah" value="<?php echo $_SESSION['sekolah'];?>">
                   <input type="hidden" name="id_jurusan" value="<?php echo $_SESSION['id_jurusan'];?>">
                   <input type="hidden" name="thn_lulus" value="<?php echo $_SESSION['thn_lulus'];?>">
                   <input type="hidden" name="alamat_sekolah" value="<?php echo $_SESSION['alamat_sekolah'];?>">
                   <input type="hidden" name="no_ijazah" value="<?php echo $_SESSION['no_ijazah'];?>">
                   <input type="hidden" name="thn_ijazah" value="<?php echo $_SESSION['thn_ijazah'];?>">
                   <input type="hidden" name="nilai_rr" value="<?php echo $_SESSION['nilai_rr'];?>">
                   <input type="hidden" name="id_alm" value="<?php echo $_SESSION['id_alm'];?>">
                   <input type="hidden" name="prestasi" value="<?php echo $_SESSION['prestasi'];?>">
                   <input type="hidden" name="hp" value="<?php echo $_SESSION['hp'];?>">

                   <input type="hidden" name="nik_ayah" value="<?php echo $_SESSION['nik_ayah'];?>">
                   <input type="hidden" name="nama_ayah" value="<?php echo $_SESSION['nama_ayah'];?>">
                   <input type="hidden" name="hp_ayah" value="<?php echo $_SESSION['hp_ayah'];?>">
                   <input type="hidden" name="pendidikan_ayah" value="<?php echo $_SESSION['pendidikan_ayah'];?>">
                   <input type="hidden" name="jabatan_ayah" value="<?php echo $_SESSION['jabatan_ayah'];?>">
                   <input type="hidden" name="pekerjaan_ayah" value="<?php echo $_SESSION['pekerjaan_ayah'];?>">
                   <input type="hidden" name="penghasilan_ayah" value="<?php echo $_SESSION['penghasilan_ayah'];?>">
                   <input type="hidden" name="penghasilan_ayah_lainya" value="<?php echo $_SESSION['penghasilan_ayah_lainya'];?>">
                   <input type="hidden" name="kantor_ayah" value="<?php echo $_SESSION['kantor_ayah'];?>">
                   <input type="hidden" name="alamat_kantor_ayah" value="<?php echo $_SESSION['alamat_kantor_ayah'];?>">
                   <input type="hidden" name="nik_ibu" value="<?php echo $_SESSION['nik_ibu'];?>">
                   <input type="hidden" name="nama_ibu" value="<?php echo $_SESSION['nama_ibu'];?>">
                   <input type="hidden" name="hp_ibu" value="<?php echo $_SESSION['hp_ibu'];?>">
                   <input type="hidden" name="pendidikan_ibu" value="<?php echo $_SESSION['pendidikan_ibu'];?>">
                   <input type="hidden" name="pekerjaan_ibu" value="<?php echo $_SESSION['pekerjaan_ibu'];?>">
                   <input type="hidden" name="jabatan_ibu" value="<?php echo $_SESSION['jabatan_ibu'];?>">
                   <input type="hidden" name="penghasilan_ibu" value="<?php echo $_SESSION['penghasilan_ibu'];?>">
                   <input type="hidden" name="penghasilan_ibu_lainya" value="<?php echo $_SESSION['penghasilan_ibu_lainya'];?>">
                   <input type="hidden" name="kantor_ibu" value="<?php echo $_SESSION['kantor_ibu'];?>">
                   <input type="hidden" name="alamat_kantor_ibu" value="<?php echo $_SESSION['alamat_kantor_ibu'];?>">
                   <input type="hidden" name="alamat_ortu" value="<?php echo $_SESSION['alamat_ortu'];?>">
                   <input type="hidden" name="alasan_ortu" value="<?php echo $_SESSION['alasan_ortu'];?>">
                   
                   <input type="hidden" name="id_fak" value="<?php echo $_SESSION['id_fak'];?>">
                   <input type="hidden" name="id_pro" value="<?php echo $_SESSION['id_pro'];?>">

                   <input type="hidden" name="ktp" value="<?php echo $_SESSION['ktp'];?>">
                   <input type="hidden" name="kk" value="<?php echo $_SESSION['kk'];?>">
                   <input type="hidden" name="akta" value="<?php echo $_SESSION['akta'];?>">
                   <input type="hidden" name="gambar" value="<?php echo $_SESSION['gambar'];?>">
                   <input type="hidden" name="ijazah" value="<?php echo $_SESSION['ijazah'];?>">
                   <input type="hidden" name="surat_kerja" value="<?php echo $_SESSION['surat_kerja'];?>">
                   <input type="hidden" name="piagam" value="<?php echo $_SESSION['piagam'];?>">


                   <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email<sup class="text-red">*</sup> <badge class="badge bg-red">Digunakan Sebagai Username Login</badge></label>
                        <input class="form-control" type="email" placeholder="Tuliskan Alamat Email" name="email" value="<?php echo $_SESSION['email']; ?>" required="required">
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password<sup class="text-red">*</sup> <badge class="badge bg-red">Digunakan Sebagai Password Login</badge></label>
                        <input class="form-control" type="password" placeholder="Tuliskan Password" name="password" value="<?php echo $_SESSION['password']; ?>" required="required">
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Dari Mana Mengertahui <?php echo $iden['nama']; ?>?<sup class="text-red">*</sup></label>
                        <select class="form-control" name="id_rekomendasi" id="rekomendasi" required="true" style="width:100%">
                          <option></option>
                          <?php
                          $tampil = mysqli_query($con, "SELECT * FROM rekomendasi ORDER BY id_rekomendasi");
                          while($row=mysqli_fetch_array($tampil)) {
                            ?>
                            <option class="<?php echo $_SESSION['id_rekomendasi'] ?>"  value="<?php echo $row['id_rekomendasi'];?>" <?php echo $row['id_rekomendasi'] == $_SESSION['id_rekomendasi'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_rekomendasi']; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Yang Memberi Rekomendasi<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                        <input class="form-control" type="text" placeholder="Tuliskan Nama Yang Memberi Rekomendasi" name="rekomendasi" value="<?php echo $_SESSION['rekomendasi']; ?>" required="required">
                      </div>
                    </div> 
                  </div> 
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-10 btn-xs-5">
                        <i class="fa  fa-info-circle"></i>  Step 1 dari 5!   
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                          aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        </div> 
                      </div>
                    </div>
                    <input type="hidden" name="step1" value="1">
                    <div class="col-sm-2 col-xs-5">
                      <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right">Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab"> Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
             Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
           </div>
           <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
             Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
           </div>
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
      $('#kw').select2({
        placeholder: 'Pilih Kewarganegaraan',
        language: "id"
      });
      $('#kk').select2({
        placeholder: 'Pilih Kebutuhan Khusus',
        language: "id"
      });
      $('#jk').select2({
        placeholder: 'Pilih Jenis Kelamin',
        language: "id"
      });
      $('#jurusan').select2({
        placeholder: 'Pilih Jurusan',
        language: "id"
      });
      $('#almamater').select2({
        placeholder: 'Pilih Ukuran Almamater',
        language: "id"
      });
      $('#pendidikanayah').select2({
        placeholder: 'Pilih Pendidikan',
        language: "id"
      });
      $('#pekerjaanayah').select2({
        placeholder: 'Pilih Pekerjaan',
        language: "id"
      });
      $('#penghasilanayah').select2({
        placeholder: 'Pilih Penghasilan',
        language: "id"
      });
      $('#pendidikanibu').select2({
        placeholder: 'Pilih Pendidikan',
        language: "id"
      });
      $('#pekerjaanibu').select2({
        placeholder: 'Pilih Pekerjaan',
        language: "id"
      });
      $('#penghasilanibu').select2({
        placeholder: 'Pilih Penghasilan',
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
      $('#statuspegawai').select2({
        placeholder: 'Pilih Fakultas',
        language: "id"
      });

      $('#pangkat').select2({
        placeholder: 'Pilih Program Studi',
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
        var id_fak = $(this).val(); 
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "data-pangkat.php?jenis=pangkat",
          data: "id_fak="+id_fak,
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

</div>
</div>
</div>

<footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <div class="container">
    <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="../" class="text-white" style="text-transform: uppercase;"> Aplikasi <?php echo $iden['aplikasi'];?> - <?php echo $iden['nama'];?></a></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>powered by <a type="button" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'" href="" class="badge bg-white" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-heartbeat faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
    </div>
  </footer> 

  <script src="../assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../assets/dist/js/pages/dashboard.js"></script>
  <!-- SweetAlert2 -->
  <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
  <!-- page script -->

  <!-- Bootstrap -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="../assets/dist/js/demo.js"></script>
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>