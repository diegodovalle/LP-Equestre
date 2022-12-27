<?php
include('qr.php');

$size		= 	200;

$type 		= 	$_GET["type"];
$title 		= 	$_GET["title"];
$url 		= 	$_GET["url"];
$name 		= 	$_GET["name"];
$address 	= 	$_GET["address"];
$phone 		= 	$_GET["phone"];
$email 		= 	$_GET["email"];
$subject 	= 	$_GET["subject"];
$message	= 	$_GET["message"];
$lat 		= 	$_GET["lat"];
$lon 		= 	$_GET["lon"];
$height 	= 	$_GET["height"];
$text 		= 	$_GET["text"];
$wifi_type 	= 	$_GET["wifi_type"];
$ssid 		= 	$_GET["ssid"];
$password 	= 	$_GET["password"];
$size	 	= 	$_GET["size"];

$qr = new BarcodeQR(); 

switch($type){
	
	case 'url' 		: 	$qr->url($url); break;
	case 'contact' 	:	$qr->contact($name, $address, $phone, $email); break;
	case 'email' 	:	$qr->email($email, $subject, $message); break;
	case 'geo' 		:	$qr->geo($lat, $lon, $height); break;
	case 'phone' 	:	$qr->phone($phone); break;
	case 'sms' 		:	$qr->sms($phone, $message); break;
	case 'text' 	:	$qr->text($text); break;
	case 'wifi' 	:	$qr->wifi($wifi_type, $ssid, $password); break;
	case 'bookmark' :	$qr->bookmark($text, $url); break;

}

$qr->draw($size);

?>