<?php 
include "koneksi.php";
$query=mysqli_query($koneksi, "SELECT * FROM `product` where id_product = '".$_GET['produk']."' LIMIT 1");
$row = mysqli_fetch_array($query);
?>
<style type="text/css">
	* { border:0; margin:0; padding:0; }
	p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}
	.zoom {
		display:inline-block;
		position: relative;
	}
		
	/* magnifying glass icon */
	.zoom:after {
		content:'';
		display:block; 
		width:33px; 
		height:33px; 
		position:absolute; 
		top:0;
		right:0;
		background:url(icon.png);
	}

	.zoom img {
		display: block;
	}

	.zoom img::selection { background-color: transparent; }
</style>
<script src='js/jquery.zoom.js'></script>
<script>
	$(document).ready(function(){
		$('#ex1').zoom();
	});
</script>
<h4 style="margin-bottom:10px;font-weight:100; text-transform:uppercase;text-align:center;">
	<?php echo $row['name_product']; ?>
</h4>
<form action="proses-beli.php" method="post" id="formcek">
<div class="left" style="text-align:center">
	<input type="hidden" value="<?php echo $_GET['produk']; ?>" name="id_produk">
	<input type="hidden" name="name_product" value="<?php echo $row['name_product']; ?>">
	<input type="hidden" name="price_product" value="<?php echo $row['price_product']; ?>">

	<div class="master" style="display: block;">
		<span class='zoom' id='ex1' style="margin-left: -18px;margin-top: 15px;">
		<img src="img/<?php echo $row['picture_product']; ?>" id="front_leather" width='390' height='260' >
		</span>
	    <div id="initial" class="initial"> </div>
	</div>
	<table>
	    <tbody>
	    <tr>
	        <td>NAMA INISIAL</td>
	        <td>JUMLAH PESAN</td>
	        <td>STOK</td>
	        <td>&nbsp;</td>
	    </tr>
	    <tr>
	        <td valign="top" style="font-size:12px"><input type="text" maxlength="3" name="initial_name" ><br>
	        	Sampai dengan 3 huruf</td>
	        <td valign="top"><input type="number" max="999" min="1" value="1" name="qty" id="qty"></td>
	        <td valign="top">
	        <input type="number" max="999" min="1" value="<?php echo $row['stock_product']; ?>" readonly name="stock" style="width:53px;padding: 5px 10px" id="stock">
	        <input type="hidden" max="999" min="1" value="<?php echo $row['berat']; ?>" readonly name="berat" style="width:53px;padding: 5px 10px">
	        </td>
	        <td valign="top">
	        <?php if($row['stock_product'] > 0){
			echo '<input type="button" onclick="ceksebelumorder()" class="active" value="BELI" style="margin-top:0px;margin-bottom:3px;height:31px;width: 112px;">';
			}else{ echo '<input type="submit" disabled class="btn-warning" value="Stok Kosong" style="margin-top:0px;height:25px;background-color:#eee;color:black;width: 112px;">';
			   } 
			?>
	        </td>
	    </tr>
	    <tr>
	    	<td colspan="4" style="text-align:justify;font-size:12px;"><br><br>
	    		<?php echo $row['description_product']; ?>
	        </td>
	    </tr>
	    </tbody>
	</table>
</div>

<p></p>
</div>
<script type="text/javascript">
	function ceksebelumorder(){
		var qty = $('#qty').val();
		var stock = $('#stock').val();

		if(qty <= stock){
			$("#formcek").submit();
		}else {
			alert('stock tidak mencukupi..!');
		}
	}
	
</script>