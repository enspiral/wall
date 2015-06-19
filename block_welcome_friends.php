<?php
$updatesarray=$Wall->Welcome_Friends($uid) ;

if($updatesarray)
{

 foreach($updatesarray as $data)
 {

 $friend_uid=$data['uid'];
 $friend_username=$data['username'];
 $aboutme=nameFilter($data['bio'],40);

$face=$Wall->User_Profilepic($friend_uid,$base_url,$upload_path);
 ?>
<div class="stbody <?php echo  $marginClass; ?>">
<div class="stimg">
<a href='<?php echo $base_url.'other_dashboard.php?username='.$friend_username; ?>'><img src="<?php echo $face;?>" class='big_face' alt='<?php echo $friend_username; ?>'/></a>
</div>
<div class="stfriend welcome_friend">
<div style='padding:10px'>
<?php
$profile_uid=$friend_uid;
include('friend_buttons.php');
?>
<b><a href="<?php echo $base_url.'other_dashboard.php?username='.$friend_username; ?>"><?php echo $Wall->UserFullName($friend_username); ?></a></b></br>
<?php echo $aboutme; ?>

</div>
</div>
</div>

 <?php

 }

 }
 else
 {
echo '<div id="noContent">No friends added</div>';
 }
 ?>
