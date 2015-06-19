<?php include_once 'js.php';?>
<script  src="<?php echo $base_url; ?>js/lib-scrool/1.6.1.jquery.min.js"></script>
<script type='text/javascript'> var $jm161 = jQuery.noConflict();</script>
<script>
$jm161(document).ready(function(){
    $jm161(".list_project").hide();
    $jm161(".readmore_pro").click(function(){
        $jm161(".list_project").slideToggle("slow");
        $jm161(".readmore_pro").hide();
    });
    $jm161(".list_org").hide();
    $jm161(".readmore_org").click(function(){
        $jm161(".list_org").slideToggle("slow");
        $jm161(".readmore_org").hide();
    });
    $jm161(".list_com").hide();
    $jm161(".readmore_com").click(function(){
        $jm161(".list_com").slideToggle("slow");
        $jm161(".readmore_com").hide();
    });
    $jm161(".list_pfollow").hide();
    $jm161(".readmore_pfollow").click(function(){
        $jm161(".list_pfollow").slideToggle("slow");
        $jm161(".readmore_pfollow").hide();
    });
});
</script>

        <div class="leftWrite">
        <div id="bigFace" data-step="4" data-intro="Upload a profile picture.">
        <?php if(!$profile_uid){ ?>

        <form id="bigprofileimageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url;?>image_upload_ajax.php'>
        <div  class="uploadFile timelineUploadImgBig">
        <input type="file"  name="photoimg" id="bigprofilephotoimg" class=" custom-file-input" original-title="Upload Profile Picture">
        </div>
        <input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
        <input type='hidden' name="imageType" value='1'/>
        </form>
        <?php } ?>

        <img src='<?php echo $profileface;  ?>' id="profileBigFace" /> 
        <div id="aboutMeText">
           <?php //echo'<b class="text-name">'.$username.'</b>'; ?>

  <?php 

            $userdetails=$Wall->User_Details_UserFullName($username);
            $fname = $userdetails['first_name'];
            $lname = $userdetails['last_name'];
             $last_name = ucfirst(strtolower($lname));
             $first_name = ucfirst($fname);
             echo '<b class="capital_text_upper">'.$first_name.'</b><br/><b class="small_text_upper">'.$last_name .'</b>';


 ?>
            <?php //echo $session_bio; ?><br><br>
            <?php if($_GET['username']){ ?>
          

        <a href="<?php echo $base_url.'messages/'.$_GET['username'];?>"  class='wallbutton messageButton'>Send Message</a><br>
            <?php }          ?>
        </div>

        </div>
        </div>
        <br/>
        <!-- <div class="after-profile-text">
            <p class="get-style">My Feed</p>
            <hr/>
            <p class="get-style">Starred</p>
        </div> -->
        <br/>
        <div class="after-profile"><?php 
        $count1; $count2; $count3; $count4;
        if($_GET['username'])
        {
            $project_detail=$Wall->User_Group_Details($profile_uid, '1'); //uid
            $community_detail = $Wall->User_Group_Details($profile_uid, '2');
            $org_detail = $Wall->User_Group_Details($profile_uid, '3');
            $project_follow = $Wall->User_Project_Follow($profile_uid);
            $count1 = $Wall->User_Group_Count($profile_uid, '1');
            $count2 = $Wall->User_Group_Count($profile_uid, '2');
            $count3 = $Wall->User_Group_Count($profile_uid, '3');
            $count4 = $Wall->Project_Follow_Count($uid);
        }else{
            $project_detail=$Wall->User_Group_Details($uid, '1');
            $community_detail = $Wall->User_Group_Details($uid, '2');
            $org_detail = $Wall->User_Group_Details($uid,'3');
            $project_follow = $Wall->User_Project_Follow($uid);
            $count1 = $Wall->User_Group_Count($uid, '1');
            $count2 = $Wall->User_Group_Count($uid, '2');
            $count3 = $Wall->User_Group_Count($uid, '3');
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

        <div id="show-organization" class="small_text_upper" onclick="showHideOrg();"><b style="text-decoration:underline;position: absolute;">Organizations </b><div class="counts gets"><?php echo $count2;?></div></div> 
         <div class="dashboard-left-org">
            <?php 
            if($org_detail){
                $count = 0;
                foreach ($org_detail as $rs) {
                        $count ++;
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
                            // $edit='<a href="" class="edit" original-title="Edit Group"></a>';
                        }
                        if($count >= 6){
                            if($count == 6){?>
                            <div class="readmore_org">View More...</div>
                                <?php
                                //echo $count;
                                 echo '<div class="list_org groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';?>
                            
                            <?php }else{
                           echo '<div class="list_org groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                            }
                    }else { 
                        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';   
                    }
                        //class="groupListDiv"
                      //  echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                       // if($count++ == 5) break;
                }
            }else{ 
                echo '<div class="display_box" align="left" style="width:200px;">';
                echo 'No Organizations found!';
                echo '</div>';
            }
            ?>
            </div><br/>
    <div  id="show-communities" class="small_text_upper" onclick="showHideCom();"><b style="text-decoration:underline;position: absolute; margin-top: 3px;">Communities</b><div class="counts gets"><?php echo $count3;?></div></div>   
<div class="dashboard-left-com">
   
<?php 

if($community_detail){
    $count = 0;
    foreach ($community_detail as $rs) {
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
                // $edit='<a href="" class="edit" original-title="Edit Group"></a>';
            }
            if($count >= 6){
                            if($count == 6){?>
                            <div class="readmore_com">View More...</div>
                                <?php
                                //echo $count;
                                 echo '<div class="list_com groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';?>
                            
                            <?php }else{
                           echo '<div class="list_com groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
                            }
                    }else { 
                        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';   
                    }
              }
}else{ 
    echo '<div class="display_box" align="left" style="width:200px;">';
    echo 'No communities found!';
    echo '</div>';
}
?>
</div>

</div>