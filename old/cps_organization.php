<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';
?>
<style>
    div.showcase-left{
        float:left;
        width:190px;
    }
    
    div.showcase-content{
        float:left;
        width:600px;
        margin-bottom:20px;
    }
   
    div.showcase-right{
        float:left;
        width:190px;
    }
    
    .showcase-body{
        width:590px;
        float:left;
        margin-bottom:20px;
    }
    
    div.showcase-content{
        width:580px;
    }
    
    div.showcase-content img{
        width:570px;
        height:200px;
    }
    
    .article{
        border: 2px solid black; 
        padding:10px; 
        margin-top:10px;
    }

    .article .text {
        font-size: 12px;
        line-height: 17px;
        font-family: arial;
    }
    
    div.org-textbox, div.org-latest-news, div.org-contact-us{
        padding-left:5px;
        margin-bottom:20px;
    }
    
    img.org-members{
        width:100px !important;
        height:100px !important;
        padding-right:10px !important;    
    }
    
    
</style>
</head>
<body>
    <?php include_once 'block_logo_menu.php'; ?>
    <div id="main">
        <?php include_once 'block_timeline.php'; ?>
        <div class="showcase">
        <!-- Content Left -->
        <marquee>Welcome to CPS!!!</marquee>
        <div class="showcase-left">
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
        <div class="showcase-content">
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



<?php include_once 'block_footer.php';?>
	</div>
	</body>
	</html>
