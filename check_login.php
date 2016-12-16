<?php
include "koneksi.php";

session_start();
if (isset($_POST['buttonlogin'])) {
	if (empty($_POST['email']) || empty($_POST['password'])) {
		echo "<script>alert('Email dan password wajib di isi..!!');window.location.href='index.php?page=masuk';</script>";
	} else {
		$email=$_POST['email'];
		$password=md5($_POST['password']);

		$query = mysqli_query($koneksi, "select * from user where password='$password' AND email='$email'");
		$rows = mysqli_num_rows($query);
		$datas = mysqli_fetch_array($query);

		if ($rows > 0) {
			$_SESSION['login_member']=$datas;
			header("location: index.php"); 
		} else {
			echo "<script>alert('Email atau password Anda salah..!!');window.location.href='index.php?page=masuk';</script>";
		}

		mysqli_close($connection);
	}
}
?>