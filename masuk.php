<script> 
$(document).ready(function(){
	$('#forgot').hide();
	$('#wrapname').hide();
	$('#cname').prop('disabled', true);
	
	$('#reset_email').focus(function() {
		$('#forgot').slideDown('fast');
	});
	$('#reset_email').blur(function() {
		$('#forgot').slideUp('fast');
	});

	$("input[type=text]").val('');

});
</script>
<div class="login">
	<table id="login">
		<form action="check_login.php" method="post"> 
			<tr>
				<td>E-MAIL <br />
			    <input type="text" placeholder="Email" id="email" name="email"/></td>
			</tr>
			<tr>
				<td>PASSWORD <br />
			    <input type="password" placeholder="Password" id="password" name="password"/></td>
			</tr>

			<tr>
				<td colspan="2"><input type="submit" name="buttonlogin" value="LOG IN" /></td>
			</tr>
		</form>
	</table>
</div>