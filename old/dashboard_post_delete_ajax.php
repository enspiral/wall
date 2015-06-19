 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['post_id']))
{
$post_id=$_POST['post_id'];
$data=$Wall->Delete_Dashboar_Slideshow_Post($post_id);
echo $data;
}
?>
