<?php
session_start();
include "lib/koneksi.php";
error_reporting(0);

if (empty($_SESSION['uname']) AND empty($_SESSION['passwd'])){
	include "index.php";
}
else{
	?>
	<!DOCTYPE>
	<html>
	<head>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen">
	<title> Multi-user Login </title>
	</head>
	<body>
	<div id="content">
	<h2> Selamat Datang <?=$_SESSION[uname]?>.</h2>
	<?php
	if ($_SESSION[akses] == "guest") {
		echo "<p> Anda masuk sebagai guest. <a href='logout.php' title='Logout'> Logout </a></p>";
	}
	if ($_SESSION[akses] == "staff") {
		echo "<p> Anda masuk sebagai staff. <a href='logout.php' title='Logout'> Logout </a></p>";
	}
	if ($_SESSION[akses] == "admin") {
		echo "<p> Anda masuk sebagai Admin. <a href='logout.php' title='Logout'> Logout </a></p>";
	}
	if ($_SESSION[akses] == "") {
		echo "<p> Anda tidak memiliki akses.</p>";
	}
	?>
	</div>
	</body>
	</html>
<?php } ?>