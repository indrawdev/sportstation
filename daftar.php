<div class="login">
<form action="signup.php" method="post" class="validate-form" id="signupform" name="signupform"> 
	<table id="signup" style="width:525px;">
	<tr>
		<td colspan="2">E-MAIL <br />
	    <input type="text" name="email" id="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" title="Provide valid email address"/></td>
	</tr>
	<tr>
		<td colspan="2">KATA SANDI <br />
	    <input type="password" name="password" id="password" pattern="[a-zA-Z0-9]{6,}" title="Minimum 6 letters or numbers and no space"/></td>
	</tr>
	<tr>
		<td colspan="2">NAMA LENGKAP <br />
	    <input type="text" name="fullname" id="fullname" ></td>
	</tr>
	<tr>
		<td colspan="2">NOMOR TELEPON <br />
	    <input type="text" name="phone"  id="harusnomor1" /></td>
	</tr>
	<tr>
		<td colspan="2">ALAMAT <br />
	    <textarea name="address" id="address"> </textarea></td>
	</tr>

	<tr>
		<td colspan="2">KOTA <br />
	    <input type="text" name="city" id="city"></td>
	</tr>

	<tr>
		<td colspan="2">NEGARA <br />
	    <input type="text" name="country" id="country"></td>
	</tr>

	<tr>
		<td colspan="2">KODE POS <br />
	    <input type="text" name="poscode" id="harusnomor2" /></td>
	</tr>

	<tr>
		<td colspan="2"><input type="button" onclick="validation()" value="DAFTAR" style="margin-top:10px;width:260px;padding: 8px 0px;" /></td>
	</tr>
	</table>
</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('input[type=text]').val('');
	});

	function validation(){
		var fields = $("form :input");
        var emptyFields = fields.filter(function() {
            return $.trim(this.value) === "";
        });

        // console.log(emptyFields);

        if (!emptyFields.length) {
            $('#signupform').submit();
        } else {
            alert("Data anda belum lengkap..!!");
        }
	}

</script>