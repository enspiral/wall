<?php 
if(isset($_POST['submit_learn_n_teach'])){
    $text_teach_learn = $_POST['par_teach_learn'];
    $Wall->Update_Teach_Learn($text_teach_learn);
}

if(isset($_POST['submit_sustain_project'])){
    $text_sustain_project = $_POST['par_sustain_project'];
    $Wall->Update_Sustain_Project($text_sustain_project);
}

if(isset($_POST['submit_volunteer_better'])){
    $text_volunteer_better = $_POST['par_volunteer_better'];
    $Wall->Update_Volunteer_Better($text_volunteer_better);
}
if(isset($_POST['submit_want_volunteer'])){
    $text_want_volunteer = $_POST['par_want_volunteer'];
    $Wall->Update_want_Volunteer($text_want_volunteer);
}
if(isset($_POST['submit_tl_content_1']) || isset($_POST['submit_tl_content_2']) || isset($_POST['submit_tl_content_3'])){
    $id=""; $title=""; $url=""; $file_data="";
    if(isset($_POST['submit_tl_content_1'])){
        $id = 1;
        $title = $_POST['tl_content_title_1'];
        $url = $_POST['tl_content_url_1'];
        $file_data = "tl_image_1";
    }else if(isset($_POST['submit_tl_content_2'])){
        $id = 2;
        $title = $_POST['tl_content_title_2'];
        $url = $_POST['tl_content_url_2'];
        $file_data = "tl_image_2";
    }else if(isset($_POST['submit_tl_content_3'])){
        $id = 3;
        $title = $_POST['tl_content_title_3'];
        $url = $_POST['tl_content_url_3'];
        $file_data = "tl_image_3";
    }
   
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
            $update_tl_content = $Wall->Update_TL_Content_1($id, $title, $url, $_FILES["$file_data"]['name']);
        }else{
            $update_tl_content = $Wall->Update_TL_Content_2($id, $title, $url);
        }
//        $all_teach_n_learn = $Wall->Get_Teach_n_Learn();
}

/* Steps for sustainable projects */
if(isset($_POST['submit_content_step_1']) || isset($_POST['submit_content_step_2']) || isset($_POST['submit_content_step_3'])){
    $id=""; $title=""; $content=""; $file_data="";
    if(isset($_POST['submit_content_step_1'])){
        $id = 1;
        $title = $_POST['step_title_1'];
        $content = $_POST['step_content_1'];
        $file_data = "step_image_1";
    }else if(isset($_POST['submit_content_step_2'])){
        $id = 2;
        $title = $_POST['step_title_2'];
        $content = $_POST['step_content_2'];
        $file_data = "step_image_2";
    }else if(isset($_POST['submit_content_step_3'])){
        $id = 3;
        $title = $_POST['step_title_3'];
        $content = $_POST['step_content_3'];
        $file_data = "step_image_3";
    }
    
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
            $update_step_content = $Wall->Update_Step_Content_1($id, $title, $content, $_FILES["$file_data"]['name']);
        }else{
            $update_step_content = $Wall->Update_Step_Content_2($id, $title, $content);
        }
        
}

if(isset($_POST['submit_guide_image'])){
    for($i=0; $i<3; $i++){
        $id = $i+1;
        $file_data = "guide_image_".$id;
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
                $update_step_content = $Wall->Update_Image_Guide($id, $_FILES["$file_data"]['name']);
            }
    }
}

if(isset($_POST['submit_vol_better_1']) || isset($_POST['submit_vol_better_2']) || isset($_POST['submit_vol_better_3'])){
    $id=""; $title=""; $file_data="";
    if(isset($_POST['submit_vol_better_1'])){
        $id = 1;
        $title = $_POST['vol_better_title_1'];
        $file_data = "vol_better_logo_1";
    }else if(isset($_POST['submit_vol_better_2'])){
        $id = 2;
        $title = $_POST['vol_better_title_2'];
        $file_data = "vol_better_logo_2";
    }else if(isset($_POST['submit_vol_better_3'])){
        $id = 3;
        $title = $_POST['vol_better_title_3'];
        $file_data = "vol_better_logo_3";
    }
    
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
            $update_vol_better = $Wall->Update_Vol_Better_1($id, $title, $_FILES["$file_data"]['name']);
        }else{
            $update_vol_better = $Wall->Update_Vol_Better_2($id, $title);
        }
        
}
if(isset($_POST['submit_text_one_volunteer'])){
    $text_one_volunteer = $_POST['volunteer_one'];
    $file_data = "guide_image_4";
    $vol_id = 4;
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
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_one_volunteer, $_FILES["$file_data"]['name']);
    }else{
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_one_volunteer, "");
    }
    //$Wall->Update_Volunteer_1($text_one_volunteer);
}
if(isset($_POST['submit_text_two_volunteer'])){
    $text_two_volunteer = $_POST['volunteer_two'];
    $file_data = "guide_image_5";
    $vol_id = 5;
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
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_two_volunteer, $_FILES["$file_data"]['name']);
    }else{
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_two_volunteer, "");
    }
    //$Wall->Update_Volunteer_2($text_two_volunteer);
}
if(isset($_POST['submit_text_three_volunteer'])){
    $text_three_volunteer = $_POST['volunteer_three'];
    $file_data = "guide_image_1";
    $vol_id = 1;
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
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_three_volunteer, $_FILES["$file_data"]['name']);
    }else{
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_three_volunteer, "");
    }
    //$Wall->Update_Volunteer_3($text_three_volunteer);
}
if(isset($_POST['submit_text_four_volunteer'])){
    $text_four_volunteer = $_POST['volunteer_four'];
    $file_data = "guide_image_2";
    $vol_id = 2;
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
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_four_volunteer, $_FILES["$file_data"]['name']);
    }else{
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_four_volunteer, "");
    }
    //$Wall->Update_Volunteer_4($text_four_volunteer);
}
if(isset($_POST['submit_text_five_volunteer'])){
    $text_five_volunteer = $_POST['volunteer_five'];
    $file_data = "guide_image_3";
    $vol_id = 3;
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
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_five_volunteer, $_FILES["$file_data"]['name']);
    }else{
        $update_vol_better = $Wall->Update_Each_Volunteer($vol_id, $text_five_volunteer, "");
    }
    //$Wall->Update_Volunteer_5($text_five_volunteer);
}

if(isset($_POST['submit_manage_project'])){
    $list_proj = array(0, 0, 0, 0);
    $i = 0;
     if(!empty($_POST['answer1'])) {
        foreach($_POST['answer1'] as $check) {
             $list_proj[$i] = $check;
             $i++;
        }
    }
    $Wall->Update_Manage_Projects($session_uid, $list_proj[0], $list_proj[1], $list_proj[2], $list_proj[3]);
}


?>