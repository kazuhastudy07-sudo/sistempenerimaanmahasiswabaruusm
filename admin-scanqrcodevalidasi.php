<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0 text-dark"><i class="fa fa-check-square-o"></i> CEK VALIDASI KARTU ANGGOTA <i class="fa fa-qrcode"></i></h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a style="border-radius:20px;" class="btn btn-sm bg-info" type="button" onclick="window.location.href='scanqrcode'"><i class="fa fa-search-plus"></i> Scan Kembali</a></li>
            <li class="breadcrumb-item">
              <button style="border-radius:20px;" type="submit" class="btn btn-sm <?php echo "$iden[color]";?>" id="timer"></button>
            </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="card-body">
          <div class="row">
            <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
            <script src="../assets/dist/jquery-1.10.2.min.js" type="text/javascript"></script>

            <!-- Script Timer -->
            <script type="text/javascript">
              $(document).ready(function() {
                        /** Membuat Waktu Mulai Hitung Mundur Dengan 
                            * var detik = 0,
                            * var menit = 1,
                            * var jam = 1
                            */
                            var detik = 10;
                            var menit = 0;
                            var jam     = 0;
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
                                 if(menit < 10 && jam == 0){
                                  var peringatan = '';
                                };

                                /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
                                $('#timer').html(
                                  '<i class="fa fa-clock"></i> Dialihkan otomatis dalam <i class="fa fa-arrow-circle-right"></i> ' + detik + ' detik'
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

                <div class="col-md-12">
                  <!-- Profile Image -->
                  <div class="box box-primary">
                    <div class="box-body box-profile">

                      <audio src="validasi/audio/beep.mp3" autoplay="autoplay" hidden="hidden"></audio>
                      <?php
                      $sql=mysqli_query($con, "SELECT * FROM users INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
                        INNER JOIN provinces ON users.id_prov = provinces.id_prov
                        INNER JOIN regencies ON users.id_kab = regencies.id_kab
                        INNER JOIN districts ON users.id_kec = districts.id_kec  
                        INNER JOIN villages ON users.id_kel = villages.id_kel 
                        INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
                        INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan WHERE npa = '$_POST[npa]' ");

                      $data=mysqli_fetch_array($sql);
                      $tgl_lhr = date("Y-m-d", strtotime($data['tgl_lhr']));
                      $tgl = date("/m/Y", strtotime($data['tgl']));
                      $id = $data['id'];
                      $ids = sprintf("%07s", $id);
                      function tanggal_indo($tanggal, $cetak_hari = false)
                      {
                        $hari = array ( 1 =>    'Senin',
                          'Selasa',
                          'Rabu',
                          'Kamis',
                          'Jumat',
                          'Sabtu',
                          'Minggu'
                        );

                        $bulan = array (1 =>   'Januari',
                          'Februari',
                          'Maret',
                          'April',
                          'Mei',
                          'Juni',
                          'Juli',
                          'Agustus',
                          'September',
                          'Oktober',
                          'November',
                          'Desember'
                        );
                        $split    = explode('-', $tanggal);
                        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

                        if ($cetak_hari) {
                          $num = date('N', strtotime($tanggal));
                          return $hari[$num] . ', ' . $tgl_indo;
                        }
                        return $tgl_indo;
                      }


                      if(mysqli_num_rows($sql) < 1){
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
                              title: 'GAGAL!',
                              text: 'Data Anggota Tidak Ditemukan',
                              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
                            }).then(function() {
                              window.location = "scanqrcode";
                            });
                          });
                        </script>

                        <?php
                      }else{
                        ?>

                        <script type="text/javascript">
                          $(function() {
                            const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 5000
                            });

                            Swal.fire({
                              icon: 'success',
                              showConfirmButton: false,
                              timer: 1500,
                              timerProgressBar: true,
                              title: 'BERHASIL!',
                              text: 'Data Anggota Ditemukan',
                              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
                            })
                          });
                        </script>
                        <div class="row">

                         <div class="col-md-4">
                          <div class="card  card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <a href="#" class="btn <?php echo "$iden[color]";?>  btn-block"><b>PROFIL ANGGOTA</b></a>
                                <br>
                                <img class="profile-user-img img-fluid img-rounded"
                                style="width: 157px;" src="../assets/dist/img/user/<?php echo "$data[gambar]";?>"
                                alt="User profile picture">
                              </div>

                              <h3 class="profile-username text-center"><?php echo "$data[name]";?></h3>

                              <p class="text-muted text-center">No. KTA <?php echo "$data[npa]";?></p>

                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item"><?php echo "$data[npa]";?></b> <a class="float-right"> No. KTA <i class="fa  fa-credit-card"></i></a>
                                </li>
                                <li class="list-group-item">
                                  <b><?php echo "$data[hp]";?></b> <a class="float-right"> HP./WA <i class="fa  fa-whatsapp"></i></a>
                                </li>
                                <li class="list-group-item">
                                  <b><?php echo "$data[email]";?></b> <a class="float-right"> Email <i class="fa  fa-envelope-o"></i></a>
                                </li>
                              </ul>
                            </div>
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <a href="#" class="btn <?php echo "$iden[color]";?>  btn-block"><b>QRcode</b></a>
                                <br>
                                <img class="profile-user-img img-fluid img-rounded"
                                style="width: 200px; "  src="../assets/dist/img/qrcode/<?php echo "$data[qrcode]";?>"
                                alt="User profile picture">
                                <br>
                                No. KTA: <?php echo "$data[npa]";?>
                              </div>
                              <hr>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-8">
                          <!-- About Me Box -->
                          <div class="card card-<?php echo "$iden[sidebar]";?>">
                            <div class="card-header">
                              <h3 class="card-title">RINCIAN DATA ANGGOTA PARTAI</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <strong>NIK</strong>
                              <p class="text-muted"><?php echo "$data[nik]";?></p>
                              <hr>
                              <strong>No. KTA</strong>
                              <p class="text-muted"><?php echo "$data[npa]";?></p>
                              <hr>
                              <strong>Nama Lengkap</strong>
                              <p class="text-muted text-uppercase"><?php echo "$data[name]";?></p>
                              <hr>
                              <strong>Jenis Kelamin</strong>
                              <p class="text-muted text-uppercase">
                                <?php echo "$data[nama_jk]";?>
                              </p>
                              <hr>
                              <strong>Tempat, Tanggal Lahir</strong>
                              <p class="text-muted text-uppercase"><?php echo "$data[tmp_lhr]";?>, <?php 
                              echo tanggal_indo ($tgl_lhr); ?></p>
                              <hr>
                              <strong>Agama</strong>
                              <p class="text-muted text-uppercase"><?php echo "$data[nama_agm]";?></p>
                              <hr>
                              <strong>Alamat</strong>
                              <p class="text-muted text-uppercase">
                                Provinsi <?php echo "$data[nama_provinsi]";?>, <?php echo "$data[nama_kabupaten]";?>, Kecamatan <?php echo "$data[nama_kecamatan]";?>, Kelurahan/Desa <?php echo "$data[nama_kelurahan]";?><br>
                                <?php echo "$data[alamat]";?>
                              </p>
                              <hr>
                              <strong>Jabatan</strong>
                              <p class="text-muted text-uppercase">
                                <?php echo "$data[jabatan]";?>
                              </p>
                              <hr>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>

                      <form action="<?php echo "$i[url]"."scanqrcode"; ?>" id="frmSoal" method='POST'> 
                      </form>

                    <?php } ?>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
      <?php include "admin-footer.php"; ?>
