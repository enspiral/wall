<script>
$(document).ready(function(){
    
    $(".not_allow a").click(function(e){
        alert('You already involed this project !');
        e.preventDefault();
    });
    
    $("#remoreText").hide();
    $(".redmore").click(function(){
        $("#remoreText").slideToggle("slow");
        $(".hide-text").hide();
    });
    
    qy210(".pp_editor").Editor(); 
                
    $('#submit-prog-plan').click(function(){
        document.getElementById("add_pp_content").value += $("#prog-plan-editor .Editor-editor").html();
    });
    
    qy210(".outcome_editor").Editor(); 

    $('#submit-outcome').click(function(){
        document.getElementById("add_outcome_content").value += $("#outcome-editor .Editor-editor").html();
    });
    
    qy210(".edit_prog_editor").Editor();
        
    $('#submit-edit-prog-plan').click(function(){
        document.getElementById("edit_prog_content").value += $("#edit-prog-plan-editor .Editor-editor").html();
    });
});

function editProgPlan(id, title, keyword, content){
        $('#edit_prog_id').val(id);
        $('#edit_prog_title').val(title);
        $('#edit_prog_keyword').val(keyword);
       
        var ele = document.getElementById('edit-prog-plan-editor').getElementsByClassName('Editor-editor');
        ele[0].innerHTML = content;
        
        $('input#edit_prog_keyword').tagsinput('removeAll');
        $('input#edit_prog_keyword').tagsinput('add', keyword);
        $('input#edit_prog_keyword').tagsinput('refresh'); 
}
</script>
<div class="row contents">
    <div class="text program">
        <p class="text-title"><b>Solution Plan</b>
            <?php 
            if ($session_group_admin) { ?>
                <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_program"><i class="glyphicon glyphicon-edit"></i></a></span>
                <?php if($_GET['sn_id']){ ?>
                 <p class="text-right"><button style="margin-top: -27px;" id="pg_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_sn_prog_plan">Add Solution Plan</button></p>
                <?php }} ?>
        </p>
        <div class="modal fade" id="edit_program" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Edit Solution Plan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Please edit your description</p>
                            <textarea name="para_program" style="width:100%; height:150px;"><?php echo $program; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" name="submit_para_program" value="Save" />
                        </div>
                    </form>
                    <!-- End popup -->
                </div>
            </div>
        </div>

        <div class="row updateboxarea des">
                <div class="col-lg-2">
                    <p><img src='<?php echo $base_url . "/images/program/program_plan.png"; ?>' align="left" border="0"><br>
                   </p>
                </div>
                <div class="col-lg-10 text-style">
                    <?php 
                       
                        if (strlen($program) >= 300) {
                        $trimstring = substr($program, 0, 300). '&nbsp;<div class="redmore"><a href="#remoreText">Read More...</a></div>';
                         echo '<span class="hide-text">'.$trimstring.'</span>';
                        ?>
                        <div id="remoreText"><?php echo $program; ?></div>
                        <?php
                        } else {
                        echo $program;
                        }
                        ?>
                 

        <?php
        if($_GET['sn_id']){
            $intro = "<h3>Choose the existing Solution Plan</h3>";
            $data = $Wall->Get_Each_SN_Program_Plan($_GET['sn_id']);
        }else{
            $intro = "";
            $data = $Wall->Get_Project_Prog_Plan($proj_id);
        }
        
        echo $intro;
        $alreadyfollow = $Wall->checkalreadyfollowproject($uid,$group_id);
        
        foreach ($data as $value) {
            $pp_id = $value['prog_id'];
            $pp_msg_id = $value['msg_id'];
            $pp_title = $value['msg_title'];
            $pp_content = $value['message'];
            $pp_keyword = $value['prog_keywords'];
            $pp_image = $value['prog_image'];
            
        ?>
         <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_program_plan&pp_id=<?php echo $pp_id;?>">
                            <img class="social-image" src="<?php echo $base_url.'images/'.$pp_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_program_plan&pp_id=<?php echo $pp_id;?>"><?php echo $pp_title; ?></a></h4>
                            
                        <p>
                       <?php if (strlen($pp_content) >= 200) {
                                $pp_content1 = strip_tags($pp_content);
                                $trimstrings = (substr($pp_content1, 0, 200));
                                echo $trimstrings;?>
                                <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_program_plan&pp_id=<?php echo $pp_id;?>">Read More</a></h4>
                                <?php } else {
                                echo $pp_content; ?>
                                <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_program_plan&pp_id=<?php echo $pp_id;?>">Read More</a></h4>
                            <?php    }
                            ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$pp_keyword); ?></p><br/>
                        <div>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" data-toggle="modal" data-target="#get_invlve" onclick="InvolveProject(<?php echo $pp_id ?>)">Get Involved</button> &nbsp; &nbsp; &nbsp;
                        <?php if ($session_group_admin) { ?>
                        <a href="" data-toggle="modal" data-target="#edit_prog">
                            <button class="btn btn-social" onclick="editProgPlan(<?php echo $pp_id ?>, '<?php echo $pp_title ?>', '<?php echo $pp_keyword ?>', '<?php echo htmlspecialchars(addslashes($pp_content)) ?>')">
                                Edit
                            </button>
                        </a>
                         <?php } ?>
                         <!--button id="<?php //echo $pp_id; ?>" class="btn btn-social" onclick="FollowProject(<?php //echo $groupID ?>)">Like</button-->
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
                        <a href="" data-toggle="modal" data-target="#add_pp_outcome">
                            <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="document.getElementById('popoup_pp_id').value=<?php echo $pp_id ?>">Add Outcome</button>
                        </a>
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
           
          
              <!-- Program/Plan -->
            <ul class="pager">
                <li class="previous"><a class='<?php echo $p=="social" || $p==""?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=social">&larr; Social Need</a></li>
                <li class="next"><a class='<?php echo $p=="outcome"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=outcome">Outcomes &rarr;</a></li>

            </ul>
              <div id="social-need-to-minimize">

            </div>  
        
