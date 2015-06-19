<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
session_start();
$session_uid=$_SESSION['uid'];
if(!empty($session_uid))
{
header("location:index.php");
}

$User = new User($db);

//Login
$login_error='';
if($_POST['user'] && $_POST['passcode'] )
{
$username=$_POST['user'];
$password=$_POST['passcode'];
if (strlen($username)>0 && strlen($password)>0)
{
$login=$User->User_Login($username,$password);

if($login)
{
$_SESSION['uid']=$login;
header("Location:index.php");
}
else
{
$login_error="<span class='error'>Username or Password is invalid</span>";
}
}
}

//Registration
/*$reg_error='';
if($_POST['email'] && $_POST['username'] && $_POST['password'] )
{
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];

$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$emain_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);


if (strlen($username)>0 && strlen($password)>0 && strlen($email) && $emain_check>0 && $username_check>0 && $password_check>0)
{
$reg=$User->User_Registration($username,$password,$email);

if($reg)
{
$_SESSION['uid']=$reg;
header("Location:index.php");
}
else
{
$reg_error="<span class='error'>Username or Email is already exists.</span>";
}


}
else
{
$reg_error="<span class='error'>Give valid Email, Username and Password(Minimum 6 Characters).</span>";
}
}

*/

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
<td width='50%' valign='top'>

<div id="loginbox" >
<div class="box">
<h4>Login</h4><br/>
<form method="post" action="" name="login">
<div class="loginLabel">User Name or Email:</div>
<input type="text" name="user" class="input" AUTOCOMPLETE='OFF'/>

<div class="loginLabel">Password:</div>
<input type="password" name="passcode" class="input" AUTOCOMPLETE='OFF'/>
<div ><?php echo $login_error; ?></div>
<div>
</div>
<a href="forgot.php">Forgot Password</a>
<div id="button">
<input type="submit" class="wallbutton messageButton" value="LOG IN">
<div style="margin-top:10px">
<a href='facebook_login.php'><img src='oauthimages/FacebookLogin.png' /></a><br/><br/>

<a href='google_login.php'><img src='oauthimages/GoogleLogin.png' /></a><br/><br/>

<a href='microsoft_login.php'><img src='oauthimages/MicrosoftLogin.png' /></a><br/><br/>

<a href='linkedin_login.php'><img src='oauthimages/LinkedinLogin.png' /></a>
</div>


</div>
</div>
</form>

</div>
</td>
<!--
<td width='50%' valign='top'>

<div id="regbox" >
<div class="box">
<h4>Registration</h4><br/>
<form method="post" action="" name="reg" id="signup">
<div class="loginLabel">Email:</div>
<input type="text" name="email" id="email" class="input" AUTOCOMPLETE="OFF" />
<div id="estatus"></div>
<div class="loginLabel">User Name:</div>
<input type="text" name="username" id="username" class="input" AUTOCOMPLETE='off' />
<div id="status"></div>
<div class="loginLabel">Password:</div>
<input type="password" name="password" id="password" class="input" AUTOCOMPLETE="OFF" />
<div ><?php //echo $reg_error; ?></div>
<div id="button">
<input type="submit" class="wallbutton" value="CREATE">
</div>

</form>
</div>
</div>

</td>
-->
</tr></table>

</div>
</body>
</html>
