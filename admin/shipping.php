<section id="main" class="grid_9 push_3">
  <article id="formadd" style="padding:5px;display:none">
      <form method="POST" action="addshipping.php" enctype="multipart/form-data">
          <fieldset>
          <legend>Tambah Kota</legend>
          <dl class="inline">
          <dt><label>Kota</label></dt>
          <dd> : <input type="text" name="kota" value="" size="30"></dd>
          <dt><label>Biaya</label></dt>
          <dd> : <input type="text" name="biaya" value="" size="30"></dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Tambah">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
      </form>
  </article>

  <article id="dashboard">
    <h2>Daftar Kota</h2><hr>
    <input type="button" class="button blue" value="Tambah Kota" onclick="showadd()">
    <br><br>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Kota</th>
          <th>Biaya</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `shipping` ORDER BY `id_shipping` DESC");
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['lokasi']; ?></td>
          <td><?php echo $data['tarif']; ?></td>
          <td>
             <a href="?module=editshipping&id=<?php echo $data['id_shipping']; ?>" title="Edit"><img src="images/icons/edit.png" alt="Edit"></a> |
             <a href="deleteshipping.php?id=<?php echo $data['id_shipping']; ?>" title="Hapus"><img src="images/icons/cross.png" alt="Delete"></a>
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