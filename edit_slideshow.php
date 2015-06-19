<span><h2 class="text-center text-pink">Edit Your Slideshow Post </h2><br></span>
<span><a href="" data-toggle="modal" data-target="#add_new_post"><div class="btn btn-info" style="  float: right;margin-top: -65px;">Add new &nbsp;<i class="glyphicon glyphicon-plus"></i></div></a>
<div class="text" id="div-whole" align="center">  
   
        <table border="1" style="padding:20px;">
            <tr>
                <td valign='top' class="text-center" width='50'>No </td>
                <td valign='top' class="text-center" width='600'>Content </td>
                <td valign='top' class="text-center" width='380'>Reference </td>
                <td valign='top' class="text-center" width='200'>Action </td>
            </tr>
             <?php if($all_dashboard_slideshow_post){
            $count=1;
            foreach ($all_dashboard_slideshow_post as $res) {
                $slide_id = $res['id'];
                $slide_content = $res['content'];
                $slide_ref = $res['reference'];
                echo '<tr>';
                echo '<td valign="top" style=" padding: 10px;" class="text-center"  width="50">'.$count.'</td>';
                echo '<td valign="top" style="text-align:justify;  padding: 10px;"  width="700">'.$slide_content.'</td>';
                echo '<td valign="top" style=" padding: 10px;" class="text-center width="380">'.$slide_ref.'</td>';
                echo '<td valign="top" style=" padding: 10px;" class="text-center width="120"><a href="'.$base_url.'edit_page.php?post_id='.$slide_id.'"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp; <a href="#" onclick="deleteDashboardPost('.$slide_id.')"><i class="glyphicon glyphicon-trash"></i></a> </td>';
                echo '</tr>';
                $count++;
            }
        } ?>
        </table>
    </div>

    <?php 
    if ($uid) { ?>
     <br>
     <br>
     <?php  }?>
                        
        <!-- Add new post  -->
        <div class="modal fade" id="add_new_post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Your Dashboard Post</h4>
              </div>
              <div class="modal-body">
                  
                  Content: <textarea name="new_post_content" style="width:100%; height:150px;"></textarea>
                  Reference: <input type="text" name='new_post_reference' style="width:100%;" required=""/>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_add_new_post" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Add new post -->   
<script>
    function deleteDashboardPost(id)
        {
            var ID = id;
            var dataString = 'post_id='+ ID;
            var URL=$.base_url+'dashboard_post_delete_ajax.php';
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
                    location.href=$.base_url+'edit_dashboard_post.php';
                }
                });
                } });
                return false;
        }
</script>