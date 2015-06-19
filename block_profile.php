<div class="leftBlock" id="profile">
<div id="bigFace" data-step="4" data-intro="Upload a profile picture.">
<?php if($uid){?>
<form id="bigprofileimageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url;?>image_upload_ajax.php'>
<div  class="uploadFile timelineUploadImgBig">
<input type="file"  name="photoimg" id="bigprofilephotoimg" class=" custom-file-input" original-title="Upload Profile Picture">
</div>
<input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
<input type='hidden' name="imageType" value='1'/>
</form>
<?php } ?>

<img src='<?php echo $profileface;  ?>' id="profileBigFace" />
</div>
<!--<div id="aboutMeText"><?php //echo $session_bio; ?></div>-->
<div id='count_block'>
<div class='count_inner'>
<a href='<?php echo $base_url.'other_dashboard.php?username='.$username; ?>'><b id='update_count'><?php echo $session_update_count; ?></b><br/>
<span class='small_text_upper'>Updates</span>
</a>
</div>
<div class='count_inner count_inner_margin'>
<a href='<?php echo $base_url.'friends/'.$username; ?>'><b><?php echo $session_friend_count ?></b><br/>
<span class='small_text_upper'>Friends</span></a>
</div>
</div>
</div>
