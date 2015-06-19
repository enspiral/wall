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
<h3>Create Organization</h3>
<?php } ?>
<div class='msg'><?php echo $msg; ?></div>
<form method='post' action='' enctype="multipart/form-data" >
<table width='100%' id='settings'>
    
<tr>
<td valign='top' class='label'>Organization Name: </td>
<td valign='top'><input type='text' name='org_name' value='<?php echo $_POST['org_name']; ?>' maxlength="50"/>
    <p style="color:red;"><?php echo $error_org_info1; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Description: </td>
<td valign='top'><textarea name='org_desc' class="textarea"><?php echo $_POST['org_desc']; ?></textarea>
    <p style="color:red;"><?php echo $error_org_info2; ?></p>
</td>
</tr>

<tr>

<tr>
<td valign='top' class='label'>Location: </td>
<td valign='top'><input type='text' name='org_location' value='<?php echo $_POST['org_location']; ?>' maxlength="50"/>
     <p style="color:red;"><?php echo $error_org_info3; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Type: </td>
<td valign='top'>
    <input type='radio' name='org_type' value="1" checked="checked"/>Educational Institutions&nbsp;&nbsp;&nbsp;
    <input type='radio' name='org_type' value="2"/>Companies&nbsp;&nbsp;&nbsp;
    <input type='radio' name='org_type' value="3"/>NGOs
</td>
</tr>

<tr>
<td valign='top' class='label'>Website: </td>    
<td valign='top'><input type='text' name='org_website' value='<?php echo $_POST['org_website']; ?>' maxlength="50"/> 
    <p style="color:red;"><?php echo $error_org_info4; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Your role: </td>
<td valign='top'><input type='text' name='usr_role' value='<?php echo $_POST['usr_role']; ?>'/>
     <p style="color:red;"><?php echo $error_org_info5; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'>Contact: </td>
<td valign='top'><input type='text' name='contact' value='<?php echo $_POST['contact']; ?>'/>
     <p style="color:red;"><?php echo $error_org_info6; ?></p>
</td>
</tr>

<tr>
<td valign='top' class='label'></td>
<td valign='top'>Have you sent before?</td>
</tr>

<tr>
<td valign='top' class='label'></td>
<td valign='top'>
    <input type='radio' name='status_sent' value="1" checked="checked"/>Yes&nbsp;&nbsp;&nbsp;
    <input type='radio' name='status_sent' value="0"/>No
</td>
</tr>

<tr>
<td valign='top' class='label'></td>
<td valign='top'>
    <input type='checkbox' name='usr_agreement' value="agree"/> I agree to the Page Terms and I am authorized to create this project.
     <p style="color:red;"><?php echo $error_org_info7; ?></p>
</td>
</tr>

<tr>
<td valign='top'></td>
<td valign='top'><input type='submit' value='<?php echo $create_button; ?>' class='wallbutton'/>&nbsp;&nbsp;&nbsp;
    <input type="reset" value="Reset" class="wallbutton">

<?php if(!empty($_GET['id'])) {?>
&nbsp;&nbsp;<a href="?id=<?php echo $_GET['id']; ?>&del=1" class='wallbutton redButton'>Delete Organization</a>
<?php } ?>

</td>
</tr>

</table>
</form>

</div>
