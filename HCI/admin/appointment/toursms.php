<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$doctor = $_GET['doctor'];
$date = $_GET['date'];
$teacher = $_GET['teacher'];
$course = $_GET['course'];
$level = $_GET['level'];
$section = $_GET['section'];
$purpose = $_GET['purpose'];
$location = $_GET['location'];
?> 
<!-- start id-form -->

<font size='+2'> You have Successfully Reserved A Slot for Tour on <b><?= $date;?></b> / <b><?= $doctor;?></b>.</font><br><br>
<font size='+2'> Information or Updates have been Sent to Students <br><br>who have to go to the Clinic for a Check-Up on  <b><?= $date;?></b></b><br> <br>
<a href='index.php'>Done</a>  <a href='index.php?view=print&doctor=<?php echo $doctor;?>&date=<?php echo $date;?>&teacher=<?php echo $teacher;?>&course=<?php echo $course;?>&level=<?php echo $level;?>&section=<?php echo $section;?>&purpose=<?php echo $purpose;?>&location=<?php echo $location;?>'>Print Certificate</a> </font>
<br>
<br>
<br>
<br>

<font color='white'>
<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$search = (isset($_GET['search']) && $_GET['search'] > '') ? $_GET['search'] : '';

$sql = "SELECT user_phonenumber, user_fname, user_lname from tbl_user where user_course='$course' and user_level='$level' and user_section='$section'";
$result = dbQuery($sql);




//###################################################################################################	

########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "abc123";
$ozeki_url = "http://127.0.0.1:9501/api?";

########################################################
# Functions used to send the SMS message
########################################################
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: Ozeki PHP client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);
}

function ozekiSend($phone, $msg, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype=SMS:TEXT';
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($msg);

      $urltouse =  $ozeki_url.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      if ($debug) {
         //  echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }

      return($response);
}



while($row = dbFetchAssoc($result)) {
	extract($row);
	
	$i += 1;
	
	echo $user_fname.' '.$user_lname.' '.$user_phonenumber;  echo '<br>'; 
	

	

########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "abc123";
$ozeki_url = "http://127.0.0.1:9501/api?";
########################################################
# GET data from sendsms.html
########################################################

$phonenum = $user_phonenumber;
$message = 'Hi '.$user_fname.' '.$user_lname.', We would like to inform you that you have an appointment with '.$doctor.' on '.$date.' at the Clinic. Please Visit the Clinic on that Date and inform other '.$course.$level.'-'.$section;
$debug = true;

ozekiSend($phonenum,$message,$debug);

	
	
} // end while

?>
 