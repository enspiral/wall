<!-- Popup Window start -->
<div id="popup_window_program" class="popup_window_css">
    <div class="popup_window_css_head">
        <img src="<?php echo $base_url.'wall_icons/close.png'; ?>" alt="" width="9" height="9" />Program/Plan
        
    </div>
    <div class="popup_window_css_body">
    <form method="post" action="">
        <textarea name="para_program" style="width:100%; height:150px;"><?php echo $program; ?></textarea>
        <input type="submit" class="wallbutton" name="submit_para_program" value="Save" />
        <input type="submit" class="wallbutton" name="submit_para_program" value="Cancel" />
    </form>
    </div>
</div>
<!-- End popup -->