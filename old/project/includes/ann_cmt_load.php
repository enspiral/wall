<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php
 $commentsarray=$Wall->Comments($msg_id,0);

 if($x)
 {
 $comment_count=count($commentsarray);
$second_count=$comment_count-2;
if($comment_count>2)
{
?>
<div class="comment_ui" id="view<?php echo $omsg_id; ?>">
<?php
$link=$index_url;
$class='';
if($login){
$link='#';
$class='view_comments';
}
?>
<a href="<?php echo $link; ?>" class="<?php echo $class ?>" id="<?php echo $omsg_id; ?>" rel="<?php echo $msg_id; ?>" vi='<?php echo $comment_count; ?>' par="<?php echo $msg_uid; ?>">View all <?php echo $comment_count; ?> comments</a>

</div>
<?php
$commentsarray=$Wall->Comments($msg_id,$second_count);
}
}
if($commentsarray)
{

foreach($commentsarray as $cdata)
{
    $com_id=$cdata['com_id'];
    $comment=htmlcode($cdata['comment'] );
    $time=$cdata['created'];
    $mtime=date("c", $time);
    $username=$cdata['username'];
    $com_uid=$cdata['uid_fk'];
    $clike_count=$cdata['like_count'];
     // User Avatar
    $cface=$Wall->User_Profilepic($com_uid,$base_url,$upload_path);

      // End Avatar
     ?>
    <div class="stcommentbody" id="stcommentbody<?php echo $com_id; ?>">
    <div class="stcommentimg">
    <a href='<?php echo $base_url.'other_dashboard.php?username='.$username; ?>'><img src="<?php echo $cface; ?>" class='comment_small_face' alt='<?php echo $Wall->UserFullName($username); ?>' original-title='<?php echo $Wall->UserFullName($username); ?>'/></a>
    </div>
    <div class="stcommenttext" style="width:310px;">
    <?php
    if($login)
    {


    if($uid==$com_uid || $uid==$msg_uid ){ ?>
    <a class="stcommentdelete" href="#" id='<?php echo $com_id; ?>' title='Delete Comment'></a>
    <?php } } ?>
    <b><a href="<?php echo $base_url.'other_dashboard.php?username='.$username; ?>"><?php echo $Wall->UserFullName($username); ?></a></b> <?php echo $comment; ?>
    <div class='.stcommentFont'>

    <span class="stcommenttime" title="<?php echo $mtime; ?>"></span> -
    <?php
    if($login)
    {
    if($Wall->Comment_Like_Check($com_id,$uid))
    {
    echo '<a href="#" id="clike'.$com_id.'" class="commentlike" title="Like" rel="Like">Like</a>';
    } else {
    echo '<a href="#" id="clike'.$com_id.'" class="commentlike" title="Unlike" rel="Unlike">Unlike</a>';
    }
    }
    else
    {
    echo '<a href="'.$index_url.'"  class="commenttlike" >Like</a>';
    }
    $cstyle='';
    if($clike_count==0)
    {
    $cstyle='display:none';
    }

    ?>
    <span style="<?php echo $cstyle; ?>" id='count_container<?php echo $com_id; ?>'>
     - <span class='comment_count<?php echo $com_id; ?>'><?php echo $clike_count; ?></span>
    </span>
    </div>
    </div>
    </div>

    <?php
}
}
?>
