   <style>

a, a:visited {
    color: #337ab7;
    text-decoration: none;
}

h1, h2, h3, footer, .gallery {
    text-align: center;
}

.gallery:after {
    content: '';
    display: block;
    height: 2px;
    margin: .5em 0 1.4em;
    background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
    background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgba(77,77,77,1) 50%, rgba(0, 0, 0, 0) 100%);
}

.gallery img {
    height: 100%;
}

.gallery a {
    width: 240px;
    height: 180px;
    display: inline-block;
    overflow: hidden;
    margin: 4px 6px;
    box-shadow: 0 0 4px -1px #000;
}
</style>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript">
    qy210(document).ready( function() {
          qy210(".txtEditor1").Editor(); 
          qy210(".txtEditor2").Editor(); 
          qy210(".txtEditor3").Editor(); 
          qy210(".txtEditor4").Editor();
          qy210(".txtEditor5").Editor(); 
        
        var ele1 = document.getElementById('editor-1').getElementsByClassName('Editor-editor');
        var ele2 = document.getElementById('editor-2').getElementsByClassName('Editor-editor');
        var ele3 = document.getElementById('editor-3').getElementsByClassName('Editor-editor');
        var ele4 = document.getElementById('editor-4').getElementsByClassName('Editor-editor');
        var ele5 = document.getElementById('editor-5').getElementsByClassName('Editor-editor');
        ele1[0].innerHTML = '<?php echo  $content_descrition; ?>';
        ele2[0].innerHTML = '<?php echo  $content_descrition_two; ?>';
        ele3[0].innerHTML = '<?php echo  $content_descrition_three; ?>';
        ele4[0].innerHTML = '<?php echo  $content_descrition_four; ?>';
        ele5[0].innerHTML = '<?php echo  $content_descrition_five; ?>';
        
        qy210('#submit-editor-1').click(function(){
            document.getElementById("volunteer_one").value += qy210("#editor-1 .Editor-editor").html();
        });
        qy210('#submit-editor-2').click(function(){
            document.getElementById("volunteer_two").value += qy210("#editor-2 .Editor-editor").html();
        });
        qy210('#submit-editor-3').click(function(){
            document.getElementById("volunteer_three").value += qy210("#editor-3 .Editor-editor").html();
        });
        qy210('#submit-editor-4').click(function(){
            document.getElementById("volunteer_four").value += qy210("#editor-4 .Editor-editor").html();
        });
        qy210('#submit-editor-5').click(function(){
            document.getElementById("volunteer_five").value += qy210("#editor-5 .Editor-editor").html();
        });
        
    });
  </script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<div class="font-content">

<!--<div class="row">
  <div class="col-lg-12 nopadding">
      <textarea class="txtEditor"></textarea> 
      <button id="btn"></button>
    </div>
</div>  -->


    <p><?php echo '<h2><center>Do you know that</center></h2>';
 if ($uid) { 
    echo '<span class="edit-icon"><a href="'.$base_url.'edit_dashboard_post.php"><i class="glyphicon glyphicon-edit"></i></a></span>';
    } ?></p>
<div id="myCarousel" class="carousel slide" data-interval="5000">
  <div class="carousel-inner" id="get-inner">
   
        <?php if($all_dashboard_slideshow_post){
            $count=1;
            foreach ($all_dashboard_slideshow_post as $res) {
                $slide_id = $res['id'];
                $slide_content = $res['content'];
                $slide_ref = $res['reference'];
                if($count>0){
                     echo '<div class="item text-in-slide active">';
                     $count--;
                }else{
                    echo '<div class="item text-in-slide">';
                }
               
                echo '<p class="slide-text-style"><b>'.$slide_content.'</b><br />';
                echo $slide_ref.'</div>';
            }
        } ?>
  </div>
  <a class="left carousel-control"  href="#myCarousel" role="button" data-slide="prev"><img src="images/ddd.png"></a>
  <a class="right carousel-control"  href="#myCarousel" role="button" data-slide="next"><img src="images/right.png"></a>
 </div> 
 
