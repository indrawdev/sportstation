<section id="main" class="grid_9 push_3">
<article id="dashboard" style="padding:5px;">
<form method="POST" action="updatepassword.php" enctype="multipart/form-data">
          <fieldset>
          <legend>Ganti Password</legend>
          <dl class="inline">
          <dt><label>Password Lama</label></dt>
          <dd> : <input type="password" name="oldpassword" value="" required size="30"></dd>
          <dt><label>Password Baru</label></dt>
          <dd> : <input type="password" name="newpassword" value="" required size="30"></dd>
          <dt><label>Konfirmasi Password</label></dt>
          <dd> : <input type="password" name="konfirmasi" value="" required size="30"></dd>
          <div class="buttons">
            <input class="button blue" type="submit" value="Ganti">
            <input class="button blue" type="button" value="Batal" onclick="self.history.back()">
          </div>
          </fieldset>
</form>
</article>
</section>