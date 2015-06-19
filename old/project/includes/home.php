
<style>
    .list-keyword .bootstrap-tagsinput{
        width:100% !important;
        border-radius: 0px;
    }
</style>

<script type="text/javascript">

function htmlEscape(str) {
return String(str)
.replace(/&/g, '&amp;')
.replace(/"/g, '&quot;')
.replace(/'/g, '&#39;')
.replace(/</g, '&lt;')
.replace(/>/g, '&gt;');
}

function list_more(dataString)
{
$.ajax({
type: "POST",
url: "<?php echo $base_url;?>conversation_more_ajax.php",
data: dataString,
cache: false,
success: function(html){

if($.trim(html).length>0)
{
$("#replylist_content").append(html);
}
else
{
$("#replylist_content").removeClass('conversation_grid').addClass('conversation_grid_block');
}

}
});
}

function list_more_reply(dataString)
{
$.ajax({
type: "POST",
url: "<?php echo $base_url;?>conversationReply_more_ajax.php",
data: dataString,
cache: false,
success: function(html){
if($.trim(html).length>0)
{
$("#reply_content").prepend(html);
}
else
{
$("#reply_content").removeClass('conversationReply_grid').addClass('conversation_grid_blockk');
}

}
});
}
$(document).ready(function()
{

$("#searchinput").keyup(function()
{
var searchbox = $.trim($(this).val());
var rel = $(this).attr('rel');
var dataString = 'searchword='+ searchbox +'&type='+rel;

if(searchbox.length>0)
{

$.ajax({
type: "POST",
url: "<?php echo $base_url; ?>search_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false;
});

$("#notificationLink").click(function()
{

$("#notificationContainer").fadeToggle(300);
var URL='<?php echo $base_url; ?>notification_created_ajax.php';
$.ajax({
type: "POST",
url: URL,
cache: false,
success: function(html){
if(html)
{
$(".not_count").fadeOut('slow');
$("#notifications_container").html(html);
}
}
});

return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
$("#display").hide();
});

$(".noti_stbody").mouseup(function()
{
return false
});

$('#notifications').slimScroll({height: '380px'});
var notification_content_height = 380;
$('.notifications').scroll(function(eve){
var a=0;
var s=$(document).height() - notification_content_height;
if(s>128)
{
s=128;
}
if ($('.notifications').scrollTop() >= s){

var ID=$(".noti_stbody:last").attr("id");
var dataString = 'last_time='+ ID ;
if(a == 0){

$.ajax({
type: "POST",
url: "<?php echo $base_url;?>notifications_more_ajax.php",
data: dataString,
cache: false,
success: function(html){

if($.trim(html).length>46)
{
$("#notifications").append(html);
}
else
{
$("#notifications").append(html);
$("#notifications").removeClass('notifications');
}

}
});

a = 1;
}
}
});

$(".reply_sttext").livequery(function () { $(this).linkify({
target: "_blank"
}); });
$("#reply_content").animate({"scrollTop": $('#reply_content')[0].scrollHeight}, "slow");

var playlist_content_height = 616;
$('.conversation_grid').scroll(function(eve){
var a=0;
var s=$(document).height() - playlist_content_height;
if(s>128)
{
s=128;
}
if ($('.conversation_grid').scrollTop() >= s){

var ID=$(".conList:last").attr("rel");
var dataString = 'last_time='+ ID ;
if(a == 0){
list_more(dataString);
a = 1;
}

}
});


var playlist_contentReply_height = 470;

$('.conversationReply_grid').scroll(function(eve){
var a=0;
var s=$(document).height() - playlist_contentReply_height;

if ($('.conversationReply_grid').scrollTop() == 0){
var b=0;
var C_ID=$('#cid').val();
var ID=$(".reply_stbody:first").attr("id");
var sid=ID.split("stbody");
var New_ID=sid[1];
var dataString = 'last_time='+ New_ID +'&c_id='+C_ID;
console.log(dataString);

if(b == 0){
list_more_reply(dataString,C_ID);
b = 1;
}


}

});

$('#replylist_content').slimScroll({
height: playlist_content_height+'px'
});

$('#reply_content').slimScroll({
height: '440px'
});

$("span.timeago").livequery(function () { $(this).timeago(); });

$('body').on("click",".reply_button",function(){
var A=$('#update').val();
var B=$('#cid').val();

var dataString = 'reply='+ A +'&cid='+B;
if($.trim(A).length>0)
{
$.ajax({
type: "POST",
url: "<?php echo $base_url; ?>conversation_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#flash").html('<img src="wall_icons/ajaxloader.gif"  />'); },
success: function(html)
{
if(html)
{
//var B=$('#cid').val();

if(A.length > 20)
{
A = A.substring(0,17);
A+='...';
}

$('#reply'+B).html("<img src='<?php echo $base_url; ?>wall_icons/send.png'  class='con_send'/>"+htmlEscape(A));
$('#reply_content').append(html);
$("#reply_content").animate({"scrollTop": $('#reply_content')[0].scrollHeight}, "slow");
$('#flash').hide();
$('#update').val('');
$('#update').focus();

}
else
{

}
}
});
}
return false;

});

// delete update
$('body').on('click','.reply_stdelete',function()
{
var ID = $(this).attr("id");
//var X=$(this).attr("my");
var dataString = 'c_id='+ ID ;
jConfirm("Sure you want to delete this conversation? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: "<?php echo $base_url; ?>conversation_delete_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){ $("#stbody"+ID).animate({'backgroundColor':'#f2f2f2'},300);},
success: function(html){
window.location='<?php echo $base_url; ?>messages.php';
}
});


} });



return false;
});
});
</script>

