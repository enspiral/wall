<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST['submit_add_new_admin_post']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $new_admin_post_content = $_POST['new_admin_post_content'];
    $new_admin_post_reference = $_POST['new_admin_post_reference'];
    $add_new_admin_post = $Wall->Add_New_CPS_Admin_Post($new_admin_post_content, $new_admin_post_reference);
    if($add_new_admin_post){
         header("Location:edit_dashboard_admin_post.php");
    }
}
$all_cps_admin_post = $Wall->Get_CPS_Admin_Post();
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
                        include("edit_admin_post.php"); 
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