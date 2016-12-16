<?php
include "koneksi.php";
session_start();

if(isset($_FILES['bukti'])){
	$file_name = $_FILES['bukti']['name'];
	$file_tmp =$_FILES['bukti']['tmp_name'];
	move_uploaded_file($file_tmp,"buktibayar/".$file_name);
}

$query = mysqli_query($koneksi, "INSERT INTO `konfirmasi` VALUES (
	NULL, 
	'".$_POST['invoice']."', 
	'".$_POST['total_tagihan']."', 
	'".$_POST['nama_bank']."', 
	'".$_POST['no_rekening']."', 
	'".$_POST['atas_nama']."', 
	'".$_POST['rekening_tujuan']."', 
	'".$_POST['jumlah_bayar']."', 
	'".$file_name."', 
	'".$_POST['keterangan']."', 
	'".$_SESSION['login_member']['id_user']."', 
	'".date('Y-m-d H:i:s')."')");

if($query){
	echo "<script>alert('Konfirmasi berhasil..'); window.location.href='index.php';</script>";
}else{
	echo "<script>alert('Konfirmasi gagal, silahkan coba beberapa saat lagi..'); window.location.href='index.php';</script>";
}
?>