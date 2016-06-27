<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['MedicineId']) && (int)$_GET['MedicineId'] > 0) {
	$medicineId = (int)$_GET['MedicineId'];
} else {
	header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT m_id, m_name, m_for, m_desc, m_qnty,m_limit
        FROM tbl_medicine
        WHERE m_id = $medicineId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processMedicine.php?action=modify" method="post" enctype="multipart/form-data" name="frmAddMedicine" id="frmAddMedicine">

<input name="txtId" type="hidden" class="box" id="txtId" value="<?php echo $m_id;?>" size="50" maxlength="50"><
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <th >Medicine Name:</th>
   <td class="content"> <input name="txtName" type="text"  value="<?php echo $m_name;?>" class="box" id="txtName" size="50" maxlength="50"></td>
   <td><br><br></td>
  </tr>
  
  <tr> 
   <th align="left" >For:</th>
   <td class="content"> <input name="txtFor" type="text"  value="<?php echo $m_for;?>" class="box" id="txtFor" size="50" maxlength="50"></td>
     <td><br><br></td>
  </tr>
    <tr> 
   <th align="left"  valign="top">Description:</th>
   <td class="content"> <textarea name="mtxDescription" cols="100" rows="10"  class="form-textarea" id="mtxDescription"><?php echo $m_desc;?></textarea>
      <td><br><br></td>
   </td>
  </tr>
  <tr> <tr> 
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
  <tr> 
   <th align="left"  >Quantity:</th>
   <td class="content"> <input name="txtQnty" type="text" id="txtQnty"   value="<?php echo $m_qnty;?>" size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);">
</td><tr> 
   <th align="left"  >Critical Limit:</th>
   <td class="content"> <input name="limit" type="text" id="txtQnty"   value="<?php echo $m_limit;?>" size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);">
</td>
   <td><br><br></td>
  </tr>

      
 
 </table>


 <p align="center"> 
  <input name="btnModifyUser" type="submit" id="btnModifyUser" value="Modify User" onClick="checkAddMedicineForm();" class="form-modify">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </p>
</form>