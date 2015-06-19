<?php
include_once 'includes.php';

//if($_GET['groupID'])
if($_GET['gid'])
{
//$groupID=$_GET['groupID'];
$groupID=$_GET['gid'];
$GroupDetails=$Wall->Group_Details($groupID);
$ProjectDetails = $Wall->Project_Details($groupID);
$group_member_id=$Wall->Group_Follower_Check($uid,$groupID);
$group_id=$GroupDetails['group_id'];
$group_name=htmlcode($GroupDetails['group_name']);
$group_name=nameFilter($group_name,35);
$group_desc=htmlcode($GroupDetails['group_desc']);
$group_owner_id=$GroupDetails['group_owner_id'];
$group_pic=$GroupDetails['group_pic'];
$group_pic=imageCheck($group_pic,$upload_path,$base_url);
$group_count=$GroupDetails['group_count'];
$group_bg=$GroupDetails['group_bg'];
$group_updates=$GroupDetails['group_updates'];
$group_bg_position=$GroupDetails['group_bg_position'];
$proj_start_date = $ProjectDetails['start_date'];
$proj_end_date = $ProjectDetails['end_date'];
$proj_intro = $ProjectDetails['proj_intro'];
$proj_lang = $ProjectDetails['proj_lang'];
//$social_need = $ProjectDetails['social_need'];
//$program = $ProjectDetails['program'];
//$outcome = $ProjectDetails['outcome'];
$proj_location = $ProjectDetails['location'];
$com_id = $ProjectDetails['com_id'];

if($ProjectDetails['com_id']!=0){
    
    $CommunityDetails = $Wall->Community_Details($ProjectDetails['com_id']);
    $com_location = $CommunityDetails['location'];
}

//$area_of_focus = $Wall->Get_Project_Social_Needs_keywords($group_id);
// Project's Update
$announcement=$Wall->Project_Announcement($groupID, $uid);
$memberslist=$Wall->Group_Followers($group_id,'', '', 35);

$groupStatus=$Wall->Group_Status_Check($uid,$groupID);
if($groupStatus=='0')
{
header("Location:$url404");
}

if(empty($group_id))
{
header("Location:$url404");
}

if(isset($_POST['submit_proj_intro'])){
    $proj_intro = $_POST['p1_intro'];
    $Wall->Update_Proj_Intro($proj_intro,$group_id);
}
if(isset($_POST['cancel_proj_intro'])){
    $proj_intro = $proj_intro;
}

if(isset($_POST['submit_proj_lang'])){
    $proj_lang = $_POST['proj_lang'];
    $Wall->Update_Proj_Lang($proj_lang,$group_id);
}
if(isset($_POST['cancel_proj_lang'])){
    $proj_lang = $proj_lang;
}

if(isset($_POST['submit_proj_social_need'])){
    $social_need_title = $_POST['social_need_title'];
    $social_need_content = $_POST['new_social_need'];
    $social_need_keywords = $_POST['social_need_keywords'];
    $Wall->Add_Social_Need($social_need_title, $social_need_content, $social_need_keywords, $group_id, $uid);
}

if(isset($_POST['submit_proj_program'])){
    $program_title = $_POST['program_title'];
    $program_content = $_POST['new_program'];
    $program_keywords = $_POST['program_keywords'];
    $Wall->Add_Program_or_Plan($program_title, $program_content,$ $program_keywords, group_id, $uid);
}

if(isset($_POST['submit_proj_outcome'])){
    $outcome_title = $_POST['outcome_title'];
    $outcome_content = $_POST['new_outcome'];
    $outcome_keywords = $_POST['outcome_keywords'];
    $Wall->Add_Outcome($outcome_title, $outcome_content,$outcome_keywords, $group_id, $uid);
}

if(isset($_POST['submit_para_social_need'])){
    $social_need = $_POST['para_socical_need'];
    $Wall->Update_Para_Social_Need($social_need,$group_id);
}

if(isset($_POST['submit_para_program'])){
    $program = $_POST['para_program'];
    $Wall->Update_Para_Program($program,$group_id);
}

if(isset($_POST['submit_para_outcome'])){
    $outcome = $_POST['para_outcome'];
    $Wall->Update_Para_Outcome($outcome,$group_id);
}

//$proj_social_needs = $Wall->Get_Project_Social_Need($groupID);
//$proj_program = $Wall->Get_Project_Program($groupID);
//$proj_outcomes = $Wall->Get_Project_Outcome($groupID);

}
else
{
    header("Location:$url404");
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
         <style>
             .tansa, .arrow {
                display:none;
                position:absolute;
                left:500px; /*[wherever you want it]*/
            }
            
            .project_team_profile div{
                float:left;
            }
            
            .btn-add-new{
                margin-top:10px;
                margin-left:540px;
            }
            .bootstrap-tagsinput {
                width: 300px !important;
            }
            .des{
                min-height: 100px;
            }
        </style>
        <script type="text/javascript" src="<?php echo $base_url.'js/popup-window.js' ?>"></script>
        <script src="js/lib-scrool/1.6.1.jquery.min.js"></script>
   <script>
  $(".back-top").hide();
  
  // fade in #back-top
  $(function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('.back-top').fadeIn();
      } else {
        $('.back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    $('.back-top a').click(function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });
</script>
       
    </head>
    <?php include_once 'header.php'; ?>
    <body>

 
            <div class="container">
               
                    <div class="sidebar-left">
                        <?php  //include_once 'block_left.php'; ?>
                    </div>
                    <div class="middle-content-dashboard-comnunity">
                        <?php include 'community/main.php'; ?>
                    </div>
                    <div class="sidebar-right-dabshoard-comunity">
                        <?php include_once 'block_right.php'; ?>
                        <p class="back-top">
                            <a href="#top"><span></span></a>
                        </p>
                    </div>

                <?php include_once 'block_footer.php'; ?>
            </div>

    </body>
</html>