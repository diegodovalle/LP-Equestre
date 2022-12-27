<?php

include '../../../../../wp-load.php';

$name = filter_var($_POST['name']);
$message = filter_var($_POST['message']);
$email = filter_var($_POST['email']);

$name_contents = $_POST['name'];
$message_contents = $_POST['message'];
$email_contents = $_POST['email'];

$subject = 'Contact Form: '.get_bloginfo('name');

$headers  = "From: ". strip_tags($_POST['name']) . ' <'.strip_tags($_POST['email']).">" . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message  = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td><strong>" . strip_tags($_POST['name']) . "</strong></td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$message .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($_POST['message']) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

function VerifyMailAddress($address) 
{
   $syntax = '#^[w.-]+@[w.-]+.[a-zA-Z]{2,5}$#';
   
   if(preg_match($syntax,$adrdess))
      return true;
   else
     return false;
}

if(in_array('', array($name, $message, $email))) {

	$result = "field_error";
	
} elseif( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {

	$result = "email_error";
	
} elseif($pub_key && $prv_key) {

	$resp = recaptcha_check_answer (PRIV_KEY, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
	if (!$resp->is_valid) {
		$result = "captcha_error";
	  } else {
	  	mail(get_option(THEMEPREFIX.'_general_email'), $subject , $message, $headers);
	    $result = "success";
	}
	
} else {
	mail(get_option(THEMEPREFIX.'_general_email'), $subject , $message, $headers);
	$result = "success";
}

echo $result;
 ?>