<div id="wall_container">
<?php	 
if(!$profile_uid){
    if($_SESSION['uid']==$uid || $home)
    {
        include_once('html_updatebox.php');
    }
}else{
    if($profile_uid==$uid || $home)
    {
        include_once('html_updatebox.php');
    }
}
?>

<div id="content">
<?php 
// Loading Messages
//include('messages_load.php'); 
?>
</div>
</div>