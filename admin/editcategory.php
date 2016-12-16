<?php
include "../koneksi.php";

if($_GET['type'] == 'sub'){
$query = mysqli_query($koneksi, "SELECT * from `sub-category` where id_sub='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
?>

<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updatecategory.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id_sub']; ?>">
          <input type="hidden" name="tipe" value="sub">
          <fieldset>
          <legend>Edit Sub Kategori</legend>
          <dl class="inline">
          <dt><label>Kategori</label></dt>
          <dd> : 
            <select name="id_category">
              <option value="">*Pilih Kategori</option>
              <?php
                $q = mysqli_query($koneksi, "SELECT * FROM `category` ORDER BY `id_category` ASC");
                while($r = mysqli_fetch_array($q)){
              ?>
              <option value="<?php echo $r['id_category']; ?>" <?php if($r['id_category'] == $row['id_category']){ echo "selected"; } ?>><?php echo $r['name_category']; ?></option>
              <?php } ?>
            </select>
          </dd>
          <dt><label>Nama Sub Kategori</label></dt>
          <dd> : <input type="text" name="name_sub" value="<?php echo $row['name_sub']; ?>" size="30"></dd>
          <dt><label>Status</label></dt>
          <dd> : 
               <label><input type="radio" name="status" value="public" <?php if($row['status']=="public") echo "checked"; ?>>
               Public</label>
               <label><input type="radio" name="status" value="draft" <?php if($row['status']=="draft") echo "checked"; ?>>
               Draf</label>
          </dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Rubah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>

<?php } else {
$query = mysqli_query($koneksi, "SELECT * from category where id_category='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
?>

<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updatecategory.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id_category']; ?>">
          <fieldset>
          <legend>Edit Kategori</legend>
          <dl class="inline">
          <dt><label>Nama Kategori</label></dt>
          <dd> : <input type="text" name="name_category" value="<?php echo $row['name_category']; ?>" size="30"></dd>
          <dt><label>Status</label></dt>
          <dd> : 
               <label><input type="radio" name="status_category" value="public" <?php if($row['status_category']=="public") echo "checked"; ?>>
               Public</label>
               <label><input type="radio" name="status_category" value="draft" <?php if($row['status_category']=="draft") echo "checked"; ?>>
               Draf</label>
          </dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Rubah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>

<?php } ?>