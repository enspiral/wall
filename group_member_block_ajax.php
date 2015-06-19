 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update
include_once 'includes.php';
if(isSet($_POST['memberID']) && isSet($_POST['groupID']))
{
$memberID=$_POST['memberID'];
$group_id=$_POST['groupID'];
$type=$_POST['type'];
$data=$Wall->Group_Member_Block($uid,$memberID,$group_id,$type);
echo $data;

}
?>
