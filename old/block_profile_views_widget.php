<?php
if($profile)
{
if($uid==$profile_uid)
{
$friendslist=$Wall->Profile_Viewed_List($uid,$friend_widget_list_count);
}
}
else
{
$friendslist=$Wall->Profile_Viewed_List($uid,$friend_widget_list_count);
}


if($friendslist)
{
?>
<div class="leftBlock">
<div class="small_title">Who's Viewed Your Profile</div>
<?php
foreach($friendslist as $f)
{
$fid=$f['uid'];
$fname=$f['username'];
$friend_face=$Wall->User_Profilepic($fid,$base_url,$upload_path);
echo '<a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" class="small_face" original-title="'.$Wall->UserFullName($fname).'" ></a>';
}
if($session_friend_count>$friend_widget_list_count)
{
?>
<div><a href="<?php echo $base_url.'friends/'.$username; ?>" class="link">View All</a></div>
<?php } ?>
</div>
<?php
}
?>
