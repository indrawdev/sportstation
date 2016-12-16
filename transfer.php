<div class="login" style="margin:0 auto;">
<form action="bayar.php" method="post" class="validate-form" id="transfer" name="transfer" enctype="multipart/form-data"> 
	<table id="payment" style="text-align: left;padding:20px;width:330px;margin-top:-8px;margin: 0 auto;"> 
	<tr>
		<td colspan="2" style="text-align:center">
			<h3 style="font-size:16px;margin-top:0px">Konfirmasi Pembayaran</h3>
		</td>
	</tr>
	<tr>
		<td colspan="2">Invoice <br />
	    <input type="text" name="invoice" value="<?php echo $_GET['inv']; ?>" readonly/></td>
	</tr>
	<tr>
		<td colspan="2">Total Tagihan <br />
	    <input type="text" name="total_tagihan" value="<?php echo $_GET['p']; ?>" readonly/></td>
	</tr>
	<tr>
		<td colspan="2">Nama Bank <br />
	    <input type="text" name="nama_bank" id="nama_bank" value=""/></td>
	</tr>
	<tr>
		<td colspan="2">No Rekening <br />
	    <input type="text" name="no_rekening" id="no_rekening" value=""/></td>
	</tr>
	<tr>
		<td colspan="2">Atas Nama <br />
	    <input type="text" name="atas_nama" id="atas_nama" value=""/></td>
	</tr>
	<tr>
		<td colspan="2">Rekening Tujuan <br />
	    <select name="rekening_tujuan" 
	    style="
	    border: 2px solid #EAEAEA;
	    padding: 3px;
	    background-color:white;
	    font-size: 11px;" id="rekening_tujuan">
	    	<option value=""> ** Pilihan</option>
	    	<option value="mandiri">Mandiri</option>
	    	<option value="bca">BCA</option>
	    </select>
	    </td>
	</tr>
	<tr>
		<td colspan="2">Jumlah Bayar <br />
	    <input type="text" name="jumlah_bayar" id="jumlah_bayar" value=""/></td>
	</tr>
	<tr>
		<td colspan="2">Bukti <br />
	    <input type="file" name="bukti"/></td>
	</tr>
	<tr>
		<td colspan="2">Keterangan <br />
	    <textarea name="keterangan" id="keterangan" style="
	    border: 2px solid #EAEAEA;
	    padding: 3px;
	    background-color:white;
	    font-size: 11px;"></textarea></td>
	</tr>
	<tr>
		<td colspan="2" style="text-align:left">
			<strong><button type="button" class="active" style="width: 262px;border-radius:3px;font-weight:600;" onclick="cekdata()"><i class="fa fa-send"></i> KIRIM</button></strong>
		</td>
	</tr>
	</table>
</form>
</div>
<script type="text/javascript">
	function cekdata(){
		var nama_bank = $('#nama_bank').val();
		var no_rekening = $('#no_rekening').val();
		var atas_nama = $('#atas_nama').val();
		var rekening_tujuan = $('#rekening_tujuan').val();
		var jumlah_bayar = $('#jumlah_bayar').val();
		var keterangan = $('#keterangan').val();
		if (nama_bank === '' || no_rekening === '' || atas_nama === '' || rekening_tujuan === '' || jumlah_bayar === '' || keterangan === '') {
            alert("Data anda belum lengkap..!!");
        } else {
            $('#transfer').submit();
        }
	}

</script>