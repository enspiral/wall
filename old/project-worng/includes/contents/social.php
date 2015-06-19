<script>
$(document).ready(function(){
    $("#remoreText").hide();
    $(".redmore").click(function(){
        $("#remoreText").slideToggle("slow");
        $(".hide-text").hide();
    });
});
</script>

<div class="row contents">
    <div role="tabpanel" class="tab-pane" id="socailneed">
        <div class="text social_need">
            <p class="text-title"><b>Social Needs</b>

                <?php if ($group_owner_id == $uid) {
                        //echo $group_owner_id.'Hello world';
                 ?>

                 <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_social_need"><i class="glyphicon glyphicon-edit"></i></a></span>
                     <p class="text-right"><button style="margin-top: -27px;" id="sn_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_new_sn">Add Social Need</button></p>
                <?php } ?>
             <div class="row updateboxarea des">
                <div class="col-lg-2">
                    <p><img src='<?php echo $base_url . "/images/socail/socail-need.png"; ?>' align="left" border="0"><br>
                   </p>
                    <!-- <div class="introduction-image"><img src="images/commnunities/123.png"></div>
                    <p id="intor-text">Intradution</p> -->
                </div>
                <div class="col-lg-10 text-style">
                    <?php 
                       echo $social_need."hello worldd";
                        if (strlen($social_need) > 300) {
                        echo $social_need.'Hello world';
                        $trimstring = substr($social_need, 0, 300). '&nbsp;<div class="redmore"><a href="#remoreText">Read More...</a></div>';
                         echo '<span class="hide-text">'.$trimstring.'</span>';
                        ?>
                        <div id="remoreText"><?php echo $social_need; ?></div>
                        <?php
                        } else {
                        $trimstring = $social_need;
                        }
                      // echo $trimstring;
                        ?>

            <?php
            //    $data = $Wall->get_socialNeet($group_id, $uid,2);
                $data = $Wall->Get_Project_Social_Need($proj_id);
                foreach ($data as $value) {
                    $sn_id = $value['sn_id'];
                    $sn_msg_id = $value['msg_id'];
                    $sn_title = $value['msg_title'];
                    $sn_content = $value['message'];
                    $sn_keyword = $value['sn_keywords'];
                    $sn_image = $value['sn_image'];
                ?>
                <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="#">
                            <img class="social-image" src="<?php echo 'images/'.$sn_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><?php echo $sn_title; ?></h4>
                        <p><?php echo $sn_content; ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$sn_keyword); ?></p><br/>

                        <?php if ($group_owner_id == $uid) { ?>
                        <div>
                        <a href="<?php echo $base_url.'view_sn_program_plan.php?sn_id='.$sn_id; ?>"><button id="<?php echo $sn_id; ?>" class="btn btn-social">Get Involved</button></a> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Edit</button>
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Like</button>
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button>
                        <a href="" data-toggle="modal" data-target="#add_sn_prog_plan">
                            <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="document.getElementById('popoup_sn_id').value=<?php echo $sn_id ?>">Add PP</button>
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
                        
            <!-- Social Needs -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Newer</a>
                </li>
                <li class="next">
                    <a href="#">Older &rarr;</a>
                </li>
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
              
            <div class="modal-body">      
             
                    <input type="text" name="new_sn_title" id="sn_title" class="form-control" placeholder="Title" required=""/><br/>
                    <input type="text" id="sn_keyword" name='new_sn_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <textarea name="new_sn_content" id="add_sn_content"  style="width:100%; height:100px;" placeholder="Content"></textarea>
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
                  <button id="submit" name="submit_new_sn" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->


<!-- Add Program Plan -->

        <div class="modal fade" id="add_sn_prog_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New Social Need </h4>
              </div>
              
            <div class="modal-body">      
                    <input type="hidden" id="popoup_sn_id" name="sn_id" value="" /><br/>
                    <input type="text" name="new_pp_title" id="sn_title" class="form-control" placeholder="Title" required=""/><br/>
                    <input type="text" id="sn_keyword" name='new_pp_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <textarea name="new_pp_content" id="add_sn_content"  style="width:100%; height:100px;" placeholder="Content"></textarea>
                    <input type="file" name="new_pp_pic" id="new_sn_pic" style="display:inline;" required="">
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
                  <button id="submit" name="submit_new_pp" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div> 

<!-- End Popup -->

<script>
    $("#btn_submit").click(function(){
        var updateval = $("#add_sn_content").val();
        var sn_title = $("#sn_title").val();
        var sn_keyword = $("#sn_keyword").val();
        var group_id = $("#group_id").val();
        var up=$("#uploadvalues").val();
        var post_type = 2;
        
        if(up){
            var uploadvalues=$("#uploadvalues").val();
        }else{
            var uploadvalues=$(".preview:last").attr('id');
        }

            var X=$('.preview').attr('id');
            var Y=$('.webcam_preview').attr('id');
        if(X){
            var Z= X+','+uploadvalues;
        }else if(Y){
            var Z= uploadvalues;
        }else{
            var Z=0;
        }
        var dataString = 'add_socail_need='+updateval+'&uploads='+Z+'&group_id='+group_id+'&sn_title='+sn_title+'&sn_keyword='+sn_keyword+'&post_type='+post_type;
        if($.trim(sn_title).length==0){
            alert("Please Enter Title");
        }else if($.trim(updateval).length==0){
            alert("Please Enter Socail Need Content");
        }else{
            $("#flash").show();
            $("#flash").fadeIn(400).html('Loading Update...');
            $.ajax({
                type: "POST",
                url: "<?php echo $base_url; ?>message_ajax.php",
                data: dataString,
                cache: false,
                success: function(html){
                    location.reload();
                    $("#webcam_container").slideUp('fast');
                    $("#flash").fadeOut('slow');
                    $("#content").prepend(html);
                    $("#social_need").val('').focus().css("height", "40px");
                    $('#preview').html('');
                    $('#webcam_preview').html('');
                    $('#uploadvalues').val('');
                    $('#photoimg').val('');
                    var c=$('#update_count').html();
                    $('#update_count').html(parseInt(c)+1);
                }
            });
            $("#preview").html();
            $('#imageupload').slideUp('fast');
        }
        return false;   
    });
    
</script>