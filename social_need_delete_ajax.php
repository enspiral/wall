 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['sn_id']))
{
$sn_id=$_POST['sn_id'];
$data=$Wall->Delete_Social_Need($sn_id);
echo $data;
}
?>
