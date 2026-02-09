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
      $no = 1;
      if(isset($_GET['id_kab']) ){

        $idkab= $_GET['id_kab'];
        $sql = mysqli_query($con, "SELECT * FROM users  
          INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk 
          INNER JOIN pendidikan ON users.id_pendidikan = pendidikan.id_pendidikan 
          INNER JOIN pekerjaan ON users.id_pekerjaan = pekerjaan.id_pekerjaan WHERE id_kab IN ('$idkab') AND status_data = '1' AND id_level = '3'");
      }

      while($data = mysqli_fetch_array($sql)){
       $tt = date("d - m - Y", strtotime($data['tgl_lhr']));
       $d2=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN provinces ON users.id_prov = provinces.id_prov
        INNER JOIN regencies ON users.id_kab = regencies.id_kab
        INNER JOIN districts ON users.id_kec = districts.id_kec  
        INNER JOIN villages ON users.id_kel = villages.id_kel  WHERE id_user ='$data[id_user]'"));
        ?>
        <tr>
          <td style='border-bottom:1px solid #eee;'><?php echo $no++; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['npa']; ?></td>
          <td style='border-bottom:1px solid #eee;'>'<?php echo $data['nik']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['name']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['jabatan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['nama_jeniskeanggotaan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['nama_jk']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['nama_agm']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['tmp_lhr']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $tt ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['nama_pekerjaan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['nama_pendidikan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['alamat']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['tgl_bergabung']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $d2['nama_kelurahan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $d2['nama_kecamatan']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $d2['nama_kabupaten']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $d2['nama_provinsi']; ?></td>
          <td style='border-bottom:1px solid #eee;'><?php echo $data['email']; ?></td>
          <td style='border-bottom:1px solid #eee;'>'<?php echo $data['hp']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</body>
</html>