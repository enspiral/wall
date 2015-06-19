<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$conversation_uid='';
if($_GET['message_username'])
{
$conversation_usr=$_GET['message_username'];
$Queryconversation=$Wall->User_ID($conversation_usr);
if($conversation)
{
$conversation_uid=$conversation;
if($conversation_uid!=$uid)
{
$top_c_id=$Wall->Conversation_Insert($uid,$conversation_uid);
}
else
{
$url=$base_url.'messages.php';
header("Location:Queryurl");
//echo "<script>window.location='Queryurl'</script>";

}

}
else
{
$url=$base_url.'404.php';
header("Location:Queryurl");
//echo "<script>window.location='Queryurl'</script>";
}

}

$face=$Wall->User_Profilepic($uid,$base_url,$upload_path);

?>
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">

<?php include_once 'project_title.php'; include_once 'js.php';
include('jslite.php'); ?>
<script>

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
Query.ajax({
type: "POST",
url: "<?php echo $base_url;?>conversation_more_ajax.php",
data: dataString,
cache: false,
success: function(html){

if(Query.trim(html).length>0)
{
Query("#replylist_content").append(html);
}
else
{
Query("#replylist_content").removeClass('conversation_grid').addClass('conversation_grid_block');
}

}
});
}

function list_more_reply(dataString)
{
Query.ajax({
type: "POST",
url: "<?php echo $base_url;?>conversationReply_more_ajax.php",
data: dataString,
cache: false,
success: function(html){
if(Query.trim(html).length>0)
{
Query("#reply_content").prepend(html);
}
else
{
Query("#reply_content").removeClass('conversationReply_grid').addClass('conversation_grid_blockk');
}

}
});
}
Query(document).ready(function()
{

Query("#searchinput").keyup(function()
{
var searchbox = Query.trim(Query(this).val());
var rel = Query(this).attr('rel');
var dataString = 'searchword='+ searchbox +'&type='+rel;

if(searchbox.length>0)
{

Query.ajax({
type: "POST",
url: "<?php echo $base_url; ?>search_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
Query("#display").html(html).show();
}
});
}return false;
});

Query("#notificationLink").click(function()
{

Query("#notificationContainer").fadeToggle(300);
var URL='<?php echo $base_url; ?>notification_created_ajax.php';
Query.ajax({
type: "POST",
url: URL,
cache: false,
success: function(html){
if(html)
{
Query(".not_count").fadeOut('slow');
Query("#notifications_container").html(html);
}
}
});

return false;
});

//Document Click
Query(document).click(function()
{
Query("#notificationContainer").hide();
});

Query(".noti_stbody").mouseup(function()
{
return false
});

Query('#notifications').slimScroll({height: '380px'});
var notification_content_height = 380;
Query('.notifications').scroll(function(eve){
var a=0;
var s=Query(document).height() - notification_content_height;
if(s>128)
{
s=128;
}
if (Query('.notifications').scrollTop() >= s){

var ID=Query(".noti_stbody:last").attr("id");
var dataString = 'last_time='+ ID ;
if(a == 0){

Query.ajax({
type: "POST",
url: "<?php echo $base_url;?>notifications_more_ajax.php",
data: dataString,
cache: false,
success: function(html){

if(Query.trim(html).length>46)
{
Query("#notifications").append(html);
}
else
{
Query("#notifications").append(html);
Query("#notifications").removeClass('notifications');
}

}
});

a = 1;
}
}
});

Query(".reply_sttext").livequery(function () { Query(this).linkify({
target: "_blank"
}); });
Query("#reply_content").animate({"scrollTop": Query('#reply_content')[0].scrollHeight}, "slow");

var playlist_content_height = 616;
Query('.conversation_grid').scroll(function(eve){
var a=0;
var s=Query(document).height() - playlist_content_height;
if(s>128)
{
s=128;
}
if (Query('.conversation_grid').scrollTop() >= s){

var ID=Query(".conList:last").attr("rel");
var dataString = 'last_time='+ ID ;
if(a == 0){
list_more(dataString);
a = 1;
}

}
});


var playlist_contentReply_height = 470;

Query('.conversationReply_grid').scroll(function(eve){
var a=0;
var s=Query(document).height() - playlist_contentReply_height;

if (Query('.conversationReply_grid').scrollTop() == 0){
var b=0;
var C_ID=Query('#cid').val();
var ID=Query(".reply_stbody:first").attr("id");
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

Query('#replylist_content').slimScroll({
height: playlist_content_height+'px'
});

Query('#reply_content').slimScroll({
height: '440px'
});

Query("span.timeago").livequery(function () { Query(this).timeago(); });

Query('body').on("click",".reply_button",function(){
var A=Query('#update').val();
var B=Query('#cid').val();

var dataString = 'reply='+ A +'&cid='+B;
if(Query.trim(A).length>0)
{
Query.ajax({
type: "POST",
url: "<?php echo Querybase_url; ?>conversation_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){Query("#flash").html('<img src="wall_icons/ajaxloader.gif"  />'); },
success: function(html)
{
if(html)
{
//var B=Query('#cid').val();

if(A.length > 20)
{
A = A.substring(0,17);
A+='...';
}

Query('#reply'+B).html("<img src='<?php echo Querybase_url; ?>wall_icons/send.png'  class='con_send'/>"+htmlEscape(A));
Query('#reply_content').append(html);
Query("#reply_content").animate({"scrollTop": Query('#reply_content')[0].scrollHeight}, "slow");
Query('#flash').hide();
Query('#update').val('');
Query('#update').focus();

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
Query('body').on('click','.reply_stdelete',function()
{
var ID = Query(this).attr("id");
//var X=Query(this).attr("my");
var dataString = 'c_id='+ ID ;
jConfirm("Sure you want to delete this conversation? There is NO undo!", '',
function(r)
{
if(r==true)
{
Query.ajax({
type: "POST",
url: "<?php echo Querybase_url; ?>conversation_delete_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){ Query("#stbody"+ID).animate({'backgroundColor':'#f2f2f2'},300);},
success: function(html){
window.location='<?php echo Querybase_url; ?>messages.php';
}
});


} });



return false;
});
});

</script>
<style type="text/css">
    #timelineNav .menu-main li:hover{
    border-bottom:5px solid white;
    background-color:#2AA9DE;
    padding-bottom: 3px;
}
</style>

</head>

<body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class="div-content">
                    
                    <div class="row">
                        <div class="col-lg-3 sidebar-left">
                            <div class="some-content-related-div">
                            <div id="replylist_content" class="conversation_grid">
                            <?php 
                           
                            if($conversation_uid)
                            {
                                include('conversation_load_single.php');
                            }
                            include('conversation_load.php');

                            ?>
                                </div>
                                </div>
                        </div>
                        <div class="col-lg-6 middle-content">
                            <div class="some-content-related-div">
                            <div id="reply_content" class='conversationReply_grid'>
                            <?php
                            include('html_conversationReply.php');
                            if(empty($Conversation_Updates)){
                            if($top_c_id)
                            {
                            $cu=$Wall->UserFullName($conversation_usr);
                            echo "<b>Start conversation with ".$cu."</b>";
                            }
                            else
                            {
                            echo "<div style='margin-top:10px'><b >No conversation selected.</b></div>";
                            }
                            }
                            ?>
                            </div>
                            </div>

                            <?php if($top_c_id) { ?>
                            <div id="replyboxarea">
                            <h5>Write a reply...</h5>
                            <input type="hidden" id="cid" value="<?php echo $top_c_id;?>">
                            <textarea name="update" id="update"  style="width:524px !important;"></textarea>
                            <input type="submit" value=" REPLY " id="update_button" class="reply_button wallbutton update_box"/>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-3 sidebar-right">
                            <?php include_once 'block_right.php'; ?>
                        </div>
                    </div>
                    
               
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
    
<!--<body>
<?php //include_once 'block_logo_menu.php'; ?>
<div id='main'>
<div id='main_left' class="message_left">
<div class="some-content-related-div">
<div id="replylist_content" class="conversation_grid">

<?php
//if(Queryconversation_uid)
//{
//include('conversation_load_single.php');
//}
//include('conversation_load.php'); ?>

</div>
</div>

</div>

<div id="main_right" class="message_right">
<div class="some-content-related-div">
<div id="reply_content" class='conversationReply_grid'>
<?php
//include('html_conversationReply.php');
//if(empty(QueryConversation_Updates)){
//if(Querytop_c_id)
//{
//Querycu=QueryWall->UserFullName(Queryconversation_usr);
//echo "<b>Start conversation with ".Querycu."</b>";
//}
//else
//{
//echo "<div style='margin-top:10px'><b >No conversation selected.</b></div>";
//}
//}
?>
</div>
</div>

<?php //if(Querytop_c_id) { ?>
<div id="replyboxarea">
<h5>Write a reply...</h5>
<input type="hidden" id="cid" value="<?php //echo Querytop_c_id;?>">
<textarea name="update" id="update"  style="width:524px !important;"></textarea>
<input type="submit" value=" REPLY " id="update_button" class="reply_button wallbutton update_box"/>
</div>
<?php //} ?>
</div>

<?php //include_once 'block_footer.php';?>
</div>
</body>-->
</html>
