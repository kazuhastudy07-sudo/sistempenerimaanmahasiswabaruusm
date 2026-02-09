<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";

$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id_user='$id'"));

?>


<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'];?>">
<h1><center><i class="fa fa-warning"></i></center></h1>
<center><h4>Apa anda yakin akan menghapus data ini?</h4>
	
	<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_user']); echo $id; ?></a>
	<p>Data akan dihapus secara permanen dari database aplikasi!</p></center>