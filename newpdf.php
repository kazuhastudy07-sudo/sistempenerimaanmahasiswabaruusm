<?php
session_start();
error_reporting(1);


include 'assets/config/koneksi.php';
// $nama_dokumen='E-KARPEG KEJAGUNG RI';
// define('_MPDF_PATH', 'assets/plugins/MPDF57/');
// include(_MPDF_PATH."mpdf.php");
// $mpdf=new mPDF('utf8', 'A4');

?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title><?php $i = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
</head>
<style type="text/css">
  img {
    width: 100%;
    height: auto;
  }
  .blangko{
    position: relative;
    z-index: 1;
    top: 0px;
    } 
    .logo{
      position: absolute;
      z-index: 1;
      top: 0px;
      width: 27%;
      margin-top: 60px;
      margin-left: -750px;
    }
    .photo{
      position: absolute;
      z-index: 1;
      top: 0px;
      width: 1405px;
      height: 1570px;
      margin-top: 1250px;
      background-size: cover; 
      object-fit: cover;
      overflow: hidden;
      margin-left: 308px;
    }
    .qrcode{
      position: absolute;
      z-index: 1;
      top: 0px;
      width: 60%;
      margin-top: 4600px;
      background-size: cover; 
      object-fit: cover;
      overflow: hidden;
      margin-left: 410px;
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
    h1{
      position: absolute;
      top: 20px;
      z-index: 2;
      color: #fff;
      margin-top: 630px;
      font-size:  150px;
      font-weight: bold;
      color: #000000;
      position: center;
      text-align: center;
      width: 1930px;
      margin-left: 50px;
      text-transform: uppercase;
    }
    h2{
      position: absolute;
      top: 20px;
      z-index: 2;
      margin-top: 800px;
      font-size:  130px;
      color: #000000;
      position: center;
      text-align: center;
      width: 1930px;
      height: 400px;
      margin-left: 50px;
      text-transform: uppercase;
    }
    h3{
      text-transform: uppercase;
      font-size: 100px;
      text-align: center;
    }

  </style>
  <body style="font-family: arial;">
    <?php 
      ?>
      <img class="blangko" src="assets/dist/img/blangko/ekarpeg/yellow.png">

      <img class="logo" src="assets/dist/img/logo/<?php echo $i["logo"]; ?>">
      </body>
      </html>
      <?php
  // $html = ob_get_contents();
  // ob_end_clean();
  // $mpdf->WriteHTML(utf8_encode($html));
  // $mpdf->Output($nama_dokumen.".pdf", 'I');
  // exit;
      ?>