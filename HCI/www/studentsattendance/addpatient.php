<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$Patient =$_SESSION['patient'];

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
  <tr> 
   <th >First Name: </th>
   <td class="content"> <input name="txtFName" type="text" value="<?php echo $tfname;?>" size="30" maxlength="50"></td>
			<td></td>
  </tr>
  
  <tr> 
   <th >Last Name: </th>
   <td class="content"> <input name="txtLName" type="text" value="<?php echo $tlname;?>" size="30" maxlength="50"></td>
			<td></td>
  </tr>
  
   <tr> 
   <th >Date Today: </th>
   <td class="content"> <input name="txtDate" type="text" value="<?php echo date('Y-m-d');?>" size="30" maxlength="50"></td>
			<td></td>
  </tr>  
  
   <tr> 
   <th >Teacher: </th>
   <td class="content">   <?php

$sqls = "SELECT user_id, user_name, user_fname, user_lname
        FROM tbl_user where user_position='FACULTY'";
$results = dbQuery($sqls);

?> 
<select name="txtTeacher">

<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option value="<?php echo $user_name;?>"><?php echo $user_fname.' '.$user_lname; ?></option>

<?php
} // end while

?></td>
			<td></td>
  </tr>
  
   <tr> 
   <th colspan="3" >Complaint: </th>
   <tr>
   
   
   <td class="content" colspan="3"><textarea name="diagnosis" cols="40" rows="5"> </textarea></td>
			
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


<tr>
			<td></td>
  </tr>
  
   <tr> 
   <th colspan="3" >Remarks: </th>
   <tr>
   
  
   <td class="content" colspan="3"><textarea name="remarks" cols="40" rows="5"> </textarea></td>
  
    
   <tr> 
   <th >Doctor: </th>
   <td class="content"> <select name="doctor"><option>Dr.Gilbert Alojada</option>
   <option>Dr. Rodolfo Escalona jr.</option>
   <option>Dr. Janeen Ruth Aricaya</option>
   </select>
   
   </td>
			<td></td>
  </tr>
 
  
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAdd();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>