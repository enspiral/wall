/**************************
* Srinivas Tamada http://9lessons.info
* wall.js
 __          __   _ _    _____           _       _     ______
 \ \        / /  | | |  / ____|         (_)     | |   |____  |
  \ \  /\  / /_ _| | | | (___   ___ _ __ _ _ __ | |_      / /
   \ \/  \/ / _` | | |  \___ \ / __| '__| | '_ \| __|    / /
    \  /\  / (_| | | |  ____) | (__| |  | | |_) | |_    / /
     \/  \/ \__,_|_|_| |_____/ \___|_|  |_| .__/ \__|  /_/
                                          | |
                                          |_|

**************************/
$(document).ready(function()
{
/* Website Base URL */
$.base_url='http://localhost/wall/';
$.loaderIcon='<img src="'+$.base_url+'wall_icons/ajaxloader.gif" />';
var webcamtotal=6; /* Min 2 Max 6 Recommended */
$("a.timeago").livequery(function () { $(this).timeago(); });
$("span.timeago").livequery(function () { $(this).timeago(); });
$(".stcommenttime").livequery(function () { $(this).timeago(); });
/* URL Tool Tips*/
$(".stdelete, .small_face, .big_face, .edit, .custom-file-input, .stcommentdelete, .imageDelete").tipsy({gravity: 's',live: true});
$("#camera").tipsy({gravity: 'n',live: true});
$("#webcam_button").tipsy({gravity: 'n',live: true});
/*Text to URL*/
$(".sttext_content, .stcommenttext").livequery(function () { $(this).linkify({
target: "_blank"
}); });


/*Introdution Demo*/
$('.introjs-skipbutton').click(function(){
var URL=$.base_url+'tour_ajax.php';
var A=$(this).html();
/*You can enable for Done button, right now it is working for both Skip and Done*/

/*if(A=='Done')*/
if(1)
{
var dataString = 'tour='+ A ;
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){

}
});
}
});


/* Notification link */
$("#notificationLink").click(function()
{


var URL=$.base_url+'notification_created_ajax.php';
$.ajax({
type: "POST",
url: URL,
cache: false,
success: function(html){
if(html)
{
$("#notificationContainer").fadeToggle(300);  
$(".not_count").fadeOut('slow');
$("#notifications_container").html(html);
}
}
});

return false;
});

/*Document Click for notification popup*/
$(document).click(function()
{
$("#notificationContainer").hide();
});

$(".noti_stbody").mouseup(function()
{
return false
});

/* Notification Scroll Apply*/
$('#notifications').slimScroll({height: '380px'});
var notification_content_height = 380;

