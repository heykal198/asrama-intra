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
$colname_Recordset1 = "-1";
if (isset($_POST['ic'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_POST['ic'] : addslashes($_POST['ic']);
}
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = sprintf("SELECT * FROM daftar WHERE ic = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
.style2 {	color: #000000;
	font-weight: bold;
}
-->
    </style>
</head>
  <body>

    <div id="header">
      <div id="logo">
        <div class="container layout_header">
          <img src="assets/img/header.png" alt="">    
        </div>
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
        <div id="box-tabs" class="box">
          <div id="box-other" style="">      
          

<script>
  $(function() {
  $( "#tabs" ).tabs();
  });
</script>


<div id="tabs">
    <ul>
      <li><a href="#tabs-1">Carian Pelajar</a>
        </li>
      </ul>
	  <p><br>
</p>
	  
	      <a href="carian_pelajar.php" style="color:#FFFFFF" type="button" class="btn btn-primary">Kembali</a> 
		  <a href="padam_pelajar.php?id=<?php echo $row_Recordset1['id']; ?>"onclick="return confirm('Are you sure want to delete?');" style="color:#FFFFFF" type="button" class="btn btn-danger">Padam Data Pelajar</a>
          <p>&nbsp;	      </p>
	  <table class="table table-bordered">
      <tr>
        <th width="12%" scope="col">NAMA</th>
        <th width="14%" scope="col">NO KAD PENGENALAN </th>
        <th width="11%" scope="col">NO TEL </th>
        <th width="13%" scope="col">KURSUS</th>
        <th width="9%" scope="col">ASRAMA</th>
        <th width="8%" scope="col">PASSWORD E-ADUAN </th>
        <th width="17%" scope="col">NAMA PENJAGA</th>
        <th width="16%" scope="col">NO TEL PENJAGA</th>
      </tr>
      <tr>
        <td><?php echo $row_Recordset1['nama']; ?></td>
        <td><?php echo $row_Recordset1['ic']; ?></td>
        <td><?php echo $row_Recordset1['tel']; ?></td>
        <td><?php echo $row_Recordset1['kursus']; ?></td>
        <td><?php echo $row_Recordset1['penempatan']; ?></td>
        <td><?php echo $row_Recordset1['pass']; ?></td>
        <td><?php echo $row_Recordset1['nama_penjaga']; ?></td>
        <td><?php echo $row_Recordset1['tel_penjaga']; ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
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
