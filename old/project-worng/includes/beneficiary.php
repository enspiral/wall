<style>
    .beneficiary .glyphicon{
        display: inline;
    }
    
    .beneficiary .edit-progress{
        padding-left: 20px;
    }
</style>

<?php
    $query = mysqli_query($db, "SELECT com_id,group_id FROM projects WHERE group_id = '$groupID'");
    foreach ($query as $value) {
        $com_id = $value['com_id'];
        $gid = $value['group_id'];
    }
    $ben = mysqli_query($db, "SELECT * FROM community WHERE com_id = '$com_id'");
    foreach ($ben as $data) {
             // $grd = $value['group_id'];
        $id             = $data['com_id'];
        $map            = $data['theory_change_url'];
        $title          = $data['com_title'];
        $img            = $data['com_img'];
        $com_languages  = $data['language'];
        $com_location   = $data['location'];
        $description    = $data['com_desc'];
        $pro_sanitation = $data['sanitation'];
        $accomodation   = $data['accomodation'];
        $manpower       = $data['manpower'];
        $recreation     = $data['recreation'];
        $education      = $data['education'];
        $donation       = $data['donation'];
    }
 ?>
<div class=" text beneficiary">
    <p class="text-orange text-title">Beneficiary</p><hr style="margin-top:-5px; margin-bottom:10px;">
    <div class="row">
        <p class="text-benficiary-icon"><a><i class="glyphicon glyphicon-edit custom-file-input edit-beneficiary" original-title="edit beneficiary" data-toggle="modal" data-target="#modal_beneficiary"></i></a></p>
        <div class="block-left">
            <img src="<?php echo $base_url.'uploads/'.$img; ?>" />
        </div>
        <div class="block-right">
            
             <h4 class="text-orange"><?php echo $title; ?></h4>
            <p><?php echo $description; ?></p>
           <!--  <table style="width:100%; hegith:100%">
                <tr>
                    <td>Sanitation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pro_sanitation; ?>%;">
                              <?php //echo $pro_sanitation; ?>%
                            </div>
                        </div>
                        
                    </td>
                    <td class="edit-progress"><a><i id="edit_sanitation" class="edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit Sanitation" data-toggle="modal" data-target="#modal_edit_pro"></i></a></td>
                    <div class="modal fade" id="modal_edit_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Progressing Bar</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="div_edit_sanitation">
                                        <input type="text" class="form-control" name="sanitation" id="sanitation" value="<?php echo $pro_sanitation; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td>Accomodation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $accomodation; ?>%;">
                              <?php //echo $accomodation; ?>%
                            </div>
                        </div>
                    </td>
                    <td class="edit-progress"><a><i id="edit_accomodation"  class="edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit accomodation" data-toggle="modal" data-target="#div_edit_accomodation"></i></a></td>
                    <div class="modal fade" id="div_edit_accomodation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Accomodation</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="">
                                        <input type="text" class="form-control" name="accomodation" id="accomodation" value="<?php echo $accomodation; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td>Manpower</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $manpower; ?>%;">
                              <?php //echo $manpower; ?>%
                            </div>
                        </div>
                    </td>
                    <td class="edit-progress"><a><i id="edit_manpower"  class="edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit manpower" data-toggle="modal" data-target="#div_edit_manpower"></i></a></td>
                    <div class="modal fade" id="div_edit_manpower" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Manpower</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="">
                                        <input type="text" class="form-control" name="manpower" id="manpower" value="<?php echo $manpower; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td>Recreation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $recreation; ?>%;">
                              <?php //echo $recreation; ?>%
                            </div>
                        </div>
                    </td>
                    <td class="edit-progress"><a><i id="edit_recreation" class="edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit recreation" data-toggle="modal" data-target="#div_edit_recreation"></i></a></td>
                    <div class="modal fade" id="div_edit_recreation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Recreation</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="">
                                        <input type="text" class="form-control" name="recreation" id="recreation" value="<?php echo $recreation; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </tr>
                <tr>
                    <td>Education</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $education; ?>%;">
                              <?php //echo $education; ?>%
                            </div>
                        </div>
                    </td>
                    <td class="edit-progress"><a><i id="edit_education"  class=" edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit education" data-toggle="modal" data-target="#div_edit_education"></i></a></td>
                    <div class="modal fade" id="div_edit_education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Education</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="">
                                        <input type="text" class="form-control" name="education" id="education" value="<?php echo $education; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                <tr>
                    <td>Donation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $donation; ?>%;">
                              <?php //echo $donation; ?>%
                            </div>
                        </div>
                    </td>
                    <td class="edit-progress"><a><i id="edit_donation"  class="edit_progress glyphicon glyphicon-edit custom-file-input" original-title="edit donation" data-toggle="modal" data-target="#div_edit_donation"></i></a></td>
                    <div class="modal fade" id="div_edit_donation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Donation</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group div-input" id="">
                                        <input type="text" class="form-control" name="donation" id="donation" value="<?php echo $donation; ?>">
                                        <span class="input-group-addon" id="basic-addon2">%</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    <button id="submit_progress" name="save" class="btn btn-sm btn-primary update-progress">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            </table> -->
            <!-- <button class="btn btn-primary btn-xs btn-visit">visit page</button> -->
        </div>
    </div><br/><br/>
        <div style="float:right; margin-top:-22px;">
            <a> <i class="glyphicon glyphicon-edit custom-file-input" original-title="Edit Map" data-toggle="modal" data-target="#modal_map"></i></a>
        </div>
        <div style="width:600px; height:500px;" >
        <?php 
        if($map){
        echo '<iframe src="'.$map.'" width="850" height="400" frameborder="0" style="border:0"></iframe>';
        }else{
            echo "<div class='alert alert-info' style='width:850px;'>No Record !</div>";
        }
        ?>

    </div>
        
