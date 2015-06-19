
<script>
$(document).ready(function(){
    $("#remoreText").hide();
    $(".redmore").click(function(){
        $("#remoreText").slideToggle("slow");
        $(".hide-text").hide();
    });
    
    $(".edit_outcome_editor").Editor();
        
    $('#submit-edit-outcome').click(function(){
        document.getElementById("edit_outcome_content").value += $("#edit-outcome-editor .Editor-editor").html();
    });
});

function editOutcome(id, title, keyword, content){
        $('#edit_outcome_id').val(id);
        $('#edit_outcome_title').val(title);
        $('#edit_outcome_keyword').val(keyword);
       
        var ele = document.getElementById('edit-outcome-editor').getElementsByClassName('Editor-editor');
        ele[0].innerHTML = content;
}
</script>
<div class="row contents">
    <div class="text outcome">
        <p class="text-title"><b>Outcomes</b>
            <?php if ($group_owner_id == $uid) { ?>
                <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_outcomes" ><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Outcome"></i></a></span></p>
            <!-- <p class="text-right"><button style="margin-top: -27px;" id="oc_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_oc_modal" >Add Outcomes</button></p> -->
        <?php } ?>

        <div class="modal fade" id="edit_outcomes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Edit Outcomes</h4>
                        </div>
                        <div class="modal-body">
                            <textarea name="para_outcome" class="text-editor" style="width:540px; height:200px;"><?php echo $outcome; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" name="submit_para_outcome" value="Save" />
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
                       
                        if (strlen($outcome) >= 300) {
                        $trimstring = substr($outcome, 0, 300). '&nbsp;<div class="redmore"><a href="#remoreText">Read More...</a></div>';
                         echo '<span class="hide-text">'.$trimstring.'</span>';
                        ?>
                        <div id="remoreText"><?php echo $outcome; ?></div>
                        <?php
                        } else {
                        echo $outcome;
                        }
                      // echo $trimstring;
                        ?>
                    </p><br>
                       <?php
                        $data = $Wall->Get_Project_Outcomes($proj_id);
                        foreach ($data as $value) {
                            $outcome_id = $value['outcome_id'];
                            $outcome_msg_id = $value['msg_id'];
                            $outcome_title = $value['msg_title'];
                            $outcome_content = $value['message'];
                            $outcome_keyword = $value['outcome_keywords'];
                            $outcome_image = $value['outcome_image'];
                    ?>
                     <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="#">
                            <img class="social-image" src="<?php echo $base_url.'images/'.$outcome_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><?php echo $outcome_title; ?></h4>
                        <p><?php echo $outcome_content; ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$outcome_keyword); ?></p><br/>
                        
                        <?php if ($group_owner_id == $uid) { ?>
                        <div>
                        <button id="<?php// echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Get Involved</button> &nbsp; &nbsp; &nbsp;
                         <a href="" data-toggle="modal" data-target="#edit_outcome">
                            <button class="btn btn-social" onclick="editOutcome(<?php echo $outcome_id ?>, '<?php echo $outcome_title ?>', '<?php echo $outcome_keyword ?>', '<?php echo htmlspecialchars($outcome_content) ?>')">
                                Edit
                            </button>
                        </a>
                        <button id="<?php //echo $sn_id; ?>" class="btn btn-social" onclick="FollowProject(<?php echo $groupID ?>)">Like</button>
                        <button id="<?php// echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button>
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

              <!-- Outcome -->
            <ul class="pager">
                <li class="previous"><a class='<?php echo $p=="program"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program">  &larr;Program/Plan  </a></li>
                <li class="next"><a class='<?php echo $p=="social" || $p==""?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=social"> Social Need &rarr;</a></li>
                

            </ul>
        </div>
    </div>


<!-- Popup Edit Outcome -->
<div class="modal fade" id="edit_outcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Outcome </h4>
              </div>
              
            <div class="modal-body" id="edit-outcome-editor">      
                    <input type="hidden" id="edit_outcome_id" name="edit_outcome_id" value="">
                    <input type="text" name="edit_outcome_title" id="edit_outcome_title" class="form-control" required="" value=""><br/>
                    <input type="text" id="edit_outcome_keyword" name='edit_outcome_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <textarea name="edit_outcome_content" id="edit_outcome_content"  class="edit_outcome_editor" style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="edit_outcome_pic" id="new_outcome_pic" style="display:inline;">
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
                  <button id="submit-edit-outcome" name="submit_edit_outcome" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 
<!-- End Pop-up-->