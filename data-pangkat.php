<?php
	include("../assets/config/koneksi.php");  
	switch ($_GET['jenis']) {

		//ambil data pangkat
		case 'pangkat':
		$id_fak = $_POST['id_fak'];
		if($id_fak == ''){
		     exit;
		}else{
		     $getp = mysqli_query($con,"SELECT  * FROM prodi WHERE id_fak ='$id_fak' ORDER BY nama_pro ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($getp)){
		          echo '<option value="'.$data['id_pro'].'">'.$data['nama_pro'].''.' | Akreditasi '.''.$data['akreditas'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>
 