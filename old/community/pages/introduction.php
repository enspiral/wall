<h3>Introduction</h3>
    

    <div class="col-lg-12 text-style">
            <div id="com_proj" class="carousel slide" data-interval="5000" style="background-color:#ffffff">
               <div class="carousel-inner">

                    <?php if($all_com_proj){
                        $count=1;
                        foreach ($all_com_proj as $res) {
                            $com_proj_id = $res['group_id'];
                            $com_proj_name = $res['group_name'];
                            $com_proj_intro = $res['proj_intro'];
                            
                            if($res['group_pic']){
                                $com_proj_pic = $base_url.'uploads/'.$res['group_pic'];
                            }else{
                                $com_proj_pic = $base_url.'wall_icons/default.png';
                            }
                            
                            if($count>0){
                                 echo '<div class="item text-in-slide active">';
                                 $count--;
                            }else{
                                echo '<div class="item text-in-slide">';
                            }
                            echo '<a href="#"><img src="'.$com_proj_pic.'" style="width:120px; height:120px;"/></a></br>';
                            echo '<p class="slide-text-style"><b>'.$com_proj_name.'</b><br />';
                            echo $com_proj_intro.'</div>';
                        }
                    } ?>
            </div>
            </div>
        <a class="left carousel-control"  href="#com_proj" role="button" data-slide="prev"><img src="images/ddd.png"></a>
        <a class="right carousel-control"  href="#com_proj" role="button" data-slide="next"><img src="images/right.png"></a>
        </div>

    <!-- Overview -->
    <div class="row updateboxarea">	
	<h3 id="intor-text">Overview</h3>
        <div class="col-lg-12 text-style">
            <p><?php echo $com_overview; ?>
            <?php if ($group_owner_id == $uid) { ?>
            <span><a href="" data-toggle="modal" data-target="#edit_com_overview"><i class="glyphicon glyphicon-edit"></i></a></p></span><?php } ?>
        </div>
        
        
        
         <!-- Popup Edit Overview -->
        <div class="modal fade" id="edit_com_overview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Community Overview</h4>
              </div>
              <div class="modal-body">
                  <textarea name="edit_com_overview" style="width:100%; height:150px;"><?php echo $com_overview; ?></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_edit_com_overview" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Popup -->
    </div>
	
    <!-- Factsheet -->
    <div class="row updateboxarea">	
	<h3 id="intor-text">Factsheet</h3>
	<div class="col-lg-12 text-style">
            <?php 
             echo '<div class="col-lg-3"><a href="'.$factsheet_url.'"><img src="'.$factsheet_img.'" style="width:120px; height:120px;"/></a></div>';
             echo '<div class="col-lg-9"><p><a href="'.$factsheet_url.'">'.$factsheet_title.'</a>'.$factsheet_content;
             if ($group_owner_id == $uid) { ?>
            <span><a href="" data-toggle="modal" data-target="#edit_com_factsheet"><i class="glyphicon glyphicon-edit"></i></a></p></span>
             <?php } 
            echo '</div>';
             ?>
            
            <!-- Popup Community Fachsheet  -->
            <div class="modal fade" id="edit_com_factsheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form method="post" enctype='multipart/form-data' action="">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add New Partner </h4>
                  </div>
                  <div class="modal-body">
                      Title: <input type="text" name="edit_factsheet_title" style="width:90%; margin-bottom:10px;" value="<?php echo $factsheet_title; ?>" class="text-input" required="true" />
                      Content: <textarea name="edit_factsheet_content" style="width:90%; height:150px;"><?php echo $factsheet_content; ?></textarea><br/>
                      URL: <input type="url" name="edit_factsheet_url" style="width:90%; margin-bottom:10px;" value="<?php echo $factsheet_url; ?>" class="text-input" required="true" />
                      Image:  <input type="file" name="edit_factsheet_img" id="edit_factsheet_img" style="display:inline;" required="">
                  </div>
                  <div class="modal-footer">
                      <input type="hidden" name="community_id" value="<?php echo $community_id;?>">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="submit" name="submit_edit_factsheet" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Community Factsheet -->   
            
            
        </div>
    </div>
    
    <!-- Partner -->
    <div class="row updateboxarea">
		
	<h3 id="intor-text">Partner</h3>
	<div class="row collapes-image">
            <?php 
           if($all_com_partners){
               foreach ($all_com_partners as $rs) {

                   $com_partner_id = $rs['id'];
                   $com_partner_title = $rs['title'];
                   $com_partner_url = $rs['url'];
                   
                   if($rs['logo_path']){
                       $com_partner_logo_path = $base_url.'images/com_partners/'.$rs['logo_path'];
                   }else{
                       $com_partner_logo_path = $base_url.'wall_icons/default.png';
                   }
                   echo '<div class="col-lg-3">';
                   echo '<div><a href="'.$com_partner_url.'"><img src="'.$com_partner_logo_path.'" style="width:120px; height:120px;"/></a>';
                   echo '</div><br/>';
                   echo '<div style="margin-right:50px;"><p style="margin-right:20px; text-align:center;"><b>'.$com_partner_title.'</b></p></div>';
                   echo '</div>';
                          
               }
           }
           ?>
            
       </div>
         <?php if ($group_owner_id == $uid) { ?>
        <p class="text-right"><a href="<?php echo $base_url.'show_community_partner.php?com_id='.$community_id; ?>"><i class="glyphicon glyphicon-edit"></i>partners management</a></p>
       <?php } ?>
    </div>
</div>
