
<?php 
session_start(); 
require "assets/config/koneksi.php";
$iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APLIKASI <?php echo "$iden[aplikasi]"; ?></title>
  <link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$iden[logo]";?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/dist/css/style.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  <!-- SweetAlert2 -->
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="assets/dist/js/jquery-2.2.1.min.js"></script>
  <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link href="assets/dist/fontcss/bungakuy.css" rel="stylesheet">


</head>
<body class="hold-transition lockscreen" style="background: <?php echo "$iden[bg]";?>;margin-top: -50px;">
  <?php
  if(isset($_GET['alert'])){
    if($_GET['alert']=="gagal"){

      ?>
      <script type="text/javascript">
        $(function() {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
          });

          Swal.fire({
            icon: 'error',
            showConfirmButton: true,
            timerProgressBar: true,
            title: 'GAGAL!',
            text: 'Password yang Anda masukan salah...',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          }).then(function() {
            window.location = "./lock";
          });
        });
      </script>
      <?php 
    }       
  }
  ?>
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <h1>
        <i class="fa fa-tv"></i>
        Kunci Layar Kerja
      </h1>
      <img src="assets/dist/img/logo/<?php echo "$iden[logo]";?>" width=80><br/>
      <p href="" class="ketikan"><b>APLIKASI <?php echo "$iden[aplikasi]";?></b></p>
    </div>
    <!-- User name -->
    <div class="lockscreen-name"><?php echo "$_SESSION[b]";?>
  </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="assets/dist/img/user/<?php echo "$_SESSION[a]";?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="ceklogin" method="post" class="lockscreen-credentials">
      <div class="input-group">
        <input type="hidden" class="form-control" placeholder="Masukan Username" name="email" value="<?php echo "$_SESSION[c]";?>">
        <input type="password" class="form-control" placeholder="Masukan Password" name="password">
        <div class="input-group-append">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <i>Silahkan klik tanda panah atau tekan tombol <b>ENTER</b> pada keyboard anda, untuk masuk dalam aplikasi...</i>
  </div>
  <div class="text-center"><br>
    <a href="login" class="btn btn-sm btn-danger"> <i class="fa fa-sign-in"></i> Login Dengan User Baru</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; <?php echo date("Y");?> Aplikasi <?php echo "$iden[aplikasi]"; ?><br><a type="button" class="badge bg-navy" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'">powered by <?php echo "$iden[dev]"; ?></a></b>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
