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
<div id='main_left'>
<?php
include_once 'block_left.php';
?>
</div>

<div id="main_right">
<?php
include('block_allgroups.php');
?>
</div>

<?php include_once 'block_footer.php';?>
</div>

</body>
</html>
