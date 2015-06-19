<style>
    .team-page{
        padding-bottom: 266px;
    }
    .profile_show img{
        margin-right:5px;

    }
    
</style>
<div class="row text team-page">
    <div class="col-md-7 project_team_profile" style="padding-bottom:120px;">
         <?php
        $friendslist=$Wall->Group_Followers($group_id,'', '', 35);

        if($friendslist)
        {
        $list_count = 1;
        foreach($friendslist as $f)
        {
            $fid=$f['uid'];
            $fname=$f['username'];
            $bio = $f['bio'];
            $role_id = $f['usr_role'];
           // echo $bio."and".$role_id."123";
            $friend_face=$Wall->User_Profilepic($fid,$base_url,$upload_path);
            $top1 = 0;
            $top2 = 235;
         //   echo '<a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" height=80 width=80 class="tansef" original-title="'.$Wall->UserFullName($fname).'" ></a>';
            

            ?>
            <?php

            if($list_count == 1){ ?>
            
            <?php
                echo '<div class="profile_show">';
            }
            $list_count = 0;

            echo '<div><div class="tansef"><img src="'.$friend_face.'" height=70 width=70 original-title="'.$Wall->UserFullName($fname).'" ></div>';
            echo '<div class="tansa" style="top:'.$top1.'px;"><a href="'.$base_url.'index.php?p=each_profile_user&profile_id='.$fid.'" ><img  src="'.$friend_face.'" height=230 width=230 class="tansef" original-title="'.$Wall->UserFullName($fname).'" ></a></div>';
            echo '<div class="arrow col-md-5" style="top:'.$top2.'px; width:180px; margin-left: 25px;">'.'<center>Name: '.$fname.'<br>Role: Learder</center><br>'.$bio.'<br>';
            ?>
              <p style="margin-left: 30px;"><a href='<?php echo $base_url . "index.php?p=each_profile_user&profile_id=".$fid; ?>'>View Profile</a></p>
             <div style="margin-left: 10px;">
                 <a href=""><img src="images/profiles/g-plus-30px.png"/></a>
                <a href=""><img src="images/profiles/mail-30.png"/></a>
                <a href=""><img src="images/profiles/fb-30.png"/></a>
               
             </div>
            </div></div>
           
<?php

        }
        echo '</div>';
        }
        ?>
    
      
   <!--  <div class="col-md-5 text-center team-profile">
        <img src="<?php //echo $base_url; ?>uploads/user_41412736208.jpg" />
        <p>Namvvve here</p>
        <p>Role here</p>
        <p class="text-left">Quote goes here. Text is left aligned.</p>
        <p class="text-left">Limit to 20 words</p>
        <p><a href="">View Profile</a></p>
    </div> -->
</div>
</div>

<script>
    $('.tansef').css('cursor','pointer');
    $('.tansa:first').show();
    $('.arrow:first').show();
    $('.tansef').click(function(){   
        $(".tansa").hide();
        $(".arrow").hide();
        var sh = $(this).siblings('.tansa');
        var sharrow = $(this).siblings('.arrow');
        sh.fadeIn().siblings("div").hide;
        sharrow.fadeIn().sibling("div").hide;
    });
</script>