</div>

<!-- edit map -->
<!-- Edit Beneficiary -->
<div class="modal fade" id="modal_map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Map</h4>
            </div>
            <div class="modal-body">       
                  Fram: <textarea name="ben_map" class="text-editor" style="width:540px; height:200px; margin-bottom: 10px;"><?php echo $map; ?></textarea><br/>
            </div>
            <div class="modal-footer">
                 <input type="hidden" name="com_id_map" value="<?php echo $com_id; ?>">
                 <input type="hidden" name="grd_id_map" value="<?php echo $gid; ?>">
                 <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                 <button id="submit" name="save_map" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
   </div>
<!-- End Edit map -->
<!-- the end of edit map -->

<!-- Edit Beneficiary -->
<div class="modal fade" id="modal_beneficiary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Beneficiary</h4>
            </div>
            <div class="modal-body">
                  Title: <input type="text" name="ben_title" style="width:90%; margin-bottom:10px;" value="<?php echo $title; ?>" class="text-input" required="" />
                  Description: <textarea name="ben_desc" class="text-editor" style="width:540px; height:200px; margin-bottom: 10px;"><?php echo $description; ?></textarea><br/>
                  Location: <input type="text" name="ben_location" style="width:88%; margin-bottom:10px;" value="<?php echo $com_location; ?>" class="text-input" required="" />
                  Language(s): <input type="text" name="ben_lang" class="ben_lang" id="ben_lang" style="width:90%; margin-bottom:10px;" data-role="tagsinput" value="<?php echo $com_languages; ?>" class="text-input" required="" /><br/>
                  Image:  <input type="file" name="ben_pic" id="ben_pic" style="display:inline;">
            </div>
            <div class="modal-footer">
                 <input type="hidden" name="com_id" value="<?php echo $com_id; ?>">
                 <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                 <button id="submit" name="save_beneficiary" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
   </div>

<script>
   
    
    ang("input.ben_lang").val();
    ang("input.ben_lang").tagsinput('items');
    
//    $('#submit_beneficiary').click(function(){
//        var beneficiary_title   = $('#beneficiary_title').val();
//        var beneficiary_img     = $('#beneficiary_img').val();
//        var beneficiary_des     = $('#beneficiary_des').val();
//        $.ajax({
//            type:'POST',
//            url:'<?php //echo $base_url; ?>project/ajax-project.php',
//            data:{
//               beneficiary_title    :beneficiary_title,
//               beneficiary_img      :beneficiary_img,
//               beneficiary_des      :beneficiary_des,
//               com_id               : "<?php //echo $com_id; ?>",
//               submit_name            :'edit_beneficiary',
//            },
//            success:function(data){
//                location.reload();
//            },error:function(data){
//                alert(data);
//            }
//        });
//    });
//    
    
   
    
   ang('.update-progress').click(function(){
      var sanitation    = $('#sanitation').val(); 
      var accomodation  = $('#accomodation').val(); 
      var manpower      = $('#manpower').val(); 
      var recreation    = $('#recreation').val(); 
      var education     = $('#education').val(); 
      var donation      = $('#donation').val();
      var map           = $('#map').val();
      ang.ajax({
            type:'POST',
            data:{
               sanitation       :sanitation,
               accomodation     :accomodation,
               manpower         :manpower,
               recreation       :recreation,
               education        :education,
               donation         :donation,
               post_name        :'edit_progress',
               comid            :'<?php echo $com_id; ?>',
            },
            url:'<?php echo $base_url; ?>project/ajax-project.php',
            success:function(data){
                location.reload();
            },error:function(data){
                //alert(data);
            }
        });
      
      
   });
</script>