<h3 class="text-center text-pink">Edit CPS Admin Post </h3><br>

<div id="div-whole" align="center">  
   
    <form method="post" action="">
        <table>
          
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td>
                    <textarea name="admin_post_content" required="" style="width:400px; height:200px; margin-bottom:10px;"><?php echo $admin_post_content; ?></textarea>
                </td>
            </tr>
              <tr>
                <td valign='top' class="text-left">Reference: </td>
                <td><input type="text" name='admin_post_reference' style="width:400px;" value="<?php echo $admin_post_reference; ?>"required=""/>
                </td>
            </tr>
            
        </table>
        <input type="hidden" name="admin_post_id" value="<?php echo $edit_admin_post_id; ?>">
        <input type="submit" class="wallbutton" name="save_edit_admin_post" value="Save" />
        <input type="button" class="wallbutton" value="Cancel" onclick="location.href='<?php echo $base_url."edit_dashboard_admin_post.php"; ?>';" />
    </form>

</div>
