<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
include_once 'includes/sendMail.php';
include_once 'includes/Wall_Updates.php';
session_start();
$session_uid=$_SESSION['uid'];
if(!empty($session_uid))
{
header("location:index.php");
}

$User = new User($db);

$Get_Configurations=$User->Get_Configurations();
$forgot=$Get_Configurations['forgot'];
//Login
$login_error='';
if($_POST['user'] )
{
$username=$_POST['user'];

if (strlen($username)>0)
{


$forgot=$User->Forgot($username,$forgot);


if($forgot)
{
$Wall = new Wall_Updates($db);
$fuid=$Wall->User_ID($username);
$data=$Wall->User_Details($fuid);
$newpassword_url=$base_url.'newpassword.php?id='.$forgot;

include 'configurations.php';


$to=$data['email'];
$uname=$data['username'];

$emailName=$Wall->UserFullName($uname);


$subject ='Somebody request a new password for your '.$applicationName.' account';
$body="Hi ".$emailName.",<br/> <br/>Somebody recenlty asked to reset your ".$applicationName." password. <br/><br/><a href='".$newpassword_url."'>Click here to change your password.</a><br/><br/>Support<br/>".$base_url;

sendMail($to,$subject,$body,$smtpHost,$smtpPort,$smtpUsername,$smtpPassword,$smtpFrom,$applicationName);
$login_error="<span class='msg'>Please check your email for new password.</span>";


}
else
{
$login_error="<span class='error'>Username or Email is not found. </span>";
}


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
<h4>Forgot Password</h4><br/>
<form method="post" action="" name="login">
<div class="loginLabel">User Name or Email:</div>
<input type="text" name="user" class="input" AUTOCOMPLETE='OFF'/>

<div ><?php echo $login_error; ?></div>
<div>
</div>
<div id="button">
<input type="submit" class="wallbutton messageButton" value="SUBMIT">



</div>
</div>
</form>

</div>
</td>

</tr></table>

</div>
</body>
</html>
