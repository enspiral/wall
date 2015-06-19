<div id="new_wall_container">
<h3>Settings</h3>
<div class='msg'><?php echo $msg; ?></div>
<form method='post' action='' enctype="multipart/form-data" >
<table width='100%' class='settings'>
<tr>
<td valign='top' class='label'>Username: </td>
<td valign='top'><?php echo $session_username; ?></td>
</tr>

<tr>
<td valign='top' class='label'>Email: </td>
<td valign='top'><?php echo $session_email; ?></td>
</tr>

<tr>
<td valign='top' class='label'>Name: </td>
<td valign='top'><input type='text' name='full_name' value='<?php echo $session_full_name; ?>' maxlength="50"/></td>
</tr>

<tr>
<td valign='top' class='label'>About Me: </td>
<td valign='top'><textarea name='aboutme'  class="textarea" ><?php echo $session_bio; ?></textarea></td>
</tr>

<tr>
<td valign='top' class='label'>Password:</td>
<td valign='top'><a href='change_password.php'>Change Passsword. </a></td>
</tr>




<tr>
<td valign='top' class='label'>Avatar:</td>
<td valign='top'>
	<?php
	if($session_profile_pic_status)
	{
	$a='checked';
	$b='';
	}
	else
	{
	$b='checked';
	$a='';
	}

	?>
	<input type='radio' value='0' name='avatar' <?php echo $b; ?> /> Gravatar.com   &nbsp;&nbsp;

	<input type='radio' value='1' name='avatar' <?php echo $a; ?> /> Profile Picture

</td>
</tr>

<tr>
<td valign='top'></td>
<td valign='top'><input type='submit' value='Save Settings' class='wallbutton'/></td>
</tr>
</table>
</form>

</div>
