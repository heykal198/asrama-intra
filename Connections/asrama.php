<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_asrama = "localhost";
$database_asrama = "asrama";
$username_asrama = "root";
$password_asrama = "";
$asrama = mysql_pconnect($hostname_asrama, $username_asrama, $password_asrama) or trigger_error(mysql_error(),E_USER_ERROR); 
?>