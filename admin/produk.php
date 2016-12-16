<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT max(code_product) from product");
$data = mysqli_fetch_array($query);

if ($data){ 
   $nilaikode = substr($data[0], 4);
   $kode = (int) $nilaikode;
   $kode = $kode + 1;
   $hasilkode = "CLTH".str_pad($kode, 2, "0", STR_PAD_LEFT);
}else{
   $hasilkode = "CLTH"."01";
}
?>

<section id="main" class="grid_9 push_3">
  <article id="formadd" style="padding:5px;display:none">
      <form method="POST" action="addproduk.php" enctype="multipart/form-data">
          <fieldset>
          <legend>Tambah Produk</legend>
          <dl class="inline">
          <dt><label>Kode Produk</label></dt>
          <dd> : <input type="text" name="code_product" value="<?php echo $hasilkode; ?>" size="30" readonly></dd>
          <dt><label>Name Product</label></dt>
          <dd> : <input type="text" name="name_product" value="" size="30"></dd>
          <dt><label>Kategori Product</label></dt>
          <dd> : 
            <select name="id_category">
              <option value="">*Pilih Kategori</option>
                  <?php 
                  $q1 = mysqli_query($koneksi, "SELECT * FROM `category`");
                  while($r1 = mysqli_fetch_array($q1)){
                  ?>
                  <option value="<?php echo $r1['id_category']; ?>"><?php echo $r1['name_category']; ?></option>
                <?php } ?>
                </option>
            </select>
          </dd>
          <dt><label>Description Product</label></dt>
          <dd> : <textarea name="description_product" rows="10" cols="30"></textarea></dd>
          <dt><label>Price Product</label></dt>
          <dd> : <input type="text" name="price_product" value="" size="30"></dd>
          <dt><label>Size Product</label></dt>
          <dd> : <input type="text" name="size_product" value="" size="30"></dd>
          <dt><label>Berat</label></dt>
          <dd> : <input type="text" name="berat" value="" size="30"></dd>
          <dt><label>Status</label></dt>
          <dd> : 
               <label><input type="radio" name="status_product" value="public">
               Public</label>
               <label><input type="radio" name="status_product" value="draft">
               Draf</label>
          </dd>
          <dt><label>Stock</label></dt>
          <dd> : <input type="text" name="stock_product" value="" size="30"></dd>
          <dt><label>Picture</label></dt>
          <dd> : <input type="file" name="picture_product" size="30"></dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Tambah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
      </form>
  </article>

  <article id="dashboard">
    <h2>Daftar Produk</h2><hr>
    <input type="button" class="button blue" value="Tambah Produk" onclick="showadd()">
    <br><br>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Code</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Status</th>
          <th>Stock</th>
          <th>Picture	</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `product` ORDER BY `product`.`name_product` ASC");
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['code_product']; ?></td>
          <td><?php echo $data['name_product']; ?></td>
          <td>
            <?php
              if (strlen($data['description_product']) > 50)
              echo substr($data['description_product'], 0, 50) . '...';
              else
              echo $data['description_product'];
            ?>
          </td>
          <td><?php echo $data['price_product']; ?></td>
          <td><?php echo $data['status_product']; ?></td>
          <td><?php echo $data['stock_product']; ?></td>
          <td><?php echo "<img src='../img/".$data['picture_product']."' style='width:80px'>"; ?></td>
          <td>
             <a href="?module=editproduk&id=<?php echo $data['id_product']; ?>" title="Edit"><img src="images/icons/edit.png" alt="Edit"></a> |
             <a href="deleteproduk.php?id=<?php echo $data['id_product']; ?>" title="Hapus"><img src="images/icons/cross.png" alt="Delete"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </article>
</section>

<script type="text/javascript">
  function showadd(){
      $('#formadd').fadeIn();
  }
  function backtable(){
      $('#formadd').fadeOut();
  }
</script>