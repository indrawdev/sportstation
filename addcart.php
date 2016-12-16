<form action="php/process_cart" method="post" name="rounnform" id="rounnform">
<div class="shopping" id="step_cart">
<h2 style="margin-bottom: 0px;">KERANJANG BELANJA</h2>
<table class="tcurrency">
<tr>
    <td align="right" style="color:#C00"><a href="clearcart.php" style="color:#C00">
    <img src="img/delete.png" style="width:18px;vertical-align:text-bottom;"/> CLEAR</a></td>
</tr>
</table>
<table class="thead">
<tr>
	<td align="left" width="20%" style="text-align:left">BARANG</td>
    <td align="left" width="15%" style="text-align:center">HARGA</td>
    <td align="left" width="20%" style="text-align:center">NAMA INISIAL</td>
    <td align="left" width="12%" style="text-align:center">BANYAK</td>
    <td align="left" width="20%" style="text-align:center">JUMLAH HARGA</td>
</tr>
</table>
<table class="tcontent">
<?php 
session_start();
if(isset($_SESSION['cart'])){
$_SESSION['total_tagihan'] = 0;
for($x=0; $x < count($_SESSION['cart']); $x++) {
$_SESSION['total_tagihan'] += $_SESSION['cart'][$x]['total'];
?>
<tr>
    <td width="20%" style="text-align:left"><?php echo $_SESSION['cart'][$x]['name_product']; ?></td>
    <td width="15%" style="text-align:left"><?php echo $_SESSION['cart'][$x]['price_product']; ?></td>
    <td width="20%" style="text-align:left"><?php echo $_SESSION['cart'][$x]['initial_name']; ?></td>
    <td width="12%" style="text-align:center"><?php echo $_SESSION['cart'][$x]['qty']; ?></td>
    <td width="20%" style="text-align:center">Rp <?php echo number_format($_SESSION['cart'][$x]['total']); ?></td>
</tr>
<?php } ?>
<tr>
    <td width="20%" colspan="4" style="text-align:right">Total Bayar : </td>
    <td width="20%" style="text-align:center"><strong style="font-size:16px">Rp <?php echo number_format($_SESSION['total_tagihan']); ?></strong></td>
</tr>
<?php
}
else{
    echo "<tr><td>No items in your shopping bag <br><br></td></td>";
}
 ?>
<?php 
if(count($_SESSION['cart']) > 0 ){
?>
<tr>
	<td style="border:none"><a href="index.php?page=konfirmasi-alamat"><input type="button" value="PROSES" /></a> <br /><br /><br /><br /></td>
</tr>
<?php } ?>
</table>

</div>
<!-- END OF CART -->