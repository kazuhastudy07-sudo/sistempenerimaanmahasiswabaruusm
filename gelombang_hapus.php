<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";

$id = $_POST['id_gelombang']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM gelombang WHERE id_gelombang='$id'"));

?>


<input type="hidden" class="form-control" name="id_gelombang" value="<?php echo $row['id_gelombang'];?>">
<h1><center><i class="fa fa-warning"></i></center></h1>
<center><h4>Apa anda yakin akan menghapus data ini?</h4>
	<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_gelombang']); echo $id; ?></a>
	<p>Data akan dihapus secara permanen dari database aplikasi!</p>
</center>