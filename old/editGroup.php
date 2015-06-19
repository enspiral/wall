<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if($_GET['id'] && $_GET['del'])
{
$group_id=$_GET['id'];
$groupCheck=$Wall->Group_Delete($uid,$group_id);
}

if($_GET['id'])
{
$group_id=$_GET['id'];
$groupCheck=$Wall->Group_Edit_Check($uid,$group_id);
if(empty($groupCheck))
{
header("location:$url404");
}

$data=$Wall->Group_Details($group_id);
$group_button="Update Group";
if(!empty($data))
{
$new_group_name=$data['group_name'];
$new_group_desc=$data['group_desc'];
}
else
{
header("location:$url404");
}

}
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{

$group_name = $_POST['group_name'];
$group_desc=$_POST['group_desc'];
$group_check = preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $group_name);
$desc_check = preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $group_desc);

if(strlen($group_name)>0 && strlen($group_desc)>0  )
{

$settings=$Wall->Update_Group($group_name,$group_desc,$uid,$group_id);
if($settings)
{
$new_group_name=$group_name;
$new_group_desc=$group_desc;
$msg="<span class='succ'>Group has been updated. </span>";

}
}
else
{
$msg="<span class='error'>Please give valid Grop Name and Description!</span>";
}


}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php include_once 'project_title.php';
include_once 'js.php';
?>
<style>
#settings td
{
padding:4px
}
.label
{
text-align:right;
font-weight:bold;
}
</style>
</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
<div id='main'>
<div id='main_left'>
<?php
include_once 'block_left.php';
?>
</div>

<div id="main_right">
<?php

include('block_createGroup.php');
?>
</div>



<?php include_once 'block_footer.php';?>
</div>



</body>
</html>
