<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<p class="errorMessage">&nbsp;</p>
<form action="processMedicine.php?action=add" method="post" enctype="multipart/form-data" name="frmAddMedicine" id="frmAddMedicine">
 <input name="txtUser" type="hidden" class="box" id="txtUser" value="<?php echo $session;?>" size="50" maxlength="50">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <th >Medicine Name:</th>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="50" maxlength="50"></td>
   <td><br><br></td>
  </tr>
  
  <tr> 
   <th align="left" >For:</th>
   <td class="content"> <input name="txtFor" type="text" class="box" id="txtFor" size="50" maxlength="50"></td>
     <td><br><br></td>
  </tr>
    <tr> 
   <th align="left"  valign="top">Description:</th>
   <td class="content"> <textarea name="mtxDescription" cols="100" rows="10"  class="form-textarea" id="mtxDescription"></textarea>
      <td><br><br></td>
   </td>
  </tr>   <tr> 
   <th align="left"  valign="top">Expiry Date:</th>
   <td class="content">		<select  class="box" name="month">
			<option value="">- Select Month -</option>
			<option>January</option>
			<option>February</option>
			<option>March</option>
			<option>April</option>
			<option>May</option>
			<option>June</option>
			<option>July</option>
			<option>August</option>
			<option>September</option>
			<option>October</option>
			<option>November</option>
			<option>December</option>
		</select>	<select  class="box" name="year">
			<option value="">- Select Year -</option>
			<option>2014</option>
			<option>2015</option>
			<option>2016</option>
			<option>2017</option>
			<option>2018</option>
			<option>2019</option>
			<option>2020</option>
		</select>
      <td><br><br></td>
   </td>
  </tr>
  <tr> 
  <tr> 
   <th align="left"  >Quantity:</th>
   <td class="content"> <input name="txtQnty" type="text" id="txtQnty" size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);">
</td>
   <td><br><br></td>
  <tr> 
   <th align="left"  >Critical Limit:</th>
   <td class="content"> <input name="limit" type="text" size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);">
</td>
   <td><br><br></td>
  </tr>

      
 
 </table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddMedicine" type="button" id="btnAddMedicine" value="Add Medicine" onClick="checkAddMedicineForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>