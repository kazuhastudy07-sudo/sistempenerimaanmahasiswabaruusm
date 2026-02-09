
<?php 
session_start();
require "assets/config/koneksi.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Konfirmasi kata sandi tidak cocok!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email yang anda masukan sudah ada";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, password, code, status)
        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Kode OTP Verifikasi Email";
            $message = "Kode OTP verifikasi Anda adalah $code";
            $sender = "From:hadisaputra.bambang@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Kami telah mengirimkan kode OTP verifikasi ke email Anda";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: userotp');
                exit();
            }else{
                $errors['otp-error'] = "Gagal saat mengirim kode!";
            }
        }else{
            $errors['db-error'] = "Gagal saat memasukkan data ke database!";
        }
    }

}
    //if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM users WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: user');
            exit();
        }else{
            $errors['otp-error'] = "Gagal saat memperbarui kode!";
        }
    }else{
        $errors['otp-error'] = "Anda memasukkan kode yang salah!";
    }
}

    //if user click login button
if(isset($_POST['login'])){
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
        $errors['email'] = "Email atau sandi salah!";
    }
}else{
    $errors['email'] = "Sepertinya anda belum terdaftar! klik tombol <a href='dashboard/daftar'>Daftar Sekarang</a> untuk mendaftar!";
}
}

    //if user click continue button in forgot password form
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Kode OTP Reset Kata Sandi";
            $message = "Kode OTP pengaturan ulang kata sandi Anda adalah $code";
            $sender = "From:hadisaputra.bambang@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Kami telah mengirimkan Kode OTP reset password ke email Anda - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: resetcode');
                exit();
            }else{
                $errors['otp-error'] = "Gagal saat mengirim kode!";
            }
        }else{
            $errors['db-error'] = "Ada yang salah!";
        }
    }else{
        $errors['email'] = "Alamat email ini tidak ada!";
    }
}

    //if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM users WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Harap buat sandi baru yang tidak Anda gunakan di situs lain mana pun.";
        $_SESSION['info'] = $info;
        header('location: newpassword');
        exit();
    }else{
        $errors['otp-error'] = "Anda memasukkan kode yang salah!";
    }
}

    //if user click change password button
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Konfirmasi Password Baru Tidak Cocok!";
    }else{
        $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Kata sandi Anda berubah. Silahkan masuk kembali dengan kata sandi baru anda.";
                $_SESSION['info'] = $info;
                header('Location: passwordchanged');
            }else{
                $errors['db-error'] = "Gagal mengubah kata sandi Anda!";
            }
        }
    }


    //if user click change password button
    if(isset($_POST['changepassword'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Konfirmasi Password Baru Tidak Cocok!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Kata sandi Anda berubah. Sekarang Anda dapat masuk dengan kata sandi baru Anda.";
                $_SESSION['info'] = $info;
                header('Location: ../passwordchanged');
            }else{
                $errors['db-error'] = "Gagal mengubah kata sandi Anda!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login');
    }

    $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas 
      INNER JOIN provinces ON identitas.id_prov = provinces.id_prov
      INNER JOIN regencies ON identitas.id_kab = regencies.id_kab
      INNER JOIN districts ON identitas.id_kec = districts.id_kec  
      INNER JOIN villages ON identitas.id_kel = villages.id_kel  LIMIT 1"));  
    $aplikasi = $i["aplikasi"]; 
    $kampus = $i["nama"]; 
    $logo = $i["logo"]; 
    $tw = $i["tw"]; 
    $fb = $i["fb"]; 
    $ig = $i["ig"]; 
    $wa = $i["wa"]; 
    $hp = $i["hp"]; 
    $email = $i["email"]; 
    $alamat = $i["alamat"]; 
    $provinsi = $i["nama_provinsi"]; 
    $kabupaten = $i["nama_kabupaten"]; 
    $kecamatan = $i["nama_kecamatan"]; 
    $kelurahan = $i["nama_kelurahan"]; 
    $hp = $i["hp"]; 
    $jam = $i["jam"]; 
    $url = $i["url"]; 

    $ikl = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM iklan WHERE id_iklan='1'")); 
    $i1 = $ikl["gambar_iklan"];
    $i1judul = $ikl["judul_iklan"];
    $ikl = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM iklan WHERE id_iklan='2'")); 
    $i2 = $ikl["gambar_iklan"];  
    $i2ji = $ikl["judul_iklan"];  
    $ikl = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM iklan WHERE id_iklan='3'")); 
    $i3 = $ikl["gambar_iklan"];
    $i32 = $ikl["gambar_iklan2"];
    $i3nama = $ikl["judul_iklan"];
    $ikl_query = mysqli_query($con, "SELECT * FROM iklan WHERE id_iklan='4'");
    $ikl = mysqli_fetch_array($ikl_query);

    // Cek apakah data ditemukan
    if ($ikl) {
    $i4 = $ikl["gambar_iklan"];
    } else {
    $i4 = "default.jpg"; // Atau berikan nilai default/kosong agar tidak error
    }
    
    $link1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='1'"));  
    $url_link1 = $link1["url_link"];  
    $nama_link1 = $link1["nama_link"];  
    $link2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='2'"));  
    $url_link2 = $link2["url_link"];  
    $nama_link2 = $link2["nama_link"];   
    $link3 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='3'"));  
    $url_link3 = $link3["url_link"];  
    $nama_link3 = $link3["nama_link"];   
    $link4 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM link_terkait WHERE id_link ='4'"));  
    $url_link4 = $link4["url_link"];  
    $nama_link4 = $link4["nama_link"];  
    ?>