<?php
session_start();
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); 

if(isset($_SESSION['login_member'])){
	$koneksi->query("INSERT INTO `header_transaksi` VALUES (NULL, 
							'checkout', 
							'".$_SESSION['login_member']['id_user']."', 
							'".$date."')");
	$idheader = null;
	$idheader = $koneksi->insert_id;
	$berat = 0;

	for($x=0; $x < count($_SESSION['cart']); $x++) {
		mysqli_query($koneksi, "INSERT INTO `cart` VALUES (NULL, 
		'".$_SESSION['login_member']['id_user']."', 
		'".$_SESSION['cart'][$x]['id_produk']."', 
		'".$idheader."', 
		'".$_SESSION['cart'][$x]['initial_name']."', 
		'".$_SESSION['cart'][$x]['qty']."', 
		'".$date."', 
		'checkout'
	  	)");

		$berat += ($_SESSION['cart'][$x]['berat'] * $_SESSION['cart'][$x]['qty']);

	  	mysqli_query($koneksi, "UPDATE `product` SET `stock_product` = `stock_product` - ".$_SESSION['cart'][$x]['qty']." WHERE `id_product` = '".$_SESSION['cart'][$x]['id_produk']."'");
	}
	$query = mysqli_query($koneksi, "SELECT max(id_invoice) from invoice");
	$data = mysqli_fetch_array($query);

	if ($data){ 
	   $nilaikode = substr($data[0], 11);
	   $kode = (int) $nilaikode;
	   $kode = $kode + 1;
	   $hasilkode = "INV".date('Y').date('m').date('d').str_pad($kode, 2, "0", STR_PAD_LEFT);
	}else{
	   $hasilkode = "INV".date('Y').date('m').date('d')."01";
	}

	$biaya_kirim = 0;
	if($berat <= 1000){
		$biaya_kirim = $_POST['ongkir'];
	}elseif($berat <= 2000 and $berat > 1000){
		$biaya_kirim = ($_POST['ongkir'] * 2);
	}elseif($berat <= 3000 and $berat > 2000){
		$biaya_kirim = ($_POST['ongkir'] * 3);
	}elseif($berat <= 4000 and $berat > 3000){
		$biaya_kirim = ($_POST['ongkir'] * 4);
	}elseif($berat <= 5000 and $berat > 4000){
		$biaya_kirim = ($_POST['ongkir'] * 5);
	}

	mysqli_query($koneksi, "INSERT INTO `invoice` VALUES (
	'".$hasilkode."', 
	'checkout', 
	'".$_SESSION['total_tagihan']."', 
	'".$idheader."', 
	'".$biaya_kirim."', 
	'".$_SESSION['login_member']['id_user']."', 
	'".$date."')
	");
	unset($_SESSION['cart']);
	header('location:index.php?page=konfirmasi&inv='.$hasilkode.'&b='.$berat.'&bk='.$biaya_kirim);
}else{
	header('location:index.php?page=masuk');
}

?>