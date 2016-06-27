<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT s_id, s_teacher, s_room, s_subject , s_class , s_from , s_to, s_m, s_t, s_w, s_th, s_f, s_s FROM tbl_schedule
		WHERE s_teacher ='$session'
		ORDER BY s_from";
$result = dbQuery($sql);

?> 
                                
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">Time</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Day</a></th>
					<th class="table-header-repeat line-left"><a href="">Room</a></th>
					<th class="table-header-repeat line-left"><a href="">Class</a></th>
					<th class="table-header-repeat line-left"><a href="">Option</a></th>
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
   <td><?php echo $s_from; ?> - <br><?php echo $s_to; ?></td>
   <td><?php echo $s_m; ?> <?php echo $s_t; ?> <?php echo $s_w; ?> <?php echo $s_th; ?> <?php echo $s_f; ?> <?php echo $s_s; ?></td>
   <td><?php echo $s_room; ?></td>
   <td><?php echo $s_class; ?> <br>(<?php echo $s_subject; ?>)</td>
   
   <td width="120" align="center">
     
					<a href="javascript:modifySchedule(<?php echo $s_id; ?>);" title="Edit" class="icon-5 info-tooltip"></a>
					<a href="javascript:deleteSchedule(<?php echo $s_id; ?>);" title="Edit" class="icon-2 info-tooltip"></a>
                    </td>
<?php
} // end while

?>
  <tr> 
   <td colspan="6">&nbsp;</td>
  </tr>

 </table>
 
