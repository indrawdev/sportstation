<section id="main" class="grid_9 push_3">
<article id="dashboard">
	<p>
		Hai <b><?php echo $_SESSION['login_admin']['name_admin']; ?></b>, Selamat datang di halaman Administrator.<br>
    Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website.
	</p>
<section class="icons">
	<ul>
		<li>
			<a href="?module=home">
				<img src="images/eleganticons/Home.png">
				<span>Home</span>
			</a>
		</li>
		<li>
			<a href="?module=gantipassword">
				<img src="images/eleganticons/Person-group.png">
				<span>Administrator</span>
			</a>
		</li>
		<li>
			<a href="?module=member">
				<img src="images/eleganticons/Person-group.png">
				<span>Member</span>
			</a>
		</li>
		<li>
			<a href="?module=pemesanan">
				<img src="images/eleganticons/Info.png">
				<span>Pemesanan</span>
			</a>
		</li>
		<li>
			<a href="logout.php">
				<img src="images/eleganticons/X.png">
				<span>Logout</span>
			</a>
		</li>
	</ul>
</section>
</article>
</section>
