<p>Needs & Aspiration
 <?php if ($group_owner_id == $uid) { ?>
    <span><a href="" data-toggle="modal" data-target="#add_aspiration">
      <i><img src="images/addition.png"></i></a></span><?php } ?>
</p>
            
        <!-- Popup Add New Aspiration -->

            <div class="modal fade" id="add_aspiration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                 <form method="post" enctype='multipart/form-data' action="">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add New Aspiration </h4>
                  </div>
                  <div class="modal-body">
                      Title: <input type="text" name="new_asp_title" style="width:90%; margin-bottom:10px;" value="" class="text-input" required="true" />
                      Content: <textarea name="new_asp_content" style="width:90%; height:150px;" required="true"></textarea><br/>
                      Profile Image:  <input type="file" name="new_asp_pic" id="new_asp_pic" style="display:inline;" required="">
                  </div>
                  <div class="modal-footer">
                      <input type="hidden" name="community_id" value="<?php echo $community_id;?>">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button id="submit" name="submit_new_aspiration" class="btn btn-primary">Save</button>
                  </div>
                  </form>
                </div>
              </div>
            </div> 
            
        <!-- End Popup -->
        
		<div class="row updateboxarea">
		<div class="col-lg-2">
			<div class="introduction-image"><img src="images/commnunities/123.png"></div>
			<p id="intor-text">Introduction</p>
		</div>
		<div class="col-lg-10 text-style">
                    <?php echo $aspiration_desc; ?>
                    <br/><br/>
                    <?php if($get_com_aspiration){ 
                        foreach ($get_com_aspiration as $rs) {

                           $asp_id = $rs['msg_id'];
                           $asp_title = $rs['msg_title'];
                           $asp_content = $rs['message'];

                           if($rs['image']){
                               $asp_pic = $base_url.'images/'.$rs['image'];
                           }else{
                               $asp_pic = $base_url.'wall_icons/default.png';
                           }
                           echo '<div class="row aspiration-text">';
                           echo '<div class="col-lg-3">';
                           echo '<img src="'.$asp_pic.'" class="img-circle" width="100" height="80" style="border-radius:50%;"/>';
                           echo '</div>';
                           echo '<div class="col-lg-9">'.$asp_title.'<br/><br/>'.$asp_content.'<br/>';
                           echo '<div class="row">';
                           echo '<div class="col-lg-4"> <button type="button" class="btn btn-danger">Get Involved</button></div>';
                           echo '<div class="col-lg-1"></div>';
                           echo '<div class="col-lg-2"> <button type="button" class="btn btn-danger">Edit</button></div>';
                           echo '<div class="col-lg-2"> <button type="button" class="btn btn-danger">Like</button></div>';
                           echo '<div class="col-lg-2"> <button type="button" class="btn btn-danger">Share</button></div>';
                           echo '<br/></div></div></div><br/>';
                       }  
                    }
                    ?>
<!--			<div class="row aspiration-text">
				<div class="col-lg-3">

					<img src="images/commnunities/asp-chadrent.jpg" class="img-circle" width="100" height="80">
                                </div>
				<div class="col-lg-9">Holy Church is a clean, flat and professional Religious Category Template for church’s, Ministries and Pray Centres studios. It can be customized easily to suit your wishes.<br/>
					<div class="row">
						<div class="col-lg-4"> <button type="button" class="btn btn-danger">Get Involved</button></div>
						<div class="col-lg-1"></div>
						<div class="col-lg-2"> <button type="button" class="btn btn-danger">Edit</button></div>
						<div class="col-lg-2"> <button type="button" class="btn btn-danger">Like</button></div>
						<div class="col-lg-2"> <button type="button" class="btn btn-danger">Share</button></div>
						<br/>
					</div>&nbsp;
				</div>
                        </div><br/>-->
                    
            </div>
                </div>  
        </div>
	<br/>
   <div class="row updateboxarea">
	
		<div class="col-lg-2">
			<div class="introduction-image"><img src="images/commnunities/golde.png"></div>
			<p id="intor-text">Goals</p>
		</div>
		<div class="col-lg-10 text-style">Holy Church is a clean, flat and professional Religious Category Template for church’s, Ministries and Pray Centres studios.<br/><div class="readmonre"><a href="">Read More</a></div></div>
	</div> <!-- the end of updateboxara-->

