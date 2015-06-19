<h3 class="text-center text-pink">Edit Your Post </h3><br>

<div id="div-whole" align="center">  
   
    <form method="post" action="">
        <table>
          
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td>
                    <textarea name="post_content" required="" style="width:400px; height:200px; margin-bottom:10px;"><?php echo $post_content; ?></textarea>
                </td>
            </tr>
              <tr>
                <td valign='top' class="text-left">Reference: </td>
                <td><input type="text" name='post_reference' style="width:400px;" value="<?php echo $post_reference; ?>"required=""/>
                </td>
            </tr>
            
        </table>
        <input type="hidden" name="post_id" value="<?php echo $edit_post_id; ?>">
        <input type="submit" class="wallbutton" name="save_edit_post" value="Save" />
        <input type="button" class="wallbutton" value="Cancel" onclick="location.href='<?php echo $base_url."edit_dashboard_post.php"; ?>';" />
    </form>

</div>
