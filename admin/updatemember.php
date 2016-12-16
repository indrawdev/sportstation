<?php
include "../koneksi.php";

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$password = md5($_POST['password']);
$city = $_POST['city'];
$country = $_POST['country'];
$address = $_POST['address'];
$poscode = $_POST['poscode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$status = $_POST['status'];

$sql = "UPDATE `user` SET `fullname` = '".$fullname."',";

if($_POST['password'] != ""){
	$sql .= "`password` = '".$password."',";
}

$sql .= "
`city` = '".$city."', 
`country` = '".$country."', 
`address` = '".$address."', 
`poscode` = '".$poscode."', 
`email` = '".$email."', 
`phone` = '".$phone."', 
`status` = '".$status."' WHERE `id_user` = '".$id."'";

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil dirubah..');window.location.href='index.php?module=member';</script>";
}else{
	echo "<script>alert('data gagal dirubah..');window.location.href='index.php?module=member';</script>";
}
?>