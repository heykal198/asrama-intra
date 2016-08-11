<?php require_once('Connections/asrama.php'); ?>
<?php
$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_asrama, $asrama);
$query_Recordset2 = sprintf("SELECT * FROM bayar WHERE id = %s", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $asrama) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="388" border="1">
    <tr>
      <td width="654"><table width="380">
          <tr>
            <td width="30">&nbsp;</td>
            <td width="338"><p align="center"><img src="assets/login/logo.png" width="116" height="107" /></p>
              <p><u><strong>Resit Pembayaran Asrama Intra International Collage</strong></u><strong> </strong></p>
            <p>Nama : </p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p>
                <label>
                <input name="nama" type="text" id="nama" value="<?php echo $row_Recordset2['nama']; ?>" size="50" />
                </label>
            </p></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>No. I/C : </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="ic" type="text" id="ic" value="<?php echo $row_Recordset2['ic']; ?>" size="50" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Bayaran : </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="bayaran" type="text" id="bayaran" value="<?php echo $row_Recordset2['bayaran']; ?>" size="50" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Tarikh Bayaran : </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input name="tarikh_bayar" type="date" id="tarikh_bayar" value="<?php echo $row_Recordset2['tarikh_bayar']; ?>" size="35" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><p>&nbsp;</p>
                <p align="left">Tandatangan/Cop</p></td>
          </tr>
          <tr>
            <td height="97">&nbsp;</td>
            <td><p>&nbsp;</p>
                <p align="left">.............................................</p>
                <p>&nbsp;</p></td>
          </tr>
      </table></td>
    </tr>
  </table>
  
  

  <p>&nbsp;</p>
  <button onclick="myFunction()">Cetak Resit</button>

<script>
function myFunction() {
    window.print();
}
</script>
  <p>&nbsp;</p>
</form>
<?php
mysql_free_result($Recordset2);
?>
