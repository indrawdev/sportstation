

<?php
include "../koneksi.php";
// Turn off all error reporting
error_reporting(0);
if($_GET['type'] == 'sub'){
	$id_category = $_POST['id_category'];
	$name_sub = $_POST['name_sub'];
	$status = $_POST['status'];

	$sql = "INSERT INTO `sub-category` VALUES (NULL, '".$id_category."', '".$name_sub."', '".$status."')";
	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil ditambah..');window.location.href='index.php?module=subkategori';</script>";
	}else{
		echo "<script>alert('data gagal ditambah..');window.location.href='index.php?module=subkategori';</script>";
	}
}else {
	$name_category = $_POST['name_category'];
	$status_category = $_POST['status_category'];

	$sql = "INSERT INTO `category` VALUES (NULL, '".$name_category."', '".$status_category."')";
	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>alert('data berhasil ditambah..');window.location.href='index.php?module=kategori';</script>";
	}else{
		echo "<script>alert('data gagal ditambah..');window.location.href='index.php?module=kategori';</script>";
	}
}

?>