<?php 
$oc_id = $_GET['oc_id'];
$msg_id = $Wall->Get_Msg_Out_Id($oc_id);
$omsg_id=$msg_id;
 
 echo $oc_id.' '.$msg_id;

$data = $Wall->Project_Announcement_Outcome($msg_id);
//echo $sn_id.''.$msg_id;
$orimessage=$data['message'];
$message=htmlcode($orimessage);
$time=$data['created'];
$mtime=date("c", $time);
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
$share_status='Get Involved';


?>




<?php
// $sn_id = $_GET['sn_id'];
// //$msg_id=$data['msg_id'];
// $msg_id = $Wall->Get_Msg_id($sn_id);
// $omsg_id=$msg_id;
// echo $omsg_id;
// $announcement=$Wall->Project_Announcement($groupID, $uid,$msg_id);
//echo $sn_id.''.$msg_id;
// $orimessage=$data['message'];
// $message=htmlcode($orimessage);
// $time=$data['created'];
// $mtime=date("c", $time);
// $username=$data['username'];
// $uploads=$data['uploads'];
// $msg_uid=$data['uid_fk'];
// //$like_count=$data['like_count'];
// $comment_count=$data['comment_count'];
// $share_uid=$data['share_uid'];
// $share_ouid=$data['share_ouid'];
// $like_uid=$data['like_uid'];
// $like_ouid=$data['like_ouid'];
// $msg_group_id=$data['group_id_fk'];
// $group_msg_uid=$msg_uid;
// /* Group Details */
// $group_text='';
// $msg_group_owner_id='0';
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

$style='';
$border='';

if($like_ouid>0)
{
$style='stShareImg';
$border='stShareBorder';
$datanew=$Wall-> User_Details($like_ouid);
$username=$datanew['username'];
}


if($share_ouid>0)
{
$style='stShareImg';
$border='stShareBorder';
$datanew=$Wall-> User_Details($share_ouid);
$username=$datanew['username'];
}



/* Like Check */
$like=$Wall->Like_Check($msg_id,$uid);
if($like)
{
$like_status='Like';
}
else
{
$like_status='Unlike';
}
/* Share Check */
$share=$Wall->Share_Check($msg_id,$uid);
if($share)
{
$share_status='Get Involved';
}
else
{
$share_status='Unshare';
}


/* User Avatar*/
$face=$Wall->User_Profilepic($msg_uid,$base_url,$upload_path);
/* End Avatar */

if($like_count>0)
{
$shareuid=$Wall->Like_Msg($msg_id);
if($shareuid)
{
$datanew=$Wall->User_Details($shareuid);
$susername=$datanew['username'];
}
}

if($share_count>0)
{
$shareuid=$Wall->Share_Msg($msg_id);
if($shareuid)
{
$datanew=$Wall->User_Details($shareuid);
$susername=$datanew['username'];
}
}

