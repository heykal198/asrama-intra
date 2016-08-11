<?php require_once('Connections/asrama.php'); ?>
<?php
$colname_Recordset1 = "-1";
if (isset($_GET['penempatan'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['penempatan'] : addslashes($_GET['penempatan']);
}
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = sprintf("SELECT * FROM daftar WHERE penempatan = '%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pendaftaran Asrama</title>
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
      <li><a href="#tabs-1">Carian Pelajar Mengikut Asrama </a></li>
      </ul>

    <p>&nbsp;</p>
    <div align="center">
      <table width="378">
        <tr>
          <td width="275">Sila Pilih Lokasi Penempatan Asrama  : </td>
        </tr>
      </table>
    </div>
    <div id="tabs-1">
	<center>
      <form name="form1" method="post" action="papar_data.php">
        <label>
<select name="penempatan" id="penempatan" onChange="MM_jumpMenu('parent',this,0)">
<option value="Sila Pilih ">SILA PILIH ASRAMA</option>
  <option value="papar_asrama.php?penempatan=No. 214 APARTMENT VILLA MELAWATI">No. 214 APARTMENT VILLA MELAWATI</option>
  <option value="papar_asrama.php?penempatan=No. 215 APARTMENT VILLA MELAWATI">No. 215 APARTMENT VILLA MELAWATI</option>
  <option value="papar_asrama.php?penempatan=No. 315 APARTMENT VILLA MELAWATI">No. 315 APARTMENT VILLA MELAWATI</option>
  <option value="papar_asrama.php?penempatan=No. 416 APARTMENT VILLA MELAWATI">No. 416 APARTMENT VILLA MELAWATI</option>
  <option value="papar_asrama.php?penempatan=No. 11 JALAN 17 TAMAN PADUKA">No. 11 JALAN 17 TAMAN PADUKA</option>
  <option value="papar_asrama.php?penempatan=No. 53, JALAN KSU 2/4B>">No. 53, JALAN KSU 2/4B</option>
  <option value="papar_asrama.php?penempatan=No. 14 TAMAN SRI BENDAHARA">No. 14 TAMAN SRI BENDAHARA</option>
  <option value="papar_asrama.php?penempatan=No. 21 JALAN BENDAHARA 7A">No. 21 JALAN BENDAHARA 7A</option>
  <option value="papar_asrama.php?penempatan=No. 6 LORONG TERATAI 2/16">No. 6 LORONG TERATAI 2/16</option>
  <option value="papar_asrama.php?penempatan=No. 74 JALAN SULTAN IBRAHIM BERITA HARIAN">No. 74 JALAN SULTAN IBRAHIM BERITA HARIAN</option>
  <option value="papar_asrama.php?penempatan=No. 31, JALAN BENDAHARA 10/6">No. 31, JALAN BENDAHARA 10/6</option>
  <option value="papar_asrama.php?penempatan=No. 29 JALAN BENDAHARA 10/5">No. 29 JALAN BENDAHARA 10/5</option>
  <option value="papar_asrama.php?penempatan=No. 13 JALAN BENDAHARA 7">No. 13 JALAN BENDAHARA 7</option>
  <option value="papar_asrama.php?penempatan=No. 17 JALAN SRI BENDAHARA 1/1">No. 17 JALAN SRI BENDAHARA 1/1</option>
  <option value="papar_asrama.php?penempatan=No. 15 JALAN BENDAHARA 9">No. 15 JALAN BENDAHARA 9</option>
  <option value="papar_asrama.php?penempatan=No. 11 JALAN BENDAHARA 9A">No. 11 JALAN BENDAHARA 9A</option>
</select>
<br>
        
        </label>
        <label></label>
            </form>
		  </center>
    </div> 

</div>


          </div>
        </div>
      </div>    
    </div>

    <div id="footer">
      <p>Hakcipta &copy; 2014-2015 Pendaftaran Asrama.</p>
    </div>

  </body>
</html>
<?php
mysql_free_result($Recordset1);
?>
