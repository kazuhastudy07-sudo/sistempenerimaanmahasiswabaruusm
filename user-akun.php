<?php require_once "../controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    if($status == "verified"){
      if($code != 0){
        header('Location: reset-code.php');
      }
    }else{
      header('Location: user-otp.php');
    }
  }
}else{
  header('Location: login-user.php');
}
?>

<?php require_once "user-header.php"; ?>
<?php require_once "user-menu.php"; ?>
<div class="container" style="margin-top: 70px;">

  <div class="card-body">
    <div class="callout callout-info">
      <div class="col-md-12">

        <h3 class="panel-title text-bold"><i class="fa fa-info-circle"></i> INFORMASI AKUN</h3>
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header <?php echo "$iden[color]";?>">
            <h3 class="widget-user-username"><?php echo $fetch_info['name'] ?></h3>
            <h5 class="widget-user-desc">Akun Registrasi</h5>
          </div>
          <div class="widget-user-image">
           <!--  <img class="img-circle elevation-2" src="../assets/dist/img/user.png" alt="User Avatar"> -->
           <img style="width: 80px; object-fit: cover;overflow: hidden;" src="../assets/dist/img/user/<?php if (trim($fetch_info['gambar']) == ''){ echo "user.png"; }else{ echo $fetch_info['gambar']; } ?>" class="img-rounded" alt="User Image">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header"><?php echo $fetch_info['email'] ?></h5>
                  <span class="description-text">Email</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">User</h5>
                  <span class="description-text">Level</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header"><?php  $idku = encrypt_decrypt('encrypt',$fetch_info[id_user]);  echo $idku ?></h5>
                  <span class="description-text">ID USER</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
        Data informasi akun yang tampil adalah data akun saat registrasi...
      </div>
    </div>
  </div>
</div>

<footer class="main-footer small <?php echo "$iden[color]"; ?>">
  <strong>Copyright &copy; <?php echo date("Y"); ?>. <a href="./" class="text-white">Aplikasi <?php echo $iden['nama'];?></a></strong>
  <div class="float-right d-none d-sm-inline-block">
    <b>Version 2021 | powered by <a type="button" onclick="window.location.href='https://www.youtube.com/channel/UCh3zMcSY8-XpetX_Zq29e_w?view_as=subscriber?sub_confirmation=1'" href="" class="badge bg-white" target="_blank"  data-toggle="tooltip" data-placement="bottom" title="Klik Developer"><i class="fa fa-heartbeat faa-pulse animated"></i> <?php echo "$iden[dev]"; ?></b></a>
  </div>
</footer>
<?php require_once "user-footer.php"; ?>