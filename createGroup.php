<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$group_button="Create Group";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$group_name = $_POST['group_name'];
$group_desc=$_POST['group_desc'];
$group_check = preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $group_name);
$desc_check = preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $group_desc);

if(strlen($group_name)>0 && strlen($group_desc)>0 )
{
		$group_value=$Wall->Create_Group($group_name,$group_desc,$uid);
		if($group_value)
		{
		$link="<a href='".$base_url."groups/".$group_value."'>".$group_name."</a>";
		$msg="<span class='succ'>Group has been created. ".$link."  </span>";
		}
}
else
{
$msg="<span class='error'>Please give valid Group Name and Description!</span>";
}


}
$group_name="";
$group_desc="";

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
