<?php
 //Srinivas Tamada http://9lessons.info
//Load latest comment 
include_once 'includes.php';

if(isSet($_POST['group_id']))
{
$group_id=$_POST['group_id'];
$cdata=$Wall->Group_Remove($uid,$group_id);
echo $cdata;

}
?>
