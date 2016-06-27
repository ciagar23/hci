<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '';

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HCI</title>
<link rel="stylesheet" href="include/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="include/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="include/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="include/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>

</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="apDiv1"></div>
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
<br><br><br><br><br><br><br><br><br><br>
     
      <form method="post" name="frmLogin" id="frmLogin" class="login">
      
<table border="4" bordercolor="#0033FF" bgcolor="#FFFFFF">
      <tr><td>&nbsp;
      
		<table border="0" width="400" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" >
		<tr>
        <td width="30" rowspan="4">&nbsp;</td>
        <td height="30" colspan="2">&nbsp;</td>
        <td width="30" rowspan="4">&nbsp;</td>
        <tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp"  name="txtUserName" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password"  name="txtPassword"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
		<tr>
			<td colspan="4" align="center"><input type="image" src="include/images/login/login.jpg"  /></td>
		</tr>
        
		</table>
</table>
	</div>

 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->

</div>
<!-- End: login-holder -->
</body>
</html>
 
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