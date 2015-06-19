<div id="updateboxarea" data-step="1" data-intro="You can upload status.">
<b id="what">What's up <?php echo $group_name_wall.'?';?></b>

<textarea name="update" id="update"  ></textarea>
<br />
<div id="webcam_container" class='border'>
<div id="webcam" >
</div>
<div id="webcam_preview">

</div>

<div id='webcam_status'></div>
<div id='webcam_takesnap'>

<input type="button" value=" Take Snap " onclick="return takeSnap();" class="camclick  wallbutton"/>
<input type="hidden" id="webcam_count" />
</div>
</div>
<div  id="imageupload" class="border">
<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url; ?>message_image_ajax.php'>
<div id='preview'>
</div>
<div id='imageloadstatus'>
<img src='<?php echo $base_url;?>wall_icons/ajaxloader.gif'/> Uploading please wait ....
</div>
<div id='imageloadbutton'>
<span id='addphoto'>Add Photo:</span> <input type="file" name="photos[]" id="photoimg" multiple="true"/>
</div>
<input type='hidden' id='uploadvalues' />
<input type='hidden' id='group_id' value="<?php echo $groupID; ?>" name="group_id"/>
</form>
</div>
<div id="updateIcon">
<span class="floatRight">
<input type="submit"  value=" Update "  id="update_button"  class="update_button wallbutton update_box"/>
</span>
<a href="javascript:void(0);" id="camera" title="Upload Image"></a>
<a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"></a>
</div>

</div>

<div id='flashmessage'>
<div id="flash" align="left"  ></div>
</div>
