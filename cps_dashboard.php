<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';

if($_GET['p']){
    $track=$_GET['p'];
    if($track==1){
        $arrow = 'dashboard';
    }else if ($track==2){
        $arrow = 'profile';
    }else{
        $arrow = 'discover';
    }
}else{
    $track= 1;
    $arrow = 'dashboard';
}
?>

<script>
function showHideProject(){
     $('.dashboard-left-project').slideToggle();
}

function showHideOrg(){
     $('.dashboard-left-org').slideToggle();
}

function showHideCom(){
     $('.dashboard-left-com').slideToggle();
}

</script>
</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
<div id="main">
<?php include_once 'block_timeline_dashboard.php'; ?>

<div id='main_left'>
<?php
include_once 'block_left_dashboard.php';
?>
</div>

<div id="main_right">
<?php
if($track==1){
    include('block_updates.php');
}else if($track==2){
    include('block_tab_profile_dashboard.php');
}else{
    include('block_tab_discover_dashboard.php');
}
?>
</div>

<?php include_once 'block_footer.php';?>
</div>
</body>
</html>
