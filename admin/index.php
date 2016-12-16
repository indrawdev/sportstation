<?php
// Turn off all error reporting
error_reporting(0);
?>


<html>
<head>
<title>SportStation Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<link rel="stylesheet" href="datepicker/jquery-ui.css">
<script src="datepicker/jquery-1.10.2.js"></script>
<script src="datepicker/jquery-ui.js"></script>
<!-- <script type="text/javascript" src="js/custom.js"></script> -->
</head>
<body>
<?php include "cek_session.php"; ?>
<header id="top">
	<div class="container_12 clearfix">
		<div id="logo" class="grid_5">
			<!-- replace with your website title or logo -->
			<a id="site-title" href="index.php"><span>SportStation</span></a>
		</div>

		<div id="userinfo" class="grid_3">
			Welcome, <a href='#'>
        <?php
          session_start();
          echo $_SESSION['login_admin']['name_admin'];
        ?>
      </a>
		</div>
	</div>
</header>

<section class="container_12 clearfix" style="margin-top:15px;">
  <?php
    switch ($_GET['module']) {
        case "password":
            include "password.php";
        break;
        case "produk":
            include "produk.php";
        break;
        case "kategori":
            include "category.php";
        break;
        case "member":
            include "member.php";
        break;
        case "pemesanan":
            include "pemesanan.php";
        break;
        case "konfirmasi":
            include "konfirmasi.php";
        break;
        case "gantipassword":
            include "gantipassword.php";
        break;
        case "laporan":
            include "laporan.php";
        break;
        case "editmember":
            include "editmember.php";
        break;
        case "editproduk":
            include "editproduk.php";
        break;
        case "editshipping":
            include "editshipping.php";
        break;
        case "editcategory":
            include "editcategory.php";
        break;
        case "detailtransaksi":
            include "detailtransaksi.php";
        break;
        case "review":
            include "review.php";
        break;
        case "shipping":
            include "shipping.php";
        break;
          default:
            include "dashboard.php";
    }
  ?>

  <aside id="sidebar" class="grid_3 pull_9">
		<div class="box menu">
			<h2>Menu Utama<img src="images/icons/arrow_state_grey_expanded.png" class="toggle"></h2>
			<section>
				<ul>
					<li class="garisbawah"><a href="index.php">Home</a></li>
					<li class="garisbawah"><a href="?module=gantipassword">Ganti Password</a></li>
					<li class="garisbawah"><a href="?module=produk">Produk</a></li>
					<li class="garisbawah"><a href="?module=kategori">Kategori</a></li>
					<li class="garisbawah"><a href="?module=member">Member</a></li>
					<li class="garisbawah"><a href="?module=pemesanan">Pemesanan Barang</a></li>
                    <li class="garisbawah"><a href="?module=konfirmasi">Konfirmasi</a></li>
                    <li class="garisbawah"><a href="?module=shipping">Biaya Pengiriman Barang</a></li>
					<li class="garisbawah"><a href="?module=review">Review Produk</a></li>
					<li class="garisbawah"><a href="?module=laporan">Laporan</a></li>
				</ul>
			</section>
		</div>
    <div class="box">
			<h2>Informasi<img src="images/icons/arrow_state_grey_expanded.png" class="toggle"></h2>
			<section>
				Anda masih dalam keadaan login sebagai : <b>Administrator</b>. <br>Jangan lupa untuk <a href="logout.php"><b>Logout</b></a> sebelum meninggalkan website ini.				</section>
		</div>
	</aside>
</section>
</body>
</html>
