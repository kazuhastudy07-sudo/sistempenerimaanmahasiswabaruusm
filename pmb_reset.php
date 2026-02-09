<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";

$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users 
	WHERE id_user='$id'"));

	?>
	<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'];?>">
	<center>
		<h4>Apa anda yakin akan melakukan reset password?</h4>
		<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_user']); echo $id; ?></a>
		<br/>
		<label class="badge bg-info"><?php echo $row['email'];?></label>
	</center>
	<label>Password Baru</label>
	<input type="text" class="form-control" name="password" value="123456">
	<p>Fitur ini dapat digunakan jika user tidak memiliki akses ke alamat email aktif!</p>