if($group_msg_uid==$msg_uid)
{
 ?>
<div class="stbody" id="stbody<?php echo $omsg_id;?>" rel="<?php echo $time; ?>">

  <?php  
       $value = $Wall->Get_Project_Outcome_Each($oc_id,$msg_id);

                    $outcome_id = $value['outcome_id'];
                    $outcome_msg_id = $value['msg_id'];
                    $outcome_title = $value['msg_title'];
                    $outcome_content = $value['message'];
                    $outcome_keyword = $value['outcome_keywords'];
                    $outcome_image = $value['outcome_image'];

                

                // echo $sn_id.'Hello world';
?>
<div class="sttext full">
    <div class="swamper-image"><img src="<?php echo 'images/'.$outcome_image; ?>"></div>
    <div class="swamper-contain">
        <h4 style="padding:2px 14px;"><b>Titil</b>: <?php echo $outcome_title; ?></h4>
        <h4 style="padding:2px 14px;">Keyword: <b><?php echo $outcome_keyword; ?></b></h4>
        <p class="text-content"><?php echo html_entity_decode($outcome_content);?></p>
    </div>
<?php
if($like_count>0)
{
echo "<div class='sttext_share'>";
if($shareuid)
{
?>
<a href='<?php echo $base_url.$susername; ?>'><?php echo $Wall->UserFullName($susername); ?></a>
<?php
}
if($like_count>1)
{
$like_count=$like_count-1;
echo 'and <span id="like_count'.$omsg_id.'" class="numcount">'.$like_count.'</span> other friends like this. ';
}
else
{
echo 'like this';
}
echo "</div>";
}

if($share_count>0)
{
echo "<div class='sttext_share'>";
if($shareuid)
{
?>
<a href='<?php echo $base_url.$susername; ?>'><?php echo $Wall->UserFullName($susername); ?></a>
<?php
}
if($share_count>1)
{
$share_count=$share_count-1;
echo 'and <span id="like_count'.$omsg_id.'" class="numcount">'.$share_count.'</span> other friends shared this. ';
}
else
{
echo 'shared this';
}
echo "</div>";
}
?>

<div class='sttext_content'>

<?php
if($login)
{
if($msg_group_owner_id==$uid || $group_owner_id==$uid){
?>
<a class="stdelete" href="#" id="<?php echo $omsg_id;?>" rel="<?php echo $group_id;?>" title="Delete Group Update"></a>
<?php
} else if($uid==$msg_uid) { ?>
<a class="stdelete" href="#" id="<?php echo $omsg_id;?>" rel="" title="Delete Update"></a>
<?php }
}
 ?>

<?php
if($uploads)
{
    ?>

<?php echo 'This place for image<div class="img_container slider-wrapper"><div class="slider" id="slider'.$sn_id.'">';
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

}

?>
<div id="stexpandbox">
<div id="stexpand<?php echo $omsg_id;?>">
<?php
if(textlink($orimessage))
{
$link =textlink($orimessage);
$em = new Wall_Expand($link);
$site = $em->get_site();
if($site != "")
{

        $code = $em->get_iframe();
        if($code == "")
        {
                $code = $em->get_embed();
				if($code == "")
				{
				$codesrc=$em->get_thumb("medium");
				}
        }
        if($codesrc)
        {
        echo '<div class="img_container"><img src='.$codesrc.' class="imgpreview" /></div>';
        }
        else if($code)
        echo $code;
}
}
$codesrc='';
$code='';
?>
</div>
</div>
<div class='sttime'>
<a href='<?php echo $base_url ?>status/<?php echo $msg_id; ?>' class="timeago" title='<?php echo $mtime; ?>'></a>
</div>
</div>

<div class="sttext_content2">
<div class="st_like_share">
<?php
if($login)
{
?>
<a href='#' class='like like_button icontext' id='like<?php echo $omsg_id;?>' title='<?php echo $like_status;?>' rel='<?php echo $like_status;?>' data='<?php echo $shareKey ?>'><?php echo $like_status;?></a>
<a href='#' class='commentopen commentopen_button icontext' id='<?php echo $omsg_id;?>' rel='<?php echo $msg_id;?>' title='Comment'>Comment </a>
<?php if($uid != $msg_uid) { ?>

<!-- <a href="<?php //echo $base_url; ?>group.php?gid=<?php// echo $groupID; ?>&ptab=contents&p=program&sn_id=<?php echo $sn_id; ?>">
   <button id="<?php// echo $sn_id; ?>" class="btn btn-social">Get Involved</button>
</a> -->
<?php } } else { ?>
<a href='<?php echo $index_url; ?>' class='like icontext' >Like</a>
<a href='<?php echo $index_url; ?>' class='commentopen icontext'  title='Comment'>Comment </a>
<a href='<?php echo $index_url; ?>' class='share icontext'  title='Share'>Shares</a>
<a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program&sn_id=<?php echo $sn_id; ?>">
   <button id="<?php echo $sn_id; ?>" class="btn btn-social">Get Involved</button>
</a>

<?php
}
?>


<?php if($like_count>0)
{
$likesuserdata=$Wall->Like_Users($msg_id);
if($likesuserdata)
{
echo '<div class="likes" id="likes'.$omsg_id.'">';
$i=1;
$j=count($likesuserdata);
foreach($likesuserdata as $likesdata)
{
$you="likeuser".$omsg_id;
$likeusername=$likesdata['username'];
if($likeusername == $session_username)
{
$likeusername='You';
$you="you".$omsg_id;
}

echo '<a href="'.$base_url.$likeusername.'" id="'.$you.'">'.$Wall->UserFullName($likeusername).'</a>';
if($j!=$i)
{
echo ', ';
}
$i=$i+1;
}

if($like_count>3)
{
$like_count=$like_count-3;
echo ' and <span id="like_count'.$omsg_id.'" class="numcount">'.$like_count.'</span> others like this.';
}
else
{
echo ' like this.';
}

echo '</div>';
}
}
else
{
echo '<div class="likes" id="elikes'.$omsg_id.'" style="display:none"></div>';
}
?>
</div>
<div class="commentcontainer" id="commentload<?php echo $omsg_id;?>">
<?php
$x=1;
include('ann_cmt_load.php') ?>
</div>
<div class="commentupdate" style='display:none' id='commentbox<?php echo $omsg_id;?>'>
<div class="stcommentimg">
<img src="<?php echo $session_face;?>" class='comment_small_face'/>
</div>
<div class="stcommenttext" style="width:310px;">
<form method="post" action="">
<textarea name="comment" class="comment" maxlength="200"  id="ctextarea<?php echo $omsg_id;?>"></textarea>
<br />
<input type="submit"  value=" Comment "  id="<?php echo $omsg_id;?>" rel="<?php echo $msg_id;?>" class="comment_button wallbutton"/>
</form>
</div>
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
