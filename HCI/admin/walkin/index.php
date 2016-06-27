<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'toursms' :	
		$content 	= 'toursms.php';	
		$temp 	= 'template.php';		
		break;
		
	case 'appsms' :	
		$content 	= 'appsms.php';	
		$temp 	= 'template.php';		
		break;
		
	case 'print' :		
		$temp 	= 'printtemplate.php';
		$content 	= 'print.php';		
		break;
	case 'list' :	
		$content 	= 'list.php';		
		$temp 	= 'template.php';	
		break;

	case 'add' :
		$sidebar 	= '';		
		$content 	= 'add.php';		
		$temp 	= 'template.php';	
		break;

	case 'tour' :
		$sidebar 	= '';		
		$content 	= 'tour.php';		
		$temp 	= 'template.php';	
		break;

	case 'updatepatient' :
		$sidebar 	= '';		
		$content 	= 'updatepatient.php';		
		$temp 	= 'template.php';	
		break;
		

	case 'adminTable' :
		$sidebar 	= '';		
		$content 	= 'adminTable.php';			
		$temp 	= 'template.php';
		break;
		
		
	case 'adddentist' :
		$sidebar 	= '';		
		$content 	= 'adddentist.php';		
		$temp 	= 'template.php';	
		break;
		
		
	case 'addpatient' :
		$sidebar 	= '';		
		$content 	= 'addpatient.php';		
		$temp 	= 'template.php';	
		break;
		
	case 'addtour' :
		$sidebar 	= '';		
		$content 	= 'addtour.php';	
		$temp 	= 'template.php';		
		break;


	default :
		$content 	= 'table.php';
		$sidebar 	= '';			
		$temp 	= 'template.php';			
		
}
$script    = array('patient.js');
require_once '../include/'.$temp;
?>
