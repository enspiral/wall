 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['gid']))
{
$gid=$_POST['gid'];
$data=$Wall->Check_Project_Follower($session_uid,$gid);
if($data){
	echo "Thank you for following our project!";
}else{
	echo "You have already followed our project, thank you!";
}
}
?>
