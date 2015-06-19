<span class="follow">
<?php 
if($login)
{
$friend_status=$Wall->Group_Check($uid,$group_id); 
$friend_check=$Wall->Group_Check_Count($uid,$group_id);

if($group_owner_id==$uid)
{
echo '<a href="#"  class="wallbutton messageButton" >Your Group</a>';

}
else if($friend_check=='0')
{
?>
<a href="#"  class='wallbutton  groupAdd' id='add<?php echo $group_id; ?>' p='1'>Join Group</a>
<a href="#"  class='wallbutton  groupRemove messageButton'  id='remove<?php echo $group_id; ?>' style="display:none" p='1'>Joined</a>
<?php
}
else
{
?>
<a href="#"  class='wallbutton  groupRemove messageButton'  id='remove<?php echo $group_id; ?>' p='1'>Joined</a>
<a href="#"  class='wallbutton  groupAdd'  id='add<?php echo $group_id; ?>' style="display:none" p='1'>Join Group</a>
<?php } }
else
{
?>
<a href="<?php echo $index_url; ?>"  class='wallbutton messageButton'  p='1'>Join Group</a>
<?php 
}
?>
</span>