$(document).ready(function(){

$( "#sortable" ).sortable({
revert: true
});

$('.save').click(function()
{
$.ajax
({
type: "POST",
url: "ajaxTemplate.php",
data: $("#sortable").sortable("serialize"),
success: function(data)
{
$('#alert').show();
}
});

setTimeout(function()
{
$("#alert").slideUp("slow", function () {
$("#alert").hide();
}); }, 3000);

});

$('body').on('change','#bigprofileimageform', function()
{
$("#bigprofileimageform").ajaxForm({target: '#ad_image',
beforeSubmit:function(){

},
success:function(){

},
error:function(){
} }).submit();

});

$("#adTitle").keyup(function()
{
$("#ad_title").html($(this).val());
});

$("#adDesc").keyup(function()
{
$("#ad_desc").html($(this).val());
});

$("#adURL").keyup(function()
{
var x=$(this).val()
$("#ad_url").html(x);
$("#ad_title").attr("href",x);
});

$("#adSave").click(function()
{

var ad_title=$("#adTitle").val();
var ad_desc=$("#adDesc").val();
var ad_url=$("#adURL").val();
var ad_img=$(".ad_image").attr('rel');

var check_url = /^(http|https|ftp):\/\/(www+\.)?[a-zA-Z0-9]+\.([a-zA-Z]{2,4})\/?/;

var dataString = 'adTitle='+ ad_title +'&adDesc='+ad_desc+'&adURL='+ad_url+'&adImg='+ad_img;

if(ad_title.length>0 && ad_desc.length>0 && check_url.test(ad_url) && ad_img.length>0)
{
$.ajax({
type: "POST",
url: 'ajaxAdvertisment.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#adTitle").val('');
$("#adDesc").val('');
$("#adURL").val('');
$("#exampleInputFile").val('');
$(".ad_image").val('');
$("#ad_image").html('');
$("#ad_title").html('Ad Title');
$("#ad_desc").html('Ad Description');
$("#ad_url").html('Ad URL');

$("#AdsBlock").prepend(html);


}
});
}
else
{
alert("Give valid data. ");
}

});


$(".textContent").livequery(function () { $(this).linkify({
target: "_blank"
}); });
/* Block and Unblock Users */
$(".block").click(function(){
var ID=$(this).attr("id");
var REL=$(this).attr("rel");
var msg;
var dataString = 'uid='+ ID +'&type='+REL;

if(REL.length>0)
{
msg="Sure you want to unblock this User?";
}
else
{
msg="Sure you want to block this User?";
}

jConfirm(msg, '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxUserBlock.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#users"+ID).fadeOut("slow");
}
});

}
});
});

/* Verified and Unverified Users */
$(".verified").click(function(){
var X=$(this);
var ID=$(this).attr("id");
var REL=$(this).attr("rel")
var msg;
var dataString = 'uid='+ ID +'&type='+REL;

if(REL.length>0)
{
msg="Sure you want to unverify this User?";
}
else
{
msg="Sure you want to approve as a verified User?";
}

jConfirm(msg, '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxUserVerified.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
if(REL.length>0)
{
$("#users"+ID).fadeOut("slow");
}
else
{
X.fadeOut();
$("#verified"+ID).html('<span class="label label-blue">Verified</span>');
}
}
});

}
});
});


/* Delete Users */
$(".delete").click(function(){
var ID=$(this).attr("id");
var dataString = 'uid='+ ID ;

jConfirm("Sure you want to delete this update? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxUserDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#users"+ID).fadeOut("slow");
}
});

}
});
});

/* Delete Advertisments */
$("body").on('click','.adDelete',function(){
var ID=$(this).attr("id");
var dataString = 'aid='+ ID ;

jConfirm("Sure you want to delete this adverstisement? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxAdDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#adBlock"+ID).fadeOut("slow");
}
});

}
});
return false;
});


/* updateDelete Users */
$(".updateDelete").click(function(){
var ID=$(this).attr("id");
var dataString = 'msg_id='+ ID ;

jConfirm("Sure you want to delete this update? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxMessageDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#updates"+ID).fadeOut("slow");
}
});

}
});
});

/* commentDelete Users */
$(".commentDelete").click(function(){
var ID=$(this).attr("id");
var dataString = 'com_id='+ ID ;

jConfirm("Sure you want to delete this comment? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxCommentDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#comments"+ID).fadeOut("slow");
}
});

}
});
});

/* groupDelete Users */
$(".groupDelete").click(function(){
var ID=$(this).attr("id");
var dataString = 'group_id='+ ID ;

jConfirm("Sure you want to delete this Group?", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxGroupDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#groups"+ID).fadeOut("slow");
}
});

}
});
});

/* group Block  */
$(".groupBlock").click(function(){
var ID=$(this).attr("id");
var REL=$(this).attr("rel");
var dataString = 'group_id='+ ID +'&type='+REL;

jConfirm("Sure you want to block this Group?", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxGroupBlock.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#groups"+ID).fadeOut("slow");
}
});

}
});
});

/* commentDelete Users */
$(".imageDelete").click(function(){
var ID=$(this).attr("id");
var dataString = 'pid='+ ID ;

jConfirm("Sure you want to delete this Image? There is NO undo!", '',
function(r)
{
if(r==true)
{
$.ajax({
type: "POST",
url: 'ajaxImageDelete.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#image"+ID).fadeOut("slow");
}
});

}
});
});



});
