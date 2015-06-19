<div id="new_wall_container">
<?php if(!empty($_GET['id'])) {?>
<h3>Edit Group</h3>
<?php } else {
$new_group_name='';
$new_group_desc='';
?>
<h3>Create Group</h3>
<?php } ?>
<div class='msg'><?php echo $msg; ?></div>
<form method='post' action='' enctype="multipart/form-data" >
<table width='100%' id='settings'>
<tr>
<td valign='top' class='label'>Group Name: </td>
<td valign='top'><input type='text' name='group_name' value='<?php echo $new_group_name; ?>' maxlength="50"/></td>
</tr>

<tr>
<td valign='top' class='label'>Description: </td>
<td valign='top'><textarea name='group_desc' class="textarea"><?php echo $new_group_desc; ?></textarea></td>
</tr>



<tr>
<td valign='top'></td>
<td valign='top'><input type='submit' value='<?php echo $group_button; ?>' class='wallbutton'/>

<?php if(!empty($_GET['id'])) {?>
&nbsp;&nbsp;<a href="?id=<?php echo $_GET['id']; ?>&del=1" class='wallbutton redButton'>Delete Group</a>
<?php } ?>

</td>
</tr>

</table>
</form>

</div>
