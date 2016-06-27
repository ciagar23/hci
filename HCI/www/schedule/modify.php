<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
$userId = (isset($_GET['userId']) && $_GET['userId'] != '') ? $_GET['userId'] : '';

$sql = "SELECT s_id, s_teacher, s_room, s_subject , s_class , s_from , s_to, s_m, s_t, s_w, s_th, s_f, s_s FROM tbl_schedule
		WHERE s_id =$userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processSchedule.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddSchedule">
  <input name="txtUserId" type="hidden" id="txtUserId" value="<?php echo $s_id; ?>">

 <table border="0" cellpadding="5" cellspacing="1" class="entryTable" align="center">
  <tr> 
   <th align="left" >Class Name:</td>
   <td class="content"> <input name="txtCName" type="text" class="box" size="50" value="<?php echo $s_class;?>" maxlength="50"></td>
  </tr>
  
    <tr> 
   <th align="left">Subject:</td>
   <td class="content"> <input name="txtSubject" type="text" class="box" size="50" value="<?php echo $s_subject;?>" maxlength="50"></td>
  </tr>
  
    <tr> 
   <th align="left">Room:</td>
   <td class="content"> <input name="txtRoom" type="text" class="box" size="50" value="<?php echo $s_room;?>" maxlength="50"></td>
  </tr>
    <tr> 
   <th colspan="2" align="left">Start Time: 
      <select name="txtFrom" class="box">
     <option value=""> - Select- </option>
     <option>7:30 AM</option>
     <option>8:00 AM</option>
     <option>8:30 AM</option>
     <option>9:00 AM</option>
     <option>9:30 AM</option>
     <option>10:00 AM</option>
     <option>10:30 AM</option>
     <option>11:00 AM</option>
     <option>11:30 AM</option>
     <option>12:00 AM</option>
     <option>12:30 AM</option>
     <option>1:00 PM</option>
     <option>1:30 PM</option>
     <option>2:00 PM</option>
     <option>2:30 PM</option>
     <option>3:00 PM</option>
     <option>3:30 PM</option>
     <option>4:00 PM</option>
     <option>4:30 PM</option>
     <option>5:00 PM</option>
     <option>5:30 PM</option>
     <option>6:00 PM</option>
     <option>6:30 PM</option>
     <option>7:00 PM</option>
     <option>7:30 PM</option>
     <option>8:00 PM</option>
     <option>8:30 PM</option>
     <option>9:00 PM</option>
     <option>9:30 PM</option>
   </select>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
End Time:
      <select name="txtTo" class="box">
     <option value=""> - Select- </option>
     <option>7:30 AM</option>
     <option>8:00 AM</option>
     <option>8:30 AM</option>
     <option>9:00 AM</option>
     <option>9:30 AM</option>
     <option>10:00 AM</option>
     <option>10:30 AM</option>
     <option>11:00 AM</option>
     <option>11:30 AM</option>
     <option>12:00 AM</option>
     <option>12:30 AM</option>
     <option>1:00 PM</option>
     <option>1:30 PM</option>
     <option>2:00 PM</option>
     <option>2:30 PM</option>
     <option>3:00 PM</option>
     <option>3:30 PM</option>
     <option>4:00 PM</option>
     <option>4:30 PM</option>
     <option>5:00 PM</option>
     <option>5:30 PM</option>
     <option>6:00 PM</option>
     <option>6:30 PM</option>
     <option>7:00 PM</option>
     <option>7:30 PM</option>
     <option>8:00 PM</option>
     <option>8:30 PM</option>
     <option>9:00 PM</option>
     <option>9:30 PM</option>
   </select>
   
   </td>
  </tr>
  
  <tr>
  <td colspan="2">
  <input type="checkbox" value="M" name="txtM" /> Monday
  <input type="checkbox" value="T" name="txtT" /> Tuesday
  <input type="checkbox" value="W" name="txtW" /> Wednesday <br>
  <input type="checkbox" value="Th" name="txtTH" /> Thursday
  <input type="checkbox" value="F" name="txtF" /> Friday
  <input type="checkbox" value="S" name="txtS" /> Saturday
  
  
  </td>
  
  
  
 </table>

 <p align="center"> 
  <input name="btnModifySchedule" type="button" value="Modify" onClick="checkAddScheduleForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>