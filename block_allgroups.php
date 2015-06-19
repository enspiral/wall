<div id="new_wall_container">
<h3>Groups / Pages</h3>
<?php
$groupslist=$Wall->Groups_List($uid,'', '', 55,'');
if($groupslist)
{
foreach($groupslist as $f)
{
$group_id=$f['group_id'];
$group_owner=$f['uid_fk'];
$group_name=$f['group_name'];
$group_name=htmlcode(nameFilter($group_name,25));
$group_pic=$f['group_pic'];
$group_pic=imageCheck($group_pic,$upload_path,$base_url);
$edit="";
if($group_owner==$uid)
{
$edit='<a href="'.$base_url.'editGroup.php?id='.$group_id.'" class="edit" original-title="Edit Group"></a>';
}

echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'group.php?gid='.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
}
}

?>
</div>