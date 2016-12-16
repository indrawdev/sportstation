<section id="main" class="grid_9 push_3">
  <article id="dashboard">
    <h2>Daftar Member</h2><hr>
    <div style="overflow-y:hidden;">
    <table id="table1" class="gtable sortable">
      <thead>
        <tr>
          <th>Fullname</th>
          <th>City</th>
          <th>Country</th>
          <th>Address</th>
          <th>Pos Code</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Status</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody class="ui-sortable">
        <?php
          include "../koneksi.php";
          $query = mysqli_query($koneksi, "SELECT * FROM `user` ORDER BY `fullname` ASC");
          while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
          <td><?php echo $data['fullname']; ?></td>
          <td><?php echo $data['city']; ?></td>
          <td><?php echo $data['country']; ?></td>
          <td>
            <?php
              if (strlen($data['address']) > 50)
              echo substr($data['address'], 0, 50) . '...';
            ?>
          </td>
          <td><?php echo $data['poscode']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><?php echo $data['phone']; ?></td>
          <td><?php echo $data['status']; ?></td>
          <td>
             <a href="?module=editmember&id=<?php echo $data['id_user']; ?>" title="Edit">
                <img src="images/icons/edit.png" alt="Edit"></a>
             <a href="deletemember.php?id=<?php echo $data['id_user']; ?>" title="Hapus">
                <img src="images/icons/cross.png" alt="Delete">
             </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  </article>
</section>
