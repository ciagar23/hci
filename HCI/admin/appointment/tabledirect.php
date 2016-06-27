<?

		$day = $_GET['date'];
		$month = date('Y-m');
		
		$patienttotal = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient"));
		$patientmonth = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date like '$month%'"));
		$patientday = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day'"));


	

?>

<div align="center">
<h1><b><font color="#0033FF">APPOINTMENT</font></b></h1><br>

<a href="index.php?date=<?= date('Y-m-d', strtotime('-1 day', strtotime($day))) ?>" class="prev_day" title="Previous Day" >Previous Day</a> <?php echo $day;?>
<a href="index.php?date=<?= date('Y-m-d', strtotime('+1 day', strtotime($day))) ?>" class="next_day" title="Next Day" >Next Day</a>

<table>
<tr>
<td align="center"><h3>7:30-8:30 AM
<td align="center"><h3>8:30-9:30 AM
<td align="center"><h3>9:30-10:30 AM
<tr>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientday;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientmonth;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patienttotal;?></font>
<tr>
<td align="center"><h3>10:30-11:30 AM
<td align="center"><h3>11:30-12:30 PM
<td align="center"><h3>1:30-2:30 PM
<tr>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientday;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientmonth;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patienttotal;?></font>
<tr>
<td align="center"><h3>2:30-3:30 PM
<td align="center"><h3>3:30-4:30 PM
<td align="center"><h3>4:30-5:30 PM
<tr>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientday;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patientmonth;?></font>
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $patienttotal;?></font>
</table>

</div>
