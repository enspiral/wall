<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=voluntl6_demo', 'voluntl6', '9]K}T0SW^fQy', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
//$sql = "SELECT * FROM groups WHERE group_name LIKE (:keyword) AND type = '3' ORDER BY group_name";
$sql = "SELECT G.group_id, G.group_name, G.group_pic, O.org_id, O.location FROM groups G, organizations O WHERE G.group_name LIKE (:keyword) AND G.group_id = O.group_id AND G.type = '3' ORDER BY G.group_name";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
echo '<div style="float:left; width:300px;">';
if(sizeof($list)>0){
   foreach ($list as $rs) {
	// put in bold the written text
	$group_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['group_name']);
	// add new option
        echo '<div class="display_box" align="left" style="width:265px;" onclick="set_item_org(\''.str_replace("'", "\'", $rs['group_name']).'\',\''.$rs['org_id'].'\')">';
        echo '<img src="'.$base_url.'uploads/'.$rs['group_pic'].'" class="search_face">';
        echo '<b>'. $group_name .'</b><div class="searchDesc">'.$rs['location'] .'</div></div>';            
    //  echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['group_name']).'\')">'.$group_name.'</li>';
    } 
}else{ 
    echo '<div class="display_box" align="left" style="width:265px;">';
    echo '<h5>No Results Found</h5>';
    echo '</div>';
}
echo '</div>';
?>
<!-- Form to fill the new organization -->
<!--div style="width:400px; float:left;">
    <h3>Not found? Please provide details here: </h3>
    <form method='post' action='' enctype="multipart/form-data" >
        <table width='100%' id='settings'>
    
        <tr>
            <td valign='top' class='label'>Name: </td>
            <td valign='top'><input type='text' name='new_org_name' value='<?php //echo $_POST['new_org_name']; ?>' maxlength="50"/>
                <p style="color:red;"><?php //echo $error_new_org_1; ?></p>
            </td>
        </tr>

        <tr>
            <td valign='top' class='label'>Address: </td>
            <td valign='top'><textarea name='new_org_add' class="textarea"><?php //echo $_POST['new_org_add']; ?></textarea>
                <p style="color:red;"><?php //echo $error_new_org_2; ?></p>
            </td>
        </tr>
        
        <tr>
            <td valign='top'></td>
            <td valign='top'>
                <input type='submit' value='Submit' class='wallbutton'/>
            </td>
        </tr>
        </table>
    </form>
</div-->