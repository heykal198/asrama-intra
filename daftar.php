<?php require_once('Connections/asrama.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO daftar (nama, ic, tel, jantina, kursus, penempatan, nama_penjaga, nama_penjaga2, alamat_penjaga, tel_penjaga, tel_penjaga2, masuk, keluar, pass) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['ic'], "text"),
                       GetSQLValueString($_POST['tel'], "text"),
                       GetSQLValueString($_POST['jantina'], "text"),
                       GetSQLValueString($_POST['kursus'], "text"),
                       GetSQLValueString($_POST['penempatan'], "text"),
                       GetSQLValueString($_POST['nama_penjaga'], "text"),
                       GetSQLValueString($_POST['nama_penjaga2'], "text"),
                       GetSQLValueString($_POST['alamat_penjaga'], "text"),
                       GetSQLValueString($_POST['tel_penjaga'], "text"),
                       GetSQLValueString($_POST['tel_penjaga2'], "text"),
                       GetSQLValueString($_POST['masuk'], "text"),
                       GetSQLValueString($_POST['keluar'], "text"),
                       GetSQLValueString($_POST['pass'], "text"));

  mysql_select_db($database_asrama, $asrama);
  $Result1 = mysql_query($insertSQL, $asrama) or die(mysql_error());

  $insertGoTo = "pendaftaran_berjaya.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = "SELECT * FROM daftar";
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pengurusan Asrama</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.cus.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap_custom.css">  
    <link rel="stylesheet" type="text/css" href="assets/css/sistemkik.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/datepicker.css">  
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/style.css" media="screen" />
    <link id="color" rel="stylesheet" type="text/css" href="resources/css/colors/blue.css" /> 
    <script src="assets/js/jquery-1.10.21.min.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css"> 
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap1.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">
    <script type="text/javascript" charset="utf-8" src="assets/js/validation.js"></script> 
    <script type="text/javascript" src="assets/js/jquery.dataTables.nightly.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datatables.js"></script>
    <script type="text/javascript" charset="utf-8" src="assets/js/FixedColumns.nightly.js"></script> 

    <script type="text/javascript">
      $(document).ready(function () {
        style_path = "resources/css/colors";
        $("#box-tabs, #box-left-tabs").tabs();
      });
    </script>

    <script type="text/javascript">
      function logout() {
        var answer = confirm("Anda pasti ingin log keluar?")
        if (answer){
          window.location = "logout.php";
        }
        else{
          
        }
      }
    </script>

    <style>
    .btn{
      font-family: Arial;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
      filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
      filter: progid:dximagetransform.microsoft.gradient(enabled=false);
      *zoom: 1;
      -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
         -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: 4px 4px 4px #888888;
    }

    </style>


    <style>
    .pagination ul > li > a, .pagination ul > li > span
    {
     
      border: 1px solid #ccc;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
           -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
           -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
            -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
             -o-transition: border linear 0.2s, box-shadow linear 0.2s;
                transition: border linear 0.2s, box-shadow linear 0.2s;   
                
    }
    .pagination ul > li > a:hover,
    .pagination ul > .active > a,
    .pagination ul > .active > span,
    .pagination ul > .MarkupPagerNavOn > a,
    .pagination ul > .MarkupPagerNavOn > span {
      background-color: #333;
    }
    
    }
    </style>

    <link href="assets/css/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="assets/js/facebox//facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
      loadingImage : 'ehadir/assets/css/facebox/loading.gif',
      closeImage   : 'assets/css/facebox/closelabel.png'
      })
    })
    </script>
    <style type="text/css">
