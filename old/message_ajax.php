<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
//Srinivas Tamada http://9lessons.info
//Load latest update 
include_once 'includes.php';
if(isSet($_POST['update']))
{
$update=mysqli_real_escape_string($db,$_POST['update']);
$uploads=$_POST['uploads'];
$group_id=$_POST['group_id'];
$data=$Wall->Insert_Update($uid,$update,$uploads,$group_id);
if($data)
{
include("html_messages.php");
}
}



if(isset($_POST['annountment']))
{
$update=mysqli_real_escape_string($db,$_POST['annountment']);
$an_title=mysqli_real_escape_string($db,$_POST['an_title']);
$uploads=$_POST['uploads'];
$group_id=$_POST['group_id'];
$cate_id = 1;
$data=$Wall->Insert_Update($uid,'','',$update,$uploads,$group_id,$cate_id);
if($data)
{
include("html_messages.php");
}
}



// add social need...
if (isset($_POST['add_socail_need'])) {
    $update = mysqli_real_escape_string($db, $_POST['add_socail_need']);
    $sn_title = mysqli_real_escape_string($db, $_POST['sn_title']);
    $sn_keyword = mysqli_real_escape_string($db, $_POST['sn_keyword']);
    $uploads = $_POST['uploads'];
    $group_id = $_POST['group_id'];
    $cate_id=$_POST['post_type'];
    
    $data = $Wall->Insert_Update($uid, $sn_title, $sn_keyword, $update, $uploads, $group_id, $cate_id);
    if ($data) {
        include("html_messages.php");
    }
}

?>
