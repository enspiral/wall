<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=wall', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT G.group_id, G.group_name, G.group_pic, C.com_id, C.location FROM groups G, community C WHERE G.group_name LIKE (:keyword) AND G.group_id = C.group_id AND G.type = '2' ORDER BY G.group_name";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
if(sizeof($list)>0){
    foreach ($list as $rs) {
            // put in bold the written text
            $group_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['group_name']);
            // add new option
            echo '<div class="display_box" align="left" style="width:265px;" onclick="set_item(\''.str_replace("'", "\'", $rs['group_name']).'\',\''.$rs['com_id'].'\')">';
            echo '<img src="'.$base_url.'uploads/'.$rs['group_pic'].'" class="search_face">';
            echo '<b>'. $group_name .'</b><div class="searchDesc">'.$rs['location'] .'</div></div>';            
        //  echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['group_name']).'\')">'.$group_name.'</li>';
    }
}else{ 
    echo '<div class="display_box" align="left" style="width:265px;">';
    echo '<h5>No Results Found</h5>';
    echo '</div>';
}
?>