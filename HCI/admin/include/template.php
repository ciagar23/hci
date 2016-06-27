<?php
if (!defined('WEB_ROOT')) {
	exit;
}


		

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
$successMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '';

if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage = '
<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">'.$errorMessage.'</a></td>
					<td class="red-right"><a class="close-red"><img src="'.WEB_ROOT.'admin/include/images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>

';
}


if ($successMessage == '')
{
$successMessage = '';
}
else
{
$successMessage = '<div id="message-green">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="green-left">'.$successMessage.'</a></td>
					<td class="green-right"><a class="close-green"><img src="'.WEB_ROOT.'admin/include/images/table/icon_close_green.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>';
}


$session = $_SESSION["username"];

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$position= $show['user_position'];


$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}






$self = WEB_ROOT . 'admin/index.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Clinic</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/css/screen.css" type="text/css" media="screen" title="default" />
<!--[if IE]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo WEB_ROOT;?>admin/include/css/pro_dropline_ie.css" />
<![endif]-->

<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>

<script>

	$(document).ready(function(){		
		$(".addProject").colorbox({width:"440px", inline:true, href:"#add-new-project"});
		$(".addMilestone").colorbox({width:"440px", inline:true, href:"#add-new-milestone"});		
		
	});
</script>
<!--  jquery core -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/ui.checkbox.js" type="text/javascript"></script>
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.bind.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	$('input').checkBox();
	$('#toggle-all').click(function(){
 	$('#toggle-all').toggleClass('toggle-checked');
	$('#mainform input[type=checkbox]').checkBox('toggle');
	return false;
	});
});
</script>  

<![if !IE 7]>

<!--  styled select box script version 1 -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
});
</script>
 

<![endif]>

<!--  styled select box script version 2 --> 
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});
</script>

<!--  styled select box script version 3 --> 
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
});
</script>

<!--  styled file upload script --> 
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.filestyle.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $(function() {
      $("input.file_1").filestyle({ 
          image: "<?php echo WEB_ROOT;?>admin/include/images/forms/choose-file.gif",
          imageheight : 21,
          imagewidth : 78,
          width : 310
      });
  });
</script>

<!-- Custom jquery scripts -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/custom_jquery.js" type="text/javascript"></script>
 
<!-- Tooltips -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.dimensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true, 
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});
</script> 


