<section class="grid_9 push_3">
  <article id="formadd" style="padding:5px;display:none">
  <form method="POST" action="addcategory.php" enctype="multipart/form-data">
            <fieldset>
            <legend>Tambah Kategori</legend>
            <dl class="inline">
            <dt><label>Nama Kategori</label></dt>
            <dd> : <input type="text" name="name_category" value="" size="30"></dd>
            <dt><label>Status</label></dt>
            <dd> : 
                 <label><input type="radio" name="status_category" value="public">
                 Public</label>
                 <label><input type="radio" name="status_category" value="draft">
                 Draft</label>
            </dd>
            <div class="buttons">
              <input class="button blue" type="submit" value="Tambah">
              <input class="button blue" type="button" value="Batal" onclick="backtable()">
            </div>
            </fieldset>
  </form>
  </article>

  <article id="tabledata">
    <h2>Daftar Kategori</h2><hr>
    <input type="button" class="button blue" value="Tambah Kategori" onclick="showadd()">
    <br><br>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Nama Kategori</th>
          <th>Status</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `category` ORDER BY `id_category` ASC");
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['name_category']; ?></td>
          <td><?php echo $data['status_category']; ?></td>
          <td>
             <a href="?module=editcategory&id=<?php echo $data['id_category']; ?>" title="Edit"><img src="images/icons/edit.png" alt="Edit"></a> |
             <a href="deletecategory.php?id=<?php echo $data['id_category']; ?>" title="Hapus"><img src="images/icons/cross.png" alt="Delete"></a>
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
      $('#tabledata').fadeIn();
      $('#formadd').fadeOut();
  }
</script>