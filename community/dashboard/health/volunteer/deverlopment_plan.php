<?php 
    $dev_plan1 = mysqli_query($db,"select * from com_volunteer_dev_plan where title = 'Introduction' and com_id= ".$com_id.";");
    $dev_plan2 = mysqli_query($db,"select * from com_volunteer_dev_plan where title = 'Goal' and com_id= ".$com_id.";");
?>
<div class="text">
    <h3>Introduction</h3><hr/>
    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img width="100px" src="<?php echo $base_url; ?>images/commnunities/introduction.png">
            </a>
        </div>
        <div class="media-body">
        <?php foreach ($dev_plan1 as $dev_plan) { ?>
            <h4 class="media-heading"><?php echo $dev_plan['title']; ?></h4>
            <span class="edit-icon" ><a href="" data-toggle="modal" data-target='#title'><i class="glyphicon glyphicon-edit"></i></a></span>
            <p style="text-align:justify;"><?php echo $dev_plan['description'] ; ?></p>
        </div>
        <p class="text-right text-primary"><i class="glyphicon glyphicon-minus-sign"></i> Minimize</p>
    </div>
</div>
<div class="modal fade" id="title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Introduction</h4>
            </div>
            <div class="modal-body">
                <textarea style="height:150px; width:100%;" name="des" id="des1"><?php echo $dev_plan['description'] ; ?></textarea>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button id="<?php echo $dev_plan['id'] ; ?>" name="save" class="btn btn-sm btn-primary update-des1">Update</button>
                </div>
        </div>
    </div>
</div>
<?php } ?>
<div style="clear:both"></div>
<div class="text text-center">
    <h4>Theory of change dashboard</h4>
    <h4>(Embeded From Google Doc)</h4>
</div>
<div style="clear:both"></div>
<div class="text">
    <div class="media">
        <div class="media-left media-middle">
            <a href="#">
                <img width="100px" src="<?php echo $base_url; ?>images/commnunities/goal_360.png">
            </a>
        </div>
        <div class="media-body">
        <?php foreach ($dev_plan2 as $dev_plan22) { ?>
            <h4 class="media-heading"><?php echo $dev_plan22['title']; ?></h4>
            <span class="edit-icon" ><a href="" data-toggle="modal" data-target='#description'><i class="glyphicon glyphicon-edit"></i></a></span>
            <p style="text-align:justify;"><?php echo $dev_plan22['description']; ?></p>
        </div>
        <p class="text-right text-primary"><i class="glyphicon glyphicon-plus-sign"></i> Read More</p>
    </div>
</div>
<div class="modal fade" id="description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Introduction</h4>
            </div>
            <div class="modal-body">
                <textarea style="height:150px; width:100%;" name="des" id="des2"><?php echo $dev_plan22['description'] ; ?></textarea>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button id="<?php echo $dev_plan22['id'] ;?>" name="save" class="btn btn-sm btn-primary update-des2">Update</button>
                </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="col-lg-10 text-style">
                    
                <div class="row aspiration-text">
                        <div class="col-lg-3">
                             <a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>">
                            <img class="social-image" src="<?php echo 'images/'.$sn_image; ?>">
                        </a>
                            <!-- <img src="images/commnunities/asp-chadrent.jpg" class="social-image"> -->
                        </div>
                        <div class="col-lg-9">
                           
                            <h4 class="media-heading"><a href="<?php echo $base_url;?>group.php?gid=<?php echo $groupID;?>&ptab=contents&p=each_social&sn_id=<?php echo $sn_id;?>"><?php echo $sn_title; ?></a></h4>
                            
                       <p>
                    
                </p>
                        
                        <p>Keywords : <?php echo "#".str_replace(","," #",$sn_keyword); ?></p><br/>

                        
                        <div>
                        <a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program&sn_id=<?php echo $sn_id; ?>">
                            <button id="<?php echo $sn_id; ?>" class="btn btn-social">Get Involved</button>
                        </a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        
                        
                        <a href="" data-toggle="modal" data-target="#edit_sn">
                            <button class="btn btn-social" onclick="editSocialNeed(<?php echo $sn_id ?>, '<?php echo $sn_title ?>', '<?php echo $sn_keyword ?>', '<?php echo htmlspecialchars(addslashes($sn_content)) ?>')">
                                Edit
                            </button>
                        </a>
                       
                        <button id="<?php echo $sn_id; ?>" class="btn btn-social" onclick="FollowProject(<?php echo $groupID ?>)">Like</button>
                        
                    </div>
                    
                           &nbsp;
                </div>
                </div>
               
 </div>
 <script type="text/javascript">
    $('.update-des1').click(function(){
        var id = $(this).attr('id');
        var content = $('#des1').val();

        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>community/ajax_community.php',
            data:{
               content      :content,
               id           : id,
               dev_plan  :'dev_plan',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });
</script>
 <script type="text/javascript">
    $('.update-des2').click(function(){
        var id = $(this).attr('id');
        var content = $('#des2').val();

        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>community/ajax_community.php',
            data:{
               content      :content,
               id           : id,
               dev_plan2  :'dev_plan2',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });
</script>