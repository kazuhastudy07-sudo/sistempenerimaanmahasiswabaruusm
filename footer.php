<hr>
<!-- ======= Footer ======= -->
<footer id="footer" style="background-color: #222; color: #fff;">

	<div class="footer-top">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-6 footer-contact" data-aos="fade-up">
					<h4>Alamat</h4>
					<p style="text-transform: uppercase;font-size: 12px;"> <?php echo "$alamat"; ?>DESA/KELURAHAN <?php echo "$kelurahan";?> KECAMATAN <?php echo "$kecamatan";?> <?php echo "$kabupaten";?> PROVINSI <?php echo "$provinsi";?><br>
						<strong>Phone:</strong>  <?php echo "$hp"; ?><br>
						<strong>Email:</strong> <?php echo "$email"; ?><br>
					</p>
				</div>

				<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="100">
					<h4>Link Terkait</h4>
					<ul style="text-transform: uppercase;font-size: 12px;">
						<li><i class="bx bx-chevron-right"></i> <a href="<?php echo "$url_link1 ";?>"><?php echo "$nama_link1 ";?></a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="<?php echo "$url_link2 ";?>"><?php echo "$nama_link2 ";?></a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="<?php echo "$url_link3 ";?>"><?php echo "$nama_link3 ";?></a></li>
						<li><i class="bx bx-chevron-right"></i> <a href="<?php echo "$url_link4 ";?>"><?php echo "$nama_link4 ";?></a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="200">
					<h4>Informasi</h4>
					<ul>
						<li>
							<img class="img-responsive" style="width: 80%" src="assets/dist/img/logo/footer.png">
						</li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links" data-aos="fade-up" data-aos-delay="300">
					<h4>Media Sosial</h4>
					<div class="social-links mt-3">
						<a type="button" onclick="window.open('<?php echo "$tw"; ?>', '_blank');" data-toggle="tooltip" title="Twitter" class="twitter bg-info"><i class="bx bxl-twitter"></i></a>
						<a type="button" onclick="window.open('<?php echo "$fb"; ?>', '_blank');" data-toggle="tooltip" title="Facebook" href="" class="facebook bg-primary"><i class="bx bxl-facebook"></i></a>
						<a type="button" onclick="window.open('<?php echo "$ig"; ?>', '_blank');" data-toggle="tooltip" title="Instagram" href="#" class="instagram bg-danger"><i class="bx bxl-instagram"></i></a>
						<a type="button" onclick="window.open('https://api.whatsapp.com/send?phone=<?php echo "$wa"; ?>9&text=Hai Kampus Unwiku Purwokerto, Saya Ingin Bertanya Sesuatu...', '_blank');" data-toggle="tooltip" title="Whatsapp" href="#" class="instagram bg-success"><i class="bx bxl-whatsapp"></i></a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="container py-4">
		<div class="copyright" style="color: #fff;">
			&copy; Copyright <?php echo date("Y");?>. <strong><span><?php echo "$aplikasi"; ?> - <?php echo "$kampus"; ?></span></strong>. 
		</div>
		<div class="credits"  style="color: #ffffff;">
			Powered By <a type="button" style="color: #ffffff;" target="_blank" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="bottom" title="Klik Web Developer"><span class="badge badge-danger" ><b><i class="fa fa-code faa-pulse animated"></i> Saintek MU 2022</b></span></a>
		</div>
	</div>
</footer><!-- End Footer -->

<!-- Popup -->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="pmb/assets/vendor/jquery/jquery.min.js"></script>
<script src="pmb/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="pmb/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="pmb/assets/vendor/php-email-form/validate.js"></script>
<script src="pmb/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="pmb/assets/vendor/venobox/venobox.min.js"></script>
<script src="pmb/assets/vendor/aos/aos.js"></script>
<script type="text/javascript">
	$(document).ready(function () 
	{
		bsCustomFileInput.init();
	});
	var uploadField = document.getElementById("exampleInputFile");
	uploadField.onchange = function() 
	{
		if(this.files[0].size > 600000)
		{ 
			alert( 'Maaf, File Gambar Terlalu Besar, Maksimal File Unggah 600kb');
			this.value = "";
		};
	};
</script>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		bsCustomFileInput.init();
	});
</script>
<!-- Template Main JS File -->
<script src="pmb/assets/js/main.js"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

</body>

</html>

<div class="popup-wrapper" id="popup"  style="margin-top: 70px;">
	<div class="popup-container">
		<Center><h5><?php echo "$i1judul"; ?> </h5></Center>
		<div class="media" style="color: #fff;padding-top: 20px;padding-bottom: 20px">

			<div class="media-body" style="color: #222;">
				<img style="border-bottom-right-radius: 20px;border-top-left-radius: 20px;" class="img-responsive" alt="Responsive image" src="assets/dist/img/iklan/<?php echo "$i1"; ?>" width="100%">
			</div>
		</div>
		<a class="btn btn-sm-12 btn-xs pull-right popup-close" href="#popup"><i class="fa fa-times-circle"></i> Tutup</a>
	</div>
</div>