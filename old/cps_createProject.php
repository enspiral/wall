<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$create_button="Create Project";

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $proj_name = $_POST['proj_name'];
    $proj_start_date = $_POST['proj_start_date'];
    $proj_end_date = $_POST['proj_end_date'];
    $proj_url = $_POST['proj_url'];
    $usr_role = $_POST['usr_role'];

    $error_info1=''; $error_info2=''; $error_info3='';
    $error_info4=''; $error_info5=''; $error_info6='';
    
    $validation = true;
    
    /* Project Name */
    if(strlen($proj_name)>0){
        if (!preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $proj_name)) {
            $error_info1 = 'Invalid project name!';
            $validation = false;
        }
    }else{
        $error_info1 = 'This field is required!';
        $validation = false;
    }
    
    /* Community */
    if(strlen($_POST['proj_community'])>0){
        if(strlen($_POST['new_com_name'])>0 || strlen($_POST['new_com_add'])>0 || strlen($_POST['new_lang'])){
            $error_info2 = 'You cannot create new community and choose exisiting project at the same time!';
            $validation = false;
        }else{
            $group_value = $Wall->existing_group($_POST['proj_community'], 2);
            if($group_value==0){
                $error_info2 = 'Community is not existed. Please create new or Choose exisiting Community!';
                $validation = false;
            }
        }
        
    }else{
        if(strlen($_POST['new_com_name'])==0 || strlen($_POST['new_com_add'])==0 || strlen($_POST['new_lang'])){
            $error_info2 = 'Please select exisiting community/please complete all info to create new community!';
            $validation = false;
        }else{
            $group_value = $Wall->existing_group($_POST['new_com_name'], 2);
            if($group_value!=0){
                $error_info2 = 'Community is existed. Please choose exisiting or create the new one!';
                $validation = false;
            }
        }
    }
    
    /* Organization */    
    if(strlen($_POST['proj_org'])>0){
         if(strlen($_POST['new_org_name'])>0 || strlen($_POST['new_org_name'])>0 && strlen($_POST['new_org_web'])==0){
            $error_info3 = 'Create New or Choose exisiting Organization!';
            $validation = false;
        }else{
            $group_value = $Wall->existing_group($_POST['proj_org'], 3);
            if($group_value==0){
                $error_info3 = 'Organization is not existed. Please create new or Choose exisiting Organization!';
                $validation = false;
            }
        }
    }else{
        if(strlen($_POST['new_org_name'])>0 && strlen($_POST['new_org_add'])==0 && strlen($_POST['new_org_web'])==0){
            $group_value = $Wall->existing_group($_POST['new_org_name'], 3);
            if($group_value!=0){
                $error_info3 = 'Organization is existed. Please choose exisiting or create the new one!';
                $validation = false;
            }
        }
    }
    
    /* URL */
    if(strlen($proj_url)==0){
        $error_info4 = 'This field is required!';
        $validation = false;
    }
    
     /* Attachment */
    if($_FILES['proj_file']['size'] > 0){
        if($_FILES['proj_file']['size'] > 20000000){
            $error_info5 = "Sorry, your file is too large.";
            $validation = false;
        }
        else{
            $allowedExts = array("pdf", "doc", "docx");
            $extension = end(explode(".", $_FILES['proj_file']['name']));
            if (($_FILES['proj_file']['type'] == "application/pdf") || ($_FILES['proj_file']['type'] == "application/msword") || ($_FILES['proj_file']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && in_array($extension, $allowedExts))
            {
                if ($_FILES['proj_file']['error'] > 0)
                {
                   $error_info5 = "Return Code: " . $_FILES['proj_file']['error'];
                   $validation = false;
                }
            }else{
                $error_info5 = "Wrong format!";
                $validation = false;
            }
        }
    }
       
    /* Agreement */
    if(strlen($_POST['usr_agreement'])==0){
        $error_info6 = 'Please check the agreement terms and conditions!';
        $validation = false;
    }
    
    /* Validation */
    if($validation)
    {
        $target_dir = "documents/";
        $target_file = $target_dir . basename($_FILES['proj_file']['name']);
        move_uploaded_file($_FILES['proj_file']['tmp_name'], $target_file);
//	$group_value=$Wall->Create_Project($proj_name,$proj_desc,$uid, $proj_start_date, $proj_end_date, $proj_location, $usr_role, $target_file);
 //       header("Location:cps_project.php?gid=".$group_value);
		//if($group_value)
		//{
                //    $link="<a href='".$base_url."groups/".$group_value."'>".$group_name."</a>";
        $msg="<span class='succ'>Your info is correct!</span>";
		//}
    }
    else
    {
     //   $group_value = 3;
     //   header("Location:cps_project.php?gid=.".$group_value);
       $msg="<span class='error'>Your infomation is not completed!</span>";
    }
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php include_once 'project_title.php';
include_once 'js.php';
?>
<style>
#settings td
{
padding:4px
}
.label
{
text-align:right;
font-weight:bold;
}

.createProject input[type="text"]{
    width:250px;
}

.createProject textArea{
    width:250px;
}

</style>

<script>
    
function showCommunity() {
    $('.add_new_com_field').show();
}

function hideCommunity() {
    $('.add_new_com_field').hide();
}

function showOrg() {
    $('.add_new_org_field').show();
}

function hideOrg() {
    $('.add_new_org_field').hide();
}


function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#proj_community').val();
	if (keyword.length > min_length) {
		$.ajax({
			url: 'create_search_autocomplete.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#proj_community_id').show();
				$('#proj_community_id').html(data);
			}
		});
	} else {
		$('#proj_community_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#proj_community').val(item);
	// hide proposition list
	$('#proj_community_id').hide();
}

function autocomplet_org() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#proj_org').val();
	if (keyword.length > min_length) {
		$.ajax({
			url: 'create_search_autocomplete_org.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#proj_org_id').show();
				$('#proj_org_id').html(data);
			}
		});
	} else {
		$('#proj_org_id').hide();
	}
}

function set_item_org(item) {
	// change input value
	$('#proj_org').val(item);
	// hide proposition list
	$('#proj_org_id').hide();
}
</script>

</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
<div id='main'>

<?php

include('block_createProject.php');
?>

<?php include_once 'block_footer.php';?>
</div>

</body>
</html>