<?php
include "../koneksi.php";

$id = $_POST['id'];
$code_product = $_POST['code_product'];
$name_product = $_POST['name_product'];
$id_category = $_POST['id_category'];
$description_product = $_POST['description_product'];
$price_product = $_POST['price_product'];
$size_product = $_POST['size_product'];
$berat = $_POST['berat'];
$status_product = $_POST['status_product'];
$stock_product = $_POST['stock_product'];

if(isset($_FILES['picture_product'])){
	$file_name = $_FILES['picture_product']['name'];
	$file_tmp =$_FILES['picture_product']['tmp_name'];
	move_uploaded_file($file_tmp,"../img/".$file_name);
}
if(!empty($file_name)){
	$sql = "
	UPDATE `product` SET 
	`code_product` = '".$code_product."', `name_product` = '".$name_product."', `id_category` = '".$id_category."', 
	`description_product` = '".$description_product."', `price_product` = '".$price_product."', `size_product` = '".$size_product."', `berat` = '".$berat."', `status_product` = '".$status_product."', `stock_product` = '".$stock_product."', 
 	`picture_product` = '".$file_name."' WHERE `id_product` = '".$id."'";
 }else{
 	$sql = "
	UPDATE `product` SET 
	`code_product` = '".$code_product."', `name_product` = '".$name_product."', `id_category` = '".$id_category."', 
	`description_product` = '".$description_product."', `price_product` = '".$price_product."', `size_product` = '".$size_product."', `berat` = '".$berat."', `status_product` = '".$status_product."', `stock_product` = '".$stock_product."'
 	WHERE `id_product` = '".$id."'";
 }

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil dirubah..');window.location.href='index.php?module=produk';</script>";
}else{
	echo "<script>alert('data gagal dirubah..');window.location.href='index.php?module=produk';</script>";
}
?>