</div>
<div></div>
<p></p>
<!-- the end of text slide -->
<!-- start two slide -->
<div style="background-color:#ffffff"/>
<div class="row">
  <div class="new_project">
        <div id="LeftCarousel" class="carousel slide arrow-left" data-interval="5000" style="background-color:#ffffff">
           <div class="carousel-inner two-slide">

              <?php 
            if($project_news){
                  $count=1;
                  foreach($project_news as $data_noti){
                      $n_msg_id=$data_noti['msg_id'];
                      $n_title = $data_noti['msg_title'];
                      $n_orimessage=$data_noti['message'];
                      $n_time=$data_noti['created'];
                      $n_mtime=date("c", $n_time);
                      $n_split_time = explode("T", $n_mtime);
                      $n_date = $n_split_time[0];
                      $n_msg_group_id=$data_noti['group_id'];
                      $n_msg_group_name=$data_noti['group_name'];
                      $n_type = $data_noti['cate_id'];
                    
                      if($n_msg_id) {
                          $notification_url=$base_url.'status/'.$n_msg_id;
                      }

              if($count==1){
                  echo '<div class="item text-in-slide active">';
              }else{
                  echo '<div class="item text-in-slide">';
              }
              $count++; ?>
               <h4 class="header-text">Project News</h4><br/>
              <a href="<?php echo $notification_url;?>" class="noti_a">
                 
                  <div>
                  
                  <?php if ($n_type == 1){
                      echo " Annoucenment: ".$n_orimessage.'<br>'."By ".$n_msg_group_name;
                  }else if($n_type == 2){
                        echo " Needs Indentified: ".$n_title.'<br>'."By ".$n_msg_group_name;; } ?>
                  <div class="noti_sttime"> <?php echo $n_date; ?><span class="timeago" title='<?php echo $n_mtime; ?>'></span></div>
                  </div>
                
              </a>

            <?php echo '</div>'; if($count>=10) break; }} ?>

        </div>
   <a class="left carousel-control arrow-left"  href="#LeftCarousel" role="button" data-slide="prev"><img src="images/ddd.png"></a>
  <a class="right carousel-control arrow-right"  href="#LeftCarousel"  role="button" data-slide="next"><img src="images/right.png"></a>
    </div>
 
</div> <!-- end new_project -->
      <div class="news_communities">
        <div id="RightCarousel" class="carousel slide" data-interval="5000" style="background-color:#ffffff">
           <div class="carousel-inner two-slide">
               
                <?php if($all_cps_admin_post){
                    $count=1;
                    foreach ($all_cps_admin_post as $res) {
                        $slide_id = $res['id'];
                        $slide_content = $res['content'];
                        $slide_ref = $res['reference'];
                        if($count>0){
                             echo '<div class="item text-in-slide active">';
                             $count--;
                        }else{
                            echo '<div class="item text-in-slide">';
                        }
                        echo '<p><h4 class="header-text">Community News</h4>';
                        if ($uid) { 
                            echo '<span class="edit-icon"><a href="'.$base_url.'edit_dashboard_admin_post.php"><i class="glyphicon glyphicon-edit"></i></a></span></p>';
                        }
                        echo '<p class="slide-text-style"><b>'.$slide_content.'</b><br />';
                        echo $slide_ref.'</div>';
                    }
                } ?>
        </div>
        <a class="left carousel-control arrow-left"  href="#RightCarousel" role="button" data-slide="prev"><img src="images/ddd.png"></a>
  <a class="right carousel-control arrow-right"  href="#RightCarousel" role="button" data-slide="next"><img src="images/right.png"></a>
    </div>
  
</div> <!-- ent news_communities -->
</div>
<p></p>
<!-- the end of two slide -->

<!-- start of table project -->
<div class="row">

  <div class="your_project" style="background-color:#ffffff;">
   <div class="row" style="background-color:#C7D9F1;"> <h4 style="text-align: center;">Your Projects</h4></div>
      <table class="table">
        <tbody>
      <?php 
      if($p1_gid>0){
          echo '<tr class="active">';
          echo '<td>'.$p1_group_name.'</td>';
          echo '<td><a href="'.$p1_url.'">'.$p1_content.'</td>';
          echo '<td>'.$p1_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="info">';
          echo '<td>'.$p2_group_name.'</td>';
          echo '<td><a href="'.$p2_url.'">'.$p2_content.'</td>';
          echo '<td>'.$p2_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="active">';
          echo '<td>'.$p3_group_name.'</td>';
          echo '<td><a href="'.$p3_url.'">'.$p3_content.'</td>';
          echo '<td>'.$p3_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="info">';
          echo '<td>'.$p4_group_name.'</td>';
          echo '<td><a href="'.$p4_url.'">'.$p4_content.'</td>';
          echo '<td>'.$p4_count.'</td>';
          echo '</tr>';
      }
      ?>
       
     
    </tbody>
