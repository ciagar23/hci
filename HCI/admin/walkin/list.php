
<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$day = (isset($_GET['day']) && $_GET['day'] > '') ? $_GET['day'] : '';
$time = (isset($_GET['time']) && $_GET['time'] > '') ? $_GET['time'] : '';

$sql = "SELECT p_id, p_username, p_date, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher, p_confirmation
        FROM tbl_patient where  p_date='$day' and p_time='$time' order by p_confirmation desc";
$result = dbQuery($sql);
$count=mysql_num_rows($result);
$ok = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient where  p_date='$day' and p_time='$time' and p_confirmation=1"));
$nook = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient where  p_date='$day' and p_time='$time' and p_confirmation=0"));


?> 
<br>
	<h2>Date:<font color="#0000FF"> <?php echo $day;?></font> | Confirmed Appointment:<font color="#00FF00">  <?php echo $ok;?></font> | unconfirmed Appointment: <font color="#FF0000"> <?php echo $nook;?></font>
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
	
	if ($p_confirmation ==0) {
		$class = '#CCCCCC';
	} else {
		$class = '#FFFF00';
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
  <tr bgcolor="<?php echo $class;?>"> 

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
   <?php if ($p_confirmation ==0){?>
   <a href="process.php?action=confirm&id=<?php echo $p_id;?>&day=<?php echo $day;?>&time=<?php echo $time;?>&user=<?php echo $p_username;?>" title="Confirm">Confirm</a>
   <?php }else{?>
   <a href="<?php echo WEB_ROOT;?>admin/appointment/?view=updatepatient&id=<?php echo $p_id;?>" title="Edit">Record</a>
   <?php }?>
  </tr>
<?php
} // end while

?>

 </table>
 </form>
