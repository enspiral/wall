<div id="new_wall_container">
<h3>Notifications</h3>
<div id="total_notifications">
<input type="hidden" value='1' id="notification_check" />
<?php
$lastid=0;
$updatesarray_notification=$Wall->Notifications($session_uid,$lastid,$notifications_perpage);
include 'html_notifications.php';
?>
</div>
</div>
