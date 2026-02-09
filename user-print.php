<?php include "user-header.php"; ?>
<?php include "user-menu.php"; ?>
<div class="container">
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">DATA PEGAWAI</h1>
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

  <!-- Main content -->
  <section class="content">

    <?php
    $data=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users 
      INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk
      INNER JOIN agama ON users.id_agm = agama.id_agm
      INNER JOIN provinces ON users.id_prov = provinces.id_prov
      INNER JOIN regencies ON users.id_kab = regencies.id_kab
      INNER JOIN districts ON users.id_kec = districts.id_kec  
      INNER JOIN villages ON users.id_kel = villages.id_kel 
      INNER JOIN status_pegawai ON users.id_sp = status_pegawai.id_sp 
      INNER JOIN status_pangkat ON users.id_p = status_pangkat.id_p 
      INNER JOIN status_bidang ON users.id_bidang = status_bidang.id_bidang 
      WHERE id_user ='$_GET[id]'"));
    $pangkat=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM status_pangkat
      WHERE id_user ='$_GET[id]'"));
    $tgl_lhr = date("Y-m-d", strtotime($data['tgl_lhr']));
    $tgl = date("/m/Y", strtotime($data['tgl']));
    $id = $data['id'];
    $ids = sprintf("%07s", $id);function tanggal_indo($tanggal, $cetak_hari = false)
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

    ?>
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b><i class="fa fa-user"></i> Form Detail Data Pegawai</b></h3>
        <div class="card-tools"> 
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">


            <div class="row">

              <div class="col-md-4">
                <div class="card card-red card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">


                      <a href="#" class="btn bg-red btn-block"><b>PROFIL PEGAWAI</b></a>
                      <br>
                      <img class="profile-user-img img-fluid img-rounded"
                      style="width: 157px;" src="../assets/dist/img/user/<?php echo "$data[gambar]";?>"
                      alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo "$data[name]";?></h3>

                    <p class="text-muted text-center">NIP. <?php echo "$data[nip]";?></p>

                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item"><?php echo "$data[no_kartu]";?></b> <a class="float-right"> No.Kartu <i class="fa  fa-credit-card"></i></a>
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
                      <a href="#" class="btn bg-red btn-block"><b>QRcode</b></a>
                      <br>
                      <img class="profile-user-img img-fluid img-rounded"
                      style="width: 200px; "  src="../assets/dist/img/qrcode/<?php echo "$data[qrcode]";?>"
                      alt="User profile picture">
                      <br>
                      NO REG: <?php echo "$data[otentikasi]";?><?php echo $tgl;?>
                    </div>
                    <hr>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <!-- About Me Box -->
                <div class="card card-red">
                  <div class="card-header">
                    <h3 class="card-title">RINCIAN DATA PEGAWAI</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong>NIK</strong>
                    <p class="text-muted"><?php echo "$data[nik]";?></p>
                    <hr>
                    <strong>NIP</strong>
                    <p class="text-muted"><?php echo "$data[nip]";?></p>
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
                    <strong>Status Pegawai</strong>
                    <p class="text-muted text-uppercase">
                      <?php echo "$data[nama_sp]";?>
                    </p>
                    <hr>
                    <strong>Golongan/Pangkat</strong>
                    <p class="text-muted text-uppercase">
                      <?php echo "$data[nama_pangkat]";?>
                    </p>
                    <hr>
                    <strong>Bidang</strong>
                    <p class="text-muted text-uppercase">
                      <?php echo "$data[nama_bidang]";?>
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

          </div> <!-- tutup card body -->

          <div class="card-footer">
            <div class="row">
              <div class="col-sm-10 btn-xs-10">
                <i class="fa fa-info-circle"></i> Anda dapat mencetak halaman ini dengan cara klik tombol print pada bagian atas!
              </div>

              <div class="col-sm-2 pull-right">
                <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="window.location.href='user'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
    <?php include "user-footer.php"; ?>
    <script type="text/javascript"> 
      window.addEventListener("load", window.print());
    </script>
    <script type="text/javascript">
      setTimeout(
        function(){
          window.location = "user"
        },
        1000); // waktu tunggu atau delay
      </script>