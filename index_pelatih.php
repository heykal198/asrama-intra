<?php require_once('Connections/asrama.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['penempatan'])) {
  $loginUsername=$_POST['penempatan'];
  $password=$_POST['ic'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "aduan.php";
  $MM_redirectLoginFailed = "index_pelatih.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_asrama, $asrama);
  
  $LoginRS__query=sprintf("SELECT penempatan, tempoh FROM daftar WHERE penempatan='%s' AND tempoh='%s'",
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

              <form ACTION="<?php echo $loginFormAction; ?>" method="POST" accept-charset="utf-8" name="form1" class="form-2">  <center>              
                <p><a href="">
                  <img src="assets/login/logo.png" height="100"/>
                  </a>                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </center>
                <h1 class="oxigenfont">Log Masuk Pelatih</h1>
                <p class="float">
                    <label for="login"><i class="icon-user"></i>nama</label>
                    <span class="field1 form-control">
                    <select name="penempatan" id="penempatan">
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
                      <option>Safuan</option>
                    </select>
                </span>                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p class="float">
                    <label for="password"><i class="icon-lock"></i>no. kad pengenalan </label>
                    <input name="ic" type="password" class="showpassword" id="ic" placeholder="KATALALUAN">
                </p>
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