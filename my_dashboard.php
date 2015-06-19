<style>
    .full-width {
    width: 100%;
    background-color: #808080;
}
.col-md-3 {
    background-color: #4f4;
}
.col-md-9 {
    background-color: #f4f;
}

</style>
<script>

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


</script>

<div class="container">

    <div class="sidebar-left">
        <?php include_once 'block_left_dashboard.php'; ?>
    </div>
    <div class="middle-content">
        <?php
        include('block_updates.php');
        ?>
    </div>
    <div class="sidebar-right-dabshoard">
        <?php include_once 'block_right.php'; ?>

    </div>
</div>
