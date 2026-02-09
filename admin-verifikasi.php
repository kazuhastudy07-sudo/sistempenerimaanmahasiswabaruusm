<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>
<?php
if(isset($_GET['alert'])){
  if($_GET['alert']=="terima"){

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
          text: 'Berhasil Menerima Data Anggota',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "verifikasi";
        });
      });
    </script>
    <?php 
  }elseif ($_GET['alert']=="tolak") {
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
          text: 'Berhasil Menolak Data Anggota',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "verifikasi";
        });
      });
    </script>
    <?php
  }   elseif ($_GET['alert']=="ganda") {
    ?>
    <script type="text/javascript">
      $(function() {

        Swal.fire({
          icon: 'error',
          showConfirmButton: true,
          timerProgressBar: true,
          title: 'GAGAL!',
          text: 'Nomor Kartu Tanda Anggota Sudah Terdaftar, Silahkan Masukan Nomor Baru',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "verifikasi";
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
                <li class="breadcrumb-item active">Verifikasi Data</li>
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
          <h3 class="card-title"><i class="fa fa-check-square"></i> <b>VERIFIKASI DATA ANGGOTA <i class="fa fa-arrow-circle-right"></i> DAFTAR MANDIRI</b></h3>
          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_kta" class="table table-hover small">
                  <thead class="example2">
                    <tr class="<?php echo "$iden[color]"; ?>">
                      <th>NO</th>
                      <th>NIK</th>
                      <th>KEANGGOTAAN</th>
                      <th>NAMA</th>
                      <th>EMAIL</th>
                      <th>HANDPHONE</th>
                      <th><center>PHOTO</center></th>
                      <th><center>KTP</center></th>
                      <th><center>DETAIL</center></th>
                      <th><center>AKSI</center></th>
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
                    "scrollCollapse": false,
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'serverside/anggota.php',     
                    "columnDefs": [ 
                    { "targets": 0, "data": '1', "orderable": true, "searchable": true, "width": '30px', "className": 'center' },{
                      "targets": 1, "className": 'center',
                      "render": function(data, type, row) {
                        return '<a type=\"submit\" class=\"editdata\" data-id=\"'+data+'\"><span class="badge bg-navy" data-toggle=\"tooltip\" title=\"Detail\">'+data+'<span></a>'
                      } 
                    },                    
                    { "targets": 2, "className": 'center'},
                    { "targets": 3, "className": 'center'},
                    { "targets": 4, "data": '4', "orderable": true, "searchable": true, "width": '20px', "className": 'center' },{
                      "targets": 4, "className": 'center',
                      "render": function(data, type, row) {
                        return '<span class="badge bg-maroon">'+data+'<span>'
                      } 
                    },
                    { "targets": 5,  "className": 'right' },
                    {
                      "targets": 6, "orderable": false, "searchable": true, "width": '30px', "className": 'center',
                      "render": function(data, type, row) {
                        return '<center><a data-toggle=\"tooltip\" title=\"Lihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    },
                    {
                      "targets": 7, "orderable": false, "searchable": true, "width": '30px', "className": 'center',
                      "render": function(data, type, row) {
                        return '<center><a data-toggle=\"tooltip\" title=\"Lihat KTP\" href=\"\" onclick=\"window.open(\'../assets/dist/img/ktp/'+data+'\',\'popuppage\',\'width=620,toolbar=0,resizable=0,scrollbars=yes,height=600,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/ktp/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    },
                    {
                      "targets": 8, "data": 8,
                      "render": function(data, type, full)  {
                        return '<center><a type=\"submit\" class=\"detailanggota\" data-id=\"'+data+'\"><span class="btn btn-xs bg-info" data-toggle=\"tooltip\" title=\"Detail Data\"><i class="fa fa-user"></i><span></a></center>'
                      } 
                    },
                    {
                      "targets": 9, "data": 9, 
                      "render": function(data, type, full) {
                        return '<center><div class="btn-group"><button type="submit" class="btn btn-xs btn-primary terimaanggota" data-id=\"'+data+'" data-toggle=\"tooltip\" title=\"Terima\"><i class="fa fa-check-circle"></i></button><button type="submit" class="btn btn-xs bg-navy tolakanggota" data-id=\"'+data+'" data-toggle=\"tooltip\" title=\"Tolak\"><i class="fa fa-times-circle"></i></button></div></center>';
                      } }],
                          "order": [[ 9, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
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

</div>
<div class="card-footer">
  <small><i class="fa fa-info-circle"></i> Silahkan verifikasi data keanggotaan dengan verifikasi NIK yang terdaftar dan yang tertera di KTP</small>
</div>
</div>
</div>
<!-- /.card -->
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- Detail Data Anggota -->
<script>
  $(function()
  {
    $(document).on('click','.detailanggota',function(e)
    {
      e.preventDefault();
      $("#detailModal").modal('show');
      $.post('anggota_detail.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="#" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!-- Terima Data Anggota -->
<script>
  $(function()
  {
    $(document).on('click','.terimaanggota',function(e)
    {
      e.preventDefault();
      $("#terimaModal").modal('show');
      $.post('anggota_terima.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/anggota_verifikasi.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Terima</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  $(function()
  {
    $(document).on('click','.tolakanggota',function(e)
    {
      e.preventDefault();
      $("#tolakModal").modal('show');
      $.post('anggota_tolak.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/anggota_tolak.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="tolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-check-circle"></i> Ya! Tolak</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 120px;border-radius: 20px;border:2px solid #eee;"><i class="fa fa-times-circle"></i> Batal</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- PAGE SCRIPTS -->
<script src="../assets/dist/js/pages/dashboard2.js"></script>
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<?php include "admin-footer.php";?>