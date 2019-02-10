<!DOCTYPE html>
<html>
<head>
<title> Edit Form </title>
<link rel="stylesheet" href="style.css" media="screen" type="text/css" />

<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/jquery.validate.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$("#registrasiForm").validate({
	messages: {
		NIS: {
			required: "NIS harus diisi.",
			NIS: "Masukkan NIS yang valid."
		},
		Jenis_Kelamin: {
			required: "Pilih salah satu."
		}
	},
	errorPlacement: function(error, element){
		error.appendTo(element.parent("td"));
		}
	});
});
</script>
</head>

<body>
<center>
<div id="center" style="margin:20px auto; border:1px solid #ccc; width:500px;">
<h4> Student Registration Edit Form </h4>
<?php 
	include "koneksi.php";
	$db = mysqli_select_db($con,'alpha1');
	$nis = $_GET['NIS'];
	$query_mysql = mysqli_query($con,"SELECT * FROM data_siswa WHERE NIS='$nis'")or die(mysqli_error($con));
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	<form id="editForm" method="post" action="lib/update.php">
	<table>
	<tr>
	 <td colspan="2">
	<input name="NIS" title="NIS harus diisi." type="text" required readonly value="<?php echo $data['NIS'] ?>"/>
	 </td>
	</tr>
	<tr>
	 <td colspan="2">
	 <input name="Nama" title="Nama harus diisi." type="text" required value="<?php echo $data['Nama'] ?>"/>
	 </td>
	</tr>
	<tr>
	 <td colspan="2">
	 <input name="Kelas" title="Kelas harus diisi." type="text" required value="<?php echo $data['Kelas'] ?>"/>
	 </td>
	</tr>
	<tr>
	 <td colspan="2">
	 <textarea name="alamat" title="Alamat harus diisi." type="text" required ><?php echo $data['alamat'] ?></textarea>
	 </td>
	</tr>
	<tr>
	 <td colspan="2">
	 <input name="No_Telpon_Orang_Tua" title="No. Telepon harus diisi." type="text" placeholder="No Telepon Orang Tua" required value="<?php echo $data['No_Telpon_Orang_Tua'] ?>"/>
	 </td>
	</tr>
	<tr>
	 <td colspan="2">
	 <input name="Jenis_Kelamin" value="Laki-laki" type="radio" required <?php echo ($data['Jenis_Kelamin'] == 'Laki-laki') ? 'checked="checked"' : ''; ?> />Laki-laki
	 <input name="Jenis_Kelamin" value="Perempuan" type="radio" required <?php echo ($data['Jenis_Kelamin'] == 'Perempuan') ? 'checked="checked"' : ''; ?> />Perempuan
	 </td>
	</tr>
	 <tr>
	 <td colspan="2">
	 <input type="submit" name="edit" value="Submit Data"/>
	 <input type="reset" value="Reset"/>
	 </td>
	 </tr>
	 </table>
	 </form>
	 <?php } ?>
	 </div>
	 </center>
	 </body>
	 </html>	