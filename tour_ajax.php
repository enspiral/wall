 <?php
 //Srinivas Tamada http://9lessons.info
include_once 'includes.php';
if(isSet($_POST['tour']))
{
$data=$Wall->Tour($uid);
echo $data;
}
?>
