<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT * from `product` where id_product='".$_GET['id']."'");
$row = mysqli_fetch_array($query);
?>

<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updateproduk.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $row['id_product']; ?>">
          <fieldset>
          <legend>Edit Produk</legend>
          <dl class="inline">
          <dt><label>Kode Produk</label></dt>
          <dd> : <input type="text" name="code_product" value="<?php echo $row['code_product']; ?>" size="30" readonly></dd>
          <dt><label>Name Product</label></dt>
          <dd> : <input type="text" name="name_product" value="<?php echo $row['name_product']; ?>" size="30"></dd>
          <dt><label>Kategori Product</label></dt>
          <dd> : 
            <select name="id_category">
              <option value="">*Pilih Kategori</option>
                  <?php 
                  include "../koneksi.php";
                  $q1 = mysqli_query($koneksi, "SELECT * FROM `category`");
                  while($r1 = mysqli_fetch_array($q1)){
                  ?>
                  <option value="<?php echo $r1['id_category']; ?>"><?php echo $r1['name_category']; ?></option>
                <?php } ?>
                </option>
            </select>
          </dd>
          <dt><label>Description Product</label></dt>
          <dd> : <textarea name="description_product" rows="10" cols="30"><?php echo $row['description_product']; ?></textarea></dd>
          <dt><label>Price Product</label></dt>
          <dd> : <input type="text" name="price_product" value="<?php echo $row['price_product']; ?>" size="30"></dd>
          <dt><label>Size Product</label></dt>
          <dd> : <input type="text" name="size_product" value="<?php echo $row['size_product']; ?>" size="30"></dd>
          <dt><label>Berat</label></dt>
          <dd> : <input type="text" name="berat" value="<?php echo $row['berat']; ?>" size="30"></dd>
          <dt><label>Status</label></dt>
          <dd> : 
               <label><input type="radio" name="status_product" value="public" <?php if($row['status_product']=="public") echo "checked"; ?>>
               Public</label>
               <label><input type="radio" name="status_product" value="draft" <?php if($row['status_product']=="draft") echo "checked"; ?>>
               Draf</label>
          </dd>
          <dt><label>Stock</label></dt>
          <dd> : <input type="text" name="stock_product" value="<?php echo $row['stock_product']; ?>" size="30"></dd>
          <dt><label>Picture</label></dt>
          <dd> : <input type="file" name="picture_product" size="30"></dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Rubah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>