/* Notification Scroll Results */
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
if(a == 0)
{
$.ajax({
type: "POST",
url: $.base_url+"notifications_more_ajax.php",
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

/* Total Notifications Scroll */
$(window).scroll(function(){
var X=$("#notification_check").val();
if(parseInt(X))
{
var a=0;
var B=$("#total_notifications").html();
if(B.length>12)
{
if ($(window).scrollTop() == $(document).height() - $(window).height()){
var ID=$(".noti_stbody:last").attr("id");
var dataString = 'last_time='+ ID ;
if(a == 0){

$.ajax({
type: "POST",
url: $.base_url+"notifications_more_ajax.php",
data: dataString,
cache: false,
success: function(html){

if($.trim(html).length>46)
{
$("#total_notifications").append(html);
}
else
{
$("#total_notifications").append(html);
$("#notification_check").val('0');
}

}
});

a = 1;
}

}

}

}

});


/* Textare Resize */
$("textarea").on('mousemove',function(e) {
var myPos = $(this).offset();
myPos.bottom = $(this).offset().top + $(this).outerHeight();
myPos.right = $(this).offset().left + $(this).outerWidth();

if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
$(this).css({ cursor: "nw-resize" });
}
else {
$(this).css({ cursor: "" });
}
})
.on('keyup',function(e) {
while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
$(this).height($(this).height()+1);
};
});

/* Status update focus */
$("#update").focus();

/* Update Status */
$(".update_button1").click(function()
{
var updateval = $("#update").val();
var group_id = $("#group_id").val();
var up=$("#uploadvalues").val();

if(up)
{
var uploadvalues=$("#uploadvalues").val();
}
else
{
var uploadvalues=$(".preview:last").attr('id');
}

var X=$('.preview').attr('id');
var Y=$('.webcam_preview').attr('id');
if(X)
{
var Z= X+','+uploadvalues;
}
else if(Y)
{
var Z= uploadvalues;
}
else
{
var Z=0;
}
var dataString = 'update='+updateval+'&uploads='+Z+'&group_id='+group_id;
if($.trim(updateval).length==0)
{
alert("Please Enter Some Text");
}
else
{
$("#flash").show();
$("#flash").fadeIn(400).html('Loading Update...');
$.ajax({
type: "POST",
url: $.base_url+"message_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
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

/*Share*/
$('body').on("click",'.share_button',function()
{

var sid;
var KEY = parseInt($(this).attr("data"));
var ID = $(this).attr("id");

if(KEY=='1')
{
sid=ID.split("shares");
}
else
{
sid=ID.split("share");
}

var New_ID=sid[1];

var REL = $(this).attr("rel");
var URL=$.base_url+'message_share_ajax.php';
var dataString = 'msg_id=' + New_ID+'&rel='+ REL;
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){
if(html)
{
if(REL=='Share')
{
$('#'+ID).html('Unshare').attr('rel', 'Unshare').attr('title', 'Unshare');
}
else
{
$('#'+ID).attr('rel', 'Share').attr('title', 'Share').html('Share');
}
}

}
});

return false;
});

/*Like and Unlike*/
$('body').on("click",'.like_button',function()
{

var KEY = parseInt($(this).attr("data"));
var ID = $(this).attr("id");
if(KEY=='1')
{
var sid=ID.split("likes");
}
else
{
var sid=ID.split("like");
}


var New_ID=sid[1];
var REL = $(this).attr("rel");
var URL=$.base_url+'message_like_ajax.php';
var dataString = 'msg_id=' + New_ID +'&rel='+ REL;
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){
if(html)
{
if(REL=='Like')
{
$("#elikes"+New_ID).show('slow').prepend("<span id='you"+New_ID+"'><a href='#'>You</a> like this.</span>");
$("#likes"+New_ID).prepend("<span id='you"+New_ID+"'><a href='#'>You</a>, </span>");
$('#'+ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
}
else
{
$("#elikes"+New_ID).hide('slow');
$("#you"+New_ID).remove();
$('#'+ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
}
}

}
});

return false;
});

/* Comment Like and Unlike */
$('body').on("click",'.commentlike',function()
{
var ID = $(this).attr("id");
var sid=ID.split("clike");
var New_ID=sid[1];
var REL = $(this).attr("rel");

var URL=$.base_url+'comment_like_ajax.php';
var dataString = 'com_id=' + New_ID +'&rel='+ REL;
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){

if(REL=='Like')
{

$('#'+ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
$("#count_container"+New_ID).fadeIn('slow');
$(".comment_count"+New_ID).html(html);

}
else
{
$('#'+ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
if(html>0)
{
$(".comment_count"+New_ID).html(html);
}
else
{
$("#count_container"+New_ID).fadeOut('slow');
}

}

}
});
return false;
});


/* Group Member Block */

$('body').on("click",'.groupMemberBlock',function()
{

var P=$(this);
var ID = $(this).attr("id");
var REL = $(this).attr("rel");
var T = $(this).attr("t");
var dataString = 'memberID='+ ID +'&groupID='+ REL+'&type='+ T;
var URL=$.base_url+'group_member_block_ajax.php';
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){

if(parseInt(T))
{
P.addClass('blackButton').removeClass('blackButton').removeClass('whiteButton').addClass('whiteButton');
P.html("Unblock");
P.attr('t','0');
}
else
{
P.addClass('whiteButton').removeClass('whiteButton').removeClass('blackButton').addClass('blackButton');
P.html("Block");
P.attr('t','1');
}

}
});

