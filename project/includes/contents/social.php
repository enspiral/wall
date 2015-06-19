<script>
$(document).ready(function(){
        $("#remoreText").hide();
        $(".redmore").click(function(){
            $("#remoreText").slideToggle("slow");
            $(".hide-text").hide();
        });
        
        //document.getElementById("edit_sn").style.display = 'none';
        $('#edit_sn_keyword').val("ahdjshjhsadj");
        qy210(".sn_editor").Editor(); 

        $('#submit-social-need').click(function(){
            document.getElementById("add_sn_content").value += $("#social-need-editor .Editor-editor").html();
        });
       
//        qy210(".pp_editor").Editor(); 
//                
//        $('#submit-prog-plan').click(function(){
//            document.getElementById("add_pp_content").value += $("#prog-plan-editor .Editor-editor").html();
//        });
        
        qy210(".edit_sn_editor").Editor();
        
        $('#submit-edit-social-need').click(function(){
            document.getElementById("edit_sn_content").value += $("#edit-social-need-editor .Editor-editor").html();
        });
});

function editSocialNeed(id, title, keyword, content){
        $('#edit_sn_id').val(id);
        $('#edit_sn_title').val(title);
        $('#edit_sn_keyword').val(keyword);
       
        var ele = document.getElementById('edit-social-need-editor').getElementsByClassName('Editor-editor');
        ele[0].innerHTML = content;
        
        $('input#edit_sn_keyword').tagsinput('removeAll');
        $('input#edit_sn_keyword').tagsinput('add', keyword);
        $('input#edit_sn_keyword').tagsinput('refresh'); 
        
}
</script>

<div class="row contents">
    <div role="tabpanel" class="tab-pane" id="socailneed">
        <div class="text social_need">
            <p class="text-title"><b>Social Needs</b>

                <?php if ($session_group_admin) {?>

                 <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_social_need"><i class="glyphicon glyphicon-edit"></i></a></span>
                 <p class="text-right"><button style="margin-top: -27px;" id="sn_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_new_sn">Add Social Need</button></p>
                <?php } ?>
                     
            <div class="modal fade" id="edit_social_need" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit Social</h4>
                            </div>
                            <div class="modal-body">
                              <p>Plese edit your description.</p>
                                <textarea name="para_socical_need"  style="width:540px; height:200px;"><?php echo $social_need; ?></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" name="submit_para_social_need" value="Save" />
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>
             <div class="row updateboxarea des">
                <div class="col-lg-2">
                    <p><img src='<?php echo $base_url . "/images/socail/socail-need.png"; ?>' align="left" border="0"><br>
                   </p>
                    <!-- <div class="introduction-image"><img src="images/commnunities/123.png"></div>
                    <p id="intor-text">Intradution</p> -->
                </div>
                <div class="col-lg-10 text-style">
                    <?php 
                       if($social_need){
                        if (strlen($social_need) >= 300) {
                        $trimstring = substr($social_need, 0, 300). '&nbsp;<div class="redmore"><a href="#remoreText">Read More...</a></div>';
                         echo '<span class="hide-text">'.$trimstring.'</span>';
                        ?>
                        <div id="remoreText"><?php echo $social_need; ?></div>
                        <?php
                        } else {
                        echo $social_need;
                        }
                      }else{
                         echo "There is empty here. Please post some announcements here!!!";
                      }
                        ?>

        <?php
                
                $data = $Wall->Get_Project_Social_Need($proj_id);
                foreach ($data as $value){
                    $sn_id = $value['sn_id'];
                    $sn_msg_id = $value['msg_id'];
                    $sn_title = $value['msg_title'];
                    $sn_content = $value['message'];
                    $sn_keyword = $value['sn_keywords'];
                    $sn_image = $value['sn_image'];
                ?>
                <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>">
                            <img class="social-image" src="<?php echo 'images/'.$sn_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                           
                            <h4 class="media-heading"><a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>"><?php echo $sn_title; ?></a></h4>
                            
                       <p>
                    <?php 
                        if (strlen($sn_content) >= 200) {
                            
                        $sn_content1 = strip_tags($sn_content);
                        $trimstrings = (substr($sn_content1, 0, 200));
                        echo $trimstrings;?>
                        <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>">Read More</a>
                        
                       <?php } else {
                        echo $sn_content;?>
                        <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>">Read More</a>
                      <?php  }
                    ?>
                </p>
                        
                        <p>Keywords : <?php echo "#".str_replace(","," #",$sn_keyword); ?></p><br/>

                        
                        <div>
                            <!-- saorin code start code-->

                            <span class="text-right"><a href="" data-toggle="modal" data-target="#popup-message"><i class="glyphicon glyphicon-edit"></i></a></span>
                 <p class="text-right"><button style="margin-top: -27px;" id="sn_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_new_sn">Add Social Need</button></p>
            
                     
            <div class="modal fade" id="popup-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit Social</h4>
                            </div>
                            <div class="modal-body">
                              <p>Plese edit your description.</p>
                                <!-- <textarea name="para_socical_need"  style="width:540px; height:200px;"><?php echo $social_need; ?></textarea> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <input type="submit" class="btn btn-primary" name="submit_para_social_need" value="Save" />
                            </div>
                        </form>
                       
                    </div>
                </div>
            </div>

                            <!-- <p class="text-right"><button style="margin-top: -27px;" id="sn_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_new_sn">Add Social Need</button></p> -->
                              <!-- the end saorin code get involde -->

                        <a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program&sn_id=<?php echo $sn_id; ?>">
                            <button id="<?php echo $sn_id; ?>" class="btn btn-social">Get Involved</button>
                        </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        
                        <?php if ($session_group_admin) { ?>
                        <a href="" data-toggle="modal" data-target="#edit_sn">
                            <button class="btn btn-social" onclick="editSocialNeed(<?php echo $sn_id ?>, '<?php echo $sn_title ?>', '<?php echo $sn_keyword ?>', '<?php echo htmlspecialchars(addslashes($sn_content)) ?>')">
                                Edit
                            </button>
                        </a>
                        <?php } ?>
                        <!--button id="<?php //echo $sn_id; ?>" class="btn btn-social" onclick="FollowProject(<?php //echo $groupID ?>)">Like</button-->
                        <?php 
							if($role_in_project>=1){
								echo '<button class="btn btn-social" style="background-color:orange;">Admin</button>';
							}else if($role_in_project==0){
								echo '<button class="btn btn-social" style="background-color:orange;">Member</button>';
							}else{
								if($session_follow==0){
				 					echo '<button class="btn btn-social" onclick="FollowProject('.$groupID.')">Follow</button>';	
				 				}else{
					 				echo '<button class="btn btn-social" onclick="UnfollowProject('.$groupID.')">Unfollow</button>';
				 				}
				
			 				} 
						?>
                        <?php if ($session_group_admin) { ?>
                       <!-- <button id="<?php //echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button> -->
<!--                        <a href="" data-toggle="modal" data-target="#add_sn_prog_plan">
                            <button class="btn btn-social" onclick="document.getElementById('popoup_sn_id').value=<?php //echo $sn_id ?>">Add PP</button>
                        </a>-->
                        <?php } ?>
                    </div>
                    
                           &nbsp;
                </div>
                </div>
            
                <?php
                }
                
                ?>
 </div>
        </div>
            <!-- Social Needs -->
            <ul class="pager">
                <li class="previous"><a class='<?php echo $p=="program"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program">&larr;Solution Plan</a></li>
                <li class="next"><a class='<?php echo $p=="outcome"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=outcome">Outcomes &rarr;</a></li>
            </ul>
            <div id="social-need-to-minimize">

            </div>  
        </div>
    </div>
