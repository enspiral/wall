<?php 
    if($_GET['gid']){
        $gid = $_GET['gid'];
        $data_com = mysqli_query($db,"SELECT community.*,groups.group_name as com_name,groups.group_pic as pic,community.map as map from community INNER JOIN groups ON community.group_id = groups.group_id WHERE groups.group_id='$gid'");
        
    }else if($_SESSION['user_role']==2){
              $data_com = mysqli_query($db,"SELECT community.*,groups.group_name as com_name,groups.group_pic as pic,community.map as map from community INNER JOIN groups ON community.group_id = groups.group_id WHERE groups.uid_fk='$uid'");
    }
    foreach ($data_com as $value) {
        $com_id = $value['com_id'];
        $com_name = $value['com_name'];
        $des =      $value['com_desc'];
        $picture =      $value['pic'];
        $location =      $value['location'];
        $map =      $value['map'];
    }

?>


<style>
    .active{
        background-color: #2AA9DE;
        color:white;
    }
    #nav-group ul li .active:hover,#nav-group ul li .active:focus{
        color:white;
    }
    
</style>

<!-- Timeline Group Nav -->
<div  id="nav-group">
    <div id="timelineButtons">
        <?php
        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        }else{
            $tab= "welcome";
        }
        
        ?>      
        
    </div>
    <?php
    if($uid==$group_owner_id){ ?>
		<?php
	        if(isset($_GET['volunteer'])){
	            $volunteer = $_GET['volunteer'];
	        }else{
	            $volunteer= "home";
	        }
        ?>
                <ul>
                    <li><a class='<?php echo $tab=="welcome"?"active":""; ?>' href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=welcome"><i class="glyphicon glyphicon-home"> </i></a></li>
                    <li><a class='<?php echo $tab=="about"?"active":""; ?>' href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=about">ABOUT US</a></li>
                    <li><a class='<?php echo $tab=="volunteer"?"active":""; ?>' href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=volunteer">VOLUNTEER</a></li>
                    <li><a class='<?php echo $tab=="contact"?"active":""; ?>' href="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=health&tab=contact">CONTACT</a></li>
                </ul>
    <?php }else if($_GET['gid']){ ?>
		<?php
	        if(isset($_GET['volunteer'])){
	            $volunteer = $_GET['volunteer'];
	        }else{
	            $volunteer= "home";
	        }
        ?>
                <ul>
                    <li><a class='<?php echo $tab=="welcome"?"active":""; ?>' href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=welcome"><i class="glyphicon glyphicon-home"> </i></a></li>
                    <li><a class='<?php echo $tab=="about"?"active":""; ?>' href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=about">ABOUT US</a></li>
                    <li><a class='<?php echo $tab=="volunteer"?"active":""; ?>' href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=volunteer">VOLUNTEER</a></li>
                    <li><a class='<?php echo $tab=="contact"?"active":""; ?>' href="<?php echo $base_url; ?>community_follow.php?gid=<?php echo $gid; ?>&tab=contact">CONTACT</a></li>
                </ul>
    <?php } ?>
</div>
<div class="">
        <?php
            if(isset($_GET['tab'])){
                $page = $_GET['tab'];

            } else {
               $page = "welcome"; 

            }  
            include("health/".$page.".php");
        ?>
    </div>
