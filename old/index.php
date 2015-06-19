<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
include_once 'create_project_validation.php';
include_once 'submit_dashboard.php';

$dashboard_info=$Wall->Get_Dashboard_Info();
$all_teach_n_learn = $Wall->Get_Teach_n_Learn();
$size_teach_n_learn = sizeof($all_teach_n_learn);
$all_steps = $Wall->Get_Steps_Sustain_Project();
$size_steps = sizeof($all_steps);
$all_dashboard_slideshow_post = $Wall->Get_Dashboard_Slideshow_Post();
$all_cps_admin_post = $Wall->Get_CPS_Admin_Post();
$all_volunteer_better = $Wall->Get_Volunteer_Better();
$size_volunteer_better = sizeof($all_volunteer_better);
$lastid=0;
$updatesarray_notification=$Wall->Notifications($session_uid,$lastid,$notifications_perpage);
$image_guide1 = $Wall->Get_Each_Image_Guide_Volunteer(1);
$image_guide2 = $Wall->Get_Each_Image_Guide_Volunteer(2);
$image_guide3 = $Wall->Get_Each_Image_Guide_Volunteer(3);
$project_news = $Wall->Get_Project_News($session_uid);
$all_manage_project = $Wall->Get_Manage_Projects($session_uid);

  

        $content_volunteer = $Wall->Get_Volunteer_Content();
               $content_id = $content_volunteer['id'];
               $content_descrition = $content_volunteer['decription'];
        
        $content_volunteer_two = $Wall->Get_Volunteer_Content_two();
               $content_id = $content_volunteer_two['id'];
               $content_descrition_two = $content_volunteer_two['decription'];
         
        $content_volunteer_three = $Wall->Get_Volunteer_Content_three();
               $content_id = $content_volunteer_three['id'];
               $content_descrition_three = $content_volunteer_three['decription'];
        $content_volunteer_four = $Wall->Get_Volunteer_Content_four();
               $content_id = $content_volunteer_four['id'];
               $content_descrition_four = $content_volunteer_four['decription'];
         $content_volunteer_five = $Wall->Get_Volunteer_Content_five();
               $content_id = $content_volunteer_five['id'];
               $content_descrition_five = $content_volunteer_five['decription'];
        
$p1_gid = 0;
$p2_gid = 0;
$p3_gid = 0;
$p4_gid = 0;

if($all_manage_project){
    $p1_gid = $all_manage_project['p1_gid'];
    $p2_gid = $all_manage_project['p2_gid'];
    $p3_gid = $all_manage_project['p3_gid'];
    $p4_gid = $all_manage_project['p4_gid'];
}

if($p1_gid>0){
    $p1_project_detail = $Wall->Group_Details($p1_gid);
    $p1_group_name = $p1_project_detail['group_name'];
    $p1_message = $Wall->Get_Last_Message($p1_gid);
    if($p1_message['cate_id']==1){
        $p1_content = "Announcement";
        $p1_url = $base_url."group.php?gid=".$p1_gid."&ptab=all_announcement";
    }else if($p1_message['cate_id']==2){
        $p1_content = "Needs Identified";
        $p1_url = $base_url."group.php?gid=".$p1_gid."&ptab=contents";
    }
    $p1_count = $Wall->Count_Project_Nitification($p1_gid);
            
}

if($p2_gid>0){
    $p2_project_detail = $Wall->Group_Details($p2_gid);
    $p2_group_name = $p2_project_detail['group_name'];
    $p2_message = $Wall->Get_Last_Message($p2_gid);
    if($p2_message['cate_id']==1){
        $p2_content = "Announcement";
        $p2_url = $base_url."group.php?gid=".$p2_gid."&ptab=all_announcement";
    }else if($p2_message['cate_id']==2){
        $p2_content = "Needs Identified";
        $p2_url = $base_url."group.php?gid=".$p2_gid."&ptab=contents";
    }
    $p2_count = $Wall->Count_Project_Nitification($p2_gid);
}

if($p3_gid>0){
    $p3_project_detail = $Wall->Group_Details($p3_gid);
    $p3_group_name = $p3_project_detail['group_name'];
    $p3_message = $Wall->Get_Last_Message($p3_gid);
    if($p3_message['cate_id']==1){
        $p3_content = "Announcement";
        $p3_url = $base_url."group.php?gid=".$p3_gid."&ptab=all_announcement";
    }else if($p1_message['cate_id']==2){
        $p3_content = "Needs Identified";
        $p3_url = $base_url."group.php?gid=".$p3_gid."&ptab=contents";
    }
    $p3_count = $Wall->Count_Project_Nitification($p3_gid);
}

if($p4_gid>0){
    $p4_project_detail = $Wall->Group_Details($p4_gid);
    $p4_group_name = $p4_project_detail['group_name'];
    $p4_message = $Wall->Get_Last_Message($p4_gid);
    if($p4_message['cate_id']==1){
        $p4_content = "Announcement";
        $p4_url = $base_url."group.php?gid=".$p4_gid."&ptab=all_announcement";
    }else if($p1_message['cate_id']==2){
        $p4_content = "Needs Identified";
        $p4_url = $base_url."group.php?gid=".$p4_gid."&ptab=contents";
    }
    $p4_count = $Wall->Count_Project_Nitification($p4_gid);
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
        <script>
            $(function(){
                $('.date-picker').datepicker({
                    format: 'mm-dd-yyyy',
                    endDate: '+0d',
                    autoclose: true
                });
            });

            function showHideProject(){
                 $('.dashboard-left-project').slideToggle();
            }

            function showHideOrg(){
                 $('.dashboard-left-org').slideToggle();
            }

            function showHideCom(){
                 $('.dashboard-left-com').slideToggle();
            }
             function showProFlo(){
                $('.dashboard-left-project-following').slideToggle();
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class="div-content">
                    <?php
                        if ($_GET['p']){
                            $page = $_GET['p'];
                           
                        } else {
                           $page = "my_dashboard"; 
                           
                        }  
                        include("$page.php");
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