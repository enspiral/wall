<?php
$msg_id=$data['msg_id'];
$orimessage=$data['message'];
$message=htmlcode($orimessage);
$time=$data['created'];
//$mtime=date("c", $time);
$mtime = date("d-m-Y", $time);
$username=$data['username'];
$uploads=$data['uploads'];
$msg_uid=$data['uid_fk'];
//$like_count=$data['like_count'];
$comment_count=$data['comment_count'];
$share_uid=$data['share_uid'];
$share_ouid=$data['share_ouid'];
$like_uid=$data['like_uid'];
$like_ouid=$data['like_ouid'];
$msg_group_id=$data['group_id_fk'];
$group_msg_uid=$msg_uid;
/* Group Details */
$group_text='';
$msg_group_owner_id='0';
if($msg_group_id)
{
    $groupDetails=$Wall->Group_Details($msg_group_id);
    $msg_group_name=$groupDetails['group_name'];
    $msg_group_owner_id=$groupDetails['group_owner_id'];
    $msg_group_name=nameFilter($msg_group_name,25);
    $group_text='posted in <b><a href="'.$base_url.'group.php?gid='.$msg_group_id.'">'.$msg_group_name.'</a></b>';
    $group_msg_uid=$Wall->User_ID($username);
}

$share_count=0;
$like_count=0;
$shareKey=0;
$omsg_id=$msg_id;

if($like_uid!=$like_ouid)
{
$like_count=$data['like_count'];
$omsg_id='s'.$msg_id;
$shareKey=1;
}


if($share_uid!=$share_ouid)
{
$share_count=$data['share_count'];
$omsg_id='s'.$msg_id;
$shareKey=1;
}


/* User Avatar*/
$face=$Wall->User_Profilepic($msg_uid,$base_url,$upload_path);
/* End Avatar */

if($group_msg_uid==$msg_uid)
{
 ?>
<div class="stbody" id="stbody<?php echo $omsg_id;?>" rel="<?php echo $time; ?>">

<div class="sttext">
<div class='sttext_content'>
<?php echo $message; ?>
<?php
if($uploads)
{
echo '<div class="img_container slider-wrapper"><div class="slider" id="slider'.$omsg_id.'">';
$s = explode(",", $uploads);
$i=1;
$f=count($s);
foreach($s as $a)
{
$newdata=$Wall->Get_Upload_Image_Id($a);
if($newdata)
{
$final_image=$base_url.$upload_path.$newdata['image_path'];
echo '<div class="slide'.$i.'" ><a href="'.$final_image.'" data-lightbox="lightbox'.$msg_id.'"><img src="'.$final_image.'" class="imgpreview" id="'.$omsg_id.'" rel="'.$msg_id.'"/></a></div>';
}
$i=$i+1;
}
echo '</div><div class="slider-direction-nav" id="slider_direction_'.$omsg_id.'"></div><div class="slider-control-nav" id="slider_control_'.$omsg_id.'"></div></div>';

}else{
    $no_image = $base_url."uploads/group_141424917232.png";
    echo '<div class="img_container slider-wrapper"><div class="slider" id="slider'.$omsg_id.'">';
    echo '<div class="slide'.$i.'" ><a href="'.$no_image.'" data-lightbox="lightbox'.$msg_id.'"><img src="'.$no_image.'" class="imgpreview" id="'.$omsg_id.'" rel="'.$msg_id.'"/></a></div>';
    echo '</div><div class="slider-direction-nav" id="slider_direction_'.$omsg_id.'"></div><div class="slider-control-nav" id="slider_control_'.$omsg_id.'"></div></div>';
    
}

?>
<div class='sttime'>
<?php echo $mtime; ?>
</div>
</div>

</div>

</div>
<?php
if($uploads)
{
if($f>=2)
{
echo '<script> $("#slider'.$omsg_id.'").livequery(function () {  var H=$("#slider_direction_'.$omsg_id.'").html();  if (H.length>0) {  $("#slider_direction_'.$omsg_id.'").html(""); $("#slider_control_'.$omsg_id.'").html(""); } $(this).leanSlider({directionNav: "#slider_direction_'.$omsg_id.'",controlNav:"#slider_control_'.$omsg_id.'"}); });     </script>';
}
}


} ?>
