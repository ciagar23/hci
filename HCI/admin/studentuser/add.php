<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$fname = isset($_GET['fname']) ? $_GET['fname'] : '';
$lname = isset($_GET['lname']) ? $_GET['lname'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';
$pw = isset($_GET['pw']) ? $_GET['pw'] : '';
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser">

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">


  <tr> 
   <th >First Name: </th>
   <td class='content'> <input name="txtFName" type="text" value="<?PHP echo $fname;?>" size="50" maxlength="50"></td>
  </tr>
  
  <tr> 
   <th >Last Name: </th>
   <td class='content'> <input name="txtLName" type="text" value="<?PHP echo $lname;?>" size="50" maxlength="50"></td>
  </tr>
  
   <tr> 
   <th >Course: </th>
   <td>  <select name="Major">
     <option value=""> - Major - </option>
     <option>BSIT</option>
     <option>BSA</option>
     <option>BSBA</option>
     <option>BSN</option>
     <option>BSMA</option>
   </select>
     <select name="Level">
     <option value=""> - Level - </option>
     <option>1</option>
     <option>2</option>
     <option>3</option>
     <option>4</option>
     <option>5</option>
   </select>
     <select name="Section">
     <option value=""> - Section - </option>
     <option>A</option>
     <option>B</option>
     <option>C</option>
     <option>D</option>
     <option>E</option>
   </select>
   
   
   </td>
  </tr>
  
   
  <tr> 
   <th >cell: </th>
   <td> <input name="Phone" type="text" size="20" value='<?php echo $phone;?>' maxlength="20"></td>
  </tr>
  
    
  <tr> 
   <th >User Name: </th>
   <td><i> <?PHP echo $username;?></td>
  </tr>
  
  <tr> 
   <th >Password: </th>
   <td> ******** </td>
      
	   <input name="txtPosition" type="hidden" value='STUDENT'>
	    <input name="txtPassword" type="hidden"  value="<?PHP echo $pw;?>">
   <input name="txtUserName" type="hidden"  value="<?PHP echo $username;?>">

  </tr>
  
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center"> 
  <input name="btnAddUser" type="submit" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>