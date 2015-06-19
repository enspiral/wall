<!-- Popup Window start -->
<div id="popup_window_1" class="popup_window_css">
    <div class="popup_window_css_head">
        <img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9"/>Introduction
    </div>
    <div class="popup_window_css_body">
    <form method="post" action="">
        <textarea name="p1_intro" style="width:100%; height:150px;"><?php echo $proj_intro; ?></textarea>
        <input type="submit" class="wallbutton" name="submit_proj_intro" value="Save" />
        <!-- onClick="$('#popup_window_id_1').hide(); window.location.reload();" -->
        <input type="submit" class="wallbutton" name="cancel_proj_intro" value="Cancel" />
    </form>
    </div>
</div>
<!-- End popup -->