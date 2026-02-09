<?php 
require_once "../assets/config/koneksi.php";
session_start();
error_reporting(1);
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['id_rekomendasi'] = $_POST['id_rekomendasi'];
$_SESSION['rekomendasi'] = $_POST['rekomendasi'];

$_SESSION['nisn'] = $_POST['nisn'];
$_SESSION['nik'] = $_POST['nik'];
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
                  <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fa fa-key"></i> Data Akun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fa fa-user"></i> Data Pribadi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fa fa-users"></i> Data Keluarga</a>
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

                <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
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

            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
             <form role="form" method="POST" action="daftar-step3" enctype='multipart/form-data'>

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
                    <label>No. KTP/NIK/Paspor<sup class="text-red">*</sup></label>
                    <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor" name="nik" value="<?php echo $_SESSION['nik']; ?>" required="required">
                  </div>
                </div> 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama <sup class="text-red">*</sup></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap" name="name" value="<?php echo $_SESSION['name']; ?>" required="required">
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Tempat Lahir <sup class="text-red">*</sup></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Nama Tempat Lahir" name="tmp_lhr" value="<?php echo $_SESSION['tmp_lhr']; ?>" required="required">
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Tanggal Lahir <sup class="text-red">*</sup></label>
                    <input class="form-control" type="date" placeholder="Tuliskan Alamat Email" name="tgl_lhr" value="<?php echo $_SESSION['tgl_lhr']; ?>" required="required">
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Jenis Kelamin<sup class="text-red">*</sup></label>
                    <select class="form-control" name="id_jk" id="jk" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM jenis_kelamin ORDER BY id_jk");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_jk'] ?>"  value="<?php echo $row['id_jk'];?>" <?php echo $row['id_jk'] == $_SESSION['id_jk'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jk']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Agama<sup class="text-red">*</sup></label>
                    <select class="form-control" name="id_agm" id="agama" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM agama ORDER BY id_agm");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_agm'] ?>"  value="<?php echo $row['id_agm'];?>" <?php echo $row['id_agm'] == $_SESSION['id_agm'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_agm']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kewarganegaraan<sup class="text-red">*</sup></label>
                    <select class="form-control" name="id_kw" id="kw" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM kewarganegaraan ORDER BY id_kw");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_kw'] ?>"  value="<?php echo $row['id_kw'];?>" <?php echo $row['id_kw'] == $_SESSION['id_kw'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_kw']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kebutuhan Khusus<sup class="text-red">*</sup></label>
                    <select class="form-control" name="id_kk" id="kk" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM kebutuhan_khusus ORDER BY id_kk");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_kk'] ?>"  value="<?php echo $row['id_kk'];?>" <?php echo $row['id_kk'] == $_SESSION['id_kk'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_kk']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Alamat <sup class="text-red">*</sup></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Alamat RT/RW/Komplek/Lingkungan/Kode Pos" name="alamat" value="<?php echo $_SESSION['alamat']; ?>" required="required">
                  </div>
                </div>  
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Provinsi <sup class="text-red">*</sup></label>
                    <select class="form-control" id="provinsi" name="id_prov" required="required" style="width: 100%">
                      <option></option>
                      <?php 
                      $sql_provinsi = mysqli_query($con, "SELECT * FROM provinces ORDER BY nama_provinsi ASC");                      
                      while($rs_provinsi = mysqli_fetch_array($sql_provinsi)){ ?> 
                        <option class="<?php echo $_SESSION['id_prov'];?>" value="<?php echo $rs_provinsi['id_prov']; ?>" <?php echo $rs_provinsi['id_prov'] == $_SESSION['id_prov'] ? 'selected="selected"' : '' ?>><?php echo $rs_provinsi['nama_provinsi']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>  
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kab./Kota <sup class="text-red">*</sup></label>
                    <select class="form-control" id="kota" name="id_kab" required="required" style="width: 100%">
                      <option> </option>
                      <?php  $sql_kabupaten = mysqli_query($con, "SELECT * FROM regencies WHERE id_prov ='$_SESSION[id_prov]' ORDER BY nama_kabupaten ASC");                      
                      while($rs_kabupaten = mysqli_fetch_array($sql_kabupaten)){ ?> 
                        <option class="<?php echo $_SESSION['id_kab'];?>" value="<?php echo $rs_kabupaten['id_kab']; ?>" <?php echo $rs_kabupaten['id_kab'] == $_SESSION['id_kab'] ? 'selected="selected"' : '' ?>><?php echo $rs_kabupaten['nama_kabupaten']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>  
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kecamatan <sup class="text-red">*</sup></label>
                    <select class="form-control" id="kecamatan" name="id_kec" required="required" style="width: 100%">
                      <option></option>
                      <?php 
                      $sql_kecamatan = mysqli_query($con, "SELECT * FROM districts WHERE id_kab ='$_SESSION[id_kab]' ORDER BY id_kec ASC");                      
                      while($rs_kecamatan = mysqli_fetch_array($sql_kecamatan)){ ?> 
                        <option class="<?php echo $_SESSION['id_kec'];?>" value="<?php echo $rs_kecamatan['id_kec']; ?>" <?php echo $rs_kecamatan['id_kec'] == $_SESSION['id_kec'] ? 'selected="selected"' : '' ?>><?php echo $rs_kecamatan['nama_kecamatan']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>  
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Desa/Kelurahan <sup class="text-red">*</sup></label>
                    <select class="form-control" id="kelurahan" name="id_kel" required="required" style="width: 100%">
                      <option></option>
                      <?php 
                      $sql_kelurahan = mysqli_query($con, "SELECT * FROM villages WHERE id_kec ='$_SESSION[id_kec]' ORDER BY nama_kelurahan ASC");                      
                      while($rs_kelurahan = mysqli_fetch_array($sql_kelurahan)){ ?> 
                        <option class="<?php echo $_SESSION['id_kel'];?>" value="<?php echo $rs_kelurahan['id_kel']; ?>" <?php echo $rs_kelurahan['id_kel'] == $_SESSION['id_kel'] ? 'selected="selected"' : '' ?>><?php echo $rs_kelurahan['nama_kelurahan']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 

                <div class="col-sm-12">
                  <hr>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nomor Induk Siswa Nasional (NISN)<sup class="text-red">*</sup></label>
                    <input class="form-control" type="text" placeholder="Tuliskan NISN" name="nisn" value="<?php echo $_SESSION['nisn']; ?>" required="required">
                  </div>
                </div>  
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Sekolah Asal SMA/SMK/MA Sederajat<sup class="text-red">*</sup></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Nama Sekolah Asal" name="sekolah" value="<?php echo $_SESSION['sekolah']; ?>" required="required">
                  </div>
                </div>  
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Jurusan<sup class="text-red">*</sup></label>
                    <select class="form-control" name="id_jurusan" id="jurusan" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM jurusan ORDER BY id_jurusan");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_jurusan'] ?>"  value="<?php echo $row['id_jurusan'];?>" <?php echo $row['id_jurusan'] == $_SESSION['id_jurusan'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jurusan']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Tahun Lulus<sup class="text-red">*</sup></label>
                    <input class="form-control" type="number" placeholder="Tuliskan Tahun Lulus" name="thn_lulus" value="<?php echo $_SESSION['thn_lulus']; ?>" required="required">
                  </div>
                </div>    
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Alamat Sekolah Asal<sup class="text-red">*</sup></label>
                    <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Sekolah Asal" name="alamat_sekolah"  required="required"><?php echo $_SESSION['alamat_sekolah']; ?></textarea>
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nomor Ijazah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Nomor Ijazah" name="no_ijazah" value="<?php echo $_SESSION['no_ijazah']; ?>" required="required">
                  </div>
                </div>    
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Tahun Ijazah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Tahun Lulus" name="thn_ijazah" value="<?php echo $_SESSION['thn_ijazah']; ?>" required="required">
                  </div>
                </div>     
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nilai Ujian Rata-rata<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Nilai Ujian Rata-rata" name="nilai_rr" value="<?php echo $_SESSION['nilai_rr']; ?>" required="required">
                  </div>
                </div> 
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Ukuran Almamater<sup class="text-red">*</sup><badge class="badge bg-red">Harap Tidak Salah Memilih Ukuran!</badge></label>
                    <select class="form-control" name="id_alm" id="almamater" required="true" style="width:100%">
                      <option></option>
                      <?php
                      $tampil = mysqli_query($con, "SELECT * FROM almamater ORDER BY id_alm");
                      while($row=mysqli_fetch_array($tampil)) {
                        ?>
                        <option class="<?php echo $_SESSION['id_alm'] ?>"  value="<?php echo $row['id_alm'];?>" <?php echo $row['id_alm'] == $_SESSION['id_alm'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_alm']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>    
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Prestasi Yang Pernah Diraih<sup class="text-red">* Bila Ada Tuliskan Jenis/Cabang dan Tingkat Kejuaraan</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                    <input class="form-control" type="text" placeholder="Tuliskan Prestasi Yang Pernah Diraih" name="prestasi" value="<?php echo $_SESSION['prestasi']; ?>" required="required">
                  </div>
                </div>  
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No. Handphone<sup class="text-red">*</sup> <br/><badge class="badge bg-red">Whatsapp</badge></label>
                    <input class="form-control" type="number" placeholder="Tuliskan Nomor Handphone (Whatsapp)" name="hp" value="<?php echo $_SESSION['hp']; ?>" required="required">
                  </div>
                </div>     

              </div> 
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-12">
                    <i class="fa  fa-info-circle"></i>  Step 2 dari 5!   
                    <div class="progress progress-xs">
                      <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                      aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <br/>
                  <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right">Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>

                </form>
                <form role="form" method="POST" action="daftar" enctype='multipart/form-data'>

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


                 <button  style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-danger pull-left"><i class="fa fa-arrow-circle-left"></i> Sebelumnya</button>
               </div>
             </div>
           </div>
         </form>
       </div>
       <div class="tab-pane fade show active" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
        <form role="form" method="POST" action="daftar-step4" enctype='multipart/form-data'>

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
                <label>No. KTP/NIK/Paspor Ayah<sup class="text-red">*</sup></label>
                <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor Ayah" name="nik_ayah" value="<?php echo $_SESSION['nik_ayah']; ?>" required="required">
              </div>
            </div> 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Ayah<sup class="text-red">*</sup></label>
                <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap Ayah" name="nama_ayah" value="<?php echo $_SESSION['nama_ayah']; ?>" required="required">
              </div>
            </div> 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nomor Handphone Ayah<sup class="text-red">*</sup></label>
                <input class="form-control" type="number" placeholder="Tuliskan Handphone Ayah" name="hp_ayah" value="<?php echo $_SESSION['hp_ayah']; ?>" required="required">
              </div>
            </div> 

            <div class="col-sm-3">
              <div class="form-group">
                <label>Pendidikan Ayah<sup class="text-red">*</sup></label>
                <select class="form-control" name="pendidikan_ayah" id="pendidikanayah" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['pendidikan_ayah'] ?>"  value="<?php echo $row['id_pendidikan'];?>" <?php echo $row['id_pendidikan'] == $_SESSION['pendidikan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pendidikan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>     
            <div class="col-sm-3">
              <div class="form-group">
                <label>Pekerjaan Ayah<sup class="text-red">*</sup></label>
                <select class="form-control" name="pekerjaan_ayah" id="pekerjaanayah" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['pekerjaan_ayah'] ?>"  value="<?php echo $row['id_pekerjaan'];?>" <?php echo $row['id_pekerjaan'] == $_SESSION['pekerjaan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pekerjaan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>   
            <div class="col-sm-6">
              <div class="form-group">
                <label>Jabatan Pekerjaan Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <input class="form-control" type="text" placeholder="Tuliskan Jabatan Pekerjaan Ayah" name="jabatan_ayah" value="<?php echo $_SESSION['jabatan_ayah']; ?>" required="required">
              </div>
            </div>    
            <div class="col-sm-3">
              <div class="form-group">
                <label>Penghasilan Ayah<sup class="text-red">*</sup></label>
                <select class="form-control" name="penghasilan_ayah" id="penghasilanayah" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM penghasilan ORDER BY id_penghasilan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['penghasilan_ayah'] ?>"  value="<?php echo $row['id_penghasilan'];?>" <?php echo $row['id_penghasilan'] == $_SESSION['penghasilan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_penghasilan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>  
            <div class="col-sm-3">
              <div class="form-group">
                <label>Isi Jika Penghasilan Ayah Lainnya<sup class="text-red">*</sup></label>
                <input class="form-control" type="text" placeholder="Tuliskan Penghasilan Ayah Lainya" name="penghasilan_ayah_lainya" value="<?php echo $_SESSION['penghasilan_ayah_lainya'];?>">
              </div>
            </div>      
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Kantor/Tempat Kerja Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <input class="form-control" type="text" placeholder="Tuliskan Nama Kantor/Tempat Kerja Ayah" name="kantor_ayah" value="<?php echo $_SESSION['kantor_ayah']; ?>" required="required">
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
                <label>Alamat Kantor Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Kantor Ayah" name="alamat_kantor_ayah"  required="required"><?php echo $_SESSION['alamat_kantor_ayah']; ?></textarea>
              </div>
            </div>  

            <div class="col-sm-12">
              <hr>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>No. KTP/NIK/Paspor ibu<sup class="text-red">*</sup></label>
                <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor ibu" name="nik_ibu" value="<?php echo $_SESSION['nik_ibu']; ?>" required="required">
              </div>
            </div> 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama ibu<sup class="text-red">*</sup></label>
                <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap ibu" name="nama_ibu" value="<?php echo $_SESSION['nama_ibu']; ?>" required="required">
              </div>
            </div> 
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nomor Handphone ibu<sup class="text-red">*</sup></label>
                <input class="form-control" type="number" placeholder="Tuliskan Handphone ibu" name="hp_ibu" value="<?php echo $_SESSION['hp_ibu']; ?>" required="required">
              </div>
            </div> 

            <div class="col-sm-3">
              <div class="form-group">
                <label>Pendidikan ibu<sup class="text-red">*</sup></label>
                <select class="form-control" name="pendidikan_ibu" id="pendidikanibu" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM pendidikan ORDER BY id_pendidikan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['pendidikan_ibu'] ?>"  value="<?php echo $row['id_pendidikan'];?>" <?php echo $row['id_pendidikan'] == $_SESSION['pendidikan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pendidikan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>     
            <div class="col-sm-3">
              <div class="form-group">
                <label>Pekerjaan ibu<sup class="text-red">*</sup></label>
                <select class="form-control" name="pekerjaan_ibu" id="pekerjaanibu" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM pekerjaan ORDER BY id_pekerjaan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['pekerjaan_ibu'] ?>"  value="<?php echo $row['id_pekerjaan'];?>" <?php echo $row['id_pekerjaan'] == $_SESSION['pekerjaan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pekerjaan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>   
            <div class="col-sm-6">
              <div class="form-group">
                <label>Jabatan Pekerjaan ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <input class="form-control" type="text" placeholder="Tuliskan Jabatan Pekerjaan ibu" name="jabatan_ibu" value="<?php echo $_SESSION['jabatan_ibu']; ?>" required="required">
              </div>
            </div>    
            <div class="col-sm-3">
              <div class="form-group">
                <label>Penghasilan ibu<sup class="text-red">*</sup></label>
                <select class="form-control" name="penghasilan_ibu" id="penghasilanibu" required="true" style="width:100%">
                  <option></option>
                  <?php
                  $tampil = mysqli_query($con, "SELECT * FROM penghasilan ORDER BY id_penghasilan");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option class="<?php echo $_SESSION['penghasilan_ibu'] ?>"  value="<?php echo $row['id_penghasilan'];?>" <?php echo $row['id_penghasilan'] == $_SESSION['penghasilan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_penghasilan']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>  
            <div class="col-sm-3">
              <div class="form-group">
                <label>Isi Jika Penghasilan ibu Lainnya<sup class="text-red">*</sup></label>
                <input class="form-control" type="text" placeholder="Tuliskan Penghasilan ibu Lainya" name="penghasilan_ibu_lainya" value="<?php echo $_SESSION['penghasilan_ibu_lainya'];?>">
              </div>
            </div>      
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Kantor/Tempat Kerja ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <input class="form-control" type="text" placeholder="Tuliskan Nama Kantor/Tempat Kerja ibu" name="kantor_ibu" value="<?php echo $_SESSION['kantor_ibu']; ?>" required="required">
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
                <label>Alamat Kantor ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Kantor ibu" name="alamat_kantor_ibu"  required="required"><?php echo $_SESSION['alamat_kantor_ibu']; ?></textarea>
              </div>
            </div>  

            <div class="col-sm-12">
              <hr>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label>Alamat Tinggal Orangtua (Ayah&Ibu)<sup class="text-red">*</sup> </label>
                <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Tinggal Lengkap Orangtua" name="alamat_ortu"  required="required"><?php echo $_SESSION['alamat_ortu']; ?></textarea>
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
                <label>Alasan Memilih <?php echo $iden['nama'];?>?<sup class="text-red">*</sup> </label>
                <textarea class="form-control" type="text" placeholder="Tuliskan Alasan Orangtua Memilih <?php echo $iden['nama'];?> " name="alasan_ortu"  required="required"><?php echo $_SESSION['alasan_ortu']; ?></textarea>
              </div>
            </div>  
          </div> 
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12">
                <i class="fa  fa-info-circle"></i>  Step 3 dari 5!   
                <div class="progress progress-xs">
                  <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <br/>
              <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right">Selanjutnya <i class="fa fa-arrow-circle-right"></i></button>

            </form>
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


              <button  style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-danger pull-left"><i class="fa fa-arrow-circle-left"></i> Sebelumnya</button>
            </div>
          </div>
        </div>
      </form>
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

<footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <div class="container">
    <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="../" class="text-white" style="text-transform: uppercase;"> AAplikasi <?php echo $iden['aplikasi'];?> - <?php echo $iden['nama'];?></a></strong>
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