<!--
.style2 {color: #FF0000}
.style3 {color: #FFFFFF}
-->
    </style>
</head>
</html>
<html lang="en">
  <head>
  </head>
  <body>
  <div id="header">
      <div id="logo">
        <div class="container layout_header">
          <img src="assets/img/header.png" alt="">        </div>
      </div>

      <ul id="user">
      </ul>
      <div id="header-inner">
        <div class="corner tl"></div>
        <div class="corner tr"></div>
      </div>
  </div>

    <div id="content">
      <div id="left">
        <div id="menu">
        					




<h6 id="h-menu-products" class="selected"><a href="home.php"><span>Halaman Utama</span></a></h6>
<ul id="menu-products" class="opened">
	<li><a href="daftar.php">Pendaftaran Asrama</a></li>
	<li></li>
	<li><a href="carian_pelajar.php">Carian Pelajar</a> </li>
	<li><a href="Kemaskini.php">Kemaskini Asrama</a></li>
	<li><a href="asrama.php">Pengurusan Asrama</a></li>
</ul>

        <script src="assets/js/jquery-ui.js"></script>
        <script>
        $(function() {
        $( "#datepicker" ).datepicker();
        });
        </script>
        <div id='datepicker'></div>
        </div>       
      </div>
      
	  <script src="assets/css/datepicker1.css"></script>
	  <script>
	   $(function() {
        $( "#datepicker1" ).datepicker();
		$( "#datepicker2" ).datepicker();
		$( "#datepicker3" ).datepicker();
        });
	 	</script>
		
      <div id="right">
        <blockquote>&nbsp;</blockquote>
        <div id="box-tabs" class="box">
          <div id="box-other" style="">      
          

<script>
  $(function() {
  $( "#tabs" ).tabs();
  });
</script>


<div id="tabs">
    <ul>
      <li><a href="#tabs-1">Pendaftaran Asrama</a></li>
    </ul>

    <div id="tabs-1">
     <form action="<?php echo $editFormAction; ?>" name="form1" method="POST">
       <table class="art-article" width="100%" border="0">
      <tr class="even">
        <td><table width="870" border="1">
          <tr>
            <td width="860" class="badge-inverse style3">Maklumat Pelajar </td>
          </tr>
        </table></td>
      </tr>
      <tr class="even">
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama :</font></td>
      </tr>
      <tr class="even">
        <td><input name="nama" type="text" id="nama" size="58" oninvalid="this.setCustomValidity('Sila Masukan Nama')" required/>
          <span class="style2">*Nama Penuh Pelatih</span></td>
      </tr>
      <tr class="even">
        <td>No IC :</td>
      </tr>
      <tr class="even">
        <td><input name="ic" type="text" id="ic" size="58" oninvalid="this.setCustomValidity('Sila Masukan No Kad Pengenalan')" required/>
          <span class="style2">          *911010109876</span></td>
        </tr>
      <tr class="even">
        <td>No Tel/hp :</td>
        </tr>
      <tr class="even">
        <td><input name="tel" type="text" id="tel " size="58" oninvalid="this.setCustomValidity('Sila Masukan No Tel')" required/>
          <span class="style2">*0123456789 </span></td>
        </tr>
      <tr class="even">
        <td>Jantina :</td>
      </tr>
      <tr class="even">
        <td><select oninvalid="this.setCustomValidity('Sila Pilih Jantina')" required name="jantina" class="field1" id="jantina">
          <option value="">[Sila Pilih Jenis Jantina]</option>
          <option value="LELAKI">LELAKI</option>
          <option value="PEREMPUAN">PEREMPUAN</option> 
        </select></td>
      </tr>
      <tr class="even">
        <td>Kursus : </td>
      </tr>
      <tr class="even">
        <td><select oninvalid="this.setCustomValidity('Sila Pilih Kursus')" required name="kursus" class="field1" id="kursus">
          <option value="" selected>[Sila Pilih Jenis Kursus]</option>
          <option value="EE-320:2:2012(PEMASANGAN&PENYELENGGARAAN ELETRIK-SATU FASA)">EE-320:2:2012(PEMASANGAN&PENYELENGGARAAN ELETRIK-SATU FASA)</option>
          <option value="EE-320:3:2012(PEMASANGAN&PENYELENGGARAAN ELETRIK-TIGA FASA)">EE-320:3:2012(PEMASANGAN&PENYELENGGARAAN ELETRIK-TIGA FASA)</option>
          <option value="FB-024-2:2012(PENGURUSAN PEJABAT)">FB-024-2:2012(PENGURUSAN PEJABAT)</option>
          <option value="FB-024-3:2012(PENYELIA PENGURUSAN PEJABAT)">FB-024-3:2012(PENYELIA PENGURUSAN PEJABAT)</option>
          <option value="FB-024-4:2012(PENTADBIRAN SISTEM MAKLUMAT)">FB-024-4:2012(PENTADBIRAN SISTEM MAKLUMAT)</option>
          <option value="IT-020-3:2013(OPERASI SISTEM KOMPUTER)">IT-020-3:2013(OPERASI SISTEM KOMPUTER)</option>
          <option value="IT-020-4:2013(PENTADBIR SISTEM KOMPUTER)">IT-020-4:2013(PENTADBIR SISTEM KOMPUTER)</option>
          <option value="MP-060-2:2013(PERKHIMATAN ESTETIK)">MP-060-2:2013(PERKHIMATAN ESTETIK)</option>
          <option value="MP-060-3:2013(PERKHIMATAN ESTETIK)">MP-060-3:2013(PERKHIMATAN ESTETIK)</option>
          <option value="TA-012-1:2012(PEMBUATAN PAKAIAN WANITA)">TA-012-1:2012(PEMBUATAN PAKAIAN WANITA)</option>
          <option value="TA-012-2:2012(PEMBUATAN PAKAIAN WANITA)">TA-012-2:2012(PEMBUATAN PAKAIAN WANITA)</option>
          <option value="TA-012-3:2012(PEMBUATAN PAKAIAN WANITA)">TA-012-3:2012PEMBUATAN PAKAIAN WANITA)</option>
          <option value="ME-020-2-2012(PERALATAN PENYAMAN UDARA HVAC-SATU FASA)">ME-020-2-2012(PERALATAN PENYAMAN UDARA HVAC-SATU FASA)</option>
          <option value="ME-020-3-2012(PENYELIA PEMASANGAN&PENYELENGGARAAN HVAC)">ME-020-3-2012(PENYELIA PEMASANGAN&PENYELENGGARAAN HVAC)</option>
        </select></td>
      </tr>
      <tr class="even">
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Penempatan Asrama :</font></td>
      </tr>
      <tr class="even">
        <td><select oninvalid="this.setCustomValidity('Sila Pilih Asrama')" required name="penempatan" id="penempatan">
          <option selected>[Sila Pilih Jenis Penempatan]</option>
          <option>No. 214 APARTMENT VILLA MELAWATI</option>
          <option>No. 215 APARTMENT VILLA MELAWATI</option>
          <option>No. 315 APARTMENT VILLA MELAWATI</option>
          <option>No. 416 APARTMENT VILLA MELAWATI</option>
          <option>No. 11 JALAN 17 TAMAN PADUKA</option>
          <option>No. 53, JALAN KSU 2/4B</option>
          <option>No. 14 TAMAN SRI BENDAHARA</option>
          <option>No. 21 JALAN BENDAHARA 7A</option>
          <option>No. 6 LORONG TERATAI 2/16</option>
          <option>No. 74 JALAN SULTAN IBRAHIM </option>
          <option>No. 31, JALAN BENDAHARA 10/6</option>
          <option>No. 13 JALAN BENDAHARA 7</option>
          <option>No. 29 JALAN BENDAHARA 10/5</option>
          <option>No. 17 JALAN SRI BENDAHARA 1/1</option>
          <option>No. 15 JALAN BENDAHARA 9</option>
          <option>No. 11 JALAN BENDAHARA 9A</option>
        </select></td>
      </tr>
      <tr class="even">
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Tarikh Masuk/Keluar    : </font></td>
      </tr>
      <tr class="even">
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input oninvalid="this.setCustomValidity('Sila Masukan Tarikh Masuk')" required name="masuk" type="text" class="input" id="datepicker1" requiredonclose="enablebtn()" size="50" nsme="Penggunaan_Tarikh" />
To
<input oninvalid="this.setCustomValidity('Sila Masukan Tarikh Keluar')" required name="keluar" type="text" class="input" id="datepicker2" requiredonclose="enablebtn()" size="50" nsme="Penggunaan_Tarikh"  />
        </font></td>
      </tr>
    </table>
    
    
        
     
     <p> </p>
     <table width="860" border="1">
       <tr>
         <td class="badge-inverse style3">Maklumat Penjaga </td>
       </tr>
     </table>
     <p>&nbsp;</p>
     <table width="100%" border="0" class="art-article">
       <tr>
         <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama Penjaga  1 :</font></td>
       </tr>
       <tr class="even">
         <td><input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="nama_penjaga" type="text" class="input" id="nama_penjaga" size="58" onClose="enablebtn()" nsme="Penggunaan_Tarikh"  /></td>
       </tr>
       <tr class="even">
         <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nama  Penjaga 2 : </font></td>
       </tr>
       <tr class="even">
         <td><input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="nama_penjaga2" type="text" class="input" id="nama_penjaga2" size="58" onClose="enablebtn()" nsme="Penggunaan_Tarikh"  /></td>
       </tr>
       <tr class="even">
         <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">No Tel/Hp Penjaga 1 : </font></td>
       </tr>
       <tr class="even">
         <td><input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="tel_penjaga" type="text" class="input" id="tel_penjaga" size="58" onclose="enablebtn()" nsme="Penggunaan_Tarikh"  />
           <span class="style2">*0123456789 </span></td>
       </tr>
       <tr class="even">
         <td>No. Tel/Hp Penjaga 2 : </td>
       </tr>
       <tr class="even">
         <td><input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="tel_penjaga2" type="text" class="input" id="tel_penjaga2" size="58" onclose="enablebtn()" nsme="Penggunaan_Tarikh"  />
           <span class="style2">           *0123456789</span> </td>
       </tr>
       <tr class="even">
         <td>Alamat Penjaga:</td>
       </tr>
       <tr class="even">
         <td><textarea oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="alamat_penjaga" cols="58" rows="7" id="alamat_penjaga"></textarea>
           <span class="style2">           *Alamat Tetap Penjaga</span> </td>
       </tr>
     </table>
     <p>&nbsp;</p>
     <table width="860" border="1">
       <tr>
         <td class="badge-inverse style3">Tambahan</td>
       </tr>
     </table>
     <p>&nbsp;</p>
     <table width="100%" border="0" class="art-article">
       <tr>
         <td>Kata laluan E-aduan </td>
       </tr>
       <tr>
         <td><input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="pass" type="text" class="input" id="pass" size="58" onclose="enablebtn()" nsme="Penggunaan_Tarikh"  /></td>
       </tr>
     </table>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <table width="100%" border="0" class="art-article">
       <tr>
         <td><label>
           <input required name="Daftar2" type="submit" class="btn-success" id="Daftar2" value="Daftar">
         </label></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
       </tr>
     </table>
     <p>&nbsp;</p>
     <input required type="hidden" name="MM_insert" value="form1">
     </form>
    </div> 
</div>
          </div>
        </div>
      </div>    
    </div>

    <div id="footer">
      <p>Hakcipta &copy; 2015-2016 Sistem Pengurusan Asrama.</p>
    </div>
  </body>
</html>
<?php
mysql_free_result($Recordset1);
?>