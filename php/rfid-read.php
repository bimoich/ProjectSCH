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
		$res1 = mysqli_query($host,"SELECT tgl_hadir FROM `absensi` WHERE tgl_hadir = '$tgl'");
		$cek1 = mysqli_fetch_array($res1);
		if(empty($cek1)){
			mysqli_query($host,"INSERT INTO `absensi` (NIS,tgl_hadir) values ('$nis->NIS','$tgl')");
			$json= array(
		    'sts' => 'success');
		}
			$json= array(
		    'sts' => 'double');
}

else{
	$json= array(
		    'sts' => 'unknown');
	
}	
echo json_encode($json);
?>