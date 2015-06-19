<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST['submit_add_new_post']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $new_post_content = $_POST['new_post_content'];
    $new_post_reference = $_POST['new_post_reference'];
    $add_new_post = $Wall->Add_New_Dashboard_Slideshow_Post($new_post_content, $new_post_reference);
    if($add_new_post){
         header("Location:edit_dashboard_post.php");
    }
}
$all_dashboard_slideshow_post = $Wall->Get_Dashboard_Slideshow_Post();
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
                <div class="div-content">
                    <?php
                        include("edit_slideshow.php"); 
                    ?>
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>

<?php
if($session_tour==0)
{
echo '<script>introJs().start();</script>';
}
?>