<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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

$proj_id = $ProjectDetails['proj_id'];
$proj_start_date = $ProjectDetails['start_date'];
$proj_end_date = $ProjectDetails['end_date'];
$proj_intro = $ProjectDetails['proj_intro'];
$proj_lang = $ProjectDetails['proj_lang'];
$social_need = $ProjectDetails['social_need'];
$program = $ProjectDetails['program'];
$outcome = $ProjectDetails['outcome'];
$proj_location = $ProjectDetails['location'];
$com_id = $ProjectDetails['com_id'];
$contact_email = $ProjectDetails['contact_email'];

$group_admin = $Wall->check_group_admin($session_uid, $groupID);
if($group_admin || ($group_owner_id == $session_uid) || $session_cps_admin){
	$session_group_admin = true;
}else{
	$session_group_admin = false;
}


if($ProjectDetails['com_id']!=0){
    
    $CommunityDetails = $Wall->Community_Details($ProjectDetails['com_id']);
    $com_location = $CommunityDetails['location'];
}

$area_of_focus = $Wall->Get_Project_Social_Needs_keywords($group_id);
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
if(isset($_POST['submit_proj_email'])){
    $contact_email = $_POST['p1_email'];
    $Wall->Update_Proj_Email($contact_email,$group_id);
}

if(isset($_POST['submit_proj_lang'])){
    $proj_lang = $_POST['proj_lang'];
    $Wall->Update_Proj_Lang($proj_lang,$group_id);
}
if(isset($_POST['cancel_proj_lang'])){
    $proj_lang = $proj_lang;
}

if(isset($_POST['submit_proj_dates'])){
    $proj_start_date = $_POST['p_start_date'];
    $proj_end_date = $_POST['p_end_date'];
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
    $Wall->Add_Program_or_Plan($program_title, $program_content, $program_keywords, $group_id, $uid);
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

// recruiment
if(isset($_POST['submit_recruiment'])){
    $file_data = "recruit_image";
    $recruitment_des = $_POST['recruitment_des'];
    $pro_id = $_POST['proj_id'];
    $save_image = true;
       if($_FILES["$file_data"]['size'] > 0){
               if($_FILES["$file_data"]['size'] > 2000000){
                   $save_image = false;
                   echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
               }
               else{
                   $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                   $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                   if (!in_array($extension, $allowedExts))
                   {
                       $save_image = false;
                       echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                   }
               }
           }else{
               $save_image = false;
           }
           if($save_image){
               $target_dir = "images/";
               $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
               move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
                $update_recruitment = $Wall->Update_recruitment($pro_id,$recruitment_des, $_FILES["$file_data"]['name']);
               }else{
                $update_recruitment = $Wall->Update_recruitment2($pro_id,$recruitment_des);

               }
}
// the end recruiment

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

if(isset($_POST['save_beneficiary'])){
    $ben_com_id = $_POST['com_id'];
    $ben_title = $_POST['ben_title'];
    $ben_desc = $_POST['ben_desc'];
    $ben_location = $_POST['ben_location'];
    $ben_lang = $_POST['ben_lang'];
    $file_data = "ben_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
            $save_image = false;
            echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
        }
        else{
            $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
            $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, $allowedExts))
            {
                $save_image = false;
                echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
            }
        }
    }else{
        $save_image = false;
    }
    if($save_image){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $update_ben = $Wall->Update_Beneficiary_1($ben_com_id, $ben_title, $ben_desc, $ben_location, $ben_lang, $_FILES["$file_data"]['name']);
    }else{
        $update_ben = $Wall->Update_Beneficiary_2($ben_com_id, $ben_title, $ben_desc, $ben_location, $ben_lang);
    }
}

