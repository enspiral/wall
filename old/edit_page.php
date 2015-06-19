<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST['save_edit_social_need']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_sn_title = $_POST['social_need_title'];
    $save_sn_content = $_POST['social_need_content'];
    $save_sn_keywords = $_POST['social_need_keywords'];
    $save_sn_id = $_POST['social_need_id'];
    $save_sn = $Wall->Update_Social_Need($save_sn_id, $save_sn_title, $save_sn_content,$save_sn_keywords);
    if($save_sn){
         header("Location:group.php?gid=".$_POST['social_need_pid']."&ptab=contents");
    }
}

if(isset($_POST['save_edit_program']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_prog_title = $_POST['program_title'];
    $save_prog_content = $_POST['program_content'];
    $save_prog_keywords = $_POST['program_keywords'];
    $save_prog_id = $_POST['program_id'];
    $save_prog = $Wall->Update_Program_or_Plan($save_prog_id, $save_prog_title, $save_prog_content,$save_prog_keywords);
    if($save_prog){
         header("Location:group.php?gid=".$_POST['program_pid']."&ptab=contents");
    }
}

if(isset($_POST['save_edit_outcome']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_outcome_title = $_POST['outcome_title'];
    $save_outcome_content = $_POST['outcome_content'];
    $save_outcome_keywords = $_POST['outcome_keywords'];
    $save_outcome_id = $_POST['outcome_id'];
    $save_outcome = $Wall->Update_Outcome($save_outcome_id, $save_outcome_title, $save_outcome_content,$save_outcome_keywords);
    if($save_outcome){
         header("Location:group.php?gid=".$_POST['outcome_pid']."&ptab=contents");
    }
}

if(isset($_POST['save_edit_post']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_post_content = $_POST['post_content'];
    $save_post_reference = $_POST['post_reference'];
    $save_post_id = $_POST['post_id'];
    $save_post = $Wall->Update_Dashboar_Slideshow_Post($save_post_id, $save_post_content, $save_post_reference);
    if($save_post){
         header("Location:edit_dashboard_post.php");
    }
}

if(isset($_POST['save_edit_admin_post']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_admin_post_content = $_POST['admin_post_content'];
    $save_admin_post_reference = $_POST['admin_post_reference'];
    $save_admin_post_id = $_POST['admin_post_id'];
    $save_admin_post = $Wall->Update_CPS_Admin_Post($save_admin_post_id, $save_admin_post_content, $save_admin_post_reference);
    if($save_admin_post){
         header("Location:edit_dashboard_admin_post.php");
    }
}

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
                      
                        if ($_GET['sn_id']){
                            $edit_sn_id = $_GET['sn_id'];
                            $data_social_need = $Wall->Get_Social_Need($edit_sn_id);
                            $edit_sn_title = $data_social_need['sn_title'];
                            $edit_sn_content = $data_social_need['sn_content'];
                            $edit_sn_lang = $data_social_need['sn_keywords'];
                            $edit_sn_pid = $data_social_need['sn_pid'];
                            include("edit_social_needs.php"); 
                        }
                        if($_GET['prog_id']){
                            $edit_prog_id = $_GET['prog_id'];
                            $data_prog = $Wall->Get_Program_or_Plan($edit_prog_id);
                            $edit_prog_title = $data_prog['prog_title'];
                            $edit_prog_content = $data_prog['prog_content'];
                            $edit_prog_lang = $data_prog['prog_keywords'];
                            $edit_prog_pid = $data_prog['prog_pid'];
                            include("edit_program.php"); 
                        }
                        
                        if($_GET['outcome_id']){
                            $edit_outcome_id = $_GET['outcome_id'];
                            $data_outcome = $Wall->Get_Outcome($edit_outcome_id);
                            $edit_outcome_title = $data_outcome['outcome_title'];
                            $edit_outcome_content = $data_outcome['outcome_content'];
                            $edit_outcome_lang = $data_outcome['outcome_keywords'];
                            $edit_outcome_pid = $data_outcome['outcome_pid'];
                            include("edit_outcome.php"); 
                        }
                        /* Dashboard Slideshow Post */
                        if($_GET['post_id']){
                            $edit_post_id = $_GET['post_id'];
                            $all_post = $Wall->Get_Each_Dashboard_Slideshow_Post($edit_post_id);
                            $post_content = $all_post['content'];
                            $post_reference = $all_post['reference'];
                            include("edit_each_post.php"); 
                        }
                         /* Dashboard Slideshow Post */
                        if($_GET['admin_post_id']){
                            $edit_admin_post_id = $_GET['admin_post_id'];
                            $all_admin_post = $Wall->Get_Each_CPS_Admin_Post($edit_admin_post_id);
                            $admin_post_content = $all_admin_post['content'];
                            $admin_post_reference = $all_admin_post['reference'];
                            include("edit_each_admin_post.php"); 
                        }
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