<?php
session_start();
unset($_SESSION['cart']);
if($_SESSION['cart'] == ""){
	header("Location: index.php?page=cart");
}
?>