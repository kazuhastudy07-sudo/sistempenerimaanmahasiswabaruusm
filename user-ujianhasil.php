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
                  <h3 class='box-title'><i class='fa fa-file-text'></i> <b>Hasil Ujian Seleksi <?php echo "$aplikasi";?></b> </h3>
                </div>
                <div class='box-body'>
                  <?php
                  $rg=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user ='$fetch_info[id_user]' AND status_pmb ='1'"));
                  if (trim($rg['id_gel']) == '0'){ echo "";?>
                  <hr>
                  <center><h4><img src='../assets/dist/img/logo/<?php echo $logo;?>' style='position: relative;width:80px;'><br/>Anda dinyatakan Lulus (Diterima) Tanpa harus mengikuti Ujian Seleksi<br>
                    Silahkan cetak hasil kelulusan <a href="cetakhasilujianpmb?id=<?php echo $fetch_info['id_user'];?>" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Disini</a>. Dan  Silahkan Unduh Berkas/Surat Penerimaan Mahasiswa Baru <button class="btn btn-sm btn-warning" type="button" onclick="window.open('../assets/dist/img/surat/<?php echo $sd['surat'] ?>','popuppage','width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300');" ><i class="fa fa-cloud-download"></i> Disini</button> Sebagai Syarat Untuk Melakukan Pendaftaran Kembali!</h4></center>
                    <?php 
                  } else{ echo "";?>
                  <!-- /.content-header -->
                  <?php
                  $r=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS jumlah tbl_soal WHERE aktif='Y'"));
                  $hitung=mysqli_num_rows($r);
                  $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));
                  $pp=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb INNER JOIN gelombang ON panitia_pmb.id_gelombang = gelombang.id_gelombang "));

                  ?>
                  <?php

