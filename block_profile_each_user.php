<?php include_once 'js.php';?>
<script>
$(document).ready(function(){
    $(".list_project").hide();
    $(".readmore_pro").click(function(){
        $(".list_project").slideToggle("slow");
        $(".readmore_pro").hide();
    });
    $(".list_org").hide();
    $(".readmore_org").click(function(){
        $(".list_org").slideToggle("slow");
        $(".readmore_org").hide();
    });
    $(".list_com").hide();
    $(".readmore_com").click(function(){
        $(".list_com").slideToggle("slow");
        $(".readmore_com").hide();
    });
    $(".list_pfollow").hide();
    $(".readmore_pfollow").click(function(){
        $(".list_project").slideToggle("slow");
        $(".readmore_pfollow").hide();
    });
});
</script>

        <div class="leftWrite">
        <div id="bigFace" data-step="4" data-intro="Upload a profile picture.">
        <?php if(!$profile_uid){ ;?>

        <form id="bigprofileimageform" method="post" enctype="multipart/form-data" action='<?php $base_url;?>image_upload_ajax.php'>
        
        <input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
        <input type='hidden' name="imageType" value='1'/>
        </form>
        <?php } ?>

        <img src='<?php echo 'uploads/'.$profile_pic;  ?>' id="profileBigFace" />  
        <div id="aboutMeText">
           <?php // echo'<b class="text-name">'.$username.'</b>'; ?>

  <?php 

           $userdetails=$Wall->User_Details_UserFullName($username);
            $fname = $userdetails['first_name'];
            $lname = $userdetails['last_name'];
             $last_name = ucfirst(strtolower($lname));
             $first_name = ucfirst($fname);
             echo '<b class="capital_text_upper">'.$first_name.'</b><br/><b class="small_text_upper">'.$last_name .'</b>';


 ?>
            <?php //echo $session_bio; ?><br><br>
            <?php //if($_GET['profile_id']){ ?>
          

        <!-- <a href="<?php// echo $base_url.'messages/'.$_GET['profile_id'];?>"  class='wallbutton messageButton'>Send Message</a><br> -->
            <?php 
             // } 
               ?>
        </div>

        </div>
        </div>
        <br/>

        <br/>
         <div class="after-profile"><?php 
        $count1; $count2; $count3; $count4;
        if($_GET['username'])
        {
            $project_detail=$Wall->User_Group_Details($profile_uid, '1'); //uid
            $community_detail = $Wall->User_Community_Details($profile_uid, '2');
            $org_detail = $Wall->User_Ngo_Details($profile_uid, '3');
            $project_follow = $Wall->User_Project_Follow($profile_uid);
            $count1 = $Wall->User_Group_Count($profile_uid, '1');
            $count2 = $Wall->All_Community_count($profile_uid, '2');
            $count3 = $Wall->All_Ngo_count($profile_uid, '3');
            $count4 = $Wall->Project_Follow_Count($uid);
        }else{
            $project_detail=$Wall->User_Group_Details($uid, '1');
            $community_detail = $Wall->User_Community_Details($profile_uid, '2');
            $org_detail = $Wall->User_Ngo_Details($uid,'3');
            $project_follow = $Wall->User_Project_Follow($uid);
            $count1 = $Wall->User_Group_Count($uid, '1');
            $count2 = $Wall->All_Community_count($uid, '2');
            $count3 = $Wall->All_Ngo_count($uid, '3');
            $count4 = $Wall->Project_Follow_Count($uid);
            
        }
       // $project_follow = $Wall->User_Project_Follow($profile_uid);
        //echo count($project_follow)."kjasdhksa";
       // echo "jhkhklk".$project_follow['pro'];
        // var_dump($project_detail);
        // foreach ($project_follow as $rows) {
        //      $group_id = $rows['group_id'];
        //      $group_name = $rows['group_name'];
        //     echo $group_id.'and'.$group_name;
        //     # code...
        // }
        //echo $group_id;
        ?>    
        <!--<div  id="show-project" class="small_text_upper" onclick="showHideProject();"><b style="text-decoration:underline;">Projects </b><div class="counts gets"><?php //echo $count1;?></div></div><br/> -->
        <div  id="show-project" class="small_text_upper" onclick="showHideProject();"><b style="text-decoration:underline;">Projects </b><div class="counts gets"><?php echo $count1;?></div></div><br/>
        <div class="dashboard-left-project">
           <?php 

        if($project_detail){
            $count = 0;
            foreach ($project_detail as $rs) {
                    $count ++;
                    // put in bold the written text
                    $group_name = $rs['group_name'];
                    $group_id = $rs['group_id'];
                    $group_owner = $rs['group_owner_id'];
                    if($rs['group_pic']){
                        $group_pic = $base_url.'uploads/'.$rs['group_pic'];
                    }else{
                        $group_pic = $base_url.'wall_icons/default.png';
                    }
                    if($group_owner==$uid)
                    {
                      //  $edit='<a href="" class="edit" original-title="Edit Group"></a>';
                    }
                    //class="groupListDiv"
                    if($count >= 6){
                            if($count == 6){?>
                            <div class="readmore_pro">View More...</div>
                                <?php
                                //echo $count;
                                 echo '<div class="list_project groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';?>
                            
                            <?php }else{
                           echo '<div class="list_project groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                            }
                    }else { 
                        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';   
                    }
                }
        }else{ 
            echo '<div class="display_box" align="left" style="width:200px;">';
            echo 'No projects found!';
            echo '</div>';
        }
        ?>
        </div><br/>
        <!--<div  id="show-project" class="small_text_upper" onclick="showHideProject();"><b style="text-decoration:underline;">Projects </b><div class="counts gets"><?php //echo $count1;?></div></div><br/> -->
        <div  id="show-project-following" class="small_text_upper" onclick="showProFlo();"><b style="text-decoration:underline;">projects Following</b><div class="counts pro-follow"><?php echo $count4;?></div></div><br/>
        <div class="dashboard-left-project-following">
            
        <?php 

        if($project_follow){
            $count = 0;
            foreach ($project_follow as $rs) {
                    $count ++;
                    // put in bold the written text
                    $group_name = $rs['group_name'];
                    // echo $group_name.'hello world';
                    $group_id = $rs['group_id'];
                    $group_owner = $rs['group_owner_id'];
                    if($rs['group_pic']){
                        $group_pic = $base_url.'uploads/'.$rs['group_pic'];
                    }else{
                        $group_pic = $base_url.'wall_icons/default.png';
                    }
                    if($group_owner==$uid)
                    {
                      //  $edit='<a href="" class="edit" original-title="Edit Group"></a>';
                    }
                    if($count >= 6){
                            if($count == 6){?>
                            <div class="readmore_pfollow">View More...</div>
                                <?php
                                //echo $count;
                                 echo '<div class="list_pfollow groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';?>
                            
                            <?php }else{
                           echo '<div class="list_pfollow groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                            }
                    }else { 
                        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';   
                    }
                    //class="groupListDiv"
                    // echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                    // if($count++ == 5) break;
            }
        }else{ 
            echo '<div class="display_box" align="left" style="width:200px;">';
            echo 'No projects follow found!';
            echo '</div>';
        }
        ?>
        </div><br/>
    </div>
