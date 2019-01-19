<?php
require_once "koneksi.php";
$db = mysqli_select_db($con,'Form');
$email=$_REQUEST['email'];
$nama=$_REQUEST['nama'];
$nis=$_REQUEST['NIS'];
$alamat=$_REQUEST['alamat'];
$telepon=$_REQUEST['no_telp'];
$gender=$_REQUEST['jk'];
$tgl_lahir=$_REQUEST['tgl_lahir'];
$fakultas=$_REQUEST['fakultas'];
$jurusan=$_REQUEST['jurusan'];

$query=mysqli_query($con,"INSERT INTO `mahasiswa` (`email`,`nama`,`nis`,
`alamat`,`tgl_lahir`,`telepon`,`gender`,`fakultas`,`jurusan`) VALUES 
('$email','$nama','$nis','$alamat','$tgl_lahir','$telepon','$gender',
'$fakultas','$jurusan')") or die ("Connection error: " . mysqli_connect_error());

	if($query){
		header("location:home.html");
	}
	else{
		header("location:index.html");
	}
?>