</table>
  </div>
  <div class="follows_com" style="background-color:#ffffff">
    <div class="row" style="background-color:#C7D9F1;"><h4 style="text-align: center;">Community Following</h4></div>
      <table class="table">
        <tbody>
            <tr class="active">
            <td>Internet</td>
            <td>05/07/2014</td>
            <td>Change plan</td>
        </tr>
        <tr class="info">
            <td>Electricity</td>
            <td>03/07/2014</td>
            <td>Pending</td>
        </tr>
        <tr class="active">
            <td>Telephone</td>
            <td>06/07/2014</td>
            <td>Due</td>
        </tr>
    </tbody>
  </table>
  </div>
</div>
<!-- The ends of table project -->
</div>
<!-- start of user console -->
<div class="console">
  <h2 id="user-console">User Console</h2>
  
  <button class="btn btn_user_console"><a href='<?php echo $base_url . 'cps_search.php'; ?>' class="custom-file-input" original-title="Discower Needs!">Discover Needs</a></button>
  <button class="btn btn_user_console"><a href="<?php echo $base_url; ?>index.php?p=my_createproject" class="custom-file-input" original-title="Create Projects!">Create Projects</a></button>
  <button class="btn btn_user_console"><a href="#" class="custom-file-input" original-title="Manage Project!" data-toggle="modal" data-target="#manage_project">Manage Project</a></button>
  <button class="btn btn_user_console"><a href="<?php echo $base_url;?>/index.php?p=profile" class="custom-file-input" original-title="Update Profile!">Update Profile</a></button>
</div>

<!-- the end of user console -->


    <!-- Popup Manage Project  -->
        <div class="modal fade" id="manage_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Manage Your Project</h4>
              </div>
              <div class="modal-body">
                 <div class="question" data-max-answers="4">
                    Please select up to four projects to display! <br>
                    <?php if($project_detail){
                         foreach ($project_detail as $rs) {
                              $group_name = $rs['group_name'];
                              $group_id = $rs['group_id'];
                              $group_owner = $rs['group_owner_id'];
                              if(($group_id == $p1_gid) || ($group_id == $p2_gid) || ($group_id == $p3_gid) || ($group_id == $p4_gid)){
                                  $check = 'checked = "checked"';
                              }else{
                                  $check = "";
                              }
                              echo '<input type="checkbox" name="answer1[]" ' . $check . ' value="'.$group_id.'">'.$group_name.'<br>';
                         }
                    }
                    ?>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_manage_project" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    <!-- End Popup Edit Learn and Teach -->
          
<div><h2 id="volunteerism_console">Volunteerism Console</h2></div>


<div class="accorde-slide">
  <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            <div class="panel-heading">
                <h4 class="panel-title">
                   Teach & Learn <div class="icon-ployon"><img src="images/polygon-down.png"></div>     
                   
                </h4>
            </div>
          </a>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                      <p class="text_dashoard_info"><?php echo $dashboard_info['teach_n_learn']; 
                       if ($uid) { ?>
                        <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_teach_n_learn"><i class="glyphicon glyphicon-edit"></i></a></span>
                        <?php  }?></p><br/>
                    <div class="row collapes-image">
                        <?php 
                       
                        if($all_teach_n_learn){
                            foreach ($all_teach_n_learn as $tl) {
                                
                                $tl_id = $tl['id'];
                                $tl_title = $tl['title'];
                                $tl_url = $tl['url'];
                            //    $tl_pic = $tl['image_path'];

                                if($tl['image_path']){
                                    $tl_pic = $base_url.'images/'.$tl['image_path'];
                                }else{
                                    $tl_pic = $base_url.'wall_icons/default.png';
                                }
                                echo '<div class="col-lg-4">';
                                echo '<div><a href="'.$tl_url.'"><img src="'.$tl_pic.'" width="200" height="256"/></a>';
                                if ($uid) { ?>
                                    <span class="text-right"><a href="" data-toggle="modal" data-target="<?php echo '#edit_tl_content_'.$tl_id; ?>"><i class="glyphicon glyphicon-edit" style="position:absolute; padding-left:5px;"></i></a></span>
                                <?php  
                                }
                                echo '</div>';
                                echo '<br/><div><center><a href="'.$tl_url.'"><p style="padding-right:60px;">'.$tl_title;
                                echo '</p></a></center></div><br/>';
                                echo '</div>';
                            }
                        }
                        ?>
