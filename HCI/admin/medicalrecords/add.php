<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<!-- start id-form -->


<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">

		<table>	
	<tr>
	<td> Name
	<td> <input type = "text"  name = "Name">
                  
	<tr>
	<td> Student ID No.
	<td> <input type = "text"  name = "Student ID No.">

	<tr>
	<td> Course/Year
	<td> <input type = "text" size="10" name = "Course/Year">
	
	<tr>
	<td> School Year
	<td> <input type = "text"  name = "School Year">

	<tr>
	<td> Address
	<td> <input type = "text"  name = "Address">

	<tr>
	<td> Birthdate
	<td> <input type = "text"  name = "Birthdate">

	
	<tr>
	<td> Age
	<td> <input type = "text"  name = "Age">

	<tr>
	<td> Parent's Name
	<td> <input type = "text"  name = " Parent's Name">

	<tr>
	<td> Address
	<td> <input type = "text"  name = "Address ">

	<tr>
	<td> Phone No.
	<td> <input type = "text"  name = "Phone No.">

	<tr>
	<td> Person To Contact In Case Of Emergency
	<td> <input type = "text"  name = "Person To Contact In Case Of Emergency">

	<tr>
	<td> Phone No.
	<td> <input type = "text"  name = "Phone No.">

	<tr>
	<td> 1. Presently taking medications
	<td>
	<select name = "">
	<option>Yes </option>
	<option>No </option>
	</select>

	
	
	<tr>
	<td> 2. Medical Medications:
	<tr>
	 Asthtma
	<input type ="checkbox"   name = "Asthma" >
	 CHD
	 <input type ="checkbox"   name = "CHD" >
	Chicken Pox
	 <input type ="checkbox"   name = "Chicken Pox" >

	<tr>
	<td> HPN
	<input type ="checkbox"   name = "HPN" >
	 PTB
	 <input type ="checkbox"   name = "PTB" >
	German Measles
	 <input type ="checkbox"   name = "German Measles" >
	
	<tr>
	<td> DM
	<input type ="checkbox"   name = "DM" >
	 Measles
	 <input type ="checkbox"   name = " Measles" >
	Others:
	 <input type ="text"   name = "Others:" >

	
	<tr>
	<td>3.  Allergies:
	<tr>
	<td>Food:
	<input type = "text"  name = "Food:">
	<tr>
	<td>Drug:
	<input type = "text"  name = "Drug:">


	<tr>
	<td> 4. Immunizations:
	<tr>
	<td> BCG
	<input type ="checkbox"   name = "BCG" >
	 Hepa A
	 <input type ="checkbox"   name = "Hepa A" >
	Typhoid Fever
	 <input type ="checkbox"   name = "Typhoid Fever" >
	Mumps
	 <input type ="checkbox"   name = "Mumps" >
	
	<tr>
	<td> DPT
	<input type ="checkbox"   name = "DPT" >
	Hepa B
	 <input type ="checkbox"   name = "Hepa B" >
	Chiken Pox
	 <input type ="checkbox"   name = "Chiken Pox" >
	Flu
	 <input type ="checkbox"   name = "Flu" >

	<tr>
	<td> Polio
	<input type ="checkbox"   name = "Polio" >
	Measles
	 <input type ="checkbox"   name = "Measles" >
	HIB
	 <input type ="checkbox"   name = "HIB" >


	<tr>
	<td> 5. Past surgical operations:
	<input type = "text"  name = "5. Past surgical operations: ">

	<tr>
	<td> 6. Recent Hospitalization:
	<input type = "text"  name = "6. Recent Hospitalization:">


	<tr>
	<td> Personal Habits
	<tr>
	<td> 1. Smoking
	<select name = "">
	<option>Yes </option>
	<option>No </option>
	</select>
	<tr>
	<td> 2. Alcohol
	<select name = "">
	<option>Yes </option>
	<option>No </option>
	</select>
	<tr>
	<td> Non-medical Drugs
	<select name = "">
	<option>Yes </option>
	<option>No </option>
	</select>
	<tr>
	<td> Eating Disorders
	<select name = "">
	<option>Yes </option>
	<option>No </option>
	</select>

	<tr>
	<td>  Physical Examination:
	<tr>
	<td>Height
	<input type ="text"   name = "Height" >
	 Weight
	 <input type ="text"   name = "Weight" >
	Blood Pressure
	 <input type ="text"   name = "Blood Pressure" >
	<tr>
	<td>Pulse
	<input type ="text"   name = "Pulse" >
	 RR
	 <input type ="text"   name = " RR" >
	
	
	<tr>
	<td>  Visual Activity:
	<tr>
	<td>Right
	<input type ="text"   name = "Right" >
	 <tr>
	<td>Left
	 <input type ="text"   name = "Left" >
	


</table>
                       <br>
                       <br>
                       <br>
                       <br>     
 
 <div align="center" class="content"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="form-add">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="form-cancel">  
 </div>
</form>