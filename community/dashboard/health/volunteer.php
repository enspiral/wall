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
	                <center><h3 class="header_cover">Volunteer</h3></center>
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
			<button class="btn invole">Get Involved</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
	<div style="clear:both"></div>
	<br>
        <?php if($group_owner_id==$uid){ ?>
	<div class="volunteer_menu">
		<?php
	        if(isset($_GET['volunteer'])){
	            $volunteer = $_GET['volunteer'];
	        }else{
	            $volunteer= "deverlopment_plan";
	        }
        ?>
                <ul class="menu_volunteer">
			<!--<li class='<?php echo $volunteer=="home"?"active":""; ?>'><a href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer&volunteer=home"><i class="glyphicon glyphicon-home"></i></a></li>-->
			<li class='<?php echo $volunteer=="deverlopment_plan"?"active":""; ?>'><a href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer&volunteer=deverlopment_plan">Our Development Plan</a></li>
			<li class='<?php echo $volunteer=="opportunity"?"active":""; ?>'><a  href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer&volunteer=opportunity">Volunteer Opportunities</a></li>
			<li class='<?php echo $volunteer=="important_info"?"active":""; ?>'><a  href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer&volunteer=important_info">Important Info</a></li>
		</ul>
                
	</div>
        <?php }else if($_GET['gid']){ ?>
	<div class="volunteer_menu">
		<?php
	        if(isset($_GET['volunteer'])){
	            $volunteer = $_GET['volunteer'];
	        }else{
	            $volunteer= "deverlopment_plan";
	        }
        ?>
                <ul class="menu_volunteer">
			<!--<li class='<?php echo $volunteer=="home"?"active":""; ?>'><a href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=volunteer&volunteer=home"><i class="glyphicon glyphicon-home"></i></a></li>-->
			<li class='<?php echo $volunteer=="deverlopment_plan"?"active":""; ?>'><a href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=volunteer&volunteer=deverlopment_plan">Our Development Plan</a></li>
			<li class='<?php echo $volunteer=="opportunity"?"active":""; ?>'><a  href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=volunteer&volunteer=opportunity">Volunteer Opportunities</a></li>
			<li class='<?php echo $volunteer=="important_info"?"active":""; ?>'><a  href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=volunteer&volunteer=important_info">Important Info</a></li>
		</ul>
                
	</div>
        <?php } ?>
	<div style="clear:both"></div>
	<br>
	<div class="">
		<?php
            if(isset($_GET['volunteer'])){
                $page = $_GET['volunteer'];

            } else {
               $page = "deverlopment_plan"; 

            }  
            include("volunteer/".$page.".php");
        ?>
	</div>
<script type="text/javascript" src="<?php echo $base_url; ?>js/com_slidshow/wowslider.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>js/com_slidshow/script.js"></script>