<?php
/* Configurations   */
$Get_Configurations=$Wall->Get_Configurations();
$perpage=$Get_Configurations['newsfeedPerPage']; // Updates perpage
$notifications_perpage=$Get_Configurations['notificationPerPage']; // Notification perpage
$gravatar=$Get_Configurations['gravatar']; // 0 false 1 true gravatar image
$rowsPerPage=$Get_Configurations['friendsPerPage']; //friends list
$photosPerPage=$Get_Configurations['photosPerPage']; //Photos list
$groupsList=$Get_Configurations['groupsPerPage']; //friends list
$uploadImageSize=$Get_Configurations['uploadImage']; // Update image file size
$TimelineBannerPX=$Get_Configurations['bannerWidth']; //Timeline banner pixel size
$TimelineProfilePX=$Get_Configurations['profileWidth']; //Timeline banner pixel size
$friend_widget_list_count=$Get_Configurations['friendsWidgetPerPage'];
$admin_perpage=$Get_Configurations['adminPerPage']; // Updates perpage
$applicationName=$Get_Configurations['applicationName']; // Updates perpage
$applicationDesc=$Get_Configurations['applicationDesc']; // Updates perpage
?>