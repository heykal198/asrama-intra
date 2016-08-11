<?php
if(isset($_POST['generate']))
{
  $uppr_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
  $lower_case = "abcdefghijklmnopqrstuvwxyz";
  $numbers = "0123456789";
  $special_chars = "~!@#$%^&*";
  
  $generated_uppr_case =substr(str_shuffle($uppr_case),0,2);
  $generated_lower_case =substr(str_shuffle($lower_case),0,2);
  $generated_numbers =substr(str_shuffle($numbers),0,2);
  $generated_special_chars =substr(str_shuffle($special_chars),0,2);
  
  $mixed = "$generated_uppr_case$generated_lower_case$generated_numbers$generated_special_chars";
  
  $generated_mixed =substr(str_shuffle($mixed),0,8);
}


?>


<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <input name="generate" type="submit" value="Generate" />
<?php  error_reporting(0);  echo $generated_mixed; ?>
</form>
	 






