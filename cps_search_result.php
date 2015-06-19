<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$data_area_focus ="";
$data_language = "";
//$condition_name="(group_name LIKE '";
//$condition_location="(location LIKE '";

if(isset($_POST['top_search']) || isset($_POST['top_search1']) || isset($_POST['left_search']))
{
    
    $data_name = $_POST['search_name'];
    $data_locaiton = $_POST['search_location'];
    $data_date1 = $_POST['proj_date1'];
    $data_date2 = $_POST['proj_date2'];
   
    if($data_name!=''){
        $data_name = '%'.$data_name.'%';
    }
    
    if($data_locaiton!=''){
        $data_locaiton = '%'.$data_locaiton.'%';
    }
    
    // Left Search - Area of Focus
    if(!empty($_POST['area_focus'])) {
       $i=0;
        foreach($_POST['area_focus'] as $check) {
             if($i==0){          
             $data_area_focus .= "'%".$check."%'";
             $i++;
             }else{
                 $data_area_focus .= " OR '%".$check."%'";
             }
        }
    }else{
        $data_area_focus = "''";
    }
    
    // Left Search - Language
    if(!empty($_POST['language'])) {
       $i=0;
        foreach($_POST['language'] as $lang) {
             if($i==0){          
             $data_language .= "'%".$lang."%'";
             $i++;
             }else{
                 $data_language .= " OR '%".$lang."%'";
             }
        }
    }else{
        $data_language = "''";
    }
    
    /*
    // Query for Project
    $sql = "select * from ( select G.group_id, G.group_name,  G.group_pic, P.start_date, P.end_date, P.proj_intro, P.location, ( ";
    $sql .= "SELECT GROUP_CONCAT(NULLIF(sn_keywords, '') SEPARATOR ',') AS all_tags FROM proj_social_needs ";
    $sql .= "WHERE sn_pid = G.group_id) as keywords from groups G INNER JOIN projects P where G.group_id = P.group_id) discover ";
    $sql .= "where ".$condition_name. " OR ".$condition_location. " OR keywords LIKE ".$validation;
   
     
    //INNER JOIN community ON projects.com_id = community.com_id
    // Query for Social Needs
    $sql2 = "select * from (select G.group_id, G.group_name, G.group_pic, SN.sn_title, SN.sn_content, SN.sn_keywords, ( ";
    $sql2 .= "SELECT GROUP_CONCAT(NULLIF(sn_keywords, '') SEPARATOR ',') AS all_tags FROM proj_social_needs ";
    $sql2 .= "WHERE sn_pid = G.group_id) as keywords from groups G INNER JOIN proj_social_needs SN where G.group_id = SN.sn_pid) discover2 ";
    $sql2 .= "where group_name LIKE '%" .$_POST['search_name']. "%' OR sn_keywords LIKE ".$validation;
    $query = $pdo->prepare($sql2);
     */
    
    $sql_project = "select * from ( select G.group_id, G.group_name,  G.group_pic, P.proj_id, P.start_date, P.end_date, P.proj_intro, C.location, C.language, C.com_title, ( ";
    $sql_project .= "SELECT GROUP_CONCAT(NULLIF(lcase(sn_keywords), '') SEPARATOR ',') AS all_tags FROM proj_social_needs ";
    $sql_project .= "WHERE sn_pid = P.proj_id) as keywords from groups G INNER JOIN projects P on G.group_id = P.group_id INNER JOIN community C on P.com_id = C.com_id) discover ";
    $sql_project .= "WHERE group_name LIKE '$data_name' OR location LIKE '$data_locaiton' OR keywords LIKE $data_area_focus OR language LIKE $data_language ";
    $sql_project .= "OR (start_date >= '$data_date1' AND end_date <= '$data_date2')";
  
    $sql_socialneed = "SELECT proj_social_needs.*, groups.group_name, groups.group_pic, projects.*, messages.msg_title,  messages.message, community.language,community.location as com_location ";
    $sql_socialneed.= " FROM proj_social_needs INNER JOIN messages ON messages.msg_id = proj_social_needs.msg_id INNER JOIN projects ON proj_social_needs.sn_pid = projects.proj_id INNER JOIN groups ON projects.group_id = groups.group_id INNER JOIN community ON projects.com_id = community.com_id ";
    $sql_socialneed .= "WHERE msg_title LIKE '$data_name' OR community.location LIKE '$data_locaiton' OR sn_keywords LIKE $data_area_focus OR sn_keywords LIKE '$data_name' OR proj_lang LIKE $data_language";
    
    $sql_community = "SELECT groups.*,community.*  FROM groups inner join community ON groups.group_id = community.group_id ";
    $sql_community .= "WHERE group_name LIKE '$data_name' OR community.location LIKE '$data_locaiton' OR community.language LIKE $data_language";
    
//    echo $sql_community;
//    $data_community     = mysqli_query($db, "SELECT groups.*,community.*  FROM groups inner join community ON groups.group_id = community.group_id WHERE group_name LIKE '$data_name' OR community.location LIKE '$data_locaiton'");
//    $data_socailneed    = mysqli_query($db, "SELECT proj_social_needs.*, groups.group_name, groups.group_pic, projects.*,community.language,community.location as com_location FROM proj_social_needs INNER JOIN projects ON proj_social_needs.sn_pid = projects.proj_id INNER JOIN groups ON projects.group_id = groups.group_id INNER JOIN community ON projects.com_id = community.com_id WHERE sn_title LIKE '$data_name' OR sn_keywords LIKE '$data_name' OR community.location LIKE '$data_locaiton'");
//    $data_project       = mysqli_query($db, "SELECT projects.proj_id,projects.proj_intro,projects.group_id,projects.start_date,projects.end_date,groups.group_pic,groups.group_name,community.location, community.language,community.com_title FROM projects INNER JOIN groups ON projects.group_id = groups.group_id INNER JOIN community ON projects.com_id = community.com_id  WHERE groups.group_name LIKE '$data_name' OR community.location LIKE '$data_locaiton'");
  
    $data_community = mysqli_query($db, $sql_community);
    $data_socailneed = mysqli_query($db, $sql_socialneed);
    $data_project = mysqli_query($db, $sql_project); 
}

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
                    <?php
                        include("my_discover.php");
                    ?>
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>