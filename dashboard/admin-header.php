<?php
require_once "../controllerUserData.php";
error_reporting(1);
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $idl= $fetch_info['id_level'];
    $code = $fetch_info['code'];
    if($status == "verified" && $idl == "1"){
      if($code != 0){
        header('Location: ../resetcode');
      }
    }
    else if($status == "verified" && $idl == "2"){
      if($code != 0){
        header('Location: ../resetcode');
      }
    }
    else{
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php 
  require_once "../assets/controller/openssl.php";
  $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); $title=$iden[aplikasi]; $logo=$iden[logo]; ?>
  <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$logo";?>">
  <title>APLIKASI <?php echo "$title";?> </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!-- Bar Progress -->
  <link rel="stylesheet" href="../assets/plugins/pace-progress/themes/white/pace-theme-flash.css">
  <script src="../assets/plugins/pace-progress/pace.min.js"></script>
  <!-- Data Table -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css"/>
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <script src="../assets/dist/js/jquery-2.2.1.min.js"></script>
  <script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="../assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript" src="../assets/chartjs/Chart.js"></script>

  <link href="../assets/dist/fontcss/bungakuy.css" rel="stylesheet">
  <!--  <script type="text/javascript">-->
  <!--  window.history.forward();-->
  <!--  function noBack() {-->
  <!--    window.history.forward();-->
  <!--  }-->
  <!--</script>-->
  <script src="http://code.highcharts.com/highcharts-3d.js"></script>

</head>
<body  class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed pace-white">
  <div class="wrapper">

    