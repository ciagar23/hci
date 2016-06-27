<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$day= $_GET['day'];
$wd= $_GET['wd'];
$time= $_GET['time'];
$doctor= $_GET['doctor'];

?> 
<!-- start id-form -->                                        


<h1><b><font color="#FF0000">CLINIC RESERVATION FOR STUDENTS WHO WILL GO ON A TRIP</font></b></h1><br>
<form action="process.php?action=addtour" method="post" enctype="multipart/form-data" name="frmAdd" id="frmAdd">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

	<input name="userName" type="hidden" value="<?php echo $session;?>">
	<input name="wd" type="hidden" value="<?php echo $wd;?>">
	<input name="txtDate" type="hidden" value="<?php echo $day;?>">
	<input name="txtTime" type="hidden" value="<?php echo $time;?>">
  <tr> 
   <th >Course: </th>
   <td class="content">
   <select name='course'>
   <option>- Course -</option>
   <option>BSIT</option>
   <option>BSA</option>
   <option>BSBA</option>
   <option>BSN</option>
   <option>BSMA</option>
   
   </select>
   
   
   <select name='level'>
   <option value=''>- Level -</option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
   <option>5</option>
   
   </select>
   
   
   <select name='section'>
   <option value=''>- Section -</option>
   <option>A</option>
   <option>B</option>
   <option>C</option>
   <option>D</option>
   <option>E</option>
   
   </select>
   
   </td>
			<td></td>
  </tr>
  
   <tr> 
   <th >Adviser: </th>
   <td class="content">
   <?php

$sqls = "SELECT user_id, user_name, user_fname, user_lname
        FROM tbl_user where user_position='FACULTY'";
$results = dbQuery($sqls);

?> 
<select name="teacher">
<option value=''>- Select - </option>
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
   <th colspan="3" >Location: </th>
   <tr>
   
   
   <td class="content" colspan="3"><textarea name="location" cols="40" rows="5"> </textarea></td>
			
  </tr>  

   <tr> 
   <th colspan="3" >Purpose: </th>
   <tr>
   
   
   <td class="content" colspan="3"><textarea name="purpose" cols="40" rows="5"> </textarea></td>
			
  </tr>  
  <tr> 
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
  <input name="btnAddUser" type="submit" id="btnAddUser" value="Add User" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>