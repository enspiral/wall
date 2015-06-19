<div id="new_wall_container">
<?php if(!empty($_GET['id'])) {?>
<h3>Edit Community</h3>
<?php } else {
/* $new_proj_name='';
$new_proj_desc='';
$new_proj_start_date='';
$new_proj_end_date='';
$new_proj_location='';
$new_role=''; */

?>
<h3>Create Community</h3>
<?php } ?>
<div class='msg'><?php echo $msg; ?></div>
<form method='post' action='' enctype="multipart/form-data" >
<table width='100%' id='settings'>
    
<tr>
<td valign='top' class='label'>Community Name: </td>
<td valign='top'><input type='text' name='com_name' value='<?php echo $_POST['com_name']; ?>' maxlength="50"/>
    <p style="color:red;"><?php echo $error_com_info1; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Description: </td>
<td valign='top'><textarea name='com_desc' class="textarea"><?php echo $_POST['com_desc']; ?></textarea>
    <p style="color:red;"><?php echo $error_com_info2; ?></p>
</td>
</tr>

<tr>

<tr>
<td valign='top' class='label'>Location: </td>
<td valign='top'><input type='text' name='com_location' value='<?php echo $_POST['com_location']; ?>' maxlength="50"/>
     <p style="color:red;"><?php echo $error_com_info3; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Language Setting: </td>
<td valign='top'><input type='text' name='lang_setting' value='<?php echo $_POST['lang_setting']; ?>' maxlength="50"/>
     <p style="color:red;"><?php echo $error_com_info4; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Your role: </td>
<td valign='top'><input type='text' name='usr_role' value='<?php echo $_POST['usr_role']; ?>'/>
     <p style="color:red;"><?php echo $error_com_info5; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Type: </td>
<td valign='top'>
    <input type='radio' name='com_type' value="Tourist" checked="checked"/>Tourist&nbsp;&nbsp;&nbsp;
    <input type='radio' name='com_type' value="Volunteer"/>Volunteer
</td>
</tr>

<tr>
<td valign='top' colspan="2">Would you like CPS to provide capacity-building services for your community? </td>
</tr>

<tr>
<td valign='top' class='label'></td>
<td valign='top'>
    <input type='radio' name='capacity' value="Yes" checked="checked"/>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type='radio' name='capacity' value="No"/>No
</td>
</tr>

<tr>
<td valign='top' class='label'></td>
<td valign='top'>
    <input type='checkbox' name='usr_agreement' value="agree"/> I agree to the Page Terms and I am authorized to create this project.
     <p style="color:red;"><?php echo $error_com_info6; ?></p>
</td>
</tr>

<tr>
<td valign='top'></td>
<td valign='top'><input type='submit' value='<?php echo $create_button; ?>' class='wallbutton'/>&nbsp;&nbsp;&nbsp;
    <input type="reset" value="Reset" class="wallbutton">

<?php if(!empty($_GET['id'])) {?>
&nbsp;&nbsp;<a href="?id=<?php echo $_GET['id']; ?>&del=1" class='wallbutton redButton'>Delete Community</a>
<?php } ?>

</td>
</tr>

</table>
</form>

</div>
