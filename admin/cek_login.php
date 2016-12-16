<?php
include "../koneksi.php";

$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login=mysqli_query($koneksi, "SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$pass'");
$ketemu= mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['login_admin'] = $r;
  header('location:index.php');
}else{
    echo "<link href=css/style.css rel=stylesheet type=text/css>";
    echo "<div class='error msg'>Login Gagal, Username atau Password salah, silahkan coba lagi. ";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center></div>";
}
?>
