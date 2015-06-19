<?php 
	$com_welcome_post = mysqli_query($db,"select * from com_tab_welcome  WHERE com_id = '$com_id' AND disabled = 0");
        //data community .............
        
 ?>
<div class="welcome_container">  
	<div class="btn_slide">
		<a  href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer_now"><button class="btn invole" style="margin-right:1%;"><i class="fa fa-facebook"></i>&nbsp;&nbsp; Tell a friend</button></a>
		<a  href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer_now"><button class="btn invole " style="margin-right:1%;">Volunteer Now</button></a>
     	<a  href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer_now"><button class="btn invole " >Inquire Here</button></a>
	</div>  
	
	<div id="wowslider-container1">
 
	<div class="ws_images">
		<ul>
            <?php
                $slide_data = mysqli_query($db, "SELECT * FROM com_slideshow WHERE com_id = '$com_id'");
                foreach ($slide_data as $value) {
            ?>
            <li>
            	<center><h3 class="header_cover">welcome</h3></center>s
                <img src="<?php echo $base_url; ?>images/com_slideshows/<?php echo $value['file_name']; ?>"  title="<?php echo $value['slide_des']; ?>" id=""/>
			</li>
            <?php } ?>
		</ul>
	</div>
	</div>
	<div class="village_name">
		<div class="village_img">
			<img src="<?php echo $base_url; ?>uploads/<?php echo $picture; ?>">
		</div>
		<div class="content">
			<span class="title"><?php echo $com_name; ?></span>
			<br><br>
			<p class="address"><?php echo $location; ?></p>
			<p class="body_content"><?php echo $des; ?></p>
		</div>
		<div class="map">
			<?php echo $map; ?>
			<button class="btn invole " >Get Involved</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>

	<div style="clear:both"></div>
	<hr style="color:pink;">
	<div class="what_can_do">
	<?php 
	$contents = mysqli_query($db,"select * from com_welcome_content where com_id= ".$com_id.";");
 	?>
		<center>
			<p><span>What can you do here?</span>
                        <?php if($group_owner_id==$uid){ ?>
			<span class="edit-icon"><a data-toggle="modal" data-target='#edit_title' href=""><i class="glyphicon glyphicon-edit"></i></a></span>
                        <?php } ?>
                        </p>
		</center>
		<?php foreach ($contents as $content) { ?>
			<div class="row_content2">
				<h4><?php echo $content['title']; ?></h4>
				<p class="p"><?php echo $content['content']; ?></p>
			</div>
		<center>
		
		<div class="modal fade" id="edit_title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title" id="exampleModalLabel">Edit What you can do here</h4>
		            </div>
		            <div class="modal-body">
		            	<input type="text" class="form-control" name="title" id="title" value="<?php echo $content['title']; ?>"/>
		            	<textarea style="height:150px; width:100%;" name="content" id="content"> <?php echo $content['content']; ?></textarea>
		            </div>
		            <div class="modal-footer">
		                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
		                    <button id="<?php echo $content['id']; ;?>" name="save" class="btn btn-sm btn-primary update-content">Update</button>
		                </div>
		        </div>
		    </div>
		</div>
		<?php } ?>
	<hr style="color:pink;">
			<p><span>What can you do here?</span>
                        <?php if($group_owner_id==$uid){ ?>
			<span class="edit-icon"><a href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=edit_com_welcome"><i class="glyphicon glyphicon-edit"></i></a></span>
			<?php } ?>
                        </p>
		</center>
		<div class="row_container">
		<?php 
			  foreach ($com_welcome_post as $res) {
		?>
			<div class="row">
				<div class="row_img">
					<img src="<?php echo $base_url; ?>images/commnunities/welcome/<?php echo $res['image'];?>">
				</div>
				<div class="row_content">
					<h4><?php echo $post_title = $res['title']; ?></h4>
					<p class="p"><?php echo  $post_content = $res['decription'];?></p>
				</div>
			</div><br/><br/>
			<?php } ?>
		</div>
	</div>
        
</div>

<!--slidshow communities-->
<script type="text/javascript" src="<?php echo $base_url; ?>js/com_slidshow/wowslider.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>js/com_slidshow/script.js"></script>
<script type="text/javascript">
	$('.update-content').click(function(){
        var id = $(this).attr('id');
        var title = $('#title').val();
        var content = $('#content').val();
        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>community/ajax_community.php',
            data:{
               content    	:content,
               id    		:1,
               title 		: title,
               welcome  	:'welcome',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });
</script>

