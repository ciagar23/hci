<?

		$day = date('Y-m-d');
		$month = date('Y-m');
		
		$patienttotal = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient"));
		$patientmonth = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date like '$month%'"));
		$patientday = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day'"));


?>
<br>
<br>
<table width="100%" >
<tr>
<td>

<!-- Start WOWSlider.com -->
<iframe src="<?php echo WEB_ROOT;?>/slide/index.html" style="width:452px;height:277px;max-width:100%;overflow:hidden;border:none;padding:0;margin:0 auto;display:block;" marginheight="0" marginwidth="0"></iframe>
<!-- End WOWSlider.com -->

<td align="center">

<h1><b><font color="#0033FF">Statistics</font></b></h1><br>

<table>
<tr>
<td align="center"><h3>Total Patient <br>today</h3>
<td align="center"><h3>Total Patient <br>this month</h3>
<td align="center"><h3>Total Patient <br>this Semister</h3>
<tr>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientday;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientmonth;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patienttotal;?></font>
</table>
<br><br>





<tr>
<td align="center" bgcolor="#FF0000" height="50"><font color="#FFFFFF" size="+2">Medicine Below Critical Limit:
<td align="center" bgcolor="#009933" height="50"><font color="#FFFFFF" size="+2">What you have done today:
<tr>
<td width="50%" align="center" valign="top">
<?php 

$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT m_id, m_name, m_for, m_desc, m_qnty, m_limit FROM tbl_medicine where m_qnty <= m_limit
		ORDER BY m_name";
$result = dbQuery($sql);

while($row = dbFetchAssoc($result)) {
	extract($row);

	
	$i += 1;
?> 
   <div id="message-red">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td class="red-left" width="40%"><?php echo $m_name; ?> 
<td class="red-left"> :
   <?php echo $m_qnty; ?>
   </a></td>
<td class="red-right"><a href='<?php echo WEB_ROOT;?>admin/medicine' class="close-red"><img src="<?php echo WEB_ROOT;?>admin/include/images/table/icon_close_red.gif"   alt="" /></a></td>
</tr>
</table>
</div>

<?php
} // end while

?>
<td valign="top">
<?php 



$rowsPerPage = 10;

$sql2 = "SELECT h_id, h_user, h_date, h_history from tbl_history where h_user = '$session' and h_date  like '%$day%'";
$result2     = dbQuery(getPagingQuery($sql2, $rowsPerPage));
$pagingLink = getPagingLink($sql2, $rowsPerPage);


while($row2 = dbFetchAssoc($result2)) {
	extract($row2);

	
	$i += 1;
?> 
   <div id="message-red">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
<td class="green-left"> You 
   <?php echo $h_history; ?>
   </a></td>
<td class="green-right"><a href='<?php echo WEB_ROOT;?>admin/myhistory' class="close-green"><img src="<?php echo WEB_ROOT;?>admin/include/images/table/icon_close_green.gif"   alt="" /></a></td>
</tr>

</div>

<?php
} // end while

?>
  <tr> 
   <td colspan="5" align="center">
   <?php 
echo $pagingLink;
   ?></td>
  </tr>
  
  </table>
</table>



