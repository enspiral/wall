<div id="wall_container">
<?php

if($group_member_id==$uid)
{
    if($group_owner_id == $uid){
        $GroupDetails=$Wall->Group_Details($groupID);
        $group_name_wall=$GroupDetails['group_name'];
        include_once('html_updatebox_group.php');
    }else{    
        include_once('html_updatebox.php');
    }      
}
?>

<div id="content">
<?php
// Loading Messages
include('messages_load.php');
?>
</div>
</div>
