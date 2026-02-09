<?php
	include("../assets/config/koneksi.php");  
	switch ($_GET['jenis']) {

		//ambil data pangkat
		case 'pangkat':
		$id_sp = $_POST['id_sp'];
		if($id_sp == ''){
		     exit;
		}else{
		     $getp = mysqli_query($con,"SELECT  * FROM status_pangkat WHERE id_sp ='$id_sp' ORDER BY nama_pangkat ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($getp)){
		          echo '<option value="'.$data['id_p'].'">'.$data['nama_pangkat'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>
 