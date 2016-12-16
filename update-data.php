<?php

include "koneksi.php";
session_start();

$fullname = $_POST['fullname'];
$password = md5($_POST['password']);
$city = $_POST['city'];
$country = $_POST['country'];
$address = $_POST['address'];
$poscode = $_POST['poscode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
date_default_timezone_set('Asia/Jakarta');
$newdate = date('Y-m-d H:i:s'); 
$status = 'aktif';

if(!isset($password)){
$sql = "UPDATE `user` SET 
		`fullname` = '$fullname', 
		`city` = '$city', 
		`country` = '$country', 
		`address` = '$address', 
		`poscode` = '$poscode', 
		`email` = '$email', 
		`phone` = '$phone' WHERE id_user = '".$_SESSION['login_member']['id_user']."'";
}		
else{
$sql = "UPDATE `user` SET 
		`fullname` = '$fullname', 
		`password` = '$password', 
		`city` = '$city', 
		`country` = '$country', 
		`address` = '$address', 
		`poscode` = '$poscode', 
		`email` = '$email', 
		`phone` = '$phone' WHERE id_user = '".$_SESSION['login_member']['id_user']."'";
}
$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('Update data berhasil..'); window.location.href='index.php?page=akun-saya';</script>";
}else{
	echo "<script>alert('Update data gagal, silahkan coba beberapa saat lagi..'); window.location.href='index.php?page=akun-saya';</script>";
}


?>