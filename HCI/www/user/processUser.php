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
    $FName = $_POST['txtFName'];
    $LName = $_POST['txtLName'];
    $userName = $_POST['txtUserName'];
    $PhoneNumber = $_POST['txtUserPhoneNumber'];
    $Password = $_POST['txtPassword'];
    $Password2 = $_POST['txtPassword2'];
    $Position = $_POST['txtPosition'];
    $User = $_POST['User'];
	
	
	$sql = "SELECT user_name
	        FROM tbl_user
			WHERE user_name = '$userName'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another one'));	
	}
	
	else if ($Password != $Password2) {
		header('Location: index.php?view=add&error=' . urlencode('Passwords Do not Match'));	
	}
	
	
	 else if ($Position == 'STUDENT')
	{
	
		header('Location: ../studentuser/index.php?view=add&success=' . urlencode('Complete Student Profile').'&fname='.$FName.'&lname='.$LName.'&username='.$userName.'&pw='.$Password.'&phone='.$PhoneNumber);
	}	else {			
		$sql   = "INSERT INTO tbl_user (user_fname,user_lname,user_name,user_phoneNumber, user_password, user_position, user_regdate)
		          VALUES ('$FName','$LName','$userName','$PhoneNumber', PASSWORD('$Password'),'$Position', NOW())";
	
		dbQuery($sql);
		
		dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Added a New User: $userName')");
				  
		header('Location: index.php?view=thankyou&phone='.$PhoneNumber.'&user='.$userName.'&name='.$FName.' '.$LName);	
	}
}

/*
	Modify a user
*/
function modifyUser()
{
	$phoneNumber = $_POST['txtUserPhoneNumber'];
    $userName = $_POST['txtUserName'];
    $Password = $_POST['txtPassword'];
    $Password2 = $_POST['txtPassword2'];
    $User = $_POST['User'];
	
	$images = uploadProductImage('fleImage', SRV_ROOT . 'images/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	if ($Password != $Password2) {
		header('Location: index.php?view=modify&error=Passwords Do not Match');	
	}
	else
	{
	
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$Password'), user_phoneNumber='$phoneNumber', user_image='$mainImage', user_thumbnail='$thumbnail' WHERE user_name = '$userName'";

	dbQuery($sql);
	
	dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Modified a user: $userName')");
	header('Location: index.php?view=profile');
	}

	
}


/*
	Upload an image and return the uploaded image name 
*/
function uploadProductImage($inputName, $uploadDir)
{
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';
	
	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = md5(rand() * time()) . ".$ext";
		
		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

		// make sure the image width does not exceed the
		// maximum allowed width
		if (LIMIT_PRODUCT_WIDTH && $width > MAX_PRODUCT_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_PRODUCT_IMAGE_WIDTH);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}	
		
		if ($result) {
			// create thumbnail
			$thumbnailPath =  md5(rand() * time()) . ".$ext";
			$result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);
			
			// create thumbnail failed, delete the image
			if (!$result) {
				unlink($uploadDir . $imagePath);
				$imagePath = $thumbnailPath = '';
			} else {
				$thumbnailPath = $result;
			}	
		} else {
			// the product cannot be upload / resized
			$imagePath = $thumbnailPath = '';
		}
		
	}

	
	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}
/*
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
	
		$User = $_SESSION["username"];
	
	$sql = "DELETE FROM tbl_user 
	        WHERE user_id = $userId";
	dbQuery($sql);
	
	dbQuery("INSERT INTO tbl_history (h_user, h_date, h_history)
		          VALUES ('$User', NOW(), 'Deleted a User')");
	header('Location: index.php?success=You Have Successfully Deleted this User');
}
?>