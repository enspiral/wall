<?php
//Facebook Application Configuration.
$facebook_appid='Facebook App ID';
$facebook_app_secret='Facebook App Secret';
$facebook_scope='email,user_birthday,user_about_me'; // Don't modify this

$facebook = new Facebook(array(
'appId'  => $facebook_appid,
'secret' => $facebook_app_secret,
));
?>
