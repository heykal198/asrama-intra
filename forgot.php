<?php require_once('Connections/asrama.php'); ?>
<?php
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

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_POST['ic'])) {
  $colname_Recordset1 = $_POST['ic'];
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
<!--
jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
      loadingImage : 'ehadir/assets/css/facebox/loading.gif',
      closeImage   : 'assets/css/facebox/closelabel.png'
      })
    })

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
 
    <style type="text/css">
<!--
#Layer1 {
	position:absolute;
	width:472px;
	height:27px;
	z-index:1;
	top: 88px;
	left: 263px;
}
.style1 {color: #FF0000}
.style2 {
	font-size: 24px;
	font-weight: bold;
}
-->
    </style>
</head>
  <body>

  <div id="header">
      <div id="logo">
        <div class="container layout_header">
          <img src="assets/img/aduan.png" alt="">    
        </div>
      </div>

      <ul id="user">
      </ul>
    <div id="header-inner">
        <div class="corner tl"></div>
        <div class="corner tr"></div>
      <div align="right"></div>
    </div>
    <div align="right"></div>
  </div>

    <div id="content">
      <div id="left">
        <div id="menu">
        					




<h6 id="h-menu-products" class="selected">&nbsp;</h6>
<ul id="menu-products" class="opened">
	<li><img src="assets/login/logo.png" width="208" height="164"></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
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
        <div id="box-tabs" class="box">
          <div id="box-other" style="">      
          

<script>
  $(function() {
  $( "#tabs" ).tabs();
  });
</script>


<div id="tabs">
  <div id="tabs-1">
	<center>
	  <div id="Layer1"></div>
		  <div id="div">
		    <form name="form1" method="post" action="data_forgot.php">
              <table width="844" align="left">
                <tr>
                  <td width="91" rowspan="2">&nbsp;</td>
                  <td width="741" height="134"><span class="style2">Masukan Ruang Dibawah :</span></td>
                </tr>
                <tr>
                  <td>Nama Penuh Pelatih : </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>
                    <input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="nama" type="text" id="nama" size="58">
                  </label></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>No Kad Pengenalan  : </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><label>
                  <input oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required required name="ic" type="text" id="ic" size="58">
                  <span class="style1">*9876543212</span> </label></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>Lokasi Asrama : </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><select oninvalid="this.setCustomValidity('Sila Isi Ruang Ini')" required name="penempatan" id="penempatan">
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
                <tr>
                  <td>&nbsp;</td>
                  <td>Soalan Rahsia  : </td>
                </tr>
                <tr>
                  <td rowspan="2">&nbsp;</td>
                  <td><label>
                  <input required name="hint" type="text" id="hint" size="58">
                  <span class="style1">*Hint yang anda tetapkan</span> </label></td>
                </tr>
                <tr>
                  <td><label>
                  <input type="submit" name="Submit" value="Submit">
                  </label></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </form>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p align="left">&nbsp;</p>
		    <p align="left"><br>
		      </p>
		  </div>
	</center>
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