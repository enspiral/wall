

<?php
    $query = mysqli_query($db, "SELECT proj_id,group_id,recruit_text,recruit_image FROM projects WHERE group_id = '$groupID'");
    foreach ($query as $value) {
            $recruitment_des = $value['recruit_text'];
            $recruit_image = $value['recruit_image'];
            $pro_id = $value['proj_id'];
            $gid    = $value['group_id'];
    }
    ?>
     <p class="text-right"></p>
<div class="container text">
	 	
<div class="block-right">    
     <a href="" data-toggle="modal" data-target="#recruit_image"><i class="glyphicon glyphicon-edit custom-file-input eidt-all-icon" original-title="Edit Recruitment" data-toggle="modal" data-target="#modal_recruitment"></i></a>       
	<div class="modal fade" id="recruit_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Recruitment</h4>
            </div>
            <div class="modal-body">
                <input type="file" id="recruit_image" name="recruit_image" value="<?php echo $recruit_image; ?>"/><br/>
                <textarea id="recruitment_des" name="recruitment_des" style="width:100%; height:150px;"><?php echo $recruitment_des; ?></textarea>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="proj_id" value="<?php echo $pro_id; ?>">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button id="submit_recruiment" name="submit_recruiment" class="btn btn-sm btn-primary update-profile">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
    
<!-- the end of edit recrument -->

    <p class="text-orange text-title">Recruitment</p><hr style="margin-top:-5px; margin-bottom:10px;">
    <div style="width:850px; height:400; background-color:#F5F5F5;">

        <?php  $tl_pic = $base_url.'images/'.$recruit_image;
        if($recruit_image){
            echo '<div class="recrument-image img_container slider-wrapper"><img src="'.$tl_pic.'"></div>';
        }else{
            echo "<center>Data not found!</center>";
        }
            
        ?>
    </div> 
<!--     http://localhost/wall/group.php?gid=35&ptab=contact -->
    <div style="background-color:#F5F5F5; margin-top:16px;"><p><?php echo $recruitment_des; ?></p></div>
    <a href='<?php echo $base_url."group.php?gid=".$gid."&ptab=contact";?>'><button class="btn btn-info create-recruitment">Join Us NOW!</button></a>
</div>
</div>