return false;
});


/* Commment Submit */

$('body').on("click",'.comment_button',function()
{
var ID = $(this).attr("id");
var OID = $(this).attr("rel");
var URL=$.base_url+'comment_ajax.php';
var comment= $("#ctextarea"+ID).val();
var dataString = 'comment='+ comment + '&msg_id=' + OID;

if($.trim(comment).length==0)
{
alert("Please Enter Comment Text");
}
else
{
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){
$("#commentload"+ID).append(html);
$("#ctextarea"+ID).val('').css("height", "35px").focus();

}
});
}
return false;
});

/* Comment Box Open */
$('body').on("click",'.commentopen_button',function()
{
var ID = $(this).attr("id");
$("#commentbox"+ID).slideToggle('fast');
$("#ctextarea"+ID).focus();
return false;
});

/* Follow Button */
$('.addbutton').on('click',function()
{
var vid = $(this).attr("id");
var sid=vid.split("add");
var ID=sid[1];
var dataString = 'fid='+ ID ;

$.ajax({
type: "POST",
url: $.base_url+"friend_add_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html($.loaderIcon); },
success: function(html)
{
if(html)
{
$("#friendstatus").html('');
$("#add"+ID).hide();
$("#remove"+ID).show();
}
}
});
return false;
});

/* unFollow Button */
$('.removebutton').on('click',function()
{

var vid = $(this).attr("id");
var sid=vid.split("remove");
var ID=sid[1];
var dataString = 'fid='+ ID ;

$.ajax({
type: "POST",
url: $.base_url+"friend_remove_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html($.loaderIcon); },
success: function(html)
{
if(html)
{
$("#friendstatus").html('');
$("#remove"+ID).hide();
$("#add"+ID).show();
}
}
});
return false;
});

/* Group Follow Button */
$('.groupAdd').on('click',function()
{
var vid = $(this).attr("id");
var sid=vid.split("add");
var ID=sid[1];
var dataString = 'group_id='+ ID ;
$.ajax({
type: "POST",
url:$.base_url+"group_add_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html($.loaderIcon); },
success: function(html)
{
if(html)
{
$("#friendstatus").html('');
$("#add"+ID).hide();
$("#remove"+ID).show();
}
}
});
return false;
});

/* Group Remove  Button */
$('.groupRemove').on('click',function()
{
var vid = $(this).attr("id");
var sid=vid.split("remove");
var ID=sid[1];
var dataString = 'group_id='+ ID ;

$.ajax({
type: "POST",
url:$.base_url+"group_remove_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){$("#friendstatus").html($.loaderIcon); },
success: function(html)
{
if(html)
{
$("#friendstatus").html('');
$("#remove"+ID).hide();
$("#add"+ID).show();
}
}
});
return false;
});

/*WebCam 6 clicks*/
$(".camclick").on("click",function()
{
var X=$("#webcam_count").val();
if(X)
var i=X;
else
var i=1;
var j=parseInt(i)+1;
$("#webcam_count").val(j);

if(j>webcamtotal)
{
$(this).hide();
$("#webcam_count").val(1);
}

});

/* Delete comment */
$('body').on("click",'.stcommentdelete',function(e)
{
var ID = $(this).attr("id");
var dataString = 'com_id='+ ID;
var URL=$.base_url+'comment_delete_ajax.php';
jConfirm("Sure you want to delete this comment? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
beforeSend: function(){$("#stcommentbody"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html){
$("#stcommentbody"+ID).fadeOut(300,function(){$("#stcommentbody"+ID).remove();});
}
});
} });
return false;
});


/* Camera Expand Click */
$('body').on("click",'#camera',function()
{
$('#webcam_container').slideUp('fast');
$('#imageupload').slideToggle('fast');
return false;
});

/* Web Camera Expand Click */
$('body').on("click",'#webcam_button',function()
{
$(".camclick").show();
$('#imageupload').slideUp('fast');
$('#webcam_container').slideToggle('fast');
return false;
});

