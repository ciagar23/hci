<?php
if (!defined('WEB_ROOT')) {
	exit;
}


//$date='.$txtDate.'&patient='.$userName.'&remarks='.$remarks.'&diagnosis='.$diagnosis);

$doctor = $_GET['doctor'];
$date = $_GET['date'];
$teacher = $_GET['teacher'];
$course = $_GET['course'];
$level = $_GET['level'];
$section = $_GET['section'];
$purpose = $_GET['purpose'];
$location = $_GET['location'];

	$tsql = "SELECT *
        FROM tbl_user where user_name='$teacher'";
		$tresult = mysql_query($tsql);
		$tshow = mysql_fetch_array($tresult);	
		$tfname= $tshow['user_fname'];
		$tlname= $tshow['user_lname'];
?> 
<!-- start id-form -->                                        


<table align=center width=80%>
<tr>

<td align="center">
<br><br>
<font size="+3">
Colegio San Agustin - Bacolod<br>
Medical Clinic </font>
<br><br><br><br>

<div align="right"><u><b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date;?>&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

<br>
<br>
<div align="center"><font size="+3"><u>Medical Certificate (Tour)</u></font></div>
<br><br>
<div align="left">&nbsp;&nbsp;&nbsp;THIS IS TO INFORM THAT:</b></div>
<div>
<br>
  <div align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  
  The Following List of Students : <?php echo $course.$level.'-'.$section;?> under the advisory of Mr./Ms. <?php echo $tfname.' '.$tlname;?> will be having a _____ tour on <?php echo $date;?> in <?php echo $location;?>. Therefore, is requested to be Excused from their Respected Classes.  
  </div>
  <br>
  

  
    <br>
      <br>  <br>  <br>  
      
      
<table width="100%">
<tr>
<td align="left">

<b>NOTED BY:

<br>

<br>

<br>

<u><b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $tfname.' '.$tlname;;?>&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> &nbsp;&nbsp;&nbsp;
Adviser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
    <td align="right">
    
    <u><b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $doctor;?>&nbsp;&nbsp;&nbsp;&nbsp;</u>&nbsp;<br>
    School Physician&nbsp;&nbsp;
    &nbsp;</div>
    
    <br><br>

<div align="right">_____________________<br>
School Nurse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>

</table>
<br><br><br><br><br><br>




</table>
 
 <script>
 
window.print();
window.location.href='../index.php';
 
 </script>