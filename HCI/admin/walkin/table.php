<?
		
		$day = 	(isset($_GET['date']) && $_GET['date'] != '') ? $_GET['date'] : date('Y-m-d');
		$weekday = 	(isset($_GET['wd']) && $_GET['wd'] != '') ? $_GET['wd'] : date('D');;
		$p9 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='9:00'"));
		$p10 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='10:00'"));
		$p11 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='11:00'"));
		$p1 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='1:00'"));
		$p2 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='2:00'"));
		$p4 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='4:00'"));
		$p5 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='5:00'"));
		$d9 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='9:30'"));
		$d4 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_time='4:30'"));
		
		$pt9 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='9:00'"));
		$pt10 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='10:00'"));
		$pt11 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='11:00'"));
		$pt1 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='1:00'"));
		$pt2 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='2:00'"));
		$pt4 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='4:00'"));
		$pt5 = mysql_num_rows(mysql_query("SELECT * FROM tbl_patient Where p_date='$day' and p_username='TOUR' and p_time='5:00'"));


?>

<div align="center">
<h1><b><font color="#FF0000">APPOINTMENT</font></b></h1><br>

<!--<a href="index.php?date=<?= date('Y-m-d', strtotime('-1 day', strtotime($day))) ?>&wd=<?= date('D', strtotime('-1 day', strtotime($weekday))) ?>" class="prev_day" title="Previous Day" >[PREVIOUS DAY]</a>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 --> 
 
 
 
 
 <a href="index.php?date=<?= date('Y-m-d');?>">[NOW]</a>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
<a href="index.php?date=<?= date('Y-m-d', strtotime('+1 day', strtotime($day))) ?>&wd=<?= date('D', strtotime('+1 day', strtotime($weekday))) ?>" class="next_day" title="Next Day" >[NEXT DAY]</a>
<br />
<br />
<br><h2><?php echo $day;?> (<?php echo $weekday;?>)</h2>
<table>

<?php

//if friday
 if ($weekday =='Sat' || $weekday =='Sun')
{

echo '<tr><td>No Reservation on Weekends';

}
else {?>


<?php

//if friday
 if ($weekday =='Fri')
{
}
else {?>


<tr>
<td><font size='+3' color=green>School Doctor:
<tr>
<td>&nbsp;
<td align="center"><br><h3>
<?php if ($p9 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=9:00&doctor=Dr.Gilbert Alojada">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>
<br>9:00-10:00 AM

<!--##################################################################################################-->

<td align="center"><br><h3>
<?php if ($p10 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=10:00&doctor=Dr.Gilbert Alojada">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?><br>10:00-11:00 AM


<!--##################################################################################################-->
<td align="center"><br><h3>

<?php if ($p11 < 5)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=11:00&doctor=Dr.Gilbert Alojada">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>11:00-11:30 AM


<!--##################################################################################################-->
<tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tr>
<td><img src="<?php echo WEB_ROOT;?>images/Gilbert Alojada.jpg" width="100"><br><font size="+1">Dr.Gilbert <br>Alojada
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt9 == 0) {?>
<font size="10"><?php echo $p9;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt10 == 0) {?>
<font size="10"><?php echo $p10;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt11 == 0) {?>
<font size="10"><?php echo $p11;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<tr>

<?php

//if friday
 }?>


<!--##################################################################################################-->
<td>&nbsp;
<td align="center"><br><h3>

<?php if ($p1 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=1:00&doctor=Dr. Janeen Ruth Aricaya">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>1:00-2:00 PM


<!--##################################################################################################-->

<td align="center"><br><h3>

<?php if ($p2 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=2:00&doctor=Dr. Janeen Ruth Aricaya">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>2:00-3:00 PM


<!--##################################################################################################-->

<td align="center"><br><h3>

&nbsp;
<tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tbody  ><tr>
<td><img src="<?php echo WEB_ROOT;?>images/Janeen Ruth Arica.jpg" width="100"><br><font size="+1">Dr. Janeen Ruth <br>Aricaya
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt1 == 0) {?>
<font size="10"><?php echo $p1;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt2 == 0) {?>
<font size="10"><?php echo $p2;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td>&nbsp;
<tr>


<!--##################################################################################################-->

<td>&nbsp;
<td align="center"><br><h3>

<?php if ($p4 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=4:00&doctor=Dr. Rodolfo Escalona jr.">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>4:00-5:00 PM



<!--##################################################################################################-->

<td align="center"><br><h3>

<?php if ($p5 < 15)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=5:00&doctor=Dr. Rodolfo Escalona jr.">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>5:00-6:00 PM



<!--##################################################################################################-->

<td align="center"><br><h3>

&nbsp;

<tbody  ><tbody  ><tbody  ><tbody  ><tr>
<td><img src="<?php echo WEB_ROOT;?>images/Rodolfo Escalona jr.jpg" width="100"><br><font size="+1">Dr. Rodolfo <br>Escalona jr.
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt4 == 0) {?>
<font size="10"><?php echo $p4;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<?php if ($pt5 == 0) {?>
<font size="10"><?php echo $p5;?></font>
<?php }else{?>
<font size="10" color='red'>Tour</font>
<?php }?>


<td>&nbsp;


<!--dentist-->


<tr>
<td><br><br><br><br><br>
<font size='+3' color=green>School Dentist:
<tr>


<!--##################################################################################################-->

<td>&nbsp;
<td align="center"><br><h3>

<?php if ($d9 < 3)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=9:30&doctor=Dr. Candy Lou Iligan.">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>9:00-11:00 AM




<!--##################################################################################################-->

<td align="center"><br><h3>

&nbsp;

<tbody  ><tbody  ><tbody  ><tbody  ><tr>
<td><img src="<?php echo WEB_ROOT;?>images/Candy Lou Iligan.jpg" width="100"><br><font size="+1">Dr. Candy Lou <br>Iligan.
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">
<font size="10"><?php echo $d9;?></font>
<td>&nbsp;

<tr>


<!--##################################################################################################-->

<td>&nbsp;
<td align="center"><br><h3>

<?php if ($d4 < 3)
{?>
<a href="index.php?view=addpatient&day=<?php echo $day;?>&wd=<?php echo $weekday;?>&time=4:30&doctor=Dr. Ma. Generose Alunan">Reserve</a>
<?php
}
else
{
?>
<font color=red>Full</font>
<?php
}
?>

<br>4:30-6:30 PM




<!--##################################################################################################-->

<td align="center"><br><h3>

&nbsp;

<tr>
<td><img src="<?php echo WEB_ROOT;?>images/alunan.jpg" width="100"><br><font size="+1">Dr. Ma. Generose <br>Alunan
<td width="155" height="167" align="center"  background="<?php echo WEB_ROOT;?>/admin/include/stat.png">

<font size="10"><?php echo $d4;?></font>




<td>&nbsp;






<?php 
//weekend
}?>
</table>

</div>
