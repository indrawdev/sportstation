<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$biaya = $_POST['biaya'];
$kota = $_POST['kota'];

$sql = "
INSERT INTO `shipping` VALUES (NULL, '$kota', '$biaya')";

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil disimpan..');window.location.href='index.php?module=shipping';</script>";
}else{
	echo "<script>alert('data gagal disimpan..');window.location.href='index.php?module=shipping';</script>";
}

?>