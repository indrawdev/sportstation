<?php 
include "../koneksi.php";
$sql = "
SELECT
    user.fullname,
    user.city,
    user.address,
    user.poscode,
    user.phone,
    user.country,
    product.name_product,
    product.price_product,
    cart.qty,
    cart.date,
    cart.id_header
FROM `cart`
INNER JOIN user 
    ON cart.id_user = user.id_user
LEFT OUTER JOIN product
    ON cart.id_produk = product.id_product
WHERE cart.id_header = '".$_GET['id']."'";
$total = 0;
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
?>
<section id="main" class="grid_9 push_3">
    <article id="detail">
    <h2>Detail Pemesanan</h2><hr>
    <table id="table1" class="gtable sortable">
      <thead>
        <?php
          foreach($query as $row){
        ?>
        <tr>
          <td style="text-align:left;width:100px">Nama </td>
          <td style="text-align:left">: <strong><?php echo $row['fullname'];  ?></strong></td>
        </tr>
        <tr>
          <td style="text-align:left;width:100px">Alamat </td>
          <td style="text-align:left">: <strong><?php echo $row['address'];  ?></strong></td>
        </tr>
        <tr>
          <td style="text-align:left;width:100px">Kota </td>
          <td style="text-align:left">: <strong><?php echo $row['city'];  ?></strong></td>
        </tr>
        <tr>
          <td style="text-align:left">Kode Pos </td>
          <td style="text-align:left">: <strong><?php echo $row['poscode'];  ?></strong></td>
        </tr>
        <tr>
          <td style="text-align:left;width:100px">Negara </td>
          <td style="text-align:left">: <strong><?php echo $row['country'];  ?></strong></td>
        </tr>
        <tr>
          <td style="text-align:left">No HP </td>
          <td style="text-align:left">: <strong><?php echo $row['phone'];  ?></strong></td>
        </tr>
        <?php break; } ?>
      </thead>
    </table>
  </article>

  <article id="detail">
    <h2>Detail Pesanan</h2><hr>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Tanggal</th>
          <th>Total</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          foreach($query as $data){
          $total += ($data['qty'] * $data['price_product']);
        ?>
        <tr>
          <td><?php echo $data['name_product']; ?></td>
          <td><?php echo $data['price_product']; ?></td>
          <td><?php echo $data['qty']; ?></td>
          <td><?php echo $data['date']; ?></td>
          <td><?php echo ($data['qty'] * $data['price_product']); ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="3" style="text-align:right"></td>
          <td style="text-align:left"><strong>Total Tagihan</strong></td>
          <td><strong><?php echo $total; ?></strong></td>
        </tr>
      </tbody>
    </table>
  </article>
</section>
