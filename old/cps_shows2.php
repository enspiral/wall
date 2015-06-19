<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';
?>
<script type="text/javascript">
$(window).load(function()
{
$('#photosContainer').masonry({itemSelector : '.photoBody',});
});
</script>
</head>
<body>
	<?php include_once 'block_logo_menu.php'; ?>
	<div id="main">
		<?php include_once 'block_timeline.php'; ?>



		    <?php
			if($track=="members")
			{
                            include('block_friends_list.php');
			}
			else if($track == "photos")
			{
                            include('block_photos.php');
			}
		    ?>




	<?php include_once 'block_footer.php';?>
	</div>
	</body>
        

</html>