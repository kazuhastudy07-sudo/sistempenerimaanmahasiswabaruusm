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

  <div class="content">
    <div class="container">
      <div class="card card-primary card-outline">
        <div class='row'>
          <div class='col-md-12'>
            <div class="card-body">
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class='fa fa-list-ol'></i> <b>Ujian Seleksi <?php echo $aplikasi; ?></b> </h3>
                </div>

                <div class='box-body'>
                 <?php
                 $rg=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user ='$fetch_info[id_user]' AND status_pmb ='1'"));
                 if (trim($rg['id_gel']) == '0'){ echo "";?>
                 <hr>
                 <center><h4><img src='../assets/dist/img/logo/<?php echo $logo;?>' style='position: relative;width:80px;'><br/>Anda dinyatakan Lulus (Diterima) Tanpa harus mengikuti Ujian Seleksi<br>
                  Silahkan cetak hasil kelulusan <a href="cetakhasilujianpmb?id=<?php echo $fetch_info['id_user'];?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Disini</a> Dan  Silahkan Unduh Berkas/Surat Penerimaan Mahasiswa Baru <button class="btn btn-sm btn-warning" type="button" onclick="window.open('../assets/dist/img/surat/<?php echo $sd['surat'] ?>','popuppage','width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300');" ><i class="fa fa-cloud-download"></i> Disini</button> Sebagai Syarat Untuk Melakukan Pendaftaran Kembali!</h4></center>
                  <?php 
                } else{ echo "";?>
                <!-- /.content-header -->
                <?php
                $r=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS jumlah tbl_soal WHERE aktif='Y'"));
                $hitung=mysqli_num_rows($r);
                $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));
                $pp=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb INNER JOIN gelombang ON panitia_pmb.id_gelombang = gelombang.id_gelombang "));
                $tgl_ujian = date('d-m-Y', strtotime($pp['tgl_ujian']));

                ?>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="info-box bg-primary">
                      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Tanggal Ujian</span>
                        <span class="info-box-number small"><?php echo "$tgl_ujian"; ;?></span>

                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          PMB <?php echo "$pp[nama_gelombang]"; ;?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="col-sm-3">
                    <div class="info-box bg-danger">
                      <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Waktu Ujian</span>
                        <span class="info-box-number small"><?php echo $pu['jam']; ?> Jam <?php echo $pu['menit']; ?> Menit <?php echo $pu['detik']; ?> Detik</span>

                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          PMB <?php echo "$pp[nama_gelombang]"; ;?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="col-sm-3">
                    <div class="info-box bg-info">
                      <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Soal dan Skor Minimal Ujian</span>
                        <span class="info-box-number small"><?php
                        $tampil = mysqli_query($con, "SELECT count(*) AS total FROM tbl_soal");
                        while ($r2=mysqli_fetch_array($tampil))
                          echo "$r2[total]";?> Soal</span>

                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          PMB <?php echo "$pp[nama_gelombang]"; ;?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <div class="col-sm-3">
                    <div class="info-box bg-warning">
                      <span class="info-box-icon"><i class="fa fa-file-text-o"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Skor Minimal Ujian</span>
                        <span class="info-box-number small"> <i class="fa fa-star"></i> <?php echo $pu['nilai_min']; ?> Minimal</span>

                        <div class="progress">
                          <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                          PMB <?php echo "$pp[nama_gelombang]"; ;?>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                  <?php 
                  $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN gelombang ON users.id_gel = gelombang.id_gelombang  WHERE id_user ='$fetch_info[id_user]'"));
                  $pan=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb  WHERE id_panitia ='1'"));
                  if (trim($sd['status_pmb']) == '1'){ echo "";?>

                  <hr>
                  <h5><center><i class="fa fa-pencil"></i> SYARAT DAN KETENTUAN</center></h5>
                  <p><?php echo $pu['peraturan']; ?></p>
                  <center>
                    <form name="fValidate" >
                      <input type="checkbox" name="agree" id="agree" value="1" class="minimal" style="height: 20px;width: 20px;"> <b >Saya Mengerti dan Siap Untuk Mengikuti Tes<b><br/><br/>
                        <div style='text-align:center;'><button type="button" name="button-ok" class="btn btn-primary" onclick="cekForm()"><i class="fa fa-arrow-circle-right"></i> Mulai Ujian Sekarang</button></div>
                      </form>
                    </center>
                    <?php
                    $get = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian"));
                    ?>
                    <script>
                     function cekForm() {
                      if (!document.fValidate.agree.checked) {
                        Swal.fire('Silahkan Klik Kotak dan Centang &nbsp; <i class="fa fa-check-square"></i>', 'Saya Mengerti dan Siap Untuk Mengikutsi Te!', 'warning');
                        return false;
                      } else {
                        location.href="<?php echo "$get[link_ujian]";?>";
                      }
                    }
                  </script>
                <?php  } else{ echo "";?>
                Status Pendaftaran: <label class="badge bg-red"><i class="fa fa-times-circle"></i> Belum Diverifikasi </label> Menunggu Proses Pembayaran dan Unggah Bukti Biaya Pendaftaran
                <br/>Silahkan transfer  Senilai <label class="badge bg-primary"><?php echo "Rp " . number_format("$sd[biaya]", 0, ",", "."); ?></label> ke Rekening: <label class="badge bg-info"><?php echo "$iden[rekening]"; ?></label> a.n <?php echo "$iden[an_rekening]"; ?> <br/> Klik <a type="button" onclick="window.location.href='unggahbuktitransfer'" class="badge bg-success"><i class="fa fa-cloud-upload"></i> Disini</a> untuk unggah bukti transfer!
              <?php } }?>
            </div>

          </div>
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