<!--                      <div class="col-lg-4">
                        <a href="https://drive.google.com/open?id=0B-7PxShrdft1VTNJLXAzSU9oNm8&authuser=0">
                        <div><img src="images/image_left1.jpg" width="200" height="256"/></div><br/>
                        <div>Quick Guide to Facilitating <br/> Teachable Moments</div><br/>
                      </a>
                      </div>
                      <div class="col-lg-4">
                        <a href="https://drive.google.com/open?id=0B-7PxShrdft1Znp5XzMtcF9mbDg&authuser=0">
                        <div><img src="images/middle.jpg" width="200" height="256"/></div><br/>
                        <div>How to serve better to learn <br/>better (Student’s Guide)</div></br>
                      </a>
                      </div>
                      <div class="col-lg-4">
                        <a href="https://drive.google.com/open?id=0B-7PxShrdft1VXJ0cWZPSlFDdTQ&authuser=0">
                        <div><img src="images/image-right2.jpg" width="200" height="256"/></div><br/>
                        <div>How to serve better to learn <br/>better (Teachers’ Guide)</div></br>
                      </a>
                      </div>-->
                    </div></div>
                
                 <!-- Popup Edit Learn and Teach  -->
        <div class="modal fade" id="edit_teach_n_learn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Learn and Teach</h4>
              </div>
              <div class="modal-body">
                  <textarea name="par_teach_learn" style="width:100%; height:150px;"><?php echo $dashboard_info['teach_n_learn']; ?></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_learn_n_teach" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Popup Edit Learn and Teach -->   
           
           <!-- Popup Edit Learn and Teach Content  -->
           <?php 
           for($i=0; $i<$size_teach_n_learn; $i++){ 
               $content_teach_learn = $Wall->Get_Teach_n_Learn_Content($i+1);
               $content_id = $content_teach_learn['id'];
               $content_title = $content_teach_learn['title'];
               $content_url = $content_teach_learn['url'];
               $content_pic = $content_teach_learn['image_path'];
           ?>
        <div class="modal fade" id="<?php echo 'edit_tl_content_'.$content_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Learn and Teach Content <?php echo $content_id;?></h4>
              </div>
              <div class="modal-body">
                  Title: <input type="text" name='<?php echo 'tl_content_title_'.$content_id; ?>' style="width:90%; margin-bottom:10px;" value="<?php echo $content_title; ?>" class="text-input" required="" />
                  URL: <input type="url" name='<?php echo 'tl_content_url_'.$content_id; ?>' style="width:90%; margin-bottom:10px;" value="<?php echo $content_url; ?>" class="text-input" required="" />
                  Image:  <input type="file" name="<?php echo 'tl_image_'.$content_id; ?>" id="<?php echo 'tl_image_'.$content_id; ?>" style="display:inline;">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="<?php echo 'submit_tl_content_'.$content_id; ?>" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
           <?php } ?>
          <!-- End Popup Edit Learn and Teach Content -->   
            </div>
            
        </div>
         
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
            <div class="panel-heading">
                <h4 class="panel-title">
                   Sustain Your Project(s) <div class="icon-ployon"><img src="images/polygon-down.png"></div>
                </h4>
            </div>
          </a>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="text_dashoard_info"><?php echo $dashboard_info['sustain_project']; ?>
                       <?php if ($uid) { ?>
                            <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_sustain_project"><i class="glyphicon glyphicon-edit"></i></a></span>
                            <?php  }?></p><br/>
                
                    <div class="row collapes-image">
                         <?php 
                       
                        if($all_steps){
                            foreach ($all_steps as $rs) {
                                
                                $step_id = $rs['id'];
                                $step_title = $rs['title'];
                                $step_content = $rs['content'];
                          
                                if($rs['image_path']){
                                    $step_pic = $base_url.'images/'.$rs['image_path'];
                                }else{
                                    $step_pic = $base_url.'wall_icons/default.png';
                                }
                                echo '<div class="col-lg-4">';
                                echo '<h2 class="text-two">Step '.$step_id.'</h2>';
                                echo '<div><img src="'.$step_pic.'" style="width:200px; height:253px;"/>';
                                 if ($uid) { ?>
                                    <span class="text-right"><a href="" data-toggle="modal" data-target="<?php echo '#edit_steps_content_'.$step_id; ?>"><i class="glyphicon glyphicon-edit" style="position:absolute; margin-top:63px; margin-left:5px;"></i></a></span>
                                <?php  
                                }
                                echo '</div><br/>';
                                switch ($step_id) {
                                    case 1: echo '<div class="text-above-image-one">'; break;
                                    case 2: echo '<div class="text-above-image-two">'; break;
                                    case 3: echo '<div class="text-above-image-three">'; break;
                                }
                                echo '<b>'.$step_title.'</b>';
                                echo '<br/>'.$step_content.'</div>';
                                echo '</div>';
                            }
                        }
                        ?>
