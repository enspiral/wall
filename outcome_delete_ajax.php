 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['outcome_id']))
{
$outcome_id=$_POST['outcome_id'];
$data=$Wall->Delete_Outcome($outcome_id);
echo $data;
}
?>
