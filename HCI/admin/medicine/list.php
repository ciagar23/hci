<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT m_id, m_name, m_for, m_desc, m_qnty, m_expire FROM tbl_medicine where m_name like '%$search%'
		ORDER BY m_name";
$result = dbQuery($sql);

?> 

                                
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">


 <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
    
  
  <tr> 
   <td colspan="5" align="left">
   <div class="content"><b>SELECT:</b> <a href='index.php?view=add'>Add Medicine</a> || 
   <a href='../medicineforstudent'>Provide Medicine to Student</a> </div>
   
  </td>
  </tr>
  <tr align="center" id="listTableHeader"> 
   <th class="table-header-repeat line-left"><a href="">Med Name:</a></td>
   <th class="table-header-repeat line-left"><a href="">For:</a></td>
   <th class="table-header-repeat line-left"><a href="">Quantity:</a></td>
   <th class="table-header-repeat line-left"><a href="">Expiry Date:</a></td>
   <th class="table-header-repeat line-left" width="120"><a href="">Option:</a></td>
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
   <td><?php echo $m_name; ?> </td>
   <td><?php echo $m_for; ?> </td>
   <td><?php echo $m_qnty; ?> </td>
   <td><?php echo $m_expire; ?> </td>
   
   <td width="120"><a href="javascript:changePassword(<?php echo $m_id; ?>);" title="Edit" class="icon-5 info-tooltip"></a>
   <a href="javascript:deleteMedicine(<?php echo $m_id; ?>);" title="Delete" class="icon-2 info-tooltip"></a>
   <a href="index.php?view=updatequantity&MedicineId=<?php echo $m_id; ?>" title="Update Medicine Quantity" class="icon-1 info-tooltip"></a></td>
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