<?php 
include "koneksi.php";
session_start();
$query = mysqli_query($koneksi, "SELECT * FROM `user` where id_user='".$_SESSION['login_member']['id_user']."'");
$row = mysqli_fetch_array($query);
?>
<div class="login">
<form action="update-data.php" method="post" class="validate-form" id="signupform" name="signupform"> 
	<table id="signup" style="width:525px;">
	<tr>
		<td colspan="2">E-MAIL <br />
	    <input type="text" name="email" value="<?php echo $row['email']; ?>" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" title="Provide valid email address"/></td>
	</tr>
	<tr>
		<td colspan="2">KATA SANDI <br />
	    <input type="password" name="password" placeholder="input jika ingin ganti sandi" pattern="[a-zA-Z0-9]{6,}" title="Minimum 6 letters or numbers and no space"/></td>
	</tr>
	<tr>
		<td colspan="2">NAMA LENGKAP <br />
	    <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required/></td>
	</tr>
	<tr>
		<td colspan="2">NOMOR TELEPON <br />
	    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required id="harusnomor1"/></td>
	</tr>
	<tr>
		<td colspan="2">ALAMAT <br />
	    <textarea name="address" required><?php echo $row['address']; ?></textarea></td>
	</tr>

	<tr>
		<td colspan="2">KOTA <br />
	    <input type="text" name="city" value="<?php echo $row['city']; ?>" required/></td>
	</tr>

	<tr>
		<td colspan="2">NEGARA <br />
	    <input type="text" name="country" value="<?php echo $row['country']; ?>" required/></td>
	</tr>

	<tr>
		<td colspan="2">KODE POS <br />
	    <input type="text" name="poscode" value="<?php echo $row['poscode']; ?>" required id="harusnomor2"/></td>
	</tr>

	<tr>
		<td colspan="2"><input type="submit" value="PERBARUI DATA"/></td>
	</tr>
	</table>
</form>
</div>