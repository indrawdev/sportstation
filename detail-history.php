<?php
include "koneksi.php";
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
    product.id_product,
    cart.qty,
    cart.date,
    cart.id_header,
    cart.status_pemesan
FROM `cart`
INNER JOIN user 
    ON cart.id_user = user.id_user
LEFT OUTER JOIN product
    ON cart.id_produk = product.id_product
WHERE cart.id_header = '".$_GET['d']."'";
$total = 0;
?>
<div class="login" style="margin:0 auto;">
<article id="transaksi">
<h2>Detail Pesanan</h2>
<table id="table1" class="transaksi">
  <thead>
    <tr>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Qty</th>
      <th>Tanggal</th>
      <th>Total</th>
      <th style="text-align:center">Tindakan</th>
      </tr>
  </thead>
  <tbody class="ui-sortable">
    <?php
      $query = mysqli_query($koneksi, $sql);
      while($data = mysqli_fetch_array($query)){
      $total += ($data['qty'] * $data['price_product']);
    ?>
    <tr>
      <td><?php echo $data['name_product']; ?></td>
      <td><?php echo $data['price_product']; ?></td>
      <td><?php echo $data['qty']; ?></td>
      <td><?php echo $data['date']; ?></td>
      <td>Rp. <?php echo ($data['qty'] * $data['price_product']); ?></td>
      <td style="padding:0px;width:100px;">
      <button style="width:100px;height:46px;padding:0px;margin:0px;" 
      <?php if($data['status_pemesan'] == 'checkout'){ echo "disabled"; } ?>
      class="btn btn-primary" onclick="window.open('index.php?page=review&pid=<?php echo $data['id_product']; ?>')">
      <i class="fa fa-comments"></i> Review</button></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="3" style="text-align:right"></td>
      <td style="text-align:left"><strong>Total Tagihan</strong></td>
      <td colspan="2"><strong>Rp. <?php echo $total; ?></strong></td>
    </tr>
  </tbody>
</table>
</article>