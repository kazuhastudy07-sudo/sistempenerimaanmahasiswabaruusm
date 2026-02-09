
<?php
session_start();
include "../assets/config/koneksi.php";

$id = $_POST['id_user']; 
$row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users  WHERE id_user='$id'"));

?>
<center>
  <h2>Profil User</h2>
  <img style="width: 80px; object-fit: cover;overflow: hidden;" src="../assets/dist/img/user/<?php if (trim($row['gambar']) == ''){ echo "user.png"; }else{ echo $row['gambar']; } ?>" class="img-rounded elevation-2" alt="User Image">
  <br>
  <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
  <br/>
  <br/>
  <div class="callout callout-info">
    <h1><?php echo $row['name']; ?></h1>

    <p>Email: <?php echo $row['email']; ?>
    <br>Level: <?php 
    if ($row['id_level']=='1')
      { echo ""?> Super Administrator   <?php }  

    else if ($row['id_level']=='2') 
      { echo "";?>Administrator <?php echo "";} ?></p>

  </div>

</center>