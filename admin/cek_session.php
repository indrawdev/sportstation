<?php
include "../koneksi.php";
session_start();

if(!isset($_SESSION['login_admin'])){
  mysqli_close($koneksi);
	echo "<script>alert('Silahkan login terlebih dulu..!!');window.location.href='login.php';</script>";
}

?>
