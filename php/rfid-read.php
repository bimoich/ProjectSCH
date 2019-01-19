<?php 
 
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","phpmyadmin","12qwerty34");
 
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host,'alpha1');
date_default_timezone_set('UTC');
$tgl =date("j-m-Y");
$rfid = $_GET['rfid'];

$read = mysqli_query($host,"SELECT NIS FROM `Data_Siswa` WHERE rfid = '$rfid'")or die(mysqli_error($host));
$nis = mysqli_fetch_object($read);
if (mysqli_num_rows($read)>0){
		echo "tahap1";
		$res1 = mysqli_query($host,"SELECT tgl_hadir FROM `absensi` WHERE NIS = '$nis->NIS'");
		//$res2 = mysqli_query($host,"SELECT NIS FROM `absensi` WHERE NIS = '$nis->NIS'");
		$cek1 = mysqli_fetch_array($res1);
		//$cek2 = mysqli_fetch_array($res2);
		if(empty($cek1)){
			mysqli_query($host,"INSERT INTO `absensi` (NIS,tgl_hadir) values ('$nis->NIS','$tgl')");
			echo "<script type='text/javascript'>alert('Success.')</script>";
		}
			echo "<script type='text/javascript'>alert('Already input for today.')</script>";
}

else{
	echo "<script type='text/javascript'>alert('Data Unknown.')</script>";
}	

?>