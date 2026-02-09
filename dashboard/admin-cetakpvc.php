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
</head>
<script type="text/javascript">
  setTimeout
  (
    function()
    {
      window.location = "tandaikta" 
    },
    5000); 
  </script>   
  <body onload='window.print()' style="font-family: arial;">
    <?php 
    $iden=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas  WHERE id = '1'"));
    $id=$_POST['selector'];
    $N = count($id);
    for($i=0; $i < $N; $i++)
    {
      $data=mysqli_query($con, "SELECT * FROM users INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk
        INNER JOIN provinces ON users.id_prov = provinces.id_prov
        INNER JOIN regencies ON users.id_kab = regencies.id_kab
        INNER JOIN districts ON users.id_kec = districts.id_kec  
        INNER JOIN villages ON users.id_kel = villages.id_kel 
        INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
        INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan 
        WHERE id_user='$id[$i]'");
      while($r=mysqli_fetch_array($data))
      {
        $tgl = date("d - m - Y", strtotime($r['tgl']));
        $blangko=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM blangko WHERE id = '3'"));
        ?>
        <!-- Menampilkan Blangko Kartu -->
        <div style="width: 676px;height: 206px;padding-left: 15px;">
          <img style="text-align: center;width: 666px;height: 206px;position: absolute;background-size: cover;" src="../assets/dist/img/blangko/<?php echo $blangko["gambar"];?>">
          <!-- Menampilkan Logo forum -->
          <img src="../assets/dist/img/logo/<?php echo $iden["logo"];?>" style="position: absolute; width:100px;margin-top: 90px; margin-left: 450px;background-size: cover;">
          <!-- Menampilkan nama singkat forum -->
          <div style="position: absolute; width: 155px;margin-top: 5px;font-size: 6px;text-transform: uppercase;color: #000000;text-align: center;margin-left: 5px;"><b><?php echo $r["nama_provinsi"];?></b>
          </div>
          <div style="position: absolute; width: 155px;margin-top: 5px; margin-left: 165px;font-size: 6px;text-transform: uppercase;color: #000000;text-align: center;"><b><?php echo $r["nama_kabupaten"];?></b>
          </div>
          <div style="position: absolute; width: 300px;margin-top: 15px; margin-left: 350px;font-size: 18px;text-transform: uppercase;color: #ffffff;text-align: center;text-shadow: 3px 3px 3px #222;"><b>KARTU TANDA ANGGOTA</b>
          </div>
          <div style="position: absolute; width: 300px;margin-top: 40px; margin-left: 350px;font-size: 28px;text-transform: uppercase;color: #ffffff;text-align: center;text-shadow: 5px 5px 5px #222;"><b>PEMUDA PANCASILA</b>
          </div>
          <!-- Menampilkan nama panjang forum -->
          <div style="position: absolute; width: 200px;margin-top: 153px; margin-left: 16px;font-size: 11px;text-transform: uppercase;color: #ffffff;"><b><?php echo $r["name"];?></b>
            <p style="text-transform: inherit;font-size: 9px;margin-top: 2px;">No. KTA <?php echo $r["npa"];?><br><?php echo $r["jabatan"];?></p>
          </div>
          <div style="position: absolute; width: 300px;margin-top: 195px;font-size: 6px;text-transform: uppercase;color: #000000;text-align: center;margin-left: 5px;"><b><?php echo $iden["motto"];?></b>
          </div>
          <!-- Menampilkan Pas Photo User -->
          <img src="../assets/dist/img/user/<?php echo $r["gambar"];?>" style="position: absolute; width: 79px;height: 88px;margin-top: 25px; margin-left: 14px;background-size: cover;object-fit: cover;overflow: hidden;border-radius: 5px;"> 
          <!-- Menampilkan QRcode -->
          <img src="../assets/dist/img/qrcode/<?php echo $r["qrcode"];?>" style="position: absolute; width: 55px;margin-top: 136px; margin-left: 592px;background-size: cover;border-radius: 3px;border: 2px solid #ffffff;">  
          <!-- Menampilkan data pemilik kartu -->
          <table style="position: absolute; margin-top: 4px; margin-left: 100px;text-align: left;color: #000000;font-size: 8px;width: 225px;line-height: 7px;font-weight: bold;"> 
           <tr>
            <td style="vertical-align: baseline;width: 68px;">No. KTA</td> <!-- Untuh text diatas -->
            <td style="vertical-align: baseline">:</td>
            <td style="vertical-align: baseline"><?php echo "$r[npa]";?></td>
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
          </tr> letter-spacing: 1px;
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
          <tr>
            <td style="vertical-align: baseline">Kecamatan</td>
            <td style="vertical-align: baseline">:</td>
            <td style="vertical-align: baseline"><?php echo "$r[nama_kecamatan]";?></td>
          </tr>
          <tr>
            <td style="vertical-align: baseline">Kelurahan/Desa</td>
            <td style="vertical-align: baseline">:</td>
            <td style="vertical-align: baseline"><?php echo "$r[nama_kelurahan]";?></td>
          </tr>
        </table>
        <table border="0" cellspacing="0em" style="transition-property: inherit;margin-top: 110px;font-size: 4px;color: #000000;transition-property: 50px;position: relative;top: 0px;text-align: center;margin-left: 5px;"> 
          <tr>
            <td colspan="3" style="text-transform: inherit;text-transform: uppercase;letter-spacing: 1px;"><b>Majelis Pimpinan Nasional<br/>Pemuda Pancasila</b>
              <br/><br/><br/><br/><br/><br/><br/><br/>
              <td></td>
              <td colspan="3" style="text-transform: inherit;text-transform: uppercase;letter-spacing: 1px;"><br><b>Majelis Pimpinan Wilayah<br/>Pemuda Pancasila<br/>Provinsi  <?php $ii = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas INNER JOIN provinces ON identitas.id_prov = provinces.id_prov LIMIT 1"));  echo "$ii[nama_provinsi]"; ?></b><br/>
                <br/><br/><br/><br/><br/>
              </td>
            </tr>
            <tr>
              <td align="center" width="75">
                <span><img src="../assets/dist/img/ttd/ketum.png" style="transition-property: inherit;width: 65px;position: absolute;text-align: center;margin-top: -32px;margin-left: 12px;"></span>
                <b><u>KPH. H. Japto S. Soerjosoemarno, SH</u></b><br/>Ketua Umum
              </td>
              <td align="center">
                <span><img src="../assets/dist/img/ttd/cap_mpn.png" style="transition-property: inherit;width: 45px;position: absolute;text-align: left;margin-top: -45px;margin-left: -23px;"></span>
              </td> 
              <td align="center" width="75">
                <span><img src="../assets/dist/img/ttd/sekjen.png" style="transition-property: inherit;width: 65px;position: absolute;text-align: center;margin-top: -32px;margin-left: -18px;"></span>
                <b><u>H. Arif Rahman, SH</u></b><br/>Sekretaris Jendral
              </td>
              <td></td>
              <td align="center" width="75"><span><img src="../assets/dist/img/ttd/ketua.png" style="transition-property: inherit;width: 50px;position: absolute;text-align: center;margin-top: -22px;margin-left: 10px;"></span>
                <b><u>H. Hasnuryadi Sulaiman, M.AB</u></b><br/>Ketua
              </td> 
              <td align="center">
                <span><img src="../assets/dist/img/ttd/cap_mpw.png" style="transition-property: inherit;width: 45px;position: absolute;text-align: left;margin-top: -45px;margin-left: -23px;"></span>
              </td>
              <td align="center" width="75"><span><img src="../assets/dist/img/ttd/sek.png" style="transition-property: inherit;width: 50px;position: absolute;text-align: center;margin-top: -22px;margin-left: -22px;"></span><u><b>Khallkin  Nor</b></u><br/>Sekretaris
              </td>
            </tr>
          </table>
        </div>
        <br>
        <?php
      }
    }?>
  </body>
  </html>