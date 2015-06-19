
<style>
    .btn-add-new{
        float:right;
        margin-top: -17px;
    }
    .des{
        border-width: 1px; border-style: solid; border-color: #dddddd; margin-bottom:10px;
    }
    .content_tab{
        background: #2AA9DE;
    }
    .content_tab li{
        border-left: 1px solid white;
        border-radius: 0px;
        padding:10px 0px 10px 3px !important
    }
    .content_tab li a{
        border-left:1px solid #2AA9DE;
        border-radius:0px;
        color: white;
        padding: 10px !important;
    }
    .content_tab .active,#nav-group .content_tab li .active:hover{
        background-color: white;
        color:#2AA9DE;
    }
    
    .bootstrap-tagsinput{
        border-radius: 2px;
        width: 100% !important;
    }
    
    
</style>
<?php
    if($_GET['p']){
        $p = $_GET['p'];
    }else{
        $p= "";
    }
    
?>

<div  id="nav-group">
    <ul class="text-right content_tab">
        <li><a class='<?php echo $p=="social" || $p==""?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=social">Social Need</a></li>
        <li><a class='<?php echo $p=="program"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=program">Program/Plan</a></li>
        <li><a class='<?php echo $p=="outcome"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents&p=outcome">Outcomes</a></li>
    </ul>
</div>

<?php

if($_GET['p']){
    $content_page = $_GET['p'];
}else{
    $content_page = 'social';
}
include "contents/$content_page.php";

?>