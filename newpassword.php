<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
session_start();
$session_uid=$_SESSION['uid'];
$User = new User($db);
if(!empty($session_uid))
{
header("location:index.php");
}

if(empty($_GET['id']))
{
header("location:index.php");
}
else
{
$get_active_code=$_GET['id'];
$Activecode=$User->Activecode($get_active_code);
if(empty($Activecode))
{
header("location:index.php");
}
}




$Get_Configurations=$User->Get_Configurations();
$forgot=$Get_Configurations['forgot'];
//Login
$login_error='';
if($_POST['newpassword'] && $_POST['confirmpassword']  )
{
$newpassword=$_POST['newpassword'];
$confirmpassword=$_POST['confirmpassword'];

if (strlen($newpassword)>=8)
{
if($newpassword==$confirmpassword)
{
$ChangePassword=$User->ChangePassword($newpassword,$get_active_code);
$login_error="<span class='msg'>Password has been changed successfully. </span>";
}
else
{
  $login_error="<span class='error'>New Password and Confirm Password not matched. </span>";
}
}
else
{
$login_error="<span class='error'>Password minimum 8 characters. </span>";
}

}





?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php include_once 'project_title.php'; ?>
<link rel="stylesheet"  href="<?php echo $base_url; ?>css/wall.css" />
<link rel="stylesheet"  href="<?php echo $base_url; ?>css/login.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>

</head>

<body style="background-color: #fbfbfb;">
<?php include_once 'block_logo_menu.php'; ?>
<div id='main'>

<table width='100%' style="margin-top:50px">

<tr>
<td  valign='top'>

<div id="loginbox" >
<div class="box" style="min-height:50px">
<h4>Change Password</h4><br/>
<form method="post" action="" name="login">
<div class="loginLabel">New Password:</div>
<input type="password" name="newpassword" class="input" AUTOCOMPLETE='OFF'/>

<div class="loginLabel">New Password:</div>
<input type="password" name="confirmpassword" class="input" AUTOCOMPLETE='OFF'/>

<div ><?php echo $login_error; ?></div>
<div>
</div>
<div id="button">
<input type="submit" class="wallbutton messageButton" value="SAVE">



</div>
</div>
</form>

</div>
</td>

</tr></table>

</div>
</body>
</html>
