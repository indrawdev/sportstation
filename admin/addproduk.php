<?php
include "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
// Turn off all error reporting
error_reporting(0);
$code_product = $_POST['code_product'];
$name_product = $_POST['name_product'];
$id_category = $_POST['id_category'];
$description_product = $_POST['description_product'];
$price_product = $_POST['price_product'];
$size_product = $_POST['size_product'];
$berat = $_POST['berat'];
$status_product = $_POST['status_product'];
$date = date("Y-m-d H:i:s");
$stock_product = $_POST['stock_product'];

if(isset($_FILES['picture_product'])){
	$file_name = $_FILES['picture_product']['name'];
	$file_tmp =$_FILES['picture_product']['tmp_name'];
	move_uploaded_file($file_tmp,"../img/".$file_name);
}

$sql = "
INSERT INTO `product` VALUES (NULL, '$code_product', '$name_product', '$id_category', '$description_product', '$price_product', '$size_product', '$berat', 'public', '$date ', '$stock_product', '$file_name')
";

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil disimpan..');window.location.href='index.php?module=produk';</script>";
}else{
	echo "<script>alert('data gagal disimpan..');window.location.href='index.php?module=produk';</script>";
}

?>