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
$treatment=$_POST['treatment'];
$remarks=$_POST['remarks'];
$txtTeacher=$_POST['txtTeacher'];
$txtquantity=$_POST['txtquantity'];
$doctor=$_POST['doctor'];


		$result = mysql_query("SELECT * FROM tbl_user where user_name='$txtTeacher'");
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
			  
		dbQuery("INSERT INTO tbl_patient (p_username, p_date, p_diagnosis, p_treatment, p_remarks, p_doctor, p_teacher)
		          VALUES ('$userName','$txtDate','$diagnosis','$treatment','$remarks','$doctor','$txtTeacher')");
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Recorded a new patient $userName : $diagnosis')");
		
				  
		header('Location: index.php?success=' . urlencode('You have Successfully Added Patient'));	
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