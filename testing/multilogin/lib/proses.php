<?php
require_once "koneksi.php";
$db = mysqli_select_db($con,'Form');
$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($con,"SELECT * FROM `user` WHERE email = '$email' AND passwd = '$password'") or die ("Connection error: " . mysqli_connect_error());
$hasil = mysqli_num_rows($login);
$r = mysqli_fetch_object($login);
	
	if ($hasil > 0){
		session_start();
		$_SESSION['userid']	= $r->userid;
		$_SESSION['uname']	= $r->uname;
		$_SESSION['passwd']	= $r->passwd;
		$_SESSION['akses']	= $r->akses;
		header('location:/testing/multilogin/home.php');
	}
echo "<script type='text/javascript'>alert('Data Unknown.')</script>";
	
?>