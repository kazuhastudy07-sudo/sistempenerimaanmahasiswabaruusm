<?php require_once "controllerUserData.php"; ?><?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login');
}
?>
<?php $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="no-cache"> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$iden[logo]";?>">
  <title><?php echo "$iden[aplikasi]";?></title>
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/dist/css/style.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page" style="background: -webkit-linear-gradient(left, #fff, #28166f);">
  <div class="login-box">
    <div class="login-logo">
      <a type="button" onclick="<?php echo "$iden[url]";?>'" style="color:#ffffff;">
        <img src="assets/dist/img/logo/<?php echo "$iden[logo]";?>" width=70><br>
        <b><?php echo "$iden[aplikasi]";?></b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card shadow">
        <div class="card-body login-card-body" style="border-radius: 10px;">
         <h2 class="text-center">Verifikasi Kode OTP</h2>
         <p class="text-center">Silahkan lengkapi form di bawah ini!<br>Lihat kode OTP yang ada di email anda.</p>

         <form action="resetcode" method="post" autocomplete="" class="form-horizontal" role="form">
          <?php 
          if(isset($_SESSION['info'])){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>
                <?php echo $_SESSION['info']; ?>
              </strong>
            </div>
            <?php
          }
          ?>
          <?php
          if(count($errors) > 0){
            ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>
                <?php
                foreach($errors as $showerror){
                  echo $showerror;
                }
                ?>
              </strong>
            </div>
            <?php
          }
          ?>
          <div class="form-group">
            <input class="form-control" type="number" name="otp" placeholder="Tuliskan Kode OTP" required>
          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <center>
               <button style="border-radius: 20px;border: 2px solid #EFE4E4;width: 100%;" class="btn btn-sm bg-primary" name="check-reset-otp"><i class="fa fa-send faa-tada animated-hover"></i> Kirim</button> 
             </center>
           </div> 
           <div class="col-sm-6 col-md-6">
            <center>
              <a style="border-radius: 20px;border: 2px solid #EFE4E4;width: 100%;" onclick="window.location.href='login'" class="btn btn-sm bg-red"><i class="fa fa-close faa-tada animated-hover"></i> Batal</a>
            </center>
          </div>
        </div>
      </form>

      <footer>
        <center>
          <hr>
          <p style="font-size: 10px;"> <b>
            Copyright <i class="fa fa-copyright"></i> 2020 - <?php echo date("Y");?><br> Aplikasi <?php echo "$iden[nama]";?><br>powered by <a type="button" class="badge bg-danger" target="blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1>'">LOKON ID</a></b>
          </p>
        </center>    
      </footer>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Menampilkan Data Tooltip -->
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        icon: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        icon: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        icon: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        icon: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>
</body>
</html>
