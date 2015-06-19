<?php
include_once 'includes.php';

if($_GET['groupID'] && $_GET['track'])
{
$track=$_GET['track'];
$groupID=$_GET['groupID'];
$GroupDetails=$Wall->Group_Details($groupID);
$group_member_id=$Wall->Group_Follower_Check($uid,$groupID);
$group_id=$GroupDetails['group_id'];
$group_name=$GroupDetails['group_name'];
$group_name=nameFilter($group_name,35);
$group_desc=$GroupDetails['group_desc'];
$group_owner_id=$GroupDetails['group_owner_id'];
$group_pic=$GroupDetails['group_pic'];
$group_pic=imageCheck($group_pic,$upload_path,$base_url);
$group_count=$GroupDetails['group_count'];
$group_bg=$GroupDetails['group_bg'];
$group_updates=$GroupDetails['group_updates'];
$group_bg_position=$GroupDetails['group_bg_position'];
$group_type = $GroupDetails['type'];

$groupStatus=$Wall->Group_Status_Check($uid,$groupID);
if($groupStatus=='0')
{
header("Location:$url404");
}


if(empty($group_id) && empty($track))
{
header("Location:$url404");
}

if($track!="members" && $track!="photos" && $track!="showcase")
{
header("Location:$url404");
}


}
else
{
header("Location:$url404");
}

    if($track=="showcase"){
       include_once 'cps_shows.php';
    }else{
        include_once 'cps_shows2.php';
    }
        
 ?>