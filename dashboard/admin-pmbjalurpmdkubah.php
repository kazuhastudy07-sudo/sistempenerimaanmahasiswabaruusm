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
  <?php
  $r = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user='$_GET[id]'"));
              // $tgl = date("Y-m-d", strtotime($data['tgl_lhr']));
              // $id = $data['id'];
              // $ids = sprintf("%07s", $id);
  ?>

  <div class="content">
    <div class="container">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true"><i class="fa fa-key"></i> Data Akun</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false"><i class="fa fa-user"></i> Data Pribadi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false"><i class="fa fa-users"></i> Data Keluarga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false"><i class="fa fa-sitemap"></i> Data Fakultas/Prodi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-settingss-tab" data-toggle="pill" href="#custom-tabs-four-settingss" role="tab" aria-controls="custom-tabs-four-settingss" aria-selected="false"><i class="fa fa-cloud-upload"></i> Unggah Berkas</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">

            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <form role="form" method="POST" action="action/pmbjalurpmdk_update.php" enctype='multipart/form-data'>
                <input type="hidden" name="id_user" value="<?php echo $r['id_user']; ?>" required>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email<sup class="text-red">*</sup> <badge class="badge bg-red">Digunakan Sebagai Username Login</badge></label>
                      <input class="form-control" type="email" placeholder="Tuliskan Alamat Email" name="email" value="<?php echo $r['email']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Password<sup class="text-red">*</sup> <badge class="badge bg-red">Password Dapat Diganti Melalui Form Reset</badge></label>
                      <input class="form-control" type="password" placeholder="Tuliskan Password" value="<?php echo $r['password']; ?>" disabled="disabled">
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
                          <option class="<?php echo $r['id_rekomendasi'] ?>"  value="<?php echo $row['id_rekomendasi'];?>" <?php echo $row['id_rekomendasi'] == $r['id_rekomendasi'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_rekomendasi']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Yang Memberi Rekomendasi<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Yang Memberi Rekomendasi" name="rekomendasi" value="<?php echo $r['rekomendasi']; ?>" required="required">
                    </div>
                  </div> 
                </div> 
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-8 btn-xs-6">
                      <small><i class="fa fa-info-circle"></i> Silahkan klik tombol simpan untuk update data!</small>
                    </div>
                    <input type="hidden" name="step1" value="1">
                    <div class="col-sm-4 col-xs-6">
                      <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"> <i class="fa fa-check-circle"></i> Simpan</button> <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="button" onclick="window.location.href='./pmbjalurpmdk'" class="btn btn-sm btn-xs-2 btn-danger pull-right"> <i class="fa fa-times-circle"></i> Batal</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <input type="hidden" name="id_user" value="<?php echo $r['id_user']; ?>" required>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No. KTP/NIK/Paspor<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor" name="nik" value="<?php echo $r['nik']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama <sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap" name="name" value="<?php echo $r['name']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tempat Lahir <sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Tempat Lahir" name="tmp_lhr" value="<?php echo $r['tmp_lhr']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tanggal Lahir <sup class="text-red">*</sup></label>
                      <input class="form-control" type="date" placeholder="Tuliskan Alamat Email" name="tgl_lhr" value="<?php echo $r['tgl_lhr']; ?>" required="required">
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
                          <option class="<?php echo $r['id_jk'] ?>"  value="<?php echo $row['id_jk'];?>" <?php echo $row['id_jk'] == $r['id_jk'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jk']; ?></option>
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
                          <option class="<?php echo $r['id_agm'] ?>"  value="<?php echo $row['id_agm'];?>" <?php echo $row['id_agm'] == $r['id_agm'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_agm']; ?></option>
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
                          <option class="<?php echo $r['id_kw'] ?>"  value="<?php echo $row['id_kw'];?>" <?php echo $row['id_kw'] == $r['id_kw'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_kw']; ?></option>
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
                          <option class="<?php echo $r['id_kk'] ?>"  value="<?php echo $row['id_kk'];?>" <?php echo $row['id_kk'] == $r['id_kk'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_kk']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat <sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Alamat RT/RW/Komplek/Lingkungan/Kode Pos" name="alamat" value="<?php echo $r['alamat']; ?>" required="required">
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
                          <option class="<?php echo $r['id_prov'];?>" value="<?php echo $rs_provinsi['id_prov']; ?>" <?php echo $rs_provinsi['id_prov'] == $r['id_prov'] ? 'selected="selected"' : '' ?>><?php echo $rs_provinsi['nama_provinsi']; ?></option>
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
                        <?php  $sql_kabupaten = mysqli_query($con, "SELECT * FROM regencies WHERE id_prov ='$r[id_prov]' ORDER BY nama_kabupaten ASC");                      
                        while($rs_kabupaten = mysqli_fetch_array($sql_kabupaten)){ ?> 
                          <option class="<?php echo $r['id_kab'];?>" value="<?php echo $rs_kabupaten['id_kab']; ?>" <?php echo $rs_kabupaten['id_kab'] == $r['id_kab'] ? 'selected="selected"' : '' ?>><?php echo $rs_kabupaten['nama_kabupaten']; ?></option>
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
                        $sql_kecamatan = mysqli_query($con, "SELECT * FROM districts WHERE id_kab ='$r[id_kab]' ORDER BY id_kec ASC");                      
                        while($rs_kecamatan = mysqli_fetch_array($sql_kecamatan)){ ?> 
                          <option class="<?php echo $r['id_kec'];?>" value="<?php echo $rs_kecamatan['id_kec']; ?>" <?php echo $rs_kecamatan['id_kec'] == $r['id_kec'] ? 'selected="selected"' : '' ?>><?php echo $rs_kecamatan['nama_kecamatan']; ?></option>
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
                        $sql_kelurahan = mysqli_query($con, "SELECT * FROM villages WHERE id_kec ='$r[id_kec]' ORDER BY nama_kelurahan ASC");                      
                        while($rs_kelurahan = mysqli_fetch_array($sql_kelurahan)){ ?> 
                          <option class="<?php echo $r['id_kel'];?>" value="<?php echo $rs_kelurahan['id_kel']; ?>" <?php echo $rs_kelurahan['id_kel'] == $r['id_kel'] ? 'selected="selected"' : '' ?>><?php echo $rs_kelurahan['nama_kelurahan']; ?></option>
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
                      <input class="form-control" type="text" placeholder="Tuliskan NISN" name="nisn" value="<?php echo $r['nisn']; ?>" required="required">
                    </div>
                  </div>  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sekolah Asal SMA/SMK/MA Sederajat<sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Sekolah Asal" name="sekolah" value="<?php echo $r['sekolah']; ?>" required="required">
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
                          <option class="<?php echo $r['id_jurusan'] ?>"  value="<?php echo $row['id_jurusan'];?>" <?php echo $row['id_jurusan'] == $r['id_jurusan'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_jurusan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tahun Lulus<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan Tahun Lulus" name="thn_lulus" value="<?php echo $r['thn_lulus']; ?>" required="required">
                    </div>
                  </div>    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat Sekolah Asal<sup class="text-red">*</sup></label>
                      <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Sekolah Asal" name="alamat_sekolah"  required="required"><?php echo $r['alamat_sekolah']; ?></textarea>
                    </div>
                  </div> 
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Nomor Ijazah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nomor Ijazah" name="no_ijazah" value="<?php echo $r['no_ijazah']; ?>" required="required">
                    </div>
                  </div>    
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tahun Ijazah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Tahun Lulus" name="thn_ijazah" value="<?php echo $r['thn_ijazah']; ?>" required="required">
                    </div>
                  </div>     
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Nilai Ujian Rata-rata<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Belum Keluar</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nilai Ujian Rata-rata" name="nilai_rr" value="<?php echo $r['nilai_rr']; ?>" required="required">
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
                          <option class="<?php echo $r['id_alm'] ?>"  value="<?php echo $row['id_alm'];?>" <?php echo $row['id_alm'] == $r['id_alm'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_alm']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>    
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Prestasi Yang Pernah Diraih<sup class="text-red">* Bila Ada Tuliskan Jenis/Cabang dan Tingkat Kejuaraan</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Prestasi Yang Pernah Diraih" name="prestasi" value="<?php echo $r['prestasi']; ?>" required="required">
                    </div>
                  </div>  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No. Handphone<sup class="text-red">*</sup><br/> <badge class="badge bg-red">Whatsapp</badge></label>
                      <input class="form-control" type="number" placeholder="Tuliskan Nomor Handphone (Whatsapp)" name="hp" value="<?php echo $r['hp']; ?>" required="required">
                    </div>
                  </div>     

                </div> 
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-8 btn-xs-6">
                      <small><i class="fa fa-info-circle"></i> Silahkan klik tombol simpan untuk update data!</small>
                    </div>
                    <input type="hidden" name="step1" value="1">
                    <div class="col-sm-4 col-xs-6">
                      <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"> <i class="fa fa-check-circle"></i> Simpan</button> <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="button" onclick="window.location.href='./pmbjalurpmdk'" class="btn btn-sm btn-xs-2 btn-danger pull-right"> <i class="fa fa-times-circle"></i> Batal</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No. KTP/NIK/Paspor Ayah<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor Ayah" name="nik_ayah" value="<?php echo $r['nik_ayah']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Ayah<sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap Ayah" name="nama_ayah" value="<?php echo $r['nama_ayah']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nomor Handphone Ayah<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan Handphone Ayah" name="hp_ayah" value="<?php echo $r['hp_ayah']; ?>" required="required">
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
                          <option class="<?php echo $r['pendidikan_ayah'] ?>"  value="<?php echo $row['id_pendidikan'];?>" <?php echo $row['id_pendidikan'] == $r['pendidikan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pendidikan']; ?></option>
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
                          <option class="<?php echo $r['pekerjaan_ayah'] ?>"  value="<?php echo $row['id_pekerjaan'];?>" <?php echo $row['id_pekerjaan'] == $r['pekerjaan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pekerjaan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>   
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jabatan Pekerjaan Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Jabatan Pekerjaan Ayah" name="jabatan_ayah" value="<?php echo $r['jabatan_ayah']; ?>" required="required">
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
                          <option class="<?php echo $r['penghasilan_ayah'] ?>"  value="<?php echo $row['id_penghasilan'];?>" <?php echo $row['id_penghasilan'] == $r['penghasilan_ayah'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_penghasilan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Isi Jika Penghasilan Ayah Lainnya<sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Penghasilan Ayah Lainya" name="penghasilan_ayah_lainya" value="<?php echo $r['penghasilan_ayah_lainya']; ?>">
                    </div>
                  </div>      
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Kantor/Tempat Kerja Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Kantor/Tempat Kerja Ayah" name="kantor_ayah" value="<?php echo $r['kantor_ayah']; ?>" required="required">
                    </div>
                  </div>  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat Kantor Ayah<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Kantor Ayah" name="alamat_kantor_ayah"  required="required"><?php echo $r['alamat_kantor_ayah']; ?></textarea>
                    </div>
                  </div>  

                  <div class="col-sm-12">
                    <hr>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>No. KTP/NIK/Paspor ibu<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan No. KTP/NIK/Paspor ibu" name="nik_ibu" value="<?php echo $r['nik_ibu']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama ibu<sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Lengkap ibu" name="nama_ibu" value="<?php echo $r['nama_ibu']; ?>" required="required">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nomor Handphone ibu<sup class="text-red">*</sup></label>
                      <input class="form-control" type="number" placeholder="Tuliskan Handphone ibu" name="hp_ibu" value="<?php echo $r['hp_ibu']; ?>" required="required">
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
                          <option class="<?php echo $r['pendidikan_ibu'] ?>"  value="<?php echo $row['id_pendidikan'];?>" <?php echo $row['id_pendidikan'] == $r['pendidikan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pendidikan']; ?></option>
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
                          <option class="<?php echo $r['pekerjaan_ibu'] ?>"  value="<?php echo $row['id_pekerjaan'];?>" <?php echo $row['id_pekerjaan'] == $r['pekerjaan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_pekerjaan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>   
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Jabatan Pekerjaan ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Jabatan Pekerjaan ibu" name="jabatan_ibu" value="<?php echo $r['jabatan_ibu']; ?>" required="required">
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
                          <option class="<?php echo $r['penghasilan_ibu'] ?>"  value="<?php echo $row['id_penghasilan'];?>" <?php echo $row['id_penghasilan'] == $r['penghasilan_ibu'] ? 'selected="selected"' : '' ?>><?php echo $row['nama_penghasilan']; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>  
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Isi Jika Penghasilan ibu Lainnya<sup class="text-red">*</sup></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Penghasilan ibu Lainya" name="penghasilan_ibu_lainya" value="<?php echo $r['penghasilan_ibu_lainya']; ?>">
                    </div>
                  </div>      
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nama Kantor/Tempat Kerja ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <input class="form-control" type="text" placeholder="Tuliskan Nama Kantor/Tempat Kerja ibu" name="kantor_ibu" value="<?php echo $r['kantor_ibu']; ?>" required="required">
                    </div>
                  </div>  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat Kantor ibu<sup class="text-red">*</sup> <badge class="badge bg-red">Isi Dengan Tanda (-) Bila Tidak Ada</badge></label>
                      <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Lengkap Kantor ibu" name="alamat_kantor_ibu"  required="required"><?php echo $r['alamat_kantor_ibu']; ?></textarea>
                    </div>
                  </div>  

                  <div class="col-sm-12">
                    <hr>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alamat Tinggal Orangtua (Ayah&Ibu)<sup class="text-red">*</sup> </label>
                      <textarea class="form-control" type="text" placeholder="Tuliskan Alamat Tinggal Lengkap Orangtua" name="alamat_ortu"  required="required"><?php echo $r['alamat_ortu']; ?></textarea>
                    </div>
                  </div>  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Alasan Memilih <?php echo $iden['nama'];?>?<sup class="text-red">*</sup> </label>
                      <textarea class="form-control" type="text" placeholder="Tuliskan Alasan Orangtua Memilih <?php echo $iden['nama'];?> " name="alasan_ortu"  required="required"><?php echo $r['alasan_ortu']; ?></textarea>
                    </div>
                  </div>  
                </div> 
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-8 btn-xs-6">
                      <small><i class="fa fa-info-circle"></i> Silahkan klik tombol simpan untuk update data!</small>
                    </div>
                    <input type="hidden" name="step1" value="1">
                    <div class="col-sm-4 col-xs-6">
                      <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"> <i class="fa fa-check-circle"></i> Simpan</button> <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="button" onclick="window.location.href='./pmbjalurpmdk'" class="btn btn-sm btn-xs-2 btn-danger pull-right"> <i class="fa fa-times-circle"></i> Batal</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
               <div class="row">
                <div class="col-sm-12">
                  <center>
                    <?php $ikl = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM fakultas WHERE id_fak='$r[id_fak]'")); 
                    $i1 = $ikl["logo_fak"]; ?>
                    <img style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;border: 4px solid #eee;" class="img-responsive" alt="Responsive image" src="../assets/dist/img/logo/<?php echo "$i1"; ?>" width="50%">
                  </center>
                  <hr>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Fakultas<sup class="text-red">*</sup></label>
                    <select class="form-control" id="statuspegawai" name="id_fak" required="true" style="width: 100%">
                      <option></option>
                      <?php 
                      $sql_sp= mysqli_query($con, "SELECT * FROM fakultas ORDER BY id_fak ASC");                      
                      while($rs_sp = mysqli_fetch_array($sql_sp)){ ?> 
                        <option class="<?php echo $r['id_fak'];?>" value="<?php echo $rs_sp['id_fak']; ?>" <?php echo $rs_sp['id_fak'] == $r['id_fak'] ? 'selected="selected"' : '' ?>><?php echo $rs_sp['nama_fak']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Program Studi<sup class="text-red">*</sup></label>
                    <select class="form-control" id="pangkat" name="id_pro" required="true" style="width: 100%">
                      <option></option>
                      <?php $sql_p= mysqli_query($con, "SELECT * FROM prodi WHERE id_fak ='$r[id_fak]' ORDER BY nama_pro ASC");                      
                      while($rs_p = mysqli_fetch_array($sql_p)){ ?> 
                        <option class="<?php echo $r['id_pro'];?>" value="<?php echo $rs_p['id_pro']; ?>" <?php echo $rs_p['id_pro'] == $r['id_pro'] ? 'selected="selected"' : '' ?>><?php echo $rs_p['nama_pro']; ?> | Akreditasi <?php echo $rs_p['akreditas']; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div> 

              </div>   
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-8 btn-xs-6">
                    <small><i class="fa fa-info-circle"></i> Silahkan klik tombol simpan untuk update data!</small>
                  </div>
                  <input type="hidden" name="step1" value="1">
                  <div class="col-sm-4 col-xs-6">
                    <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"> <i class="fa fa-check-circle"></i> Simpan</button> <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="button" onclick="window.location.href='./pmbjalurpmdk'" class="btn btn-sm btn-xs-2 btn-danger pull-right"> <i class="fa fa-times-circle"></i> Batal</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-settingss" role="tabpanel" aria-labelledby="custom-tabs-four-settingss-tab">
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah KTP<sup class="text-red">*file (.jpg)</sup>  <br/><a href="#" onclick="window.open('../assets/dist/img/ktp/<?php echo "$r[ktp]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Ijazah/SKL"><i class="fa fa-eye"></i> Lihat KTP
                  </a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="ktp" value="<?php echo $r['ktp'];?>"  multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Unggah KTP Baru</label>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah Kartu Keluarga<sup class="text-red">*file (.jpg)</sup> <br/><a href="#" onclick="window.open('../assets/dist/img/kk/<?php echo "$r[kk]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Kartu Keluarga"><i class="fa fa-eye"></i> Lihat Kartu Keluarga
                  </a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="kk" value="<?php echo $r['kk'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile1">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Kartu Keluarga Baru</label>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah Akta Kelahiran<sup class="text-red">*file (.jpg)</sup> <br/>  <a href="#" onclick="window.open('../assets/dist/img/akta/<?php echo "$r[akta]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Akta"><i class="fa fa-eye"></i> Lihat Akta
                  </a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="akta" value="<?php echo $r['akta'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile2">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Akta Kelahiran Baru</label>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah Pas Photo<sup class="text-red">*file (.jpg)</sup> <br/> <a href="#" onclick="window.open('../assets/dist/img/user/<?php echo "$r[gambar]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Photo"><i class="fa fa-eye"></i> Lihat Photo
                  </a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="gambar" value="<?php echo $r['gambar'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile3">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Pas Photo</label>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah Ijazah/SKL Legalisir<sup class="text-red">*file (.jpg)</sup> <br/>  <a href="#" onclick="window.open('../assets/dist/img/ijazah/<?php echo "$r[ijazah]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Ijazah/SKL"><i class="fa fa-eye"></i> Lihat Ijazah/SKL
                  </a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="ijazah" value="<?php echo $r['ijazah'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile4">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Ijazah/SKL Legalisir</label>
                    </div>
                  </div>
                </div>
              </div> 
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah Surat Keterangan Bekerja Dari Pimpinan<sup class="text-red">*file (.jpg)</sup>  <a href="#" onclick="window.open('../assets/dist/img/suratkerja/<?php echo "$r[surat_kerja]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Surat Kerja"><i class="fa fa-eye"></i> Lihat Surat Kerja
                  </a>&nbsp;<badge class="badge bg-red"> Untuk Pendaftar Kelas Karyawan/Pararel</badge></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="surat_kerja" value="<?php echo $r['surat_kerja'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile5">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Surat Keterangan Bekerja Dari Pimpinan</label>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Scan & Unggah  Piagam Sertifikat<sup class="text-red">*file (.jpg)</sup> <br/>  <a href="#" onclick="window.open('../assets/dist/img/piagam/<?php echo "$r[piagam]";?>','popuppage','width=500,toolbar=0,resizable=0,scrollbars=no,height=500,top=100,left=300');" class="btn btn-xs bg-info" data-toggle='tooltip' title="Lihat Piagam"><i class="fa fa-eye"></i> Lihat Piagam</a></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="piagam" value="<?php echo $r['piagam'];?>" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile6">
                      <label class="custom-file-label" for="exampleInputFile">Unggah Piagam Sertifikat</label>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="checkbox" checked="checked">
                  <small>
                    Dengan ini saya menyampaikan/mengirim data pendaftaran mahasiswa baru dengan sebenarnya dan penuh rasa tanggung jawab. Apabila dikemudian hari ditemukan bahwa data/dokumen yang saya sampaikan tidak benar dan/atau ada pemalsuan, maka seluruh keputusan yang telah ditetapkan berdasarkan berkas tersebut batal berdasarkan hukum dan saya bersedia dikenakan sanksi sesuai ketentuan peraturan perundang-undangan yang berlaku.
                  </small>
                </div>
              </div> 

            </div>   
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-8 btn-xs-6">
                  <small><i class="fa fa-info-circle"></i> Silahkan klik tombol simpan untuk update data!</small>
                </div>
                <input type="hidden" name="step1" value="1">
                <div class="col-sm-4 col-xs-6">
                  <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"> <i class="fa fa-check-circle"></i> Simpan</button> <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="button" onclick="window.location.href='./pmbjalurpmdk'" class="btn btn-sm btn-xs-2 btn-danger pull-right"> <i class="fa fa-times-circle"></i> Batal</button>
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
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
      {   Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
    this.value = "";
  };
};
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile1");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile2");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile3");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile4");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile5");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>

<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile6");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 600000)
    { 
      Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
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