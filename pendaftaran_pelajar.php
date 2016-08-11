<!DOCTYPE html>
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
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
      loadingImage : 'ehadir/assets/css/facebox/loading.gif',
      closeImage   : 'assets/css/facebox/closelabel.png'
      })
    })
    </script>
 
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
      <li><a href="#tabs-1">Pendaftaran Pelajar</a></li>
    </ul>

    <div id="tabs-1">
      <form class="form-horizontal" name="form_pelajar" id="form_pelajar" method="post" action="" autocomplete="off">

      <div class="control-group">
        <label class="control-label">No.Pelajar</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="nopelajar" id="nopelajar" style="text-transform:uppercase"/>
        </div>
      </div> 
      <div class="control-group">
        <label class="control-label">Nama Pelajar</label>
        <div class="controls">
            <input class="input-xlarge" type="text" name="nama" id="nama"/>
        </div>
      </div> 
      <div class="control-group">
        <label class="control-label">Kursus</label>
        <div class="controls">
          
            <select name="kursus" id="kursus" style="width:auto" class="required">
              <option  value="">Pilih Kursus</option>
                     
                 <option value="CS230"> Ijazah Sarjana Muda Sains Komputer  
                       
                 <option value="CS225"> Ijazah Sarjana Muda Sains Komputer Multimedia 
                </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Katalaluan</label>
        <div class="controls">
            <input class="input-medium" type="text" name="katalaluan" id="katalaluan"/>
            <form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <input name="generate" type="button" value="Generate" />
<?php  error_reporting(0);  echo $generated_mixed; ?>
</form>
	 







		
		</div>
      </div> 
      <div class="form-actions">
          <input name="dftr_pelajar" type="submit" class="btn btn-primary"  value="Daftar Pelajar" />
          <input name="Reset" type="reset" class="btn btn-danger"  value="Semula" />
      </div> 
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
           

