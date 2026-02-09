<?php require_once "controllerUserData.php"; ?>
<?php $iden = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas LIMIT 1")); ?>
<?php if ($iden['popup']==1) {
  # code...
  echo "";?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta http-equiv="no-cache"> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/dist/img/logo/<?php echo "$iden[logo]";?>">
    <title><?php echo "$iden[aplikasi]";?></title>
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/dist/css/style.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome-4.7.0/css/font-awesome-animation.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Data Aos -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript">
      AOS.init();
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link href="assets/dist/fontcss/bungakuy.css" rel="stylesheet">
  </head>
  <body style="background: <?php echo "$iden[bg]";?>;margin-top: 30px;">
   <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <center>
          <div class="login-logo animate__animated animate__pulse" style="font-size: 25px;">
            <a type="button" onclick="window.location.href='<?php echo "$iden[url]";?>'" style="color:#ffffff;">
              <img src="assets/dist/img/logo/<?php echo "$iden[logo]";?>" width=80><br>
              <b class="text-navy" style="text-transform: uppercase;font-weight: bold;text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em  #FFFFFF, 0 0 0.2em #FFFFFF;">Aplikasi <?php echo "$aplikasi";?><br> <?php echo "$iden[nama]";?></b>
            </a>
          </div>
        </center>
      </div>
      <div class="col-sm-4">
        <center>
          <div class="login-box">
            <div class="card shadow">
              <div class="card-body login-card-body" style="border-radius: 20px;border-top:5px solid #001f3f;border-bottom:5px solid #001f3f;">
                <p class="login-box-msg ketikan small" style="width: 150px; background-color: #001f3f ; color: #fff;margin-top: -21px;padding-top: 3px;border-bottom-left-radius: 20px;border-bottom-right-radius:20px;padding-bottom: 5px;font-size: 10px;"><b><i class="fa fa-dot-circle-o  faa-pulse faa-vertical animated"></i> LOGIN APLIKASI<i class="fa fa-dot-circle-o  faa-pulse faa-vertical animated"></i></b></p>

                <form action="login" method="post" autocomplete="" class="form-horizontal" role="form">
                  <?php if(count($errors) > 0)
                  { ?>
                    <br/>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <strong>
                        <?php
                        foreach($errors as $showerror)
                        {
                          echo $showerror;
                        }
                        ?>

                      </strong>
                    </div>
                    <?php
                  }
                  ?>
                  <label style="padding-top: 10px;">Silahkan isi form login berikut!</label>
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="true">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-envelope faa-pulse faa-vertical animated"></span>
                      </div>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fa fa-key faa-pulse faa-shake animated"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button type="submit" name="login" class="btn btn-primary btn-sm pull-left" style="width: 45%"><i class="fa fa-sign-in faa-tada animated-hover"></i> Masuk</button>
                      <button type="button" onclick="window.location.href='./'" class="btn btn-danger btn-sm pull-right" style=";width: 45%"><i class="fa fa-times-circle faa-tada animated-hover"></i> Batal</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
                <div class="row">
                
                  <div class="col-12">
                    <center>
                      Lupa password?
                      <a style="border-radius: 20px;border: 2px solid #EFE4E4;width: 100%;" onclick="window.location.href='forgotpassword'" class="btn btn-xs b-info"><i class="fa fa-key faa-tada animated-hover"></i> Reset Sekarang</a>
                    </center>
                  </div>
                </div>

                <footer>
                  <center>
                    <hr>
                    <p style="font-size: 12px;"> 
                      <b>
                        Copyright <i class="fa fa-copyright"></i> <?php echo date("Y");?> | Aplikasi <?php echo "$iden[aplikasi]";?><br>
                      </b>
                    </p>
                  </center>    
                </footer>

              </div>
            </div>
          </div>
        </center>
      </div>
      <!-- /.login-logo -->
      <div class="col-sm-8">
        <center>
          <div class="position-relative" style="min-height: 180px;">
            <img src="assets/dist/img/bg/<?php echo "$iden[gif]"; ?> " alt="Photo 3" class="img-fluid img-thumbnail card shadow">
            <div class="ribbon-wrapper ribbon-xl">
              <div class="ribbon <?php echo "$iden[color]"; ?> text-sm">
                <small><?php echo "$iden[aplikasi]"; ?></small>
              </div>
            </div> 
          </div>
        </center>
      </div>


    </div> 
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Menampilkan Data Tooltip -->
    <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
    <!-- SweetAlert2 -->
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>

  </body>
  </html>
<?php } elseif ($iden['popup']==0) {
  echo "";
  header('Location: ./');
} ?>