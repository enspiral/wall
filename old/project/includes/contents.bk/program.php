<script>
$(document).ready(function(){
    $("#remoreText").hide();
    $(".redmore").click(function(){
        $("#remoreText").slideToggle("slow");
        $(".hide-text").hide();
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
}
</script>
<div class="row contents">
    <div class="text program">
        <p class="text-title"><b>Program/Plan</b>
            <?php if ($group_owner_id == $uid) { ?>
                <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_program"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Program/Plan"></i></a></span>
                <p class="text-right"><button style="margin-top: -27px;" id="pg_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_pg_modal">Add Program/Plan</button></p>
            <?php } ?>
        </p>
        <div class="modal fade" id="edit_program" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Edit Program/Plan</h4>
                        </div>
                        <div class="modal-body">
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
                $data = $Wall->Get_Project_Prog_Plan($proj_id);
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
                             <a href="#">
                            <img class="social-image" src="<?php echo $base_url.'images/'.$pp_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><?php echo $pp_title; ?></h4>
                        <p><?php echo $pp_content; ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$pp_keyword); ?></p><br/>

                        <?php if ($group_owner_id == $uid) { ?>
                        <div>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="InvolveProject(<?php echo $pp_id ?>)">Get Involved</button> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <a href="" data-toggle="modal" data-target="#edit_prog">
                            <button class="btn btn-social" onclick="editProgPlan(<?php echo $pp_id ?>, '<?php echo $pp_title ?>', '<?php echo $pp_keyword ?>', '<?php echo htmlspecialchars($pp_content) ?>')">
                                Edit
                            </button>
                        </a>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="FollowProject(<?php echo $groupID ?>)">Like</button>
                         <a href="" data-toggle="modal" data-target="#add_pp_outcome">
                            <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="document.getElementById('popoup_pp_id').value=<?php echo $pp_id ?>">Add Outcome</button>
                        </a>
                       
                   </div>
                   
                    <?php } ?>
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
            <input type="hidden" id="popoup_pp_id" name="outcome_pp_id" value="" /><br/>
            <input type="text" name="new_outcome_title" id="outcome_title" class="form-control" placeholder="Title" required=""/><br/>
            <input type="text" id="outcome_keyword" name='new_outcome_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
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

<!-- Edit Program/Plan -->

        <div class="modal fade" id="edit_prog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Program/Plan </h4>
              </div>
              
            <div class="modal-body" id="edit-prog-plan-editor">      
                    <input type="hidden" id="edit_prog_id" name="edit_prog_id" value="">
                    <input type="text" name="edit_prog_title" id="edit_prog_title" class="form-control" required="" value=""><br/>
                    <input type="text" id="edit_prog_keyword" name='edit_prog_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
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