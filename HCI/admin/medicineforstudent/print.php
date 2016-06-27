<?php
if (!defined('WEB_ROOT')) {
	exit;
}


//$date='.$txtDate.'&patient='.$userName.'&remarks='.$remarks.'&diagnosis='.$diagnosis);
$date =$_GET['date'];
$patient =$_GET['patient'];
$remarks =$_GET['remarks'];
$diagnosis =$_GET['diagnosis'];
$doctor =$_GET['doctor'];

	$tsql = "SELECT *
        FROM tbl_user where user_name='$patient'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
		$c= $tshow['user_course'];
		$l= $tshow['user_level'];
		$s= $tshow['user_section'];
?> 
<!-- start id-form -->                                        


<table align=center width=80%>
<tr>

<td align="center">
<br><br>
<font size="+3">
Colegio San Agustin - Bacolod<br>
Medical - Dental Clinic </font>
<br><br><br><br>

<div align="right"><u><b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date;?>&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

<br>
<br>
<div align="center"><font size="+3"><u>Medical Certificate</u></font></div>
<br>
<div align="left">&nbsp;&nbsp;&nbsp;THIS IS TO CERTIFY THAT:</b></div>
<div>
  <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  
  <b>Mr./Ms. <?php echo $tfname.' '.$tlname;?></b> of <b><?php echo $c.$l.'-'.$s;?></b> found to be <?php echo $diagnosis;?></b>
  
  </div>
  <br>
  
 
<div align="left"><b>&nbsp;&nbsp;&nbsp;RECOMMENDATION:</b></div>
<div>
  <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  
 <?php echo $remarks;?>
  
  </div>
  
    <br>
      <br>  <br>  <br>  
      
      

<div align="right"><u><b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $doctor;?>&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
School Physician&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

<br>

<div align="right">_____________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
School Nurse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<br><br><br><br><br><br>
</table>
 
 <script>
 
 window.print();
 window.location.href='index.php?success=You Have Successfully Print the Certificate';
 
 </script>