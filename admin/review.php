<section id="main" class="grid_9 push_3">
  <article id="dashboard">
    <h2>Daftar Review Produk</h2><hr>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>ID Produk</th>
          <th>Produk</th>
          <th>Nama Pembeli</th>
          <th>Komentar</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $sql = "
              SELECT 
                user.fullname,
                product.name_product,
                product.code_product,
                  review.komentar
              FROM review
              INNER JOIN user
                ON review.id_user = user.id_user
              LEFT OUTER JOIN product
                ON review.id_product = product.id_product
          ";
          $query = mysqli_query($koneksi, $sql);
          foreach($query as $data){
        ?>
        <tr>
          <td><?php echo $data['code_product']; ?></td>
          <td><?php echo $data['name_product']; ?></td>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['komentar']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </article>
</section>
