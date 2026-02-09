
<?php
session_start();
include "../assets/config/koneksi.php";

$id = $_POST['id_testi']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM testimoni WHERE id_testi='$id'"));

?>


<input type="hidden" class="form-control" name="id_testi" value="<?php echo $row['id_testi'];?>">
<h1><center><i class="fa  fa-warning"></i></center></h1>
<center><h4>Anda yakin untuk mem-publis data testimoni?</h4>
</center>