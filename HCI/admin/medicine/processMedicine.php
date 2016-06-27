<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addMedicine();
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


function addMedicine()
{
    $Name = $_POST['txtName'];
    $User = $_POST['txtUser'];
    $For = $_POST['txtFor'];
    $Description = $_POST['mtxDescription'];
    $Qnty = $_POST['txtQnty'];
    $m = $_POST['month'];
    $y = $_POST['year'];
    $limit = $_POST['limit'];
    $ex = $m.' '.$y;
	
	/*
	// the password must be at least 6 characters long and is 
	// a mix of alphabet & numbers
	if(strlen($password) < 6 || !preg_match('/[a-z]/i', $password) ||
	!preg_match('/[0-9]/', $password)) {
	  //bad password
	}
	*/	
	// check if the Medicinename is taken
	$sql = "SELECT m_name
	        FROM tbl_medicine
			WHERE m_name = '$Name'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Medicine Name Already exist.'));	
	} else {			
		$sql   = "INSERT INTO tbl_medicine (m_name, m_for, m_desc, m_qnty, m_datereg, m_regby, m_expire, m_limit)
		          VALUES ('$Name','$For','$Description',$Qnty,NOW(),'$User', '$ex', '$limit')";
		dbQuery($sql);
		$sql   = "INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User',NOW(),'added New Medicine: $Name')";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added New Medicine'));	
	}
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
    $m = $_POST['month'];
    $y = $_POST['year'];
    $limit = $_POST['limit'];
    $ex = $m.' '.$y;
	
	
	$sql   = "UPDATE tbl_medicine 
	          SET m_name = '$Name', m_for='$For', m_desc ='$Description', m_Qnty ='$Qnty', m_expire ='$ex', m_limit ='$limit'
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
    $m = $_POST['month'];
    $y = $_POST['year'];
    $ex = $m.' '.$y;
	
		$User = $_SESSION["username"];

	$sql   = "UPDATE tbl_medicine 
	          SET  m_Qnty ='$total', m_expire ='$ex'
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