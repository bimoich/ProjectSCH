<?php 
 
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","phpmyadmin","12qwerty34");
 
// isikan dengan nama database yang akan di hubungkan
$db = mysqli_select_db($host,'alpha1');
date_default_timezone_set('UTC');
$hari =date("l");
 
$nomer_id = $_GET['nomer_id'];

$query_mysql = mysqli_query($host,"SELECT * FROM Data_Siswa WHERE nomer_id = '$nomer_id'")or die(mysqli_error($host));
if (mysqli_num_rows($query_mysql)>0){
	
		if(mysqli_fetch_array($host,"SELECT NIS FROM kehadiran WHERE NIS = '$nomer_id'")==null){
		mysqli_query($host,"INSERT INTO kehadiran (NIS) values ('$nomer_id')");
	}
	
    while($data = mysqli_fetch_array($query_mysql)){
    $nama = $data['Nama'];
        if($hari == "Monday" ){
            $query_mysql = mysqli_query($host,"SELECT * FROM Kehadiran WHERE nama = '$nama'")or die(mysqli_error($host));
            while($data = mysqli_fetch_array($query_mysql)){
            $hadir = $data['hadir'];
            mysqli_query($host,"UPDATE `Kehadiran` SET Senin ='1' WHERE nama = '$nama'");
            $json= array(
		    'sts' => 'berhasil');
        }
		}
		elseif($hari == "Tuersday" )
		{
            mysqli_query($host,"UPDATE `Kehadiran` SET Selasa ='1' WHERE nama = '$nama'");
            $json= array(
		    'sts' => 'berhasil');
        }
		elseif($hari == "Wednesday" )
		{
            mysqli_query($host,"UPDATE `Kehadiran` SET Rabu ='1' WHERE nama = '$nama'");
            $json= array(
		    'sts' => 'berhasil');
        }
		elseif($hari == "Thursday" )
		{
            mysqli_query($host,"UPDATE `Kehadiran` SET Kamis ='1' WHERE nama = '$nama'");
            $json= array(
		    'sts' => 'berhasil');
        }
		elseif($hari == "Friday" )
		{
            mysqli_query($host,"UPDATE `Kehadiran` SET Jumat ='1' WHERE nama = '$nama'");
            $json= array(
		    'sts' => 'berhasil');
        }
    }
}
	else{
	$json=array(
		'sts' => 'UNKNOWN');
		echo json_encode($json);
}
?>