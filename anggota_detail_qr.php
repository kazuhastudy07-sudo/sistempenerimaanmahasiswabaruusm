<?php
session_start();
include "../assets/config/koneksi.php";

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

<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<center>
			<img style="width: 150px;border:4px solid #eee;background-size: cover; object-fit: cover;overflow: hidden;height: 150px;" src="../assets/dist/img/user/<?php if (trim($row['gambar']) == ''){ echo "blank.png"; }else{ echo $row['gambar']; } ?>" class="img-profile rounded">
		</center>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<center>
			<img style="width: 150px;border:4px solid #eee;background-size: cover; object-fit: cover;overflow: hidden;height: 150px;" src="../assets/dist/img/qrcode/<?php if (trim($row['qrcode']) == ''){ echo "blank.png"; }else{ echo $row['qrcode']; } ?>" class="img-profile rounded">
			<br/>
			NO. KTA: <?php echo "$row[npa]"; ?>
		</center>
	</div>
</div>

<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'];?>">

<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Jenis Bidang Keanggotaan</label>
		<input type="text" class="form-control" name="id_jeniskeanggotaan" value="<?php echo $row['ket_jeniskeanggotaan'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Jabatan</label>
		<input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>NIK</label>
		<input type="number" class="form-control" name="nik" value="<?php echo $row['nik'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Nama</label>
		<input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Tempat Lahir</label>
		<input type="text" class="form-control" name="tmp_lhr" value="<?php echo $row['tmp_lhr'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Tanggal Lahir</label>
		<input type="date" class="form-control" name="tgl_lhr" value="<?php echo $row['tgl_lhr'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Jenis Kelamin</label>
		<input type="text" class="form-control" name="nama_jk" value="<?php echo $row['nama_jk'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Agama</label>
		<input type="text" class="form-control" name="nama_agm" value="<?php echo $row['nama_agm'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Provinsi</label>
		<input type="text" class="form-control" name="id_prov" value="<?php echo $row['nama_provinsi'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Kabupaten/Kota</label>
		<input type="text" class="form-control" name="id_kab" value="<?php echo $row['nama_kabupaten'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Kecamatan</label>
		<input type="text" class="form-control" name="id_kec" value="<?php echo $row['nama_kecamatan'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Desa/Kelurahan</label>
		<input type="text" class="form-control" name="id_kel" value="<?php echo $row['nama_kelurahan'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Alamat</label>
		<input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Kode POS</label>
		<input type="text" class="form-control" name="tgl_bergabung" value="<?php echo $row['tgl_bergabung'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Pekerjaaan</label>
		<input type="text" class="form-control" name="id_pekerjaan" value="<?php echo $row['nama_pekerjaan'];?>" disabled>
	</div>
	
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Pendidikan Terakhir</label>
		<input type="text" class="form-control" name="id_pendidikan" value="<?php echo $row['nama_pendidikan'];?>" disabled>
	</div>
</div>
<div class="form-group row">
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Email </label>
		<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" disabled>
	</div>
	<div class="col-sm-6 mb-3 mb-sm-0">
		<label>Handphone</label>
		<input type="text" class="form-control" name="hp" value="<?php echo $row['hp'];?>" disabled>
	</div>
</div>