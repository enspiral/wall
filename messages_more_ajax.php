<?php
/*Srinivas Tamada http://9lessons.info
Load messages*/
include_once 'includes.php';
if(isSet($_POST['lastid']) && isSet($_POST['profile_id']))
{
$lastid=mysqli_real_escape_string($db,$_POST['lastid']);
$profile_uid=mysqli_real_escape_string($db,$_POST['profile_id']);
$groupID=mysqli_real_escape_string($db,$_POST['group_id']);
$lastmsg=mysqli_real_escape_string($db,$lastmsg);
include('messages_load.php');
}
?>
