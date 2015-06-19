<?php
$profile_uid=$Wall->User_ID($username);
$UserDetails=$Wall->User_Details($profile_uid);
$friend_count=$UserDetails['friend_count'];
$session_friend_count=$UserDetails['friend_count'];
$session_update_count=$UserDetails['updates_count'];
$session_profile_bg=$UserDetails['profile_bg'];
$session_profile_bg_position=$UserDetails['profile_bg_position'];
$session_bio=htmlcode(nameFilter($UserDetails['bio'],150));
$session_verified=$UserDetails['verified'];
$session_photos_count=$UserDetails['photos_count'];
$profileface=$Wall->User_Profilepic($profile_uid,$base_url,$upload_path);

?>
