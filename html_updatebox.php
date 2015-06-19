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
<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script src="js/editor/editor.js"></script>
<!-- <link href="css/editor/editor.css" type="text/css" rel="stylesheet"/> -->
<script type="text/javascript">
    $(document).ready( function() {
//         $(".txtEditor2").Editor(); 
//        $('#btn').click(function(){
//            alert($(".Editor-editor").html());
//        });
         //onclick="alert($('#txtEditor').val();  
        //  $(".txtEditor").Editor(); 
          $(".txtEditor1").Editor(); 
          $(".txtEditor2").Editor(); 
          $(".txtEditor3").Editor(); 
          $(".txtEditor4").Editor();
          $(".txtEditor5").Editor(); 
//          var ele = document.getElementById('editor1').getElementsByClassName('Editor-editor');
//          ele[0].innerHTML = '<?php //echo $dashboard_info["want_volunteer"]; ?>';
//        $('#submit-editor').click(function(){
//            document.getElementById("text-for-para-editor").value += $(".Editor-editor").html();
//        });
        
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
        
        $('#submit-editor-1').click(function(){
            document.getElementById("volunteer_one").value += $("#editor-1 .Editor-editor").html();
        });
        $('#submit-editor-2').click(function(){
            document.getElementById("volunteer_two").value += $("#editor-2 .Editor-editor").html();
        });
        $('#submit-editor-3').click(function(){
            document.getElementById("volunteer_three").value += $("#editor-3 .Editor-editor").html();
        });
        $('#submit-editor-4').click(function(){
            document.getElementById("volunteer_four").value += $("#editor-4 .Editor-editor").html();
        });
        $('#submit-editor-5').click(function(){
            document.getElementById("volunteer_five").value += $("#editor-5 .Editor-editor").html();
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


    <p><?php echo '<h2><center>Did you know that...</center></h2>';
 if ($session_cps_admin) { 
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
<div style="background-color:#ffffff">
<h2 style="padding-top:10px;">Project Console</h2>
<center><p><i>Use this console to manage or monitor your project</i></p></center>
<div class="row">
  <!--div class="new_project"-->
        <div id="LeftCarousel" class="carousel" data-interval="5000" style="background-color:#ffffff">
           <div class="carousel-inner">

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
             
              <a href="<?php echo $notification_url;?>" class="noti_a">
                 
                  <div>
                  
                  <?php 
          if(strlen($n_title)<=0){
            $n_title = "Untitled";
          }
          if ($n_type == 1){
                    echo '<h4>'." Annoucenment: ".$n_title.'<br>'."By ".$n_msg_group_name.'</h4>';
                  }else if($n_type == 2){
                        echo '<h4>'." Needs Indentified: ".$n_title.'<br>'."By ".$n_msg_group_name.'</h4>'; } ?>
                  <div class="noti_sttime"> <?php echo $n_date; ?><span class="timeago" title='<?php echo $n_mtime; ?>'></span></div>
                  </div>
                
              </a>

            <?php echo '</div>'; if($count>=10) break; }}else{
      echo '<center><h3>'."It's looking rather empty here!".'<br>'.'<a href="'.$base_url.'index.php?p=my_createproject"'.'>Create</a> or <a href="'.$base_url.'cps_search.php"'.'>follow</a> some projects today!'.'</h3></center>';
      }?>

        </div>
   <a class="left carousel-control arrow-left-pro "  href="#LeftCarousel" role="button" data-slide="prev"><img class="consol_arrow" src="images/ddd.png"></a>
  <a class="right carousel-control arrow-right-pro "  href="#LeftCarousel"  role="button" data-slide="next"><img class="consol_arrow" src="images/right.png"></a>
    </div>
 
<!--/div--> <!-- end new_project -->
    <!--  <div class="news_communities">
        <div id="RightCarousel" class="carousel slide" data-interval="5000" style="background-color:#ffffff">
           <div class="carousel-inner two-slide">
               
                <?php //if($all_cps_admin_post){
//                    $count=1;
//                    foreach ($all_cps_admin_post as $res) {
//                        $slide_id = $res['id'];
//                        $slide_content = $res['content'];
//                        $slide_ref = $res['reference'];
//                        if($count>0){
//                             echo '<div class="item text-in-slide active">';
//                             $count--;
//                        }else{
//                            echo '<div class="item text-in-slide">';
//                        }
//                        echo '<p><h4 class="header-text">Community News</h4>';
//                        if ($session_cps_admin) { 
//                            echo '<span class="edit-icon"><a href="'.$base_url.'edit_dashboard_admin_post.php"><i class="glyphicon glyphicon-edit"></i></a></span></p>';
//                        }
//                        echo '<p class="slide-text-style"><b>'.$slide_content.'</b><br />';
//                        echo $slide_ref.'</div>';
//                    }
//                } ?>
        </div>
        <a class="left carousel-control arrow-left"  href="#RightCarousel" role="button" data-slide="prev"><img src="images/ddd.png"></a>
  <a class="right carousel-control arrow-right"  href="#RightCarousel" role="button" data-slide="next"><img src="images/right.png"></a>
    </div>
  
</div>--> <!-- ent news_communities -->
</div>

<!-- the end of two slide -->

<!-- start of table project -->
<div class="row">
  <!--div class="your_project" style="background-color:#ffffff;"-->
   <div class="row" style="background-color:#C7D9F1;"> <h4 style="text-align: center;">Your Projects</h4></div>
      <table class="table">
        <tbody>
      <?php 
      if($p1_gid>0){
          echo '<tr class="active">';
          echo '<td>'?>
         <?php if (strlen($p1_group_name) >= 15) {
                   $gro_content1 = strip_tags($p1_group_name);
                  $trimstrings = (substr($gro_content1, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p1_group_name.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p1_group_name.'">'.$p1_group_name.'</span>';
                    }
          ?>

         <?php '</td>';
          echo '<td><a href="'.$p1_url.'">'?>

           <?php if (strlen($p1_content) >= 15) {
                   $pro_content1 = strip_tags($p1_content);
                  $trimstrings = (substr($pro_content1, 0, 15));
                   echo '<span data-tooltip="tooltip"  title="'.$p1_content.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p1_content.'">'.$p1_content.'</span>';
                    }
          ?>
          <?php '</td>';
          echo '<td>'.$p1_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="info">';
          echo '<td>'?>
            <?php if (strlen($p2_group_name) >= 15) {
                   $gro_content2 = strip_tags($p2_group_name);
                  $trimstrings = (substr($gro_content2, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p2_group_name.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p2_group_name.'">'.$p2_group_name.'</span>';
                    }
          ?>
          <!-- .$p2_group_name. -->

          <?php '</td>';

          echo '<td><a href="'.$p2_url.'">'?>
          <?php if (strlen($p2_content) >= 15) {
                             $p_content2 = strip_tags($p2_content);
                            $trimstrings = (substr($p_content2, 0, 15));
                             echo '<span data-tooltip="tooltip" title="'.$p2_content.'">'.$trimstrings."...</span>";
                              } else {
                                 echo '<span data-tooltip="tooltip" title="'.$p2_content.'">'.$p2_content.'</span>';
                              }
                    ?>          <!-- .$p2_content. -->
          <?php '</td>';
          echo '<td>'.$p2_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="active">';
          echo '<td>'?>
            <?php if (strlen($p3_group_name) >= 15) {
                   $gro_content3 = strip_tags($p3_group_name);
                  $trimstrings = (substr($gro_content3, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p3_group_name.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p3_group_name.'">'.$p3_group_name.'</span>';
                    }
          ?>

        <?php '</td>';
          echo '<td><a href="'.$p3_url.'">'?>

          <?php if (strlen($p3_content) >= 15) {
                   $gro_content3 = strip_tags($p3_content);
                  $trimstrings = (substr($gro_content3, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p3_content.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p3_content.'">'.$p3_content.'</span>';
                    }
          ?>

          <?php '</td>';
          echo '<td>'.$p3_count.'</td>';
          echo '</tr>';
      }
      if($p1_gid>0){
          echo '<tr class="info">';
          echo '<td>'?>
           <?php if (strlen($p4_group_name) >= 15) {
                   $gro_content4 = strip_tags($p4_group_name);
                  $trimstrings = (substr($gro_content4, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p4_group_name.'">'.$trimstrings."...</span>";
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p4_group_name.'">'.$p4_group_name.'</span>';
                    }
          ?>
          <!-- .$p4_group_name. -->

          <?php '</td>';
          echo '<td><a href="'.$p4_url.'">'?>
           <?php if (strlen($p4_content) >= 15) {
                   $pro_content4 = strip_tags($p4_content);
                  $trimstrings = (substr($pro_content4, 0, 15));
                   echo '<span data-tooltip="tooltip" title="'.$p4_content.'">'.$trimstrings."...</span>";
                   
                    } else {
                       echo '<span data-tooltip="tooltip" title="'.$p4_content.'">'.$p4_content.'</span>';
                    }
          ?>
          <!-- .$p4_content. -->

          <?php '</td>';
          echo '<td>'.$p4_count.'</td>';
          echo '</tr>';

      }
      ?>
      
     
    </tbody>
</table>

</div>
<!-- The ends of table project -->
</div>
<!-- start of user console -->
<div class="console">
  <h2 id="user-console">User Console</h2>
  <center><p><i>Use this console to get started</i></p></center>
  
 <a href='<?php echo $base_url . 'cps_search.php'; ?>' data-tooltip="tooltip" title="Discower Needs!"> <div class="btn btn_user_console">Discover Needs</div></a>
  <a href="<?php echo $base_url; ?>index.php?p=my_createproject" data-tooltip="tooltip" title="Create Projects!"><div class="btn btn_user_console">Create Projects</div></a>
  <a href="#" data-tooltip="tooltip" title="Manage Project!" data-toggle="modal" data-target="#manage_project"><div class="btn btn_user_console">Manage Project</div></a>
  <a href="<?php echo $base_url;?>/index.php?p=profile" data-tooltip="tooltip" title="Update Profile!"><div class="btn btn_user_console">Update Profile</div></a>
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
              $count_manage_project = 0;
                         foreach ($project_detail as $rs) {
                              $group_name = $rs['group_name'];
                              $group_id = $rs['group_id'];
                              $group_owner = $rs['group_owner_id'];
                              if(($group_id == $p1_gid) || ($group_id == $p2_gid) || ($group_id == $p3_gid) || ($group_id == $p4_gid)){
                                  $check = 'checked = "checked"';
                                    $count_manage_project++;
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
          <br>
<div class="console" style="padding-top:10px;">
<h2 id="volunteerism_console">Volunteerism Console</h2>
<center><p><i>Use this console to learn how to volunteer better</i></p></center>

<div class="accorde-slide">
  <div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
            <div class="panel-heading">
                <h4 class="panel-title">
                   Teach & Learn <div class="icon-ployon"><img src="images/polygon-down.png"></div> 
                   <hr style="margin-top:5px; margin-bottom:5px;">    
                   
                </h4>
            </div>
          </a>
            <div id="collapseOne" class="panel-collapse collapse">
           
                <div class="panel-body">
                      <p class="text_dashoard_info"><?php echo $dashboard_info['teach_n_learn']; 
                       if ($session_cps_admin) { ?>
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
                                if ($session_cps_admin) { ?>
                                    <span class="text-right"><a href="" data-toggle="modal" data-target="<?php echo '#edit_tl_content_'.$tl_id; ?>"><i class="glyphicon glyphicon-edit" style="position:absolute; padding-left:5px;"></i></a></span>
                                <?php  
                                }
                                echo '</div>';
                                echo '<br/><div><center><a href="'.$tl_url.'"><p style="padding-right:11px;">'.$tl_title;
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
                <div class="">
                    <p class="col-md-12">What is your title?</p>
                    <div class="col-md-12">
                        <input type="text" name='<?php echo 'tl_content_title_'.$content_id; ?>' style="width:100%; margin-bottom:10px;" value="<?php echo $content_title; ?>" class="text-input form-control" required="" />
                    </div>
                </div> 
                <div class="row">
                    <p class="col-md-12">What is your content?</p>
                    <div class="col-md-12">
                        <input type="url" name='<?php echo 'tl_content_url_'.$content_id; ?>' style="width:100%; margin-bottom:10px;" value="<?php echo $content_url; ?>" class="text-input form-control" required="" />
                    </div>
                </div> 
                <div class="row">
                    <p class="col-md-12">Please choose your image </p>
                    <div class="col-md-12">
                      <input type="file" name="<?php echo 'tl_image_'.$content_id; ?>" id="<?php echo 'tl_image_'.$content_id; ?>" style="display:inline;">                    </div>
                </div> 
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
                   <hr style="margin-top:5px; margin-bottom:5px;">
                </h4>
            </div>
          </a>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="text_dashoard_info"><?php echo $dashboard_info['sustain_project']; ?>
                       <?php if ($session_cps_admin) { ?>
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
                                 if ($session_cps_admin) { ?>
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
                                echo '<br/><p style="padding:10px 7px 0px 0px; text-align: justify;">'.$step_content.'</p></div>';
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
                
                <div class="button-project"><a href="<?php echo $base_url.'index.php?p=my_createproject'; ?>"><button class="btn btn-info create-project " style="margin-left: 0px;">List Your Project Now</button></a></div><br/>
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
                <div class="row">
                      <p class="col-md-12">What is your title?</p>
                      <div class="col-md-12">
                          <input type="text" name='<?php echo 'step_title_'.$step_id; ?>' style="width:100%; margin-bottom:10px;" value="<?php echo $step_title; ?>" class="text-input form-control" required="" />
                      </div>
                </div> 
              </div>
              <div class="modal-body">
                <div class="row">
                      <p class="col-md-12">What is your content?</p>
                      <div class="col-md-12">
                          <textarea name='<?php echo 'step_content_'.$step_id; ?>' style="width:100%; height:150px;"><?php echo $step_content; ?></textarea>
                      </div>
                </div> 
              </div>
              <div class="modal-body">
                <div class="row">
                      <p class="col-md-12">Please choose your image</p>
                      <div class="col-md-12">
                          <input type="file" name="<?php echo 'step_image_'.$step_id; ?>" id="<?php echo 'step_image_'.$step_id; ?>" style="display:inline;">
                      </div>
                </div> 
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
                    <hr style="margin-top:5px; margin-bottom:5px;">
                </h4>
            </div>
          </a>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                <div class="list-group">
                  <p class="text_dashoard_info"><?php echo $dashboard_info['want_volunteer']; ?>
                  <?php if ($session_cps_admin) { ?>
                  <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_want_volunteer"><i class="glyphicon glyphicon-edit"></i></a></span> <?php  }?>
                  </p>
                    <span href="#" class="list-group-item">
                      <?php if ($session_cps_admin) { ?>
                    <a href="#" class="icon-update" data-toggle="modal" data-target="#edit_text_one"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <?php } ?>
                    <span class="badge">1</span>&nbsp;&nbsp;<span id="text-underline"><?php echo $content_descrition; ?></span>
                    
                    <div class="image_popup">
                  <!-- <a class="group1" href="<?php //echo 'images/'.$image_guide4['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a> -->  
                  </div>
                    </span>
                   
                    <span href="#" class="list-group-item" id="adopt-link">
                      <?php if ($session_cps_admin) { ?>
                        <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_two"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <?php } ?>
                        <span class="badge">2</span> &nbsp;&nbsp;<?php  echo $content_descrition_two;?>
                    
                   <div class="image_popup">
                  <!-- <a class="group1" href="<?php //echo 'images/'.$image_guide5['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a>   -->
                  </div>
                    </span>
                    <!-- three -->
                  <span href="#" class="list-group-item" id="adopt-link">
                    <?php if ($session_cps_admin) { ?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_three"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <?php } ?>
                    <span class="badge">3</span> &nbsp;&nbsp; <?php echo $content_descrition_three; ?>
                    
                    <div class="baguetteBoxFour image_popup ">
                       <!-- <a class="group1 cboxElement" href="<?php //echo 'images/'.$image_guide1['image_path']; ?>">
                          <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                       </a> -->  
                  </div>
                  </span>
                  <!-- end three -->
                  <!-- four -->
                    <span href="#" class="list-group-item" id="adopt-link">
                      <?php if ($session_cps_admin) { ?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_four"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <?php } ?>
                    <span class="badge">4</span> &nbsp;&nbsp; <?php echo $content_descrition_four;?>
                    
                    <div class="image_popup">
                  <!-- <a class="group1" href="<?php //echo 'images/'.$image_guide2['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a>   -->
                  </div>
                  </span>
                  <!-- end four -->
                  <!-- five -->
                  <span href="#" class="list-group-item" id="adopt-link">
                    <?php if ($session_cps_admin) { ?>
                    <a href="" class="icon-update" data-toggle="modal" data-target="#edit_text_five"><i class="glyphicon glyphicon-edit edit-icon-volunteer" original-title="edit name" data-toggle="modal"></i></a>
                    <?php } ?>
                    <span class="badge">5</span> &nbsp;&nbsp; <?php echo $content_descrition_five;?>
                    
                    <div class="image_popup">
                  <!-- <a class="group1" href="<?php //echo 'images/'.$image_guide3['image_path']; ?>" title="Show Image">
                    <i class="glyphicon glyphicon glyphicon-picture" original-title="Imgage" data-toggle="modal"></i> 
                  </a>   -->
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
                    <P>Please describe your information here</P>
                       <textarea id="volunteer_one" maxlength="100" style="width:540px; height:100px;" name="volunteer_one" class="txtEditor1"></textarea>
                       <!-- <input type="file" name="guide_image_4" id="guide_image_4" style="display:inline; margin-bottom:10px;"> -->
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
                      <P>Please describe your information here</P>
                    <textarea id="volunteer_two" maxlength="100" style="width:540px; height:100px;" name="volunteer_two" class="txtEditor2"></textarea>
                       <!-- <input type="file" name="guide_image_5" id="guide_image_5" style="display:inline; margin-bottom:10px;"> -->
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
                       <P>Please describe your information here</P>
                    <textarea id="volunteer_three" name="volunteer_three" maxlength="100" style="width:540px; height:100px;" class="txtEditor3"></textarea>      
                       <!-- <input type="file" name="guide_image_1" id="guide_image_1" style="display:inline; margin-bottom:10px;"> -->
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
                        <P>Please describe your information here</P>
                    <textarea id="volunteer_four" name="volunteer_four" maxlength="100" style="width:540px; height:100px;" class="txtEditor4"></textarea>
                       <!-- <input type="file" name="guide_image_2" id="guide_image_2" style="display:inline; margin-bottom:10px;"> -->
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
                <!-- End Popup Edit text four volunteer -->
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
                       <P>Please describe your information here</P>
                    <textarea id="volunteer_five" name="volunteer_five" maxlength="100" style="width:540px; height:100px;" class="txtEditor5"></textarea>
                       <!-- <input type="file" name="guide_image_5" id="guide_image_5" style="display:inline; margin-bottom:10px;"> -->
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
                <!-- End Popup Edit text five volunteer -->

            </div>
        </div>
        <div class="panel panel-default">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
            <div class="panel-heading">
                <h4 class="panel-title">
                  Help make Volunteerism better <div class="icon-ployon"><img src="images/polygon-down.png"></div>
                  <hr style="margin-top:5px; margin-bottom:5px;">
                </h4>
            </div>
          </a>

            <div id="collapseSix" class="panel-collapse collapse">
                <div class="panel-body">
                    <p class="text_dashoard_info"><?php echo $dashboard_info['volunteer_better']; ?>
                       <?php if ($session_cps_admin) { ?>
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
                                echo '<div><img src="'.$volunteer_better_logo.'" style="width:150px; height:150px; display: block; margin-left: auto; margin-right: auto; margin-top:10px;"/>';
                                 if ($session_cps_admin) { ?>
                                    <div style="border:solide 1px;margin-top: -170px;
  position: absolute;"><span class="text-right"><a href="" data-toggle="modal" data-target="<?php echo '#edit_vol_better_'.$volunteer_better_id; ?>"><i class="glyphicon glyphicon-edit" style="margin-left:5px;"></i></a></span></div>
                                <?php  
                                }
                                echo '<br/>';
                                 switch ($volunteer_better_id) {
                                  
                                    case 1: echo '<div class="help_make_one"> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://demo.volunteerbetter.com/">'; break;
                                    case 2: echo '<div class="help_make_two"><a href="#" data-toggle="modal" data-target="#send_mail_to_cps_admin">'; break;
                                    case 3: echo '<div class="helpe_make_three"><a href="#" data-toggle="modal" data-target="#send_invitations">'; break;
                                    case 4: echo '<div class="helpe_make_four"><a href="#" data-toggle="modal" data-target="#popup_new_community">'; break;
                                
                                }
                                echo '<br/>';
                               
                                
                                echo '<div><p style="text-align:center;"><b>'.$volunteer_better_title.'</b></p></div>';
                                echo '</div></a></div>';
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
                      <div class="row">
                            <p class="col-md-12">What is your title?</p>
                            <div class="col-md-12">
                                <input type="text" name='<?php echo 'vol_better_title_'.$vol_better_id; ?>' style="width:90%; margin-bottom:10px;" value="<?php echo $vol_better_title; ?>" class="text-input" required="" />
                            </div>
                      </div> 
                   </div>
                   <div class="modal-body">
                      <div class="row">
                            <p class="col-md-12">Please choose your logo</p>
                            <div class="col-md-12">
                                <input type="file" name="<?php echo 'vol_better_logo_'.$vol_better_id; ?>" id="<?php echo 'vol_better_logo_'.$vol_better_id; ?>" style="display:inline;">
                            </div>
                      </div> 
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
           <!-- <div><a href="<?php //echo $base_url; ?>index.php?p=my_createproject"><button class="btn btn-info create-project ">Create your Project Now</button></a></div>-->
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

 <!-- Popup Send Invitation Email  -->
                <div class="modal fade" id="send_invitations" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <form method="post" action="">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Please Enter Emails you would like to send Invitations to:</h4>
                      </div>
                      <div class="modal-body">
                      	  <input type="hidden" name="own_email" class="text-input" value="<?php echo $session_email; ?>" />
                          <input type="text" id="invitations" name='invitations' class="form-control form-skills usr_skills" data-role="tagsinput"  required=""/>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button id="submit" name="submit_invitations" class="btn btn-primary">Send</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
<!-- End Popup Send Invitation Email -->   

    <!-- Popup Form to suggest new community  -->
                <div class="modal fade" id="popup_new_community" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                     <form method="post" action="">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Suggest your community to our CPS team:</h4>
                      </div>
                      <div class="modal-body">
                         Where is your community? <br><input type="text" name='community_name' style="margin-bottom:10px !important;" required="" />
                        <br> Tell us about yourself: <br>
                          <textarea name="par_self_intro" style="width:100%; height:150px;" required></textarea>
                        <br> Why do you want to bring us to your community? <br>
                          <textarea name="par_reason" style="width:100%; height:150px;" required></textarea>
                         <br> Your Email: <input type="email" name="suggest_own_email" style="margin-top::10px; margin-bottom:10px;" class="text-input" value="<?php echo $session_email; ?>" readonly />
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button id="submit" name="submit_suggest_community" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
<!-- End Popup Edit Learn and Teach -->   
    </div>
</div>

<div>

</div>
</div>
</div>
<link rel="stylesheet" type="text/css" href="css/tooltip/tooltipster.css" />
<script type="text/javascript" src="js/tooltip/jquery.tooltipster.js"></script>
<script>
        $(document).ready(function() {
             $('[data-tooltip="tooltip"]').tooltipster();    
        });
    </script>
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
//  $('.slider-text').bxSlider({
//   minSlides: 1,
//   maxSlides: 1,
//   slideWidth: 800,
//   slideHeight: 40,
//   slideMargin: 10
// });
</script>
<script type="text/javascript">
//   $('.bxslider-four').bxSlider({
//     minSlides: 3,
//   maxSlides: 5,
//   slideWidth: 160,
//   slideMargin: 10
// });

</script>
<script type="text/javascript">
//   $('.bxslider-five').bxSlider({
//   minSlides: 3,
//   maxSlides: 4,
//   slideWidth: 200,
//   slideHeight: 60,
//   slideMargin: 10
// });

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
      // $('.fancybox-buttons').fancybox({
      //   openEffect  : 'none',
      //   closeEffect : 'none',

      //   prevEffect : 'none',
      //   nextEffect : 'none',

      //   closeBtn  : false,

      //   helpers : {
      //     title : {
      //       type : 'inside'
      //     },
      //     buttons : {}
      //   },

      //   afterLoad : function() {
      //     this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
      //   }
      // });
  </script>
     <script type="text/javascript">
        // qy213('.carousel').carousel();

      </script>
      <script type="text/javascript">
        // qy213('.carousel').carousel();

      </script>
      <script type="text/javascript">
tooltip(document).ready(function(){
    tooltip('[data-tooltip="tooltip"]').tooltip();   
});
</script>

<script>
    // Javascript for limiting the number of checkbox
$(document).ready(function () {   
    
    $("input[type=checkbox]").mouseenter(function (e) {
        if ($(e.currentTarget).closest("div.question").length > 0) {
            disableInputs($(e.currentTarget).closest("div.question")[0]);        
        }
    });
    
    //$("input[type=checkbox]").click(function (e) {
//        if ($(e.currentTarget).closest("div.question").length > 0) {
//            disableInputs($(e.currentTarget).closest("div.question")[0]);        
//        }
//    });
});

function disableInputs(questionElement) {
    console.log(questionElement);
    if ($(questionElement).data('max-answers') == undefined) {
        return true;
    } else {
        maxAnswers = parseInt($(questionElement).data('max-answers'), 10); 
        if ($(questionElement).find(":checked").length >= maxAnswers) {
            $(questionElement).find(":not(:checked)").attr("disabled", true);
        } else {
            $(questionElement).find("input[type=checkbox]").attr("disabled", false);
        }
    }
}
</script>