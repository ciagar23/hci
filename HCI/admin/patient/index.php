<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :	
		$content 	= 'list.php';	
		$template = 'template.php';	
		break;
		
	case 'print' :	
		$content 	= 'print.php';
		$template = 'printtemplate.php';			
		break;
		
	case 'success' :	
		$content 	= 'success.php';
		$template = 'template.php';			
		break;

	case 'add' :
		$sidebar 	= '';		
		$content 	= 'add.php';
		$template = 'template.php';			
		break;
		
		
	case 'addpatient' :
		$sidebar 	= '';		
		$content 	= 'addpatient.php';	
		$template = 'template.php';		
		break;


	default :
		$content 	= 'add.php';
		$template = 'template.php';	
		$sidebar 	= '';		
		
}
$script    = array('patient.js');
require_once '../include/'.$template;
?>
