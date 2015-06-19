<?php
    include_once 'includes.php';
    include_once 'oauth_redirection.php';
    include_once 'project_title.php';
    include_once 'js.php';
    
//  $groupID=$_GET['groupID'];
    $groupID = 9;
    $GroupDetails=$Wall->Group_Details($groupID);
    $ProjectDetails = $Wall->Project_Details($groupID);
    $group_member_id=$Wall->Group_Follower_Check($uid,$groupID);
    $group_id=$GroupDetails['group_id'];
    $group_name=htmlcode($GroupDetails['group_name']);
    $group_name=nameFilter($group_name,35);
    $group_desc=htmlcode($GroupDetails['group_desc']);
    $group_owner_id=$GroupDetails['group_owner_id'];
    $group_pic=$GroupDetails['group_pic'];
    $group_pic=imageCheck($group_pic,$upload_path,$base_url);
    $group_count=$GroupDetails['group_count'];
    $group_bg=$GroupDetails['group_bg'];
    $group_updates=$GroupDetails['group_updates'];
    $group_bg_position=$GroupDetails['group_bg_position'];
    $proj_intro = $ProjectDetails['proj_intro'];
    
    if(isset($_POST['submit_proj_intro'])){
        $proj_intro = $_POST['p1_intro'];
        $Wall->Update_Proj_Intro($proj_intro,$group_id);
    }
    if(isset($_POST['cancel_proj_intro'])){
        $proj_intro = $proj_intro;
        //$Wall->Update_Group_Desc($group_desc, $uid, $group_id);
    }
?>
<script type="text/javascript" src="<?php echo $base_url.'js/popup-window.js'; ?>"</script>
<!--script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script-->
<style>
     div.showcase{
        width:980px;
        margin: 0 auto;
    }
    
    div.showcase-left{
        float:left;
        width:700px;
    }
   
    div.showcase-right{
        float:left;
        width:150px;
    }
    
    .tansa, .arrow {
        display:none;
        position:absolute;
        left:500px; /*[wherever you want it]*/
    }

    .profile_show div{
        float:left;   
    }

    .profile_show{
        width:380px;
    }
    
    .proj_intro{
        width:500px;
        background: pink;
        font-size:12px;
        font-family: sans-serif;
        padding: 20px;
        margin-bottom: 20px;
    }
    
     .proj_intro img{
        float:right;
    }
    
     /*Style Popup */
    div.popup_window_css { position: absolute; display: none; }
    
    div.popup_window_css_head { 
        border: 1px solid black; 
        border-width: 1px 1px 1px 1px; 
        padding: 2px 6px 2px 6px; 
        background: #802000; 
        font: 900 14px "Trebuchet MS", Sans-Serif;
        color: #FFFFFF;
        cursor: default;
    }
    
    div.popup_window_css_head img {
        float: right;
        margin: 4px 0px 0px 1px;
        cursor: pointer;
    }
    
    div.popup_window_css_body { 
        height: 200px;
        border: 1px solid black; 
        border-width: 0px 1px 0px 1px; 
        padding: 6px 6px 0px 6px; 
        background: #DBDBBA; 
    }
</style>
<div class="showcase">
    <!-- Popup Window start -->
<div id="popup_window_1" class="popup_window_css">
    <div class="popup_window_css_head"><img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9" />Introduction</div>
    <div class="popup_window_css_body">
    <form method="post" action="">
        <textarea name="p1_intro" style="width:100%; height:150px;"><?php echo $proj_intro; ?></textarea>
        <input type="submit" class="wallbutton" name="submit_proj_intro" value="Save" />
        <!-- onClick="$('#popup_window_id_1').hide(); window.location.reload();" -->
        <input type="submit" class="wallbutton" name="cancel_proj_intro" value="Cancel" />
    </form>
    </div>
</div>
<!-- End popup -->
    <div class="showcase-left">
        <div class="proj_intro">
            <?php echo $proj_intro; ?><br>
            <img src="<?php echo $base_url.'wall_icons/edit_icon.png'; ?>" /> style="cursor: pointer;" onclick="popup_window_show('#popup_window_1', { pos : 'tag-right-down', parent : this, x : 20, y : 0, width : '400px'}); return false;">
        </div>
        <?php
        $friendslist=$Wall->Group_Followers($group_id,'', '', 35);

        if($friendslist)
        {
        $list_count = 1;
        foreach($friendslist as $f)
        {
            $fid=$f['uid'];
            $fname=$f['username'];
            $friend_face=$Wall->User_Profilepic($fid,$base_url,$upload_path);
            $top1 = 150;
            $top2 = 320;
         //   echo '<a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" height=80 width=80 class="tansef" original-title="'.$Wall->UserFullName($fname).'" ></a>';
            if($list_count == 1){
                echo '<div class="profile_show">';
            }
            $list_count = 0;
            echo '<div><div class="tansef"><img src="'.$friend_face.'" height=90 width=90 original-title="'.$Wall->UserFullName($fname).'" ></div>';
            echo '<div class="tansa" style="top:'.$top1.'px;"><a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" height=160 width=160 class="tansef" original-title="'.$Wall->UserFullName($fname).'" ></a></div>';
            echo '<div class="arrow" style="top:'.$top2.'px;">'.$fname.'</div></div>';
        }
        echo '</div>';
        }
    ?>
        <div id="content" style="padding-top:50px;">
            <!-- Content message --> 
            <?php
            if($lastid=='')
            {
                $lastid=0;
            }

            // Project's Update
            $updatesarray=$Wall->Project_Announcement($groupID, $uid);
                        

            if($updatesarray)
            {
                foreach($updatesarray as $data)
                {
                    include("cps_project_home_ann.php");
                }
                
            }
            else
            {
                if($home)
                    include 'block_welcome.php';
                else
                    echo '<h3 id="noupdates">No Updates</h3>';
            } ?>
        </div>
    </div>

    <div class="showcase-right">
        Advertisement
    </div>
</div>

<script>
$('.tansef').click(function() {   
    $(".tansa").hide();
    $(".arrow").hide();
    var sh = $(this).siblings('.tansa');
    var sharrow = $(this).siblings('.arrow');
    sh.show().siblings("div").hide;
    sharrow.show().sibling("div").hide;
});
</script>