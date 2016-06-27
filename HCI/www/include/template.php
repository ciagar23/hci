<?php
if (!defined('WEB_ROOT')) {
	exit;
}


			

$alertlogin = (isset($_GET['alertlogin']) && $_GET['alertlogin'] != '') ? $_GET['alertlogin'] : '';
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
					<td class="red-left">'.$errorMessage.'</a></td><td class="red-right"></td>
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
					<td class="green-left">'.$successMessage.'</a></td></td>
				</tr>
				</table>
				</div>';
}



$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}



$session = (isset($_SESSION['username']) && $_SESSION['username'] != '') ? $_SESSION['username'] : '';
$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
		$position= $show['user_position'];
		$lasttime= $show['user_last_login'];
		$thumbnail= $show['user_thumbnail'];

if (isset($_POST['txtUserName'])) {
	$results = doLogin();
	
	if ($results != '') {
		$errorMessage = $results;
	}
}

$self = WEB_ROOT . 'admin/index.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSAB - Online Clinic Information System with Short Messaging System</title>
<link href="<?php echo WEB_ROOT;?>www/include/style.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/icon.ico" />

<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>

<script>

	$(document).ready(function(){		
		$(".addProject").colorbox({width:"440px", inline:true, href:"#add-new-project"});
		$(".addMilestone").colorbox({width:"440px", inline:true, href:"#add-new-milestone"});		
		
	});
</script>


        <link rel="stylesheet" media="screen, print, handheld" type="text/css" href="<?php echo WEB_ROOT;?>calendar/calendar.css" />
        <script type="text/javascript" src="<?php echo WEB_ROOT;?>calendar/calendar.js"></script>


</head>

<body>
<div id="headerbg">
  <div id="headerblank">
    <div id="header">
      <div id="menu">
        <ul>
          <li><a href="<?php echo WEB_ROOT; ?>www" class="menu">Home</a></li>
          <li><a href="<?php echo WEB_ROOT; ?>www/main/index.php?view=aboutus" class="menu">About Us</a></li>
          <li><a href="<?php echo WEB_ROOT; ?>www/appointment" class="menu">Clinic</a></li>
 <? if ($position=='FACULTY'){?>
		<li><a href="<?php echo WEB_ROOT; ?>www/studentsAttendance" class="menu">Students</a></li>
<? }else{?>

          <li><a href="<?php echo WEB_ROOT; ?>www/myhistory" class="menu">History</a></li>
<?php
}?>
          <li><a href="<?php echo WEB_ROOT; ?>www/main/index.php?view=services" class="menu">Services</a></li>
          <li><a href="<?php echo WEB_ROOT; ?>www/main/index.php?view=contactus" class="menu">Contact Us</a></li>
        </ul>
      </div>
	  
	<!-- log in part -->  
	  
<?php
if ($session !='')
{
?>  
	 <div id="login">
        <div id="logintxtblank">
          <div id="loginheading">
          
          <table width="100%" ><tr><td>
            <font color=red size="-1">Welcome <?= $fname.' '.$lname;?></font><font color=blu size="-1"e><?php echo ' ('.$position.')';?></font>
          </div>
          <div><font size="-1">The Last Time You Visited the Site was <?php echo $lasttime;?></div>
		  <div><a href="index.php?logout" class="menu">logout </a> | <a href="<?php echo WEB_ROOT; ?>www/user/?view=profile&username=<?php echo $session;?>" class="menu">Profile </a><div>
          <td align="right"><img src="<?php echo WEB_ROOT;?>images/<?php echo $thumbnail;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </table>
          
          </div>
      </div>


<?php
}
else
	{
	
	//log in page
	?>
	<?php




?>
      <form method="post" name="frmLogin" action="">     
	 <div id="login">
        <div id="logintxtblank">
          <div id="loginheading">
            <h4>User Login</h4>
          </div>
          <div id="username">ID Number:</div>
          <div id="input">
            <label>
              <input name="txtUserName" type="text" />
            </label>
          </div>
          <div id="password">Password:</div>
          <div id="input02">
            <label>
              <input name="txtPassword" type="password" />
            </label>
          </div>
          <div id="loginbutton"><input type="submit" Value='login'  /></div>
          <div id="member">Not yet a Member? </div>
          <div id="register"><a href="" onclick='alert("Online Registration is not Allowed\nPlease Visit CSA-B for Manual Registration\n Present your Valid CSA-B ID")' class="register">Register Now</a></div>
        </div>
      </div>
	  </form>
	  
	  
 <?
if ($errorMessage !='')
{
?>
<script>
alert('<?php echo $errorMessage;?>');
</script>

<?
}
else
{
}
?>
	
	
	<?php
	}

	  ?>
	<!-- log in part end --> 
	  
	  
	  
    </div>
  </div>
