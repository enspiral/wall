<div id="fixed_header">
<div id='header'>
<div style="float:left">
<ul id="logonav"><li>
<!--<img src='<?php echo $base_url;?>wall_icons/WallScriptLogo.png'/>-->
</li>
<?php if($login) { ?>
<li class="prelavtive" >
<input type="text" class="topbarSearch" id="searchinput" placeholder="Search for people and groups."  data-step="2" data-intro="Search for Friends and Groups."/>
<div id="display" ></div>
</li>
<?php } ?>
</ul></div>
<div  id="topMenu">
<ul id='nav'>
<?php if($login) { ?>
<li><a href="<?php echo $index_url; ?>">Home</a></li>
<li><a href="<?php echo $base_url.$session_username; ?>">Profile</a></li>
<li class="prelavtive">
<?php if($session_conversation_count>0) {
echo "<span id='conversation_count' class='msg_count'>$session_conversation_count</span>";
} ?>
<a href="<?php echo $base_url.'messages.php';  ?>" class="con_image" data-step="6" data-intro="Your messages."></a></li>
<li id="notification_box" >
<?php
if($notifications_count>0)
{
?>
<span id='conversation_count' class='not_count'><?php echo $notifications_count; ?></span>
<?php } ?>
<a href="#" id="notificationLink" class="noti_image" data-step="5" data-intro="Notifications."></a>
<?php include_once 'block_notification.php'; ?>
</li>
<li><a href="<?php echo $base_url.'settings.php'; ?>" class="set_image" data-step="3" data-intro="Get to know your settings."></a></li>
<li><a href="<?php echo $base_url.'logout.php'; ?>">Logout</a></li>
<?php } else { ?>
<li><a href="<?php echo $base_url; ?>">Login</a></li>
<li><a href="<?php echo $base_url; ?>">Sign Up</a></li>
<?php	} ?>
</ul>
</div>
</div>
</div>
