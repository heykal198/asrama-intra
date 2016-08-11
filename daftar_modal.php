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
  $insertSQL = sprintf("INSERT INTO daftar_inventori (senarai_inventori, penempatan, tarikh_masuk, tarikh_keluar) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['senarai_inventori'], "text"),
                       GetSQLValueString($_POST['penempatan'], "text"),
                       GetSQLValueString($_POST['tarikh_masuk'], "text"),
                       GetSQLValueString($_POST['tarikh_keluar'], "text"));

  mysql_select_db($database_localhost, $localhost);
  $Result1 = mysql_query($insertSQL, $localhost) or die(mysql_error());

  $insertGoTo = "daftar_inventori.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_localhost, $localhost);
$query_Recordset1 = "SELECT * FROM daftar_inventori";
$Recordset1 = mysql_query($query_Recordset1, $localhost) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_localhost, $localhost);
$query_asrama = "SELECT * FROM asrama";
$asrama = mysql_query($query_asrama, $localhost) or die(mysql_error());
$row_asrama = mysql_fetch_assoc($asrama);
$totalRows_asrama = mysql_num_rows($asrama);
?>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>

<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Daftar Inventori</h4>
                                        </div>
                                        <div align="center" class="modal-body">
                                          <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                                           
                                              <div class="form-group">
                                                <label>Senarai inventori</label>
                                                <td>:</td>
                                                 <br />
                                                <label><input type="text" class="form-control" name="senarai_inventori" value="" size="32" /></label>
                                              </div>
                                              <div class="form-group">
                                              <label>Penempatan</label>
<td>:</td>
 <br />
													<label><select class="form-control" name="penempatan" id="penempatan">
          
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
                                               <script type="text/javascript">
$(function() {
  $( "#Datepicker1" ).datepicker(); 
});
                </script>
                
                                                <label>Tarikh masuk</label>
                                                <td>:</td>
                                                 <br />
                                                <label><input type="date" class="form-control" name="tarikh_masuk"  value="" size="32" />
                                                
                                                <label>
                                              </div>
                                               <div class="form-group">
                                               <script type="text/javascript">
$(function() {
  $( "#Datepicker2" ).datepicker(); 
});
                </script>
                                               <label>Tarikh keluar</label>
                                               <td>:</td>
                                               <br />
                                                <label><input type="date" class="form-control" name="tarikh_keluar" value="" size="32" /><label>
                                              </div>
                                              <div align="center" class="form-group">
                                               
                                                <input type="submit" class="btn btn-success" value="Daftar" />
                                              </div>
                                        
                                            <input type="hidden" name="MM_insert" value="form1" />
                                          </form>
                                          
                                          <br />
                                          <br />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <?php
mysql_free_result($Recordset1);
?>
<script type="text/javascript">
$(function() {
	$( "#Datepicker3" ).datepicker(); 
});
                            </script>
