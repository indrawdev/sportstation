<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<!-- <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script> -->
<!-- <script type="text/javascript" src="js/custom.js"></script> -->

<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
<script type="text/javascript">
    $(document).ready(function(){
      $("input[type=text]").val('');
      $("input[type=password]").val('');
    });
</script>
</head>
<body>
<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="#"><strong>Login Admin</strong></a>
		</div>
	</div>
</header>

<section id="content">
  <div id="login" class="box">
  	<h2>Login Admin</h2>
  	<section>
  		<form method="POST" action="cek_login.php">
  			<dl>
  				<dt>
          <label>Username</label></dt>
          <dd><input id="username" type="text" name="username"/></dd>

  				<dt><label>Password</label></dt>
  				<dd><input id="adminpassword" type="password" name="password"/></dd>
  			</dl>
  			<p>
  				<input type="submit" class="button white" value="Login"></input>
          <input type="reset" class="button white" value="Reset"></input>
  			</p>
  		</form>
  	</section>
  </div>
</section>
</body>
</html>
