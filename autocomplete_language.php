<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=voluntl6_demo', 'voluntl6', '9]K}T0SW^fQy', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
//$sql1 = "SELECT * FROM groups WHERE group_name LIKE (:keyword) AND type = '2' ORDER BY group_name";
$sql = "SELECT * FROM (SELECT LCASE(TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(all_tags, ',' ,numbers.`num`), ',', -1))) AS one_tag, COUNT(*) AS cnt FROM (";
$sql .= " SELECT GROUP_CONCAT(NULLIF(proj_lang, '') separator ',') AS all_tags, ";
$sql .= "LENGTH(GROUP_CONCAT(NULLIF(proj_lang, '') SEPARATOR ',')) - LENGTH(REPLACE(GROUP_CONCAT(NULLIF(proj_lang, '') SEPARATOR ','), ',', '')) + 1 AS count_tags ";
$sql .= "FROM projects) t JOIN numbers ON numbers.`num` <= t.count_tags GROUP BY one_tag ORDER BY cnt DESC) w WHERE one_tag like (:keyword); ";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list_lang = $query->fetchAll();

if($list_lang){
    foreach ($list_lang as $kw_lang) {
            echo '<div style="width:150px;" onclick="set_item_language(\''.str_replace("'", "\'", $kw_lang['one_tag']).'\',\''.$kw_lang['cnt'].'\')">';
            echo '<b>'. ucfirst($kw_lang['one_tag']) .'</b></div>';    
    }
}else{ 
    echo '<div class="display_box" align="left" style="width:150px;">';
    echo '<h5>No Results Found</h5>';
    echo '</div>';
}
?>