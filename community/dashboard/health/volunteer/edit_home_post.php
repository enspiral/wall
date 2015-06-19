<?php 
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
}
$com_welcome_post = mysqli_query($db,"select * from com_volunteer_opp where id='$post_id'");
  foreach ($com_welcome_post as $res) {
                $post_id = $res['id'];
                $post_title = $res['title'];
                $post_content = $res['content'];
                $post_img = $res['img'];
} ?>
<?php

if (isset($_POST['save_post'])){
        $target_dir1 = "../images/commnunities/volunteer/";
        //for id card..........
        $temp1 = explode(".",$_FILES["update_pic_welcom"]["name"]);
        $filename1 = rand(1,99999) . '.' .end($temp1); 
        $target_file1 = $target_dir1 . basename($filename1);
        
        //conditions cannot null.....
        if($_FILES['update_pic_welcom']['tmp_name'] == ''){
            $filename1=$_POST['old_pic'];
        }else{
            move_uploaded_file($_FILES["update_pic_welcom"]["tmp_name"],$target_file1);
        }
        $com_home_post = mysqli_query($db,"update com_volunteer_opp set title='".htmlspecialchars($_POST['post_title'],ENT_QUOTES)."' ,content='".htmlspecialchars($_POST['post_content'],ENT_QUOTES)."',img='$filename1' where id=".$_POST['post_id']);
       echo '<script>window.location = "'.$base_url.'community/community.php?com=dashboard&side=health&tab=volunteer&volunteer=edit_home";</script>';
       die();        
    }
    ?>

<h3 class="text-center text-pink">Edit Your Post </h3><br>

<div id="div-whole" align="center">
   
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title" class="control-label col-xs-3">Title :</label>
             <div class="col-xs-6">
                 <input type="text" class="form-control" name='post_title' style="width:400px;" value="<?php echo $post_title; ?>"/>
             </div>
         </div>
         <div class="form-group">
            <label for="post_content" class="control-label col-xs-3">Content :</label>
             <div class="col-xs-6">
                 <textarea name="post_content" class="" style="width:90%; height:200px; margin-bottom:10px;"><?php echo $post_content; ?></textarea>
             </div>
         </div>
         <div class="form-group">
            <label for="post_content" class="control-label col-xs-3">Image :</label>
                <div class="col-xs-4">
                    <input name="update_pic_welcom" id="update_pic_welcom" type="file"  accept="image/*"/>
                    <input name="old_pic" id="old_pic" type="hidden" value="<?php echo $post_img; ?>"/>
                </div>
         </div>
        <div class="form-group">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="submit" class="wallbutton" name="save_post" value="Save" />
            <input type="reset" class="wallbutton" value="Clear"/>
        </div>
    </form>
</div>

