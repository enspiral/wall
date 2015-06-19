<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();
include_once 'includes/db.php';
include_once 'includes/Wall_Updates.php';
include_once 'includes/textlink.php';
include 'includes/htmlcode.php';
include 'includes/nameFilter.php';
include 'includes/imageCheck.php';
include 'includes/Wall_Expand.php';
$Wall = new Wall_Updates($db);
include_once 'session.php';

include 'configurations.php';

/* Session Data */
include('user_session_data.php');


$url404=$base_url.'404.php';
$index_url=$base_url.'login.php';
?>
