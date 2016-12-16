<section id="main" class="grid_9 push_3">
  <article id="dashboard">
    <h2>Laporan Invoice</h2>
    <form action="index.php?module=laporan" method="post">
      <label>Dari Tanggal</label>
      <input type="text" name="from" id="from">
      <label>Sampai Tanggal</label>
      <input type="text" name="to" id="to">
      <button type="submit"><i class="fa fa-search"></i> Cari</button>
      <button type="button" onclick="cetak()"><i class="fa fa-print"></i> Cetak</button>
    </form>
    <hr>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Total Tagihan</th>
          <th>Status Transaksi</th>
          <th>Nama Pembeli</th>
          <th>Tanggal</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $sql = "
          SELECT
            user.fullname,
            invoice.id_invoice,
            invoice.total_tagihan,
            invoice.status,
            invoice.date
          FROM `invoice`
          LEFT JOIN user 
            ON invoice.id_user = user.id_user
          WHERE 
          invoice.date BETWEEN '".$_POST['from']." 00:00:00' AND '".$_POST['to']." 23:59:00' AND
          invoice.status = 'selesai'
          ORDER BY invoice.id_invoice ASC
          ";
          $query = mysqli_query($koneksi, $sql);
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['id_invoice']; ?></td>
          <td><?php echo $data['total_tagihan']; ?></td>
          <td><?php echo $data['status']; ?></td>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['date']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </article>
</section>
<script type="text/javascript">
  function cetak(){
    var from = $('#from').val();
    var to = $('#to').val();
    window.open('cetak.php?from='+from+'&to='+to);
  }
  $( "input[type=text]").datepicker({dateFormat: 'yy-mm-dd'});
</script>
