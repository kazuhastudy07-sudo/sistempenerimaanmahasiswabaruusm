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
  <!-- /.content-header -->
  <?php
  $r=mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS jumlah tbl_soal WHERE aktif='Y'"));
  $hitung=mysqli_num_rows($r);
  $pu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tbl_pengaturan_ujian "));
  $pp=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb INNER JOIN gelombang ON panitia_pmb.id_gelombang = gelombang.id_gelombang "));
  
  ?>
  <div class="content">
    <div class="container">
      <div class="card card-primary card-outline">
        <div class='row'>
          <div class='col-md-12'>
            <div class="card-body">
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class='fa fa-list-ol'></i> <b>Soal Ujian Seleksi <?php echo "$aplikasi";?></b>  </h3>

                </div>

                <div class='box-body'>
                  <?php
                  if (empty($fetch_info[username]) AND empty($fetch_info[password])){
                    echo "<link href='style.css' rel='stylesheet' type='text/css'>
                    <center>Untuk mengakses modul, Anda harus login <br>";
                    echo "<a href=./user><b>LOGIN</b></a></center>";
                  }
                  else{
                    $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas  LIMIT 1"));  
                    $logo = $i["logo"]; 
//Lakukan Pengecekan Apakah Sudah Pernah Mengerjakan Soal atau belum
                    $cek=mysqli_num_rows(mysqli_query($con, "SELECT id_users FROM tbl_nilai WHERE id_users='$fetch_info[id_user]'"));
                    $ur=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user='$fetch_info[id_user]'"));
                    if ($cek > 0) {
                      $tampil = mysqli_query($con, "SELECT * FROM tbl_nilai WHERE id_users='$fetch_info[id_user]'");
                      $t=mysqli_fetch_array($tampil);
                      $username=  ucwords($fetch_info['username']);

                      echo "<center>
                      <h2 style='text-transform: uppercase;'><u>$username</u></h2><br><i style='letter-spacing: 10px;'><b>$fetch_info[name]<br/>Anda Sudah Mengerjakan Tes...</i></b><br><br> Silahkan Cetak Informasi Hasil Ujian dan Unduh Berkas/Surat Penerimaan Mahasiswa Baru (PMB) Sebagai Syarat Pendaftaran Kembali!
                      </center>";
                      echo "";?>
                      <br>  
                      <a class='btn btn-primary' href='cetakhasilujianpmb?id=$fetch_info[id_user]'><i class='fa fa-print'></i> Cetak Informasi Hasil Ujian</a>
                      <a class='btn btn-warning' onclick="window.open('../assets/dist/img/surat/<?php echo $ur['surat'] ?>','popuppage','width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300');"><i class='fa fa-cloud-download'></i> Unduh Berkas/Surat PMB</a>

                      <?php echo "
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
                        echo "<td rowspan='4'><center><h1><img src='../assets/dist/img/logo/$i[logo]' style='position: relative;width:80px;'><br/> Lulus (Diterima)</h1></center></td></tr>";
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
                      <td colspan='3'><b>HASIL UJIAN INI MERUPAKAN HASIL REAL-TIME YANG SAH DAN TANPA KECURANGAN.</b></td>
                      </tr>
                      <tr>
                      <center>
                      <td colspan='3' style='text-align: center;'>Ketua Panitia<br><img src='../assets/dist/img/logo/$pp[qrcode]' style='width:80px;'>
                      <br><b>$pp[nama_panitia]</b><br>NIDN. $pp[nidn]</td>
                      <br><br>
                      </center>
                      </tr>

                      </table>


                      ";

                    }
                    else {
                      echo '<table class="table table-hover table-striped">';

                      $hasil=mysqli_query($con, "SELECT * FROM tbl_soal WHERE aktif='Y' ORDER BY RAND ()");
                      $jumlah=mysqli_num_rows($hasil);
                      $urut=0;
                      while($row =mysqli_fetch_array($hasil))
                      {
                        $id=$row["id_soal"];
                        $pertanyaan=$row["soal"];
                        $pilihan_a=$row["a"];
                        $pilihan_b=$row["b"];
                        $pilihan_c=$row["c"];
                        $pilihan_d=$row["d"]; 

                        ?>
                        <form action="user-ujianjawaban.php" id="frmSoal" method='POST'> 
                          <input type="hidden" name="id[]" value="<?php echo $id; ?>">
                          <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                          <tr>
                            <td width="20"><?php echo $urut=$urut+1; ?>.</td>
                            <td><?php echo "$pertanyaan"; ?></td>
                          </tr>
                          <?php
                          if (!empty($row["gambar"])) {
                            echo "<tr><td></td><td><img src='../assets/dist/img/soal/$row[gambar]' width='200' hight='200'></td></tr>";
                          }
                          ?>
                          <tr>
                            <td height="21">&nbsp;</td>
                            <td>
                              A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                              <?php echo "$pilihan_a";?> </td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>
                                B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                                <?php echo "$pilihan_b";?> </td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>
                                  C.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                                  <?php echo "$pilihan_c";?> </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>
                                    D.   <input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                                    <?php echo "$pilihan_d";?> </td>
                                  </tr>

                                  <?php
                                }
                                ?>
                                <tr>
                                  <td>&nbsp;</td>
                                  <td></td>
                                </tr>
                              </table>
                              <button style="width: 200px;" class="btn btn-primary" type="submit" > <i class="fa fa-check-circle"></i> SIMPAN JAWABAN</button>
                            </form>
                          </p>
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
                                var peringatan = 'style="background-color: #222;border-radius: 60px;padding: 10px;color:red;font-weight: bold;"';
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
                                Swal.fire('Waktu Anda telah habis', 'Terima kasih sudah mengikuti ujian', 'success');
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
                          <?php } } ?>

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
                  <strong>Sisa Waktu Ujian <button class="btn" id="timer"></button></strong>
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
