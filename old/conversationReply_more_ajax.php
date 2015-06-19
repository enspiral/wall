 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest comment 
include_once 'includes.php';
if(isSet($_POST['last_time']) && isSet($_POST['c_id']) )
{	
$last=mysqli_real_escape_string($db,$_POST['last_time']);
$top_c_id=mysqli_real_escape_string($db,$_POST['c_id']);
include('html_conversationReply.php');
}
?>
