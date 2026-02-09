<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

<?php
if(isset($_GET['alert'])){
  if($_GET['alert']=="diterima"){

    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Data Berhasil Diterima',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "nilaipmbjalurpmdk";
        });
      });
    </script>
    <?php 
  }
  elseif ($_GET['alert']=="hapus") {
    ?>
    <script type="text/javascript">
      $(function() {

        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Data Berhasil Dihapus',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "nilaipmbjalurpmdk";
        });
      });
    </script>
    <?php
  }   elseif ($_GET['alert']=="reset") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Password Berhasil Direset!',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "nilaipmbjalurpmdk";
        });
      });
    </script>
    <?php
  }   elseif ($_GET['alert']=="gagal") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'error',
          showConfirmButton: true,
          timerProgressBar: true,
          title: 'Gagal!',
          text: 'Data Gagal Diubah!',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "nilaipmbjalurpmdk";
        });
      });
    </script>
    <?php
  }   elseif ($_GET['alert']=="ubah") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          timer: 1500,
          timerProgressBar: true,
          title: 'Sukses!',
          text: 'Data Berhasil Diubah!',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "formulirpmbjalurpmdk";
        });
      });
    </script>
<?php
  }   elseif ($_GET['alert']=="ditolak") {
    ?>
    <script type="text/javascript">
      $(function() {
        Swal.fire({
          icon: 'error',
          showConfirmButton: true,
          timerProgressBar: true,
          title: 'Gagal!',
          text: 'Nomor Pendaftaran Calon Mahasiswa Baru Sudah Ada!',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "formulirpmbjalurpmdk";
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
          <a type="button" onclick="window.location.href='./'"><badge class="badge <?php echo "$iden[color]";?>"><img style="background-size: cover; object-fit: cover;overflow: hidden;width: 20px;height: 20px;" src="../assets/dist/img/logo/<?php echo "$iden[logo]"; ?>"> APLIKASI <?php echo "$iden[aplikasi]";?></badge></a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a type="button" onclick="window.location.href='./'"  data-toggle="tooltip" data-placement="top" title="Dashboard"><i class="fa fa-dashboard (alias)"></i></a></li>
                <li class="breadcrumb-item active">Tabel Data</li>
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
      <!-- Default box -->
      <div class="card">
        <div class="card-header <?php echo "$iden[color]";?>">
          <h3 class="card-title"><i class="fa fa-list-ol"></i> <b>DATA FORMULIR PENDAFTAR PMB JALUR PMDK</b></h3>

          <center></center>
          <div class="card-tools">
           <!--  <button type="button" class="btn btn-xs btn-tool btn-light"><i class="fa fa-list-ol"></i> Lihat Data</button>
            <button type="button" class="btn btn-xs btn-tool btn-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only small">Toggle Dropdown</span>
              <div class="dropdown-menu small" role="menu">
                <a class="dropdown-item small" onclick="window.location.href='nilaipmbjalurpmdk'" type="button"><i class="fa fa-angle-right"></i> Jalur PMDK</a>
                <a class="dropdown-item small" onclick="window.location.href='pmbgelombag1'" type="button"><i class="fa fa-angle-right"></i> Gelombang 1</a>
                <a class="dropdown-item small" onclick="window.location.href='pmbgelombag2'" type="button"><i class="fa fa-angle-right"></i> Gelombang 2</a>
              </div>
            </button> -->
            <!-- button type="button"  onclick="window.location.href='excel/nilaipmbjalurpmdk.php'" class="btn btn-xs btn-tool btn-light"  data-toggle="tooltip" title="Ekspor Data Ke Excel"><i class="fa fa-file-excel"></i> Ekspor Excel</button> -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel_kta" class="table table-striped table-hover table-bordered small">
                <thead class="">
                  <tr class="<?php echo "$iden[color]";?>">
                    <th>NO</th>
                    <th><center>AKSI</center></th>
                    <th><center>NPM</center></th>
                    <th><center>NISN</center></th>
                    <th>NAMA</th>
                    <th>FAKULTAS</th>
                    <th>PRODI</th>
                    <th>EMAIL</th>
                    <th>NIK</th>
                    <th>HANDPHONE</th>
                    <th><center>PHOTO</center></th>
                  </tr>
                </thead>
              </table>
              <script type="text/javascript">
                $(document).ready(function(){

                  $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                  {
                    return {
                      "iStart": oSettings._iDisplayStart,
                      "iEnd": oSettings.fnDisplayEnd(),
                      "iLength": oSettings._iDisplayLength,
                      "iTotal": oSettings.fnRecordsTotal(),
                      "iFilteredTotal": oSettings.fnRecordsDisplay(),
                      "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                      "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                  };

                  var table = $('#tabel_kta').DataTable( {
                     
                    "bAutoWidth": false,
                    // "scrollY": '50vh',
                    "responsive": true,
                    "scrollCollapse": false,
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'serverside/formulir_pmb_jalurpmdk.php', 
                    
                    "columnDefs": [ 
                    { "targets": 0, "data": '1', "orderable": true, "searchable": true, "width": '30px', "className": 'center' }, 

                    {
                      "targets": 1, "data":1, 
                      "render": function(data, type, full) {  
                       return '<center><div class="btn-group"><a type="button" style="width:25px;" onclick="window.location.href=\'formulirpmbjalurpmdkcetak?id='+data+'\'" class="btn btn-xs bg-success" data-toggle="tooltip" title="Cetak Formulir PMB"><i class="fa fa-print"></i> <?php echo $a; ?></a></center>';
                     } },
                     { "targets": 2, "className": 'center'},
                     { "targets": 3, "className": 'center'},
                     { "targets": 4, "className": 'center', "width": '500px'},
                     { "targets": 5, "className": 'center'},
                     { "targets": 6, "className": 'center'},
                     { "targets": 7, "className": 'center'},
                     { "targets": 8, "className": 'center'},
                     { "targets": 9, "className": 'center'},

                    { "targets": 10, "orderable": false, "searchable": true, "className": 'center',
                    "render": function(data, type, row) {
                      return '<center><a data-toggle=\"tooltip\" title=\"Lihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-circle img-thumbnail" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" style="height:40px;width:40px;object-fit: cover;overflow: hidden;"></a></center>'}}],
                          "order": [[ 1, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
                          "iDisplayLength": 10,               // tampilkan 10 data
                          "rowCallback": function (row, data, iDisplayIndex) {
                            var info   = this.fnPagingInfo();
                            var page   = info.iPage;
                            var length = info.iLength;
                            var index  = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                          }
                        } );
});
</script>
</div>
<!-- /.card-body -->
</div>
<div class="card-footer small">
  <small><i class="fa fa-info-circle"></i> Anda dapat melakukan verifikasi bukti transfer dengan klik gambar bukti transfer dan tekan tombol chek atau logo  <button class="btn btn-xs btn-primary"><i class="fa fa-check-circle"></i></button> pada kolom tabel!</small> 
</div>
</div>
</div>
<!-- /.card -->
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Detail Data Anggota -->
<script>
  $(function()
  {
    $(document).on('click','.verifikasidata',function(e)
    {
      e.preventDefault();
      $("#verifikasiModal").modal('show');
      $.post('pmb_terima.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/nilaipmbjalurpmdk_verifikasi.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-square-o"></i> Form Verifikasi Data PMB</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Terima</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
        </div>
      </div>
    </div>v
  </div>
</form>
<!-- Ubah Data Anggota -->
<script>
  $(function()
  {
    $(document).on('click','.ubahanggota',function(e)
    {
      e.preventDefault();
      $("#ubahModal").modal('show');
      $.post('anggota_ubah.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Form Detail Data Anggota</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa  fa-arrow-circle-left"></i> Kembali</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Hapus Data Anggota -->
<script>
  $(function()
  {
    $(document).on('click','.hapusdata',function(e)
    {
      e.preventDefault();
      $("#hapusModal").modal('show');
      $.post('pmb_hapus.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/nilaipmbjalurpmdk_delete.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Form Detail Data Anggota</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Hapus</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  $(function()
  {
    $(document).on('click','.resetdata',function(e)
    {
      e.preventDefault();
      $("#resetModal").modal('show');
      $.post('pmb_reset.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/nilaipmbjalurpmdk_reset.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Reset</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php include "admin-footer.php";?>