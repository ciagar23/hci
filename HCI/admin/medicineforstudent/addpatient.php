<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$Patient =$_SESSION['patient'];
$date = isset($_GET['date']) ? $_GET['date'] : '';
$remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
$diagnosis = isset($_GET['diagnosis']) ? $_GET['diagnosis'] : '';
$doctor = isset($_GET['doctor']) ? $_GET['doctor'] : '';

$med = isset($_GET['med']) ? $_GET['med'] : '';
	$tsql = "SELECT *
        FROM tbl_user where user_name='$Patient'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
?> 
<!-- start id-form -->                                        


<form action="process.php?action=add" method="post" enctype="multipart/form-data" name="frmAdd" id="frmAdd">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

	<input name="userName" type="hidden" value="<?php echo $Patient;?>">
	<input name="User" type="hidden" value="<?php echo $session;?>">
    <input name="txtDate" type="hidden" value="<?php echo date('Y-m-d');?>">
    <input name="med" type="hidden" value="<?php echo $med;?>">
    
    
    <input name="patient" type="hidden" value="<?php echo $Patient;?>">
    <input name="date" type="hidden" value="<?php echo $date;?>">
    <input name="remarks" type="hidden" value="<?php echo $remarks;?>">
    <input name="doctor" type="hidden" value="<?php echo $doctor;?>">
  <tr> 
   <th >Patient: </th>
   <td class="content"><?php echo $tfname.' '.$tlname;?></td>
			<td></td>
  </tr>
  
   <tr> 
   <th>Date/Time: <td><?php echo date('Y-m-d/ g:i A');?></th>
   <tr> 
   <th colspan="3" >Complaint: </th>
   <tr>
   <td class="content" colspan="3"><textarea name="diagnosis" class="form-textarea" cols="40" rows="5"><?php echo $diagnosis;?> </textarea></td>	
  </tr> 
   <tr> 
   <th colspan="3">Medication: </th>
  	<tr>
    <td colspan="3">
    <?php require_once 'list.php';?>
    	<tr>
    <td colspan="3">
  <input name="btnAddUser" type="submit" id="btnAddUser" value="Add User" onClick="checkAdd();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>
</table>