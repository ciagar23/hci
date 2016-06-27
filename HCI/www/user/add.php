<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
<input type="hidden" name="User" value="<?php echo $session;?>" />

  <tr> 
   <th >First Name: </th>
   <td class="content"> <input name="txtFName" type="text" class="box" id="txtFName" size="50" maxlength="50"></td>
			<td></td>
  </tr>
  
  <tr> 
   <th >Last Name: </th>
   <td class="content"> <input name="txtLName" type="text" class="box" id="txtLName" size="50" maxlength="50"></td>
			<td></td>
  </tr>
  
  <tr> 
   <th >ID Number: </th>
   <td class="content"> <input name="txtUserName" type="text" class="box" id="txtUserName" size="20" maxlength="20"></td>
			<td></td>
  </tr>
  
  <tr> 
   <th >Phone Number: </th>
   <td class="content"> <input name="txtUserPhoneNumber" onKeyUp="checkNumber(this);" type="text" class="box" id="txtUserPhoneNumber" size="20" maxlength="20"></td>
			<td></td>
  </tr>
  
  
  <tr> 
   <th >Password: </th>
   <td class="content"> <input name="txtPassword" type="password" class="box"  value="" size="20" maxlength="20"></td>  </tr>
  <tr> 
   <th > Retype Password: </th>
   <td class="content"> <input name="txtPassword2" type="password" class="box"  value="" size="20" maxlength="20"></td>
			<td></td>
      
  <tr> 
   <th >Designation: </th>
   <td class="content">
   
   <select name="txtPosition" class="box">
     <option value=""> - Select Position - </option>
     <option>ADMIN</option>
     <option>FACULTY</option>
     <option>STUDENT</option>
     <option>NON-TEACHING</option>
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
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>