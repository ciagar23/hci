<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT d_name, d_date, d_reason from tbl_docabsence";
$result = dbQuery($sql);

?> 

                                
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">


 <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
      <tr> 
   <td colspan="5" align="right">
   <div class="content"><input name="btnAddMedicine" type="button"  value="Add Medicine" class="form-add" onClick="addMedicine()"></div></td>
  </tr>
  
  <tr align="center" id="listTableHeader"> 
   <th class="table-header-repeat line-left"><a href="">Doctor's Name:</a></td>
   <th class="table-header-repeat line-left"><a href="">Date of Absence:</a></td>
   <th class="table-header-repeat line-left"><a href="">Reason:</a></td>
  </tr>
  
  
  
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'alternate-row';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $d_name; ?> </td>
   <td><?php echo $d_date; ?> </td>
   <td><?php echo $d_reason; ?> </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>

 </table>
                                </div>
                            </section>
                        </div>
                        <!--/ END Basic Table -->
                    </div>
                    <!--/ END Row -->

					<!-- Table -->
					<div class="table">

 <p>&nbsp;</p>
</form>
</div>