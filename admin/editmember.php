<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * from user where id_user='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
?>

<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updatemember.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
          <fieldset>
          <legend>Edit Member</legend>
          <dl class="inline">
          <dt><label>Fullname</label></dt>
          <dd> : <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" size="30"></dd>
          <dt><label>Password</label></dt>
          <dd> : <input type="text" name="password" value="" placeholder="Isi jika ingin mengganti password" size="30"></dd>
          <dt><label>City</label></dt>
          <dd> : <input type="text" name="city" value="<?php echo $row['city']; ?>" size="30"></dd>
          <dt><label>Country</label></dt>
          <dd> : <input type="text" name="country" value="<?php echo $row['country']; ?>" size="30"></dd>
          <dt><label>Address</label></dt>
          <dd> : <input type="text" name="address" value="<?php echo $row['address']; ?>" size="30"></dd>
          <dt><label>Poscode</label></dt>
          <dd> : <input type="text" name="poscode" value="<?php echo $row['poscode']; ?>" size="30"></dd>
          <dt><label>Email</label></dt>
          <dd> : <input type="email" name="email" value="<?php echo $row['email']; ?>" size="30"></dd>
          <dt><label>Phone</label></dt>
          <dd> : <input type="text" name="phone" value="<?php echo $row['phone']; ?>" size="30"></dd>
          <dt><label>Status</label></dt>
          <dd> : <input type="text" name="status" value="<?php echo $row['status']; ?>" size="30"></dd>
          <dt><label>Blokir</label></dt>     
          <dd> : 
                 <label><input type="radio" name="status" value="blokir" <?php if($row['status']=="blokir") echo "checked"; ?>>Y</label>
                 <label><input type="radio" name="status" value="aktif" <?php if($row['status']=="aktif") echo "checked"; ?>>N</label>
          </dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Update">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>