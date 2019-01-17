<?php 
 
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","phpmyadmin","12qwerty34");
 
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host,'alpha1');
date_default_timezone_set('UTC');
$hari =date("l");

$nomer_id = $_GET['nomer_id'];

$query_mysql = mysqli_query($host,"SELECT * FROM `Data_Siswa` WHERE nomer_id = '$nomer_id'")or die(mysqli_error($host));
if (mysqli_num_rows($query_mysql)>0){
		echo "tahap1";
		$cek = mysqli_fetch_array($host,"SELECT NIS FROM `Kehadiran` WHERE NIS = '$nomer_id'");
		if(empty($cek)){
				mysqli_query($host,"INSERT INTO `Kehadiran` (NIS) values ('$nomer_id')");
				echo "Success";
	}
}	

?>