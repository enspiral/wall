 <?php
 //Srinivas Tamada http://9lessons.info
include_once 'includes.php';
if(isSet($_POST['pid']))
{
$pid=$_POST['pid'];
$data=$Wall->Delete_Image($uid,$pid,$upload_path);
echo $data;
}
?>