<!--                      <div class="col-lg-4">
                        <h2 class="text-two">Step 1</h2>
                        <div><img src="images/list-project.png"/></div><br/>
                        <div class="text-above-image-one"><b>List Your Project</b><br/>Share with us your project details and information about your host village </div>
                      </div>
                      
                      <div class="col-lg-4">
                        <h2 class="text-two">Step 2</h2>
                        <div><img src="images/notified-get.png"/></div><br/>
                        <div class="text-above-image-two"><b>Pass it On</b><br/>Let future volunteers build on your legacy and information to continuously deliver help</div>
                      </div>

                      <div class="col-lg-4">
                        <h2 class="text-two">Step 3</h2>
                        <div><img src="images/passition.png"/></div><br/>
                        <div class="text-above-image-three"><b>Get Notified</b><br/>Get updates about how your host villages has grown and how your project’s legacy has played a part in it</div>
                      </div>-->
                    </div>
                
                <div><a href="<?php echo $base_url.'index.php?p=my_createproject'; ?>"><button class="btn btn-info create-project " style="margin-left: 318px;">List Your Project Now</button></a></div><br/>
                </div>
                
                  <!-- Popup Edit Sustain Project  -->
        <div class="modal fade" id="edit_sustain_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Your Project's Steps</h4>
              </div>
              <div class="modal-body">
                  <textarea name="par_sustain_project" style="width:100%; height:150px;"><?php echo $dashboard_info['sustain_project']; ?></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_sustain_project" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Popup Edit Sustain Project-->   
          
            <!-- Popup Edit Steps for sustainable project -->
       
           <?php 
           for($i=0; $i<$size_teach_n_learn; $i++){ 
               $content_steps = $Wall->Get_Steps_Sustain_Project_Content($i+1);
               $step_id = $content_steps['id'];
               $step_title = $content_steps['title'];
               $step_content = $content_steps['content'];
               $step_pic = $content_steps['image_path'];
           ?>
        <div class="modal fade" id="<?php echo 'edit_steps_content_'.$step_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Step <?php echo $step_id;?></h4>
              </div>
              <div class="modal-body">
                  Title: <input type="text" name='<?php echo 'step_title_'.$step_id; ?>' style="width:90%; margin-bottom:10px;" value="<?php echo $step_title; ?>" class="text-input" required="" />
                  Content: <textarea name='<?php echo 'step_content_'.$step_id; ?>' style="width:100%; height:150px;"><?php echo $step_content; ?></textarea>
                  Image:  <input type="file" name="<?php echo 'step_image_'.$step_id; ?>" id="<?php echo 'step_image_'.$step_id; ?>" style="display:inline;">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="<?php echo 'submit_content_step_'.$step_id; ?>" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
           <?php } ?>
         
           <!-- End Popup Edit Learn and Teach Content -->   
            </div>
           
        </div>

        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Want to Volunteer? <div class="icon-ployon"><img src="images/polygon-down.png"></div>
                </h4>
            </div>
          </a>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="list-group">
                  <p class="text_dashoard_info"><?php echo $dashboard_info['want_volunteer']; ?>
                  <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_want_volunteer"><i class="glyphicon glyphicon-edit"></i></a></span>
                  </p>
                    <?php if ($uid) { ?>
                        <!-- <span class="text-right"><a href="" data-toggle="modal" data-target="#Edit_Image_Source"><i class="glyphicon glyphicon-edit"></i></a></span> -->
                        <?php  }?>
                    <span href="#" class="list-group-item">
                    <span class="badge">1</span>&nbsp;&nbsp;<span id="text-underline"><?php echo $content_descrition; ?></span>
                    <a href="#" class="icon-update" data-toggle="modal" data-target="#edit_text_one"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    </span>
                   
                    <span href="#" class="list-group-item" id="adopt-link">
                        <span class="badge">2</span> &nbsp;&nbsp;<?php  echo $content_descrition_two;?>
                        <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_two"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    </span>
                    <!-- three -->
                  <span href="#" class="list-group-item" id="adopt-link">
                    <span class="badge">3</span> &nbsp;&nbsp; <?php echo $content_descrition_three; ?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_three"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                  <div class="baguetteBoxFour image_popup ">
                       <a class="group1 cboxElement" href="<?php echo 'images/'.$image_guide1['image_path']; ?>">
                          <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                       </a>  
                  </div>
                  </span>
                  <!-- end three -->
                  <!-- four -->
                    <span href="#" class="list-group-item" id="adopt-link">
                    <span class="badge">4</span> &nbsp;&nbsp; <?php echo $content_descrition_four;?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_four"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <div class="image_popup">
                  <a class="group1" href="<?php echo 'images/'.$image_guide2['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a>  
                  </div>
                  </span>
                  <!-- end four -->
                  <!-- five -->
                  <span href="#" class="list-group-item" id="adopt-link">
                    <span class="badge">5</span> &nbsp;&nbsp; <?php echo $content_descrition_five;?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_five"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <div class="image_popup">
                  <a class="group1" href="<?php echo 'images/'.$image_guide3['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a>  
                  </div>
                  </span>
                  <!-- end five -->
                    <!-- <p class="list-group-item">
                    <span class="badge">5</span> &nbsp;&nbsp;Review your trip and <a class="group1 cboxElement" href="<?php //echo 'images/'.$image_guide3['image_path']; ?>" title="#">report potential abuses/risk </a>  on CPS warn future volunteers 
                    </p> -->
                </div>
                <div><a href="<?php echo $base_url; ?>index.php?p=my_createproject"><button class="btn btn-info create-project ">Create your Project Now</button></a></div>
                </div>
                
                <!-- Popup Edit Image Source -->
                <div class="modal fade" id="Edit_Image_Source" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Images</h4>
                    </div>
                    <div class="modal-body">
                        Image 1:  <input type="file" name="guide_image_1" id="guide_image_1" style="display:inline; margin-bottom:10px;"><br/>
                        Image 2:  <input type="file" name="guide_image_2" id="guide_image_2" style="display:inline; margin-bottom:10px;"><br/>
                        Image 3:  <input type="file" name="guide_image_3" id="guide_image_3" style="display:inline;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit" name="submit_guide_image" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit Image Source -->
                
                 <!-- Popup Edit want to volunteer  -->
        <div class="modal fade" id="edit_want_volunteer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Your Project's Steps</h4>
              </div>
              <div class="modal-body">
                  <textarea name="par_want_volunteer" style="width:540px; height:100px;"><?php echo $dashboard_info["want_volunteer"]; ?></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_want_volunteer" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
                <!-- Popup Edit text on volunteer text one  -->
            <div class="modal fade" id="edit_text_one" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Text</h4>
                    </div>
                    <div class="modal-body" id="editor-1">
                       <textarea id="volunteer_one" maxlength="100" style="width:540px; height:100px;" name="volunteer_one" class="txtEditor1"></textarea>
                    </div>
                    <p class="notes">* You can type only 100 characters</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit-editor-1" name="submit_text_one_volunteer" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit text two volunteer -->
                 <div class="modal fade" id="edit_text_two" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Text</h4>
                    </div>
                    <div class="modal-body" id="editor-2">
                       <textarea id="volunteer_two" maxlength="100" style="width:540px; height:100px;" name="volunteer_two" class="txtEditor2"></textarea>
                    </div>
                    <p class="notes">* You can type only 100 characters</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit-editor-2" name="submit_text_two_volunteer" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit text two volunteer -->
                <!-- End Popup Edit text three volunteer -->
                 <div class="modal fade" id="edit_text_three" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Text</h4>
                    </div>
                    <div class="modal-body" id="editor-3">
                       <textarea id="volunteer_three" name="volunteer_three" maxlength="100" style="width:540px; height:100px;" class="txtEditor3"></textarea>
                    </div>
                    <p class="notes">* You can type only 100 characters</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit-editor-3" name="submit_text_three_volunteer" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit text three volunteer -->
                <!-- End Popup Edit text four volunteer -->
                 <div class="modal fade" id="edit_text_four" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Text</h4>
                    </div>
                    <div class="modal-body" id="editor-4">
                       <textarea id="volunteer_four" name="volunteer_four" maxlength="100" style="width:540px; height:100px;" class="txtEditor4"></textarea>
                    </div>
                    <p class="notes">* You can type only 100 characters</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit-editor-4" name="submit_text_four_volunteer" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit text one volunteer -->
                <!-- End Popup Edit text five volunteer -->
                 <div class="modal fade" id="edit_text_five" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                   <form method="post" enctype='multipart/form-data' action="">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="exampleModalLabel">Edit Your Text</h4>
                    </div>
                    <div class="modal-body" id="editor-5">
                       <textarea id="volunteer_five" name="volunteer_five" maxlength="100" style="width:540px; height:100px;" class="txtEditor5"></textarea>
                    </div>
                    <p class="notes">* You can type only 100 characters</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button id="submit-editor-5" name="submit_text_five_volunteer" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <!-- End Popup Edit text one volunteer -->

            </div>
        </div>
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
            <div class="panel-heading">
                <h4 class="panel-title">
                  Help make Volunteerism better <div class="icon-ployon"><img src="images/polygon-down.png"></div>
                </h4>
            </div>
          </a>

            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="text_dashoard_info"><?php echo $dashboard_info['volunteer_better']; ?>
                       <?php if ($uid) { ?>
                            <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_volunteer_better"><i class="glyphicon glyphicon-edit"></i></a></span>
                            <?php  }?></p><br/>
                  <!--<p style="margin: 10px 10px 10px 20px;">Join us in making volunteerism more impactful for both you and your beneficiaries! Spread the word, join our team, launch a local chapter or just like our Facebook page today!</p><br/>-->
