<?php 
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM `invoice` where `id_invoice` ='".$_GET['inv']."'");
$row = mysqli_fetch_array($query);
?>
<div class="about">
<h2 style="margin-bottom:10px">Transaksi Selesai!</h2>
<p style="font-size:13px">
Terima kasih untuk berbelanja dengan kami!<br>
nomor pesanan Anda adalah <b><?php echo $row['id_invoice']; ?></b> <br>
Silahkan cek email Anda untuk informasi lebih lanjut tentang pesanan Anda.<br>
Harap menyimpan nomor pesanan Anda agar dapat melakukan komplain jika terjadi masalah.<br><br>

Jumlah yang harus di bayar adalah <b>Rp <?php echo number_format($row['total_tagihan'] + $_GET['bk']); ?></b><br>
Dengan rincian total harga barang : <b>Rp <?php echo number_format($row['total_tagihan']); ?></b><br>
Jumlah berat barang : <strong><?php echo $_GET['b']; ?> gram</strong> dengan ongkos kirim : <strong>Rp <?php echo $_GET['bk']; ?></strong>
Anda dapat melakukan pembayaran melalui transfer ke <br><br>
<b>BCA 123456789 (Clutch) </b><br>
<a href="http://www.klikbca.com/" target="_blank"><img src="img/bca.jpg" class="bca" width="150px""> </a><br>
<b>Mandiri 123456789 (Clutch) </b><br>
<a href="http://www.mandiri.co.id/" target="_blank"><img src="img/mandiri.png" class="bca" width="150px"> </a><br><br>

Kami akan menunggu pembayaran selama kurang lebih <b>2 hari</b>.<br>
Jika Anda tidak melakukan pembayaran di antara 2 hari, kami akan secara otomatis membatalkan pesanan Anda.<br><br>
Setelah melakukan pembayaran, silahkan beritahu kami dengan cara menekan tombol dibawah ini<br>
<button class="active" type="button" onclick="window.location.href='index.php?page=transfer&inv=<?php echo $row['id_invoice']; ?>&p=<?php echo $row['total_tagihan'] + $_GET['bk']; ?>'">Konfirmasi <i class="fa fa-arrow-circle-right"></i></button>.
<p></p>
</div>
</div>