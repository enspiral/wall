<style>
    .content-profile{
        background:white;
        padding: 10px;
    }
</style>
<?php
    if(isset($_POST['add_slide'])){
        
        $img_des    = $_POST['add_des'];
        $com_id     = $_POST['com_id'];
        
        $target_dir = "images/com_slideshows/";
        //for id card..........
        $temp = explode(".",$_FILES["image_upload"]["name"]);
        $filename = rand(1,99999) . '.' .end($temp);
        $target_file = $target_dir . basename($filename);
        
        //conditions cannot null.....
        if($_FILES['image_upload']['tmp_name'] == ''){
            $error_file = 'Please chose the image !';
        }else{
            move_uploaded_file($_FILES["image_upload"]["tmp_name"],$target_file);
            
            mysqli_query($db,"INSERT INTO com_slideshow(slide_des,file_name,com_id)
            VALUES('$img_des','$filename','$com_id')");
        }
        
    }
    
    if(isset($_POST['submit_com_pic'])){
        
        $target_dir1 = "uploads/";
        //for id card..........
        $temp1 = explode(".",$_FILES["update_pic_com"]["name"]);
        $filename1 = rand(1,99999) . '.' .end($temp1);
        $target_file1 = $target_dir1 . basename($filename1);
        
        //conditions cannot null.....
        if($_FILES['update_pic_com']['tmp_name'] == ''){
            echo 'false';
        }else{
            move_uploaded_file($_FILES["update_pic_com"]["tmp_name"],$target_file1);
            
            mysqli_query($db,"UPDATE groups INNER JOIN community ON groups.group_id = community.group_id
                SET groups.group_pic='$filename1'
                WHERE community.com_id='$com_id'");
        }
        
    }
    
    
    $data_com = mysqli_query($db,"SELECT community.*,groups.group_name as com_name,groups.group_pic as pic,community.map as map from community INNER JOIN groups ON community.group_id = groups.group_id WHERE groups.group_id='$gid'");
    
    foreach ($data_com as $value) {
        $com_id = $value['com_id'];
        $com_name = $value['com_name'];
        $des =      $value['com_desc'];
        $picture =      $value['pic'];
        $location =      $value['location'];
        $map =      $value['map'];
    }
?>
<div class="content-profile">
    <h4>Update Your community profile data here</h4>
        <table class="table">
            <tr>
                <td>Community Name</td>
                <td><span class=""><?php echo $com_name; ?></span></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#edit_name"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                    <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                    <div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Community Name</h4>
                                </div>
                                <div class="modal-body">
                                    Community Name : <input type="text" class="form-control" name="com_name" id="com_name" value="<?php echo $com_name; ?>"/>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_name" name="save" class="btn btn-sm btn-primary update-com">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Community Location</td>
                <td><span class=""><?php echo $location; ?></span></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#edit_location"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                    <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                    <div class="modal fade" id="edit_location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Community Location</h4>
                                </div>
                                <div class="modal-body">
                                    Community Location : <input type="text" class="form-control" name="com_location" id="com_location" value="<?php echo $location; ?>"/>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_location" name="save" class="btn btn-sm btn-primary update-com">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Community Description</td>
                <td><span class=""><?php echo $des; ?></span></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#edit_des"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                    <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                    <div class="modal fade" id="edit_des" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Community Description</h4>
                                </div>
                                <div class="modal-body">
                                    Community Description : <input type="text" class="form-control" name="com_des" id="com_des" value="<?php echo $des; ?>"/>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_des" name="save" class="btn btn-sm btn-primary update-com">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Community Picture</td>
                <td><span class=""><img width="300px" src="<?php echo $base_url; ?>uploads/<?php echo $picture; ?>"/></span></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#edit_pic"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                    <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                    <div class="modal fade" id="edit_pic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Community Picture</h4>
                                </div>
                                <form class="form-horizontal" action="<?php echo $base_url; ?>community.php?gid=<?php echo $gid; ?>&com=dashboard&side=profile" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="text-center"><img width="300px" src="<?php echo $base_url; ?>uploads/<?php echo $picture; ?>"/></div><br/>
                                        <input name="update_pic_com" id="com_pic" type="file" value="<?php echo $picture; ?>" accept="image/*"/>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                        <button type="submit" id="submit_com_pic" name="submit_com_pic" class="btn btn-sm btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Community Map</td>
                <td><div class=""><?php echo $map; ?></div></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#edit_map"><i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Name" data-toggle="modal"></i></a>
                    <!-- <i class="glyphicon glyphicon-pencil custom-file-input" data-toggle="modal" data-target="#edit_name" original-title="edit name"></i> -->
                    <div class="modal fade" id="edit_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Community Map</h4>
                                </div>
                                <div class="modal-body">
                                    Community Map : <textarea class="" name="com_map" id="com_map" style="width: 100%; height: 200px;"><?php echo $map; ?></textarea>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                        <button id="submit_map" name="submit_map" class="btn btn-sm btn-primary update-com">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    <br/><br/>
    <h4>Manage Slideshow</h4><hr/><br/>
    <div>
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
               <label for="image_upload" class="control-label col-xs-2 text-red">Image :</label>
                <div class="col-xs-4">
                    <input type="file" class="" id="image_upload" name="image_upload" accept="image/*">
                </div>
               <div class="col-xs-6"><label class="text-danger"><?php echo $error_file; ?></label></div>
            </div><br/>
            <div class="form-group">
               <label for="add_des" class="control-label col-xs-2 text-red">Description :</label>
                <div class="col-xs-9">
                    <textarea class="" style="width:100%" placeholder="Image Description" name="add_des" id="add_des"></textarea>
                </div>
            </div>
            <input type="hidden" name="com_id" value="<?php echo $com_id; ?>"/>
            <br/>
            <p class="text-right"><button type="submit" id="add_slide" name="add_slide" class="btn btn-primary">Add Slide</button></p>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hovere">
            <tr>
                <th>No</th>
                <th>Slide Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
                $slide_data = mysqli_query($db, "SELECT * FROM com_slideshow WHERE com_id = '$com_id'");
                $i=1;
                foreach ($slide_data as $value) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['slide_des']; ?></td>
                <td><img width="50px" src="<?php echo $base_url; ?>images/com_slideshows/<?php echo $value['file_name']; ?>"/></td>
                <td>
                    <i id="<?php echo $value['slide_id']; ?>" class="glyphicon glyphicon-trash text-danger delete_slide"></i>
                </td>
            </tr>
            
                <?php $i++; } ?>
        </table>
    </div>
</div>

<script>
    $('.update-com').click(function(){
        var com_name = $('#com_name').val();
        var com_des = $('#com_des').val();
        var com_location = $('#com_location').val();
        var gid = "<?php echo $gid; ?>";
        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>community/ajax_community.php',
            data:{
               com_name    :com_name,
               com_des    :com_des,
               com_location    :com_location,
               gid           : gid,
               post_type  :'edit_community',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });
    
    $('.delete_slide').css('cursor','pointer');
    $('.delete_slide').click(function(){
        var slide_id = $(this).attr("id");
        var con = confirm("Do you want to delete this slide ?");
        if(con){
            $.ajax({
                type:'POST',
                url:'<?php echo $base_url; ?>community/ajax_community.php',
                data:{
                   slide_id    :slide_id,
                   post_type  :'delete_slide',
                },
                success:function(data){
                    location.reload();
                },error:function(data){
                    alert(data);
                }
            });
        }else{
            return false;
        }
    });
</script>

