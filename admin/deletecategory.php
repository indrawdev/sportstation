<?php
include "../koneksi.php";

$id = $_GET['id'];

if($_GET['type']=='sub'){
	$sql = "DELETE FROM `sub-category` WHERE `id_sub` = '".$id."'";

	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil dihapus..');window.location.href='index.php?module=kategori';</script>";
	}else{
		echo "<script>alert('data gagal dihapus..');window.location.href='index.php?module=kategori';</script>";
	}
}else {
	$sql = "DELETE FROM `category` WHERE `id_category` = '".$id."'";

	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil dihapus..');window.location.href='index.php?module=kategori';</script>";
	}else{
		echo "<script>alert('data gagal dihapus..');window.location.href='index.php?module=kategori';</script>";
	}
}
?>