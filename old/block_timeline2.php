<?php
    /*Timeline Profile Values*/
	if(empty($session_profile_bg))
	{
	$margin='margin-top:-160px';
	}
	$timelineBG=$base_url.$upload_path.$session_profile_bg;
	
	$loginCheck=1;
	
	$timeline_pic=$profileface;
	$position=$session_profile_bg_position;
	$timeline_name=$Wall->UserFullName($username);
	$verified=$session_verified;


?>

<?php
include_once 'html_timeline.php';

 /*Timeline Profile Nav*/
include_once 'html_timeline_nav_profile.php';


?>
