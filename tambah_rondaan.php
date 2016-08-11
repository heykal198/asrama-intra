<?php require_once('Connections/localhost.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO jadual_rondaan (penempatan, tarikh, masa) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['penempatan'], "text"),
                       GetSQLValueString($_POST['tarikh'], "date"),
                       GetSQLValueString($_POST['masa'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "judual_rondaan.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM jadual_rondaan";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_localhost, $localhost);
$query_asrama = "SELECT * FROM asrama";
$asrama = mysql_query($query_asrama, $localhost) or die(mysql_error());
$row_asrama = mysql_fetch_assoc($asrama);
$totalRows_asrama = mysql_num_rows($asrama);
?>
<div class="modal fade" id="tambah_rondaan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah jadual Rondaan</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                                            <table align="center">
                                              <div class="form-group">
                                                <label>Penempatan:</label>
        <br />                                        <label><select class="form-control" name="penempatan" id="penempatan">
          
          <?php
do {  
?>
          <option value="<?php echo $row_asrama['penempatan']?>"<?php if (!(strcmp($row_asrama['penempatan'], $row_asrama['penempatan']))) {echo "selected=\"selected\"";} ?>><?php echo $row_asrama['penempatan']?></option>
          <?php
} while ($row_asrama = mysql_fetch_assoc($asrama));
  $rows = mysql_num_rows($asrama);
  if($rows > 0) {
      mysql_data_seek($asrama, 0);
    $row_asrama = mysql_fetch_assoc($asrama);
  }
?>
 <option selected value="" <?php if (!(strcmp("", $row_asrama['penempatan']))) {echo "selected=\"selected\"";} ?>>SILA PILIH</option>   
            
          </select> </label>
                                              </div>
                                              <div class="form-group">
                                                <label>Tarikh:</label>
        <br />                                        <label><input type="date" class="form-control" name="tarikh" value="" size="32" /></label>
                                              </div>
                                              <div class="form-group">
                                                <label>Masa:</label>
        <br />                                        <label><input type="time" class="form-control" name="masa" value="" size="32" /></label>
                                              </div>
                                              <div class="form-group">
                                                <label>&nbsp;</label>
        <br />                                        <label><input type="submit" class="form-control" value="Tambah" /></label>
                                              </div>
                                            </table>
                                            <input type="hidden" name="MM_insert" value="form1" />
                                          </form>
                                          <p>&nbsp;</p>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
<?php
mysql_free_result($Recordset1);
?>
