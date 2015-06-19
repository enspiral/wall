<!-- Popup Window start -->
<div id="popup_window_outcome" class="popup_window_css">
    <div class="popup_window_css_head">
        <img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9"/>Outcome
    </div>
    <div class="popup_window_css_body">
    <form method="post" action="">
        <textarea name="para_outcome" style="width:100%; height:150px;"><?php echo $outcome; ?></textarea>
        <input type="submit" class="wallbutton" name="submit_para_outcome" value="Save" />
        <input type="submit" class="wallbutton" name="submit_para_outcome" value="Cancel" />
    </form>
    </div>
</div>
<!-- End popup -->