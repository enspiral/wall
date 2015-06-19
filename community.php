<?php

    include 'includes.php';
    $gid = $_GET['gid'];
    if($gid){
        $get_com_id = mysqli_query($db, "SELECT groups.group_id as group_id,groups.uid_fk as group_owner_id, community.com_id,groups.group_name as com_name from community INNER JOIN groups ON community.group_id = groups.group_id WHERE groups.group_id='$gid'");
      
    }else{
        $get_com_id = mysqli_query($db, "SELECT groups.group_id as group_id,groups.uid_fk as group_owner_id, community.com_id,groups.group_name as com_name from community INNER JOIN groups ON community.group_id = groups.group_id WHERE groups.uid_fk='$uid'");
    
    }
    foreach ($get_com_id as $value) {
        $com_id = $value['com_id'];
        $gid = $value['group_id'];
        $group_owner_id = $value['group_owner_id'];
    }  

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <?php
        include 'project_title.php';
        include 'js.php';
        ?>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper">
            <div class="container row">
                <?php include 'header_comunity.php'; ?>
                <div class="div-content">
                    <?php
                        if(isset($_GET['com'])){
                            $page = $_GET['com'];
                           
                        } else {
                           $page = "dashboard"; 
                           
                        }  
                        include("community/".$page.".php");
                    ?>
                </div>
                
                <?php include'block_footer.php'; ?>
                
            </div>
        </div>
    </body>
</html>

<?php
if($session_tour==0)
{
echo '<script>introJs().start();</script>';
}
