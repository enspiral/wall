<style>
    .bootstrap-tagsinput {
         width: 300px !important;
    }
    
</style>
<!-- Popup Window start -->


<h3 class="text-center text-pink">Edit Your Social Need </h3><br>

<div id="div-whole" align="center">  
   
    <form method="post" action="">
        <table>
            <tr>
                <td valign='top' class="text-left">Title: </td>
                <td id="test_id"><input type="text" name='social_need_title' style="margin-bottom:10px;" value="<?php echo $edit_sn_title; ?>"required=""/>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td>
                    <textarea name="social_need_content" required="" style="width:400px; height:200px;"><?php echo $edit_sn_content; ?></textarea>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Keywords:</td>
                <td><input type="text" name='social_need_keywords' class="social_need_kw" data-role="tagsinput" style="margin-bottom:10px;" value="<?php echo $edit_sn_lang; ?>" required=""/></td>
            </tr>
        </table>
        <input type="hidden" name="social_need_pid" value="<?php echo $edit_sn_pid; ?>">
        <input type="hidden" name="social_need_id" value="<?php echo $edit_sn_id; ?>">
        <input type="submit" class="wallbutton" name="save_edit_social_need" value="Save" />
        <input type="button" class="wallbutton" value="Cancel" onclick="location.href='<?php echo $base_url."group.php?gid=".$edit_sn_pid; ?>';" />
    </form>

</div>
<script>
    $("input.social_need_kw").val();
    $("input.social_need_kw").tagsinput('items');
</script>
<!-- End popup -->