<!--  date picker script -->
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/css/datePicker.css" type="text/css" />
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/date.js" type="text/javascript"></script>
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.datePicker.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
        $(function()
{

// initialise the "Select date" link
$('#date-pick')
	.datePicker(
		// associate the link with a date picker
		{
			createButton:false,
			startDate:'01/01/2005',
			endDate:'31/12/2020'
		}
	).bind(
		// when the link is clicked display the date picker
		'click',
		function()
		{
			updateSelects($(this).dpGetSelected()[0]);
			$(this).dpDisplay();
			return false;
		}
	).bind(
		// when a date is selected update the SELECTs
		'dateSelected',
		function(e, selectedDate, $td, state)
		{
			updateSelects(selectedDate);
		}
	).bind(
		'dpClosed',
		function(e, selected)
		{
			updateSelects(selected[0]);
		}
	);
	
var updateSelects = function (selectedDate)
{
	var selectedDate = new Date(selectedDate);
	$('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
	$('#m option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
	$('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
}
// listen for when the selects are changed and update the picker
$('#d, #m, #y')
	.bind(
		'change',
		function()
		{
			var d = new Date(
						$('#y').val(),
						$('#m').val()-1,
						$('#d').val()
					);
			$('#date-pick').dpSetSelected(d.asString());
		}
	);

// default the position of the selects to today
var today = new Date();
updateSelects(today.getTime());

// and update the datePicker to reflect it...
$('#d').trigger('change');
});
</script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">
	<div id="logo">
	<a href=""><img src="<?php echo WEB_ROOT;?>admin/include/header.png" height="90" width="600" alt="" /></a>
	</div>
	<!-- end logo -->ogo -->
	
	<!--  start top-search -->
	<div id="top-search">
    <form method="get" action="<?php echo WEB_ROOT;?>admin/user/index.php">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td><input type="text" name="search" value="Search" onblur="if (this.value=='') { this.value='Search'; }" onfocus="if (this.value=='Search') { this.value=''; }" class="top-search-inp" /></td>
		<!--<td>
		<select  class="styledselect">
			<option value=""> All</option>
			<option value=""> Products</option>
			<option value=""> Categories</option>
			<option value="">Clients</option>
			<option value="">News</option>
		</select> 
		</td>-->
		<td>
		<input type="image" src="<?php echo WEB_ROOT;?>admin/include/images/shared/top_search_btn.gif"  />
        </form>
		</td>
		</tr>
		</table>
	</div>
 	<!--  end top-search -->
 	<div class="clear"></div>

</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 

		<!-- start nav-right -->
		<div id="nav-right">

			<!--  end account-content -->
		
		</div>
		<!-- end nav-right -->


		<!--  start nav -->
		<div class="nav">
		<div class="table">
		
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/"><b>Home</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</ul>
		
        <? if ($position=='ADMIN'){

			?>
        
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/user/"><b>Users</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</ul>
     
        <div class="nav-divider">&nbsp;</div>         
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/patient/"><b>Patients</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul> 
			<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/medicine/"><b>Medicine</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>
        
			<div class="nav-divider">&nbsp;</div>
<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/patient/index.php?view=list"><b>Medical Records</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	

		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/appointment/?view=adminTable"><b> View Appointment</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
        
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/myhistory"><b>History</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/appointment/?view=tour"><b>Tours</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/doctorsabsence"><b>Doctor's Absence</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	

 
<? }else if ($position=='DOCTOR'){?>
        <div class="nav-divider">&nbsp;</div>         
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/patient/"><b>Patients</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul> 
        
			<div class="nav-divider">&nbsp;</div>
<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/patient/index.php?view=list"><b>Medical Records</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	

		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/appointment/?view=adminTable"><b> View Appointment</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
        
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/myhistory"><b>History</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
		      
		<div class="nav-divider">&nbsp;</div>              
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/doctorsabsence"><b>Doctor's Absence</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	 
<? }else if ($position=='NURSE'){?>

		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/user/"><b>Users</b><!--[if IE 7]><!--></a><!--<![endif]-->
		</ul>
     
			<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/medicine/"><b>Medicine</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>
        
			<div class="nav-divider">&nbsp;</div>
<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/patient/index.php?view=list"><b>Medical Records</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	

        
		<div class="nav-divider">&nbsp;</div>
		                    
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/walkin/"><b>Walk-In Appointment</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
        
		<div class="nav-divider">&nbsp;</div>
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/myhistory"><b>History</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>	
		    
		<div class="nav-divider">&nbsp;</div>                
		<ul class="select"><li><a href="<?php echo WEB_ROOT; ?>admin/appointment/?view=tour"><b>Tours</b><!--[if IE 7]><!--></a><!--<![endif]-->

		</ul>		
    
<? }else{}?>


	<div class="nav-divider">&nbsp;</div>            
		<ul class="select"><li><a href="<?php echo $self; ?>?logout"><b> Log Out</b><!--[if IE 7]><!--></a><!--<![endif]-->          

		</ul>

		</ul>
        
		
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->
        

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

 <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>
        <?php if($position=='ADMIN' || $position=='DOCTOR' || $position=='NURSE') {?>
        <img src="<?php echo WEB_ROOT;?>admin/include/adminlogo.jpg" height="40" />
        <?php } else { ?>
		
        <img src="<?php echo WEB_ROOT;?>admin/include/patientlogo.jpg" height="40" />
		
		<? }?>
        
        Welcome <b><?php echo $fname; ?> <?php echo $lname; ?> 
                <font color="#CC6666">(<?php echo $position; ?>)! </font></b></h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="<?php echo WEB_ROOT;?>admin/include/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="<?php echo WEB_ROOT;?>admin/include/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
				 
         
         
             <?php echo $successMessage;?>  
    <?php echo $errorMessage;?>  
          <?php require_once $content;?>  
                
                
                
                
			</div>
			<!--  end content-table  -->
	
			
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
	<!--  start footer-left -->
	<div id="footer-left">
	
	Group: 
	<!--  end footer-left -->
	<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->
 
</body>
</html>