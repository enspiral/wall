<?php
include_once '../includes/db.php';

if(isset($_POST['post_type'])=='edit_community'){
    $com_name   = $_POST['com_name'];
    $com_des    = $_POST['com_des'];
    $com_location   = $_POST['com_location'];
    $gid         = $_POST['gid'];
    
    mysqli_query($db,"UPDATE groups INNER JOIN community ON groups.group_id = community.group_id
            SET groups.group_name='$com_name',
            community.com_desc='$com_des', 
            community.location='$com_location' 
            WHERE groups.group_id='$gid'");
}

if(isset($_POST['post_type'])=='delete_slide'){
    $id = $_POST['slide_id'];
    mysqli_query($db,"DELETE FROM com_slideshow WHERE slide_id = '$id'");
}


if(isset($_POST['update_type'])=='edit_com_about_intro'){
    $about_des   = $_POST['desc'];
    $id          = $_POST['id'];
    
    mysqli_query($db,"UPDATE com_tab_about SET description = '$about_des' WHERE  id='$id'");
}


if(isset($_POST['edit_important_info'])=='edit_important_info'){
    $id         = $_POST['id'];
    $content    = $_POST['content'];
    mysqli_query($db,"update com_volunteer_important_info set description = '$content' where id = ".$id);
}
if(isset($_POST['welcome'])=='welcome'){
    $id         = $_POST['id'];
    $content    = $_POST['content'];
    $title      =  $_POST['title'];
    mysqli_query($db,"update com_welcome_content set title = '$title' , content = '$content' where id = '$id'");
}
if(isset($_POST['dev_plan'])=='dev_plan'){
    $id         = $_POST['id'];
    $content    = $_POST['content'];
    mysqli_query($db,"update com_volunteer_dev_plan set description = '$content' where id = '$id'");
}
if(isset($_POST['dev_plan2'])=='dev_plan2'){
    $id         = $_POST['id'];
    $content    = $_POST['content'];
    mysqli_query($db,"update com_volunteer_dev_plan set description = '$content' where id = '$id'");
}

