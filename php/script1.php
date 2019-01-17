<?php 
 
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","phpmyadmin","12qwerty34");
 
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host,'alpha1');
date_default_timezone_set('UTC');
$hari =date("l");

$nis = $_GET['nis'];

$query_mysql = mysqli_query($host,"SELECT * FROM `Data_Siswa` WHERE NIS = '$nis'")or die(mysqli_error($host));
if (mysqli_num_rows($query_mysql)>0){
		echo "tahap1";
		$cek = mysqli_fetch_array($host,"SELECT NIS FROM `Kehadiran` WHERE NIS = '$nis'");
		if(empty($cek)){
				mysqli_query($host,"INSERT INTO `Kehadiran` (NIS) values ('$nis')");
				echo "Success";
		}
	
}

else{
	echo "<script type='text/javascript'>alert('Data Unknown.')</script>";
}	

?>