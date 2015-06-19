<!-- Start Edit -->
<h3 class="text-center text-pink">Edit Learn and Teach Content <?php echo $edit_tl_id;?> </h3><br>

<div id="div-whole" align="center">  
   
    <form method="post" enctype='multipart/form-data' action="">
        <table>
            <tr>
                <td valign='top' class="text-left">Title: </td>
                <td><input type="text" name='tl_content_title' style="margin-bottom:10px;" value="<?php echo $edit_tl_title; ?>"required=""/>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">URL:</td>
                 <td><input type="url" name='tl_content_url' style="margin-bottom:10px;" value="<?php echo $edit_tl_url; ?>"required=""/>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Image:</td>
                <td><input type="file" name='tl_content_image' style="margin-bottom:10px;" required=""/></td>
            </tr>
        </table>
        <input type="hidden" name="tl_content_id" value="<?php echo  $edit_tl_id; ?>">
        <input type="submit" class="wallbutton" name="save_edit_tl_content" value="Save" />
        <input type="button" class="wallbutton" value="Cancel" onclick="location.href='<?php echo $base_url."index.php"; ?>';" />
    </form>

</div>

<!-- End Edit -->