<?php 
include "koneksi.php";
session_start();
if(!isset($_SESSION['login_member'])){
	echo "<script>alert('Silahkan login terlebih dulu..');window.location.href='index.php?page=masuk';</script>";
}else {
$query = mysqli_query($koneksi, "SELECT * FROM `user` where id_user='".$_SESSION['login_member']['id_user']."'");
$row = mysqli_fetch_array($query);
?>
<div class="login">
<form action="checkout.php" method="post" class="validate-form" id="konfirmasi" name="konfirmasi-alamat"> 
	<table id="signup" style="width:525px;">
	<tr>
		<td colspan="2">NAMA PENERIMA <br />
	    <input type="text" name="fullname" id="fullname" value="<?php echo $row['fullname']; ?>"/></td>
	</tr>
	<tr>
		<td colspan="2">NOMOR TELEPON <br />
	    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" id="harusnomor1"/></td>
	</tr>
	<tr>
		<td colspan="2">ALAMAT <br />
	    <textarea name="address" id="address"><?php echo $row['address']; ?></textarea></td>
	</tr>

	<tr>
		<td colspan="2">KOTA <br />
	    <select name="ongkir" style="background-color:white;width:260px;" id="ongkir"/>
	    	<option value="">** Pilih Lokasi</option>
	    	<?php
	    		$q = mysqli_query($koneksi, "SELECT * FROM shipping");
	    		$fill = '';
	    		while($x = mysqli_fetch_array($q)){
	    			$fill .='<option value="'.$x['tarif'].'"';
	    			if($row['city'] == $x['lokasi']){
	    				$fill .='selected';
	    			}
	    			$fill .='>'.$x['lokasi'].'</option>';
	    		}
    			echo $fill;
	    	?>
	    </select>
	    </td>
	    <input type="hidden" name="city" value="<?php echo $row['city']; ?>" id="city"/></td>
	</tr>

	<tr>
		<td colspan="2">KODE POS <br />
	    <input type="text" name="poscode" value="<?php echo $row['poscode']; ?>" id="harusnomor2"/></td>
	</tr>

	<tr>
		<td colspan="2"><button type="button" onclick="validation()"/>PROSES</button></td>
	</tr>
	</table>
</form>
</div>
<?php
}
?>
<script type="text/javascript">
	function validation(){
		var fullname = $('#fullname').val();
		var harusnomor1 = $('#harusnomor1').val();
		var address = $('#address').val();
		var ongkir = $('#ongkir').val();
		var harusnomor2 = $('#harusnomor2').val();

        if (fullname === '' || harusnomor1 === '' || address === '' || ongkir === '' || harusnomor2 === '') {
            alert("Data anda belum lengkap..!!");
        } else {
            $('#konfirmasi').submit();
        }
	}

</script>