</div>
<div id="contentbg">
  <div id="contentblank">
    <div id="content">
	
	
	
<!--content left-->	
	
      <div id="contentleft">
        <div id="leftheading">
          <h4>News &amp; Updates</h4>
        </div>
        <div class="lefttxtblank">
          <div class="lefticon">16</div>
          <div class="leftboldtxtblank">
            <div class="leftboldtxt">Your health ...</div>
            <div class="lefttxt">by PATTI NEIGHMOND || February 19, 2014 4:10 PM</div>
          </div>
          <div class="leftnormaltxt">Parents And Teens Aren't Up To Speed On HPV Risks, Doctors Say.</div>
          <div class="morebutton"><a href="<?php echo WEB_ROOT;?>www/main/index.php?view=1" class="more">read more... </a></div>
        </div>
        <div class="lefttxtblank02">
          <div class="lefticon">16</div>
          <div class="leftboldtxtblank">
            <div class="leftboldtxt">Stethoscopes..
</div>
            <div class="lefttxt">by LINDA POON ||
February 27, 2014 1:05 PM</div>
          </div>
          <div class="leftnormaltxt">That stethoscope may have more germs than you'd expect. ...</div>
          <div class="morebutton"><a href="<?php echo WEB_ROOT;?>www/main/index.php?view=2" class="more">read more... </a></div>
        </div>
        <div class="lefttxtblank02">
          <div class="lefticon">16</div>
          <div class="leftboldtxtblank">
            <div class="leftboldtxt">
            Treatments and Tests

            
            
            </div>
            <div class="lefttxt">
            
           
February 26, 2014 5:01 PM</div>
          </div>
          <div class="leftnormaltxt"> Blood Test Provides More Accurate Prenatal Testing For Down Syndrome
by ROB STEIN.</div>
          <div class="morebutton"><a href="<?php echo WEB_ROOT;?>www/main/index.php?view=3" class="more">read more... </a></div>
        </div>
        <div id="leftnavheading">
        </div>
		<br>
		<div>
		<script type="text/javascript">
		
            calendar();
        </script>
		</div>
	 
      </div>
	  
<!--content middle-->	
	
      <div id="contentmid">
	  
	  
        <div class="midheading">
        </div>
        <div class="midtxt">
		  <?php echo $successMessage;?>  
    <?php echo $errorMessage;?>  
		<?php require_once $content;?>
		
		</div>
<!--content middle-->	
	  
	  
	  
<!--content end end-->	
	  
    </div>
  </div>
</div>
<div id="footerbg">
  <div id="footerblank">
  <br>
   <div align="center"><a href="<?php echo WEB_ROOT;?>www/main/" class="footerlinks">Home</a> | <a href="<?php echo WEB_ROOT;?>www/main/?view=aboutus" class="footerlinks">About Us</a> | <a href="<?php echo WEB_ROOT;?>www/main/?view=services" class="footerlinks">Services</a> | <a href="<?php echo WEB_ROOT;?>www/main/?view=contactus" class="footerlinks">Conact Us</a></div>
      <div align="center">� Copyright 2014. All Rights Reserved.</div>
      <div align="center">Group Name: team ngangabu </div>
   
    
  </div>
</div>
</body>
</html>

 <?
if ($alertlogin !='')
{
?>
<script>
alert('<?php echo $alertlogin;?>');
</script>

<?
}
else
{
}
?>