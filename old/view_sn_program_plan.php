<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST['submit_new_program']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $pp_gid = $_POST['group_id'];
    $pp_pid = $_POST['proj_id'];
    $pp_sn_id = $_POST['sn_id'];
    $new_pp_title = $_POST['new_pp_title'];
    $new_pp_content = $_POST['new_pp_content'];
    $new_pp_keyword = $_POST['new_pp_keyword'];
    $file_data = "new_pp_pic";
    $save_image = true;
    if($_FILES["$file_data"]['size'] > 0){ 
        if($_FILES["$file_data"]['size'] > 2000000){
                $save_image = false;
                echo "<script type='text/javascript'>alert('Image size should be smaller than 2MB!');</script>";
            }
            else{
                $allowedExts = array('png', 'jpg', 'jpeg', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF');
                $extension = pathinfo($_FILES["$file_data"]['name'], PATHINFO_EXTENSION);
                if (!in_array($extension, $allowedExts))
                {
                    $save_image = false;
                    echo "<script type='text/javascript'>alert('This is invalid image file!');</script>";
                }
            }
        }else{
            $save_image = false;
        }
    if($save_image){
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["$file_data"]["name"]);
        move_uploaded_file($_FILES["$file_data"]["tmp_name"], $target_file);
        $add_social_need = $Wall->Insert_Program_Plan($uid, $new_pp_title, $new_pp_content, $new_pp_keyword, $_FILES["$file_data"]['name'], $pp_gid, $pp_pid, $pp_sn_id);
    }else{
        $add_social_need = $Wall->Insert_Program_Plan($uid, $new_pp_title, $new_pp_content, $new_pp_keyword, "", $pp_gid, $pp_pid, $pp_sn_id);
    
    }
}
/* End of Add new Program/Plan*/

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
    </head>
    <body>
        
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class="div-content">
                    <b>Program Plan</b><br/>
                    <p>Find the existing program/plan or <a href="" data-toggle="modal" data-target="#add_social_need_prog_plan"> Add New Program/Plan </a></p>
                    
                        <?php
                      
                        /* Dashboard Slideshow Post */
                        if($_GET['sn_id']){
                            $pp_sn_id = $_GET['sn_id'];
                            $pp_by_sn_id = $Wall->Get_Each_SN_Program_Plan($pp_sn_id);
                            
                           
                            foreach ($pp_by_sn_id as $value) {
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

                            <?php if ($uid) { ?>
                            <div>
                                <button id="<?php echo $pp_id; ?>" class="btn btn-social">Get Involved</button> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                <button id="<?php echo $pp_id; ?>" class="btn btn-social">Edit</button>
                                <button id="<?php echo $pp_id; ?>" class="btn btn-social">Like</button>
                                <button id="<?php echo $pp_id; ?>" class="btn btn-social">Share</button>
                            </div>
                        <?php 
                            }
                            echo '</div></div>';
                        }
                    }
                        
                    ?>
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>

<?php
if($session_tour==0)
{
echo '<script>introJs().start();</script>';
}
?>

<!-- Add Program Plan -->

<div class="modal fade" id="add_social_need_prog_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post" enctype='multipart/form-data' action="">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New Social Need </h4>
      </div>

    <div class="modal-body">      
           
            <input type="text" name="new_pp_title" id="sn_title" class="form-control" placeholder="Title" required=""/><br/>
            <input type="text" id="sn_keyword" name='new_pp_keyword' class="form-control" data-role="tagsinput"  value="" placeholder="Keyword" required=""/><br/>
            <textarea name="new_pp_content" id="add_sn_content"  style="width:100%; height:100px;" placeholder="Content"></textarea>
            <input type="file" name="new_pp_pic" id="new_sn_pic" style="display:inline;" required="">
            <br/>
            <div id="webcam_container" class='border'>
                <div id="webcam" ></div>
                <div id="webcam_preview"></div>
                <div id='webcam_status'></div>
                <div id='webcam_takesnap'></div>
            </div>
    </div>

      <div class="modal-footer">
           <input type="hidden" id="popoup_sn_id" name="sn_id" value="<?php echo $_GET['sn_id'];?>" />
          <input type="hidden" name="group_id" value="<?php echo $groupID;?>">
          <input type="hidden" name="proj_id" value="<?php echo $proj_id;?>">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="submit" name="submit_new_program" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div> 

<!-- End Popup -->