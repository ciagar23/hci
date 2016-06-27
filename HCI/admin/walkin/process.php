<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		add();
		break;
	
	case 'confirm' :
		confirm();
		break;
		
		
    case 'delete' :
		delete();
		break;
		
    case 'updatepatient' :
		updatepatient();
		break;
		
    case 'patient' :
		patient();
		break;
		
    case 'addtour' :
		addtour();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Major page
		header('Location: index.php');
}



function confirm()
{
    
$id=$_GET['id'];
$day=$_GET['day'];
$time=$_GET['time'];
$user=$_GET['user'];

			  
	dbQuery("UPDATE tbl_patient
	          SET  p_confirmation='1'
			  WHERE p_id = $id");
			  
			  
		header('Location: index.php?view=appsms&day='.$day.'&time='.$time.'&user='.$user);	


}

function add()
{
    
$userName=$_POST['userName'];
$txtDate=$_POST['txtDate'];
$txtTime=$_POST['txtTime'];
$diagnosis=$_POST['diagnosis'];
$txtTeacher=$_POST['txtTeacher'];
$doctor=$_POST['doctor'];
$wd=$_POST['wd'];
		$admin = $_SESSION["username"];



$sql = "SELECT *
        FROM tbl_user where user_name='$txtTeacher'";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);	
		
		
if ($count !=0)
	{
		$sql   = "INSERT INTO tbl_patient (p_username, p_date, p_time, p_diagnosis, p_teacher, p_doctor)
		          VALUES ('$userName','$txtDate','$txtTime','$diagnosis','$txtTeacher', '$doctor')";
	
		dbQuery($sql);
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$admin', NOW(), 'Made an appointment: $diagnosis')");
		header('Location: index.php?date=' . $txtDate . '&wd=' . $wd . '&success=' . urlencode('You have Successfully Added Appointment'));	
	}
	else
		{
		header('Location: index.php?error=' . urlencode('Teacher ID does not exist'));	
		}


}



function addtour()
{
    
$userName=$_POST['userName'];
$txtDate=$_POST['txtDate'];
$txtTime=$_POST['txtTime'];
$teacher=$_POST['teacher'];
$doctor=$_POST['doctor'];
$course=$_POST['course'];
$level=$_POST['level'];
$section=$_POST['section'];
$teacher=$_POST['teacher'];
$location=$_POST['location'];
$purpose=$_POST['purpose'];
$wd=$_POST['wd'];


$sql = "SELECT *
        FROM tbl_user where user_name='$teacher'";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);	
		
		
if ($count !=0)
	{
		dbQuery("INSERT INTO tbl_patient (p_username, p_date, p_time, p_teacher, p_doctor)
		          VALUES ('TOUR','$txtDate','$txtTime','$teacher', '$doctor')");
		

		$shows = mysql_fetch_array(mysql_query("SELECT * FROM tbl_patient where p_date ='$txtDate' and p_time ='$txtTime'"));	
		$tourId= $shows['p_id'];		
	
		dbQuery("INSERT INTO tbl_tour (p_tourid, p_date, p_time, p_course, p_level, p_section, p_location, p_purpose, p_teacher, p_doctor)
		          VALUES ('$tourId','$txtDate','$txtTime','$course', '$level', '$section', '$location', '$purpose', '$teacher', '$doctor')");
				  
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$userName', NOW(), 'Made an Tour: $purpose')");

header('Location: index.php?view=toursms&doctor='.$doctor.'&date='.$txtDate.'&teacher='.$teacher.'&course='.$course.'&level='.$level.'&section='.$section.'&purpose='.$purpose.'&location='.$location);				  
	}
	else
		{
		header('Location: index.php?view=tour&error=' . urlencode('Teacher ID does not exist'));	
		}


}


function updatepatient()
{
    
$id=$_POST['id'];
$treatment=$_POST['treatment'];
$remarks=$_POST['remarks'];
$day=$_POST['day'];
$time=$_POST['time'];
$txtquantity=$_POST['txtquantity'];

		$User = $_SESSION["username"];
//buhinan medicine	  
		$tresult = mysql_query("SELECT * FROM tbl_medicine where m_name='$treatment'");
		$tshow = mysql_fetch_array($tresult);	
		$qnty= $tshow['m_qnty'];
		$total = $qnty - $txtquantity;
		
		if ($txtquantity > $qnty)
		{
			header('Location: index.php?view=updatepatient&id='.$id.'&error=' . urlencode('Medicine Is not enough. Please Add more Medicine'));
		}
		else
		{
		
		dbQuery("UPDATE tbl_medicine 
	          SET  m_Qnty ='$total'
			  WHERE m_name = '$treatment'");
			  
	dbQuery("UPDATE tbl_patient
	          SET p_treatment = '$treatment', p_remarks ='$remarks', p_confirmation='1'
			  WHERE p_id = $id");
			  
	dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Recorded a new patient')");
			  
		header('Location: index.php?view=list&day='.$day.'&time='.$time.'&success=You Have Successfully Confirmed this Patient');	
	}


}


/*
	Modify a Major
*/
function patient()
{
    $IdNumber = $_POST['IdNumber'];
	
	$checkId = mysql_num_rows(mysql_query("SELECT * FROM tbl_user where user_name='$IdNumber'"));
		if ( $checkId == 0)
		{
		header('Location: index.php?&error=ID Number Incorrect');
		}
		else
		{
			
	$_SESSION['patient'] = $IdNumber;
	header('Location: index.php?view=addpatient');
		}
}

?>