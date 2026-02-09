<nav class="main-header navbar navbar-expand navbar- <?php echo "$iden[color]"; ?>  navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
     <a onclick="window.location.href='./dashboard'" type="submit" class="active nav-link" style="text-transform: uppercase;">

      <span class="d-none d-lg-block ketikan">APLIKASI <?php echo "$aplikasi";?> - <?php echo "$kampus";?></span><span class="d-block d-lg-none d-xl-none d-xs-block"><img src="../assets/dist/img/logo/<?php echo "$logo";?>" alt="Logo" style="width:30px;"><b style="font-family: 'Orbitron', sans-serif;text-transform: uppercase;font-size: 10px;padding-left: 10px;"><?php echo "$title";?></b></span>  
     </a>
   </li> 
 </ul>
 <?php
 session_start();
 $_SESSION['a'] = $fetch_info['gambar'];
 $_SESSION['b'] = $fetch_info['name'];
 $_SESSION['c'] = $fetch_info['email'];
 $_SESSION['id_user'] = $fetch_info['id_user'];
 ?>
 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">
  <!-- <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>
      <span class="badge badge-<?php echo "$iden[mode]"; ?> navbar-badge" data-toggle="tooltip" data-placement="bottom" title="Data Masuk">
        <?php $data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND status_data='0'")); echo "$data"; ?>
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <span class="dropdown-item bg-red dropdown-header"><?php echo "$data"; ?> Data Masuk Perlu Verifikasi</span>
      <div class="dropdown-divider"></div>
      <div class="dropdown-divider"></div>
      <a type="button" onclick="window.location.href='./verifikasi'" class="dropdown-item">
        <i class="fa fa-users mr-2"></i> Data Daftar Mandiri <small><sup class="badge badge-<?php echo "$iden[mode]"; ?> "> <?php $data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND status_data='0' AND ket ='0'")); echo "$data"; ?></sup></small>
        <span class="float-right text-muted text-sm"> <i class="fa fa-arrow-circle-right"></i></span>
      </a>
      <a type="button" onclick="window.location.href='./verifikasiexcel'" class="dropdown-item">
        <i class="fa fa-users mr-2"></i> Data Upload Excel <small><sup class="badge badge-<?php echo "$iden[mode]"; ?> "> <?php $data = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE id_level = '3' AND status_data='0' AND ket ='1'")); echo "$data"; ?></sup></small>
        <span class="float-right text-muted text-sm"> <i class="fa fa-arrow-circle-right"></i></span>
      </a>
    </div>
  </li> -->
  <li class="nav-item">
    <a type="button" onclick="window.location.href='../lock'" class="nav-link" data-toggle="tooltip" title="Kunci Layar"><i
      class="fa fa-lock"></i></a>
    </li>
    <li class="nav-item" title="Keluar Aplikasi">
      <a type="button" class="nav-link keluar" data-toggle="tooltip" title="Keluar">
        <bagde class="badge bg-navy"><i class="fa fa-power-off faa-pulse animated"></i></bagde>
      </a>
    </li>
  </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-<?php echo "$iden[mode]"; ?>-<?php echo "$iden[sidebar]"; ?> elevation-4">
  <!-- Brand Logo -->
  <a type="button" onclick="window.location.href='administrator'" class="brand-link text-white <?php echo "$iden[color]"; ?>">
    <img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3" style="opacity: ">
    <span style="text-transform: uppercase;font-size: 12px;font-family: 'Orbitron', sans-serif;text-transform: uppercase;"  class="brand-text small font-weight-light"><?php echo "$aplikasi";?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
       <img style="width: 40px; object-fit: cover;overflow: hidden;" src="../assets/dist/img/user/<?php if (trim($fetch_info['gambar']) == ''){ echo "user.png"; }else{ echo $fetch_info['gambar']; } ?>" class="img-responsive img-rounded" alt="User Image">
     </div>
     <div class="info" style="margin-top: -10px;">
      <a href="#" class="d-block"><?php echo $fetch_info['name']; ?></a>
      <a class="small">
        <?php 
        if ($fetch_info['id_level']=='1')
          { echo "Super Administrator"?> <?php }  

        else if ($fetch_info['id_level']=='2') 
          { echo "Administrator";?><?php } ?>
      </a>
      <br><span class="badge bg-red"><i class=" fa fa-dot-circle-o faa-pulse animated"></i> Online</span>
    </div>
  </div>


  <!-- Sidebar Menu -->
  <nav class="mt-2 small">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     <li class="nav-item has-treeview menu-open">
      <a type="button" onclick="window.location.href='./'" class="nav-link active">
        <i class="nav-icon fa fa-dashboard faa-shake animated"></i>
        <p>
          DASHBOARD
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview">
      <a type="button" onclick="window.location.href='pengaturanpmb'" class="nav-link">
        <i class="nav-icon fa fa-flag faa-tada animated-hover"></i>
        <p>
          PENGATURAN PMB
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview">
      <a type="button" onclick="window.location.href='kontakpanitia'" class="nav-link">
        <i class="nav-icon fa fa-contao faa-tada animated-hover"></i>
        <p>
          KONTAK PANITIA
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-th-large faa-tada animated-hover"></i>
        <p>
          PENGATURAN LAMAN WEB
          <i class="fa fa-angle-double-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">  
        <li class="nav-item">
          <a type="button" onclick="window.location.href='popup'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Pop Up</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='beranda'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='biayapendaftaran'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Biaya & Syarat Pendaftaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='biofakultas'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Bio Fakultas</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='bioprodi'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Bio Program Studi</p>
          </a>
        </li>
       
        <li class="nav-item">
          <a type="button" onclick="window.location.href='testimonials'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Testimonials</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='faq'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>FAQ</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='mediasosial'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Media Sosial</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='linkterkait'" class="nav-link"><i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Link Terkait</p>
          </a>
        </li>
      </ul> 
    </li> 

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-list-ol faa-tada animated-hover"></i>
        <p>
          LIHAT DATA PMB
          <i class="fa fa-angle-double-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <!--<li class="nav-item">-->
        <!--  <a type="button" onclick="window.location.href='pmbjalurpmdk'" class="nav-link">-->
        <!--    <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>-->
        <!--    <p>Jalur PMDK</p>-->
        <!--  </a>-->
        <!--</li>-->
        <li class="nav-item">
          <a type="button" onclick="window.location.href='pmbgelombang1'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 1</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='pmbgelombang2'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 2</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='pmbgelombang3'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 3</p>
          </a>
        </li>
      </ul> 
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-file-text faa-tada animated-hover"></i>
        <p>
          UJIAN ONLINE PMB
          <i class="fa fa-angle-double-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a type="button" onclick="window.location.href='soaltambah'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Buat Soal</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='soal'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Bank Soal</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='pengaturanujian'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Pengaturan Ujian PMB</p>
          </a>
        </li>
      </ul> 
    </li>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-check-o faa-tada animated-hover"></i>
        <p>
          NILAI UJIAN ONLINE PMB
          <i class="fa fa-angle-double-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <!--<li class="nav-item">-->
        <!--  <a type="button" onclick="window.location.href='nilaipmbjalurpmdk'" class="nav-link">-->
        <!--    <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>-->
        <!--    <p>Jalur PMDK</p>-->
        <!--  </a>-->
        <!--</li>-->
        <li class="nav-item">
          <a type="button" onclick="window.location.href='nilaipmbgelombang1'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 1</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='nilaipmbgelombang2'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 2</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='nilaipmbgelombang3'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 3</p>
          </a>
        </li>
      </ul> 
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-print faa-tada animated-hover"></i>
        <p>
          CETAK FORMULIR PMB
          <i class="fa fa-angle-double-left right"></i>
          <!--  <span class="badge bg-<?php echo "$iden[sidebar]"; ?> right"> </span> -->
        </p>
      </a>
      <ul class="nav nav-treeview">
        <!--<li class="nav-item">-->
        <!--  <a type="button" onclick="window.location.href='formulirpmbjalurpmdk'" class="nav-link">-->
        <!--    <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>-->
        <!--    <p>Jalur PMDK</p>-->
        <!--  </a>-->
        <!--</li>-->
        <li class="nav-item">
          <a type="button" onclick="window.location.href='formulirpmbgelombang1'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 1</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='formulirpmbgelombang2'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 2</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='formulirpmbgelombang3'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang 3</p>
          </a>
        </li>
      </ul> 
    </li>

    <!-- <li class="nav-item has-treeview">
      <a type="button" onclick="window.location.href='laporanpbm'" class="nav-link">
        <i class="nav-icon fa fa-book faa-tada animated-hover"></i>
        <p>
          LAPORAN PMB
        </p>
      </a>
    </li> -->
    <?php 
    if ($fetch_info['id_level']=='1')
      { echo ""?>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-cogs faa-tada animated-hover"></i>
        <p>
          MASTER DATA
          <i class="fa fa-angle-double-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a type="button" onclick="window.location.href='identitas'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Identitas Aplikasi</p>
          </a>
        </li> 
        <li class="nav-item">
          <a type="button" onclick="window.location.href='background'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Background</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='fakultas'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Fakultas</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='programstudi'" class="nav-link">
            <i class="fa  fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Program Studi</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='gelombang'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Gelombang Pendaftaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='agama'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Agama</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='jeniskelamin'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Jenis Kelamin</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='provinsi'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Provinsi</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='kabupaten'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Kabupaten/Kota</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='kecamatan'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Kecamatan</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" onclick="window.location.href='kelurahan'" class="nav-link">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Desa/Kelurahan</p>
          </a>
        </li>
        <li class="nav-item">
          <a type="submit" class="nav-link" onclick="window.open('https://sig.bps.go.id/bridging-kode/index', '_blank');">
            <i class="fa fa-circle-o nav-icon text-<?php echo "$iden[sidebar]"; ?>"></i>
            <p>Kode Wilayah</p>
          </a>
        </li>
      </ul>
    </li>


  <?php } ?>
  <li class="nav-header">ADMININISTRATOR </li>
  <li class="nav-item">
   <a type="button" class="nav-link profil" data-id="<?php echo $fetch_info['id_user']; ?>">
    <i class="nav-icon fa fa-user-secret faa-tada animated-hover"></i>
    <p>PROFIL</p>
  </a>
