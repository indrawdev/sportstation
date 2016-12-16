<?php
// Turn off all error reporting
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SportStation</title>

<!-- SEO meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8" />
<meta content='SportStation' name='description'/>
<meta content='SportStation' name='keywords'/> 
<meta http-equiv="content-language" content="en" />

<link href="css/index.css" rel="stylesheet" type="text/css"/>
<link href="img/xlogo.png" rel="shortcut icon" type="image/x-icon"/>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<!-- bxSlider CSS file -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
<script src="slideshow/jquery.bxslider.min.js"></script>
<link href="slideshow/jquery.bxslider.css	" rel="stylesheet" />

<!-- slidenewprod -->
<link rel="stylesheet" href="jquery-flickity/flickity.css" type="text/css" media="all"/>
<script type="text/javascript" src="jquery-flickity/flickity.pkgd.js"></script>

<!-- isnumeric -->
<script type="text/javascript" src="isnumber/jquery.numeric.js"></script>

<style>
.transaksi td, th {
    border: 1px solid #ddd;
    text-align: left;
}

.transaksi {
    border-collapse: collapse;
    width: 100%;
}

.transaksi th, .transaksi td {
    padding: 15px;
}
</style>

<script> 
$(document).ready(function(){	
$('.menu').hide();
	$('#design').click(function(){
		$('.menu').toggle(300);
	});
});
</script>
</head>
<body>

<header>
<table>
	<tr>
		<td style="vertical-align:top;">
			<nav>
			<div><a href="#" id="design">KATEGORI PRODUK</a>
				<div class="menu" style="text-transform: uppercase;">
				<?php
					include "koneksi.php";
					$query=mysqli_query($koneksi, "select * from category where status_category='public'");
					
					while($data=mysqli_fetch_array($query)){
						echo '<a href="?page=produk&category='.$data['id_category'].'">'.$data[name_category].'</a><br />';
					}
				?>
			    </div>
			</div>
			<div><a href="index.php?page=tentang">TENTANG</a></div>
			<div><a href="index.php?page=kontak">KONTAK</a></div>
			<div><a href="index.php?page=bantuan">BANTUAN</a></div>

			<br /><br />

			<div>
			<?php 
				session_start();
				if(!isset($_SESSION['login_member'])){
					echo '<a href="?page=masuk">MASUK</a> / <a href="?page=daftar">DAFTAR</a>';
				}
				else {
					echo '
						<b style="font-size: 13px;">Selamat Datang, <br>'.$_SESSION['login_member']['fullname'].'</b>
						<br>
						<a href="index.php?page=akun-saya">PROFIL SAYA</a>
						<br>
						<a href="index.php?page=history">RIWAYAT BELANJA</a>
						<br>
						<a href="logout.php">KELUAR</a>
					';
				}
			?>

			</div>

			<div>
				<a href="index.php?page=cart">
				<?php 
					$j = 0;
					for($i=0; $i < count($_SESSION['cart']); $i++){
						$j += $_SESSION['cart'][$i]['qty'];
					}
					if($j > 0){
						echo'KERANJANG BELANJA ('.$j.')';
					}
					else {
						echo 'KERANJANG BELANJA (0)';
					}

				?>
				</a>	
			</div>
			</nav>
		</td>
		<td style="vertical-align:top;">
			<div class="head" id="design_head">
			<a href="index.php"><img src="img/logo.png" class="logo"/></a><br />
			<img src="img/header_shadow.png" class="shadow"/>
			<div class="design" style="left:20px;">
				<?php
				switch ($_GET['page']) {
				    case "produk":
				        include "konten-produk.php";
				        break;
				    case "tentang":
				        include "about.php";
				        break;
				    case "bantuan":
				        include "help.php";
				        break;
				    case "masuk":
				        include "masuk.php";
				        break;
				    case "akun-saya":
				        include "akun-saya.php";
				        break;
				    case "daftar":
				        include "daftar.php";
				        break;
				    case "keranjang":
				        include "keranjang.php";
				        break;
				    case "order":
				        include "order.php";
				        break;
				    case "cart":
				        include "addcart.php";
				        break;
				    case "konfirmasi":
				        include "konfirmasi.php";
				        break;
				    case "kontak":
				        include "contact.php";
				        break;
			        case "transfer":
				        include "transfer.php";
				        break;
					case "history":
				        include "history.php";
				        break;
			        case "detail-transaksi":
				        include "detail-history.php";
				        break;
			        case "review":
				        include "review.php";
				        break;
			        case "konfirmasi-alamat":
				        include "konfirmasi-alamat.php";
				        break;
			        default:
			        	include "semua-produk.php";
				}
				?>
			</div>
		</td>
		<td style="vertical-align:top;text-align:left">
			<div style="margin-top:73px">
				<h6 style="text-transform:uppercase;">Bank Yang Didukung: </h6><br>
				<img src="img/mandiri.png" style="width:100px;margin-top:-10px;">
				<img src="img/bca.jpg" style="width:100px;margin-top:20px">
				<hr style="border:0px;border-bottom:1px solid #eee;margin:20px 0px;">
				<h6 style="text-transform:uppercase;">Pengiriman Paket: </h6><br>
				<img src="img/jne.png" style="width:100px;height:70px;margin-top:-20px;">
			</div>
		</td>
	</tr>
</table>


</div>
</header>
<footer style="margin-top:200px;">
<div class="share">
	SHARE <br />
    <a href="#" target="_blank">
    <img src="img/share_fb.png" /></a>
    
    <a href="#"" target="_blank">
    <img src="img/share_twitter.png" /></a>
    
    <a href="#" target="_blank">
    <img src="img/share_pinterest.png" /></a>
</div>
<!-- <div class="copyright" style="text-align:justify;font-size:12px;">
Semua konten dari website kami (termasuk teks, grafis, logo, ikon tombol, gambar, dan software) adalah milik CLUTCH dan dilindungi oleh undang-undang hak cipta internasional. Merek dagang, logo, merek layanan, dan nama dagang dari CLUTCH dan tidak boleh digunakan tanpa izin tertulis dari kami.
<br /><br />
Copyright &copy; CLUTCH 2016. Seluruh hak cipta. Dikembangkan oleh <a href="http://www.CLUTCH.com" target="_blank">Uko Bona Ibin</a>
</div> -->
</footer>
<script type="text/javascript">
	$(document).ready(function(){
	  $('.bxslider').bxSlider({
  		auto: true
  		});
	});

	$("#harusnomor1").numeric();
	$("#harusnomor2").numeric();
	$("#no_rekening").numeric();
	$("#jumlah_bayar").numeric();
</script>
</body>
</html>