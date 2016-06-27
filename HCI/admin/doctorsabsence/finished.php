<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$doctor = $_GET['doctor'];
$date = $_GET['date'];
?> 
<!-- start id-form -->

<font size='+2'> You have Successfully File an Absence for <b><?= $doctor;?></b> on <b><?= $date;?>.</b></font><br><br>
<font size='+2'> Information or Updates have been Sent to Students/or teachers <br><br>who reserved the Slot on  <b><?= $date;?></b>  and under <b><?= $doctor;?></b><br> <br>
<a href='index.php'>Done</a> </font>
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

$sql = "SELECT p_username, p_doctor, p_date from tbl_patient where p_doctor='$doctor' and p_date='$date'";
$result = dbQuery($sql);



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
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'alternate-row';
	}
	
	$i += 1;
	
	echo $p_username;  echo $p_doctor;  echo '<br>'; 
	

		$results = mysql_query("SELECT *
        FROM tbl_user where user_name='$p_username'");
		$show = mysql_fetch_array($results);	
		$phone= $show['user_phonenumber'];
		$fname= $show['user_fname'];
		$lname= $show['user_lname'];
	
	
	echo $phone;

//###################################################################################################	




########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "abc123";
$ozeki_url = "http://127.0.0.1:9501/api?";

########################################################
# GET data from sendsms.html
########################################################

$phonenum = $phone;
$message = 'Hi '.$fname.' '.$lname.', We regret to inform you that your reservation on '.$date.' under '.$doctor.' has just been canceled due to The leave of absence he/she filed on the said Date. Please visit the office or Make a New Reservation';
$debug = true;

ozekiSend($phonenum,$message,$debug);

dbQuery("Delete from tbl_patient where p_doctor='$doctor' and p_date='$date'");	
	
	
} // end while

?>
 