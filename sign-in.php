<!DOCTYPE html>
<html>
<head>
	<?php 
	require "assets/config/koneksi.php";
	$iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
	<link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$iden[logo]";?>">
	<title><?php echo "$iden[aplikasi]";?></title>
	<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>	
<body style="background: -webkit-linear-gradient(left, #fff, #28166f);">	
	<script type='text/javascript'>
		Swal.fire({
			title: "Berhasil!",
			text: "Anda Berhasil Masuk | Aplikasi <?php echo "$iden[aplikasi]";?>",
			icon: "success",
			showConfirmButton: false,
			timer: 1500,
			timerProgressBar: true
		}).then(function() {
			window.location = "user";
		});
	</script>
</body>
</html>