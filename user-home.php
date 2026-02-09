<?php require_once "user-header.php"; ?>
<?php require_once "user-menu.php"; ?><!-- Content Wrapper. Contains page content -->
<?php
if(isset($_GET['alert'])){
  if($_GET['alert']=="berhasil"){

    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Berhasil Masuk Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "user";
        });
      });
    </script>
    <?php 
  }           
  elseif ($_GET['alert']=="keluar") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Berhasil Keluar Dari Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "../logout";
        });
      });
    </script>
    <?php
  }  
  elseif ($_GET['alert']=="unggah") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Berhasil Menggunggah File',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "user";
        });
      });
      </script>><?php
    }  
    elseif ($_GET['alert']=="ubah") {
      ?>
      <script type="text/javascript">
        $(function() {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            title: 'Sukses!',
            text: 'Data Berhasil Diubah',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          }).then(function() {
            window.location = "user";
          });
        });
      </script>
      <?php
    }                    
  }
  ?>
  <div class="container" style="margin-top: 55px;text-transform: inherit;border-radius: 20px;">
    <div class="card-body" style="text-transform: inherit;border-radius: 20px;">
      <div class="callout callout-info">
        <center><h4 class="ketikan">Selamat Datang di Aplikasi <?php echo "$iden[aplikasi]"; ?>  Tahun <?php echo date(Y);?><br></h4><h2><b class="text-info"><?php echo $fetch_info['name'] ?></b></h2></center>
        <p class="text-capitalize">
          <?php 
          $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN gelombang ON users.id_gel = gelombang.id_gelombang  WHERE id_user ='$fetch_info[id_user]'"));
          $pan=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb  WHERE id_panitia ='1'"));
          $tgl_ujian = date('d-m-Y', strtotime($pan['tgl_ujian']));
          if (trim($sd['status_pmb']) == '1'){ echo "";?>
          
          <center>Status Pendaftaran Anda Telah
          <label class="btn btn-xs btn-primary"><i class="fa fa-check-circle"></i> Diverifikasi</label><br/>Silahkan Cetak/Unduh Kartu Pendaftaran <button type="button"  onclick="window.location.href='user-kartupendaftaran.php?id=<?php echo $fetch_info[id_user]; ?>'" class="btn btn-xs btn-info"><i class="fa fa-cloud-download"></i> Disini</button> dan Berkas/Surat Penerimaan Mahasiswa Baru <button type="button" class="btn btn-xs btn-warning" onclick="window.open('../assets/dist/img/surat/<?php echo $sd['surat'] ?>','popuppage','width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300');" ><i class="fa fa-cloud-download"></i> Disini</button> <br/>Sebagai Syarat Untuk Melakukan Pendaftaran Kembali bila dinyatakan lulus ujian online dan silahkan mengikuti ujian seleksi pada tanggal: <label class="btn btn-xs btn-danger"><i class="fa fa-calendar"></i> <?php echo "$tgl_ujian"; ?></label>
          </center>
        <?php  } else{ echo "";?>
        Status Pendaftaran: <label class="badge bg-red"><i class="fa fa-times-circle"></i> Belum Diverifikasi </label> Menunggu Proses Pembayaran dan Unggah Bukti Biaya Pendaftaran
        <br/>Silahkan transfer  Senilai <label class="badge bg-primary"><?php echo "Rp " . number_format("$sd[biaya]", 0, ",", "."); ?></label> ke Rekening: <label class="badge bg-info"><?php echo "$iden[rekening]"; ?></label> a.n <?php echo "$iden[an_rekening]"; ?> <br/><?php 
        $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user ='$fetch_info[id_user]'"));
        if (trim($sd['bukti_trf']) == ''){ echo "";?>Saat Ini Anda Belum Mengunggah Bukti Transfer Pendaftaran, Klik <a type="button" onclick="window.location.href='unggahbuktitransfer'" class="badge bg-success"><i class="fa fa-cloud-upload"></i> Disini</a> untuk unggah bukti transfer!
        <?php  } else{ echo "";?> Saat Ini Anda Sudah Mengunggah Bukti Transfer Pendaftaran, Klik <a type="button" onclick="window.location.href='unggahbuktitransfer'" class="badge bg-success"><i class="fa fa-cloud-upload"></i> Disini</a> untuk unggah bukti transfer kembali jika terdapat kesalahan!<?php }?> 
        
        <small>
         <p>Jika pembayaran belum diverifikasi anda dapat menghubungi kontak panitia sesuai program studi (prodi) di bawah ini:
         </p>
         <div class="table-responsive">
          <table class="table small">
            <tr>
              <td>Nama Panitia</td>
              <td>Prodi</td>
              <td>Handphone</td>
              <td>Whatsapp</td>
            </tr>
            <?php
            $tampil = mysqli_query($con, "SELECT * FROM kontak_panitia ORDER BY id_kp");
            $no = 0;
            while($r = mysqli_fetch_assoc($tampil)){
              $no++;
              ?>
              <tr>
                <td><?php echo $r['nama_kp'] ?></td>
                <td><?php echo $r['prodi_kp'] ?></td>
                <td><?php echo $r['hp_kp'] ?></td>
                <td><button class="btn btn-success" type="button" onclick="window.open('https://api.whatsapp.com/send?phone=<?php echo $r['hp_kp']; ?>&text=Halo Panitia PMB, Saya Mau Konfirmasi Pembayaran Biaya Pendaftaran Mahasiswa Baru!', '_blank');" ><i class="fa fa-whatsapp"></i> Klik Whatsapp</button></td>
                
              </tr> 
            <?php } ?>
          </table>
          </small
        </div>
      <?php }?>
      <br/>
      <div class="position-relative">
        <img src="../assets/dist/img/bg/<?php echo "$iden[ribbon]"; ?>" alt="ribbon" class="img-fluid" style="width: 100%;border-radius: 20px;border:4px solid #eee;height: 200px;object-fit: cover;overflow: hidden;">
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <?php 
        $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user ='$fetch_info[id_user]'"));
        if (trim($sd['status_pmb']) == '1'){ echo "";?>
        <div class="info-box mb-3" type="button" onclick="window.location.href='detail?id=<?php echo "$fetch_info[id_user]" ?>'" data-toggle="tooltip" title="Klik Untuk Melihat Data">
        <?php  } else{ echo "";?> <div class="info-box mb-3 ops" type="button" href='./user' data-toggle="tooltip" title="Klik Untuk Melihat Data"><?php }?>
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-user faa-pulse animated"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">DETAIL DATA SAYA</span>
          <div class="ribbon-wrapper ribbon-xs">
            <div class="ribbon <?php echo "$iden[color]";?> text-xs">
              Detail
            </div>
          </div>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <?php 
      $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users  WHERE id_user ='$fetch_info[id_user]'"));
      if (trim($sd['status_pmb']) == '1'){ echo "";?>
      <div class="info-box mb-3" type="button" onclick="window.location.href='cetakhasilujianpmb?id=<?php echo $fetch_info['id_user']; ?>'" data-toggle="tooltip" title="Klik Untuk Update Data">
      <?php  } else{ echo "";?> 
      <div class="info-box mb-3 ops" type="button" href='./user' data-toggle="tooltip" title="Klik Untuk Update Data"><?php }?>
      <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-credit-card faa-pulse animated"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">HASIL SELEKSI</span>
        <div class="ribbon-wrapper ribbon-xs">
          <div class="ribbon <?php echo "$iden[color]";?> text-xs">
            Cetak
          </div>
        </div>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <div class="col-12 col-sm-6 col-md-3">

    <?php 
    $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users  WHERE id_user ='$fetch_info[id_user]'"));
    if (trim($sd['status_pmb']) == '1'){ echo "";?>
    <div class="info-box mb-3" type="button" onclick="window.location.href='formulirpmbcetak?id=<?php echo $fetch_info['id_user']; ?>'" data-toggle="tooltip" title="Klik Untuk Cetak Data">
    <?php  } else{ echo "";?>
    <div class="info-box mb-3 ops" type="button" href='./user' data-toggle="tooltip" title="Cetak Formulir Pendaftaran">
    <?php }?>
    <span class="info-box-icon <?php echo "$iden[color]";?> elevation-1"><i class="fa fa-print faa-pulse animated"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">FORMULIR PMB</span>
      <div class="ribbon-wrapper ribbon-xs">
        <div class="ribbon <?php echo "$iden[color]";?> text-xs">
          Cetak
        </div>
      </div>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<div class="col-12 col-sm-6 col-md-3">
  <div class="info-box mb-3" type="button" onclick="window.location.href='password'" data-toggle="tooltip" title="Klik Untuk Ganti Password">
    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-key faa-pulse animated"></i></span>
    <div class="info-box-content">
      <span class="info-box-text">PASSWORD</span>
      <div class="ribbon-wrapper ribbon-xs">
        <div class="ribbon <?php echo "$iden[color]";?> text-xs">
          Ganti
        </div>
      </div>
    </div>
    <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
</div>
<br/>
<br/>
<br/>
<br/>
<!-- /.col -->
</div>
</div>
</div>
<br/>
<br/>
<br/>
<br/>

<?php require_once "user-footer.php"; ?>

