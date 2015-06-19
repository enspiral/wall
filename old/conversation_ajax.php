 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest comment 
include_once 'includes.php';
if(isSet($_POST['reply']) && isSet($_POST['cid']))
{
$reply=mysqli_real_escape_string($db,$_POST['reply']);
$cid=mysqli_real_escape_string($db,$_POST['cid']);
	$data=$Wall->ConversationReply_Insert($reply,$cid,$uid); 
	if($data)
	{
    include_once 'html_conversationReplycommon.php';
}
}
?>
