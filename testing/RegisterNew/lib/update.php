<?php 
 
include "koneksi.php";
$db = mysqli_select_db($con,'alpha1');
$nis=$_POST['NIS'];
$nama=$_POST['Nama'];
$kelas=$_POST['Kelas'];
$alamat=$_POST['alamat'];
$telepon=$_POST['No_Telpon_Orang_Tua'];
$gender=$_POST['Jenis_Kelamin'];
 
mysqli_query($con,"UPDATE data_siswa SET Nama='$nama', Kelas='$kelas', alamat='$alamat', No_Telpon_Orang_Tua='$telepon', Jenis_Kelamin='$gender' WHERE NIS='$nis'");
 
header("Location: index.php?Message=Data Updated" . urlencode($Message));
 
?>