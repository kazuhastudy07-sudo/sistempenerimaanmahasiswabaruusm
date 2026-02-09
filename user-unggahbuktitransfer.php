<?php include "user-header.php"; ?>
<?php include "user-menu.php"; ?>
<div class="container">
  <!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">DATA ANGGOTA</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a type="button" onclick="window.location.href='user'"><i class="fa fa-home"></i></a></li>
            <li class="breadcrumb-item active">Detail Data</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><b><i class="fa fa-user"></i> Form Detail Data Aggota</b></h3>
        <div class="card-tools"> 

          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="card-body">


            <div class="row">

              <div class="col-sm-12">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <form class='form-horizontal' role='form' method=POST action='action/pmbbuktitransfer_upload.php' enctype='multipart/form-data'>
                      <center>
                        <label>Silahkan Unggah Bukti Transfer</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="bukti_trf"  multiple="true" accept='image/*'  class="custom-file-input" id="exampleInputFile" required="required">
                            <label class="custom-file-label" for="exampleInputFile">Unggah Bukti transfer</label>
                          </div>
                        </div>
                        <input type="hidden" name="id_user" value="<?php echo $fetch_info['id_user'];?>">
                        <br>

                        <textarea class="form-control" name="ket_bukti_trf" placeholder="Tuliskan keterangan nomor, nama rekening yang dibuat untuk melakukan transfer biaya" required="required"></textarea>
                        <br/>
                        <button class="btn bg-primary"><i class="fa fa-send"></i> Kirim Bukti Transfer</button>
                        <br>
                        <i></i>
                      </center>
                    </form>
                  </div>
                </div>

              </div>
            </div>

          </div> <!-- tutup card body -->

          <div class="card-footer">
            <div class="row">
              <div class="col-sm-12">
                <i class="fa fa-info-circle"></i> Catatan: Mohon Untuk Tidak Mengupload Bukti Transfer Palsu, Karena Form Akan Segera Terkunci Setelah Proses Verifikasi. Terimakasih!
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
    <br />
    <br />
    <br />
    <?php

    $idxx = encrypt_decrypt('encrypt', $_SESSION[idx]);
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
              text: 'Data Anggota berhasil diupdate',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "detail?id=<?php echo "$idxx" ?>";
            });
          });
        </script>
        <?php 
      }
    }
    ?>
    <script type="text/javascript">
     function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
      return true;
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function () 
    {
      bsCustomFileInput.init();
    });
    var uploadField = document.getElementById("exampleInputFile");
    uploadField.onchange = function() 
    {
      if(this.files[0].size > 600000)
        {   Swal.fire('Maaf, File Gambar Terlalu Besar', 'Maksimal File Unggah 600 KB, Silahkan Ganti File...', 'error');
      this.value = "";
    };
  };
</script>
<?php include "user-footer.php"; ?>
