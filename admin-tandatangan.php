<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<!-- End menu -->
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
          text: 'Data berhasil diupdate',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "ttd";
        });
      });
    </script>
    <?php 
  }       
}
?>
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
                window.location = "ttd";
              });
            });
          </script>
          <?php
        }       
      }
      ?>
      <div class="card card-<?php echo "$iden[sidebar]"; ?>">
        <div class="card-header">
          <h3 class="card-title"><b><i class="fa fa-pencil"></i> Form Ubah Tanda Tangan dan Stempel/Cap Pejabat Organisasi</b></h3>
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
            <?php
            $rt=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM identitas WHERE id = '1'"));
            ?>

            <div class="card-body">
              <form class='form-horizontal' role='form' method=POST action='action/ttd_update.php' enctype='multipart/form-data'><br>
                <input type='hidden' name='id' value='<?php echo "$rt[id]";?>'>
                <div class='box-body'>

                  <div class='form-group'>
                    <div class="row">
                      <label class='col-sm-2 control-label'>Nama Ketua Umum</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' name='nama_ketum' value="<?php echo "$rt[nama_ketum]";?>">
                      </div>
                      <label class='col-sm-2 control-label'>Jabatan</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' name='jbt_ketum' value="<?php echo "$rt[jbt_ketum]";?>">
                      </div>
                    </div>
                  </div>

                  <div class='form-group'>
                    <div class="row">
                     <label class='col-sm-2 control-label'>Tanda Ketua Umum</label>
                     <div class='col-sm-4'>
                      <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[ttd_ketum]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[ttd_ketum]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[ttd_ketum]";?></a> 
                    </div>
                    <label class='col-sm-2 control-label'>Ganti Tanda Tangan:</label>
                    <div class='col-sm-4'>
                      <input type='file' class='form-control' name='ttd_ketum'>
                    </div>
                  </div>

                  <div class='form-group'>
                    <div class="row">
                      <label class='col-sm-2 control-label'>Nama Sekretaris Jendral</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' name='nama_sekjen' value="<?php echo "$rt[nama_sekjen]";?>">
                      </div>
                      <label class='col-sm-2 control-label'>Jabatan</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' name='jbt_sekjen' value="<?php echo "$rt[jbt_sekjen]";?>">
                      </div>
                    </div>
                  </div>

                  <div class='form-group'>
                    <div class="row">
                     <label class='col-sm-2 control-label'>Tanda Sekretaris Jendral</label>
                     <div class='col-sm-4'>
                      <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[ttd_sekjen]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[ttd_sekjen]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[ttd_sekjen]";?></a> 
                    </div>
                    <label class='col-sm-2 control-label'>Ganti Tanda Tangan:</label>
                    <div class='col-sm-4'>
                      <input type='file' class='form-control' name='ttd_sekjen'>
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <div class="row">
                    <label class='col-sm-2 control-label'>Nama Ketua</label>
                    <div class='col-sm-4'>
                      <input type='text' class='form-control' name='nama_ket' value="<?php echo "$rt[nama_ket]";?>">
                    </div>
                    <label class='col-sm-2 control-label'>Jabatan</label>
                    <div class='col-sm-4'>
                      <input type='text' class='form-control' name='jbt_ket' value="<?php echo "$rt[jbt_ket]";?>">
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <div class="row">
                   <label class='col-sm-2 control-label'>Tanda Ketua</label>
                   <div class='col-sm-4'>
                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[ttd_ket]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[ttd_ket]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[ttd_ket]";?></a> 
                  </div>
                  <label class='col-sm-2 control-label'>Ganti Tanda Tangan:</label>
                  <div class='col-sm-4'>
                    <input type='file' class='form-control' name='ttd_ket'>
                  </div>
                </div>

                <div class='form-group'>
                  <div class="row">
                    <label class='col-sm-2 control-label'>Nama Sekretaris</label>
                    <div class='col-sm-4'>
                      <input type='text' class='form-control' name='nama_sek' value="<?php echo "$rt[nama_sek]";?>">
                    </div>
                    <label class='col-sm-2 control-label'>Jabatan</label>
                    <div class='col-sm-4'>
                      <input type='text' class='form-control' name='jbt_sek' value="<?php echo "$rt[jbt_sek]";?>">
                    </div>
                  </div>
                </div>

                <div class='form-group'>
                  <div class="row">
                   <label class='col-sm-2 control-label'>Tanda Sekretaris</label>
                   <div class='col-sm-4'>
                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[ttd_sek]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[ttd_sek]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[ttd_sek]";?></a> 
                  </div>
                  <label class='col-sm-2 control-label'>Ganti Tanda Tangan:</label>
                  <div class='col-sm-4'>
                    <input type='file' class='form-control' name='ttd_sek'>
                  </div>
                </div>

                 <div class='form-group'>
                  <div class="row">
                   <label class='col-sm-2 control-label'>Stempel/Cap MPN</label>
                   <div class='col-sm-4'>
                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[cap_mpn]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[cap_mpn]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[cap_mpw]";?></a> 
                  </div>
                  <label class='col-sm-2 control-label'>Ganti Stempe:</label>
                  <div class='col-sm-4'>
                    <input type='file' class='form-control' name='cap_mpn'>
                  </div>
                </div>

                <div class='form-group'>
                  <div class="row">
                   <label class='col-sm-2 control-label'>Stempel/Cap MPN</label>
                   <div class='col-sm-4'>
                    <img class="img-responsive img-thumbnail" alt="Responsive image" src="../assets/dist/img/ttd/<?php echo "$rt[cap_mpw]";?>" width="100px"><br>contoh tanda tangan: <a href="admin-dtcunduh.php?nama_file=../assets/dist/img/ttd/<?php echo "$rt[cap_mpw]";?>"><i class="fa fa-cloud-download"></i> Uduh <?php echo "$rt[cap_mpw]";?></a> 
                  </div>
                  <label class='col-sm-2 control-label'>Ganti Tanda Tangan:</label>
                  <div class='col-sm-4'>
                    <input type='file' class='form-control' name='cap_mpw'>
                  </div>
                </div>

              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-8 btn-xs-4">
            <small><i class="fa fa-info-circle"></i> Anda dapat meng-ubah tanda tangan dan stempel/cap dengan meng-unduh contoh untuk ukuran sesuai!</small>
          </div>

          <div class="col-sm-4">
            <button style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN</button>
            <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="window.location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</section>

</div>
<!-- /.content -->
</div>
<!-- End content -->

<!-- Start footer -->

<?php include "admin-footer.php"; ?>
  <!-- End footer -->