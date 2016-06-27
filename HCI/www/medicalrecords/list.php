<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT user_id, user_name, user_regdate, user_last_login, user_fname, user_lname, user_position
        FROM tbl_user";
$result = dbQuery($sql);

?> 
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
           
                                
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">

    				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left"><a href="">User Name</a>	</th>
					<th class="table-header-repeat line-left"><a href="">Position</a></th>
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
   <td><?php echo $user_fname; ?> <?php echo $user_lname; ?></b>
   <td><?php echo $user_position; ?></td>
   <td width="120">
   
					<a href="javascript:changePassword(<?php echo $user_id; ?>);" title="Edit" class="icon-5 info-tooltip"></a>
					<a href="javascript:deleteUser(<?php echo $user_id; ?>);" title="Delete" class="icon-2 info-tooltip"></a>
   
   </td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>

 </table>
