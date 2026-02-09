<?php include 'header.php';?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container">
		<div class="row">
			<img  style="position: absolute;width: 50%;margin-top: -100px;" src="assets/dist/img/iklan/<?php echo "$i32";?>" class="img-responsive" alt="Responsive image"  data-aos="fade-down">
			<div class="col-lg-5 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-left">
				
				<div style="margin-top: ">
					<h1 style="color: #081B33;text-shadow: 0 0 3px #FFFFFF, 0 0 5px #FFFFFF;"><?php echo "$i3nama";?>!</h1>
					<a href="dashboard/daftar"><button class="btn btn-primary" style="border: 2px solid #eee;width: 150px;"><i class="fa fa-user-plus faa-shake animated"></i> Daftar</button></a>
					<a href="#prodi"  class="btn btn-warning" style="border: 2px solid #eee;width: 150px;"><i class="fa fa-sitemap"></i> Lihat Prodi</a>
				</div>
			</div>
			<div class="col-lg-7 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
				<img style="margin-top: -75px;" src="assets/dist/img/iklan/<?php echo "$i3";?>" class="img-fluid img-responsive" alt="Responsive image">
			</div>
		</div>

	</section><!-- End Hero -->
	<!-- ======= Pricing Section ======= -->
	<main id="main">
		<section id="biaya" class="pricing">
			<div class="container">

				<div class="section-title">
					<h2>Biaya dan Syarat Pendaftaran</h2>
					<p>Adapun Rincian Biaya dan Syarat Pendaftaran Terbagi Dalam Beberapa Gelombang Di Bawah Ini.</p>
				</div>

				<div class="row no-gutters">
					<?php  
					$rg = mysqli_query($con, "SELECT * FROM gelombang order by id_gelombang");
					while($gel = mysqli_fetch_array($rg))
					{
						$r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb WHERE id_panitia ='1'"));

						$rp = $r['id_gelombang'];
						$tgl_a = date("d-m-Y", strtotime($gel['tgl_a']));
						$tgl_b = date("d-m-Y", strtotime($gel['tgl_b']));
						?>
						<div class="col-md-4 box" data-aos="fade-up">
							<h3 class="badge" style="background-color: #081B33;color: #FFFFFF;"><i class="fa fa-star"></i> <?php echo $gel['nama_gelombang'];?></h3>
							<h4><?php echo "Rp " . number_format("$gel[biaya]", 0, ",", "."); ?></h4>
							<b class="text-navy">Tanggal Pendaftaran:<br/><?php echo $tgl_a; ?> s/d <?php echo $tgl_b; ?></b>
							<hr>
							<ul>
								<li><i class="bx bx-list"></i> Persyaratan:</li>
							<?php echo $gel['persyaratan'];?>
							</ul>
							<a href="" class="get-started-btn" style="background-color: #FFD800; color: #222; text-transform: capitalize; border: 2px dashed #222;"><?php echo $gel['catatan'];?></a>
							<br/>
							<br/>
							<?php if (trim($gel['id_gelombang']) == ''.$rp.''){ echo "";?><button type='button' onclick="window.location.href='dashboard/daftar'" class='btn btn-sm btn-primary'> <i class='fa fa-user-plus'></i> Daftar Sekarang</button> <?php }else{ echo "<button class='btn btn-sm btn-danger'> <i class='fa fa-info-circle'></i> Pendaftaran Belum Dibuka</button>"; } ?>
							
						</div>
					<?php } ?>
				</div>
			</div>
		</section><!-- End Pricing Section -->
		<!-- ======= App prodi Section ======= -->
		<section id="prodi" class="features">
			<div class="container">

				<div class="section-title">
					<h2>Program Studi</h2>
					<p><?php echo "$i2ji"; ?></p>
				</div>

				<div class="row no-gutters">
					<div class="col-xl-7 d-flex align-items-stretch order-2 order-lg-1">
						<div class="content d-flex flex-column justify-content-center">
							<div class="row">
								<?php  
								$tf = mysqli_query($con, "SELECT * FROM fakultas  order by id_fak");
								while($fak = mysqli_fetch_array($tf))
									{ ?>
										<div class="col-md-6 icon-box" data-aos="fade-up">
											<i class='bx bx-chevron-right-circle'></i>
											<h4>Fakultas <?php echo $fak['nama_fak']; ?></h4>
											<p>Prodi: <?php $tp = mysqli_query($con, "SELECT * FROM prodi where id_fak = '$fak[id_fak]' ");
											while($pro = mysqli_fetch_array($tp))
												{ ?><br/>- <?php echo $pro['nama_pro'];?>  <?php } ?></p>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="image col-xl-5 align-items-stretch " data-aos="fade-down" data-aos-delay="100">
							<img style="border:2px solid #eee; border-top-left-radius: 20px;border-bottom-right-radius: " src="assets/dist/img/iklan/<?php echo "$i2" ?>" class="img-fluid img-responsive img-rounded" alt="Responsive image">
						</div>
					</div>

				</div>
			</section><!-- End App Features Section -->

			<!-- ======= Details Section ======= -->
			<section id="details" class="details">
				<div class="container">

					<div class="row content">

						<?php  
						$tf = mysqli_query($con, "SELECT * FROM fakultas  order by id_fak");
						while($fak = mysqli_fetch_array($tf))
							{ ?>
								<div class="col-md-4" data-aos="fade-right">
									<img src="assets/dist/img/logo/<?php echo $fak['gambar_fak']; ?>" class="img-fluid" alt="Responsive">
								</div>
								<div class="col-md-8 pt-4" data-aos="fade-left">
									<h3><i class="fa fa-flag"></i> Fakultas <?php echo $fak['nama_fak']; ?></h3>
									<?php echo $fak['desc_fak']; ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</section><!-- End Details Section -->

				
					<!-- ======= Testimonials Section ======= -->
					<section id="testimonials" class="testimonials section-bg">
						<div class="container">

							<div class="section-title">
								<h2>Testimonials</h2>
								<p>Testimonials Lulusan <?php echo "$kampus"; ?></p>
							</div>
							<div class="owl-carousel testimonials-carousel" data-aos="fade-left">
								<?php  
								$tt = mysqli_query($con, "SELECT * FROM testimoni where status_testi = '1' order by id_testi");
								while($tes = mysqli_fetch_array($tt))
									{ ?>
										<div class="testimonial-wrap">
											<div class="testimonial-item">
												<img style="border: 4px solid #eee;" src="assets/dist/img/user/<?php echo $tes['gambar_testi']; ?>" class="testimonial-img" alt="Responsive">
												<h3><?php echo $tes['nama_testi']; ?></h3>
												<h4><?php echo $tes['pekerjaan_testi']; ?></h4>
												<p>
													<i class="bx bxs-quote-alt-left quote-icon-left"></i>
													<?php echo $tes['uraian_testi']; ?>
													<i class="bx bxs-quote-alt-right quote-icon-right"></i>
												</p>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</section><!-- End Testimonials Section -->



						<!-- ======= Frequently Asked Questions Section ======= -->
						<section id="faq" class="faq section-bg">
							<div class="container">

								<div class="section-title">

									<h2>Frequently Asked Questions</h2>
									<p>Anda Ingin Bertanya, silahkan lihat pertannyaan umum berikut ini, jika tidak ada jawaban yang anda dapatkan silakan kirimkan pesan kepada kami melalui kontak kami <a href="#contact"> disini</a></p>
								</div>

								<div class="accordion-list">
									<ul>
										<?php  
										$tfaq = mysqli_query($con, "SELECT * FROM faq order by id_faq");
										while($faq = mysqli_fetch_array($tfaq))
											{ ?>
												<li data-aos="fade-up" data-aos-delay="100">
													<i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#accordion-list-2" class="collapsed"><?php echo $faq['pertanyaan']; ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
													<div id="accordion-list-2" class="collapse" data-parent=".accordion-list">
														<p>
															<?php echo $faq['jawaban']; ?>
														</p>
													</div>
												</li>

											<?php } ?>
										</ul>
									</div>

								</div>
							</section><!-- End Frequently Asked Questions Section -->

							<!-- ======= Contact Section ======= -->
							<section id="contact" class="contact">
								<div class="container">

									<div class="section-title">
										<h2>Kontak Kami</h2>
										<p>Kami menyediakan beberapa kontak untuk dapat menghubungi kami, baik melalui lokasi kampus, nomor telephone dan email di bawah ini.</p>
									</div>

									<div class="row">

										<div class="col-lg-6">
											<div class="row">
												<div class="col-lg-6 info" data-aos="fade-up">
													<i class="bx bx-map"></i>
													<h4>Alamat</h4>
													<p style="text-transform: uppercase;"><?php echo "$alamat";?> DESA/KELURAHAN <?php echo "$kelurahan";?> KECAMATAN <?php echo "$kecamatan";?> <?php echo "$kabupaten";?> PROVINSI <?php echo "$provinsi";?></p>
												</div>
												<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="100">
													<i class="bx bx-phone"></i>
													<h4>Telp./HP.</h4>
													<p><?php echo "$hp";?></p>
													<h4>WHATSAPP</h4>
													<p><?php echo "$wa";?></p>
												</div>
												<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="200">
													<i class="bx bx-envelope"></i>
													<h4>Email/Surel</h4>
													<p><?php echo "$email";?></p>
												</div>
												<div class="col-lg-6 info" data-aos="fade-up" data-aos-delay="300">
													<i class="bx bx-time-five"></i>
													<h4>Jam Kerja</h4>
													<p><?php echo "$jam";?></p>
												</div>
											</div>
										</div>

										<div class="col-lg-6">
											<form class='form-horizontal' role='form' method=POST action='dashboard/action/testimonials_save.php' enctype='multipart/form-data'>
												<div class="form-group">
													<input placeholder="Tuliskan Nama Lengkap" type="text" name="nama_testi" class="form-control" required="required" />
													<div class="validate"></div>
												</div>
												<div class="form-group">
													<input placeholder="Tuliskan Pekerjaan Saat Ini" type="text" class="form-control" name="pekerjaan_testi" required="required" />
													<div class="validate"></div>
												</div>
												<div class="form-group">
													<textarea placeholder="Tuliskan Testimoni Anda" class="form-control" name="uraian_testi" required="required"></textarea>
													<div class="validate"></div>
												</div>

												<div class="form-group">
													<div class="input-group">
														<div class="custom-file">
															<input type="file" name="gambar" multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile" required="required">
															<label class="custom-file-label" for="exampleInputFile">Unggah Gambar</label>
														</div>
													</div>

												</div>
												
												<div class="text-center"><button type="submit" class="btn btn-primary"><i class="fa  fa-paper-plane"></i> Kirim Testimoni</button></div>
											</form>
										</div>

									</div>

								</div>
							</section><!-- End Contact Section -->

						<?php include "footer.php"; ?>


						</main><!-- End #main -->
						<form action="./" method="post" autocomplete="" class="form-horizontal" role="form">
							<div class="modal fade" id="masukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true" style="margin-top: 100px;">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel1"><img src="assets/dist/img/logo/<?php echo "$logo";?>" width="30"> Login <?php echo "$aplikasi";?></h5>
											<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">x</span>
											</button>
										</div>
										<div class="modal-body">
											<?php if(count($errors) > 0)
											{ ?>
												<br/>
												<div class="alert alert-danger alert-dismissible">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<strong>
														<?php
														foreach($errors as $showerror)
														{
															echo $showerror;
														}
														?>

													</strong>
												</div>
												<?php
											}
											?>
											<center><label style="padding-top: 10px;">Silahkan Lengkapi Form Login Berikut!</label></center>
											<div class="input-group mb-3">
												<input type="email" class="form-control" placeholder="Tuliskan Username/Email" name="email" required="true">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-envelope faa-pulse faa-vertical animated"></span>
													</div>
												</div>
											</div>
											<div class="input-group mb-3">
												<input type="password" class="form-control" placeholder="Tuliskan Password" name="password" required="true">
												<div class="input-group-append">
													<div class="input-group-text">
														<span class="fa fa-key faa-pulse faa-shake animated"></span>
													</div>
												</div>
											</div>
										<!-- </div>
										<center>
											Lupa password? <span type="button" onclick="window.open('https://wa.me/<?php echo $wa; ?>?text=Hai Admin Saya Ingin Reset Password, Berikut Data Saya:%3A%0ANAMA%3A%0ANISN%3A%0ANIK%3A%0AEMAIL%3A%0AHANDPHONE%3A', '_blank');" class="badge badge-info"><i class="fa fa-key faa-tada animated-hover"></i> Reset Sekarang</span>
											<br/>
											<br/>
										</center> -->
										<center>
											Lupa password? <span type="button" onclick="window.location.href='forgotpassword'" class="badge badge-info"><i class="fa fa-key faa-tada animated-hover"></i> Reset Sekarang</span>
											<br/>
											<br/>
										</center>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-arrow-left faa-tada animated-hover"></i> Kembali</button>
											<button type="submit" name="login" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-sign-in faa-pulse faa-passing animated"></i>  Masuk</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<?php
						if(isset($_GET['alert'])){
							if($_GET['alert']=="testimoni"){
								?>
								<script type="text/javascript">
									$(function() {
										alert({
											icon: 'success',
											showConfirmButton: false,
											timer: 1500,
											timerProgressBar: true,
											title: 'Sukses!',
											text: 'Data Berhasil Disimpan',
											footer: 'APLIKASI <?php echo "$aplikasi";?>'
										}).then(function() {
											window.location = "galeri";
										});
									});
								</script>
							<?php }       
						}
						?>


