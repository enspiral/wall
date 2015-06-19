<div class="container">

    <div class="sidebar-left">
        <?php include_once 'block_left_dashboard.php'; ?>
    </div>
    <div class="middle-content text">
        <h4>Please Chose your community</h4><hr/>
        <?php
            $data_com = mysqli_query($db, "SELECT groups.group_id as group_id,groups.group_name as com_name, groups.group_pic as picture,community.com_desc as description FROM groups INNER JOIN users on groups.uid_fk = uid inner join community on groups.group_id = community.group_id where groups.uid_fk = '$uid'");
            if(mysqli_num_rows($data_com)>0){
                foreach ($data_com as $data) { 
            ?>
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <img width="200px" src="<?php echo $base_url; ?>uploads/<?php echo $data['picture']; ?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <a href="<?php echo $base_url; ?>community.php?gid=<?php echo $data['group_id']; ?>"><h4><?php echo $data['com_name']; ?></h4></a>
                        <p><?php echo $data['description']; ?></p>
                    </div>
                </div>
                <?php 

                } 
            }else{
                echo "<h5>You do not have community yet</h5>";
            }
            ?>
    </div>
    <div class="sidebar-right-dabshoard">
        <?php include_once 'block_right.php'; ?>

    </div>
</div>