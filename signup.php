<?php

include "koneksi.php";
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

$sql = "INSERT INTO `user` VALUES (NULL, '$fullname', '$password', '$city', '$country', '$address', '$poscode', '$email', '$phone', '$newdate', '$status')";
$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('Registrasi berhasil, silahkan melakukan login..'); window.location.href='index.php?page=masuk';</script>";
}else{
	echo "<script>alert('Registrasi gagal, silahkan coba beberapa saat lagi..'); window.location.href='index.php?page=daftar';</script>";
}


?>