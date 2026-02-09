<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a type="button" onclick="window.location.href='./'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a type="button" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="fa fa-dashboard (alias)"></i></a></li>
                <li class="breadcrumb-item active">Upload Data</li>
              </ol>
            </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
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
            timer: 1500
          });

          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            title: 'BERHASIL!',
            text: 'Data Anggota Berhasil Ditambahkan',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          }).then(function() {
            window.location = "tambah";
          });
        });
      </script>
      <?php 
    }elseif ($_GET['alert']=="gagal") {
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
            icon: 'error',
            title: 'GAGAL!',
            text: 'Email/NIK Sudah Terdaftar',
            footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
          })
        });
      </script>
      <?php
    }       
  }
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Default box -->
      <div class="card">
        <div class="card-header <?php echo "$iden[color]";?>">
          <h3 class="card-title"><b><i class="fa fa-user-plus"></i> Form Upload Data Anggota</b></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>

            <div class="card-body">
              <form action="action/anggota_upload_save.php" method='POST' enctype='multipart/form-data'>
                
                <div class="row">
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFilee">CONTOH FORMAT UPLOAD DATA EXCEL</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <label type="button" onclick="window.location.href='admin-dtcunduh.php?nama_file=excel/data_mpw_pp_kalsel.xls'" class="badge bg-success"><i class="fa fa-cloud-download"></i> Download Contoh Format <i class="fa fa-file-excel-o"></i></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-xs-6">
                    <div class="form-group">
                      <label for="exampleInputFilee">UPLOAD DATA <badge class="badge bg-red">File Excel (.xls) </badge></label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="filepegawai" multiple="true" accept='.xls' class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Telusuri File Upload...</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


             </div> <!-- tutup card body -->

             <div class="card-footer">
              <div class="row">
                <div class="col-sm-8 btn-xs-4">
                  <small><i class="fa  fa-info-circle"></i> File excel yang akan di upload wajib menggunakan ekstensi (.xls) jika tidak data akan error!</small>
                </div>

                <div class="col-sm-4">
                  <button name="upload" style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' type="submit" class="btn btn-sm btn-xs-2 btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN</button>
                  <a style='width: 150px;border-radius: 20px;border: 2px solid #FFFFFF;' onclick="window.location.href='./'" type="button" class="btn btn-sm btn-xs-2 btn-danger text-white"><i class="fa fa-times-circle"></i> BATAL</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
 <script type="text/javascript">// script pembatasan jumlah angka nik
 function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}
</script>
<script src="../assets/plugins/webcam/java.js"></script>
<script src="../assets/plugins/webcam/webcam.min.js"></script>
<!-- /.control-sidebar -->
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFile");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 1000000)
{ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
  Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
  this.value = "";
};
};
</script>
<script type="text/javascript">
  $(document).ready(function () 
  {
    bsCustomFileInput.init();
  });
  var uploadField = document.getElementById("exampleInputFilee");
  uploadField.onchange = function() 
  {
    if(this.files[0].size > 1000000)
{ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
  Swal.fire("Maaf. File Terlalu Besar ! Maksimal Upload 1 MB, Silahkan Ganti File...");
  this.value = "";
};
};
</script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<!-- /.card-body -->

<?php include "admin-footer.php"; ?>
