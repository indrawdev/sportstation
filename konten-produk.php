<?php 
include "koneksi.php";
$category = $_GET['category'];

$sqlcategory = "SELECT * FROM category where id_category = '$category'";
$qcategory = mysqli_query($koneksi, $sqlcategory);
$rowCategory = mysqli_fetch_array($qcategory);
?>
<h4 style="margin-bottom:30px;font-weight:100; text-transform:uppercase;">
	KATEGORI <?php echo $rowCategory["name_category"]; ?>
</h4>
<br />

<section style="width:700px;padding:0 30px;text-align:center;">
	<?php 
	$query=mysqli_query($koneksi, "SELECT * FROM `product` where id_category = '$category' ORDER BY `name_product` ASC");
	$numrow = mysqli_num_rows($query);
	if($numrow > 0){

		foreach($query as $rowAll){
	?>
		<div class="col3">
			<div style="width:100%">
			<img src="img/<?php echo $rowAll['picture_product']; ?>" style="text-align:center;width:240px;"><br />
				<a type="button" class="active" href="?page=order&produk=<?php echo $rowAll['id_product']; ?>"/>BELI</a><br>
				<span class="dim">
					<br /><?php echo $rowAll['name_product']; ?>
					<br /><?php echo $rowAll['size_product']; ?>
					<br /><?php echo 'Rp '.number_format($rowAll['price_product']).',-'; ?>
					<br /><br /><br /><br />
				</span>
			</div>
		</div>
	<?php 
		} 
	}else {
		echo "Maaf.. Belum ada barang yang tersedia..";
	}
	?>
</section>