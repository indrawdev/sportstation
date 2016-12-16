<div class="login" style="margin:0 auto;">
<article id="detail">
    <h2>Riwayat Pemesanan</h2>
    <div>
    <table id="table1" class="transaksi">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Total Tagihan</th>
          <th>Status</th>
          <th>Tanggal</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          session_start();
          include "koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `invoice` where `id_user` = '".$_SESSION['login_member']['id_user']."' ORDER BY `id_invoice` DESC");
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><a href="index.php?page=detail-transaksi&d=<?php echo $data['id_header']; ?>" style="color:#2196f3"><?php echo $data['id_invoice']; ?></a></td>
          <td><?php echo $data['total_tagihan']; ?></td>
          <td><?php echo $data['status']; ?></td>
          <td><?php echo $data['date']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  </article>
</div>