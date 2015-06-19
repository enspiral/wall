<!-- Popup Window start -->
<div id="popup_window_new_social_need" class="popup_window_css">
    <div class="popup_window_css_head"><img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9" />New Outcome</div>
    <div class="popup_window_css_body" style="height:250px;">
    <form method="post" action="">
        <table>
            <tr>
                <td valign='top' class="text-left">Title:</td>
                <td><input type="text" name='outcome_title' style="margin-bottom:10px;" required=""/></td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td><textarea name="new_outcome" required="" style="width:80%; height:100px;"></textarea></td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Keywords:</td>
                <td><input type="text" name='outcome_keywords' class="outcome_kw" data-role="tagsinput" style="margin-bottom:10px;" required=""/></td>
            </tr>
        </table>
        
        <input type="submit" class="wallbutton" name="submit_proj_outcome" value="Save" />
        <input type="reset" class="wallbutton" name="cancel_proj_outcome" value="Reset" />
    </form>
    </div>
</div>
<script>
    $("input.outcome_kw").val();
    $("input.outcome_kw").tagsinput('items');
</script>
<!-- End popup -->