</div>
</div>


<!-- Add Program Plan -->

        <div class="modal fade" id="add_sn_prog_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New Solution Plan </h4>
              </div>
              
            <div class="modal-body" id="prog-plan-editor">   
                    <input type="hidden" id="popoup_sn_id" name="pp_id" value="<?php echo $_GET['sn_id']; ?>>" />
                    <p>What is the solutin plan titile ?  </p>
                    <input type="text" name="new_pp_title" id="pp_title" class="form-control" placeholder="Title" required=""/><br/>
                    <p>What is the solution plan keyword ?  </p>
                    <input type="text" id="sn_keyword" name='new_pp_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <p>What is the solutin plan content ?  </p>
                    <textarea name="new_pp_content" id="add_pp_content" class="pp_editor" style="width:100%; height:100px;" placeholder="Content"></textarea><br/>
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
                  <input type="hidden" name="group_id" value="<?php echo $groupID;?>">
                  <input type="hidden" name="proj_id" value="<?php echo $proj_id;?>">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit-prog-plan" name="submit_new_pp" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->


<!-- Add Outcome -->

<div class="modal fade" id="add_pp_outcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post" enctype='multipart/form-data' action="">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New Outcome </h4>
      </div>

    <div class="modal-body" id="outcome-editor">      
            <input type="hidden" id="popoup_pp_id" name="outcome_pp_id" value="" />
            <p>What is the outcome titile ?  </p>
            <input type="text" name="new_outcome_title" id="outcome_title" class="form-control" placeholder="Title" required=""/><br/>
            <p>What is the outcome keyword ?  </p>
            <input type="text" id="outcome_keyword" name='new_outcome_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
            <p>What is the outcome content ?  </p>
            <textarea name="new_outcome_content" id="add_outcome_content" class="outcome_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
            <input type="file" name="new_outcome_pic" id="new_outcome_pic" style="display:inline;" required="">
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
          <button id="submit-outcome" name="submit_new_outcome" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- End Popup -->

<!-- popup get involved....... -->
<div class="modal fade" id="get_invlve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel">What do you want ?</h4>
            </div>
            <div class="modal-body row" align="center">
            <div class="col-lg-3 col-lg-offset-1" >
                <a href="<?php echo $base_url; ?>index.php?p=my_createproject"><img class="img-responsive" style="width:100px; text-align: center;" src="<?php echo $base_url; ?>images/get_involve/btn_alone.png"></a>
                <div class="caption">
                    <a href="<?php echo $base_url; ?>index.php?p=my_createproject"><h5><b>Individual</b></h5></a>
                </div>
            </div>
            <div class="col-lg-3"  align="center">
                <a href="<?php echo $base_url; ?>index.php?p=my_createproject"><img class="img-responsive" width="100px;" src="<?php echo $base_url; ?>images/get_involve/btn_create_team.png"></a>
                <div class="caption">
                    <a href="<?php echo $base_url; ?>index.php?p=my_createproject"><h5><b>Create a Team</b></h5></a>
                </div>
            </div>
            <div class="col-lg-3 <?php echo mysqli_num_rows($alreadyfollow)>0 ?'not_allow':'';  ?>"  align="center">
                <a readonly href="<?php echo $base_url; ?>index.php?p=update_profile&gid=<?php echo $_GET['gid']; ?>"><img class="img-responsive" width="100px;" src="<?php echo $base_url; ?>images/get_involve/btn_join_team.png"></a>
                <div class="caption">
                    <a href="<?php echo $base_url; ?>index.php?p=update_profile"><h5><b>Join Team</b></h5></a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Program/Plan -->

        <div class="modal fade" id="edit_prog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Solution Plan </h4>
              </div>
              
            <div class="modal-body" id="edit-prog-plan-editor">      
                    <input type="hidden" id="edit_prog_id" name="edit_prog_id" value="">
                    <p>What is the solution plan title?  </p>
                    <input type="text" name="edit_prog_title" id="edit_prog_title" class="form-control" required="" value=""><br/>
                    <p>What is the solution plan keyword ?  </p>
                    <input type="text" id="edit_prog_keyword" name='edit_prog_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <p>What is the solution plan content ?  </p>
                    <textarea name="edit_prog_content" id="edit_prog_content"  class="edit_prog_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="edit_prog_pic" id="new_prog_pic" style="display:inline;">
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
                  <button id="submit-edit-prog-plan" name="submit_edit_prog" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->
<script>    
    function InvolveProject(id)
        {
            var ID = id;
            var dataString = 'prog_id='+ ID;
            var URL=$.base_url+'involve_project_ajax.php';
            //var URL='http://localhost/carepositioning/involve_project_ajax.php';
            $.ajax({
                type: "POST",
                url: URL,
                data: dataString,
                cache: false,
                success: function(html){
                    alert("You have involved in our project!");
                }
                });
              
        }
    
</script>