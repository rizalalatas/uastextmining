<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include"konfigurasi.php";
mysqli_query($con, "truncate hasil");
	$q1=$_POST["q1"];
	$q2=$_POST["q2"];
if($q1 > $q2) {
	$simpan="insert into hasil(hasil)values('$q1')";
} else {
	$simpan="insert into hasil(hasil)values('$q2')";
}
	$eksekusi=mysqli_query($con, "$simpan");
	if ($eksekusi)
	{
		echo"
		<script type=\"text/javascript\">
  window.location.href = \"hasil_keseluruhan.php\"
</script>
		";
	}
	else
	{
		echo"gagal menyimpan &nbsp;<a href=steming.php>Kembali</a>";
	}
?>
</body>
</html>
