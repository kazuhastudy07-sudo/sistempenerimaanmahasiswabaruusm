<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<div class="container">
  <section class="content" style="padding-top: 50px;">
    <div class="error-page">
      <h2 class="headline text-yellow"> 404</h2>

      <div class="error-content">
        <h2 class="text-dark"><i class="fa fa-exclamation-triangle text-yellow"></i> Oops! Halaman yang anda cari tidak ditemukan.</h2>

        <p class="callout callout-warning">
          Kami menyadari keingintahuan anda untuk mengakses halaman tertentu, namun saat ini kami tidak mengijinkan. Silahkan kembali ke halaman <a href="administrator" class="badge bg-yellow"><i class="fa fa-home"></i> Home/Dashboard</a>
        </p>

        <!-- mengalihkan ke halaman beranda -->
        <form action="administrator" id="404" method='POST'> 
        </form>

        <button type="submit" style="border-radius: 20px;" class="btn btn-sm bg-red" id="timer"></button>
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
</div>
<script src="../assets/dist/js/jquery-1.10.2.min.js" type="text/javascript"></script>

<!-- Script Timer -->
<script type="text/javascript">
  $(document).ready(function() {
  /** Membuat Waktu Mulai Hitung Mundur Dengan 
  * var detik = 0,
  * var menit = 1,
  * var jam = 1
  */
  var detik = 10;
  var menit = 0;
  var jam     = 0;
  var hari    = 0;

  /**
  * Membuat function hitung() sebagai Penghitungan Waktu
  */
  function hitung() {
  /** setTimout(hitung, 1000) digunakan untuk 
  * mengulang atau merefresh halaman selama 1000 (1 detik) 
  */
  setTimeout(hitung,1000);

  /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
  if(menit < 10 && jam == 0){
    var peringatan = '';
  };

  /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
  $('#timer').html(
    '<i class="fa fa-clock"></i> Dialihkan otomatis dalam <i class="fa fa-arrow-circle-right"></i> ' + detik + ' detik'
    );

  /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
  detik --;

  /** Jika var detik < 0
  * var detik akan dikembalikan ke 59
  * Menit akan Berkurang 1
  */
  if(detik < 0) {
    detik = 59;
    menit --;

  /** Jika menit < 0
  * Maka menit akan dikembali ke 59
  * Jam akan Berkurang 1
  */
  if(menit < 0) {
    menit = 59;
    jam --;

  /** Jika var jam < 0
  * clearInterval() Memberhentikan Interval dan submit secara otomatis
  */

  if(jam < 0) { 
    clearInterval(); 
    /** Variable yang digunakan untuk submit secara otomatis di Form */
    var frmSoal = document.getElementById("404"); 
    frmSoal.submit(); 
  } 
} 
} 
}           
/** Menjalankan Function Hitung Waktu Mundur */
hitung();
}); 
  // ]]>
</script>
</div>
<?php include "admin-footer.php"; ?>