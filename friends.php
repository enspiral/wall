<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$arrow='friends';
if($_GET['username'])
{
$username=$_GET['username'];
include_once 'public.php';

if(empty($profile_uid))
{
header("Location:$url404");
}
}
else
{
header("Location:$url404");
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php
include_once 'project_title.php';
?>
<title><?php echo ucfirst($username); ?>'s Friends</title>
<?php include_once 'js.php'; ?>
<style>

</style>
</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
	<div id='main'>
	<?php include_once 'block_timeline.php'; ?>

			<div>
		    <?php
		    include('block_friends_list.php');
		    ?>
		    </div>



	<?php include_once 'block_footer.php';?>
	</div>


</body>
</html>
