<div class="leftBlock" data-step="7" data-intro="Create a Group or Page." data-position='right'>

<div class="small_title">
<?php
$otherGroups='';
if($groupID)
{
echo 'Other Groups/Pages';
$otherGroups=$groupID;
}
else
{
echo 'Groups/Pages';
}
?>
</div>
<?php

if($profile_uid)
{
$groupslist=$Wall->Groups_List($profile_uid,'', '', $groupsList,$otherGroups);
}
else
{
$groupslist=$Wall->Groups_List($uid,'', '', $groupsList,$otherGroups);
}
if($groupslist)
{
foreach($groupslist as $f)
{
$group_id=$f['group_id'];
$group_owner=$f['uid_fk'];
$group_name=$f['group_name'];
$group_name=nameFilter($group_name,25);
$group_pic=$f['group_pic'];
$group_pic=imageCheck($group_pic,$upload_path,$base_url);
$edit="";
if($group_owner==$uid)
{
$edit='<a href="'.$base_url.'editGroup.php?id='.$group_id.'" class="edit" original-title="Edit Group"></a>';
}
//echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'groups/'.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
echo '<div class="groupListDiv">'.$edit.'<a href="group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';

}
}

echo '<div class="groupListDiv"><a href="'.$base_url.'createGroup.php" ><span class="groupIcon groupIconNew"></span><div class="groupSmallTitle">Create Group</div></a></div>';
echo '<div class="groupListDiv"><a href="'.$base_url.'createGroup.php" ><span class="groupIcon groupIconNew"></span><div class="groupSmallTitle">Create Page</div></a></div>';
if($session_group_count>$groupsList)
{
echo '<div class="groupListDiv"><a href="'.$base_url.'allgroups.php" >View All Groups</a></div>';
}
?>
</div>
