<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
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
<title><?php echo ucfirst($username); ?> Photos</title>
<?php 
include_once 'js.php';
?>
</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
	<div id='main'>
	<?php include_once 'block_timeline.php'; ?>


			<div>
		    <?php 
		    include('block_photos.php'); 
		    ?>
		    </div>



	<?php include_once 'block_footer.php';?>
	</div>

<script type="text/javascript">
$(window).load(function()
{
$('#photosContainer').masonry({itemSelector : '.photoBody',});
});
</script>
</body>
</html>
