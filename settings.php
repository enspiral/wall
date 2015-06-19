<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];
$full_name = $_POST['full_name'];
$aboutme = $_POST['aboutme'];
$p_status = $_POST['avatar'];
$full_check = preg_match('~^[A-Za-z0-9_. ]{3,50}$~i', $full_name);
$aboutme_check = preg_match("~^[A-Za-z0-9_.',;:&$# ]{3,150}$~i", $aboutme);
if(strlen($full_name)>0 && strlen($aboutme)>0 && $full_check>0 && $aboutme_check>0 )
{
$settings=$Wall->Update_Settings($full_name,$uid,$p_status,$aboutme);
if($settings)
{
$msg="<span class='succ'>Profile details updated.</span>";
include('user_session_data.php');
}
}
else
{
$msg="<span class='error'>Please give valid Name and About Me.</span>";
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
include('block_settings.php');
?>
</div>

<?php include_once 'block_footer.php';?>
</div>

</body>
</html>
