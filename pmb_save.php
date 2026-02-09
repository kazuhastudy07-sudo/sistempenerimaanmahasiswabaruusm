<?php
error_reporting(1);
	include '../assets/config/koneksi.php'; // Mengambil file koneksi ke database

	$cek = mysqli_query($con, "SELECT * FROM users WHERE email = '$_POST[email]' or nik = '$_POST[nik]'");
	$prosescek = mysqli_num_rows($cek);
	date_default_timezone_set('Asia/Jakarta');
	$tgl = date("Y-m-d");
	$waktu = date("G:i:s");
	$status= "verified";
	$gel = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb WHERE id_panitia")); 
	date_default_timezone_set('Asia/Jakarta');

	if ($prosescek > 0) 
	{
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['id_rekomendasi'] = $_POST['id_rekomendasi'];
		$_SESSION['rekomendasi'] = $_POST['rekomendasi'];

		$_SESSION['nisn'] = $_POST['nisn'];
		$_SESSION['nik'] = $_POST['nik'];
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['tmp_lhr'] = $_POST['tmp_lhr'];
		$_SESSION['tgl_lhr'] = $_POST['tgl_lhr'];
		$_SESSION['id_jk'] = $_POST['id_jk'];
		$_SESSION['id_agm'] = $_POST['id_agm'];
		$_SESSION['id_kw'] = $_POST['id_kw'];
		$_SESSION['id_kk'] = $_POST['id_kk'];
		$_SESSION['alamat'] = $_POST['alamat'];
		$_SESSION['id_prov'] = $_POST['id_prov'];
		$_SESSION['id_kab'] = $_POST['id_kab'];
		$_SESSION['id_kec'] = $_POST['id_kec'];
		$_SESSION['id_kel'] = $_POST['id_kel'];
		$_SESSION['sekolah'] = $_POST['sekolah'];
		$_SESSION['id_jurusan'] = $_POST['id_jurusan'];
		$_SESSION['thn_lulus'] = $_POST['thn_lulus'];
		$_SESSION['alamat_sekolah'] = $_POST['alamat_sekolah'];
		$_SESSION['no_ijazah'] = $_POST['no_ijazah'];
		$_SESSION['thn_ijazah'] = $_POST['thn_ijazah'];
		$_SESSION['nilai_rr'] = $_POST['nilai_rr'];
		$_SESSION['id_alm'] = $_POST['id_alm'];
		$_SESSION['prestasi'] = $_POST['prestasi'];
		$_SESSION['hp'] = $_POST['hp'];

		$_SESSION['nik_ayah'] = $_POST['nik_ayah'];
		$_SESSION['nama_ayah'] = $_POST['nama_ayah'];
		$_SESSION['pendidikan_ayah'] = $_POST['pendidikan_ayah'];
		$_SESSION['hp_ayah'] = $_POST['hp_ayah'];
		$_SESSION['pekerjaan_ayah'] = $_POST['pekerjaan_ayah'];
		$_SESSION['jabatan_ayah'] = $_POST['jabatan_ayah'];
		$_SESSION['penghasilan_ayah'] = $_POST['penghasilan_ayah'];
		$_SESSION['penghasilan_ayah_lainya'] = $_POST['penghasilan_ayah_lainya'];
		$_SESSION['kantor_ayah'] = $_POST['kantor_ayah'];
		$_SESSION['alamat_kantor_ayah'] = $_POST['alamat_kantor_ayah'];

		$_SESSION['nik_ibu'] = $_POST['nik_ibu'];
		$_SESSION['nama_ibu'] = $_POST['nama_ibu'];
		$_SESSION['pendidikan_ibu'] = $_POST['pendidikan_ibu'];
		$_SESSION['hp_ibu'] = $_POST['hp_ibu'];
		$_SESSION['pekerjaan_ibu'] = $_POST['pekerjaan_ibu'];
		$_SESSION['jabatan_ibu'] = $_POST['jabatan_ibu'];
		$_SESSION['penghasilan_ibu'] = $_POST['penghasilan_ibu'];
		$_SESSION['penghasilan_ibu_lainya'] = $_POST['penghasilan_ibu_lainya'];
		$_SESSION['kantor_ibu'] = $_POST['kantor_ibu'];
		$_SESSION['alamat_kantor_ibu'] = $_POST['alamat_kantor_ibu'];
		$_SESSION['alamat_ortu'] = $_POST['alamat_ortu'];
		$_SESSION['alasan_ortu'] = $_POST['alasan_ortu'];

		$_SESSION['id_fak'] = $_POST['id_fak'];
		$_SESSION['id_pro'] = $_POST['id_pro'];

		$_SESSION['ktp'] = $_POST['ktp'];
		$_SESSION['kk'] = $_POST['kk'];
		$_SESSION['akta'] = $_POST['akta'];
		$_SESSION['gambar'] = $_POST['gambar'];
		$_SESSION['ijazah'] = $_POST['ijazah'];
		$_SESSION['surat_kerja'] = $_POST['surat_kerja'];
		$_SESSION['piagam'] = $_POST['piagam'];
		header("location:./daftar-step5?alert=gagal");
	}
	else {

		
		$acak = rand(1,9999); 

		$ktp = $_FILES['ktp']['name'];
		$uktp = $acak.$ktp; 
		$movea = move_uploaded_file($_FILES['ktp']['tmp_name'], "../assets/dist/img/ktp/".$uktp);

		$kk = $_FILES['kk']['name'];
		$ukk = $acak.$kk; 
		$moveb = move_uploaded_file($_FILES['kk']['tmp_name'], "../assets/dist/img/kk/".$ukk);

		$akta = $_FILES['akta']['name'];
		$uakta = $acak.$akta; 
		$moveb = move_uploaded_file($_FILES['akta']['tmp_name'], "../assets/dist/img/akta/".$uakta);

		$gambar = $_FILES['gambar']['name'];
		$ugambar = $acak.$gambar;
		$moved = move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/dist/img/user/".$ugambar);

		$ijazah = $_FILES['ijazah']['name'];
		$uijazah = $acak.$ijazah;
		$movee = move_uploaded_file($_FILES['ijazah']['tmp_name'], "../assets/dist/img/ijazah/".$uijazah);

		$surat_kerja = $_FILES['surat_kerja']['name'];
		$usurat_kerja = $acak.$surat_kerja;
		$moved = move_uploaded_file($_FILES['surat_kerja']['tmp_name'], "../assets/dist/img/suratkerja/".$usurat_kerja);

		$piagam = $_FILES['piagam']['name'];
		$upiagam = $acak.$piagam;
		$movef = move_uploaded_file($_FILES['piagam']['tmp_name'], "../assets/dist/img/piagam/".$upiagam);

		date_default_timezone_set('Asia/Jakarta');
		$tgl = date("Y-m-d");
		$wkt = date("G:i:s");
		$status= "verified";
		$id_gel = $gel['id_gelombang'];
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$encpass = password_hash($password, PASSWORD_BCRYPT);
		$name = addslashes($_POST['name']);
		$nama_ayah = addslashes($_POST['nama_ayah']);
		$nama_ibu = addslashes($_POST['nama_ibu']);
		$alamat = addslashes($_POST['alamat']);
		$alamat_sekolah = addslashes($_POST['alamat_sekolah']);
		$alamat_kantor_ayah = addslashes($_POST['alamat_kantor_ayah']);
		$alamat_kantor_ibu = addslashes($_POST['alamat_kantor_ibu']);
		$alamat_ortu = addslashes($_POST['alamat_ortu']);
		$alasan_ortu = addslashes($_POST['alasan_ortu']);
		$nisn = addslashes($_POST['nisn']);
		$sekolah = addslashes($_POST['sekolah']);

		mysqli_query($con, "INSERT INTO users (ktp, kk, akta, gambar, ijazah, surat_kerja, piagam, email, password, id_rekomendasi, rekomendasi, nik, name, tmp_lhr, tgl_lhr, id_jk, id_agm, id_kw, id_kk, alamat, id_prov, id_kab, id_kec, id_kel, sekolah, id_jurusan, thn_lulus, alamat_sekolah, no_ijazah, thn_ijazah, nilai_rr, id_alm, prestasi, hp, nik_ayah, nama_ayah, pendidikan_ayah, hp_ayah, pekerjaan_ayah, jabatan_ayah, penghasilan_ayah, penghasilan_ayah_lainya, kantor_ayah, alamat_kantor_ayah, nik_ibu, nama_ibu, pendidikan_ibu, hp_ibu, pekerjaan_ibu, jabatan_ibu, penghasilan_ibu, penghasilan_ibu_lainya, kantor_ibu, alamat_kantor_ibu, alamat_ortu, alasan_ortu, id_fak, id_pro, id_gel, status, tgl, waktu, nisn) VALUES ('$uktp', '$ukk', '$uakta', '$ugambar', '$uijazah','$usurat_kerja', '$upiagam', '$_POST[email]', '$encpass', '$_POST[id_rekomendasi]', '$_POST[rekomendasi]', '$_POST[nik]', '$name', '$_POST[tmp_lhr]', '$_POST[tgl_lhr]', '$_POST[id_jk]', '$_POST[id_agm]', '$_POST[id_kw]', '$_POST[id_kk]', '$alamat', '$_POST[id_prov]', '$_POST[id_kab]', '$_POST[id_kec]', '$_POST[id_kel]', '$sekolah', '$_POST[id_jurusan]', '$_POST[thn_lulus]', '$_POST[alamat_sekolah]', '$_POST[no_ijazah]', '$_POST[thn_ijazah]', '$_POST[nilai_rr]', '$_POST[id_alm]', '$_POST[prestasi]', '$_POST[hp]', '$_POST[nik_ayah]', '$nama_ayah','$_POST[pendidikan_ayah]', '$_POST[hp_ayah]', '$_POST[pekerjaan_ayah]','$_POST[jabatan_ayah]','$_POST[pendidikan_ayah]', '$_POST[penghasilan_ayah_lainya]', '$_POST[kantor_ayah]', '$alamat_kantor_ayah', '$_POST[nik_ibu]', '$nama_ibu','$_POST[pendidikan_ibu]', '$_POST[hp_ibu]', '$_POST[pekerjaan_ibu]','$_POST[jabatan_ibu]','$_POST[pendidikan_ibu]', '$_POST[penghasilan_ibu_lainya]', '$_POST[kantor_ibu]', '$alamat_kantor_ibu', '$alamat_ortu', '$alasan_ortu', '$_POST[id_fak]', '$_POST[id_pro]', '$id_gel', '$status', '$tgl', '$wkt', '$nisn')");
		header("location:./daftar-step5?alert=berhasil");


	}

	?>
	