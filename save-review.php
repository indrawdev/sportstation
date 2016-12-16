<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include "koneksi.php";
$id_product = $_POST['id_product'];
$komentar = $_POST['komentar'];

$sql = "INSERT INTO `review` VALUES (null, '$komentar', '".date('Y-m-d H:i:s')."', '".$id_product."', '".$_SESSION['login_member']['id_user']."', 'aktif')";
$save = mysqli_query($koneksi, $sql);
if($save){
	echo "<script>alert('Review produk berhasil dikirim..!!');window.location.href='index.php';</script>";
}else {
	echo "<script>alert('Review produk gagal dikirim..!!');window.location.href='index.php';</script>";
}

?>