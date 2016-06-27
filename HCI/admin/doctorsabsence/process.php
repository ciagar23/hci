<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		add();
		break;
		
	case 'modify' :
		modifyMedicine();
		break;
		
		case 'updatequantity' :
		updatequantity();
		break;
		
	case 'changepass' :
		changepass();
		break;
		
	case 'delete' :
		deleteMedicine();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main Medicine page
		header('Location: index.php');
}


function add()
{
    $User = $_POST['txtUser'];
    $doctor = $_POST['doctor'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
	$date = $year.'-'.$month.'-'.$day;
    $reason = $_POST['reason'];
	
			
		$sql   = "INSERT INTO tbl_docabsence (d_name, d_date, d_reason, d_user)
		          VALUES ('$doctor','$date','$reason','$User')";
		dbQuery($sql);
		$sql   = "INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User',NOW(),'File Absence for $doctor on $date')";
	
		dbQuery($sql);
		header('Location: index.php?view=finished&doctor='.$doctor.'&date='.$date);
	
}

/*
	Modify a user
*/
function modifyMedicine()
{
	$Name = $_POST['txtName'];
    $Id = $_POST['txtId'];
    $For = $_POST['txtFor'];
    $Description = $_POST['mtxDescription'];
    $Qnty = $_POST['txtQnty'];
	$User = $_SESSION["username"];
	
	
	$sql   = "UPDATE tbl_medicine 
	          SET m_name = '$Name', m_for='$For', m_desc ='$Description', m_Qnty ='$Qnty'
			  WHERE m_id = $Id";

	dbQuery($sql);
	
	
		$sql   = "INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User',NOW(),'Modified Medicine for $For')";
	
		dbQuery($sql);
	header('Location: index.php?success=' . urlencode('You have Successfully Modified this Medicine'));

}/*


*/
function updatequantity()
{
	
    $Id = $_POST['txtId'];
    $NQnty = $_POST['txtNQnty'];
	$Qnty = $_POST['txtQnty'];
	$total = $Qnty + $NQnty;
	
		$User = $_SESSION["username"];

	$sql   = "UPDATE tbl_medicine 
	          SET  m_Qnty ='$total'
			  WHERE m_id = $Id";

	dbQuery($sql);
	
	
		$sql   = "INSERT INTO tbl_history ( h_date, h_history)
		          VALUES (NOW(),'Updated Medicine')";
	
		dbQuery($sql);
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Updated Medicine Quantity')");
	header('Location: index.php?success=' . urlencode('You have Successfully Modified this Medicine'));

}


/*
	Remove a user
*/
function deleteMedicine()
{
	if (isset($_GET['MedicineId']) && (int)$_GET['MedicineId'] > 0) {
		$medicineId = (int)$_GET['MedicineId'];
		$User = $_SESSION["username"];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_medicine
	        WHERE m_id = $medicineId";
	dbQuery($sql);
	
		$sql   = "INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User',NOW(),'Deleted Medicine')";
	
		dbQuery($sql);
	
	header('Location: index.php?success=You have Sucessfully Delete Medicine');
}
?>