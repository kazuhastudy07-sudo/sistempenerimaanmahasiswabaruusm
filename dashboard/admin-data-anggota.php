<?php include "admin-header.php"; ?>
<?php include "admin-menu.php"; ?>

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
          text: 'Data Anggota Berhasil Diupdate',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "dataanggota";
        });
      });
    </script>
    <?php 
  }
  elseif ($_GET['alert']=="hapus") {
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
          text: 'Data Anggota Berhasil Dihapus',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "dataanggota";
        });
      });
    </script>
    <?php
  }   elseif ($_GET['alert']=="reset") {
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
          text: 'Password Berhasil Direset!',
          footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
        }).then(function() {
          window.location = "dataanggota";
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
                <li class="breadcrumb-item active">Tabel Data Anggota</li>
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
          <h3 class="card-title"><i class="fa fa-list-ol"></i> <b>DATA ANGGOTA</b></h3>
          <center></center>
          <div class="card-tools">
            <!-- <div class="btn-group btn-xs">
              <button type="button" class="btn btn-xs bg-dark"><i class="fa fa-list"></i> Lihat Data Anggota</button>
              <button type="button" class="btn btn-xs bg-dark dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only small">Toggle Dropdown</span>
                <div class="dropdown-menu small" role="menu">
                  <a class="dropdown-item small" onclick="window.location.href='dpw'" type="button"><i class="fa fa-angle-right"></i> DPW</a>
                  <a class="dropdown-item small" onclick="window.location.href='dpd'" type="button"><i class="fa fa-angle-right"></i> DPD</a>
                  <a class="dropdown-item small" onclick="window.location.href='dpc'" type="button"><i class="fa fa-angle-right"></i> DPC</a>
                  <a class="dropdown-item small" onclick="window.location.href='dprt'" type="button"><i class="fa fa-angle-right"></i> DPRT</a>
                  <a class="dropdown-item small" onclick="window.location.href='simpatisan'" type="button"><i class="fa fa-angle-right"></i> SIMPATISAN</a>
                </div>
              </button>
            </div> -->
            <a type="button" class="btn btn-xs bg-dark"onclick="window.location.href='tambah'"><i class="fa fa-user-plus (alias)"></i> Tambah Data Anggota</a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
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
                      <th>NIK</th>
                      <th>NO. KTA</th>
                      <th>NAMA</th>
                      <th>EMAIL</th>
                      <th>HANDPHONE</th>
                      <th>KTP</th>
                      <th><center>PHOTO</center></th>
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
                    "ajax": 'serverside/data_anggota.php',     
                    "columnDefs": [ 
                    { "targets": 0, "data": '1', "orderable": true, "searchable": true, "width": '30px', "className": 'center' }, 

                    { "targets": 1, "className": 'center'},
                    { "targets": 2, "className": 'center'},
                    { "targets": 3, "className": 'center'},
                    { "targets": 4, "data": '4', "orderable": true, "searchable": true, "className": 'center' },
                    {
                      "targets": 4, "className": 'center',
                      "render": function(data, type, row) {
                        return '<span class="badge bg-navy">'+data+'<span>'
                      } 
                    },
                    { "targets": 5,  "className": 'right' },
                    {
                      "targets": 6, "orderable": false, "searchable": true, "className": 'center',
                      "render": function(data, type, row) {
                        return '<center><a data-toggle=\"tooltip\" title=\"Lihat KTP\" href=\"\" onclick=\"window.open(\'../assets/dist/img/ktp/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/ktp/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    },
                    {
                      "targets": 7, "orderable": false, "searchable": true, "className": 'center',
                      "render": function(data, type, row) {
                        return '<center><a data-toggle=\"tooltip\" title=\"Lihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    }, 
                    {
                      "targets": 8, "data": 8, 
                      "render": function(data, type, full) {  
                       return '<center><div class="btn-group"><button type="button" style="width:25px;" class="btn btn-xs bg-secondary resetanggota" data-id="'+data+'" data-toggle="tooltip" title="Reset Password"><i class="fa fa-key"></i></button><button type="button" style="width:25px;" class="btn btn-xs bg-primary detailanggota" data-id="'+data+'" data-toggle="tooltip" title="Detail Data"><i class="fa fa-user"></i></button><a type="button" style="width:25px;" onclick="window.location.href=\'dataanggotaubah?id='+data+'\'" class="btn btn-xs bg-dark" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> <?php echo $a; ?></a><button type="button" style="width:25px;" class="btn btn-xs bg-red hapusanggota" data-id="'+data+'" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></button></div></center>';
                     } }],
                          "order": [[ 8, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
                          "iDisplayLength": 10,               // tampilkan 10 data
                          "rowCallback": function (row, data, iDisplayIndex) {
                            var info   = this.fnPagingInfo();
                            var page   = info.iPage;
                            var length = info.iLength;
                            var index  = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                          }
                        } );
                    jQuery(document).ready(function($){ $('.delete-link').on('click',function(){ var getLink = $(this).attr('href'); Swal.fire({ title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!' }).then(function(){ window.location.href = getLink }); return false; }); });
                  });
                </script>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <small><i class="fa fa-file-text-o"></i> Data anggota dapat melihat, edit dan hapus data melalui tombol yang ada dalam kolom!</small> 
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
            $(document).on('click','.detailanggota',function(e)
            {
              e.preventDefault();
              $("#detailModal").modal('show');
              $.post('anggota_detail_qr.php',
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
            $(document).on('click','.hapusanggota',function(e)
            {
              e.preventDefault();
              $("#hapusModal").modal('show');
              $.post('anggota_hapus.php',
                {id_user:$(this).attr('data-id')},
                function(html)
                {
                  $(".modal-body").html(html);
                });
            });
          });
        </script>
        <form action="action/data_anggota_delete.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
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
    $(document).on('click','.resetanggota',function(e)
    {
      e.preventDefault();
      $("#resetModal").modal('show');
      $.post('anggota_reset_password.php',
        {id_user:$(this).attr('data-id')},
        function(html)
        {
          $(".modal-body").html(html);
        });
    });
  });
</script>
<form action="action/anggota_reset.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <?php include "admin-footer.php";?>