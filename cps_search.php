<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
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
                <!-- <div class="div-content"> -->
                    <?php
                        include("fine_search.php");
                    ?>
                <!-- </div> -->
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>