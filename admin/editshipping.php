<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT * from `shipping` where id_shipping='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
?>

<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updateshipping.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id_shipping']; ?>">
          <fieldset>
          <legend>Edit Biaya Kirim</legend>
          <dl class="inline">
          <dt><label>Kota</label></dt>
          <dd> : <input type="text" name="lokasi" value="<?php echo $row['lokasi']; ?>" size="30"></dd>
          <dt><label>Biaya</label></dt>
          <dd> : <input type="text" name="tarif" value="<?php echo $row['tarif']; ?>" size="30"></dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Rubah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>