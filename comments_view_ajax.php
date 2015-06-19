 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update
include_once 'includes.php';
if(isSet($_POST['msg_id']) && $_POST['msg_uid'] )
{
$msg_id=$_POST['msg_id'];
$msg_uid=$_POST['msg_uid'];
$x=0;
include_once('comments_load.php');

}
?>