<!--      <p style="text-align: center;">
        <a href="http://www.facebook.com/careps" target="_blank"><img class="alignnone wp-image-214" src="http://www.volunteerbetter.com//wp-content/uploads/2015/02/facebook1.png" alt="facebook1" width="39" height="39"></a>&nbsp;&nbsp;
          <a href="mailto:admin@carepositioningsystem.org"><img class="alignnone wp-image-216" src="http://www.volunteerbetter.com//wp-content/uploads/2015/02/mail.png" alt="mail" width="39" height="39"></a>
      </p>  -->
                
                      <div class="row collapes-image">
                         <?php 
                       
                        if($all_volunteer_better){
                            foreach ($all_volunteer_better as $rs) {
                                
                                $volunteer_better_id = $rs['id'];
                                //$volunteer_better_logo = $rs['logo_path'];
                                $volunteer_better_title = $rs['title'];
                                

                                if($rs['logo_path']){
                                    $volunteer_better_logo = $base_url.'images/'.$rs['logo_path'];
                                }else{
                                    $volunteer_better_logo = $base_url.'wall_icons/default.png';
                                }
                                echo '<div class="help_make_colum">';
                                echo '<div><img src="'.$volunteer_better_logo.'" style="width:150px; height:150px;"/>';
                                 if ($uid) { ?>
                                    <div style="border:solide 1px;margin-top: -170px;
  position: absolute;"><span class="text-right"><a href="" data-toggle="modal" data-target="<?php echo '#edit_vol_better_'.$volunteer_better_id; ?>"><i class="glyphicon glyphicon-edit" style="margin-left:5px;"></i></a></span></div>
                                <?php  
                                }
                                echo '<br/>';
                                 switch ($volunteer_better_id) {
                                    case 1: echo '<div class="help_make_one">'; break;
                                    case 2: echo '<div class="help_make_two">'; break;
                                    case 3: echo '<div class="helpe_make_three">'; break;
                                    case 4: echo '<div class="helpe_make_four">'; break;
                                }
                                echo '<br/>';
                               
                                
                                echo '<div><p style="margin-right:20px; text-align:center;"><b>'.$volunteer_better_title.'</b></p></div>';
                                echo '</div></div>';
                                echo '</div>';


                            }
                        }
                        ?>
                    </div>
                    
            <!-- Popup Edit Make Volunteerism Better -->
       
                <?php 
                for($i=0; $i<$size_volunteer_better; $i++){ 
                    $content_vol_better = $Wall->Get_Each_Volunteer_Better($i+1);
                    $vol_better_id = $content_vol_better['id'];
                    $vol_better_title = $content_vol_better['title'];
                    $vol_better_logo = $content_vol_better['logo_path'];
                ?>
             <div class="modal fade" id="<?php echo 'edit_vol_better_'.$vol_better_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                  <form method="post" enctype='multipart/form-data' action="">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="exampleModalLabel">How to make volunteerism better </h4>
                   </div>
                   <div class="modal-body">
                       Title: <input type="text" name='<?php echo 'vol_better_title_'.$vol_better_id; ?>' style="width:90%; margin-bottom:10px;" value="<?php echo $vol_better_title; ?>" class="text-input" required="" />
                       Logo:  <input type="file" name="<?php echo 'vol_better_logo_'.$vol_better_id; ?>" id="<?php echo 'vol_better_logo_'.$vol_better_id; ?>" style="display:inline;">
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <button id="submit" name="<?php echo 'submit_vol_better_'.$vol_better_id; ?>" class="btn btn-primary">Save</button>
                   </div>
                   </form>
                 </div>
               </div>
             </div>
                <?php } ?>
            <br/>
            <div><a href="<?php echo $base_url; ?>index.php?p=my_createproject"><button class="btn btn-info create-project ">Create your Project Now</button></a></div>
           <!-- End Popup Edit Learn and Teach Content -->   
                    
                  </div>
                    
                <!-- Popup Edit Make Volunteerism Better  -->
                <div class="modal fade" id="edit_volunteer_better" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <form method="post" action="">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Edit Make Volunteerism Better</h4>
                      </div>
                      <div class="modal-body">
                          <textarea name="par_volunteer_better" style="width:100%; height:150px;"><?php echo $dashboard_info['volunteer_better']; ?></textarea>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button id="submit" name="submit_volunteer_better" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
          
            </div>
            
        </div>
