<?php
session_start();
include "../assets/config/koneksi.php";

$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users  WHERE id_user='$id'"));

?>
<center>
  <h2>Ganti Password?</h2>
  <img style="width: 80px; object-fit: cover;overflow: hidden;" src="../assets/dist/img/user/<?php if (trim($row['gambar']) == ''){ echo "user.png"; }else{ echo $row['gambar']; } ?>" class="img-rounded elevation-2" alt="User Image">
  <hr>
  <h1><?php echo $row['name']; ?></h1>
  <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
  <input type="text" placeholder="Tuliskan Password Baru" class="form-control" name="hp" >
</center>