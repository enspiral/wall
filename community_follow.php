<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<?php
include_once 'includes.php';

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
           
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class=" div-content row group">
                    <div class="sidebar-left">
                        <?php // include_once 'block_left.php'; ?>
                    </div>
                    <div class="middle-content-dashboard">
                        <?php include 'community/dashboard/health.php'; ?>
                    </div>
                    <div class="sidebar-right-dabshoard">
                     <?php include_once 'block_right.php'; ?>
                     <p class="back-top">
                        <a href="#top"><span></span></a>
                    </p>
                    </div>
                    
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>