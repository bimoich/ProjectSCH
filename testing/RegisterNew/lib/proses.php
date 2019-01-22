<?php
require_once "koneksi.php";
$db = mysqli_select_db($con,'alpha1');
$nis=$_REQUEST['NIS'];
$nama=$_REQUEST['Nama'];
$kelas=$_REQUEST['Kelas'];
$alamat=$_REQUEST['alamat'];
$telepon=$_REQUEST['No_Telpon_Orang_Tua'];
$gender=$_REQUEST['Jenis_Kelamin'];

$query=mysqli_query($con,"INSERT INTO `Data_Siswa` (`NIS`,`Nama`,
`Kelas`,`alamat`,`tlp_ortu`,`jenis_kelamin`) VALUES 
('$nis','$nama','$kelas','$alamat','$telepon','$gender')") 
or die ("Connection error: " . mysqli_connect_error());

	if($query){
		header("location:/testing/RegisterNew/home.html");
	}
	else{
		header("location:/testing/RegisterNew/index.html");
	}
?>