<?php
if (!defined('WEB_ROOT')) {
	exit;
}




$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_phoneNumber
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">

    <tr> 
   <td height="50">User Name</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $session; ?>">
	<input name="txtPassword2" type="hidden" value='1234' >
    
<input type="hidden" name="User" value="<?php echo $session;?>" />
  
  <tr> 
   <td height="50"> Name: </td>
   <td class="content"> <?php echo $user_fname.' '.$user_lname;?> </td>
  </tr>
   
  <tr> 
   <td class="label">Image</td>
   <td class="content"> <input name="fleImage" type="file" id="fleImage" class="box"> 
    </td>
 
 <tr> 
   <td width="150" height="50">Phone Number</td>
   <td class="content">
    <input name="txtUserPhoneNumber" type="text" id="txtUserPhoneNumber" value="<?php echo $user_phoneNumber; ?>"></td>
  </tr>
  
  <tr> 
   <td width="150" height="50">Password</td>
   <td class="content"> <input name="txtPassword" type="password" id="txtPassword" value="" size="20" maxlength="20"></td>
      
   
  <tr> 
   <td width="150" height="50">Retype Password</td>
   <td class="content"> <input name="txtPassword2" type="password" id="txtPassword" value="" size="20" maxlength="20"></td>
      

 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="submit" id="btnModifyUser" value="Modify Profile" onClick="checkAddUserForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='?view=profile&username=<?php echo $session;?>';">  
 </p>
</form>