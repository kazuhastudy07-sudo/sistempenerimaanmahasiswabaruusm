<?php require_once "../controllerUserData.php";
error_reporting(1);
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $idl = $fetch_info['id_level'];
    $code = $fetch_info['code'];
    if($status == "verified" && $idl == "3"){
      if($code != 0){
        header('Location: ../resetcode');
      }
    }else{
      header('Location: ../userotp');
    }
  }
}else{
  header('Location: ../login');
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="no-cache"> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  require_once "../assets/controller/openssl.php";
  $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
  <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$iden[logo]";?>">
  <title>APLIKASI <?php echo "$iden[aplikasi]";?></title>
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css"/>
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  <!-- Bar Progress -->
  <link rel="stylesheet" href="../assets/plugins/pace-progress/themes/white/pace-theme-flash.css">
  <script src="../assets/plugins/pace-progress/pace.min.js"></script>
  <!-- Select2 -->
  <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  
  <link href="../assets/dist/fontcss/bungakuy.css" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed  layout-footer-fixed  pace-white" style="background-image: url(../assets/dist/img/bg/<?php echo "$iden[bg_img]"; ?>);">

  <div class="wrapper">
