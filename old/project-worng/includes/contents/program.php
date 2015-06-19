<script>
$(document).ready(function(){
    $("#remoreText").hide();
    $(".redmore").click(function(){
        $("#remoreText").slideToggle("slow");
        $(".hide-text").hide();
    });
});
</script>
<div class="row contents">
   <div role="tabpanel" class="tab-pane" id="socailneed">
        <div class="text social_need">
            <p class="text-title"><b>Social Needs</b>

                <?php if ($group_owner_id == $uid) {
                        //echo $group_owner_id.'Hello world';
                 ?>

                 <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_social_need"><i class="glyphicon glyphicon-edit"></i></a></span>
                     <p class="text-right"><button style="margin-top: -27px;" id="sn_btn" class="btn btn-primary btn-xs btn-add-new" data-toggle="modal" data-target="#add_new_sn">Add Social Need</button></p>
                <?php } ?>
             <div class="row updateboxarea des">
                <div class="col-lg-2">
                    <p><img src='<?php echo $base_url . "/images/socail/socail-need.png"; ?>' align="left" border="0"><br>
                   </p>
                    <!-- <div class="introduction-image"><img src="images/commnunities/123.png"></div>
                    <p id="intor-text">Intradution</p> -->
                </div>
                <div class="col-lg-10 text-style">
                    <?php 
                       echo $social_need."hello worldd";
                        if (strlen($social_need) > 300) {
                        echo $social_need.'Hello world';
                        $trimstring = substr($social_need, 0, 300). '&nbsp;<div class="redmore"><a href="#remoreText">Read More...</a></div>';
                         echo '<span class="hide-text">'.$trimstring.'</span>';
                        ?>
                        <div id="remoreText"><?php echo $social_need; ?></div>
                        <?php
                        } else {
                        $trimstring = $social_need;
                        }
                      // echo $trimstring;
                        ?>
                        <?php
            //    $data = $Wall->get_socialNeet($group_id, $uid,2);
                $data = $Wall->Get_Project_Prog_Plan($proj_id);
                foreach ($data as $value) {
                    $pp_id = $value['prog_id'];
                    $pp_msg_id = $value['msg_id'];
                    $pp_title = $value['msg_title'];
                    $pp_content = $value['message'];
                    $pp_keyword = $value['prog_keywords'];
                    $pp_image = $value['prog_image'];
                ?>
                <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="#">
                            <img class="social-image" src="<?php echo $base_url.'images/'.$pp_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                            <h4 class="media-heading"><?php echo $pp_title; ?></h4>
                        <p><?php echo $pp_content; ?>
                        </p>
                        <p>Keywords : <?php echo "#".str_replace(","," #",$pp_keyword); ?></p><br/>

                        <?php if ($group_owner_id == $uid) { ?>
                        <div>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Get Involved</button> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="editSocialNeed(id)">Edit</button>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Like</button>
                        <button id="<?php echo $pp_id; ?>" class="btn btn-social" onclick="deleteSocialNeed(id)">Share</button>
                       
                   </div>
                    <?php } ?>
                           &nbsp;
                        </div>
                </div>
            
                <?php
                }
                
                ?>
 </div>
        </div>
                        
            <!-- Social Needs -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Newer</a>
                </li>
                <li class="next">
                    <a href="#">Older &rarr;</a>
                </li>
            </ul>
            <div id="social-need-to-minimize">

            </div>  
        </div>
    </div>
</div>
            <?php
    if($_GET['p']){
        $p = $_GET['p'];
    }else{
        $p= "";
    }
    
?>
           