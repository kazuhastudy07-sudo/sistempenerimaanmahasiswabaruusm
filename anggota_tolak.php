<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";

$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
	INNER JOIN provinces ON users.id_prov = provinces.id_prov
	INNER JOIN regencies ON users.id_kab = regencies.id_kab
	INNER JOIN districts ON users.id_kec = districts.id_kec  
	INNER JOIN villages ON users.id_kel = villages.id_kel 
	INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
	INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan 
	WHERE id_user='$id'"));

	?>


	<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'];?>">
	<h1><center><i class="fa  fa-question-circle"></i></center></h1>
	<center><h4>Apa anda yakin akan menolak data ini?</h4>
		
		<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_user']); echo $id; ?></a>
		<p>Data yang ditolak akan dihapus secara permanen dari database aplikasi!</p></center>