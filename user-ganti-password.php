<?php require_once "user-header.php"; ?>
<?php require_once "user-menu.php"; ?>
<div class="container" style="margin-top: 70px;">
  <!-- Default box -->
  <div class="card">
    <div class="card-header <?php echo "$iden[color]";?>">
      <h3 class="card-title"><b><i class="fa fa-key"></i> Form Ganti Password?</b></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="card-body">
          <form action="password" method="POST" autocomplete="off">
            <?php
            if(count($errors) > 0){
              ?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>
                  <?php
                  foreach($errors as $showerror){
                    echo $showerror;
                  }
                  ?>
                </strong>
              </div>
              <?php
            }
            ?>
            <div class="row">
              <div class="col-sm-3 col-xs-3">
                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. -->
              </div>
              <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <label>Email/Username</label>
                  <input class="form-control" type="text" value="<?php echo $fetch_info['email'] ?>" disabled>
                </div> 
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Tuliskan Password Baru" required>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input class="form-control" type="password" name="cpassword" placeholder="Tuliskan Konfirmasi Password Baru" required>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-sm-8 btn-xs-4">
                <i class="fa  fa-info-circle"></i> Harap mengingat password yang anda ganti...
              </div>

              <div class="col-sm-4">
                <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" name="changepassword" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check"></i> S I M P A N</button>
                <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="location.href='user'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-remove (alias)"></i> B A T A L</a>
              </div>
            </div>
          </div>
        </form>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>


    <?php require_once "user-footer.php"; ?>