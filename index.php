<?php require_once('Connections/asrama.php'); ?>
<?php
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = "SELECT * FROM logmasuk";
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_asrama, $asrama);
  
  $LoginRS__query=sprintf("SELECT username, pass FROM logmasuk WHERE username='%s' AND pass='%s'",
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
        
        
        <script src="assets/login/js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
        <style>
            body {
                background: #e7e7e7;
            }
        </style>
        
    </head>
    <body>
    <div class="container">
            <header>


            </header>

      <section class="main">

              <form action="<?php echo $loginFormAction; ?>" method="POST" accept-charset="utf-8" name="form1" class="form-2">  <center>              
                <p><a href="">
                  <img src="assets/login/logo.png" height="100"/>
                  </a>                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </center>
                <h1 class="oxigenfont"><a href="main.php">Main Page ? </a></h1>
                <h1 class="oxigenfont">Log Masuk Admin <strong></strong></h1>
                <p class="float">
                    <label for="login"><i class="icon-user"></i>ID PENGGUNA</label>
                    <input name="username" type="text"  placeholder="ID PENGGUNA">
                </p>
                <p class="float">
                    <label for="password"><i class="icon-lock"></i>KATALALUAN</label>
                    <input name="pass" type="password" class="showpassword" id="pass" placeholder="KATALALUAN">
                    <a href="forgot_admin.php">Lupa Kata Laluan ?</a> </p>
                <p class="bg-danger"></p>
                <p class="clearfix">   
                    <input type="submit" name="submit" value="Log in">
                </p>
              </form>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
      </section>

    </div>
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
    </body>
</html>
<?php
mysql_free_result($Recordset1);
?>
