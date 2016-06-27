<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
	$userId = (int)$_GET['userId'];
} else {
	header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_phoneNumber
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr> 
   <td width="50%" height="50">User Name</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
	<input name="txtPassword2" type="hidden" value='1234' >
  
  <tr> 
   <td width="150" height="50">First Name</td>
   <td class="content"> 
    <input name="txtFName" type="text" id="txtFName" value="<?php echo $user_fname; ?>" class="box">
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>">
	
	</td>
  </tr>
  
  <tr> 
   <td width="150" height="50">Last Name</td>
   <td class="content">
    <input name="txtLName" type="text" class="box" id="txtLName" value="<?php echo $user_lname; ?>"></td>
  </tr>
 
 <tr> 
   <td width="150" height="50">Phone Number</td>
   <td class="content">
    <input name="txtUserPhoneNumber" type="text" class="box" id="txtUserPhoneNumber" value="<?php echo $user_phoneNumber; ?>"></td>
  </tr>
  
  <tr> 
   <td width="150" height="50">Password</td>
   <td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
      
  <tr> 
   <td height="50" width="150">Designation</td>
   <td class="content">
    
   <select name="txtPosition" class="box">
     <option value=""> - Select Position - </option>
     <option>ADMIN</option>
     <option>TEACHER</option>
	 <option>STUDENT</option>
     <option>ENCODER</option>
  
   </select>
   
  </td>
  </tr>

 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="button" id="btnModifyUser" value="Modify User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>