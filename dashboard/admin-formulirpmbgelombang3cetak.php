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
    <?php $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas INNER JOIN provinces ON identitas.id_prov = provinces.id_prov LIMIT 1"));  echo "$iden[aplikasi]"; ?>
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
      window.location = "formulirpmbgelombang3" 
    },
    5000); 
  </script>   
  <body onload='window.print()' style="font-family: Times New Roman;font-size: 12px;">
   <?php
   $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas 
    INNER JOIN provinces ON identitas.id_prov = provinces.id_prov
    INNER JOIN regencies ON identitas.id_kab = regencies.id_kab
    INNER JOIN districts ON identitas.id_kec = districts.id_kec  
    INNER JOIN villages ON identitas.id_kel = villages.id_kel  LIMIT 1")); 
   $p=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM panitia_pmb
    WHERE id_panitia ='1'"));
   $r = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users INNER JOIN agama ON users.id_agm = agama.id_agm INNER JOIN jenis_kelamin ON users.id_jk = jenis_kelamin.id_jk
    INNER JOIN provinces ON users.id_prov = provinces.id_prov
    INNER JOIN regencies ON users.id_kab = regencies.id_kab
    INNER JOIN districts ON users.id_kec = districts.id_kec  
    INNER JOIN villages ON users.id_kel = villages.id_kel 
    INNER JOIN fakultas ON users.id_fak = fakultas.id_fak 
    INNER JOIN prodi ON users.id_pro = prodi.id_pro
    INNER JOIN jurusan ON users.id_jurusan = jurusan.id_jurusan
    INNER JOIN rekomendasi ON users.id_rekomendasi = rekomendasi.id_rekomendasi
    INNER JOIN almamater ON users.id_alm = almamater.id_alm
    INNER JOIN kebutuhan_khusus ON users.id_kk = kebutuhan_khusus.id_kk
    WHERE id_user='$_GET[id]'"));

   $tgl_lhr = date("d - m - Y", strtotime($r['tgl_lhr']));
   $tgl_input = date("d/m/Y", strtotime($r['tgl']));

   $pekerjaan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pekerjaan
    WHERE id_pekerjaan ='$r[pekerjaan_ayah]'"));
   $pendidikan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pendidikan
    WHERE id_pendidikan ='$r[pendidikan_ayah]'"));
   $penghasilan_ayah=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penghasilan
    WHERE id_penghasilan ='$r[penghasilan_ayah]'"));
   $pekerjaan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pekerjaan
    WHERE id_pekerjaan ='$r[pekerjaan_ibu]'"));
   $pendidikan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM pendidikan
    WHERE id_pendidikan ='$r[pendidikan_ibu]'"));
   $penghasilan_ibu=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM penghasilan
    WHERE id_penghasilan ='$r[penghasilan_ibu]'"));


    ?>
    <div style="width: 700px;">

      <img style="position: absolute;margin-left: 20px; width: 50px; " class="img-responsive" src="../assets/dist/img/logo/<?php echo "$i[logo]"; ?>">
      <center>
        <p style="padding-left:50px;padding-top: 5px;text-transform: uppercase;color: #ffc107;font-size: 24px;"><b><?php echo "$i[aplikasi]";?></b></p>
        <p style="padding-left:50px;text-transform: uppercase;font-size: 20px;color: #007bff;margin-top: -25px;"><b><?php echo "$i[nama]";?></b></p>
        <p style="padding-left:45px;text-transform: uppercase;color: #222;margin-top: -10px;font-family: Arial;font-size: 7px;"><b><?php echo "$i[alamat]";?>, Desa/Kelurahan <?php echo "$i[nama_kelurahan]";?>, Kecamatan <?php echo "$i[nama_kecamatan]";?>, <?php echo "$i[nama_kabupaten]";?>, PROVINSI <?php echo "$i[nama_provinsi]";?> <br/>Telp./HP <?php echo "$i[hp]"; ?> Whatsapp <?php echo "$i[wa]"; ?> EMAIL: <?php echo "$i[email]"; ?> </b></p>
        <div style="border-bottom: 1px solid #3c8dbc; margin-top: -6px;"></div>
        <div style="border-bottom: 2px solid #3c8dbc;padding-top: 1px;"></div>
      </center>
      <p style="border: 1px solid #222;width: 50px;text-align: center;margin-left: 640px;box-shadow: 0px 1px 1px 0px #222;">FP-<?php echo "$r[id_gel]";?></p>
      <table>  
        <tr>
          <td style="width: 170px;"><b>A. NOMOR PENDAFTARAN</b></td>
          <td>:</td>
          <td style="border: 1px solid black; text-align: center;width: 150px;"> <?php echo "$r[npm]";?></td>
          <td style="width: 10px;"></td>
          <td>NOMOR FORMULIR</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 200px;font-size: 9px;"><?php echo "$i[aplikasi]";?>/<?php echo "$r[npm]";?>/<?php echo "$tgl_input";?></td>
        </tr>
      </table>

      <table>  
        <tr>
          <td colspan="3" style="padding-top: 10px;"><b>B. DATA CALON MAHASISWA BARU</b></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;">1. Nama</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[name]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;">2. Tempat, Tgl Lahir</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[tmp_lhr]";?>, <?php echo "$tgl_lhr";?></td>
        </tr> 

        <tr>
          <td style="padding-left: 15px;width: 155px;">3. Jenis Kelamin</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_jk]";?></td>
        </tr> 

        <tr>
          <td style="padding-left: 15px;width: 155px;">4. Alamat</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alamat]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;"> &nbsp;&nbsp;&nbsp;&nbsp;Kelurahan/Desa</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_kelurahan]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;"> &nbsp;&nbsp;&nbsp;&nbsp;Kecamatan</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_kecamatan]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;"> &nbsp;&nbsp;&nbsp;&nbsp;Kota/Kabupaten</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_kabupaten]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;"> &nbsp;&nbsp;&nbsp;&nbsp;Provinsi</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_provinsi]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;"> &nbsp;&nbsp;&nbsp;&nbsp;Telp./Hp.</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[hp]";?></td>
        </tr>

        <tr>
          <td style="padding-left: 15px;width: 155px;">5. Agama</td>
          <td>:</td>
          <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;">  
           <?php echo "$r[nama_agm]";?>
         </td>
       </tr>

       <tr>
        <td style="padding-left: 15px;width: 155px;">6. Asal Sekolah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[sekolah]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">7. Alamat Sekolah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alamat_sekolah]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">8. Jurusan</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_jurusan]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">9. Tahun Lulus</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[thn_lulus]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">10. Nomor Ijazah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[no_ijazah]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">11. Tahun Ijazah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[thn_ijazah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">12. Nilai Rata-rata</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nilai_rr]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">13. Prestasi</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[prestasi]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">14. Ukuran Jaket Almamater</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_alm]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">15. Kebutuhan Khusus</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_kk]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">16. NIK</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nik]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">17. NISN</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nisn]";?></td>
      </tr>

    </table>

    <table>  
      <tr>
        <td colspan="3" style="padding-top: 10px;"><b>C. DATA KELUARGA</b></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">1. NIK Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nik_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">2. Nama Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;"> 3. Telp./Hp Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[hp_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">4. Pendidikan Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $pendidikan_ayah['nama_pendidikan'];?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">5. Pekerjaan Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $pekerjaan_ayah['nama_pekerjaan'];?> </td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">6. Jabatan Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[jabatan_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">7. Penghasilan Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $penghasilan_ayah['nama_penghasilan'];?> /</td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">8. Kantor Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[kantor_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">9. Alamat Kantor Ayah</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alamat_kantor_ayah]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">10. NIK Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nik_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">11. Nama Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">12. Telp./Hp Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[hp_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">13. Pendidikan Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $pendidikan_ibu['nama_pendidikan'];?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">14. Pekerjaan Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $pekerjaan_ibu['nama_pekerjaan'];?> </td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">15. Jabatan Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[jabatan_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">16. Penghasilan Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo $penghasilan_ibu['nama_penghasilan'];?> /</td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">17. Kantor Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[kantor_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">18. Alamat Kantor Ibu</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alamat_kantor_ibu]";?></td>
      </tr>
      <tr>
        <td style="padding-left: 15px;width: 155px;">19. Alamat Orangtua</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alamat_ortu]";?></td>
      </tr>

      <tr>
        <td style="padding-left: 15px;width: 155px;">20. Alasan Memilih SAINTEK MU</td>
        <td>:</td>
        <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[alasan_ortu]";?></td>
      </tr>
    </table>
    <br/>
    <br/>
    <br/>
    <table>
      <tr>
        <td style="padding-top: 10px;"><b>D. DATA FAKULTAS DAN PROGRAM STUDI</b></td>
      </tr>
      <tr>
        <td>
          <table>  

            <tr>
              <td style="padding-left: 15px;width: 155px;">1. Fakultas Pilihan</td>
              <td>:</td>
              <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_fak]";?></td>
            </tr>

            <tr>
              <td style="padding-left: 15px;width: 155px;">2. Program Studi Pilihan</td>
              <td>:</td>
              <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;width: 500px;"><?php echo "$r[nama_pro]";?></td>
            </tr> 

          </td>
        </tr> 
      </table>

      <table>
        <tr>
          <td style="padding-top: 10px;"><b>E. MENGETAHUI SAINTEK MU DARI?</b></td>
          <td style="border: 1px solid #222;width: 200px;text-align: center;position: absolute;border-radius: 4px;"><i>Yang Memberikan Rekomendasi:</i><b> <br><?php echo "$r[rekomendasi]";?></b></td>
        </tr>
        <tr>
          <td >
            <?php echo "$r[nama_rekomendasi]";?>
          </td>
        </tr> 
      </table>
      <table>
        <tr>
          <td colspan="3" style="text-align: right;padding-right: 40px;">Jakarta, <?php echo "$tgl_input";?></td>
        </tr>
        <tr>
          <td style="text-align: center;"><?php echo "$p[jabatan]";?> PMB</td>
          <td style="text-align: center;"></td>
          <td style="text-align: center;">Calon Mahasiswa Baru</td>
        </tr>
        <tr>
          <td style="text-align: center; width: 200px;"><img src="../assets/dist/img/logo/<?php echo "$p[qrcode]";?>" style="width: 50px;"><br><b style="text-transform: uppercase;"><?php echo "$p[nama_panitia]";?></b><br>NIDN. <?php echo "$p[nidn]";?></td>
          <td style="text-align: center;width: 300px"><img src="../assets/dist/img/user/<?php echo "$r[gambar]";?>" style="width: 85px;height: 113px;background-size: cover;object-fit: cover;overflow: hidden;border-radius: 5px;border: 2px solid #222;margin-left: -45px; margin-top: -50px;"></td>
          <td style="text-align: center;width: 200px;;"><b style="text-transform: uppercase;"><br><br><br><?php echo "$r[name]";?></b></td>
        </tr>
      </table>

      <img src="../assets/dist/img/logo/cut.png" style="width: 20px;position: absolute;margin-left: 330px;margin-top: 6px;">
      <p style="text-transform: uppercase;border-bottom-style:dashed ;border-width: 1px;width: 700px;"></p>
      <table>
        <tr>
          <td ><img src="../assets/dist/img/user/<?php echo "$r[gambar]";?>" style="width: 85px;height: 113px;background-size: cover;object-fit: cover;overflow: hidden;border-radius: 5px;border: 2px solid #222;"></td>
          <td>
            <table style="border: 1px solid #222;padding: 15px;margin-left: 10px;border-radius: 4px; text-transform: uppercase;font-size: 9px;">
              <tr>
                <td width="140px">No. Pendaftaran</td>
                <td>: </td>
                <td style="border: 1px solid black; text-align: left;width: 300px;"> <?php echo "$r[npm]";?></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[name]";?></td>
              </tr>
              <tr>
                <td>Fakultas Pilihan</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[nama_fak]";?></td>
              </tr>
              <tr>
                <td>Program Studi Pilihan</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[nama_pro]";?></td>
              </tr>
              <tr>
                <td>Asal Sekolah/Jurusan</td>
                <td>:</td>
                <td style="text-transform: uppercase;border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[sekolah]";?>/<?php echo "$r[nama_jurusan]";?></td>
              </tr>
              <tr>
                <td>No. Formulir</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$i[aplikasi]";?>/<?php echo "$r[npm]";?>/<?php echo "$tgl_input";?></td>
              </tr>
              <tr>
                <td>No. Handphone</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[hp]";?></td>
              </tr>
              <tr>
                <td>Ukuran Jaket Almamater</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[nama_alm]";?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td style="border-bottom-style: dotted;border-width: 1px;"><?php echo "$r[alamat]";?> Desa/kelurahan <?php echo "$r[nama_kelurahan]";?> Kecamatan. <?php echo "$r[nama_kelurahan]";?> <?php echo "$r[nama_kabupaten]";?> Provinsi <?php echo "$r[nama_provinsi]";?></td>
              </tr>
            </table>
          </td>
          <td>
            <table style="border: 1px solid #222;padding: 9px;margin-left: 10px;border-radius: 4px;">
              <tr>
                <td style="text-align: center;"><?php echo "$p[jabatan]";?> PMB<td>
                </tr>
                <tr>
                  <td style="text-align: center;"><img src="../assets/dist/img/logo/<?php echo "$p[qrcode]";?>" style="width: 50px;"></td>
                </tr>
                <tr>
                  <td style="text-align: center;"><b><?php echo "$p[nama_panitia]";?></b><br>NIDN. <?php echo "$p[nidn]";?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <p style="text-transform: uppercase;border-bottom-style:dashed;border-width: 1px;width: 700px;"></p>


      </body>
      </html>