// start of contact
if(isset($_POST['submit_contact'])){
    $file_data = "contact_image";
    $contact_des = $_POST['contact_descr'];
    $pro_id = $_POST['pro_id'];
  //   echo $contact_des."id".$pro_id;
    $save_image = true;
       if($_FILES["$file_data"]['size'] > 0){
               if($_FILES["$file_data"]['size'] > 2000000){
                   $save_image = false;
                   echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
               }
               else{
                   $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                   $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                   if (!in_array($extension, $allowedExts))
                   {
                       $save_image = false;
                       echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                   }
               }
           }else{
               $save_image = false;
           }
           if($save_image){
               $target_dir = "images/";
               $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
               move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
                $update_recruitment = $Wall->Update_contact($pro_id,$contact_des, $_FILES["$file_data"]['name']);
               }else{
                $update_recruitment = $Wall->Update_contact2($pro_id,$contact_des);

               }
        }
// the end of contact
        
/* Add New Social Need */
     
if(isset($_POST['submit_new_sn']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $sn_gid = $_POST['group_id'];
    $sn_pid = $_POST['proj_id'];
    $new_sn_title = $_POST['new_sn_title'];
    $new_sn_content = $_POST['new_sn_content'];
    $new_sn_keyword = $_POST['new_sn_keyword'];
    $file_data = "new_sn_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $add_social_need = $Wall->Insert_Social_Need($uid, $new_sn_title, $new_sn_content, $new_sn_keyword, $_FILES["$file_data"]['name'], $sn_gid, $proj_id);
    }else{
        $add_social_need = $Wall->Insert_Social_Need($uid, $new_sn_title, $new_sn_content, $new_sn_keyword, "", $sn_gid, $proj_id);
    
    }
}
/* End of Add new Social Need*/

/* Add new Program/Plan */

if(isset($_POST['submit_new_pp']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $pp_gid = $_POST['group_id'];
    $pp_pid = $_POST['proj_id'];
    $pp_sn_id = $_POST['pp_id'];
    $new_pp_title = $_POST['new_pp_title'];
    $new_pp_content = $_POST['new_pp_content'];
    $new_pp_keyword = $_POST['new_pp_keyword'];
    $file_data = "new_pp_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $add_social_need = $Wall->Insert_Program_Plan($uid, $new_pp_title, $new_pp_content, $new_pp_keyword, $_FILES["$file_data"]['name'], $pp_gid, $pp_pid, $pp_sn_id);
    }else{
        $add_social_need = $Wall->Insert_Program_Plan($uid, $new_pp_title, $new_pp_content, $new_pp_keyword, "", $pp_gid, $pp_pid, $pp_sn_id);
    
    }
}
/* End of Add new Program/Plan*/

/* Add new Outcome */

if(isset($_POST['submit_new_outcome']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $outcome_gid = $_POST['group_id'];
    $outcome_pid = $_POST['proj_id'];
    $outcome_pp_id = $_POST['outcome_pp_id'];
    $new_outcome_title = $_POST['new_outcome_title'];
    $new_outcome_content = $_POST['new_outcome_content'];
    $new_outcome_keyword = $_POST['new_outcome_keyword'];
    $file_data = "new_outcome_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $add_social_need = $Wall->Insert_Outcome($uid, $new_outcome_title, $new_outcome_content, $new_outcome_keyword, $_FILES["$file_data"]['name'], $outcome_gid, $outcome_pid, $outcome_pp_id);
    }else{
        $add_social_need = $Wall->Insert_Outcome($uid, $new_outcome_title, $new_outcome_content, $new_outcome_keyword, "", $outcome_gid, $outcome_pid, $outcome_pp_id);
    
    }
}
/* End of Add new Outcome */

/* Submit edit Social Need */
if(isset($_POST['submit_edit_sn']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $edit_sn_id = $_POST['edit_sn_id'];
    $edit_sn_title = $_POST['edit_sn_title'];
    $edit_sn_content = $_POST['edit_sn_content'];
    $edit_sn_keyword = $_POST['edit_sn_keyword'];
    $file_data = "edit_sn_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $update_social_need = $Wall->Update_Each_Social_Need($edit_sn_id, $edit_sn_title, $edit_sn_content, $edit_sn_keyword, $_FILES["$file_data"]['name']);
    }else{
        $update_social_need = $Wall->Update_Each_Social_Need($edit_sn_id, $edit_sn_title, $edit_sn_content, $edit_sn_keyword, "");
    
    }
}
/* End of Add new Social Need*/

