<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : 'p_username';
$from = (isset($_GET['from']) && $_GET['from'] > '') ? $_GET['from'] : '';
$cur = (isset($_GET['cur']) && $_GET['cur'] > '') ? $_GET['cur'] : '';

$sql = "SELECT p_id, p_username, p_date, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher
        FROM tbl_patient where $search like '%$from%'";
$result = dbQuery($sql);
$count=mysql_num_rows($result);
?> 
	
<table>
           
<form action="" name="form">
<font size='+1'>view: 
<input type="hidden" class="box" name="view" value="list" />
<input type="text" class="box" name="from" />
<select class="box" name="search">
<option value="p_username">ID Number
<option value="p_date">Date
<option value="p_diagnosis">Diagnosis
<option value="p_treatment">Medication
<option value="p_doctor">Doctor
<option value="p_remarks">Remarks
</select>
<input type="submit" value="search"/>
</form>           <br><br><br>
<form action="processEvaluation.php?action=add" method="post"  name="frmEvaluate" id="frmEvaluate">

Search: <font color="#FF0000"><?php echo $from;?></font><br><br>
<input type="hidden" name="counter" value="<?php echo $count;?>"  />
<input type="hidden" name="evaluator" value="<?php echo $session;?>"  />
    				 <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
				  <tr align="center" id="listTableHeader"> 
					<th class="table-header-repeat line-left" align="left"><a href="">Date</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Patient</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Medication</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Doctor</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Certificate</th>
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
   <?php echo $p_treatment;?>
   <td>
   <?php echo $p_doctor;?>
   <td width="30">
   <a href="<?php echo WEB_ROOT;?>admin/patient/index.php?view=success&date=<?php echo $p_date;?>&patient=<?php echo $p_username;?>&remarks=<?php echo $p_remarks;?>&diagnosis=<?php echo $p_diagnosis;?>&doctor=<?php echo $p_doctor;?>">View</a>
  </tr>
<?php
} // end while

?>

 </table>
 </form>