/* Ajax Uploading Image */
$('body').on('change','#photoimg', function()
{
var values=$("#uploadvalues").val();
$("#previeww").html('<img src="wall_icons/loader.gif"/>');
$("#imageform").ajaxForm({target: '#preview',
 beforeSubmit:function(){
	 $("#imageloadstatus").show();
	 $("#imageloadbutton").hide();
	 },
	success:function(){
	 $("#imageloadstatus").hide();
	 $("#imageloadbutton").show();
	},
	error:function(){
	 $("#imageloadstatus").hide();
	 $("#imageloadbutton").show();
	} }).submit();

});

/* Uploading Profile BackGround Image */
$('body').on('change','#bgphotoimg', function()
{

$("#bgimageform").ajaxForm({target: '#timelineBG',
beforeSubmit:function(){
},
success:function(){
$("#timelineBG").css("margin-top", "-17px");
$("#bgimageform").hide();
},
error:function(){
} }).submit();
});

/* Uploading timelineProfile  Image */
$('body').on('change','#profilephotoimg', function()
{
$("#profileimageform").ajaxForm({target: '#timelineProfilePic',
beforeSubmit:function(){
},
success:function(){
$("#profileimageform").hide();
$(".previousImage").hide();
},
error:function(){

} }).submit();
});

/* Uploading Profile  Image */
$('body').on('change','#bigprofileimageform', function()
{
$("#bigprofileimageform").ajaxForm({target: '#bigFace',
beforeSubmit:function(){

},
success:function(){
$("#bigprofileimageform").hide();
$("#profileBigFace").hide();
},
error:function(){
} }).submit();

});

/* Delete Status update */
$('body').on("click",'.stdelete',function()
{
var ID = $(this).attr("id");
var Group_ID = $(this).attr("rel");
var dataString = 'msg_id='+ ID+'&group_id='+Group_ID;
jConfirm("Sure you want to delete this update? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: $.base_url+"message_delete_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){ $("#stbody"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html){
$("#stbody"+ID).fadeOut(300,function(){$("#stbody"+ID).remove();});
var c=$('#update_count').html();
$('#update_count').html(parseInt(c)-1);
}
});

} });
return false;
});

/* View all comments */
$("body").on("click",".view_comments",function()
{
var ID = $(this).attr("id");
var OID = $(this).attr("rel");
var pID = $(this).attr("par");
var URL=$.base_url+'comments_view_ajax.php';
$.ajax({
type: "POST",
url: URL,
data: "msg_id="+ OID +"&msg_uid="+pID,
cache: false,
success: function(html){
$("#commentload"+ID).html(html);
}
});
return false;
});

/* Load More */
$('body').on("click",'.more',function()
{
var ID = $(this).attr("id");
var P_ID = $(this).attr("rel");
var G_ID = $(this).attr("grp");
var URL=$.base_url+'messages_more_ajax.php';
var dataString = "lastid="+ ID+"&profile_id="+P_ID+"&group_id="+G_ID;
if(ID)
{
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
beforeSend: function(){ $("#more"+ID).html($.loaderIcon); },
success: function(html){
$("div#content").append(html);
$("#more"+ID).remove();
}
});
}
else
{
$("#more").html('The End');
}
return false;
});

/* Banner position */
$("body").on('mouseover','.headerimage',function ()
{
var y1 = $('#timelineBG').height();
var y2 =  $('.headerimage').height();
$(this).draggable({
scroll: false,
axis: "y",
drag: function(event, ui) {
if(ui.position.top >= 0)
{
ui.position.top = 0;
}
else if(ui.position.top <= y1 - y2)
{
ui.position.top = y1 - y2;
}
},
stop: function(event, ui)
{
}
});
});

/* Bannert Position Save*/
$("body").on('click','.bgSave',function ()
{
var id = $(this).attr("id");
var p = $("#timelineBGload").attr("style");
var Y =p.split("top:")
var sid=id.split("X");
var dataString ='typeid='+sid[1]+'&position='+Y[1]+'&type='+sid[0];
$.ajax({
type: "POST",
url: $.base_url+"image_saveBG_ajax.php",
data: dataString,
cache: false,
beforeSend: function(){ },
success: function(html)
{
if(html)
{
$(".bgSave").fadeOut('slow');
$("#timelineBGload").removeClass("headerimage");
}
}
});
return false;
});