<script type="text/javascript">
    $(document).ready( function() {
          $(".announcementEditor").Editor(); 
                
//        $('#submit-editor-1').click(function(){
//            document.getElementById("volunteer_one").value += $("#editor-1 .Editor-editor").html();
//        });
       
        
    });
  </script>


<!-- Popup window -->
<?php
include 'popup_introduction.php';
include 'popup_languages.php';
include 'popup_proj_location.php';


$query = mysqli_query($db, "SELECT com_id FROM projects WHERE group_id = '$groupID'");
    foreach ($query as $value) {
        $com_id = $value['com_id'];
    }
    $ben = mysqli_query($db, "SELECT * FROM community WHERE com_id = '$com_id'");
    foreach ($ben as $data) {
        $title          = $data['com_title'];
        $img            = $data['com_img'];
        $description    = $data['com_desc'];
        $pro_sanitation = $data['sanitation'];
        $accomodation   = $data['accomodation'];
        $manpower       = $data['manpower'];
        $recreation     = $data['recreation'];
        $education      = $data['education'];
        $donation       = $data['donation'];
    }
/*    Var_dump("GroupID:".$groupID);
    Var_dump("comID:".$com_id);
    Var_dump("proID:".$proj_id);
*/
?>

<div id="content-project" class="row home">
    <div class="col-lg-8">
       
            <div class="text">
                <p class="text-orange text-title">Introduction</p>

                 <?php if (strlen($proj_intro) > 0) { 
                            echo '<p>'.$proj_intro.'</p>';
                        }else{
                            echo "No update!";
                        }
                if ($group_owner_id == $uid) { ?>
                <p class="text-right"><a href="" data-toggle="modal" data-target="#edit_introd"><i class="glyphicon glyphicon-edit custom-edit-intro"></i></a></p><?php } ?>
            </div>
            
        <!-- Popup Edit Introduction -->
        <div class="modal fade" id="edit_introd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Introduction</h4>
              </div>
              <div class="modal-body">
                
               
                  <textarea name="p1_intro" style="width:100%; height:150px;"><?php echo $proj_intro; ?></textarea>
                  <!--
                  <input type="submit" class="wallbutton" name="submit_proj_intro" value="Save" />
                   onClick="$('#popup_window_id_1').hide(); window.location.reload();" 
                  <input type="submit" class="wallbutton" name="cancel_proj_intro" value="Cancel" />-->
              
                
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_proj_intro" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
            
       
        <div class="div-new-feed text row">
            <div><p class="text-orange text-title">Announcements (<?php echo count($announcement); ?>)
                    &nbsp;&nbsp;<?php if ($loginCheck) { ?>
                    <span class="text-right">
                        <a href="" data-toggle="modal" data-target="#add_anountment">
                            <i><img src="images/addition.png"></i>
                        </a>
                    </span>             
            <?php } ?>
            </div>
                 
            <p class="text-primary text-see-all"><a href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=all_announcement">See All</a></p>

            <?php
            if ($announcement) {
                ?>
                <?php
                $data = $Wall->get_latest_Announcement($group_id, $uid);
                // var_dump($data);
                 foreach ($data as $value) {
					$mid = $value['msg_id'];
                    echo $mid;
                    $uploads = $value['uploads'];
                    //echo $uploads;
                    $message_text = $value['message'];
                    $time = $value['created'];
                    $mtime = date("d-m-Y", $time);

                    if ($uploads) {
                        $s = explode(",", $uploads);
                        $i = 1;
                        $f = count($s);
                        // echo $f.'This is the project';
                        foreach ($s as $a) {
                            $newdata = $Wall->Get_Upload_Image_Id($a);
                          //  var_dump($newdata).'Saorin Phan';
                            if ($newdata) {
                                $final_image = $base_url . $upload_path . $newdata['image_path'];
                            }
                            $i = $i + 1;
                            echo "Hello";
                        }

                    }else{
                        echo "not uploads";
                    }

            if($announcement){
                echo '<ul class="bxslider-one-annonement">';
                foreach($announcement as $data)
                   {
                  
                   echo '<li style="text-align:center;">';
                   include("announcement_slide.php");
                   echo '</li>';
                   }
                   echo '</li>';
           }
                }
                ?>
               
                <ul class="bxslider-one-annonement">
                    <li style="text-align:center;">
                        <div class="row time-line">
                            <a href="<?php echo $base_url.'status/'.$mid; ?>">
                                 <div class="img-timeline">
                                    <!-- hell world saorin -->
                                     <?php if($announcement){ ?>
                                     <img class="img-responsive" src="<?php echo $final_image; ?>" />
                                     <?php } ?>
                                </div>
                                 <div class="div-opacity">
                                    <i class="text-content-slide"><?php echo substr($message_text, 0, 50); ?><br/>
                                    <?php echo $mtime; ?></i>
                                    <p class="text-comment">comment</p>
                                </div>
                             </a>
                        </div>
                    </li>
                    <li style="text-align:center;"><div id="project-one"><img src="images/Raffles.jpg" width="200" height="180"/><h4 class="text-project-library">Rainwater</h4></div></li>
                                       
                 </ul>


                <?php
                // get the latest announment.........
                $data2 = $Wall->get_second_Announcement($group_id, $uid);
                foreach ($data2 as $value2) {
                	$mid2 = $value2['msg_id'];
                    $uploads2 = $value2['uploads'];
                    $title2 = $value2['message'];
                    $time2 = $value2['created'];
                    $mtime2 = date("d-m-Y", $time2);
                }
                if ($uploads2) {
                    $s2 = explode(",", $uploads2);
                    $i2 = 1;
                    $f2 = count($s2);
                    foreach ($s2 as $a2) {
                        $newdata2 = $Wall->Get_Upload_Image_Id($a2);
                        if ($newdata2) {
                            $final_image2 = $base_url . $upload_path . $newdata2['image_path'];
                        }
                        $i = $i + 1;
                    }
                }
                ?>
                
                    <?php
                
            } else {
                echo "No Annoucenment Found!";
            }
            ?>
        </div>
        <div class="col-lg-12 text">
            <p class="text-orange text-title">Team (<?php echo count($memberslist); ?>)</p> 
            <p class="text-primary text-see-all"><a href="<?php echo $base_url . 'group.php?gid=' . $groupID . '&ptab=team'; ?>">See all</a></p>

            <div class="profile">
                <?php
                if ($memberslist) {
                    $count = 1;
                    foreach ($memberslist as $f) {
                        $fid = $f['uid'];
                        $fname = $f['username'];
                        $friend_face = $Wall->User_Profilepic($fid, $base_url, $upload_path);
                        echo '<a href="' . $base_url . 'index.php?p=each_profile_user&profile_id=' . $fid . '" ><img src="' . $friend_face . '" original-title="' . $Wall->UserFullName($fname) . '" ></a>';

                        if ($count++ == 8)
                            break;
                    }
                }
                ?>
            </div>
        </div>
        <div class="col-lg-12 text">
            <p class="text-orange text-title">Project Keywords</p>

            <div class="list-keyword">
                <ul class="">
                    <li>
                        <p>Languages
                        <?php if ($group_owner_id == $uid) { ?>
                            <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_language"><i class="glyphicon glyphicon-edit"></i></a></span>

                        </p> 
                        <div class="modal fade" id="edit_language" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="exampleModalLabel">Edit Languages</h4>
                                        </div>
                                        <div class="modal-body">
                                                <p>Languages:</p>
                                                <input type="text" name='proj_lang' class="form-control" data-role="tagsinput" style="width:100% !important; border-radius: 0px; margin-bottom:10px;" value="<?php echo $proj_lang; ?>" required=""/><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <input type="submit" class="btn btn-primary" name="submit_proj_lang" value="Save" />
                                        </div>
                                    </form>
                                    <!-- End popup -->
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                        <?php $array_lang = explode(',', $proj_lang); ?>
                        <p class="text-primary">
                            <?php
                            if ($array_lang) {
                                $count = 1;
                                foreach ($array_lang as $f) {
                                    $p_lang = $f;

                                    echo '<a href="" >' . $p_lang . '</a>';
                                    if ($count < count($array_lang)) {
                                        echo ", ";
                                    }
                                    if ($count++ == 5)
                                        break;
                                }
                            }
                            ?>

                        </p>
                    </li>
                    <li>
                        <p>Area of Focus</p>
                        <p class="text-primary">
                            <?php
                            if ($area_of_focus) {
                                $count = 1;
                                foreach ($area_of_focus as $f) {
                                    $focus_kw = $f['one_tag'];
                                    echo '<a href="" >' . $focus_kw . '</a>';
                                    if ($count++ == 5)
                                        break;
                                    if ($count == count($focus_kw))
                                        break;
                                    echo ", ";
                                }
                            }
                            ?>
                        </p>
                    </li>
                    <li>
                        <p>Beneficiary</p>
                        <p class="text-primary"><a href="">Orphange</a>,<a href="">Orphan Care</a>,<a href="">Residentail</a>,<a href="">Children</a>,<a href="">Home</a></p>
                    </li>
                </ul>
            </div>
            <?php //if ($loginCheck) { ?><!--p class="text-right"><a href=""><i class="glyphicon glyphicon-edit"></i> edit keywords</a></p--><?php //} ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="text">
            <p><span class="text-orange text-title">Project Details
             <?php if ($group_owner_id == $uid) { ?>
                    <a href="" data-toggle="modal" data-target="#edit_date"><i class="glyphicon glyphicon-edit"></i></a></span>
            <?php  }?>
            </p> 
            <p><i class="glyphicon glyphicon-calendar text-primary"></i><span> <?php echo "Started Date: ".$proj_start_date . '<br />'; ?></span></p>
            <p><i class="glyphicon glyphicon-calendar text-primary"></i><span> <?php echo "Ended Date: ".$proj_end_date; ?></span></p>
            
             <!-- Popup Edit Date  -->
        <div class="modal fade" id="edit_date" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Project's Dates</h4>
              </div>
              <div class="modal-body">
                   Start Date: <input class="date-picker" id="p-start-date" type="text" name="p_start_date" value='<?php echo $proj_start_date; ?>' />
                   <label for="p-start-date" class="add-on"><i class="glyphicon glyphicon-calendar"></i></label>
                   End Date: <input class="date-picker" id="p-end-date" type="text" name='p_end_date' value="<?php echo $proj_end_date; ?>" />
                   <label for="p-end-date" class="add-on"><i class="glyphicon glyphicon-calendar"></i></label>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_proj_dates" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Popup Edit Date -->    
            
            <hr>
            <p><span class="text-orange text-title">Project Location:</span> <?php echo $com_location; ?>
		            		<?php if ($loginCheck) {?>
		            			&nbsp;<a href="" data-toggle="modal" data-target="#edit_proj_location">
		            			<!--<i class="glyphicon glyphicon-pencil text-primary"></i>--></a> 
		                		<?php } ?> <!--<br>community location in <?php echo $com_location; ?>--></p>
	    <hr> 
         
           <p class="text-orange text-title">Contact informaton:
                        <?php if ($group_owner_id == $uid) { ?>
                            <span class="text-right"><a href="" data-toggle="modal" data-target="#edit_contact"><i class="glyphicon glyphicon-edit"></i></a></span>
                            <?php  }?>
                        </p> 
              <?php if (strlen($contact_email) > 0) { 
                            echo '<p>'.$contact_email.'</p>';
                        }else{
                            echo "No update!";
                        } ?>
              
           
             <!-- Popup Edit Email  -->
        <div class="modal fade" id="edit_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Contact Information</h4>
              </div>
              <div class="modal-body">
                  <textarea name="p1_email" class="text-editor" style="width:540px; height:200px;"><?php echo $contact_email; ?></textarea>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_proj_email" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
          <!-- End Popup Edit Email -->   

        </div>
        <div class="text">
            <p class="text-orange text-title">Organizations Affiliated</p>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img width="150px" height="auto" class="media-object img-responsive" src="<?php echo $base_url; ?>/images/nus-logo.png" alt="">
                    </a>
                </div>
                <div class="media-body">
                    <?php // if ($loginCheck) { ?>
                        <!-- <a href=""><p class="text-right right-icon text-danger"><i class="glyphicon glyphicon-remove"></i></p></a> -->
<?php // } ?>
                    National University of Singapore
                </div>
            </div>
            <?php // if ($loginCheck) { ?>
                <!--<p class="text-right"><a href=""><button class="btn btn-primary btn-xs">edit post</button></a></p> -->
<?php //} ?>
        </div>
        <div class="text">
            <p class="text-orange text-title"><?php echo $title; ?></p>
            <div>
                <img class="img-responsive" src="<?php echo $base_url.'uploads/'.$img; ?>"/>
            </div><br/>
             <p><?php echo $description; ?></p>
<!--            <button class="btn btn-xs btn-orp">orphanage</button>-->
<!--            <table>
                <tr>
                    <td>Sanitation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $pro_sanitation; ?>%;">
                              <?php //echo $pro_sanitation; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Accomodation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $accomodation; ?>%;">
                              <?php //echo $accomodation; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Manpower</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $manpower; ?>%;">
                              <?php //echo $manpower; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Recreation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $recreation; ?>%;">
                              <?php //echo $recreation; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Education</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $education; ?>%;">
                              <?php //echo $education; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Donation</td>
                    <td class="td-progress-bar"> 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $donation; ?>%;">
                              <?php //echo $donation; ?>%
                            </div>
                        </div>
                    </td>
                </tr>
            </table>-->
        </div>
        
    </div>
</div>

<div class="modal fade" id="add_anountment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New Announcement </h4>
            </div>
            <div class="modal-body">      
                <?php
                if ($_SESSION['uid'] == $uid || $home) {
                    ?>
                    <div id="updateboxarea" data-step="1" data-intro="You can upload status.">
                        <b id="what">What's up <?php echo $Wall->UserFullName($session_username) . '?'; ?></b><br/>
                        <input type="text" name="ann_title" style="wdith:540;" placeholder="Title"><br/>
                        <textarea name="update_editer" class="announcementEditor" id="update_editer"  style="width:540px; height:200px;"></textarea>
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
                                    <img src='<?php echo $base_url; ?>wall_icons/ajaxloader.gif'/> Uploading please wait ....
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
                                
                            </span>
                            <a href="javascript:void(0);" id="camera" title="Upload Image"></a>
                            <!--<a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"></a>  -->
                        </div>

                    </div>

                    <div id='flashmessage'>
                        <div id="flash" align="left"  ></div>
                    </div>

                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary update_button1" name="" value="Save" />
            </div>
        </div>
    </div>
</div>

<script>
     $("#p-start-date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#p-end-date').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#p-end-date').datepicker('setStartDate', null);
    });

    $("#p-end-date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('#p-start-date').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('#p-end-date').datepicker('setEndDate', null);
    });
    
    /* Status update focus */
    $("#update").focus();


    //  $(".update_button11").click(function(){
    //    // alert("Hello world");
    //     $("#update").jqte();
    //     // alert($("update").html());
    // });

    /* Update Status */
    $(".update_button1").click(function(){
        var updateval = $("#update_editer").val();
        var group_id = $("#group_id").val();
        var up=$("#uploadvalues").val();
        if(up){
            var uploadvalues=$("#uploadvalues").val();
        }else{
            var uploadvalues=$(".preview:last").attr('id');
        }

            var X=$('.preview').attr('id');
            var Y=$('.webcam_preview').attr('id');
        if(X){
            var Z= X+','+uploadvalues;
        }else if(Y){
            var Z= uploadvalues;
        }else{
            var Z=0;
        }
        var dataString = 'annountment='+ updateval +'&uploads='+Z+'&group_id='+group_id;
        if($.trim(updateval).length==0){
            alert("Please Enter Some Text");
        }else{
            $("#flash").show();
            $("#flash").fadeIn(400).html('Loading Update...');
            $.ajax({
                type: "POST",
                url: $.base_url+"message_ajax.php",
                data: dataString,
                cache: false,
                success: function(html){
                    location.reload();
                    $("#webcam_container").slideUp('fast');
                    $("#flash").fadeOut('slow');
                    $("#content").prepend(html);
                    $("#update").val('').focus().css("height", "40px");
                    $('#preview').html('');
                    $('#webcam_preview').html('');
                    $('#uploadvalues').val('');
                    $('#photoimg').val('');
                    var c=$('#update_count').html();
                    $('#update_count').html(parseInt(c)+1);
                }
            });
            $("#preview").html();
            $('#imageupload').slideUp('fast');
        }
        return false;   
    });
</script>
<!-- jQuery library (served from Google) -->

<script src="js/search_slide/1.8.2-jquery.min.js"></script>

<!-- bxSlider Javascript file -->
<script src="js/search_slide/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="css/search_slide/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
  $('.bxslider-one-annonement').bxSlider({
    minSlides: 1,
  maxSlides: 1,
  slideWidth: 553,
  slideMargin: 10
});

</script>