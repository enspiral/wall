<?php
include_once '../includes/db.php';

if(isset($_POST['post_name'])=='manage_tab'){
    $tab_home           = $_POST['home'];
    $tab_ourwork        = $_POST['our_work'];
    $tab_ourteam        = $_POST['our_team'];
    $tab_beneficiary    = $_POST['tab_beneficiary'];
    $tab_recruitment    = $_POST['tab_recruitment'];
    $tab_support        = $_POST['tab_support'];
    $tab_contact        = $_POST['tab_contact'];
    $id        = $_POST['id'];
    
    mysqli_query($db,"UPDATE projects SET tab_home='$tab_home',tab_ourwork='$tab_ourwork',tab_ourteam='$tab_ourteam',tab_beneficiaries='$tab_beneficiary',tab_recruitment='$tab_recruitment',tab_support='$tab_support',tab_contact='$tab_contact' WHERE group_id='$id'");
}

if(isset($_POST['post_type'])=='edit_profile'){
    $about      = htmlspecialchars($_POST['about'],ENT_QUOTES);
    $contact    = htmlspecialchars($_POST['contact'],ENT_QUOTES);
    $email      = htmlspecialchars($_POST['email'],ENT_QUOTES);
    $skills     = $_POST['skills'];
    $interest   = $_POST['interest'];
    $birthday   = $_POST['birthday'];
    $country   = $_POST['country'];
    $address   = $_POST['address'];
    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['last_name'];
    $uid        = $_POST['uid'];
    
    mysqli_query($db, "UPDATE users SET bio = '$about',phone='$contact',email='$email',skills='$skills',interest='$interest',birthday='$birthday',country='$country',address='$address',first_name='$first_name',last_name='$last_name' WHERE uid = '$uid'");
}

// edit_beneficiary
if(isset($_POST['submit_name'])=='edit_beneficiary'){
    
    $beneficiary_title      = htmlspecialchars($_POST['beneficiary_title'],ENT_QUOTES);
    $beneficiary_img        = htmlspecialchars($_POST['beneficiary_img'],ENT_QUOTES);
    $beneficiary_des        = htmlspecialchars($_POST['beneficiary_des'],ENT_QUOTES);
    $com_id                 = $_POST['com_id'];
    
    mysqli_query($db, "UPDATE community SET com_title='$beneficiary_title',com_img='$beneficiary_img',com_desc='$beneficiary_des' WHERE com_id = '$com_id'");
}



if(isset($_POST['post_name'])=='edit_progress'){
    $comid          = $_POST['comid'];
    $san            = $_POST['sanitation'];
    $accomodation   = $_POST['accomodation'];
    $manpower       = $_POST['manpower'];
    $recreation     = $_POST['recreation'];
    $education     = $_POST['education'];
    $donation     = $_POST['donation'];
    mysqli_query($db, "UPDATE community SET sanitation = '$san',accomodation='$accomodation',manpower='$manpower',recreation='$recreation',education='$education',donation='$donation' WHERE com_id = '$comid'");
}

if(isset($_POST['edit_contact_intro'])=='edit_contact_intro'){
    $content = htmlspecialchars($_POST['content'],ENT_QUOTES);
    $gid = $_POST['id'];
     mysqli_query($db, "UPDATE projects SET contact_intro = '$content' WHERE group_id = '$gid'");
}



if(isset($_POST['approve'])=='approve'){
    $id          = $_POST['id'];
    mysqli_query($db, "UPDATE project_involvement SET aprove = 1 WHERE id = '$id'");
}

if(isset($_POST['deny'])=='deny'){
    $id          = $_POST['id'];
    mysqli_query($db, "UPDATE project_involvement SET deleted = 1 WHERE id = '$id'");
}


?>