<div class="leftBlock">
<div class="small_title">Members</div>
<?php

if($group_id)
{
$friendslist=$Wall->Group_Followers($group_id,'', '', 35);
}
else
{
$friendslist=$Wall->Group_Followers($uid,'', '', 35);
}

if($friendslist)
{
foreach($friendslist as $f)
{
$fid=$f['uid'];
$fname=$f['username'];
$friend_face=$Wall->User_Profilepic($fid,$base_url,$upload_path);
echo '<a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" class="small_face" original-title="'.$Wall->UserFullName($fname).'" ></a>';
}
}
if($group_count>30)
{
?>
<div><a href="<?php echo $base_url.'friends/'.$username; ?>" class="link">View All</a></div>
<?php } ?>
</div>