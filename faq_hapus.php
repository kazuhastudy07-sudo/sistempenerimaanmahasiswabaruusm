<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";

$id = $_POST['id_faq']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM faq WHERE id_faq='$id'"));

?>


<input type="hidden" class="form-control" name="id_faq" value="<?php echo $row['id_faq'];?>">
<h1><center><i class="fa  fa-question-circle"></i></center></h1>
<center><h4>Apa anda yakin akan menghapus data ini?</h4>
	<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_faq']); echo $id; ?></a>
	<p>Data akan dihapus secara permanen dari database aplikasi!</p>
</center>