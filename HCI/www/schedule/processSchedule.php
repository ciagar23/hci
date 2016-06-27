<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'modify' :
		modifyUser();
		break;
		
	case 'changepass' :
		changepass();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{

    $UserName = $_POST['txtUserName'];
	$Room = $_POST['txtRoom'];
	$Subject = $_POST['txtSubject'];
	$CName = $_POST['txtCName'];
	$From = $_POST['txtFrom'];
	$To  = $_POST['txtTo'];
	$M = (isset($_POST['txtM']) && $_POST['txtM'] != '') ? $_POST['txtM'] : '';
	$T = (isset($_POST['txtT']) && $_POST['txtT'] != '') ? $_POST['txtT'] : '';
	$W = (isset($_POST['txtW']) && $_POST['txtW'] != '') ? $_POST['txtW'] : '';
	$TH = (isset($_POST['txtTH']) && $_POST['txtTH'] != '') ? $_POST['txtTH'] : '';
	$F = (isset($_POST['txtF']) && $_POST['txtF'] != '') ? $_POST['txtF'] : '';
	$S = (isset($_POST['txtS']) && $_POST['txtS'] != '') ? $_POST['txtS'] : '';

	

	// check if the username is taken
	$sql = "SELECT s_teacher , s_from 
	        FROM tbl_schedule
			WHERE s_teacher = '$UserName' and s_from ='$From'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('You already Have a Class at '.$From.'. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO tbl_schedule (s_teacher, s_subject, s_room, s_class, s_from, s_to, s_m, s_t, s_w, s_th, s_f, s_s)
		          VALUES ('$UserName', '$Subject', '$Room', '$CName', '$From', '$To', '$M', '$T', '$W', '$TH', '$F', '$S')";
	
		dbQuery($sql);
		header('Location: index.php?success=' . urlencode('You have Successfully Added a New Schedule'));	
	}
}

/*
	Modify a user
*/
function modifyUser()
{
    $UserId = $_POST['txtUserId'];
	$Room = $_POST['txtRoom'];
	$Subject = $_POST['txtSubject'];
	$CName = $_POST['txtCName'];
	$From = $_POST['txtFrom'];
	$To  = $_POST['txtTo'];
	$M = (isset($_POST['txtM']) && $_POST['txtM'] != '') ? $_POST['txtM'] : '';
	$T = (isset($_POST['txtT']) && $_POST['txtT'] != '') ? $_POST['txtT'] : '';
	$W = (isset($_POST['txtW']) && $_POST['txtW'] != '') ? $_POST['txtW'] : '';
	$TH = (isset($_POST['txtTH']) && $_POST['txtTH'] != '') ? $_POST['txtTH'] : '';
	$F = (isset($_POST['txtF']) && $_POST['txtF'] != '') ? $_POST['txtF'] : '';
	$S = (isset($_POST['txtS']) && $_POST['txtS'] != '') ? $_POST['txtS'] : '';
	
	$sql   = "UPDATE tbl_schedule 
	          SET  s_room='$Room', s_subject='$Subject', s_class='$CName', s_from='$From', s_to='$To', s_m='$M', s_t='$T', s_w='$W', s_th='$TH', s_f='$F', s_s='$S'
			  WHERE s_id = $UserId";

	dbQuery($sql);
	header('Location: index.php?success=' . urlencode('You have Successfully Modified this Time Slot'));

}/*
	Modify a user
*/
function changepass()
{
	$session = $_SESSION["username"];	
    $Password = $_POST['txtPassword'];
    $Password2 = $_POST['txtPassword2'];
	
	if ($Password != $Password2)
	{
	header('Location: index.php?view=changepassword&alert=' . urlencode('PassWord Do not Match'));
	}
	else
	{
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password')
			  WHERE user_name = '$session'";

	dbQuery($sql);
	header('Location: index.php?view=changepassword&alert=' . urlencode('You have Successfully Modified this User'));
}
}

/*
	Remove a user
*/
function deleteUser()
{
	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_schedule 
	        WHERE s_id = $userId";
	dbQuery($sql);
	
	header('Location: index.php?success=' . urlencode('You have Successfully Deleted a Time Slot'));
}
?>
