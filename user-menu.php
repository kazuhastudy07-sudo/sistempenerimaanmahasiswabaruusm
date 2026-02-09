<nav class="main-header navbar navbar-expand-md navbar-dark navbar- <?php echo "$iden[color]"; ?>">
  <div class="container">
    <a href="user" class="navbar-brand">
      <img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" alt="AdminLTE Logo" class="brand-image"
      style="opacity: .8">
      <span class="brand-text font-weight-light small">APLIKASI <?php echo "$iden[aplikasi]";?></span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="user" class="nav-link"><i class="fa fa-home faa-tada animated-hover"></i> Beranda</a>
        </li>

        <?php 
        $sd=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users  WHERE id_user ='$fetch_info[id_user]'"));
        if (trim($sd['status_pmb']) == '1'){ echo "";?>
        <?php $id = encrypt_decrypt('encrypt',$fetch_info['id_user']); ?>
        <li class="nav-item"><a class="nav-link" type="button" onclick="window.location.href='detail?id=<?php echo $fetch_info['id_user'] ?>'"><i class="fa fa-user faa-tada animated-hover"></i> Data Saya</a></li>
      <li class="nav-item"><a href="./ujian" class="nav-link" type="button"><i class="fa fa-edit faa-tada animated-hover"></i> Ujian</a></li>
        <li class="nav-item"><a href="./hasilujian" class="nav-link" type="button"><i class="fa fa-credit-card faa-tada animated-hover"></i> Hasil Seleksi</a></li>
      <?php  } else{ echo "";?>
      <li class="nav-item"><a href="./user" class="nav-link ops" type="button"><i class="fa fa-user faa-tada animated-hover"></i> Data Saya</a></li> 

      <li class="nav-item"><a href="./ujian" class="nav-link" type="button"><i class="fa fa-edit faa-tada animated-hover"></i> Ujian</a></li>
      <li class="nav-item"><a href="./user" class="nav-link ops" type="button"><i class="fa fa-credit-card faa-tada animated-hover"></i> Hasil Seleksi</a></li>
    <?php }?> 
    <li class="nav-item">
     <a href="" data-toggle="modal" data-target="#kontak" class="nav-link"><i class="fa fa-phone faa-tada animated-hover"></i> Kontak Kami</a>
   </li>
 </ul>

 <!-- Right navbar links -->
 <ul class="order-1 order-md-3 navbar-nav ml-auto">
  <li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img style="width: 20px; object-fit: cover;overflow: hidden;" src="../assets/dist/img/user/<?php if (trim($fetch_info['gambar']) == ''){ echo "user.png"; }else{ echo $fetch_info['gambar']; } ?>" class="img-circle" alt="User Image"> Profil</a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
      <li><a href="akun" class="dropdown-item"><i class="fa fa-arrow-right"></i> Informasi Akun</a></li>
      <li><a href="password" class="dropdown-item"><i class="fa fa-arrow-right"></i> Ganti Password</a></li>
    </ul>
  </li>


  <li class="nav-item">
    <a class="btn nav-link keluar"><i class="fa fa-sign-out  faa-pulse faa-passing animated"></i> Keluar</a>
  </li>
</ul>

</div>


</div>
</nav>


<!-- Modal Kontak -->
<div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> <?php echo "$iden[aplikasi]";?></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <h4><center>KONTAK KAMI</center></h4>
      <center>Anda dapat menghubungi kami melalui salah satu kontak yang ada<br> di bawah ini:
        <hr>
        <p><i class="fa fa-whatsapp"></i> Whatsapp: <a target="_blank" rel="nofollow" href="https://api.whatsapp.com/send?phone=<?php echo "$iden[hp]";?>&text=Hai Admin... Saya Ingin Bertanya Sesuatu..." data-toggle="tooltip" data-placement="top" title="Klik Untuk Hubungi Kami Melalui Whatsapp"> <?php echo "$iden[hp]";?></a></p>
        <p><i class="fa fa-envelope"></i> Email: <a target="_blank" href="mailto:<?php echo "$iden[email]";?>"  data-toggle="tooltip" data-placement="top" title="Klik Untuk Hubungi Kami Melalui Email"> <?php echo "$iden[email]";?></a></p></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-info btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-chevron-circle-left (alias) faa-tada animated-hover"></i> Kembali</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  jQuery(document).ready(function($){ $('.ops').on('click',function()
  { 
    var getLink = $(this).attr('href'); Swal.fire({ title: 'Ops!',
      text: "Data Anda Belum Diverifikasi oleh admin, proses verifikasi biasanya memakan waktu sekitar 1x24 jam, harap menunggu dengan sabar...",
      icon: 'warning',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok' }).then(function(){ window.location.href = getLink }); return false; }); });
    </script>
    <script>
      $(function()
      {
        $(document).on('click','.unggah',function(e)
        {
          e.preventDefault();
          $("#unggahModal").modal('show');
          $.post('anggota_unggah.php',
            {id_user:$(this).attr('data-id')},
            function(html)
            {
              $(".modal-body").html(html);
            });
        });
      });
    </script>
    <form action="action/anggota_unggah.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
      <div class="modal fade" id="unggahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Unggah</button>
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <script>
      $(function()
      {
        $(document).on('click','.keluar',function(e)
        {
          e.preventDefault();
          $("#keluarModal").modal('show');
          $.post('keluar.php',
            {id_user:$(this).attr('data-id')},
            function(html)
            {
              $(".modal-body").html(html);
            });
        });
      });
    </script>
    <form action="user?alert=keluar" method="POST" class="form-horizontal" enctype="multipart/form-data">
      <div class="modal fade" id="keluarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header <?php echo "$iden[color]";?>">
              <h5 class="modal-title" id="exampleModalLabel1"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-times-circle faa-tada animated-hover"></i> Tidak</button>
              <button type="submit" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-check-circle faa-tada animated-hover"></i>  Ya</button>
            </div>
          </div>
        </div>
      </div>
    </form>
