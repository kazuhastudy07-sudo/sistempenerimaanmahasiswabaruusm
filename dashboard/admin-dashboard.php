<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
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
          text: 'Anda Berhasil Masuk Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "./";
        });
      });
    </script>
    <?php 
  }elseif ($_GET['alert']=="keluar") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Anda Berhasil Keluar Aplikasi',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "../logout";
        });
      });
    </script>
    <?php
  }   
  elseif ($_GET['alert']=="reset") {
    ?>
    <script type="text/javascript">
      $(function() {

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Anda Berhasil Mengubah Password, Silahkan Login Kembali',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "../logout";
        });
      });
    </script>
    <?php
  }           
  elseif ($_GET['alert']=="profil") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Anda Berhasil Merubah Photo Profil',
          footer: 'APLIKASI KARPEG <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "./";
        });
      });
    </script>
    <?php
  }           
}
?>

<?php 
$a= mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND id_jeniskeanggotaan ='1'")); 
$b= mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND id_jeniskeanggotaan ='2'")); 
$c= mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND id_jeniskeanggotaan ='3'")); 
$d= mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND id_jeniskeanggotaan ='4'"));  
$e= mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND id_jeniskeanggotaan ='5'")); 

?>  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- <button id="goFS">Go fullscreen</button>
    <script>
      var goFS = document.getElementById("goFS");
      goFS.addEventListener("click", function() {
        document.body.requestFullscreen();
      }, false);
    </script>
    <a href="" onclick="window.history.go(-1);">exit</a> -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a type="button" onclick="window.location.href='./'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col --> 
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-12" type="button" onclick="window.open('./daftar', '_blank');">
                <div class="info-box">
                  <span class="info-box-icon bg-primary"><i class="fa fa-user-plus faa-tada animated-hover"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Tambah Data</span>
                    <span class="info-box-number">PMB</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12" type="button" onclick="window.location.href='pmbjalurpmdk'">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="fa fa-list-ol faa-tada animated-hover"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Lihat Data</span>
                    <span class="info-box-number">PMB</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12" type="button" onclick="window.location.href='identitas'">
                <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="fa fa-flag faa-tada animated-hover"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Identitas</span>
                    <span class="info-box-number">Aplikasi</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-12" type="button" onclick="window.location.href='fakultas'">
                <div class="info-box">
                  <span class="info-box-icon bg-warning"><i class="fa fa-sitemap faa-tada animated-hover"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Data Fakultas</span>
                    <span class="info-box-number">PMB</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <div class="position-relative">
              <img src="../assets/dist/img/bg/<?php echo "$iden[ribbon]"; ?>" alt="ribbon" class="img-fluid img-thumbnail"  style="width: 100%">
              <div class="ribbon-wrapper ribbon-xl">
                <div class="ribbon <?php echo "$iden[color]"; ?> text-sm">
                  <small><?php echo "$iden[aplikasi]"; ?></small>
                </div>
              </div> 
            </div>

            <!-- /.row -->

            <br>
            <!-- Info boxes -->
            <div class="row">
              <div class="col-lg-8">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 class="card-title">
                      <i class="fas fa-chart-bar mr-1"></i>
                      Grafik Jumlah Data <?php echo "$aplikasi"; ?>
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                   <div class="container">
                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                     <script src="https://code.highcharts.com/highcharts.js"></script>
                     <script src="https://code.highcharts.com/modules/exporting.js"></script>
                     <script src="https://code.highcharts.com/modules/export-data.js"></script>


                     <?php
                     $tahun=date("Y");
                     $total = mysqli_query($con,"SELECT count(*) as jum FROM users where YEAR(tgl)='$tahun' AND id_gel ='1' AND id_level='3' AND status = 'verified'");
                     $data = mysqli_fetch_row($total);
                     $totalall = $data[0];

                     $hasil1 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_gel ='1' AND status_pmb = '1'");
                     $data1 = mysqli_fetch_row($hasil1);
                     $jumlah1 = $data1[0];


                     $hasil2 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_gel ='2' AND status_pmb = '1'");
                     $data2 = mysqli_fetch_row($hasil2);
                     $jumlah2 = $data2[0];


                     $hasil3 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_gel ='3' AND status_pmb = '1'");
                     $data3 = mysqli_fetch_row($hasil3);
                     $jumlah3 = $data3[0];


                     ?>

                     <div class="container">

                      <form method="post">
                       <div class="form-group">
                         <div id="container"></div>
                       </div>
                     </form>

                   </div>


                   <script>
                    Highcharts.chart('container', {

                      chart: {
                        type: 'column'
                      },

                      title: {
                        text: 'Grafik Data PMB'
                      },
                      subtitle: {
                        text: 'Total Jumlah Pendaftaran Pergelombang dan Jalur'
                      },

                      xAxis: {
                        categories: ['Jalur PMDK', 'Gelombang 1', 'Gelombang 2']
                      },
                      yAxis: {
                        allowDecimals: false,
                        title: {
                          text: 'Jumlah Pendaftaran'
                        }
                      },
                      tooltip: {
                       pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
                       shared: true
                     },

                     plotOptions: {
                      column: {
                        stacking: 'normal'
                      }
                    },

                    series: [{
                      name: 'Jumlah Data ',
                      data: [<?php echo $jumlah1; ?>, <?php echo $jumlah2; ?>, <?php echo $jumlah3; ?>],
                    },]
                  });
                </script>
                <small><i class="fa fa-info-circle"></i> Data yang kami tampilkan adalah data pendaftar yang sudah terverifikasi!</small>
              </div>
            </div>

          </div>
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Hosting Murah + Gratis Domain...</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
              </button>
            </div>
          </div>
          <div class="card-body">


            <form method="post">
             <div class="form-group">
               <div id="containerr"></div>
             </div>
           </form>
           <?php
           $rp1 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='1' AND status_pmb = '1'");
           $rpj1 = mysqli_fetch_row($rp1);
           $pro1 = $rpj1[0];
        
           $rp2 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='2' AND status_pmb = '1'");
           $rpj2 = mysqli_fetch_row($rp2);
           $pro2 = $rpj2[0];

           $rp3 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='3' AND status_pmb = '1'");
           $rpj3 = mysqli_fetch_row($rp3);
           $pro3 = $rpj3[0];

           $rp4 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='4' AND status_pmb = '1'");
           $rpj4 = mysqli_fetch_row($rp4);
           $pro4 = $rpj4[0];

           $rp5 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='5' AND status_pmb = '1'");
           $rpj5 = mysqli_fetch_row($rp5);
           $pro5 = $rpj5[0];

           $rp6 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='6' AND status_pmb = '1'");
           $rpj6 = mysqli_fetch_row($rp6);
           $pro6 = $rpj6[0];

           $rp7 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='7' AND status_pmb = '1'");
           $rpj7 = mysqli_fetch_row($rp7);
           $pro7 = $rpj7[0];

           $rp8 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='8' AND status_pmb = '1'");
           $rpj8 = mysqli_fetch_row($rp8);
           $pro8 = $rpj8[0];

           $rp9 = mysqli_query($con,"SELECT count(*) as jum FROM users WHERE id_pro ='9' AND status_pmb = '1'");
           $rpj9 = mysqli_fetch_row($rp9);
           $pro9 = $rpj9[0];

           ?>
           <script>
            Highcharts.chart('containerr', {

              chart: {
                type: 'column'
              },

              title: {
                text: 'Grafik Data PMB'
              },
              subtitle: {
                text: 'Total Jumlah Pendaftaran Berdasarkan Program Studi'
              },

              xAxis: {
                categories: ['Teknik Elektro', 'Teknik Sipil', 'Teknik Arsitektur', 'Ekonomi Manajemen', 'Ekonomi Pembangunan', 'Ekonomi Akuntansi', 'Administrasi Publik', 'Ilmu Hukum', 'Peternakan']
              },
              yAxis: {
                allowDecimals: false,
                title: {
                  text: 'Jumlah Pendaftaran'
                }
              },
              tooltip: {
               pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> <br/>',
               shared: true
             },

             plotOptions: {
              column: {
                stacking: 'normal'
              }
            },

            series: [{
              name: 'Jumlah Data ',
              data: [<?php echo $pro1; ?>, <?php echo $pro2; ?>, <?php echo $pro3; ?>, <?php echo $pro4; ?>, <?php echo $pro5; ?>, <?php echo $pro6; ?>, <?php echo $pro7; ?>, <?php echo $pro8; ?>, <?php echo $pro9; ?>],
            },]
          });
        </script>
        <small><i class="fa fa-info-circle"></i> Data yang kami tampilkan adalah data pendaftar yang sudah terverifikasi!</small>

      </div>
    </div>
  </div>
  <div  class="col-lg-4">
    <div class="row">
      <!-- ./col -->
      <div class="col-lg-12">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php $data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND status='verified'")); echo "$data"; ?><sup style="font-size: 20px">orang</sup> </h3>

            <p><?php echo "$aplikasi"; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a  class="small-box-footer"><i class="fa fa-edit"></i> Total PMB Semua Gelombang</a>
        </div>
      </div>
      <div class="col-lg-12">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php $data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND status='verified' AND status_pmb ='1'")); echo "$data"; ?><sup style="font-size: 20px">orang</sup> </h3>

            <p><?php echo "$aplikasi"; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a  class="small-box-footer"><i class="fa fa-check-circle"></i> PMB Teverifikasi Semua Gelombang</a>
        </div>
      </div>
    </div>
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Statistik Pengunjung Web</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body bg-dark">
        <?php
        $ip      = $_SERVER['REMOTE_ADDR']; 
        $tanggal = date("Ymd");
        $waktu   = time(); 


        $s = mysqli_query($con, "SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
        if(mysqli_num_rows($s) == 0){
          mysqli_query($con, "INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip', '$tanggal', '1', '$waktu')");
        }
        else{
          mysqli_query($con, "UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
        }

        $query1     = mysqli_query($con, "SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip");
        $pengunjung = mysqli_num_rows($query1);

        $query2        = mysqli_query($con, "SELECT COUNT(hits) as total FROM statistik");
        $hasil2        = mysqli_fetch_array($query2);
        $totpengunjung = $hasil2['total'];

        $query3 = mysqli_query($con, "SELECT SUM(hits) as jumlah FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal");
        $hasil3 = mysqli_fetch_array($query3);
        $hits   = $hasil3['jumlah'];

        $query4  = mysqli_query($con, "SELECT SUM(hits) as total FROM statistik");
        $hasil4  = mysqli_fetch_array($query4);
        $tothits = $hasil4['total'];  

        $bataswaktu       = time() - 300; 
        $pengunjungonline = mysqli_num_rows(mysqli_query($con, "SELECT * FROM statistik WHERE online > '$bataswaktu'"));


        $folder = "../assets/dist/img/counter"; 
        $ext    = ".png";    

        $totpengunjunggbr = sprintf("%06d", $totpengunjung);
        for ($i = 0; $i <= 9; $i++){
          $totpengunjunggbr = str_replace($i, "<img src=\"$folder/$i$ext\" alt=\"$i\">", $totpengunjunggbr);
        } 
        ?> 



        <div class=" table-responsive">

          <table class="table table-striped">
            <tr rowspan="4"><center><?php echo $totpengunjunggbr ?></center><br></tr>
            <tr>
              <td ><i class="fa fa-user"></i></td>
              <td >Pengunjung Hari Ini</td>
              <td>:</td>
              <td><b><?php echo $pengunjung ?></b></td>
            </tr>
            <tr>
              <td><i class="fa fa-users"></i></td>
              <td>Total Pengunjung</td>
              <td>:</td>
              <td><b><?php echo $totpengunjung ?></b></td>
            </tr>
            <tr>
              <td><i class="fa fa-line-chart"></i></td>
              <td>Hits Hari Ini</td>
              <td>:</td>
              <td><b><?php echo $hits ?></b></td>
            </tr>
            <tr>
              <td><i class="fa fa-bar-chart"></i></td>
              <td>Total Hits</td>
              <td>:</td>
              <td><b><?php echo $tothits ?></b></td>
            </tr>
            <tr>
              <td><i class="fa fa-dot-circle-o"></i></td>
              <td>Pengunjung Online</td>
              <td>:</td>
              <td><b><?php echo $pengunjungonline ?></b></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</section>

<?php include "admin-footer.php"; ?>
