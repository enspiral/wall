<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if(isset($_POST['save_edit_social_need']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $save_sn_title = $_POST['social_need_title'];
    $save_sn_content = $_POST['social_need_content'];
    $save_sn_keywords = $_POST['social_need_keywords'];
    $save_sn_id = $_POST['social_need_id'];
    $save_sn = $Wall->Update_Social_Need($save_sn_id, $save_sn_title, $save_sn_content,$save_sn_keywords);
    if($save_sn){
         header("Location:group.php?gid=".$_POST['social_need_pid']."&ptab=contents");
    }
}

?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
        
        <script>
    function ChangeToAdmin(id, gid)
        {
            var ID = id;
			var GID = gid;
            var dataString = 'uid='+ ID+'&gid='+GID;
           
		var URL = $.base_url+ 'promote_to_admin_ajax.php';
           	jConfirm("Sure you want to promote this member to be Admin?", '',
            function(r)
            {
            if(r==true)
            {
            $.ajax({
                type: "POST",
                url: URL,
                data: dataString,
                cache: false,
                dataType: "html",
                success: function(r){
					if(r){
                    	alert(r);
					}else{
						alert(r);
					}
					 location.href=$.base_url+'manage_team.php?gid='+GID;
                }
                });
                } });
                return false;
        }
</script>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class="div-content">
                    <?php
                          $group_id = $_GET['gid']; 
						  $friendslist=$Wall->Group_Followers($group_id,'', '', 35);               
                    ?>
                    <!-- Content -->
                    
                    <h3 class="text-center text-pink">Manage Team </h3><br>

					<div id="div-whole" align="center">  
   
                    <table border="1">
                        <tr>
                            <td valign='top' class="text-center" width='50'>No </td>
                            <td valign='top' class="text-center" width='300'>Name </td>
                            <td valign='top' class="text-center" width='380'>Email </td>
                            <td valign='top' class="text-center" width='250'>Role </td>
                            <td valign='top' class="text-center" width='250'>Action </td>
                        </tr>
                        
                         <?php 
						 if($friendslist){
                        	$count=1;
                        foreach ($friendslist as $res) {
							$member_id=$res['uid'];
            				$member_name=ucfirst($res['username']);
            				$member_email = $res['email'];
            				$role_id = $res['role'];
                            if($role_id>0){
								$role = "Admin";
							}else{
								$role = "Member";
							}
                            echo '<tr>';
                            echo '<td valign="top" class="text-center" width="50">'.$count.'</td>';
                            echo '<td valign="top" class="text-center" width="300">'.$member_name.'</td>';
                            echo '<td valign="top" class="text-center" width="380">'.$member_email.'</td>';
							echo '<td valign="top" class="text-center" width="250">'.$role.'</td>';
							if($role_id==0){
								echo '<td valign="top" class="text-center" width="250"><a href="#" onclick="ChangeToAdmin('.$member_id.','.$group_id.');">Promote to be Admin</a> </td>';
							}else{
								echo '<td valign="top" class="text-center" width="250"></td>';
							}echo '</tr>';
                            $count++;
                        }
                    } 
					?>
                    </table>
                </div>
                    <!-- End of Content -->
                    
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>