/* Submit edit Program/Plan */
if(isset($_POST['submit_edit_prog']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $edit_prog_id = $_POST['edit_prog_id'];
    $edit_prog_title = $_POST['edit_prog_title'];
    $edit_prog_content = $_POST['edit_prog_content'];
    $edit_prog_keyword = $_POST['edit_prog_keyword'];
    $file_data = "edit_prog_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $update_prog_plan = $Wall->Update_Each_Prog_Plan($edit_prog_id, $edit_prog_title, $edit_prog_content, $edit_prog_keyword, $_FILES["$file_data"]['name']);
    }else{
        $update_prog_plan = $Wall->Update_Each_Prog_Plan($edit_prog_id, $edit_prog_title, $edit_prog_content, $edit_prog_keyword, "");
    
    }
}
/* End of edit Program/Plan */

/* Submit edit Outcome */
if(isset($_POST['submit_edit_outcome']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $edit_outcome_id = $_POST['edit_outcome_id'];
    $edit_outcome_title = $_POST['edit_outcome_title'];
    $edit_outcome_content = $_POST['edit_outcome_content'];
    $edit_outcome_keyword = $_POST['edit_outcome_keyword'];
    $file_data = "edit_outcome_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $update_outcome = $Wall->Update_Each_Outcome($edit_outcome_id, $edit_outcome_title, $edit_outcome_content, $edit_outcome_keyword, $_FILES["$file_data"]['name']);
    }else{
        $update_outcome = $Wall->Update_Each_Outcome($edit_outcome_id, $edit_outcome_title, $edit_outcome_content, $edit_outcome_keyword, "");
    
    }
    
}
/* End of edit Outcome */
if(isset($_POST['save_map'])){
    $ben_com_id = $_POST['com_id_map'];
    $grd   = $_POST['grd_id_map'];
    $map = $_POST['ben_map'];
   $Wall->Update_Beneficiary_Map($ben_com_id, $map);
   //header('Location: http://localhost/wall/group.php?gid=15&ptab=beneficiary');
   $mapUrl = $base_url.'group.php?gid='.$grd.'&ptab=beneficiary';
   header('Location:'.$mapUrl);
}
// the end recruiment

// organization
if(isset($_POST['submit_organization'])){
    $file_data = "org_image";
    $org_des = $_POST['org_des'];
    $group_id = $_POST['group_id'];
    //echo $org_des.' '.$group_id;
    $save_image = true;
       if($_FILES["$file_data"]['size'] > 0){
               if($_FILES["$file_data"]['size'] > 2000000){
                   $save_image = false;
                   echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
               }
               else{
                   $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                   $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                   if (!in_array($extension, $allowedExts))
                   {
                       $save_image = false;
                       echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                   }
               }
           }else{
               $save_image = false;
           }
           if($save_image){
               $target_dir = "images/";
               $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
               move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
                $update_organization = $Wall->Update_organization($group_id,$org_des, $_FILES["$file_data"]['name']);
               }else{
                $update_organization = $Wall->Update_organization2($group_id,$org_des);

               }
}
// the end organization
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
                left:546px; /*[wherever you want it]*/
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
      
      <script>

qy161(document).ready(function(){

  // hide #back-top first
  qy161(".back-top").hide();
  
  // fade in #back-top
  qy161(function () {
    qy161(window).scroll(function () {
      if (qy161(this).scrollTop() > 100) {
        qy161('.back-top').fadeIn();
      } else {
        qy161('.back-top').fadeOut();
      }
    });

    // scroll body to 0px on click
    qy161('.back-top a').click(function () {
      qy161('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });

});
</script>
       
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
                        <?php include 'project/content_project.php'; ?>
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