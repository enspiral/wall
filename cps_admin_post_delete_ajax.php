 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['admin_post_id']))
{
$admin_post_id=$_POST['admin_post_id'];
$data=$Wall->Delete_CPS_Admin_Post($admin_post_id);
echo $data;
}
?>
