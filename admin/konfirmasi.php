<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<section id="main" class="grid_9 push_3">
  <article id="detail">
    <h2>Konfirmasi Pesanan</h2><hr>
    <div style="overflow-x:scroll">
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Invoice</th>
          <th>Total Tagihan</th>
          <th>Bank</th>
          <th>No Rekening</th>
          <th>Atas Nama</th>
          <th>Ke Rekening</th>
          <th>Jumlah Bayar</th>
          <th>Bukti</th>
          <th>Keterangan</th>
          <th>Tanggal</th>
          </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `konfirmasi` ORDER BY `id_konfirmasi` DESC");
          foreach($query as $data){
          $total += ($data['qty'] * $data['price_product']);
        ?>
        <tr>
          <td><?php echo $data['id_invoice']; ?></td>
          <td><?php echo $data['total_tagihan']; ?></td>
          <td><?php echo $data['nama_bank']; ?></td>
          <td><?php echo $data['no_rekening']; ?></td>
          <td><?php echo $data['atas_nama']; ?></td>
          <td><?php echo $data['rekening_tujuan']; ?></td>
          <td><?php echo $data['jumlah_bayar']; ?></td>
          <td>
          <?php if($data['bukti'] != ""){ ?>
            <img src="../buktibayar/<?php echo $data['bukti']; ?>" id="myImg<?php echo $data['id_invoice']; ?>" width="70" height="70">
          <?php }else{ ?>
            <img src="../buktibayar/kosong.png" id="myImg<?php echo $data['id_invoice']; ?>" width="70" height="70">
          <?php } ?>
          </td>
          <td><?php echo $data['keterangan']; ?></td>
          <td><?php echo $data['date']; ?></td>
        </tr>
        <?php 
        echo "
        <style>
        .close".$data['id_invoice']." {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close".$data['id_invoice'].":hover,
        .close".$data['id_invoice'].":focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        </style>
        ";
        echo "
        <div id='myModal".$data['id_invoice']."' class='modal'>
          <span class='close".$data['id_invoice']."' id='exit".$data['id_invoice']."'>×</span>
          <img class='modal-content' id='img".$data['id_invoice']."'>
          <div id='caption'></div>
        </div>
        ";
        echo "
        <script>
          var modal".$data['id_invoice']." = document.getElementById('myModal".$data['id_invoice']."');
          var img".$data['id_invoice']." = document.getElementById('myImg".$data['id_invoice']."');
          var modalImg".$data['id_invoice']." = document.getElementById('img".$data['id_invoice']."');
          var captionText".$data['id_invoice']." = document.getElementById('caption');
          img".$data['id_invoice'].".onclick = function(){
              modal".$data['id_invoice'].".style.display = 'block';
              modalImg".$data['id_invoice'].".src = this.src;
              modalImg".$data['id_invoice'].".alt = this.alt;
              captionText".$data['id_invoice'].".innerHTML = this.alt;
          }
          var spanx".$data['id_invoice']." = document.getElementById('exit".$data['id_invoice']."');

          spanx".$data['id_invoice'].".onclick = function() {
              modal".$data['id_invoice'].".style.display = 'none';
              console.log('halo');
          }
        </script>
        ";
        } ?>
      </tbody>
    </table>
    </div>
  </article>
</section>
