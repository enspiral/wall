<?php
if($updatesarray_notification)
{
foreach($updatesarray_notification as $data_noti)
{


$n_msg_id=$data_noti['msg_id'];
$n_orimessage=$data_noti['message'];
$n_message=htmlcode($n_orimessage);
$n_message=nameFilter($n_message,45);
$n_time=$data_noti['created'];
$n_mtime=date("c", $n_time);
$n_username=$data_noti['username'];
$n_msg_group_id=$data_noti['group_id_fk'];

$n_msg_suid=$data_noti['uid_fk'];
$n_session_data_suid=$Wall->User_Details($n_msg_suid);
$n_msg_suid_username=$n_session_data_suid['username'];

$n_msg_owneruid=$data_noti['ouid_fk'];
$n_session_data_owneruid=$Wall->User_Details($n_msg_owneruid);
$n_msg_owneruid_username=$n_session_data_owneruid['username'];

$n_type=$data_noti['type'];


$n_face=$Wall->User_Profilepic($n_msg_suid,$base_url,$upload_path);

if($n_msg_group_id>0)
{
$groupDetails=$Wall->Group_Details($n_msg_group_id);
$n_msg_group_name=$groupDetails['group_name'];
$n_msg_group_name=nameFilter($n_msg_group_name,25);
}

if($n_type=='5')
{
  $n_type='posted in <b>'.$n_msg_group_name.'</b> Group';
}
else if($n_type=='4')
{

  $n_type='is following your Group. <b>'.$n_msg_group_name.'</b>';
}
else if($n_type=='3')
{
  $n_type='is following you.';
}
else if($n_type=='2')
{
  $n_type='commented';
}
else if($n_type=='1')
{
  $n_type='liked';
}
else
{
  $n_type='shared';
}

if($uid!=$n_msg_owneruid)
{
$second_user=  "<b>".$Wall->UserFullName($n_msg_owneruid_username)."</b>'s";
}
else
{
$second_user= "<b>Your</b>";
}

if($n_msg_id)
{
if($cate_id == 2){
	$sn_id = $Wall->Get_SN_ID($n_msg_id);
	$notification_url = $base_url.'group.php?gid='.$group_id.'&ptab=contents&p=each_social&sn_id='.$sn_id;
}else if($cate_id==3){
	$prog_id = $Wall->Get_Prog_ID($n_msg_id);
	$notification_url = $base_url.'group.php?gid='.$group_id.'&ptab=contents&p=each_program_plan&pp_id='.$prog_id;
}else if($cate_id==4){
	$oc_id = $Wall->Get_Outcome_ID($n_msg_id);
	$notification_url = $base_url.'group.php?gid='.$group_id.'&ptab=contents&p=each_outcome&pp_id='.$oc_id;

}else{
	$notification_url=$base_url.'status/'.$n_msg_id;
}
}

else if($n_msg_group_id)
{
	//http://localhost/wall/group.php?gid=1
$notification_url=$base_url.'group.php?gid='.$n_msg_group_id;
}
else
{
	//http://localhost/wall/index.php?p=each_profile_user&profile_id=3
$notification_url=$base_url.'index.php?p=each_profile_user&profile_id='.$n_msg_suid;
}

?>
<a href="<?php echo $notification_url;?>" class="noti_a">
<div class="noti_stbody" id="<?php echo $n_time; ?>">
<div class="noti_stimg">
<img src="<?php echo $n_face;?>" class='noti_face' alt='<?php echo $Wall->UserFullName($n_msg_suid_username); ?>'  original-title='<?php echo $Wall->UserFullName($n_msg_suid_username); ?>' />
</div>
<div class="noti_sttext">
<b><?php echo $Wall->UserFullName($n_msg_suid_username); ?></b> <?php echo $n_type; ?> <?php if($n_msg_owneruid_username){ echo $second_user; }?>
<?php if($n_message){ echo " status: ".html_entity_decode($n_message); }?>
<div class="noti_sttime"> <span class="timeago" title='<?php echo $n_mtime; ?>'></span></div>
</div>
</div>
</a>

<?php

}
}
// else
// {
// echo '<h5 id="noupdates">No Notifications Found</h5>';
// }
?>