<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$day= $_GET['day'];
$time= $_GET['time'];
$doctor= $_GET['doctor'];
$wd= $_GET['wd'];

	$tsql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
?> 
<!-- start id-form -->                                        


<form action="process.php?action=add" method="post" enctype="multipart/form-data" name="frmAdd" id="frmAdd">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

	<input name="userName" type="hidden" value="<?php echo $session;?>">
	<input name="txtDate" type="hidden" value="<?php echo $day;?>">
	<input name="txtTime" type="hidden" value="<?php echo $time;?>">
	<input name="wd" type="hidden" value="<?php echo $wd;?>">
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
   <td class="content"> <b><?php echo $day;?></b></td>
			<td></td>
  </tr>  
  
     <tr> 
   <th >Time: </th>
   <td class="content"> <?php echo $time;?></td>
			<td></td>
  </tr>  
  
   <tr> 
   <th >Teacher: </th>
   <td class="content">
   <?php

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

?>
</select>


			<td></td>
  </tr>
  
   <tr> 
   <th colspan="3" >Complaints: </th>
   <tr>
   
   
   <td class="content" colspan="3"><textarea name="diagnosis" cols="40" rows="5"> </textarea></td>
			
  </tr>   <tr> 
   <th colspan="3" >Doctor: </th>
   <tr>
   
   
   <td class="content" colspan="3"><?php echo $doctor;?></td>
   <input type="hidden" name="doctor" value="<?php echo $doctor;?>">
			
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