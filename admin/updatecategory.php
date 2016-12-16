<?php
include "../koneksi.php";
// Turn off all error reporting
error_reporting(0);
$id = $_POST['id'];

if($_POST['tipe']=='sub'){
	$name_sub = $_POST['name_sub'];
	$id_category = $_POST['id_category'];
	$status= $_POST['status'];

	$sql = "UPDATE `sub-category` SET `name_sub` = '".$name_sub."', `id_category` = '".$id_category."', `status` = '".$status."' WHERE `id_sub` = '".$id."'";
	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil dirubah..');window.location.href='index.php?module=kategori';</script>";
	}else{
		echo "<script>alert('data gagal dirubah..');window.location.href='index.php?module=kategori';</script>";
	}

} else {

	$name_category = $_POST['name_category'];
	$status_category = $_POST['status_category'];

	$sql = "UPDATE `category` SET `name_category` = '".$name_category."', `status_category` = '".$status_category."' WHERE `id_category` = '".$id."'";
	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil dirubah..');window.location.href='index.php?module=kategori';</script>";
	}else{
		echo "<script>alert('data gagal dirubah..');window.location.href='index.php?module=kategori';</script>";
	}

}
?>