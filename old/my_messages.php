<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';
$conversation_uid = '';
if ($_GET['message_username']) {
    $conversation_usr = $_GET['message_username'];
    $conversation = $Wall->User_ID($conversation_usr);
    if ($conversation) {
        $conversation_uid = $conversation;
        if ($conversation_uid != $uid) {
            $top_c_id = $Wall->Conversation_Insert($uid, $conversation_uid);
        } else {
            $url = $base_url . 'messages.php';
            header("Location:$url");
//echo "<script>window.location='$url'</script>";
        }
    } else {
        $url = $base_url . '404.php';
        header("Location:$url");
//echo "<script>window.location='$url'</script>";
    }
}

$face = $Wall->User_Profilepic($uid, $base_url, $upload_path);
?>
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
                $.ajax({
                    type: "POST",
                    url: "<?php echo $base_url; ?>conversation_more_ajax.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {

                        if ($.trim(html).length > 0)
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
                    url: "<?php echo $base_url; ?>conversationReply_more_ajax.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        if ($.trim(html).length > 0)
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
                    var dataString = 'searchword=' + searchbox + '&type=' + rel;

                    if (searchbox.length > 0)
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
                    }
                    return false;
                });

                $("#notificationLink").click(function()
                {

                    $("#notificationContainer").fadeToggle(300);
                    var URL = '<?php echo $base_url; ?>notification_created_ajax.php';
                    $.ajax({
                        type: "POST",
                        url: URL,
                        cache: false,
                        success: function(html) {
                            if (html)
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
                });

                $(".noti_stbody").mouseup(function()
                {
                    return false
                });

                $('#notifications').slimScroll({height: '380px'});
                var notification_content_height = 380;
                $('.notifications').scroll(function(eve) {
                    var a = 0;
                    var s = $(document).height() - notification_content_height;
                    if (s > 128)
                    {
                        s = 128;
                    }
                    if ($('.notifications').scrollTop() >= s) {

                        var ID = $(".noti_stbody:last").attr("id");
                        var dataString = 'last_time=' + ID;
                        if (a == 0) {

                            $.ajax({
                                type: "POST",
                                url: "<?php echo $base_url; ?>notifications_more_ajax.php",
                                data: dataString,
                                cache: false,
                                success: function(html) {

                                    if ($.trim(html).length > 46)
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

                $(".reply_sttext").livequery(function() {
                    $(this).linkify({
                        target: "_blank"
                    });
                });
                $("#reply_content").animate({"scrollTop": $('#reply_content')[0].scrollHeight}, "slow");

                var playlist_content_height = 616;
                $('.conversation_grid').scroll(function(eve) {
                    var a = 0;
                    var s = $(document).height() - playlist_content_height;
                    if (s > 128)
                    {
                        s = 128;
                    }
                    if ($('.conversation_grid').scrollTop() >= s) {

                        var ID = $(".conList:last").attr("rel");
                        var dataString = 'last_time=' + ID;
                        if (a == 0) {
                            list_more(dataString);
                            a = 1;
                        }

                    }
                });


                var playlist_contentReply_height = 470;

                $('.conversationReply_grid').scroll(function(eve) {
                    var a = 0;
                    var s = $(document).height() - playlist_contentReply_height;

                    if ($('.conversationReply_grid').scrollTop() == 0) {
                        var b = 0;
                        var C_ID = $('#cid').val();
                        var ID = $(".reply_stbody:first").attr("id");
                        var sid = ID.split("stbody");
                        var New_ID = sid[1];
                        var dataString = 'last_time=' + New_ID + '&c_id=' + C_ID;
                        console.log(dataString);

                        if (b == 0) {
                            list_more_reply(dataString, C_ID);
                            b = 1;
                        }


                    }

                });

                $('#replylist_content').slimScroll({
                    height: playlist_content_height + 'px'
                });

                $('#reply_content').slimScroll({
                    height: '440px'
                });

                $("span.timeago").livequery(function() {
                    $(this).timeago();
                });

                $('body').on("click", ".reply_button", function() {
                    var A = $('#update').val();
                    var B = $('#cid').val();

                    var dataString = 'reply=' + A + '&cid=' + B;
                    if ($.trim(A).length > 0)
                    {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $base_url; ?>conversation_ajax.php",
                            data: dataString,
                            cache: false,
                            beforeSend: function() {
                                $("#flash").html('<img src="wall_icons/ajaxloader.gif"  />');
                            },
                            success: function(html)
                            {
                                if (html)
                                {
                                    //var B=$('#cid').val();

                                    if (A.length > 20)
                                    {
                                        A = A.substring(0, 17);
                                        A += '...';
                                    }

                                    $('#reply' + B).html("<img src='<?php echo $base_url; ?>wall_icons/send.png'  class='con_send'/>" + htmlEscape(A));
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
                $('body').on('click', '.reply_stdelete', function()
                {
                    var ID = $(this).attr("id");
                    //var X=$(this).attr("my");
                    var dataString = 'c_id=' + ID;
                    jConfirm("Sure you want to delete this conversation? There is NO undo!", '',
                            function(r)
                            {
                                if (r == true)
                                {
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo $base_url; ?>conversation_delete_ajax.php",
                                        data: dataString,
                                        cache: false,
                                        beforeSend: function() {
                                            $("#stbody" + ID).animate({'backgroundColor': '#f2f2f2'}, 300);
                                        },
                                        success: function(html) {
                                            window.location = '<?php echo $base_url; ?>messages.php';
                                        }
                                    });


                                }
                            });



                    return false;
                });
            });

        </script>

<div class="div-content center">
<div id='main_left' class="message_left">
    <div class="some-content-related-div">
        <div id="replylist_content" class="conversation_grid">

            <?php
            if ($conversation_uid) {
                include('conversation_load_single.php');
            }
            include('conversation_load.php');
            ?>

        </div>
    </div>

</div>

<div id="main_right" class="message_right">
    <div class="some-content-related-div">
        <div id="reply_content" class='conversationReply_grid'>
            <?php
            include('html_conversationReply.php');
            if (empty($Conversation_Updates)) {
                if ($top_c_id) {
                    $cu = $Wall->UserFullName($conversation_usr);
                    echo "<b>Start conversation with " . $cu . "</b>";
                } else {
                    echo "<div style='margin-top:10px'><b >No conversation selected.</b></div>";
                }
            }
            ?>
        </div>
    </div>
    <?php if ($top_c_id) { ?>
    <div id="replyboxarea">
        <h5>Write a reply...</h5>
        <input type="hidden" id="cid" value="<?php echo $top_c_id; ?>">
        <textarea name="update" id="update"  style="width:524px !important;"></textarea>
        <input type="submit" value=" REPLY " id="update_button" class="reply_button wallbutton update_box"/>
    </div>
    <?php } ?>
</div>