//Lakukan Pengecekan Apakah Sudah Pernah Mengerjakan Soal atau belum
                  $cek=mysqli_num_rows(mysqli_query($con, "SELECT id_users FROM tbl_nilai WHERE id_users='$fetch_info[id_user]'"));
                  if ($cek > 0) {
                    $tampil = mysqli_query($con, "SELECT * FROM tbl_nilai WHERE id_users='$fetch_info[id_user]'");
                    $t=mysqli_fetch_array($tampil);
                    $username=  ucwords($fetch_info['nama']);
                    $email=  $_SESSION['username'];
                    $id=  ucwords($_SESSION['id']);
                    $nopen = sprintf("%05s", $id);
                    $rr=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN fakultas ON users.id_fak = fakultas.id_fak INNER JOIN prodi ON users.id_pro = prodi.id_pro INNER JOIN gelombang ON users.id_gel = gelombang.id_gelombang
                      WHERE id_user='$fetch_info[id_user]'"));

                    $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
                    $tgla = date("Y", strtotime($rr['tgl_lhr']));
                    $tglin = date("d-m-Y", strtotime($rr['tgl_input']));
                    $tahun = date("Y", strtotime($rr['tgl_input']));



                    echo "
                    <table class='table table-striped'>
                    <tr>
                    <td width='250px'>NPM</td>
                    <td>:</td>
                    <td><b style='text-transform: uppercase;'>&nbsp;&nbsp;$rr[npm]</b></td>
                    </tr>  
                    <td width='200px'>Nama</td>
                    <td>:</td>
                    <td><b style='text-transform: uppercase;'>&nbsp;&nbsp;$rr[name]</b></td>
                    </tr>
                    <td width='200px'>Email</td>
                    <td>:</td>
                    <td><b>&nbsp;&nbsp;$rr[email]</b></td>
                    </tr>
                    <td width='200px'>No.Hp.</td>
                    <td>:</td>
                    <td><b>&nbsp;&nbsp;$rr[hp]</b></td>
                    </tr>
                    <tr>
                    <td width='100px'>Fakultas Pilihan</td>
                    <td>:</td>
                    <td><b style='text-transform: uppercase;'>&nbsp;&nbsp;$rr[nama_fak]</b></td>
                    </tr> 
                    <tr>
                    <td width='100px'>Program Studi Pilihan</td>
                    <td>:</td>
                    <td><b style='text-transform: uppercase;'>&nbsp;&nbsp;$rr[nama_pro]</b></td>
                    </tr>
                    <tr>
                    <td width='100px'>Jalur/Gelombang Pendaftaran</td>
                    <td>:</td>
                    <td><b style='text-transform: uppercase;'>&nbsp;&nbsp;$rr[nama_gelombang]</b></td>
                    </tr>
                    </table>";?>
                    <h4> Silahkan Cetak Informasi Hasil Ujian dan Unduh Berkas/Surat Penerimaan Mahasiswa Baru (PMB) Sebagai Syarat Pendaftaran Kembali!</h4>
                    <a class='btn btn-primary' href='cetakhasilujianpmb?id=<?php echo $fetch_info[id_user]; ?>'><i class='fa fa-print'></i> Cetak Informasi Hasil Ujian</a>
                    <a class='btn btn-warning' onclick="window.open('../assets/dist/img/surat/<?php echo $ur['surat'] ?>','popuppage','width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300');"><i class='fa fa-cloud-download'></i> Unduh Berkas/Surat PMB</a>
                    <?php
                    echo "
                    <br>  
                    <table class='table table-bordered table-striped'>
                    <tr class='bg-aqua'>
                    <th width='200px'>HASIL TES ANDA</th>
                    <th width='100px'><center>JUMLAH</center></th>
                    <th><center>KETERANGAN</center></th>
                    </tr>
                    <tr>
                    <td>Jawaban Benar</td>
                    <td><center>$t[benar]</center></td>";
                    $pp=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb WHERE id_panitia = '1'"));
                    $qry=mysqli_query($con, "SELECT nilai_min FROM tbl_pengaturan_ujian");
                    $hasil=mysqli_fetch_array($qry);
                    $cek= $hasil['nilai_min'];
                    if ($t[score] >= $cek) {
                      echo "<td rowspan='4'><center><h1><img src='../assets/dist/img/logo/$i[logo]' style='position: relative;width:80px;'><br> Lulus (Diterima)</h1></center></td></tr>";
                    }else {
                      echo "<td rowspan='4'><center><h1><img src='../assets/dist/img/logo/$i[logo]' style='position: relative;width:80px;'><br>Anda<br/>Tidak Lulus (Dipertimbangkan)</h1>Catatan: Silahkan Menghubungi Panitia Penerimaan Mahasiswa Baru Untuk Informasi Lebih Lanjut <br>Telp. $hp | WA $wa<center></td></tr>";
                    }
                    echo "
                    <tr>
                    <td>Jawaban Salah</td>
                    <td><center>$t[salah]</center></td>
                    </tr>
                    <tr>
                    <td>Jawaban Kosong</td>
                    <td><center>$t[kosong]</center></td
                    >
                    </tr>
                    <tr>
                    <td><b>NILAI ANDA</b></td>
                    <td><center><b>$t[score]</b></center></td
                    >
                    </tr> 
                    <tr>
                    <td colspan='3' class='bg-aqua'><b>HASIL UJIAN INI MERUPAKAN HASIL REAL-TIME YANG SAH DAN TANPA KECURANGAN.</b></td>
                    </tr>
                    <tr>

                    <center>
                    <td colspan='3' style='text-align: center;'>Ketua Panitia<br><img src='../assets/dist/img/logo/$pp[qrcode]' style='width:80px;'>
                    <br><b style='text-transform:uppercase;'>$pp[nama_panitia]</b><br>NIDN. $pp[nidn]</td>
                    <br><br>
                    </center>
                    </tr>
                    </table>
                    ";

                  }
                  else {
                    echo '<center><br><h2><i class="fa fa-warning"></i> <br/>Anda Belum Mengikuti Ujian,<br> Silahkan Klik Menu <a class="btn btn-primary" href="ujian"><i class="fa fa-edit"></i> Ujian</a></h2></center>';?>

                    <?php $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));?>
                    <!-- Kita membutuhkan jquery, disini saya menggunakan langsung dari jquery.com, jquery ini bisa didownload dan ditaruh dilocal -->
                    <script src="assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
                    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>

                    <!-- Script Timer -->
                    <script type="text/javascript">
                      $(document).ready(function() {
            /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
                */
                var detik =<?php echo $pu['detik']; ?>;
                var menit = <?php echo $pu['menit']; ?>;
                var jam   = <?php echo $pu['jam']; ?>;
                var hari    = 0;

            /**
               * Membuat function hitung() sebagai Penghitungan Waktu
               */
               function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                     * mengulang atau merefresh halaman selama 1000 (1 detik) 
                     */
                     setTimeout(hitung,1000);

                     /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
                     if(menit < 1 && jam == 0){
                      var peringatan = 'style="background-color: #ffffff;border-radius: 60px;padding: 10px;color:red;font-weight: bold;"';
                    };

                    /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                    $('#timer').html(
                      '<span style="background-color: #ffffff;border-radius: 60px;padding: 10px;color:#222;font-weight: bold;" align="center"'+peringatan+'>' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</span>'
                      );

                    /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                    detik --;

                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                    */
                    if(detik < 0) {
                      detik = 59;
                      menit --;

                   /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                        */
                        if(menit < 0) {
                          menit = 59;
                          jam --;

                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                            */

                            if(jam < 0) { 
                              clearInterval(); 
                              /** Variable yang digunakan untuk submit secara otomatis di Form */
                              var frmSoal = document.getElementById("frmSoal"); 
                              alert('Waktu Anda telah habis, Terima kasih sudah berkunjung.');
                              frmSoal.submit(); 
                            } 
                          } 
                        } 
                      }           
                      /** Menjalankan Function Hitung Waktu Mundur */
                      hitung();
                    }); 
      // ]]>
    </script>
  <?php } }  ?>
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
