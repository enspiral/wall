 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['prog_id']))
{
$prog_id=$_POST['prog_id'];
$data=$Wall->Delete_Program_or_Plan($prog_id);
echo $data;
}
?>
