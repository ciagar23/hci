
<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$day = (isset($_GET['day']) && $_GET['day'] > '') ? $_GET['day'] : '';
$time = (isset($_GET['time']) && $_GET['time'] > '') ? $_GET['time'] : '';

$sql = "SELECT p_id, p_username, p_date, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher
        FROM tbl_patient where  p_date='$day' and p_time='$time'";
$result = dbQuery($sql);
$count=mysql_num_rows($result);


?> 

	<h2>Date: <?php echo $day;?>
<table>
           
<form action="processEvaluation.php?action=add" method="post"  name="frmEvaluate" id="frmEvaluate">

<input type="hidden" name="counter" value="<?php echo $count;?>"  />
<input type="hidden" name="evaluator" value="<?php echo $session;?>"  />
    				 <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
				  <tr align="center" id="listTableHeader"> 
					<th class="table-header-repeat line-left" align="left"><a href="">Patient</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Complaint</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Medication</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Remarks</th>
					<th class="table-header-repeat line-left" align="left"><a href="">Doctor</th>
					<th class="table-header-repeat line-left" align="left"><a href="">&nbsp;</th>
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
		
		$num = $i;
	
	$i += 1;
?>
  <tr class="<?php echo $class;?>"> 

   <td>
   <?php echo $num.' '.$tfname.' '.$tlname;?>
   <td>
   <?php echo $p_diagnosis;?>
   <td>
   <?php echo $p_treatment;?>
   <td>
   <?php echo $p_remarks;?>
   <td>
   <?php echo $p_doctor;?>
   <td>
   <a href="<?php echo WEB_ROOT;?>admin/appointment/?view=updatepatient&id=<?php echo $p_id;?>" title="Edit" class="icon-5 info-tooltip"></a>
  </tr>
<?php
} // end while

?>

 </table>
 </form>
