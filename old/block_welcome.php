<div id="new_wall_container" data-step="8" data-intro="Follow people you know." data-position="left">
<h3>Welcome to <?php echo $applicationName ?>, <?php echo $Wall->UserFullName($session_username);?></h3>

<h5>People You May Know</h5><br/>
<?php
include 'block_welcome_friends.php';
?>

</div>
