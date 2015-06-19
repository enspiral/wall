<?php if($loginCheck){?>

<div  id="nav-group">
    <ul class="list-inline">
        <li><a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>">Page</a></li>
        <li><a href="<?php echo $base_url; ?>index.php?p=my_messages">Messages</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Announcements</a></li>
    </ul>
    
    <ul class="text-right menu-right">
        <li><a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=setting">Setting</a></li>
        <li><a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=help">Help</a></li>
    </ul>
    
</div>
<?php } ?>