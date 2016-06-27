<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'toursms' :	
		$content 	= 'toursms.php';		
		break;
	case 'list' :	
		$content 	= 'list.php';		
		break;

	case 'add' :
		$sidebar 	= '';		
		$content 	= 'add.php';		
		break;

	case 'tour' :
		$sidebar 	= '';		
		$content 	= 'tour.php';		
		break;

	case 'updatepatient' :
		$sidebar 	= '';		
		$content 	= 'updatepatient.php';		
		break;
		

	case 'adminTable' :
		$sidebar 	= '';		
		$content 	= 'adminTable.php';		
		break;
		
		
	case 'adddentist' :
		$sidebar 	= '';		
		$content 	= 'adddentist.php';		
		break;
		
		
	case 'addpatient' :
		$sidebar 	= '';		
		$content 	= 'addpatient.php';		
		break;
		
	case 'addtour' :
		$sidebar 	= '';		
		$content 	= 'addtour.php';		
		break;


	default :
		$content 	= 'table.php';
		$sidebar 	= '';			
		
}
$script    = array('patient.js');
require_once '../include/template.php';
?>
