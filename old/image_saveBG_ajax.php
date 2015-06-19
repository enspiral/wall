 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update
include_once 'includes.php';
if(isSet($_POST['position']))
{
$position=$_POST['position'];
$typeid=$_POST['typeid'];
$type=$_POST['type'];
$data=$Wall->Save_BG_Position($typeid,$type,$position,$uid);
echo $data;
}
?>
