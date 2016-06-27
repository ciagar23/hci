<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT user_fname, user_lname, user_name, user_position, user_address, user_gender, user_birth, user_birth, user_bdegree, user_gdegree, user_school, user_seminar
        FROM tbl_user
        WHERE user_name = '$session'";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
    <tr> 
   <th align="left">User Name:</td>
   <td class="content"> <?php echo $user_name; ?></td>
  </tr>
  
    <input name="txtUserName" type="hidden" id="txtUserName" value="<?php echo $userId; ?>">
  
  <tr> 
   <th align="left">Name:</td>
   <td class="content"> 
    <?php echo $user_fname; ?> <?php echo $user_lname; ?>
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $userId; ?>"></td>
  </tr>
<tr>
   <th align="left">Position:</td>
   <td class="content">
  <?php echo $position;?>
   
  </td>
 


 </table>
 <p align="center"> 
