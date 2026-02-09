<link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
<?php
session_start();
include "../assets/config/koneksi.php";
require_once "../assets/controller/openssl.php";
$i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1"));  
$aplikasi = $i["aplikasi"];
$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN gelombang ON users.id_gel = gelombang.id_gelombang WHERE id_user='$id'"));

?>
<input type="hidden" class="form-control" name="id_user" value="<?php echo $row['id_user'];?>">
<h1><center><i class="fa  fa-warning"></i></center></h1>
<center>
	<h4>
	Apa anda yakin akan menerima data ini?</h4>
	<a href="#">ID : <?php $id = encrypt_decrypt('encrypt',$row['id_user']); echo $id; ?></a>
	<p><?php echo $row['name'];?> <br/><label class="btn btn-xs btn-info" style="text-transform: uppercase;">Pendaftar <?php echo "$aplikasi";?> <?php echo $row['nama_gelombang'];?></label></p>
	
</h4>

</center>
<div class="row">
	<div class="col-12">
		<div class="form-group">
			<label>Nomor Pendaftaran<sup class="text-red">*Calon Mahasiswa Baru</sup></label>
			<input type="text" name="npm" placeholder="Tuliskan nomor pendaftaran calon mahasiswa Baru" class="form-control" value="<?php echo $row['npm'];?>" required="required">
		</div>
	</div> 
	<div class="col-12">
		<div class="form-group">
			<label>Unggah Surat Penerimaan Mahasiswa Baru<sup class="text-red">*(ekstesi file .doc, .docx, .pdf, .jpg)</sup></label>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" name="surat"  multiple="true" accept=".doc,.docx,.pdf,.jpg"  class="custom-file-input" id="exampleInputFile" required="required">
					<label class="custom-file-label" for="exampleInputFile">Unggah Surat</label>
				</div>
			</div>
		</div>
	</div> 
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function () 
		{
			bsCustomFileInput.init();
		});
		var uploadField = document.getElementById("exampleInputFile");
		uploadField.onchange = function() 
		{
			if(this.files[0].size > 600000)
				{   Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
			this.value = "";
		};
	};
</script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>