<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $proj_name = $_POST['proj_name'];
    $proj_start_date = $_POST['proj_start_date'];
    $proj_end_date = $_POST['proj_end_date'];
    $proj_url = $_POST['proj_url'];
    $usr_role = $_POST['usr_role'];
    $proj_lang = $_POST['proj_lang'];
    $skills = $_POST['proj_skills'];
   // echo $proj_name; die();
    // $target_file = '';

    // $error_info1=''; $error_info2=''; $error_info3='';
    // $error_info4=''; $error_info5=''; $error_info='';
    // $proj_com_id=''; $proj_org_id='';
    
    $validation = true;
    
    /* Project Name */
    if(strlen($proj_name)>0){
//        if (!preg_match('~^[A-Za-z0-9.,+-_ ]{3,50}$~i', $proj_name)) {
//            $error_info1 = 'Invalid project name!';
//            $validation = false;
//        }
    }else{
        $error_info1 = 'This field is required!';
        $validation = false;
    }

    /* Community */
    if(strlen($_POST['proj_community'])>0){
        if(strlen($_POST['new_com_name'])>0 && strlen($_POST['new_com_add'])>0 && strlen($_POST['new_lang'])){
        //    $error_info2 = 'Please create new community/choose the exisiting one!';
        //    $validation = false;
        }else{
            $group_value = $Wall->existing_group($_POST['proj_community'], 2);
            if($group_value==0){
                $error_info2 = 'Community is not existed.';
                $validation = false;
            }
        }
        
    }else{
        if(strlen($_POST['new_com_name'])==0 || strlen($_POST['new_com_add'])==0 || strlen($_POST['new_lang'])==0){
            $error_info2 = 'Please select your community or create new!';
            $validation = false;
        }else{
            $group_value = $Wall->existing_community($_POST['new_com_name'], $_POST['new_com_add']);
            if($group_value!=0){
                $error_info2 = 'New Community is existed!';
                $validation = false;
            }
        }
    }
    
    /* Organization */    
    if(strlen($_POST['proj_org'])>0){
        if(strlen($_POST['new_org_name'])>0 && strlen($_POST['new_org_add'])>0 && strlen($_POST['new_org_web'])>0){
            //$error_info3 = 'Create New or Choose exisiting Organization!';
            //$validation = false;
        }else{
            $group_value = $Wall->existing_group($_POST['proj_org'], 3);
            if($group_value==0){
                $error_info3 = 'Organization is not existed.';
                $validation = false;
            }
        }
    }else{
        if(strlen($_POST['new_org_name'])>0 && strlen($_POST['new_org_add'])==0 && strlen($_POST['new_org_web'])==0){
            $group_value = existing_organization($_POST['new_org_name'], $_POST['new_org_add']);
            if($group_value!=0){
                $error_info3 = 'New Organization is already existed.';
                $validation = false;
            }
        }
    }
    
    /* URL */
    if(strlen($proj_url)==0){
    //    $error_info4 = 'This field is required!';
    //    $validation = false;
    }else{
        $url_value = $Wall->existing_url($proj_url);
         if($url_value!=0){
            $error_info4 = 'URL is existed. Please fill the new one!';
            $validation = false;
        }
    }
    
     /* Attachment */
    
    //
    /*
     * $allowed =  array('gif','png' ,'jpg');
$filename = $_FILES['video_file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    echo 'error';
}
     */
    if($_FILES['proj_file']['size'] > 0){
        if($_FILES['proj_file']['size'] > 20000000){
            $error_info5 = "File's size is too large.";
            $validation = false;
        }
        else{
            $allowedExts = array('png', 'jpg', 'docx');
            $extension = pathinfo($_FILES['proj_file']['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, $allowedExts))
            {
                $error_info5 = "Wrong format!";
                $validation = false;
               
            }
        }
    }
       
    /* Agreement
    if(strlen($_POST['usr_agreement'])==0){
        $error_info6 = 'Please check the agreement terms and conditions!';
        $validation = false;
    }*/
    
    /* Validation */
    if($validation)
    {
        $target_dir = "documents/";
        if($_FILES['proj_file']['size'] > 0){
            $target_file = $target_dir . basename($_FILES['proj_file']['name']);
            move_uploaded_file($_FILES['proj_file']['tmp_name'], $target_file);
        }
       
        if(strlen($_POST['new_com_name'])>0 && strlen($_POST['new_com_add'])>0 && strlen($_POST['new_lang'])>0){
            $com_name = $_POST['new_com_name'];
            $com_add = $_POST['new_com_add'];
            $com_lang = $_POST['new_lang'];
            $proj_com_id = $Wall->Add_temp_community($com_name, $com_add, $com_lang, $uid);
        }else{
            $proj_com_id = $_POST['proj_com_id'];
        } 
           
        
        if(strlen($_POST['new_org_name'])>0 && strlen($_POST['new_org_add'])>0 && strlen($_POST['new_org_web'])>0){
            $org_name = $_POST['new_org_name'];
            $org_add = $_POST['new_org_add'];
            $org_web = $_POST['new_org_web'];
            $proj_org_id = $Wall->Add_temp_organization($org_name, $org_add, $org_web, $uid);
        }else{
            $proj_org_id = $_POST['proj_oid'];
        } 

        
        
      
    /*    echo $proj_name;
        echo $uid;
        echo $proj_start_date;
        echo $proj_end_date;
        echo $proj_url;
        echo $usr_role;
        echo $target_file; 
        echo $proj_com_id;
        echo $proj_org_id;*/
        $group_value=$Wall->Create_Project($proj_name, $uid, $proj_start_date, $proj_end_date, $proj_url, $usr_role, $proj_lang, $skills, $target_file, $proj_com_id, $proj_org_id);
  //      echo $group_value;
        if($group_value!=0){
            echo 'Success!';
            header("Location:group.php?gid=".$group_value);
        }	
    //    $error_info = "Your info is correct!";
		
    }
    else
    {
     //   $group_value = 3;
     //   header("Location:cps_project.php?gid=.".$group_value);
       $error_info = "Your infomation is not completed!";
    }
}

?>
