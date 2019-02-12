<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <style type="text/css">
    .style1 {
      font-size: 12px
    }

    .style2 {
      font-size: 24px
    }

    .style3 {
      color: #FFFFFF;
      font-size: 18px;
    }
  </style>
</head>

<body bgcolor="#000000">

  <table width="637" border="0" align="center">
    <tr>
      <td width="631" bgcolor="#FF7F50">
        <p align="center"><span class="style2"><strong>SISTEM PENENTUAN JENIS  JANGKRIK MENGGUNAKAN</strong><strong>
              METODE TFIDF</strong></span></p>
      </td>
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
        
      </td>
    </tr>
    <tr>
      <td height="175" bgcolor="#CCFFCC">
        <div align="center">
          
          <p>
            <?php
include "konfigurasi.php";

$tampil=mysqli_query($con, "SELECT * FROM hasil");
while($hasil=mysqli_fetch_array($tampil))
{
echo"<hr/>Hasil Gabungan : <br> $hasil[hasil] 
 </hr>";
 
}
?>
          </p>
        </div>
      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <div align="center" class="style2 style3">Copyright ©2019 Develoved by: Rijal Bani Salam S</div>
</body>

</html>