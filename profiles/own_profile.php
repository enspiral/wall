<div class="profile own-profile">
      <!--   <h4><?php //echo $full_name ? $full_name:$username; ?></h4> -->
      <h4>Basic Information</h4>
      <hr class="all-hr-project">
        <table class="table">
             <tr>
                <td>Name</td>
                <td><span class="text-profile"><?php echo $fname.' '.$lname; ?></span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_name"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                        <div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Name</h4>
                                    </div>
                                    <div class="modal-body">
                                        First Name : <input type="text" class="form-control" name="first_name" id="fname" value="<?php echo $fname; ?>"/>
                                        Last Name : <input type="text" class="form-control" name="last_name" id="lname" value="<?php echo $lname; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_name" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td>About</td>
                <td>
                        <?php echo strlen($usr_about)>0 ? '<span class="text-profile">'.$usr_about.'</span>':'<span>tell us about yourself here</span>'; ?>
                    </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_about"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit About" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" original-title="edit about" data-toggle="modal" data-target="#edit_about"></i> -->
                        <div class="modal fade" id="edit_about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit About</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="about" name="about" value="<?php echo $usr_about; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_about" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                    <td>Contact</td>
                <td>
                        <?php echo strlen($contact)>0 ? '<span class="text-profile">'.$contact.' </span>':'<span>Tell us about your contact here </span>';?>
                    </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_contact"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Contact" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" original-title="edit contact" data-toggle="modal" data-target="#edit_contact"></i> -->
                        <div class="modal fade" id="edit_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Contact</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_contact" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><span class="text-profile"><?php echo $email; ?></span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_email"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Email" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-edit custom-file-input" data-toggle="modal" data-target="#edit_email" original-title="edit email"></i> -->
                        <div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Email</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_email" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><span class="text-profile"><?php echo $birthday; ?></span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_birthday"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Birthday" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_birthday" original-title="edit date of birth"></i> -->
                        <div class="modal fade" id="edit_birthday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit brithday</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="input" class="form-control" name="birthday" id="birthday" value="<?php echo $birthday; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_email" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <tr>
                <td>Country</td>
                <td><span class="text-profile"><?php echo $country; ?></span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_country"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Country" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_country" original-title="edit country"></i> -->
                        <div class="modal fade" id="edit_country" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Country</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="email" class="form-control" name="country" id="countrys" value="<?php echo $country; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_email" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
             <tr>
                <td>Address</td>
                <td><span class="text-profile"><?php echo $address; ?></span></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_address"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Country" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_address" original-title="edit addres"></i> -->
                        <div class="modal fade" id="edit_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Address</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="email" class="form-control" name="address" id="address" value="<?php echo $address; ?>"/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_email" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
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
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_skill"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Skill" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_skill" original-title="edit skills"></i> -->
                        <div class="modal fade" id="edit_skill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Skills</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="skills" name='skills' class="form-control form-skills usr_skills" data-role="tagsinput"  value="<?php echo $usr_skills; ?>" required=""/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_skill" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <td>
                        <a href="" data-toggle="modal" data-target="#edit_interest"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Skill" data-toggle="modal"></i></a>
                        <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_interests" original-title="edit interest"></i> -->
                        <div class="modal fade" id="edit_interest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="exampleModalLabel">Edit Interests</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="interest" name='interest' class="form-control form-skills usr_skills" data-role="tagsinput"  value="<?php echo $usr_interest; ?>" required=""/>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                            <button id="submit_interest" name="save" class="btn btn-sm btn-primary update-profile">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
           
        </table>
        <div class="projet-p row">
         <h4>My Project</h4>
         <hr class="all-hr-project">

        <?php $project_participation = $Wall->User_Group_Details($session_uid, '1'); 
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
                } ?>
                <div><a href="<?php echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div>
         <?php }else{
               echo "This volunteer have not join any project !";
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
                          echo '<div class="list_project_follow"><a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_image.'" class="groupIcond custom-file-input" original-title="'.$group_name.'"><div class="groupSmallTitles"></div></a></div>';

                       
                   }    
                    ?>  

                    <!-- <button class="btn btn_user_console"><a href='<?php // echo $base_url . 'cps_search.php'; ?>' data-tooltip="tooltip" title="Discower Needs!">Discover Needs</a></button> -->
                    <div><a href="<?php echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div>                 
               <?php }else{
                    echo "This volunteer have not follow any project !";
                }
                   
              
        ?>
        </div>
        <br/>

         <!-- <div class="communities row">
         <h4>Communities Following</h4>
         <hr class="all-hr-project"> -->
         <?php //$follo_commnunity = $Wall->User_Community_Details($uid,2);
                // if($follo_commnunity){
                //     foreach ($follo_commnunity as $rows) {
                //          $follow_com_name = $rows['group_name'];
                //          $group_id = $rows['group_id'];
                //          $follow_pic = $rows['group_pic'];
                //         if($follow_pic){
                //             $group_image = $base_url.'uploads/'.$follow_pic;
                //         }else{
                //             $group_image = $base_url.'wall_icons/default.png';
                //         }

                //        echo '<div class="list_project_follow"><a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_image.'" class="groupIcond custom-file-input" original-title="'.$follow_com_name.'"><div class="groupSmallTitles"></div></a></div>';
                //     } ?>

                    <!-- <div class="list_project_follow"><a href="<?php //echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div> -->
               <?php 
           // }else{
           //          echo "Community Following Not Found !";
           //      }
         ?>
        <!--  </div>
         <br/> -->
     
         

        <!-- <div class="organizaton row"> -->
        <!-- <h4>Organization</h4>
        <hr class="all-hr-project"> -->
          <?php //$org_detail = $Wall->User_Group_Details_Owner($session_uid, '3'); ?>
          <!-- <div> -->
          <?php
          // if($org_detail){
          //   foreach($org_detail as $rows){
          //       $group_id = $rows['group_id'];
          //       $organization_pic = $rows['group_pic'];
          //       $organization_name = $rows['group_name'];
          //       if($organization_pic){
          //                   $group_image = $base_url.'uploads/'.$organization_pic;
          //               }else{
          //                   $group_image = $base_url.'wall_icons/default.png';
          //               }

          //       echo '<div class="list_organzation"><a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_image.'" class="groupIcond custom-file-input" original-title="'.$organization_name.'"><div class="groupSmallTitles"></div></a></div>';
          //   } ?>
              <!-- <div><a href="<?php //echo $base_url;?>cps_search.php" class="custom-file-input" original-title="Discower Needs!"><img src="images/profiles/btn_add.png"></a></div> -->
            <?php 
              //}else{
          //       echo "Organization Not Found !";
          //   }

            ?>
       <!--  </div>

        <br/><br/>  
    </div> -->
    </div>

