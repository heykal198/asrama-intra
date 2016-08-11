<?php require_once('Connections/asrama.php'); ?>
<?php
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = "SELECT * FROM daftar";
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['ic'])) {
  $loginUsername=$_POST['ic'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "aduan.php";
  $MM_redirectLoginFailed = "2.index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_asrama, $asrama);
  
  $LoginRS__query=sprintf("SELECT ic, pass FROM daftar WHERE ic='%s' AND pass='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $asrama) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Log Masuk</title>
        <link rel="stylesheet" type="text/css" href="assets/login/css/style.css" />
        
        
     
    
        <style>
            body {
                background: #e7e7e7;
            }
        .style1 {font-size: 11px}
        .style3 {	font-size: 14px;
	color: #000000;
}
#Layer2 {	position:absolute;
	width:858px;
	height:20px;
	z-index:1;
	left: -858px;
	top: 242px;
}
#Layer3 {	position:absolute;
	width:974px;
	height:41px;
	z-index:2;
	left: 910px;
	top: 225px;
}
        #Layer1 {
	position:absolute;
	width:338px;
	height:255px;
	z-index:2;
	left: 879px;
	top: 137px;
}
        .style5 {color: #FF0000}
        .style6 {color: #CC6600}
        .style7 {color: #000000}
        </style>
        
        
      

        </style>
</head>
    <body>
    <div class="container">
            <header>            </header>

            <section class="main">
              <form ACTION="<?php echo $loginFormAction; ?>" method="POST" accept-charset="utf-8" name="form1" class="form-2">
                <center>
                  <p><a href=""> <img src="assets/login/logo.png" height="100"/> </a>                  </p>
                  <p>&nbsp;  </p>
                </center>
                <h1 class="oxigenfont"><a href="main.php">Main Page?</a> </h1>
                <h1 class="oxigenfont">Log Masuk Pelatih</h1>
                <p class="bg-danger"></p>
                <p class="bg-danger"></p>
                <p class="bg-danger"></p>
                <table width="200">
                  <tr>
                    <td>Masukan No. I/C </td>
                  </tr>
                  <tr>
                    <td><input name="ic" type="text" id="ic"></td>
                  </tr>
                  <tr>
                    <td>Password </td>
                  </tr>
                  <tr>
                    <td><label>
                      <input name="pass" type="password" id="pass">
                    </label></td>
                  </tr>
                  <tr>
                    <td><label> <a href="forgot.php">LUPA KATA LALUAN ?</a><br>
                    <br>
                        <input type="submit" name="Submit" value="Log Masuk">
                    <a href="carian_daftar_id.php"><br>
                    </a></label></td>
                  </tr>
                </table>
                <p align="center" class="clearfix">&nbsp;</p>
              </form>
              <div id="Layer2">
                <marquee direction="left" class="text-error style3">
                  SELAMAT DATANG KE SISTEM PENGURUSAN ASRAMA INTRA INTERNATIONAL SKILL ACADEMY
                </marquee>
              </div>
            </section>
    </div>
        <span class="style1">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(".showpassword").each(function(index, input) {
                    var $input = $(input);
                    $("<p class='opt'/>").append(
                            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
                        var change = $(this).is(":checked") ? "text" : "password";
                        var rep = $("<input placeholder='Password' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                        $input.remove();
                        $input = rep;
                    })
                            ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
                });

                $('#showPassword').click(function() {
                    if ($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
            });
        </script>
        </span>
    </body>
</html>
<?php
mysql_free_result($Recordset1);
?>