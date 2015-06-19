<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();
include_once '../includes/db.php';
include_once 'includes/Wall_Admin.php';
include_once '../includes/htmlcode.php';
include_once 'session.php';
$WallAdmin = new Wall_Admin($db);

include 'configurations.php';

?>
