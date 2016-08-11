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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE daftar_inventori SET senarai_inventori=%s, penempatan=%s, tarikh_masuk=%s, tarikh_keluar=%s WHERE id=%s",
                       GetSQLValueString($_POST['senarai_inventori'], "text"),
                       GetSQLValueString($_POST['penempatan'], "text"),
                       GetSQLValueString($_POST['tarikh_masuk'], "text"),
                       GetSQLValueString($_POST['tarikh_keluar'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());

  $updateGoTo = "daftar_inventori.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = sprintf("SELECT * FROM daftar_inventori WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<div class="modal fade" id="kemaskini" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Kemaskini</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                                            <table align="center">
                                              <tr valign="baseline">
                                                <td nowrap="nowrap" align="right">Senarai_inventori:</td>
                                                <td><input type="text" name="senarai_inventori" value="<?php echo htmlentities($row_Recordset1['senarai_inventori'], ENT_COMPAT, ''); ?>" size="32" /></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap="nowrap" align="right">Penempatan:</td>
                                                <td><input type="text" name="penempatan" value="<?php echo htmlentities($row_Recordset1['penempatan'], ENT_COMPAT, ''); ?>" size="32" /></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap="nowrap" align="right">Tarikh_masuk:</td>
                                                <td><input type="text" name="tarikh_masuk" value="<?php echo htmlentities($row_Recordset1['tarikh_masuk'], ENT_COMPAT, ''); ?>" size="32" /></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap="nowrap" align="right">Tarikh_keluar:</td>
                                                <td><input type="text" name="tarikh_keluar" value="<?php echo htmlentities($row_Recordset1['tarikh_keluar'], ENT_COMPAT, ''); ?>" size="32" /></td>
                                              </tr>
                                              <tr valign="baseline">
                                                <td nowrap="nowrap" align="right">&nbsp;</td>
                                                <td><input type="submit" value="Update record" /></td>
                                              </tr>
                                            </table>
                                            <input type="hidden" name="MM_update" value="form1" />
                                            <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
                                          </form>
                                          <p>&nbsp;</p>
                                        </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                                <?php
mysql_free_result($Recordset1);
?>
