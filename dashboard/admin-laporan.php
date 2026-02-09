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
                <li class="breadcrumb-item active">Laporan Data</li>
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
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
         <div class="card">
          <div class="card-header <?php echo "$iden[color]";?>">
            <h3 class="card-title"><i class="fa fa-book"></i> Laporan Data Anggota Semua Wilayah </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
                </div>
              </div>

              <div class="card-body">
                <form class='form-horizontal' role='form' method=POST target='blank' action='unduh' enctype='multipart/form-data'> 
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="input-group mb-5">
                          <div class="input-group-prepend">
                            <span class="input-group-text" style="width: 130px;">Dari Tanggal</span>
                          </div>
                          <input type="date" class="form-control" name="from" value="<?php echo date('Y-m-d'); ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <div class="input-group mb-5 ">
                          <div class="input-group-prepend">
                            <span class="input-group-text"  style="width: 130px;">Sampai Tanggal</span>
                          </div>
                          <input type="date" class="form-control" name="end" value="<?php echo date('Y-m-d'); ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Ekspor Data Ke Excel</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-6">
            <div class="card">
              <div class="card-header <?php echo "$iden[color]";?>">
                <h3 class="card-title"><i class="fa fa-book"></i> Laporan Data Anggota Kabupaten/Kota </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                    </div>
                  </div>

                  <div class="card-body">
                    <form class='form-horizontal' role='form' method="get" target='blank' enctype='multipart/form-data' target='blank' action='unduhkab' enctype='multipart/form-data'>
                      <div class="card-body">
                        <div class='form-group'>
                          <label class='col-6 control-label'>ID - Nama Kabupaten/Kota:</label>
                          <div class='col-8'>
                           <!--  <input type='text' class='form-control' name="b" value="Malang (Kota)"> -->
                           <select id="kabupaten" name='id_kab' class='form-control' required>
                            <?php
                            $tampil = mysqli_query($con, "SELECT * FROM regencies where id_prov='63'");
                            while($row=mysqli_fetch_array($tampil)) {
                              ?>
                              <option id="kabupaten" class="<?php echo $row['nama_provinsi']; ?>" value="<?php echo $row['id_kab']; ?>"><?php echo $row['id_kab']; ?> - <?php echo $row['nama_kabupaten']; ?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div> 
                      <div class='form-group'>
                        <label class='col-sm-3 control-label'></label>
                        <div class='col-sm-9'>
                          <button type="submit" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Ekspor Data Ke Excel</button>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
            <?php include "admin-footer.php"; ?>
