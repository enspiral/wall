
<!-- Timeline Header HTML -->
<div id="timelineContainer">
    <div  id="timelineBG" style="background-color:#d5d6d9;">
    <?php if ($group_bg != null){
        echo '<img src="'. $timelineBG. '"/>';
    }else{
      //  echo '<img src="'. $timelineBG .'"/>';
    }
    ?>
        <!--img src="<?php //echo $timelineBG ?>" style="margin-top: <?php //echo $position; ?>; width:978px; height:313px; "/-->
    </div>
    <div style="background:url(<?php echo $base_url;?>wall_icons/timeline_shade.png);" id="timelineShade">
    <?php if($loginCheck){?>
    <form id="bgimageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url; ?>image_upload_ajax.php'>
    <div class="uploadFile timelineUploadBG">
    <input type="file" name="photoimg" id="bgphotoimg" class="custom-file-input" original-title="Change Cover Picture"/>
    </div>
    <input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
    <input type='hidden' name="imageType" value='0'/>
    </form>
    <?php } ?>
    </div>
    <div id="timelineProfilePic">
    <?php if($loginCheck){?>
    <form id="profileimageform" method="post" enctype="multipart/form-data" action='<?php echo $base_url; ?>image_upload_ajax.php'>
    <div  class="uploadFile timelineUploadImg">
    <input type="file"  name="photoimg" id="profilephotoimg" class=" custom-file-input " original-title="Upload Profile Picture">
    </div>
    <input type='hidden' name="groupID" value='<?php echo $group_id; ?>'/>
    <input type='hidden' name="imageType" value='1'/>
    </form>
    <?php } ?>
    <img src="<?php echo $timeline_pic; ?>" id="timelineIMG" class="previousImage"/></div>
    <div id="timelineTitle"><?php echo $timeline_name;?>
    <?php if($verified){ ?>
    <span id="verified"></span>
    <?php } ?>
    </div>
</div>
<div class="background-opacity"></div>