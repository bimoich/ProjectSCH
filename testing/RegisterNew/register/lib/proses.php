<?php
require_once "koneksi.php";
$db = mysqli_select_db($con,'alpha1');
$nis=$_REQUEST['NIS'];
$nama=$_REQUEST['Nama'];
$kelas=$_REQUEST['Kelas'];
$alamat=$_REQUEST['alamat'];
$telepon=$_REQUEST['No_Telpon_Orang_Tua'];
$gender=$_REQUEST['Jenis_Kelamin'];

$query=mysqli_query($con,"INSERT INTO `data_siswa` (`NIS`,`Nama`,
`Kelas`,`alamat`,`No_Telpon_Orang_Tua`,`Jenis_Kelamin`) VALUES 
('$nis','$nama','$kelas','$alamat','$telepon','$gender',)") 
or die ("Connection error: " . mysqli_connect_error());

	if($query){
		header("location:home.html");
	}
	else{
		header("location:index.html");
	}
?>