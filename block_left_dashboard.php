<?php
$Template_Order=$Wall->Template_Order();

if($profile)
{
include_once 'block_profile_about.php';
}
else
{
include_once 'block_profile_dashboard.php';
}
/*
foreach($Template_Order as $data)
{
include_once $data['t_file'];
}


/*
include_once 'block_friends_widget.php';
include_once 'block_profile_views_widget.php';
include_once 'block_advertisments.php';
include_once 'block_groups_widget.php';
*/
?>
