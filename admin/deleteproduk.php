<?php
include "../koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM `product` WHERE `id_product` = '".$id."'";

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil dihapus..');window.location.href='index.php?module=produk';</script>";
}else{
	echo "<script>alert('data gagal dihapus..');window.location.href='index.php?module=produk';</script>";
}
?>