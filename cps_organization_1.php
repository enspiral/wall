        <div class="showcase-organization">
        <!-- Content Left -->
        <marquee>Welcome to CPS!!!</marquee>
        <div class="showcase-org-left" style="width:190px; float:left;">
             <div class="org-textbox">
            <h3>Introduction</h3>
                <div class="article" style="margin-right:10px;">
                    <div class="text">
                        Introduction <br>
                        Textbox
                    </div>
                </div>
            
            </div>
        </div>
        <div class="showcase-org-content">
            <img src="<?php echo $timelineBG; ?>" style="padding-bottom:20px;"/>
            <h3>Members</h3>
            <div class="article" style="width:540px;">
                <?php
                 if($group_id)
                {
                    $friendslist=$Wall->Group_Followers($group_id,'', '', 35);
                }
                else
                {
                    $friendslist=$Wall->Group_Followers($uid,'', '', 35);
                }

                if($friendslist)
                {
                    foreach($friendslist as $f)
                    {
                        $fid=$f['uid'];
                        $fname=$f['username'];
                        $friend_face=$Wall->User_Profilepic($fid,$base_url,$upload_path);
                        echo '<a href="'.$base_url.$fname.'" ><img src="'.$friend_face.'" class="org-members" original-title="'.$Wall->UserFullName($fname).'" ></a>';
                    }
                }
    ?>
            </div>
        </div>
        <!-- Content Right -->
        <div class="showcase-right">
             <div class="org-latest-news">
            <h3>Latest News</h3>
                <div class="article">
                    <div class="text">
                        News <br>
                        News <br>
                        News
                    </div>
                </div>
            
            </div>
       
            <div class="org-contact-us">
               <h3>Contact Us</h3>
                   <div class="article">
                       <div class="text">
                           Email: abc@info.com <br>
                           Tel: 023 880 880 <br>
                           or &nbsp; 023 777 777 
                       </div>
                   </div>

           </div>
        </div>
        </div>