</li>
<li class="nav-item">
  <a type="button" class="nav-link pass" data-id="<?php echo $fetch_info['id_user']; ?>">
    <i class="nav-icon fa fa-key faa-tada animated-hover"></i>
    <p>GANTI PASSWORD</p>
  </a>
</li>
<?php 
if ($fetch_info['id_level']=='1')
  { echo ""?>

<li class="nav-item">
  <a type="button" onclick="window.location.href='admin'" class="nav-link">
    <i class="nav-icon fa fa-users faa-tada animated-hover"></i>
    <p>
      DATA USER ADMIN
    </p>
  </a>
</li>
<?php } ?>
<li class="nav-item has-treeview menu-open">
 <a type="button" class="nav-link active keluar">
  <i class="nav-icon fa fa-power-off faa-tada animated-hover"></i>
  <p>
    KELUAR
  </p>
</a>
</li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

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
<form action="administrator?alert=keluar" method="POST" class="form-horizontal" enctype="multipart/form-data">
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


<script>
  $(function()
  {
    $(document).on('click','.profil',function(e)
    {
      e.preventDefault();
      $("#profilModal").modal('show');
      $.post('profil.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<!-- Modal Profil-->
<form action="" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel2"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:150px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-times-circle faa-tada animated-hover"></i> Tutup</button>
          <a type="button" class="btn btn-info btn-sm"  style="width:150px; border-radius: 20px;border: 2px solid #EFE4E4;" href="../dashboard/adminubah?id=<?php echo  $_SESSION['id_user']; ?>"><i class="fa fa-edit"></i> Ubah Profil</a>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  $(function()
  {
    $(document).on('click','.pass',function(e)
    {
      e.preventDefault();
      $("#passModal").modal('show');
      $.post('password.php', 
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<!-- Modal Profil-->
<form action="action/reset.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel3"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-close (alias) faa-tada animated-hover"></i> Batal</button>
         <button type="submit" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa  fa-check faa-tada animated-hover"></i>  Simpan</button>
       </div>
     </div>
   </div>
 </div>
</form>
<input type="hidden" name="a" value="<?php echo $fetch_info['gambar']?>">
<input type="hidden" name="b" value="<?php echo $fetch_info['nama']?>">
<input type="hidden" name="c" value="<?php echo $fetch_info['email']?>">
