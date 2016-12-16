<?php
include "../koneksi.php";
session_start();
$oldpass = md5($_POST['oldpassword']);
$newpass = md5($_POST['newpassword']);
$confirm = md5($_POST['konfirmasi']);


if($newpass == $confirm){
	if($oldpass == $_SESSION['login_admin']['password_admin']){
		$sql = "UPDATE `admin` SET `password_admin` = '".$newpass."' WHERE `id_admin` = '".$_SESSION['login_admin']['id_admin']."'";
		$query = mysqli_query($koneksi, $sql);
		if($query){
			echo "<script>alert('Password berhasil dirubah..');window.location.href='logout.php';</script>";
		}else{
			echo "<script>alert('Password gagal dirubah..');window.location.href='index.php?module=gantipassword';</script>";
		}
	}else{
		echo "<script>alert('Password Anda salah, silahkan coba lagi..!!');window.location.href='index.php?module=gantipassword';</script>";
	}
}
else{
	echo "<script>alert('Konfirmasi Password tidak sama..!!');window.location.href='index.php?module=gantipassword';</script>";
}

?>