<!-- <h4 style="margin-bottom:30px;margin-top:0px;font-weight:700"> -->
	<!-- SELAMAT DATANG
	<br />DI WEBSITE
	<br />CLUTCH -->
<!-- </h4> -->
<!-- <br /> -->
<section style="width:700px;padding:0 30px;text-align:center;">
	<ul class="bxslider" style="margin-top:0px;margin-bottom:0px">
		<li><img src="img/slider_18.jpg" style="width:100%;height:400px" /></li>
		<li><img src="img/slider_13.jpg" style="width:100%;height:400px" /></li>
		<li><img src="img/slider_17.jpg" style="width:100%;height:400px" /></li>
		<li><img src="img/slider_19.jpg" style="width:100%;height:400px" /></li>
	</ul>
	<div>
	<h5 style="float:left;border: 1px solid #EFEFEF; padding: 4px 15px; margin: 13px 0 0 20px; border-bottom: 0px;margin-bottom:-10px">
	PRODUK BARU
	</h5><br><br>
	<hr style="border:0px;margin-top:2px;border-bottom: 1px solid #EFEFEF"><br>
		<div class="gallery js-flickity">
		<?php 
		include "koneksi.php";
		$query=mysqli_query($koneksi, "SELECT * FROM `product` ORDER BY `id_product` DESC limit 10");
		$numrow = mysqli_num_rows($query);
		if($numrow > 0){

			while($rowAll = mysqli_fetch_array($query)){
		?>

		  <div class="gallery-cell" data-flickity-options='{ "initialIndex": 2 }'>
			<div class="col3" style="text-align:center;margin-bottom:30px;">
				<div style="width:100%">
				<img src="img/<?php echo $rowAll['picture_product']; ?>" style="text-align:center;width:210px;"><br />
					<span class="dim">
						<br /><?php echo $rowAll['name_product']; ?>
						<br /><?php echo $rowAll['size_product']; ?>
						<br />
						<?php echo 'Rp '.number_format($rowAll['price_product']).',-'; ?> <br><br>
						<a type="button" class="active" href="?page=order&produk=<?php echo $rowAll['id_product']; ?>"/>BELI</a>
					</span>
				</div>
			</div>
		  </div>
		<?php } ?>
		</div>	
	</div>
<?php 
}else {
	echo "Maaf.. Belum ada barang yang tersedia..";
}
?>
</section>