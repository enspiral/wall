<div class="leftBlock">
<div style="position:relative">
<img src='<?php echo $group_finalpic;  ?>' />
</div>
<div id='count_block'>
<div class='count_inner'>
<a href='<?php echo $base_url."/group.php?gid=".$group_id; ?>'><b id='update_count'><?php echo $group_count; ?></b><br/>
<span class='small_text_upper'>Updates</span>
</a>
</div>
<div class='count_inner count_inner_margin'>
<a href='<?php echo $base_url.'friends/'.$username; ?>'><b><?php echo $group_count ?></b><br/>
<span class='small_text_upper'>Friends</span></a>
</div>
</div>
</div>