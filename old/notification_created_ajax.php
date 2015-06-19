 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update
include_once 'includes.php';
if(!empty($uid))
{
$uid=mysqli_real_escape_string($db,$uid);
$data=$Wall->Notification_Created_Update($uid);
$lastid=0;
$updatesarray_notification=$Wall->Notifications($session_uid,$lastid,$notifications_perpage);
include 'html_notifications.php';
//echo $data;
}
?>
