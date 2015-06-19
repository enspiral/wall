<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$create_button="Create Organization";


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $org_name = $_POST['org_name'];
    $org_desc = $_POST['org_desc'];
    $org_location = $_POST['org_location'];
    $org_website = $_POST['org_website'];
    $usr_role = $_POST['usr_role'];
    $contact = $_POST['contact'];

    $error_org_info1=''; $error_org_info2=''; $error_org_info3='';
    $error_org_info4=''; $error_org_info5=''; $error_org_info6='';
    $error_org_info7='';
    
    $validation = true;
    if(strlen($org_name)>0){
        if (!preg_match('~^[A-Za-z0-9.,+-_ ]{2,20}$~i', $org_name)) {
            $error_org_info1 = 'Invalid project name!';
            $validation = false;
        }
    }else{
        $error_org_info1 = 'This field is required!';
        $validation = false;
    }
    
    if(strlen($org_desc)<=0){
        $error_org_info2 = 'This field is required!';
        $validation = false;
    }
    if(strlen($org_location)==0){
        $error_org_info3 = 'This field is required!';
        $validation = false;
    }
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$org_website)){
        $error_org_info4 = "Sorry, please enter a valid website.";
        $validation = false;
    }
    if(strlen($usr_role)==0){
        $error_org_info5 = 'This field is required!';
        $validation = false;
    }
    if(strlen($contact)==0){
        $error_org_info6 = 'This field is required!';
        $validation = false;
    }
    if(strlen($_POST['usr_agreement'])==0){
        $error_org_info7 = 'Please check the agreement terms and conditions!';
        $validation = false;
    }

    if($validation)
    {
	/*$group_value=$Wall->Create_Group($group_name,$group_desc,$uid);
        if($group_value)
        {
        $link="<a href='".$base_url."groups/".$group_value."'>".$group_name."</a>";*/
        $group_value=$Wall->Create_Organization($org_name,$org_desc,$uid, $org_location, $org_website, $usr_role, $contact, $_POST['org_type'], $_POST['status_sent']);
      //  $group_value = 3;
        header("Location:groups/".$group_value);
      //  $msg="Organization has been created!";
        //}
    }
    else
    {
        $msg="<span class='error'>Please check your form again!</span>";
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

include('block_createOrganization.php');
?>

<?php include_once 'block_footer.php';?>
</div>



</body>
</html>
