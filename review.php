<form action="save-review.php" method="post" class="validate-form" id="signupform" name="signupform" style="text-align: left;padding:20px;width:650px;margin-top:-8px;margin: 0 auto;"> 
	<table id="signup">
	<tr>
		<td colspan="2" style="text-align: left;font-size:12px">KOMENTAR PRODUK<br /><br />
		<input type="hidden" name="id_product" value="<?php echo $_GET['pid']; ?>">
	    <textarea name="komentar" required style="border-radius: 2px;
	    border: 0px;
	    background-color: whitesmoke;
	    color: #232122;
	    padding: 7px 12px;
	    width: 400px;
	    height: 100px;
	    "></textarea></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:left">
		<strong><button type="submit" class="active" style="width: 150px;border-radius:3px;font-weight:600;font-size:11px"><i class="fa fa-send"></i> KIRIM</button></strong>
		</td>
	</tr>
	</table>
</form>
