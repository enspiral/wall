<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'voluntl6_demo');
define('DB_PASSWORD', 'bu7.EGd-h{@Z');
define('DB_DATABASE', 'voluntl6_demo');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD,DB_DATABASE) or die(mysqli_connect_error());
mysqli_query ($db,"set character_set_results='utf8'");
$base_url='http://demo.volunteerbetter.com/';
$upload_path = "uploads/";  // Updates images path
$admin_path = "../".$upload_path;
$admin_base_url=$base_url.'WallAdmin/';
$uploadPrefix='wall';// Image prefix name
/*SMTP Details */
$smtpUsername='SMTP Username'; //yourname@gmail.com
$smtpPassword='SMTP Passwor';  //gmail password
$smtpHost='SMTP Host'; //tls://smtp.gmail.com
$smtpPort='SMTP Port'; //465
$smtpFrom='SMTP From Email'; //yourname@gmail.com
?>