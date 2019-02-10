<?php
require_once "koneksi.php";
$db = mysqli_select_db($con,'alpha1');
$nis=$_REQUEST['NIS'];
$nama=$_REQUEST['Nama'];
$kelas=$_REQUEST['Kelas'];
$alamat=$_REQUEST['alamat'];
$telepon=$_REQUEST['No_Telpon_Orang_Tua'];
$gender=$_REQUEST['Jenis_Kelamin'];

	//script validasi data
    $cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM data_siswa WHERE NIS='$nis' or Nama='$nama'"));
    if ($cek > 0){
    echo "<script>window.alert('NIS atau Nama yang anda masukan sudah ada!')
    window.location='edit.php'+'?NIS=$nis'</script>";
    }else {
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
	}
?>