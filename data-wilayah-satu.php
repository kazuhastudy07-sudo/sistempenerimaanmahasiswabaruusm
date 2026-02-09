<?php
	include("assets/config/koneksi.php");  
	switch ($_GET['jenis']) {
		//ambil data kota / kabupaten
		case 'kota':
		$id_prov = $_POST['id_prov'];
		if($id_prov == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM regencies WHERE id_prov ='$id_prov' ORDER BY nama_kabupaten ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data['id_kab'].'">'.$data['nama_kabupaten'].'</option>';
		     }
		     exit;    
		}
		break;

		//ambil data kecamatan
		case 'kecamatan':
		$id_kab = $_POST['id_kab'];
		if($id_kab == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM districts WHERE id_kab ='$id_kab' ORDER BY nama_kecamatan ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data['id_kec'].'">'.$data['nama_kecamatan'].'</option>';
		     }
		     exit;    
		}
		break;
		

		//ambil data kelurahan
		case 'kelurahan':
		$id_kec = $_POST['id_kec'];
		if($id_kec == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM villages WHERE id_kec ='$id_kec' ORDER BY nama_kelurahan ASC") or die ('Query Gagal');
		     while($data = mysqli_fetch_array($getcity)){
		          echo '<option value="'.$data['id_kel'].'">'.$data['nama_kelurahan'].'</option>';
		     }
		     exit;    
		}
		break;
		
	}
?>
 