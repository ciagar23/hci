<?php

$sqls = "SELECT user_id, user_name, user_fname, user_lname
        FROM tbl_user where user_position='FACULTY'";
$results = dbQuery($sqls);

?> 
<select>

<?php
while($rows = dbFetchAssoc($results)) {
	extract($rows);

	$i += 1;
?>
   <option value="<?php echo $user_name;?>"><?php echo $user_fname.' '.$user_lname; ?></option>

<?php
} // end while

?>
</select>
