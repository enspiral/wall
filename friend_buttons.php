<span class="follow">

<?php

if($login)
{
$friend_status=$Wall->Friends_Check($uid,$profile_uid);
$friend_check=$Wall->Friends_Check_Count($uid,$profile_uid);
if($friend_check=='0')
{
?>
<a href="#"  class='wallbutton add-box addbutton' id='add<?php echo $profile_uid; ?>' p='1'>Follow</a>
<a href="#"  class='wallbutton rm-box removebutton'  id='remove<?php echo $profile_uid; ?>' style="display:none" p='1'>Following</a>
<?php
}
else if($friend_status=='me')
{
echo '<b class="you">You!</b>';
}
else if($friend_status=='fri')
{
?>
<a href="#"  class='wallbutton rm-box removebutton'  id='remove<?php echo $profile_uid; ?>' p='1'>Following</a>
<a href="#"  class='wallbutton add-box addbutton'  id='add<?php echo $profile_uid; ?>' style="display:none" p='1'>Follow</a>
<?php } }
else
{
	?>
<a href="<?php echo $index_url; ?>"  class='wallbutton add-box '  p='1'>Follow</a>
<?php
}
?>
<?php
if($groupID && $track && $group_owner_id==$uid)
{
if($profile_uid!=$uid)
{

if(isset($blockStatus))
{

if($blockStatus)
{
echo '<a href="#"  class="wallbutton blackButton groupMemberBlock" id="'.$profile_uid.'" rel="'.$groupID.'" t="1">Block</a>';
}
else
{
echo '<a href="#"  class="wallbutton whiteButton groupMemberBlock" id="'.$profile_uid.'" rel="'.$groupID.'" t="0">Unblock</a>';
}

}

}

}
?>
</span>