<!-- End Popup Edit Learn and Teach -->   
    </div>
</div>

<div>

</div>

</div>
</br>

<!--<div class="font-content">
<div class="col-lg-12 nopadding">
      <textarea name="par_want_volunteer" class="txtEditor2" style="width:540px; height:100px;"></textarea>
      <button id="btn">Click</button>
    </div>

 
</div>-->
<script>
window.onload = function() {
    if(typeof oldIE === 'undefined' && Object.keys)
      
    baguetteBox.run('.image_popup', {
        buttons: false
    });
    
};
    </script>

<script type="text/javascript">
           
            $("#adopt-link").css("cursor","pointer");
            $("#adopt-link").click(function() {
             $('html,body').animate({
             scrollTop: $("#project-libary").offset().top},
             'slow');
           });
            
</script>
     
<script type="text/javascript">
// Javascript for limiting the number of checkbox
qy210(document).ready(function () {
   qy210("input[type=checkbox]").click(function (e) {
       if (qy210(e.currentTarget).closest("div.question").length > 0) {
           disableInputs($(e.currentTarget).closest("div.question")[0]);        
       }
   });
});

function disableInputs(questionElement) {
   console.log(questionElement);
   if (qy210(questionElement).data('max-answers') == undefined) {
       return true;
   } else {
       maxAnswers = parseInt($(questionElement).data('max-answers'), 10); 
       if (qy210(questionElement).find(":checked").length >= maxAnswers) {
           qy210(questionElement).find(":not(:checked)").attr("disabled", true);
       } else {
           qy210(questionElement).find("input[type=checkbox]").attr("disabled", false);
       }
   }
}
</script>