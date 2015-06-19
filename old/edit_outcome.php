<style>
    .bootstrap-tagsinput {
         width: 300px !important;
    }
    
</style>
<!-- Popup Window start -->


<h3 class="text-center text-pink">Edit Your Outcome </h3><br>

<div id="div-whole" align="center">  
   
    <form method="post" action="">
        <table>
            <tr>
                <td valign='top' class="text-left">Title: </td>
                <td id="test_id"><input type="text" name='outcome_title' style="margin-bottom:10px;" value="<?php echo $edit_outcome_title; ?>"required=""/>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td>
                    <textarea name="outcome_content" required="" style="width:400px; height:200px;"><?php echo $edit_outcome_content; ?></textarea>
                </td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Keywords:</td>
                <td><input type="text" name='outcome_keywords' class="outcome_kw" data-role="tagsinput" style="margin-bottom:10px;" value="<?php echo $edit_outcome_lang; ?>" required=""/></td>
            </tr>
        </table>
        <input type="hidden" name="outcome_pid" value="<?php echo $edit_outcome_pid; ?>">
        <input type="hidden" name="outcome_id" value="<?php echo $edit_outcome_id; ?>">
        <input type="submit" class="wallbutton" name="save_edit_outcome" value="Save" />
        <input type="button" class="wallbutton" value="Cancel" onclick="location.href='<?php echo $base_url."group.php?gid=".$edit_outcome_pid; ?>';" />
    </form>

</div>
<script>
    $("input.outcome_kw").val();
    $("input.outcome_kw").tagsinput('items');
</script>
<!-- End popup -->