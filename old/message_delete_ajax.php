 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['msg_id']))
{
$msg_id=$_POST['msg_id'];
$group_id=$_POST['group_id'];
$data=$Wall->Delete_Update($uid,$msg_id,$group_id);
echo $data;

}
?>
