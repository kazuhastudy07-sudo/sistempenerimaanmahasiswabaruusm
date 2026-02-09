<?php
session_start();
error_reporting(1);
include '../assets/config/koneksi.php';
if(empty($_SESSION))
{
  header("Location: ");
}
?>
<!DOCTYPE html>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
  <meta charset='UTF-8'>
  <title>
    <?php $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas INNER JOIN provinces ON identitas.id_prov = provinces.id_prov LIMIT 1"));  echo "$i[aplikasi]"; ?>
  </title>
  <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$i[logo] "; ?>">
  <style>
    img {
      width: 100%;
      height: auto;
    }
  </style>
  <style type="text/css">
   @font-face {
     font-family: "Font";
     src: url('../assets/plugins/font/Corsica.ttf');
   }

   .fontku {
     font-family: "Font";
   }
 </style>
 <style type="text/css">
   @font-face {
     font-family: "Fontx";
     src: url('../assets/plugins/font/Futura.ttf');
   }

   .futura {
     font-family: "Fontx";
   }
 </style>
 <style type="text/css">
  #kotak1 {
    border-top-left-radius:15px;
    border-top-right-radius:15px;
    border-bottom-left-radius:15px;
    border-bottom-right-radius:15px;
    border: 4px solid #007bff;
    background: #fff;
    padding: 20px; 
    width: 100%p;
    height: 400px; 
    margin-bottom:40px;
  }
