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

$sql = "SELECT m_id, m_name, m_for, m_desc, m_qnty
        FROM tbl_medicine
        WHERE m_id = $medicineId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processMedicine.php?action=updatequantity" method="post" enctype="multipart/form-data" name="frmAddMedicine" id="frmAddMedicine">

<input name="txtId" type="hidden" class="box" id="txtId" value="<?php echo $m_id;?>" size="50" maxlength="50">
 <table border="0" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <th >Medicine Name:</th>
   <td class="content">   <?php echo $m_name;?></td>
   <td><br><br></td>
  </tr>
  
  <tr> 
   <th align="left" >For:</th>
   <td class="content">   <?php echo $m_for;?></td>
     <td><br><br></td>
  </tr>
    <tr> 
   <th align="left"  valign="top">Description:</th>
   <td class="content">   <?php echo $m_desc;?>
      <td><br><br></td>
   </td>
  </tr>
  <tr> 
  <tr> 
   <th align="left"  >Quantity:</th>
   <td class="content">   <?php echo $m_qnty;?>
   <input name="txtQnty" type="hidden" id="txtQnty"   value="<?php echo $m_qnty;?>">
</td>



   <td><br><br></td>
  </tr>
  
  
    <tr> 
   <th align="left"  > New Quantity:</th>
   <td class="content"> <input name="txtNQnty" type="text" id="txtNQnty"   size="10" maxlength="10" class="box" onKeyUp="checkNumber(this);">
</td>



   <td><br><br></td>
  </tr>

      
 
 </table>


 <p align="center"> 
  <input name="btnModifyUser" type="submit" id="btnModifyUser" value="Modify User" class="form-modify">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </p>
</form>