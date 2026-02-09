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
                  <h3 class='box-title'><i class='fa fa-list-ol'></i> <b>Hasil Ujian Seleksi <?php echo "$aplikasi"; ?></b> </h3>
                </div>

                <div class='box-body'>
                 <?php

                 $pilihan=$_POST["pilihan"];
                 $id_soal=$_POST["id"];
                 $jumlah=$_POST['jumlah'];

                 $score=0;
                 $benar=0;
                 $salah=0;
                 $kosong=0;

                 for ($i=0;$i<$jumlah;$i++){
        //id nomor soal
                  $nomor=$id_soal[$i];

        //jika user tidak memilih jawaban
                  if (empty($pilihan[$nomor])){
                    $kosong++;
                  }else{
          //jawaban dari user
                    $jawaban=$pilihan[$nomor];

          //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($con, "SELECT * FROM tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");

                    $cek=mysqli_num_rows($query);

                    if($cek){
            //jika jawaban cocok (benar)
                      $benar++;
                    }else{
            //jika salah
                      $salah++;
                    }

                  } 
        /*RUMUS
        Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
        hasil= 100 / jumlah soal * jawaban yang benar
        */
        $tgl_sekarang = date("Y-m-d");
        $result=mysqli_query($con, "SELECT * FROM tbl_soal WHERE aktif='Y'");
        $jumlah_soal=mysqli_num_rows($result);
        $score = 100/$jumlah_soal*$benar;
        $hasil = number_format($score,1);
      }
      
    //Lakukan Pengecekan  Data  dalam Database
      $cek=mysqli_num_rows(mysqli_query($con, "SELECT id_users FROM tbl_nilai WHERE id_users ='$fetch_info[id_user]'"));
      if ($cek < 1) {
    //Pemberian kondisi lulus/ Dipertimbangkan
       $qry2=mysqli_query($con, "SELECT nilai_min FROM tbl_pengaturan_ujian");
       $q2=mysqli_fetch_array($qry2);
       $ceknilai= $q2['nilai_min'];
       if ($hasil >= $ceknilai) {
    //Lakukan Penyimpanan Kedalam Database
        $id= ucwords($fetch_info['id_user']);
        mysqli_query($con, "INSERT INTO tbl_nilai (id_users,benar,salah,kosong,score,tanggal,keterangan) Values ('$id','$benar','$salah','$kosong','$hasil','$tgl_sekarang','1')");
      }else {
    //Lakukan Penyimpanan Kedalam Database
        $id= ucwords($fetch_info['id_user']);
        mysqli_query($con, "INSERT INTO tbl_nilai (id_users,benar,salah,kosong,score,tanggal,keterangan) Values ('$id','$benar','$salah','$kosong','$hasil','$tgl_sekarang','0')");
      }
    }
    echo "";?>
    <script type="text/javascript">
      $(function() {

        Swal.fire({
          icon: 'success',
          showConfirmButton: true,
          timerProgressBar: true,
          title: 'Selamat!',
          text: 'Anda Berhasil Menyelesaikan Ujian',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "./hasilujian";
        });
      });
    </script>
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
