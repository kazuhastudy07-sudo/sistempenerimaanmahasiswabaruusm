<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a type="button" onclick="window.location.href='administrator'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a type="button" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="fa fa-dashboard (alias)"></i></a></li>
                <li class="breadcrumb-item active">Data Background dan Url </li>
              </ol>
            </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <?php
    if(isset($_GET['alert'])){
      if($_GET['alert']=="berhasil"){

        ?>
        <script type="text/javascript">
          $(function() {
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 1000
            });

            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              timer: 1000,
              timerProgressBar: true,
              title: 'BERHASIL!',
              text: 'Background Berhasil Diupdate',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "background";
            });
          });
        </script>
        <?php
      }       
    }
    ?>
    <!-- Default box -->
    <div class="card">
      <div class="card-header ">
        <h3 class="card-title"><b><i class="fa fa-institution (alias)"></i> Form Ubah Data Background dan Url</b></h3>
        <div class="card-tools">
          <div class="btn-group">
            <a type="button" class="btn btn-xs bg-info" onclick="window.location.href='./'"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
          </div>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">
            <form class='form-horizontal' role='form' method=POST action='action/background_update.php' enctype='multipart/form-data'>
              <?php
              $r=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas 
                WHERE id ='1'"));
              $color = explode(', ', $r['color']);
              ?>

              <div class="form-group">
                <div class="row"> 
                  <div class="col-sm-6 col-xs-6">
                    <label>DASHBOARD PANEL<span class="badge text-red"><a class="dropdown-item small badge <?php echo "$iden[color]"; ?>" onclick="window.location.href='admin-dtcunduh.php?nama_file=../assets/dist/img/bg/ribbon.psd'" type="button"><i class="fa fa-download"></i> Download Contoh Desain</a></span></label>
                    <br>
                    <img style="height: 100px;background-size: cover;" class="img-thumbnail" src="../assets/dist/img/bg/<?php echo $r['ribbon']; ?>">
                    <br>
                    <br>
                    <div class="custom-file">
                      <input type="file" multiple="true" accept='image/*' class="custom-file-input" name="ribbon">
                      <label class="custom-file-label" for="exampleInputFile">Ganti File jpg/png/gif Baru</label>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <label>LOGIN AREA<span class="badge text-red"><a class="dropdown-item small badge <?php echo "$iden[color]"; ?>" onclick="window.location.href='admin-dtcunduh.php?nama_file=../assets/dist/img/bg/login.psd'" type="button"><i class="fa fa-download"></i> Download Contoh Desain</a></span></label>
                    <br>
                    <img style="height:100px;background-size: cover;" class="img-thumbnail" src="../assets/dist/img/bg/<?php echo $r['gif']; ?>">
                    <br>
                    <br>
                    <div class="custom-file">
                      <input type="file" multiple="true" accept='image/*' class="custom-file-input" name="gif">
                      <label class="custom-file-label" for="exampleInputFile">Ganti File jpg/png/gif Baru</label>
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-6">
                    <label class="badge <?php echo "$iden[color]"; ?>">COLOR HEADER, TABEL AND FOOTER<span class="badge text-red">*</span></label>
                    <br>
                    <label><input type="radio" name="color" value="bg-red" <?php if($r['color']=='bg-red') echo 'checked'?>> Red</label>
                    <label><input type="radio" name="color" value="bg-yellow" <?php if($r['color']=='bg-yellow') echo 'checked'?>> Yellow</label>
                    <label><input type="radio" name="color" value="bg-green" <?php if($r['color']=='bg-green') echo 'checked'?>> Green</label>
                    <label><input type="radio" name="color" value="bg-navy" <?php if($r['color']=='bg-navy') echo 'checked'?>> Navy</label>
                    <label><input type="radio" name="color" value="bg-blue" <?php if($r['color']=='bg-blue') echo 'checked'?>> Blue</label>
                    <label><input type="radio" name="color" value="bg-olive" <?php if($r['color']=='bg-olive') echo 'checked'?>> Olive</label>
                    <label><input type="radio" name="color" value="bg-maroon" <?php if($r['color']=='bg-maroon') echo 'checked'?>> Maroon</label>
                    <label><input type="radio" name="color" value="bg-dark" <?php if($r['color']=='bg-dark') echo 'checked'?>> Dark</label>
                    <label><input type="radio" name="color" value="bg-black" <?php if($r['color']=='bg-black') echo 'checked'?>> Black</label>
                    <br>
                    <label class="badge <?php echo "$iden[color]"; ?>">COLOR-NAV SIDEBAR<span class="badge text-red">*</span></label>
                    <br>
                    <label><input type="radio" name="sidebar" value="red" <?php if($r['sidebar']=='red') echo 'checked'?>> Red</label>
                    <label><input type="radio" name="sidebar" value="yellow" <?php if($r['sidebar']=='yellow') echo 'checked'?>> Yellow</label>
                    <label><input type="radio" name="sidebar" value="green" <?php if($r['sidebar']=='green') echo 'checked'?>> Green</label>
                    <label><input type="radio" name="sidebar" value="navy" <?php if($r['sidebar']=='navy') echo 'checked'?>> navy</label>
                    <label><input type="radio" name="sidebar" value="blue" <?php if($r['sidebar']=='blue') echo 'checked'?>> Blue</label>
                    <label><input type="radio" name="sidebar" value="olive" <?php if($r['sidebar']=='olive') echo 'checked'?>> Olive</label>
                    <label><input type="radio" name="sidebar" value="maroon" <?php if($r['sidebar']=='maroon') echo 'checked'?>> Maroon</label>
                    <label><input type="radio" name="sidebar" value="dark" <?php if($r['sidebar']=='dark') echo 'checked'?>> Dark</label>
                    <label><input type="radio" name="sidebar" value="Black" <?php if($r['sidebar']=='Black') echo 'checked'?>> Black</label>
                    <label class="badge <?php echo "$iden[color]"; ?>">BG-COLOR SIDEBAR<span class="badge text-red">*</span></label>
                    <br>
                    <label><input type="radio" name="mode" value="dark" <?php if($r['mode']=='dark') echo 'checked'?>> Dark</label>
                    <label><input type="radio" name="mode" value="light" <?php if($r['mode']=='light') echo 'checked'?>> Light</label>
                    <br>
                    <label class="badge <?php echo "$iden[color]"; ?>">BG-COLOR LOGIN<span class="badge text-red">*</span></label>
                    <br>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #ffc107);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #ffc107);') echo 'checked'?>> Gradient Yellow - White</label>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #ff0000);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #ff0000);') echo 'checked'?>> Gradient Red - White</label>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #001f3f);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #001f3f);') echo 'checked'?>> Gradient Navy - White</label>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #6610f2);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #6610f2);') echo 'checked'?>> Gradient Blue - White</label>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #ff851b);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #ff851b);') echo 'checked'?>> Gradient Orange - White</label>
                    <label><input type="radio" name="bg" value="-webkit-linear-gradient(right, #fff, #343a40);" <?php if($r['bg']=='-webkit-linear-gradient(right, #fff, #343a40);') echo 'checked'?>> Gradient Dark - White</label>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <label class="badge <?php echo "$iden[color]"; ?>">URL APLIKASI<span class="badge text-red">*</span></label>
                    <input type="text" class="form-control" name="url" value="<?php echo $r['url']; ?>">
                    
                  </div>
                </div>
              </div>
            </div>


            <div class="card-footer">
              <div class="row">
                <div class="col-sm-8 btn-xs-4">
                  <i class="fa  fa-info-circle"></i> Silahkan klik tombol simpan untuk meng-update data anda
                </div>

                <div class="col-sm-4">
                  <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check"></i> S I M P A N</button>
                  <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-remove (alias)"></i> B A T A L</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
    </section>

    <?php include "admin-footer.php"; ?>