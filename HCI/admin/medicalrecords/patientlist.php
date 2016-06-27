
<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$patient = (isset($_GET['patient']) && $_GET['patient'] > '') ? $_GET['patient'] : '';

$sql = "SELECT p_id, p_username, p_date, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher
        FROM tbl_patient where p_confirmation =1 and p_username='$patient' order by p_date";
$result = dbQuery($sql);
$count=mysql_num_rows($result);
?> 

	
<table>
           
<form action="processEvaluation.php?action=add" method="post"  name="frmEvaluate" id="frmEvaluate">

<input type="hidden" name="counter" value="<?php echo $count;?>"  />
<input type="hidden" name="evaluator" value="<?php echo $session;?>"  />
    				 <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
				  <tr align="center" id="listTableHeader"> 
					<th class="table-header-repeat line-left" align="left"><a href="">Date</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Patient</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Complaint</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Medication</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Remarks</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Doctor</th>
				</tr>

<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'alternate-row';
	}
	
			$tsql = "SELECT *
        FROM tbl_user where user_name='$p_username'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
	
	$i += 1;
?>
  <tr class="<?php echo $class;?>"> 

   <td>
   <?php echo $p_date;?>
   <td>
   <?php echo $tfname.' '.$tlname;?>
   <td>
   <?php echo $p_diagnosis;?>
   <td>
   <?php echo $p_treatment;?>
   <td>
   <?php echo $p_remarks;?>
   <td>
   <?php echo $p_doctor;?>
  </tr>
<?php
} // end while

?>

 </table>
 </form>
