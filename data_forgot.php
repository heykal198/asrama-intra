<?php require_once('Connections/asrama.php'); ?>
<?php require_once('Connections/asrama.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE daftar SET pass=%s WHERE ic=%s",
                       GetSQLValueString($_POST['pass'], "text"),
                       GetSQLValueString($_POST['ic'], "text"));

  mysql_select_db($database_asrama, $asrama);
  $Result1 = mysql_query($updateSQL, $asrama) or die(mysql_error());

  $updateGoTo = "2.index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_POST['ic'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['ic'] : addslashes($_POST['ic']);
}
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = sprintf("SELECT * FROM daftar WHERE ic = '%s'", $colname_Recordset1);
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
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 36px;
	font-family: "Times New Roman", Times, serif;
}
.style2 {
	font-size: 24px;
	font-family: "Times New Roman", Times, serif;
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
        					




<h6 align="center" class="selected" id="h-menu-products"><a href="2.index.php">Log Masuk</a> </h6>
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
            <p>&nbsp;</p>
            <form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
              <table width="320" align="center">
                <tr>
                  <td width="323" height="58"><div align="center"><span class="style2">Sila Tukar Kata Laluan Anda: </span></div></td>
                </tr>
                <tr>
                  <td><div align="center" class="style1">
                    <label>
                    <input name="pass" type="text" id="pass" value="<?php echo $row_Recordset1['pass']; ?>">
                    </label>
                  </div></td>
                </tr>
                <tr>
                  <td height="52"><label>
                    <div align="right">
                      <input type="submit" name="Submit" value="Submit">
                    </div>
                    </label></td>
                </tr>
              </table>
              <p>&nbsp;</p>
              <p>
                <input name="ic" type="hidden" id="ic" value="<?php echo $row_Recordset1['ic']; ?>">
              </p>
              <input type="hidden" name="MM_update" value="form1">
            </form>
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

mysql_free_result($Recordset1);
?>