</div>

<!-- Add New Social Need -->

        <div class="modal fade" id="add_new_sn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New Social Need </h4>
              </div>
              
            <div class="modal-body" id="social-need-editor">      
                    <p>What is the social need titile ?</p>
                    <input type="text" name="new_sn_title" id="sn_title" class="form-control" placeholder="Title" required=""/><br/>
                    <p>What is the social need keyword ?</p>
                    <input type="text" id="sn_keyword" name='new_sn_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <p>What is the social need content ?</p>
                    <textarea name="new_sn_content" id="add_sn_content"  class="sn_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="new_sn_pic" id="new_sn_pic" style="display:inline;" required="">
                    <br/>
                    <div id="webcam_container" class='border'>
                        <div id="webcam" ></div>
                        <div id="webcam_preview"></div>
                        <div id='webcam_status'></div>
                        <div id='webcam_takesnap'></div>
                    </div>
            </div>

              <div class="modal-footer">
                  <input type="hidden" name="group_id" value="<?php echo $groupID;?>">
                  <input type="hidden" name="proj_id" value="<?php echo $proj_id;?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit-social-need" name="submit_new_sn" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->


<!-- Add Program Plan -->
<!--
        <div class="modal fade" id="add_sn_prog_plan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New Program/Plan </h4>
              </div>
              
            <div class="modal-body" id="prog_plan_editor">      
                    <input type="hidden" id="popoup_sn_id" name="pp_id" value="" /><br/>
                    <input type="text" name="new_pp_title" id="pp_title" class="form-control" placeholder="Title" required=""/><br/>
                    <input type="text" id="sn_keyword" name='new_pp_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <textarea name="new_pp_content" id="add_pp_content" class="pp_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="new_pp_pic" id="new_pp_pic" style="display:inline;" required="">
                    <br/>
                    <div id="webcam_container" class='border'>
                        <div id="webcam" ></div>
                        <div id="webcam_preview"></div>
                        <div id='webcam_status'></div>
                        <div id='webcam_takesnap'></div>
                    </div>
            </div>

              <div class="modal-footer">
                  <input type="hidden" name="group_id" value="<?php //echo $groupID;?>">
                  <input type="hidden" name="proj_id" value="<?php //echo $proj_id;?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit-prog-plan" name="submit_new_pp" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> -->

<!-- End Popup -->

<!-- Edit Social Need -->

        <div class="modal fade" id="edit_sn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Social Need </h4>
              </div>
              
            <div class="modal-body" id="edit-social-need-editor">      
                    <input type="hidden" id="edit_sn_id" name="edit_sn_id" value="">
                    <p>What is the social need titile ?</p>
                    <input type="text" name="edit_sn_title" id="edit_sn_title" class="form-control" required="" value=""><br/>
                    <p>What is the social need keyword ?</p>
                    <input type="text" id="edit_sn_keyword" name='edit_sn_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <p>What is the social need content ?</p>
                    <textarea name="edit_sn_content" id="edit_sn_content"  class="edit_sn_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="edit_sn_pic" id="new_sn_pic" style="display:inline;">
                    <br/>
                    <div id="webcam_container" class='border'>
                        <div id="webcam" ></div>
                        <div id="webcam_preview"></div>
                        <div id='webcam_status'></div>
                        <div id='webcam_takesnap'></div>
                    </div>
            </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit-edit-social-need" name="submit_edit_sn" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->