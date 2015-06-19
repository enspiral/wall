<?php

    /* Group Profile Values */
    $loginCheck = 0;
    if ($group_owner_id == $uid) {
        $loginCheck = 1;
    }
    $timeline_pic = $group_pic;
    $position = $group_bg_position;
    $timeline_name = $group_name;
    $verified = 0;

?>

<div class="wall_container">
    <div class="row village_name">
                    <div class="image-left">
                         <?php if($loginCheck){?>
                        <form id="profileimageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url; ?>image_upload_ajax.php'>
                        <div  class="uploadFile timelineUploadImg">
                        <input type="file"  name="photoimg" id="profilephotoimg" class=" custom-file-input " original-title="Upload Profile Picture">
                        </div>
                        <input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
                        <input type='hidden' name="imageType" value='1'/>
                        </form>
                        <?php } ?>
                        <img src="<?php echo $timeline_pic; ?>" id="timelineIMG" class="previousImage"/>
                           
                    </div>
                    <div class="text-middle">
                            <h4><?php echo $group_name; ?></h4>
                            <p><?php echo $com_desc; ?></p>
                             <?php if ($group_owner_id == $uid) { ?>
               <a href="" data-toggle="modal" data-target="#edit_com_desc"><i class="glyphicon glyphicon-edit"></i>edit description</a><?php } ?>

                
                 <!-- Popup Edit Introduction -->
                <div class="modal fade" id="edit_com_desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <form method="post" action="">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Edit Community Description</h4>
                      </div>
                      <div class="modal-body">
                          <textarea name="edit_com_desc" style="width:100%; height:150px;"><?php echo $com_desc; ?></textarea>
                      </div>
                      <div class="modal-footer">
                           <input type="hidden" name="com_id" value="<?php echo $community_id; ?>">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button id="submit" name="submit_edit_com_desc" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                 <!-- End Popup -->
                    </div>
                <div class="image-right">
                    <div class="map-image">
                    <img src="images/commnunities/map_britannica.gif" alt="advertiment one" width="220" height="130">
                    </div>
                        <div class="btn-map">
                            <button type="button" class="btn btn-default btn-sm both-involved">Get Involved</button>
                            <button type="button" class="btn btn-default btn-sm both-involved"><span class="glyphicon glyphicon-king"></span>Tell Friends</button>
                       </div>
                </div>
    </div> <!-- the end of updateboxarea -->
</div> <!-- -->
<br/>
<div class="row theories-bg">
	<div class="nav-icon">
       <!--  <span id="image2">hhhh</span> -->
        <div id="image1"></div>
        <div id="image2"></div>
        <div id="image3"></div> 
    	

	</div>
	<div class="nav-menu">
		<ul class="sub-menu">
                    <ol>
                            <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=introduction">Introduction</a>
                    </ol>
                    <ol>
                            <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=theory_of_change">Theory of Change Dashboard</a>
                    </ol>
                    <ol>
                            <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=aspiration">Needs & Aspirations</a>
                    </ol>
                    <ol>
                            <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=contribution">Past Contributions</a>
                    </ol>
                    <ol>
                            <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=audit">CPS Audit</a>
                    </ol>
</ul></div>
	<div class="change_theory">
            <?php
                    if ($_GET['page']) {
                        $page = $_GET['page'];
                    } else if($page == 'introduction') {
                        $page = 'introduction';
                    }else if($page == 'aspiration') {
                        $page = 'aspiration';
                    }else if($page == 'contribution') {
                        $page = 'contribution';
                    }else if($page == 'audit') {
                        $page = 'audit';
                    }else{
                            $page = 'introduction';
                    }
                    include "pages/$page.php";
            ?>
</div>

<!-- <ul>
    <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=introduction"><li>Introduction</li></a>
    <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $groupID; ?>&page=contact"><li>Contact</li></a>
</ul> -->