/* Remove Image */
$('.imageDelete').on('click',function()
{
var P=$(this);
var pid = $(this).attr("id");
var dataString = 'pid='+ pid ;
$.ajax({
type: "POST",
url: $.base_url+"image_delete_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
jConfirm("Sure you want to delete this image? There is NO undo!", '',
function(r)
{
if(r==true)
{
P.parent().fadeOut('slow');
$('#photosContainer').masonry( 'remove', P.parent());
$('#photosContainer').masonry( 'reload' );
}
});

}
});
return false;
});

/* Search */
$("#searchinput").keyup(function()
{
var searchbox = $.trim($(this).val());
var rel = $(this).attr('rel');
var dataString = 'searchword='+ searchbox +'&type='+rel;
if(searchbox.length>0)
{
$.ajax({
type: "POST",
url: $.base_url+"search_ajax.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false;
});

$("#display").mouseup(function()
{
return false
});

$(document).mouseup(function()
{
$('#display').hide();
$('#searchinput').val("");
});

/* Webcam */
var pos = 0, ctx = null, saveCB, image = [];
var canvas = document.createElement("canvas");
canvas.setAttribute('width', 320);
canvas.setAttribute('height', 240);
if (canvas.toDataURL)
{
ctx = canvas.getContext("2d");
image = ctx.getImageData(0, 0, 320, 240);
saveCB = function(data)
{
var col = data.split(";");
var img = image;
for(var i = 0; i < 320; i++) {
var tmp = parseInt(col[i]);
img.data[pos + 0] = (tmp >> 16) & 0xff;
img.data[pos + 1] = (tmp >> 8) & 0xff;
img.data[pos + 2] = tmp & 0xff;
img.data[pos + 3] = 0xff;
pos+= 4;
}
if (pos >= 4 * 320 * 240)
{
ctx.putImageData(img, 0, 0);
$.post("webcam_image_ajax.php", {type: "data", image: canvas.toDataURL("image/png")},
function(data)
{

if($.trim(data) != "false")
{
var dataString = 'webcam='+ 1;
$.ajax({
type: "POST",
url: $.base_url+"webcam_imageload_ajax.php",
data: dataString,
cache: false,
success: function(html){
var values=$("#uploadvalues").val();
$("#webcam_preview").prepend(html);
var X=$('.webcam_preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);
}
});
}
else
{
$("#webcam").html('<div id="camera_error"><b>Camera Not Found</b><br/>Please turn your camera on or make sure that it <br/>is not in use by another application</div>');
$("#webcam_status").html("<span style='color:#cc0000'>Camera not found please reload this page.</span>");
$("#webcam_takesnap").hide();
return false;
}
});
pos = 0;
}
else {
saveCB = function(data) {
image.push(data);
pos+= 4 * 320;
if (pos >= 4 * 320 * 240)
{
$.post("webcam_image_ajax.php", {type: "pixel", image: image.join('|')},
function(data)
{
var dataString = 'webcam='+ 1;
$.ajax({
type: "POST",
url: $.base_url+"webcam_imageload_ajax.php",
data: dataString,
cache: false,
success: function(html){
var values=$("#uploadvalues").val();
$("#webcam_preview").prepend(html);
var X=$('.webcam_preview').attr('id');
var Z= X+','+values;
if(Z!='undefined,')
$("#uploadvalues").val(Z);
}
});

});
pos = 0;
}
};
}
};
}

$("#webcam").webcam({
width: 320,
height: 240,
mode: "callback",
swffile: "js/jscam_canvas_only.swf",
onSave: saveCB,
onCapture: function ()
{
webcam.save();
},
debug: function (type, string) {
$("#webcam_status").html(type + ": " + string);
}

});


});
/**Taking snap**/
function takeSnap(){
webcam.capture();
}
