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
                       
                        if (strlen($social_need) > 300) {
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
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Get Involved</button> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Edit</button>
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Like</button>
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button>
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
                  Title: <input type="text" name="new_sn_title" style="width:90%; margin-bottom:10px;" value="" class="text-input" required="true" />
                  Content: <textarea name="new_sn_content" style="width:90%; height:150px;" required="true"></textarea><br/>
                  Keywords: <input type="text" id="new_sn_keyword" name='new_sn_keyword' class="form-control" data-role="tagsinput"  value="" required=""/><br/>
                  Profile Image:  <input type="file" name="new_sn_pic" id="new_sn_pic" style="display:inline;" required="">
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