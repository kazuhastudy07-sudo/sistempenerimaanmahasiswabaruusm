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
                <li class="breadcrumb-item active">Cetak KTA Printer Fargo DTC</li>
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
          <h3 class="card-title"><i class="fa fa-print"></i> <b>CETAK DATA ANGGOTA PEMUDA PANCASILA</b></h3>
          <div class="card-tools">
            <div class="btn-group btn-xs">
              <button type="button" class="btn btn-xs bg-dark dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only small">Toggle Dropdown</span>
               <!--  <div class="dropdown-menu small" role="menu">
                 <a class="dropdown-item small" onclick="window.location.href='cetakdpw'" type="button"><i class="fa fa-angle-right"></i> DPW</a>
                 <a class="dropdown-item small" onclick="window.location.href='cetakdpd'" type="button"><i class="fa fa-angle-right"></i> DPD</a>
                 <a class="dropdown-item small" onclick="window.location.href='cetakdpc'" type="button"><i class="fa fa-angle-right"></i> DPC</a>
                 <a class="dropdown-item small" onclick="window.location.href='cetakdprt'" type="button"><i class="fa fa-angle-right"></i> DPRT</a>
                 <a class="dropdown-item small" onclick="window.location.href='cetaksimpatisan'" type="button"><i class="fa fa-angle-right"></i> SIMPATISAN</a>
               </div> -->
             </button><button type="button" class="btn btn-xs bg-dark"><i class="fa fa-print"></i> Cetak Kartu Anggota</button>
           </div>
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
                    <th>NPA</th>
                    <th>NIK</th>
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
                    "ajax": 'serverside/anggota_cetak.php',     
                    "columnDefs": [ 
                    { "targets": 0, "data": '1', "orderable": true, "searchable": true, "width": '30px', "className": 'center', }, 
                    
                    { "targets": 1, "className": 'center'},
                    { "targets": 2, "className": 'center'},
                    { "targets": 3, "className": 'center'},
                    { "targets": 4, "data": '4', "orderable": true, "searchable": true, "className": 'center' },{
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
                        return '<center><a data-toggle=\"tooltip\" title=\"Klik Untuk Melihat Photo\" href=\"\" onclick=\"window.open(\'../assets/dist/img/user/'+data+'\',\'popuppage\',\'width=420,toolbar=0,resizable=0,scrollbars=yes,height=400,top=100,left=300\');\" ><img class=\"img-responsive img-rounded" alt="Responsive image\" src=\"../assets/dist/img/user/'+data+'\" height=\"30px\"></a></center>'
                      } 
                    },
                    {
                      "targets": 8, "data": 8, 
                      "render": function(data, type, full) {
                       return '<center><div class="btn-group"><div class=\"btn-group\"><a type="button" onclick="window.location.href=\'cetakdtccr80?id='+data+'\'" class=\"btn btn-sm bg-navy\" data-toggle=\"tooltip\" title=\"Cetak Kartu CR80\"><i class=\"fa fa-print\"></i></a><a a type="button" onclick="window.location.href=\'cetakdtccr79?id='+data+'\'"" class=\"btn btn-sm bg-info\" data-toggle=\"tooltip\" title=\"Cetak Kartu CR79\"><i class=\"fa fa-print\"></i></a></div></center>';
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
          <div class="card-footer"><i class="fa fa-file-text-o"></i> EKTA Dapat Dicetak Dengan Memilih Salah Satu Tombol Cetak Kartu Sesuai Ukuran Kartu Pada Printer DTC!
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
      <!-- Modal Keluar -->

      <?php include "admin-footer.php";?>