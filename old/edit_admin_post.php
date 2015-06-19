<h3 class="text-center text-pink">Edit CPS Admin Post </h3><br>

<div id="div-whole" align="center">  
   
        <table border="1">
            <tr>
                <td valign='top' class="text-center" width='50'>No </td>
                <td valign='top' class="text-center" width='600'>Content </td>
                <td valign='top' class="text-center" width='380'>Reference </td>
                <td valign='top' class="text-center" width='200'>Action </td>
            </tr>
            
             <?php if($all_cps_admin_post){
            $count=1;
            foreach ($all_cps_admin_post as $res) {
                $slide_id = $res['id'];
                $slide_content = $res['content'];
                $slide_ref = $res['reference'];
                echo '<tr>';
                echo '<td valign="top" class="text-center" width="50">'.$count.'</td>';
                echo '<td valign="top" class="text-center" width="700">'.$slide_content.'</td>';
                echo '<td valign="top" class="text-center" width="380">'.$slide_ref.'</td>';
                echo '<td valign="top" class="text-center" width="120"><a href="'.$base_url.'edit_page.php?admin_post_id='.$slide_id.'">Edit</a>,&nbsp; <a href="#" onclick="deleteAdminPost('.$slide_id.')">Delete</a> </td>';
                echo '</tr>';
                $count++;
            }
        } ?>
        </table>
    </div>

    <?php 
    if ($uid) { ?>
     <a href="" data-toggle="modal" data-target="#add_new_admin_post">Add new</a>
     <?php  }?>
                        
        <!-- Add new post  -->
        <div class="modal fade" id="add_new_admin_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add New CPS Admin Post</h4>
              </div>
              <div class="modal-body">
                  
                  Content: <textarea name="new_admin_post_content" style="width:100%; height:150px;"></textarea>
                  Reference: <input type="text" name='new_admin_post_reference' style="width:100%;" required=""/>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_add_new_admin_post" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Add new post -->   
<script>
    function deleteAdminPost(id)
        {
            var ID = id;
            var dataString = 'admin_post_id='+ ID;
            var URL=$.base_url+'cps_admin_post_delete_ajax.php';
            jConfirm("Sure you want to delete this Post? There is NO undo!", '',
            function(r)
            {
            if(r==true)
            {
            $.ajax({
                type: "POST",
                url: URL,
                data: dataString,
                cache: false,
                success: function(html){
                    location.href=$.base_url+'edit_cps_admin_post.php';
                }
                });
                } });
                return false;
        }
</script>