</style>
</head>
<script type="text/javascript">
  setTimeout
  (
    function()
    {
      window.location = "nilaipmbgelombang1" 
    },
    5000); 
  </script>   
  <body onload='window.print()' style="font-family: arial;">
    <div id="kotak1">
     <?php
     $p=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb
      WHERE id_panitia ='1'"));
     $r = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk
      INNER JOIN provinces ON users.id_prov = provinces.id_prov
      INNER JOIN regencies ON users.id_kab = regencies.id_kab
      INNER JOIN districts ON users.id_kec = districts.id_kec  
      INNER JOIN villages ON users.id_kel = villages.id_kel 
      INNER JOIN fakultas ON users.id_fak = fakultas.id_fak 
      INNER JOIN prodi ON users.id_pro = prodi.id_pro
      INNER JOIN tbl_nilai ON users.id_user = tbl_nilai.id_users
      WHERE id_user='$_GET[id]'"));

     $tgl = date("d - m - Y", strtotime($r['tgl_lhr']));
     ?>
     <img src="../assets/dist/img/logo/<?php echo "$i[logo]"; ?>" style=" width: 60px;background-size: cover;object-fit: cover;overflow: hidden;border-radius: 5px;">
     <h2 style="margin-top: -60px;margin-left: 70px;"><?php echo "$i[aplikasi]"; ?></h2>
     <h3 style="margin-top: -20px;margin-left: 70px;"><?php echo "$i[nama]"; ?></h3>

     <h3 style="text-align: center;border-bottom: 1px dashed #007bff;">INFORMASI HASIL SELEKSI CALON MAHASISWA BARU TAHUN <?php echo date(Y);?></u></h3>
     <!-- Menampilkan Pas Photo User -->
     <img src="../assets/dist/img/user/<?php echo $r["gambar"];?>" style="text-transform: inherit; width: 120px;height: 130px;background-size: cover;object-fit: cover;overflow: hidden;border-radius: 5px;border: 2px solid #eee;margin-top: 5px;">

     <table style="position: absolute; margin-top: -148px; margin-left: 150px;text-align: left;color: #000000;font-size: 12px;width:500px;line-height: 12px;font-weight: bold;"> 
       <tr>
        <td style="vertical-align: baseline;width:130px;">NPM</td> <!-- Untuh text diatas -->
        <td style="vertical-align: baseline">:</td>
        <td style="vertical-align: baseline"><?php echo "$r[npm]";?></td>
      </tr> 
      <tr>
        <td style="vertical-align: baseline;width:130px;">NISN</td> <!-- Untuh text diatas -->
        <td style="vertical-align: baseline">:</td>
        <td style="vertical-align: baseline"><?php echo "$r[nisn]";?></td>
      </tr>  
      <tr>
        <td style="vertical-align: baseline">NIK</td>
        <td style="vertical-align: baseline">:</td>
        <td style="vertical-align: baseline"><?php echo "$r[nik]";?></td>
      </tr> 
      <tr>
        <td style="vertical-align: baseline">Nama Lengkap</td>
        <td style="vertical-align: baseline">:</td>
        <td style="text-transform: uppercase;" style="vertical-align: baseline"><?php echo "$r[name]";?></td>
      </tr> 
      <tr>
        <td style="vertical-align: baseline">Tempat/Tgl. Lahir</td>
        <td style="vertical-align: baseline">:</td>
        <td style="text-transform: uppercase;vertical-align: baseline"><?php echo "$r[tmp_lhr]";?> / <?php echo "$tgl";?></td>
      </tr>
      <tr>
        <td style="vertical-align: baseline">Agama</td>
        <td style="vertical-align: baseline">:</td>
        <td style="vertical-align: baseline;text-transform: uppercase;"><?php echo "$r[nama_agm]";?></td>
      </tr>
      <tr>
        <td style="vertical-align: baseline">Alamat</td>
        <td style="vertical-align: baseline">:</td>
        <td style="text-transform: uppercase;vertical-align: baseline"><?php echo "$r[alamat]";?></td>
      </tr>
      <td style="vertical-align: baseline">Desa/Kelurahan</td>
      <td style="vertical-align: baseline">:</td>
      <td style="vertical-align: baseline"><?php echo "$r[nama_kelurahan]";?></td>
    </tr>
    <tr>
      <td style="vertical-align: baseline">Kecamatan</td>
      <td style="vertical-align: baseline">:</td>
      <td style="vertical-align: baseline"><?php echo "$r[nama_kecamatan]";?></td>
    </tr>
    <tr>
      <td style="vertical-align: baseline">Kabupaten/Kota</td>
      <td style="vertical-align: baseline">:</td>
      <td style="vertical-align: baseline"><?php echo "$r[nama_kabupaten]";?></td>
    </tr>
    <tr>
      <td style="vertical-align: baseline">Provinsi</td>
      <td style="vertical-align: baseline">:</td>
      <td style="vertical-align: baseline"><?php echo "$r[nama_provinsi]";?></td>
    </tr>
  </table>
  <div style="text-align: center;border-bottom: 1px dashed #007bff;margin-top: 40px;position: relative;"></div>
  <h5 style="margin-top: 5px;">Fakultas Pilihan:<br/><span style="background: #ffc107; padding: 2px;border-radius: 4px;"><?php echo "$r[nama_fak]"; ?></span></h5>
  <h5 style="margin-top: -10px;">Program Studi Pilihan:<br/><span style="background: #007bff; padding: 2px;border-radius: 4px;color: #fff;"><?php echo "$r[nama_fak]"; ?></span></h5>
  <p style="font-size: 8px;margin-top: -10px;"><i>Catatan: Keputusan ini bersifat mutlak dan ditandatangani secara elektronik oleh ketua panitia Penerimaan Mahasiswa Baru</i></p>
  <h4 style="width: 200px;margin-top: -85px;margin-left:200px;text-align: center;text-transform: uppercase; padding: 5px;border: 2px dotted #222;"><?php if (trim($r['keterangan']) == '1'){ echo "";?>Lulus<br/>(Diterima)<?php } else { echo"";?>Tidak Lulus <br/>(Dipertimbangkan)<?php }?></h4>
  <h6 style="width: 200px;margin-top: -80px;margin-left:460px;text-align: left;">
    Ketua Panitia
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
     <img src="../assets/dist/img/logo/<?php echo $p["qrcode"];?>" style="position: absolute; width: 40px;background-size: cover;border-radius: 3px;border: 2px solid #ffffff;margin-top: -45px;">
    <b style="text-transform: uppercase;"><?php echo $p['nama_panitia']; ?></b>
    <br>
    NIDN.
    <?php echo $p['nidn']; ?>
  </h6>

</div>

</body>
</html>