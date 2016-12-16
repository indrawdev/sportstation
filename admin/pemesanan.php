<section id="main" class="grid_9 push_3">
  <article id="dashboard">
    <h2>Daftar Pemesanan</h2><hr>
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Total Tagihan</th>
          <th>ID Transaksi</th>
          <th>Status Transaksi</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `invoice` ORDER BY `id_invoice` DESC");
          foreach($query as $data){
        ?>
        <tr>
          <td><?php echo $data['id_invoice']; ?></td>
          <td><?php echo $data['total_tagihan']; ?></td>
          <td>
            <button onclick="window.location.href='index.php?module=detailtransaksi&id=<?php echo $data['id_header']; ?>'">
            Lihat Detail</button>
            
          </td>
          <td>
          <form action="updatepemesanan.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $data['id_invoice']; ?>">
          <input type="hidden" name="id_header" value="<?php echo $data['id_header']; ?>">
          <select name="status" id="status" onchange="this.form.submit()"">
            <?php 
              $array = array('checkout','konfirmasi','diterima','ditolak','proses','komplain','retur','kembalikan_dana','selesai');
              for($i = 0; $i < count($array); $i++){
                $op =  "<option value='".$array[$i]."'";
                if($data['status'] == $array[$i]){ $op .=" selected"; }
                $op .= ">".$array[$i]."</option>"; 
                echo $op;
              }
            ?>
          </select>
          </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </article>
</section>
