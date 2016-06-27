<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


$session = (isset($_SESSION['username']) && $_SESSION['username'] != '') ? $_SESSION['username'] : '';
if ($session !='')
{
checkUser();
}
else
{
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'aboutus' :
		$content 	= 'aboutus.php';		
		break;
	case 'contactus' :
		$content 	= 'contactus.php';		
		break;

	case 'services' :
		$content 	= 'services.php';		
		break;

	case '1' :
		$content 	= '1.php';		
		break;

	case '2' :
		$content 	= '2.php';		
		break;

	case '3' :
		$content 	= '3.php';		
		break;

		

	default :
		$content = 'main.php';	

}




$pageTitle = 'CSAB - Home Page';
$script = array();

require_once '../include/template.php';
?>
