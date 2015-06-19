<!--<style>
    .bootstrap-tagsinput {
         width: 300px !important;
    }
    
</style>-->
<!-- Popup Window start -->
<div id="popup_window_new_social_need" class="popup_window_css">
    <div class="popup_window_css_head"><img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9" />New Social Need</div>
    <div class="popup_window_css_body" style="height:250px;">
    <form method="post" action="">
        <table>
            <tr>
                <td valign='top' class="text-left">Title:</td>
                <td><input type="text" name='social_need_title' style="margin-bottom:10px;" required=""/></td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Content:</td>
                <td><textarea name="new_social_need" required="" style="width:80%; height:100px;"></textarea></td>
            </tr>
            <tr>
                <td valign='top' class="text-left">Keywords:</td>
                <td><input type="text" name='social_need_keywords' class="social_need_kw" data-role="tagsinput" style="margin-bottom:10px;" required=""/></td>
            </tr>
        </table>
        
        <input type="submit" class="wallbutton" name="submit_proj_social_need" value="Save" />
        <input type="reset" class="wallbutton" name="cancel_proj_social_need" value="Reset" />
    </form>
    </div>
</div>
<script>
    $("input.social_need_kw").val();
    $("input.social_need_kw").tagsinput('items');
</script>
<!-- End popup -->