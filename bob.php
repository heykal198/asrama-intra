<?php require_once('Connections/asrama.php'); ?>
<?php
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = "SELECT * FROM bayar";
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-weight: bold;
}
#Layer1 {
	position:absolute;
	width:200px;
	height:35px;
	z-index:1;
	top: 192px;
	left: 821px;
}
#Layer2 {
	position:absolute;
	width:97px;
	height:75px;
	z-index:2;
	left: 17px;
	top: 18px;
}
#Layer3 {
	position:absolute;
	width:295px;
	height:20px;
	z-index:3;
	left: 146px;
	top: 129px;
}
#Layer4 {
	position:absolute;
	width:295px;
	height:21px;
	z-index:4;
	left: 145px;
	top: 151px;
}
#Layer5 {
	position:absolute;
	width:295px;
	height:23px;
	z-index:5;
	left: 144px;
	top: 181px;
}
#Layer6 {
	position:absolute;
	width:295px;
	height:24px;
	z-index:6;
	left: 144px;
	top: 208px;
}
#Layer7 {
	position:absolute;
	width:530px;
	height:18px;
	z-index:7;
}
#Layer8 {
	position:absolute;
	width:491px;
	height:20px;
	z-index:7;
	left: 317px;
	top: 104px;
}
#Layer9 {
	position:absolute;
	width:473px;
	height:21px;
	z-index:8;
	left: 318px;
	top: 81px;
}
.style4 {font-size: 16px; font-weight: bold; }
-->
</style>
</head>

<body>
<table width="1017" height="260" border="1">
  <tr>
    <td height="254"><p align="center" class="style4"><u>RESIT RASMI PUSAT TUISYEN AKADEMIK GADING</u> </p>
      <p class="style1">&nbsp;</p>
      <p class="style1">&nbsp;</p>
      <p class="style1">NAMA :  </p>
      <div id="Layer3"><u><?php echo $row_Recordset1['nama']; ?></u></div>
      <p class="style1">NO. KP :</p>
    <p class="style1">TARIKH BAYARAN :</p>
    <p align="left" class="style1">JUMLAH BAYARAN :  </p>    </td>
  </tr>
</table>
<div id="Layer1">
  <div align="center">................................................. (Tandatangan)</div>
</div>
<p>&nbsp;</p>
<div id="Layer2"><img src="assets/gading.PNG" width="150" height="91" /></div>
<div id="Layer4"><u><?php echo $row_Recordset1['ic']; ?></u></div>
<div id="Layer5"><u><?php echo $row_Recordset1['tarikh_bayar']; ?></u></div>
<div id="Layer6"><u><?php echo $row_Recordset1['bayaran']; ?></u></div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
