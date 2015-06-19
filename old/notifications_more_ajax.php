<?php
/*Srinivas Tamada http://9lessons.info
Load messages*/
include_once 'includes.php';
if(isSet($_POST['last_time']))
{
$last_time=mysqli_real_escape_string($db,$_POST['last_time']);
$updatesarray_notification=$Wall->Notifications($uid,$last_time,$notifications_perpage);
include('html_notifications.php');
}
?>
