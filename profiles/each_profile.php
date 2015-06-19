<div class="middle-content" id="top">
        <div class="profile">
      <!--   <h4><?php //echo $full_name ? $full_name:$username; ?></h4> -->
      <h4>Basic Information</h4>
      <hr class="all-hr-project">
        <table class="table">
             <tr>
                <td>Name</td>
                <td><span class="text-profile"><?php echo $fname.' '.$lname; ?></span></td>
                   
            </tr>
            <tr>
                <td>About</td>
                <td>
                        <?php echo strlen($usr_about)>0 ? '<span class="text-profile">'.$usr_about.'</span>':'<span>tell us about yourself here</span>'; ?>
                    </td>
                                </tr>
            <!-- <tr>
                    <td>Contact</td>
                <td>
                        <?php //echo strlen($contact)>0 ? '<span class="text-profile">'.$contact.' </span>':'<span>Tell us about your contact here </span>';?>
                    </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><span class="text-profile"><?php //echo $email; ?></span></td>
                    </tr> -->
            
            </table>
            <h4>Skills and Interests</h4>
            <hr class="all-hr-project">
            <table class="table">
             <tr>
                <td>Skills</td>
                <td>
                         <span>
                             <?php if(strlen($usr_skills)>0){
                                 $my_skills = explode(',', $usr_skills); 
                                foreach ($my_skills as $r){
                                    echo '<button class="btn btn-xs btn-primary text-profile">'.$r.'</button>'."&nbsp";
                                }
                             }else{
                                 echo "Update your skills here";
                             }
                        ?>
                        </span>    
                       
                        
                    </td>
            </tr>
            <tr>
                <td>Interests</td>
                <td>
                         <span>
                             <?php if(strlen($usr_interest)>0){
                                 $my_interest = explode(',', $usr_interest); 
                                foreach ($my_interest as $r){
                                    echo '<button class="btn btn-xs btn-success text-profile">'.$r.'</button>'."&nbsp";
                                }
                             }else{
                                 echo "Update your interest here";
                             }
                        ?>
                        </span>
                    </td>
                </tr>
           
        </table>
        <div class="projet-p row">
         <hr class="all-hr-project">
            <h4>My Project</h4>
            <hr class="all-hr-project">
        <?php $project_participation = $Wall->User_Group_Details($profile_uid, '1'); 
           if($project_participation){
                foreach ($project_participation as $rows) {
                        $participation_name = $rows['group_name'];
                         $group_id = $rows['group_id'];
                        // echo $group_id;
                         $participation_pic = $rows['group_pic'];
                        if($participation_pic){
                            $group_image = $base_url.'uploads/'.$participation_pic;
                        }else{
                            $group_image = $base_url.'wall_icons/default.png';
                        }

                       echo '<div class="list_project_follow"><a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_image.'" class="groupIcond custom-file-input" original-title="'.$participation_name.'"><div class="groupSmallTitles"></div></a></div>';
                }  ?>
                <div><a href="<?php echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div>

         <?php  }else{
               echo "<p>This volunteer have not join any project !</p>";
           }

        ?>
    </div>
        
        <br/>

    <div class="following row">
      <h4>Project Following</h4>
        <hr class="all-hr-project">
        <?php $project_follow = $Wall->User_Project_Follow($uid);
        // var_dump($project_follow);
        if($project_follow){
                    foreach ($project_follow as $rs) {
                        $group_name = $rs['group_name'];
                         $group_id = $rs['group_id'];
                         $group_pic = $rs['group_pic'];
                        if($group_pic){
                            $group_image = $base_url.'uploads/'.$group_pic;
                        }else{
                            $group_image = $base_url.'wall_icons/default.png';
                        }

                       echo '<div class="list_project_follow"><a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_image.'" class="groupIcond custom-file-input" original-title="'.$group_name.'"><div class="groupSmallTitles">'.$organizationd_name.'</div></a></div>';
                    }?>
                    <div><a href="<?php echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div>
                <?php }else{
                    echo "<p>This volunteer have not follow any project !</p>";
                }
                   
              
        ?>
    
        </div>
            <br/>
    </div>
</div>
   