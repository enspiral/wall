<?php
    $query = mysqli_query($db, "SELECT DISTINCT users.uid as uid,CONCAT(first_name,' ',last_name) as name,username as username,project_involvement.id as invole_id, project_involvement.created as date_created FROM users INNER JOIN project_involvement ON  project_involvement.uid = users.uid AND group_id='$group_id' WHERE aprove=0 AND deleted = 0");
?>

<div id="content-project" class="member_request contents text">
    <div class="text">
        <p class="text-orange text-title">All Requests As a Member </p>
        <hr style="margin-top:-5px; margin-bottom:10px;">
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Full Name</th>
                    <th>Date Request</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i= 1;
                foreach ($query as $value) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><a href="<?php echo $base_url ?>index.php?p=each_profile_user&profile_id=<?php echo $value['uid']; ?>"><?php echo $value['name']; ?></a></td>
                    <td><?php echo $value['date_created']; ?></td>
                    <td><button id="<?php echo $value['invole_id']; ?>" name="btn_approve" class="btn btn-sm btn-success btn_approve">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;<button name="btn_deny" id="<?php echo $value['invole_id']; ?>" class="btn btn-sm btn-danger btn_deny">Deny</button></a></td>
                    
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $('.btn_approve').click(function(){
        var id = $(this).attr('id');
         $.ajax({
           type: "POST",
           url: "<?php echo $base_url; ?>project/ajax-project.php",
           data:{
               id : id,
               approve : 'approve',
           }, 
           success: function(data)
           {
              location.reload();
              //alert(data);
           },error:function(data){
               alert("Sorry, you have no permission to access this module.");
           }
         });

        return false;
    });
    
    
    $('.btn_deny').click(function(){
        var con = confirm('Do you want to delete this user ?');
        if (con){
            var id = $(this).attr('id');
            $.ajax({
                type: "POST",
                url: "<?php echo $base_url; ?>project/ajax-project.php",
                data:{
                    id : id,
                    deny : 'deny',
                }, 
                success: function(data)
                {
                   location.reload();
                   //alert(data);
                },error:function(data){
                    alert("Sorry, you have no permission to access this module.");
                }
            });
        }else {
            return false;
        }
    });
    
    
</script>