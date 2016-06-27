<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT m_id, m_name, m_for, m_desc, m_qnty, m_expire FROM tbl_medicine where m_name like '%$search%'
		ORDER BY m_name";
$result = dbQuery($sql);
$count=mysql_num_rows($result);

?> 

<input type="hidden" name="counter" value="<?php echo $count;?>"  />
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1"  id="product-table">
    
  
  <tr> 
   <td colspan="5" align="left">
   <div class="content">Please Check Medicine which will be given to <?php echo $tfname.' '.$tlname;?> </div>
   
  </td>
  </tr>
  <tr> 
   <th align="center">Med Name:</td>
   <th align="center">Quantity:</td>
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
  <td><input name="checkbox[]" type="checkbox"  value="<?php echo $m_name; ?>">&nbsp;&nbsp;&nbsp;
  <?php echo $m_name; ?> </td>
   <td><input type="text" name="qnty[]" class="box" /> </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
 </table>

</div>