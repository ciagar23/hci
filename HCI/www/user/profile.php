<?php
if (!defined('WEB_ROOT')) {
	exit;
}




$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_phoneNumber, user_image, user_course, user_level, user_section
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">

<tr>
<td colspan="2"><img src="<?php echo WEB_ROOT;?>images/<?php echo $user_image;?>">

    <tr> 
   <td height="50">User Name</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
	<input name="txtPassword2" type="hidden" value='1234' >
    
<input type="hidden" name="User" value="<?php echo $session;?>" />
  
  <tr> 
   <td height="50"> Name: </td>
   <td class="content"> <?php echo $user_fname.' '.$user_lname;?> </td>
  </tr>

 
 <tr> 
   <td width="150" height="50">Course</td>
   <td class="content"><?php echo $user_course.$user_level.'-'.$user_section; ?></td>
  </tr>
 
 <tr> 
   <td width="150" height="50">Phone Number</td>
   <td class="content"><?php echo $user_phoneNumber; ?></td>
  </tr>
  
</form>
 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="button" id="btnModifyUser" value="Modify Profile" 
  onClick="window.location.href='index.php?view=modify';"> 
 </p>
