<?php require_once('../Connections/asrama.php'); ?>
<?php
mysql_select_db($database_asrama, $asrama);
$query_Recordset1 = "SELECT * FROM daftar";
$Recordset1 = mysql_query($query_Recordset1, $asrama) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

session_start();
require_once 'class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('aduan.php');
}

if(isset($_POST['btn-login']))
{
	$ic = trim($_POST['ic']);
	$pass = trim($_POST['pass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('aduan.php');
	}
}
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

if (isset($_POST['ic'])) {
  $loginUsername=$_POST['ic'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "../aduan.php";
  $MM_redirectLoginFailed = "index.php";
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
<html>
  <head>
    <title>Login | Coding Cage</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
            <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
			</div>
            <?php
		}
		?>
        <form ACTION="<?php echo $loginFormAction; ?>" class="form-signin" method="POST">
        <?php
        if(isset($_GET['error']))
		{
			?>
            <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Wrong Details!</strong> 
			</div>
            <?php
		}
		?>
        <h2 class="form-signin-heading">Sign In.</h2><hr />
        <input name="ic" type="text" class="input-block-level" id="ic" placeholder="Password" required />
        <input name="pass" type="password" class="input-block-level" id="pass" placeholder="Password" required />
     	<hr />
        <button class="btn btn-large btn-primary" type="submit" name="btn-login">Sign in</button>
        <a href="signup.php" style="float:right;" class="btn btn-large">Sign Up</a><hr />
        <a href="fpass.php">Lost your Password ? </a>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
mysql_free_result($Recordset1);
?>