<!-- Popup Window start -->
<div id="popup_window_language" class="popup_window_css">
    <div class="popup_window_css_head">
        <img src="<?php echo $base_url.'wall_cons/close.png'; ?>" alt="" width="9" height="9"/>
    </div>
    <div class="popup_window_css_body">
    <form method="post" action="">
        <p>Languages:</p>
        <input type="text" name='proj_lang' class="proj_lang" data-role="tagsinput" style="margin-bottom:10px;" value="<?php echo $proj_lang; ?>" required=""/><br>
        <input type="submit" class="wallbutton" name="submit_proj_lang" value="Save" />
        <input type="submit" class="wallbutton" name="cancel_proj_lang" value="Cancel" />
    </form>
    </div>
</div>
<!-- End popup -->

<script>
    $("input.proj_lang").val();
    $("input.proj_lang").tagsinput('items');
</script>