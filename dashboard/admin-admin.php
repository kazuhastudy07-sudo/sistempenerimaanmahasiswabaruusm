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
                <li class="breadcrumb-item active">Data Users </li>
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
      if($_GET['alert']=="ubah"){

        ?>
        <script type="text/javascript">
          $(function() {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              title: 'Sukses!',
              text: 'Data Berhasil Diubah',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "admin";
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
              timer: 1500
            });

            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              title: 'GAGAL! MENAMBAH DATA',
              text: 'Data users gagal ditambahkan, karena email sama',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "admin";
            });
          });
        </script>
        <?php
      }  elseif ($_GET['alert']=="hapus") {
        ?>
        <script type="text/javascript">
          $(function() {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              title: 'Sukses!',
              text: 'Data Admin Berhasil Dihapus',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "admin";
            });
          });
        </script>
        <?php
      }  elseif ($_GET['alert']=="berhasil") {
        ?>
        <script type="text/javascript">
          $(function() {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              timer: 1500,
              timerProgressBar: true,
              title: 'Sukses!',
              text: 'Data Berhasil Ditambahkan',
              footer: 'APLIKASI <?php echo "$iden[aplikasi]";?>'
            }).then(function() {
              window.location = "admin";
            });
          });
        </script>
        <?php
      }       
    }
    ?>
    <!-- Default box -->
    <div class="card">
      <div class="card-header <?php echo "$iden[color]";?>">
        <h3 class="card-title"><i class="fa fa-list-ul"></i> <b>TABEL DATA USERS ADMINISTRATOR</b></h3>
        <center></center>
        <div class="card-tools">
          <a data-toggle="modal" data-target="#tambahusers" type="button" class="btn btn-xs bg-dark"><i class="fa fa-user-plus (alias)"></i> TAMBAH USER ADMINISTRATOR</a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel" class="table table-striped table-hover table-bordered small">
                <thead class="">
                  <tr class="<?php echo "$iden[color]";?>">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
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

                  var table = $('#tabel').DataTable( {
                    "bAutoWidth": false,
                    // "scrollY": '50vh',
                    "scrollCollapse": false,
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'serverside/users.php',     
                    "columnDefs": [ 
                    { "targets": 0, "data": '1', "orderable": true, "searchable": true, "width": '30px', "className": 'center' }, 

                    { "targets": 1, "className": 'center'},
                    { "targets": 2, "className": 'center'},
                    { "targets": 3, "className": 'center'},
                    {
                      "targets": 4, "orderable": false, "searchable": true, "className": 'center',
                      "render": function(data, type, row) {
                        return '<center><a data-toggle=\"tooltip\" title=\"Klik Untuk Melihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    },
                    {
                      "targets": 5, "data": 5, 
                      "render": function(data, type, full) {
                       return '<center><div class="btn-group"><a type="button" style="width:25px;" onclick="window.location.href=\'adminubah?id='+data+'\'" class="btn btn-xs bg-dark" data-toggle="tooltip" title="Ubah Data"><i class="fa fa-edit"></i> <?php echo $a; ?></a><button type="button" style="width:25px;" class="btn btn-xs bg-red hapusdata" data-id="'+data+'" data-toggle="tooltip" title="Hapus Data"><i class="fa fa-trash"></i></button></div></center>';
                     } }],
                          "order": [[ 5, "desc"]],           // urutkan data berdasarkan id_transaksi secara descending
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

      <!-- Modal Tambah-->
      <form action="action/admin_save.php" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="tambahusers" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
          <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header <?php echo "$iden[color]";?>"><b class="modal-title"><img src="../assets/dist/img/logo/<?php echo "$iden[logo]";?>" width="30"> APLIKASI <?php echo "$iden[aplikasi]";?></b><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">

              <center>
                <h3>Tambah User Administrator</h3>
                <input type="text" placeholder="Tuliskan Nama Lengkap" class="form-control" name="name">
                <br>
                <input type="text" placeholder="Tuliskan Email" class="form-control" name="email">
                <br>
                <input type="text" placeholder="Tuliskan Password" class="form-control" name="hp">
                <br>
                <input type="file" class="pull-left" name="gambar">
              </center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa fa-close (alias) faa-tada animated-hover"></i> Batal</button>
              <button type="submit" class="btn btn-primary btn-sm" style="width:100px; border-radius: 20px;border: 2px solid #EFE4E4;"><i class="fa  fa-check faa-tada animated-hover"></i>  Simpan</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </form>
    <?php include "admin-footer.php";?>

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
<form action="action/admin_delete.php" method="GET" class="form-horizontal" enctype="multipart/form-data">
  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header <?php echo "$iden[color]";?>">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Form Detail Data Admin</h5>
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