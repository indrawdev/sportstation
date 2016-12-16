<?php
include "../koneksi.php";

$id = $_POST['id'];
$lokasi = $_POST['lokasi'];
$tarif = $_POST['tarif'];

$sql = "
UPDATE `shipping` SET `lokasi` = '".$lokasi."', `tarif` = '".$tarif."' WHERE `id_shipping` = '".$id."'";

$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('data berhasil dirubah..');window.location.href='index.php?module=shipping';</script>";
}else{
	echo "<script>alert('data gagal dirubah..');window.location.href='index.php?module=shipping';</script>";
}
?>