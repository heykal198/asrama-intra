<?php require_once('Connections/asrama.php'); ?>
<?php
mysql_select_db($database_asrama, $asrama);
$query_asrama = "SELECT * FROM asrama";
$asrama = mysql_query($query_asrama, $asrama) or die(mysql_error());
$row_asrama = mysql_fetch_assoc($asrama);
$totalRows_asrama = mysql_num_rows($asrama);

mysql_free_result($asrama);
?>
<p>
  <select name="penempatan" size="1" id="penempatan" onChange="showUser(this.value)">
    <option selected value="" <?php if (!(strcmp("", $row_asrama['penempatan']))) {echo "selected=\"selected\"";} ?>>[Sila Pilih Alamat Asrama]</option>
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
  </select>
</p>
<p>&nbsp;</p>

<input name="masuk" type="text" id="masuk" />
<p>&nbsp; </p>
