<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$id= $_GET['id'];


$sql = "SELECT p_id, p_username, p_date,p_time, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher
        FROM tbl_patient where  p_id=$id";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));

		$tsql = "SELECT *
        FROM tbl_user where user_name='$p_username'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
		
		$tsql2 = "SELECT *
        FROM tbl_user where user_name='$p_teacher'";
		$tresult2 = mysql_query($tsql2);
		$tshow2 = mysql_fetch_array($tresult2);	
		$tfname2= $tshow2['user_fname'];
		$tlname2= $tshow2['user_lname'];
?> 
<!-- start id-form -->                                        


<form action="process.php?action=updatepatient" method="post" enctype="multipart/form-data" name="frmAdd" id="frmAdd">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

	<input name="id" type="hidden" value="<?php echo $p_id;?>">
	<input name="day" type="hidden" value="<?php echo $p_date;?>">
	<input name="time" type="hidden" value="<?php echo $p_time;?>">
  <tr> 
   <th >First Name: </th>
   <td class="content"> <b><?php echo $tfname;?></b></td>
			<td></td>
  </tr>
  
  <tr> 
   <th >Last Name: </th>
   <td class="content"> <b><?php echo $tlname;?></b></td>
			<td></td>
  </tr>
  
   <tr> 
   <th >Date Today: </th>
   <td class="content"> <b><?php echo $p_date;?></b></td>
			<td></td>
  </tr>  
  
     <tr> 
   <th >Time: </th>
   <td class="content"> <?php echo $p_time;?></td>
			<td></td>
  </tr>  
  
   <tr> 
   <th >Teacher: </th>
   <td class="content"><b><?php echo $tfname2.' '.$tlname2;?>


			<td></td>
  </tr>
  
   <tr> 
   <th colspan="3" >Complaint: </th>
   <tr>
   
   
   <td class="content" colspan="3"><?php echo $p_diagnosis;?></td>
			
  </tr>
    
   <tr> 
   <th >Medication: </th>
   <td class="content"> <?php

$sqls = "SELECT m_name
        FROM tbl_medicine";
$results = dbQuery($sqls);

?> 
<select name="treatment">

<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option><?php echo $m_name; ?></option>

<?php
} // end while

?>
</td>
<tr> 
   <th >Quantity: </th>
   <td class="content"> <input name="txtquantity" type="text" onKeyUp="checkNumber(this);" size="5"></td>
			<td></td>
  </tr>
  </tr>
  
   <tr> 
   <th colspan="3" >Remarks: </th>
   <tr>
   
  
   <td class="content" colspan="3"><textarea name="remarks" cols="40" rows="5"> </textarea></td>
  
    
   <tr> 
   <th >Doctor: </th>
   <td class="content"><?php echo $p_doctor;?></td>
			<td></td>
  </tr>
 
   
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddUser" type="submit" id="btnAddUser" value="Add User" onClick="checkAdd();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>