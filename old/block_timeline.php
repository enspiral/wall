<?php
if($profile_uid)
{
	/*Timeline Profile Views*/
	if($uid!=$profile_uid)
	{
	$Wall->Profile_Viewed($uid,$profile_uid);
  }
    /*Timeline Profile Values*/
	if(empty($session_profile_bg))
	{
	$margin='margin-top:-160px';
	}
	$timelineBG=$base_url.$upload_path.$session_profile_bg;
	$loginCheck=0;
	if($profile_uid==$uid)
	{
	$loginCheck=1;
	}
	$timeline_pic=$profileface;
	$position=$session_profile_bg_position;
	$timeline_name=$Wall->UserFullName($username);
	$verified=$session_verified;
}
else
{
    /*Group Profile Values*/
	if(empty($group_bg))
	{
	$margin='margin-top:-160px';
	}
	$timelineBG=$base_url.$upload_path.$group_bg;;
	$loginCheck=0;
	if($group_owner_id==$uid)
	{
	$loginCheck=1;
	}
	$timeline_pic=$group_pic;
	$position=$group_bg_position;
	$timeline_name=$group_name;
	$verified=0;
}
?>

<?php
include_once 'html_timeline.php';
if($profile_uid)
{
 /*Timeline Profile Nav*/
include_once 'html_timeline_nav_profile.php';
}
else
{
 /*Timeline Group Nav*/
include_once 'html_timeline_nav_group.php';
}
?>
