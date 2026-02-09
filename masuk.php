<?php if(count($errors) > 0)
{ ?>
  <br/>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>
      <?php
      foreach($errors as $showerror)
      {
        echo $showerror;
      }
      ?>

    </strong>
  </div>
  <?php
}
?>
<label style="padding-top: 10px;">Silahkan isi form login berikut!</label>
<div class="input-group mb-3">
  <input type="email" class="form-control" placeholder="Email" name="email" required="true">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fa fa-envelope faa-pulse faa-vertical animated"></span>
    </div>
  </div>
</div>
<div class="input-group mb-3">
  <input type="password" class="form-control" placeholder="Password" name="password" required="true">
  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fa fa-key faa-pulse faa-shake animated"></span>
    </div>
  </div>
</div>