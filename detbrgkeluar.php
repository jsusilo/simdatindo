<?php
session_start();
include "koneksi.php";

error_reporting(0);
$waktu=time()+25200;
$expired=30;
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){include "formlogin.php";}
else{
	 ?>
<html>
<head>
    <link href="css/test.css" type="text/css" rel="stylesheet"><link href="../images/icon.jpg" rel="shortcut icon" />
		<title>ATM Logistic</title>
	<style>
		table{
	width:1180px;
	margin-bottom:10px;
	border-top-width: medium;
	border-right-width: medium;
	border-bottom-width: medium;
	border-left-width: medium;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
		}
		</style>
</head>
</html>

	<body>
    <div id="header">
    </div>
	<div id="main_content">
	<?php include "atas.php";?>
<h1 align="center">
	<b>Status Barang Keluar</b>
</h1>
<table align="center" width="1400" border="0" bordercolor="#FFFFFF">
  <tr>
    <td width="59"><div align="center"><strong>No. Form</strong></div></td>
    <td width="109"><div align="center"><strong>Part Number</strong></div></td>
    <td width="143"><div align="center"><strong>Description</strong></div></td>
    <td width="94"><div align="center"><strong>Problem</strong></div></td>
    <td width="77"><div align="center"><strong>Operator</strong></div></td>
    <td width="77"><div align="center"><strong>Engineer</strong></div></td>
    <td width="47"><div align="center"><strong>Jumlah</strong></div></td>
    <td width="130"><div align="center"><strong>Tanggal Keluar</strong></div></td>
    <td width="140"><div align="center"><strong>Keterangan</strong></div></td>
  </tr>
  <?php
  
  $sql =  custom_query("SELECT * 
FROM  `tbl_det_keluar` 
ORDER BY  `tbl_det_keluar`.`no_form_k` DESC");  
  while ($r = mysqli_fetch_array($sql))
  {
  ?> 
  <tr>
    <td><div align="center"><?php echo  $r['no_form_k']; ?></div></td>
    <td><div align="center"><?php echo $r['part_number']; ?></div></td>
    <td><?php echo $r['description']; ?></td>
    <td><div align="center"><?php echo $r['problem']; ?></div></td>
    <td><div align="center"><?php echo $r['username']; ?></div></td>
    <td><div align="center"><?php echo $r['nama_karyawan']; ?></div></td>
    <td><div align="center"><?php echo $r['jumlah']; ?></div></td>
    <td><div align="center"><?php echo $r['tgl_keluar']; ?></div></td>
    <td><div align="center"><?php echo $r['keterangan']; ?></div></td>
  <?php
  if (($_SESSION[level] == "admin") || ($_SESSION[level] == "operator"))
  	{
  ?>
    <td width="39"><div align="center"><a href="showdetk.php?no_form_k=<?php echo $r['no_form_k']; ?>">Show</a></div></td>
    <td width="39"><div align="center"><a href="editdetk.php?no_form_k=<?php echo $r['no_form_k']; ?>">Edit</a></div></td>
  <?php
  	}
	if ($_SESSION[level] == "user")
	{
	?>
	<td width="39"><div align="center"><a href="showdetk.php?no_form_k=<?php echo $r['no_form_k']; ?>">Show</a></div></td>
	<?php
    }
  }
  ?>
</table>
<?php
include "menu.php"; 
}
?>
</div>

<div id="footer"></div>
	</body>