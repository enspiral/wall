<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
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
    <?php include_once 'block_timeline2.php'; ?>
<div id="dashboard_main_left">
<?php 
include_once 'cps_dash_proj_container.php'; ?>
</div>
<div id='dashboard_main_right'>
<b>Welcome <?php echo $Wall->UserFullName($session_username);?></b>
</div>
    
<?php include_once 'block_footer.php';?>

<?php
if($session_tour==0)
{
echo '<script>introJs().start();</script>';
}
?>
</div>
</body>
</html>
