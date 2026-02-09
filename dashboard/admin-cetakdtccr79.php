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
    <?php $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1"));  echo "$i[aplikasi] "; ?>
  </title>
  <link rel="shortcut icon" href="../assets/dist/img/logo/<?php echo "$i[logo]"; ?>">
   <style type="text/css">
    img {
      width: 100%;
      height: auto;
    }
    .blangko{
      position: relative;
      z-index: 1;
      top: 0px;
      height: 100%;
    }
    .logo{
      position: absolute;
      z-index: 1;
      top: 0px;
      width: 10%;
      margin-top: 100px;
      margin-left: 130px;
    }
    
    h1{
      position: absolute;
      top: 20px;
      z-index: 2;
      margin-top: 35px;
      font-size:  70px;
      font-weight: bold;
      position: center;
      text-align: center;
      width: 1600px;
      margin-left: 100px;
      font-color:#000000;
      text-transform: uppercase;
      /* border:1px solid #222;*/
    }

    h2{
      position: absolute;
      top: 20px;
      z-index: 2;
      margin-top: 35px;
      font-size:  70px;
      font-weight: bold;
      position: center;
      text-align: center;
      width: 1600px;
      margin-left: 1700px;
      font-color:#000000;
      text-transform: uppercase;
      /*border:1px solid #222;*/
    }
    h3{
      position: absolute;
      top: 20px;
      z-index: 2;
      margin-top: 1550px;
      margin-left: 2000px;
      font-size:  100px;
      color: #ffffff;
      position: center;
      text-align: left;
      width: 2100px;
      height: 400px;
      text-transform: uppercase;
      line-height: 1em;
    }
    .photo{
      position: absolute;
      border-radius: 50px;
      z-index: 1;
      top: 0px;
      width: 800px;
      height: 950px;
      margin-top: 220px;
      background-size: cover; 
      object-fit: cover;
      overflow: hidden;
      margin-left: 100px;
      /*border: 20px solid #bbb7b6;*/
    }
    .qrcode{
      position: absolute;
      z-index: 1;
      top: 0px;
      width: 17%;
      margin-top: 3400px;
      background-size: cover; 
      object-fit: cover;
      overflow: hidden;
      margin-left: 2500px;
      border-radius: 20px;
      border:20px solid #ffffff;
    }
    .p{
      font-size:  70px;
    }
    .jabatan{
      position: absolute;
      top: 20px;
      z-index: 2;
      margin-top: 2820px;
      color: #000000;
      position: center;
      text-align: center;
      width: 1925px;
      height: 400px;
      margin-left: 50px;
      line-height: 80px;
    }
    .border{
      position: absolute;
      top: 20px;
      z-index: 2;
      color: #000000;
      margin-top: 3330px;
      margin-left: 100px;
      margin-right: 100px;
      margin-bottom: 100px;
      font-size:  80px;
      border:15px solid #222;
      border-radius: 25px;
      width: 1800px;
      height: 3020px;
      text-align: center;
      font-size:  70px;
    }

  </style>
  <body onload='window.print()' style="font-family: Arial;">

    <?php $blangko=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM blangko WHERE id='2'"));
    $data=mysqli_query($con, "SELECT * FROM users INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
      INNER JOIN provinces ON users.id_prov = provinces.id_prov
      INNER JOIN regencies ON users.id_kab = regencies.id_kab
      INNER JOIN districts ON users.id_kec = districts.id_kec  
      INNER JOIN villages ON users.id_kel = villages.id_kel 
      INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
      INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan 
       WHERE id_user='$_GET[id]'");
    while($r=mysqli_fetch_array($data))
    {
      $tgl = date("d - m - Y", strtotime($r['tgl']));
      $tgl_b = date("Y-m-d", strtotime($r['tgl_berlaku']));

      function tanggal_indo($tanggal, $cetak_hari = false)
      {
        $hari = array ( 1 =>    'Senin',
          'Selasa',
          'Rabu',
          'Kamis',
          'Jumat',
          'Sabtu',
          'Minggu'
        );

        $bulan = array (1 =>   'Januari',
          'Februari',
          'Maret',
          'April',
          'Mei',
          'Juni',
          'Juli',
          'Agustus',
          'September',
          'Oktober',
          'November',
          'Desember'
        );
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        if ($cetak_hari) {
          $num = date('N', strtotime($tanggal));
          return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
      }

      ?>
    
      <!-- Mengambil bg depan -->
      <img class="blangko" src="../assets/dist/img/blangko/<?php echo $blangko["gambar"];?>">
      <!-- Mengambil bg belakang -->
      <img class="blangko" src="../assets/dist/img/blangko/<?php echo $blangko["gambar1"];?>">
      <!-- Mengambil judul kartu -->
      <h1><?php echo "$r[nama_provinsi]"; ?></h1>  <h2><?php echo "$r[nama_kabupaten]"; ?></h2> 
      <!-- Mengambil photo anggota -->
      <img class="photo" src="../assets/dist/img/user/<?php echo $r["gambar"];?>">
      <img class="logo" style="transition-property: inherit;margin-top: 2950px;width: 1000px;padding-left: 1010px;" src="../assets/dist/img/logo/<?php echo $i["logo"]; ?>">
      <!-- Mengambil judul kartu -->
      <h1 style="transition-property: inherit;margin-top: 1910px;width: 3150px;"><?php echo "$i[motto]"; ?></h1> 
      <h1 style="transition-property: inherit;margin-top: 2250px;width: 3150px;color:#ffffff;font-size: 180px;text-shadow: 5px 5px 5px #222;">KARTU TANDA ANGGOTA</h1> 
      <h1 style="transition-property: inherit;margin-top: 2460px;width: 3150px;color:#ffffff;font-size: 280px;text-shadow: 10px 10px 10px #222;">PEMUDA PANCASILA</h1> 
      <table cellspacing="1em" style="transition-property: inherit;margin-top:  220px;font-size: 80px;transition-property:650px;width: 2300px;position: absolute;margin-left: 1000px;z-index: 1;top: 0px;height: 2000px;font-weight: bold;line-height: 1.40em;"> 
        <tr>
          <td style="vertical-align: baseline;width: 700px;">No. KTA</td> <!-- Untuh text diatas -->
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
        </tr> 
        <tr>
          <td style="vertical-align: baseline">Tempat/Tgl. Lahir</td>
          <td style="vertical-align: baseline">:</td>
          <td style="text-transform: uppercase;vertical-align: baseline"><?php echo "$r[tmp_lhr]";?> / <?php echo "$tgl";?></td>
        </tr>
        <tr>
          <td style="vertical-align: baseline">Agama</td>
          <td style="vertical-align: baseline">:</td>
          <td style="text-transform: uppercase;vertical-align: baseline"><?php echo "$r[nama_agm]";?></td>
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

      <!-- Mengambil Kode QR -->
      <img class="qrcode" src="../assets/dist/img/qrcode/<?php echo $r["qrcode"];?>">
    

      <table border="0" cellspacing="0em" style="transition-property: inherit;margin-top: 1300px;font-size: 60px;color: #000000;transition-property: 500px;position: absolute;border-radius: 50px;z-index: 1;top: 0px;position: center;text-align: center;font-size: 45px;margin-left: 50px;margin-right: 50px;"> 
        <tr>
          <td colspan="3" style="text-transform: inherit;text-transform: uppercase;letter-spacing: 10px;"><b>Majelis Pimpinan Nasional<br/>Pemuda Pancasila</b><br/><br/>
            <br/><br/><br/><br/>
          </td>
          <td width="50"></td>
          <td colspan="3" style="text-transform: inherit;text-transform: uppercase;letter-spacing: 10px;"><br><b>Majelis Pimpinan Wilayah<br/>Pemuda Pancasila<br/>Provinsi <?php echo "$i[nama_provinsi]";?></b><br><br/>
            <br/><br/><br/><br/>
          </td>
        </tr>
        <tr>
          <td align="center" width="1000">
            <span><img src="../assets/dist/img/ttd/ketum.png" style="transition-property: inherit;width: 650px;position: absolute;text-align: center;margin-top: -310px;padding-right: 150px;padding-left: 150px;"></span>
            <b><u>KPH. H. Japto S. Soerjosoemarno, SH</u></b><br/>Ketua Umum
          </td> 
          <td align="center">
            <span><img src="../assets/dist/img/ttd/cap_mpn.png" style="transition-property: inherit;width: 450px;position: absolute;text-align: center;margin-top: -450px;margin-left: -280px;"></span>
          </td>
          <td align="center" width="1000">
            <span><img src="../assets/dist/img/ttd/sekjen.png" style="transition-property: inherit;width: 650px;position: absolute;text-align: center;margin-top: -310px;padding-right: 150px;padding-left: 150px;margin-left: -330px;"></span>
            <b><u>H. Arif Rahman, SH</u></b><br/>Sekretaris Jendral
          </td>

          <td></td>

          <td align="center" width="1000"><span><img src="../assets/dist/img/ttd/ketua.png" style="transition-property: inherit;width: 450px;position: absolute;text-align: center;margin-top: -250px;padding-right: 150px;padding-left: 150px;"></span>
            <b><u>H. Hasnuryadi Sulaiman, M.AB</u></b><br/>Ketua
          </td> 
          <td align="center">
            <span><img src="../assets/dist/img/ttd/cap_mpw.png" style="transition-property: inherit;width: 450px;position: absolute;text-align: left;margin-top: -450px;margin-left: -230px;"></span>
          </td>
          <td align="center" width="1000"><span><img src="../assets/dist/img/ttd/sek.png" style="transition-property: inherit;width: 450px;position: absolute;text-align: center;margin-top: -250px;margin-left: -320px;padding-right: 150px;padding-left: 150px;"></span><u><b>Khallkin  Nor</b></u><br/>Sekretaris
          </td>
        </tr>
      </table>
    <?php } ?>
  </body>
  </html>
  <script type="text/javascript">
    setTimeout
    (
      function()
      {
        window.location = "cetakkta" 
      },
        5000); // waktu tunggu atau delay
      </script>