<?php 
require "assets/config/koneksi.php";

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$check_email = "SELECT * FROM users WHERE email = '$email'";
$res = mysqli_query($con, $check_email);
if(mysqli_num_rows($res) > 0){
  $fetch = mysqli_fetch_assoc($res);
  $fetch_pass = $fetch['password'];
  if(password_verify($password, $fetch_pass)){  
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $status = $fetch['status'];
    $idl = $fetch['id_level'];
    if($status == "verified" && $idl == "3"){
      $_SESSION['email'] = $email;
      header('location: dashboard/user?alert=berhasil');
    } else if($status == "verified" && $idl == "1"){
      $_SESSION['email'] = $email;
      header('location: dashboard/?alert=berhasil');
    }else if($status == "verified" && $idl == "2"){
      $_SESSION['email'] = $email;
      header('location: dashboard/?alert=berhasil');
    }else{
      $info = "Sepertinya Anda belum memverifikasi email Anda - $email";
      $_SESSION['info'] = $info;
      header('location: userotp');
    }
  }else{
      header('location: ./lock?alert=gagal');
  }
}

?>