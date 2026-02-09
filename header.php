<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo "$aplikasi"; ?></title>
  <meta content="SAINTEK MU" name="Web Pendaftaran Mahasiswa Baru |SAINTEK MU">
  <meta content="SAINTEK MU" name="Web, Pendaftaran, Mahasiswa, Baru, UNWIKU, PURWOKERTO">
  <link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$logo"; ?>">
  <link href="pmb/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="pmb/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="pmb/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="pmb/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="pmb/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="pmb/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="pmb/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="pmb/assets/css/style.css" rel="stylesheet">
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <!-- or -->
  <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap');
  </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
  <style type="text/css">

    a.popup-link {
      padding:17px 0;
      text-align: center;
      margin:20% auto;
      position: relative;
      width: 300px;
      color: #fff;
      text-decoration: none;
      background-color: #FFBA00;
      border-radius: 3px;
      box-shadow: 0 5px 0px 0px #eea900;
      display: block;
    }
    a.popup-link:hover {
      background-color: #ff9900;
      box-shadow: 0 3px 0px 0px #eea900;
      -webkit-transition:all 1s;
      transition:all 1s;
    }
    /* end link popup*/
    /* animasi popup */

    @-webkit-keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    @-moz-keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    @keyframes autopopup {
      from {opacity: 0;margin-top:-200px;}
      to {opacity: 1;}
    }
    /* end animasi popup */
    /*style untuk popup */  
    #popup {
      background-color: rgba(0,0,0,0.8);
      position: fixed;
      top:0;
      left:0;
      right:0;
      bottom:0;
      margin:0;
      -webkit-animation:autopopup 2s;
      -moz-animation:autopopup 2s;
      animation:autopopup 2s;
    }
    #popup:target {
      -webkit-transition:all 1s;
      -moz-transition:all 1s;
      transition:all 1s;
      opacity: 0;
      visibility: hidden;
    }

    @media (min-width: 768px){
      .popup-container {
        width:600px;
      }
    }
    @media (max-width: 767px){
      .popup-container {
        width:100%;
      }
    }
    .popup-container {
      position: relative;
      margin:6% auto;
      padding:30px 30px;
      background-color: #fafafa;
      color:#333;
      border-radius: 30px;
      border-bottom: 5px solid #00c0ef;
      border-top: 5px solid #00c0ef;
    }

    a.popup-close {
      position: relative;
      top:17px;
      right:3px;
      background-color: #f56954;
      padding:7px 10px;
      font-size: 20px;
      text-decoration: none;
      line-height: 1;
      color:#fff;
    }
    /* end style popup */

  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <div class="media">
          <a class="pull-left" href="./">
            <img  style="padding-right: 10px;" src="assets/dist/img/logo/<?php echo "$i[logo] "; ?>" class="img-responsive" alt="Responsive image" >

          </a>
          <div class="media-body" type="button" onclick="window.location.href='./'">
            <h6  style="font-family: 'Orbitron', sans-serif;text-transform: uppercase;margin-top: 5px;" class="media-heading"><?php echo "$i[aplikasi] "; ?><p style="font-size: 8px; margin-top: 0;position: relative;text-transform: uppercase;color: #6610f2;letter-spacing: 0;"><b><?php echo "$kampus"; ?></b></p>
            </div>
          </div>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a type="button" onclick="window.location.href='./'"><i class="fa fa-home"></i> Beranda</a></li>
            <li><a  type="button" onclick="window.location.href='#biaya'"><i class="fa fa-file-text"></i> Biaya Pendaftaran</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag"></i> Profil <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#prodi">Program Studi</a></a></li>
                <li><a href="#gallery">Galeri</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
              </ul>
            </li>
            <li><a href="#faq"><i class="fa fa-question-circle"></i> Faq</a></li>
            <li><a href="#contact"><i class="fa fa-phone-square"></i> Kontak</a></li>
            <li><a type="submit" onclick="window.location.href='dashboard/daftar'"><span class="badge badge-warning" style="padding: 5px;"><i class='fa fa-user-plus faa-shake animated'></i> Daftar</span></a></li>
            <li>

              <a href="./login" ><i class='fa fa-sign-in faa-pulse faa-passing animated'></i> Masuk</a></li>

            </ul>
          </nav><!-- .nav-menu -->

        </div>
      </header>