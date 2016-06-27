<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		add();
		break;
		
		
    case 'delete' :
		delete();
		break;
		
    case 'deleteEvaluation' :
		deleteEvaluation();
		break;
		
    case 'patient' :
		patient();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Major page
		header('Location: index.php');
}


function add()
{
    
$userName=$_POST['userName'];
$User=$_POST['User'];
$txtDate=$_POST['txtDate'];
$diagnosis=$_POST['diagnosis'];
$remarks=$_POST['remarks'];
$txtTeacher=$_POST['txtTeacher'];
$doctor=$_POST['doctor'];
$addmed=$_POST['addmed'];
$timenow= date('g:i A');

		/* $result = mysql_query("SELECT * FROM tbl_user where user_name='$txtTeacher'");
		$count = mysql_num_rows($result);	
				  
		//buhinan medicine	  
		$tresult = mysql_query("SELECT * FROM tbl_medicine where m_name='$treatment'");
		$tshow = mysql_fetch_array($tresult);	
		$qnty= $tshow['m_qnty'];
		$total = $qnty - $txtquantity;
		
		if ($txtquantity > $qnty)
		{
			header('Location: index.php?view=addpatient&error=' . urlencode('Medicine Is not enough. Please Add more Medicine'));
		}
		else
		{
		
		dbQuery("UPDATE tbl_medicine 
	          SET  m_Qnty ='$total'
			  WHERE m_name = '$treatment'");
			  */
			  
		dbQuery("INSERT INTO tbl_patient (p_username, p_date, p_time, p_diagnosis, p_remarks, p_doctor, p_teacher,p_confirmation)
		          VALUES ('$userName','$txtDate','$timenow','$diagnosis','$remarks','$doctor','$txtTeacher',1)");
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Recorded a new patient $userName : $diagnosis')");
		
		if ($addmed == 'Yes')
		{
		header('Location: ../medicineforstudent/index.php?view=addpatient&date='.$txtDate.'&patient='.$userName.'&remarks='.$remarks.'&diagnosis='.$diagnosis.'&doctor='.$doctor.'&med='.$addmed);	
		}
		else
		{
		header('Location: index.php?view=success&date='.$txtDate.'&patient='.$userName.'&remarks='.$remarks.'&diagnosis='.$diagnosis.'&doctor='.$doctor);	
		}
		
	


}


function patient()
{
    $IdNumber = $_POST['IdNumber'];
	
	$checkId = mysql_num_rows(mysql_query("SELECT * FROM tbl_user where user_name='$IdNumber'"));
		if ( $checkId == 0)
		{
		header('Location: index.php?&error=ID Number Does not exist');
		}
		else
		{
			
	$_SESSION['patient'] = $IdNumber;
	header('Location: index.php?view=addpatient');
		}
}
?>