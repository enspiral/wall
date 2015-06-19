
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
    <div class="text outcome">
        <p class="text-title"><b>Outcomes</b>
            <?php if ($group_owner_id == $uid) { ?>
                <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_outcomes" ><i class="glyphicon glyphicon-edit"></i></a></span></p>
            <p class="text-right"><button style="margin-top: -27px;" id="oc_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_oc_modal" >Add Outcomes</button></p>
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
                    <div class="row aspiration-text">
                       <?php
                    $data = $Wall->get_socialNeet($group_id, $uid,4);
                    foreach ($data as $value) {
                        $mid = $value['msg_id'];
                        $uploads = $value['uploads'];
                        $message_text  = $value['message'];
                        $message_title = $value['msg_title'];
                        $message_keyword = $value['msg_keyword'];


                        if ($uploads) {
                            $s = explode(",", $uploads);
                            $i = 1;
                            $f = count($s);
                            foreach ($s as $a) {
                                $newdata = $Wall->Get_Upload_Image_Id($a);
                                if ($newdata) {
                                    $final_image = $base_url . $upload_path . $newdata['image_path'];
                                }
                                $i = $i + 1;
                            }
                        }
                    }
                    ?>
                        <div class="col-lg-3">
                             <a href="#">
                            <img class="social-image" src="<?php echo $final_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><?php echo $message_title; ?></h4>
                        <p><?php echo $message_text; ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$message_keyword); ?></p><br/>

                        <?php//if ($group_owner_id == $uid) { ?>
                        <div>
                        <button id="<?php// echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Get Involved</button> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <button id="<?php //echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Edit</button>
                        <button id="<?php //echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Like</button>
                        <button id="<?php// echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button>
                    </div>
                    <?php// } ?>
                           &nbsp;
                        </div>
                </div>
            </div>

             <?php
    if($_GET['p']){
        $p = $_GET['p'];
    }else{
        $p= "";
    }
    
?>
              <!-- Social Needs -->
            <ul class="pager">
                <li class="previous"><a class='<?php echo $p=="social" || $p==""?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=social">&larr; Social Need</a></li>
                <li class="next"><a class='<?php echo $p=="program"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program"> Program/Plan &rarr; </a></li>

            </ul>
        </div>

    </div>
</div>



<div class="modal fade" id="add_oc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="popuptitle">New Outcomes </h4>
            </div>
            <div class="modal-body">      
                <?php
                if ($_SESSION['uid'] == $uid || $home) {
                    ?>
                    <div id="updateboxarea" data-step="1" data-intro="You can upload status."/>
                    <input type="text" name="sn_title" id="sn_title" class="form-control" placeholder="Title" required=""/><br/>
                    <input type="text" id="sn_keyword" name='sn_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
                    <textarea name="add_sn_content" id="add_sn_content" style="width:540px; height:200px;" placeholder="Content"></textarea>
                    <br />
                    <div id="webcam_container" class='border'>
                        <div id="webcam" >
                        </div>
                        <div id="webcam_preview">

                        </div>

                        <div id='webcam_status'></div>
                        <div id='webcam_takesnap'>

                            <input type="button" value=" Take Snap " onclick="return takeSnap();" class="camclick  wallbutton"/>
                            <input type="hidden" id="webcam_count" />
                        </div>
                    </div>
                    <div  id="imageupload" class="border">
                        <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url; ?>message_image_ajax.php'>
                            <div id='preview'>
                            </div>
                            <div id='imageloadstatus'>
                                <img src='<?php echo $base_url; ?>wall_icons/ajaxloader.gif'/> Uploading please wait ....
                            </div>
                            <div id='imageloadbutton'>
                                <span id='addphoto'>Add Photo:</span> <input type="file" name="photos[]" id="photoimg" multiple="true"/>
                            </div>
                            <input type='hidden' id='uploadvalues' />
                            <input type='hidden' id='group_id' value="<?php echo $groupID; ?>" name="group_id"/>
                        </form>
                    </div>
                    <div id="updateIcon">
                        <span class="floatRight">

                        </span>
                        <a href="javascript:void(0);" id="camera" title="Upload Image"></a>
                        <!--<a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"></a>  -->
                    </div>

                </div>

                <div id='flashmessage'>
                    <div id="flash" align="left"  ></div>
                </div>

                <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" id="btn_submit" class="btn btn-primary" name="submit_proj_lang" value="Save" />
            </div>
        </div>
    </div>
</div>



<script>
    $("#btn_submit").click(function(){
        var updateval = $("#add_sn_content").val();
        var sn_title = $("#sn_title").val();
        var sn_keyword = $("#sn_keyword").val();
        var group_id = $("#group_id").val();
        var up=$("#uploadvalues").val();
        var post_type = 4;
        
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