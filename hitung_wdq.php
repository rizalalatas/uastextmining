<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> New Document </TITLE>
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="Author" CONTENT="">
  <META NAME="Keywords" CONTENT="">
  <META NAME="Description" CONTENT="">
  <style type="text/css">

.style1 {font-size: 12px}
.style2 {font-size: 24px}
.style3 {color: #FFFFFF;
	font-size: 18px;
}

  </style>
</HEAD>

 <body bgcolor="#000000">
 <form action="simpan_wdq.php" method="post">
   <table width="637" border="0" align="center">
    <tr>
      <td width="631" bgcolor="#FF7F50"><p align="center"><span class="style2"><strong>SISTEM PENENTUAN JENIS&nbsp;  JANGKRIK MENGGUNAKAN</strong><strong> METODE TFIDF</strong></span></p></td>
    </tr>
    <tr>
      <td height="64" bgcolor="#CCFFCC">
      <h2 align="center">
          <ul>
            <li>
              <a href="hitung_tf.php">Lihat Data TF</a>
            </li>
            <li>
              <a href="hitung_wdq.php">Hitung WDQ</a>
            </li>
            <li>
              <a href="hitung_vektor.php">Hitung Vektor</a>
            </li>
            <li>
              <a href="hitung_tfidf.php">Hitung TFIDF</a>
            </li>
          </ul>
        </h2>
    </tr>
    <tr>
      <td height="175" bgcolor="#CCFFCC"><div align="center">
          <p align="right"><a href="../logout.php">Logout</a></p>
          <table border="1" align="center">
            <tr>
              <td colspan="3" bgcolor="#FFFFFF"><div align="center">Wdq * Wdi</div></td>
            </tr>
            <tr>
              <td><div align="center">Term Keseluruhan</div></td>
              <td><div align="center">D1</div></td>
              <td><div align="center">D2</div></td>
            </tr>
            <tr>
              <?php
  error_reporting(0);
include"konfigurasi.php";


$tampil=mysqli_query($con,"select*from term_tf , dokumen_terproses order by term_tf ASC");
$jumlah= mysqli_num_rows ($tampil); 

while($term_tf=mysqli_fetch_array($tampil)){
$q =$term_tf['q'];
$d1 =$term_tf['d1'];
$d2 =$term_tf['d2'];

$search = $term_tf['term_tf'];

$ketemu_q=$q;
$ketemu_d1=$d1;
$ketemu_d2=$d2;

$count_q = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_q, 1)));
$count_d1 = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_d1, 1)));
$count_d2 = array_sum(array_map(function($val) use ($search) {if ($val == $search) { return 1; } else { return 0; }}, str_word_count($ketemu_d2, 1)));


$df_q = $count_q ;
$df_d1 = $count_d1;
$df_d2 = $count_d2;

$df = $df_q + $df_d1 + $df_d2 ;
$idf = log10(3 / $df);
$wdtq = $count_q * $idf ;
$wdt1 = $count_d1 * $idf ;
$wdt2 = $count_d2 * $idf ;

$wdq1= $wdtq * $wdt1 ;
$wdq2= $wdtq * $wdt2 ;

echo"
<form action='simpan_wdq.php' method='post'>
<tr>
	<td>$term_tf[term_tf]</td>
	
	<td><textarea rows=1 cols=7 name=wdq1[] value=$wdq1>$wdq1</textarea></td>
	<td><textarea rows=1 cols=7 name=wdq2[] value=$wdq2>$wdq2</textarea></td>
	
</tr>
";

}
?>
  </tr>
  <tr>
    <td colspan=3>
      <input type="submit" name="submit" value="Import">
    </td>
  </tr>
</form>
          </table>
          <p>&nbsp;</p>
        </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" class="style2 style3">Copyright &copy;2016 Develoved by: Cucu Sukarna</div>
 </form>
</body>
</html>