<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$create_button="Create Community";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $com_name = $_POST['com_name'];
    $com_desc=$_POST['com_desc'];
    $com_location = $_POST['com_location'];
    $lang_setting = $_POST['lang_setting'];
    $usr_role = $_POST['usr_role'];

    $error_com_info1=''; $error_com_info2=''; $error_com_info3='';
    $error_com_info4=''; $error_com_info5=''; $error_com_info6='';
    $error_info7='';

    $validation = true;
    if(strlen($com_name)>0){
        if (!preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $com_name)) {
            $error_com_info1 = 'Invalid community name!';
            $validation = false;
        }
    }else{
       $error_com_info1 = 'This field is required!';
        $validation = false;
    }
    
    if(strlen($com_desc)<=0){
        $error_com_info2 = 'This field is required!';
        $validation = false;
    }
    if(strlen($com_location)==0){
        $error_com_info3 = 'This field is required!';
        $validation = false;
    }
   if(strlen($lang_setting)==0){
        $error_com_info4 = 'This field is required!';
        $validation = false;
    }
    if(strlen($usr_role)==0){
        $error_com_info5 = 'This field is required!';
        $validation = false;
    }
    if(strlen($_POST['usr_agreement'])==0){
        $error_com_info6 = 'Please check the agreement terms and conditions!';
        $validation = false;
    }

    if($validation)
    {
	$group_value=$Wall->Create_Community($com_name,$com_desc,$uid, $com_location, $lang_setting, $usr_role, $_POST['com_type'], $_POST['capacity']);
        header("Location:groups/".$group_value);
        
    }
    else
    {
        $msg="<span class='error'>Please give valid Community Name and Description!</span>";
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

<?php

include('block_createCommunity.php');
?>

<?php include_once 'block_footer.php';?>
</div>



</body>
</html>
