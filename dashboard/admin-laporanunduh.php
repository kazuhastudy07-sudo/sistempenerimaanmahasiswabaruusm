<?php

$tgl_hi = date("d/m/Y");
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=Data Anggota $tgl_hi.xls");

include "../assets/config/koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    <?php $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); echo "$iden[aplikasi]";  ?></title>
  </head>
  <body>

    <table>
      <tr>
        <th colspan="20" align="left" style="font-size: 14px;text-transform: uppercase;"><h1>DATA ANGGOTA <?php echo "$iden[nama]";  ?></h1></th>
      </tr>
      <tr style="height: 50px;color:#fff; text-align: left;">
        <th style="background: #dc3545;width: 50px;">NO</th>
        <th style="background: #dc3545; text-align: left;">No. KTA</th>
        <th style="background: #dc3545; text-align: left;">NIK</th>
        <th style="background: #dc3545; text-align: left;">NAMA</th>
        <th style="background: #dc3545; text-align: left;">JABATAN</th>
        <th style="background: #dc3545; text-align: left;">KEANGGOTAAN</th>
        <th style="background: #dc3545; text-align: left;">JK</th>
        <th style="background: #dc3545; text-align: left;">AGAMA</th>
        <th style="background: #dc3545; text-align: left;">TEMPAT LAHIR</th>
        <th style="background: #dc3545; text-align: left;">TANGGAL LAHIR</th>
        <th style="background: #dc3545; text-align: left;">PEKERJAAN</th>
        <th style="background: #dc3545; text-align: left;">PENDIDIKAN</th>
        <th style="background: #dc3545; text-align: left;">ALAMAT</th>
        <th style="background: #dc3545; text-align: left;">KODE POS</th>
        <th style="background: #dc3545; text-align: left;">DESA/KELURAHAN</th>
        <th style="background: #dc3545; text-align: left;">KECAMATAN</th>
        <th style="background: #dc3545; text-align: left;">KABUPATEN</th>
        <th style="background: #dc3545; text-align: left;">PROVINSI</th>
        <th style="background: #dc3545; text-align: left;">EMAIL</th>
        <th style="background: #dc3545; text-align: left;">HANDPHONE</th>
        <?php
        $from=$_POST['from'];
        $end=$_POST['end'];
        $tampil = mysqli_query($con, "SELECT * FROM users  
          INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
          INNER JOIN provinces ON users.id_prov = provinces.id_prov
          INNER JOIN regencies ON users.id_kab = regencies.id_kab
          INNER JOIN districts ON users.id_kec = districts.id_kec  
          INNER JOIN villages ON users.id_kel = villages.id_kel 
          INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
          INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan WHERE (tgl BETWEEN '$from' AND '$end') AND status_data = '1' AND id_level = '3' ORDER BY id_user DESC");

        $no=1;
        while ($r=mysqli_fetch_assoc($tampil))
        {

          $tgl = date("d - m - Y", strtotime($r['tgl_lhr']));
          echo "
          <tr>
          <td style='border-bottom:1px solid #eee;'><center>$no.</center></td>
          <td style='border-bottom:1px solid #eee;'>'$r[npa]</td>
          <td style='border-bottom:1px solid #eee;'>'$r[nik]</td>
          <td style='border-bottom:1px solid #eee;'>$r[name]</td>
          <td style='border-bottom:1px solid #eee;'>$r[jabatan]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_jeniskeanggotaan]</td>
          <td style='border-bottom:1px solid #eee;'>'$r[nama_jk]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_agm]</td>
          <td style='border-bottom:1px solid #eee;'>$r[tmp_lhr]</td>
          <td style='border-bottom:1px solid #eee;'>$tgl</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_pekerjaan]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_pendidikan]</td>
          <td style='border-bottom:1px solid #eee;'>$r[alamat]</td>
          <td style='border-bottom:1px solid #eee;'>$r[tgl_bergabung]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_kelurahan]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_kecamatan]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_kabupaten]</td>
          <td style='border-bottom:1px solid #eee;'>$r[nama_provinsi]</td>
          <td style='border-bottom:1px solid #eee;'>$r[email]</td>
          <td style='border-bottom:1px solid #eee;'>'$r[hp]</td>
          </tr>";
          $no++;
        }
        ?>

      </tr>
    </table>


  </body>
  </html>