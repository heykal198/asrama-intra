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

$editFormAction1 = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction1 .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["masuk"])) && ($_POST["masuk"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO kursus (kursus) VALUES (%s)",
                       GetSQLValueString($_POST['kursus'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "daftar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM kursus";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<div class="modal fade" id="kursuss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Kursus</h4>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tambah" data-toggle="tab">Tambah Kursus</a>
                                </li>
                                <li><a href="#Kemaskini" data-toggle="tab">Kemaskini Kursus</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tambah">
                                  <form action="<?php echo $editFormAction1; ?>" method="post" name="form2" id="form2">
                                    <table align="center">
                                      <div align="center" class="form-group">
                                        <label>Kursus:</label>
                                        <br />
                                        <label><input type="text" name="kursus" class="form-control" value="" size="32" /></label>
                                      </div>
                                      <tr valign="baseline">
                                        <td nowrap="nowrap" align="right">&nbsp;</td>
                                        <td><input type="submit" class="btn btn-success" value="Simpan" /></td>
                                      </tr>
                                    </table>
                                    <input type="hidden" name="masuk" value="form2" />
                                  </form>
                                  <p>&nbsp;</p>
                                </div>
                                <div class="tab-pane fade" id="Kemaskini">
                                <div class="table-responsive">
                                    <table class="table table-hover">
  <tr>
  <th scope="col">#</th>
    <th scope="col">Kursus</th>
    <th scope="col">&nbsp;</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['id']; ?></td>
      <td><?php echo $row_Recordset1['kursus']; ?></td>
      <td><a href="padam_kursus.php?id=<?php echo $row_Recordset1['id']; ?>" class="btn btn-danger">Padam</a></td>
  
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
                                  </table>
</div>

                                </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                                <?php
mysql_free_result($Recordset1);
?>
