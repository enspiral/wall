<!-- Timeline Profile HTML -->
<?php
if($arrow=="updates")
{
$arrow_updates='<span class="arrowUp"></span>';
}
else if($arrow=="friends")
{
$arrow_friends='<span class="arrowUp"></span>';
}
else
{
$arrow_photos='<span class="arrowUp"></span>';
}
?>
<div  id="timelineNav">
<div id="timelineButtons">
<?php
include('friend_buttons.php');
if($friend_status!='me')
{
?>
<span class="message">
<a href="<?php echo $base_url.'messages/'.$username;?>"  class='wallbutton messageButton'>Message</a>
</span>
<?php
}
?>
</div>
<ul>
<li>
<?php echo $arrow_updates ?>
<a href='<?php echo $base_url.'other_dashboard.php?username='.$username; ?>'><span id='update_count' class="timelineNum"><?php echo $session_update_count; ?></span> Updates</a></li>
<li>
<?php echo $arrow_friends ?>
<a href='<?php echo $base_url.'friends/'.$username; ?>'><span class="timelineNum"><?php echo $session_friend_count ?></span> Friends</a></li>
<li>
<?php echo $arrow_photos ?>
<a href='<?php echo $base_url.'photos/'.$username; ?>'><span id='update_count' class="timelineNum"><?php echo $session_photos_count; ?></span> Photos</a></li>
</ul>
</div>
</div>
