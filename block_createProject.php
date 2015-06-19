<!-- Hide content -->
<?php if (strlen($_POST['new_com_name'])==0 && strlen($_POST['new_com_add'])==0 && strlen($_POST['new_lang'])==0){?>
<style>
    .add_new_com_field{
        display:none;
    }
</style>
<?php } ?>

<?php if (strlen($_POST['new_org_name'])==0 && strlen($_POST['new_org_add'])==0 && strlen($_POST['new_org_web'])==0){?>
<style>
    .add_new_org_field{
        display:none;
    }
</style>
<?php } ?>

<div id="new_wall_container" class="createProject">

<h3>Create Project</h3>

<div class='msg'><?php echo $msg; ?></div>
<form method='post' action='' enctype="multipart/form-data" >
<table width='100%' id='settings'>

<!-- Project Name --> 
<tr>
<td valign='top' class='label' style="width:200px;">Project Name:* </td>
<td valign='top'><input type='text' name='proj_name' value='<?php echo $_POST['proj_name']; ?>' maxlength="50"/>
    <p style="color:red;"><?php echo $error_info1; ?></p>
</td>
</tr>


<!-- Start Date - End Date --> 
<tr>
<td valign='top' class='label'>Start Date: </td>
<td valign='top'><input type='date' name='proj_start_date' value='<?php echo $_POST['proj_start_date']; ?>' />
</td>
</tr>

<tr>
<td valign='top' class='label'>End Date: </td>
<td valign='top'><input type='date' name='proj_end_date' value='<?php echo $_POST['proj_end_date']; ?>' />
</td>
</tr>

<!-- Community --> 
<tr>
<td valign='top' class='label'>Visiting Community:* <br>
        <p><i>Unsure? Use our <span id="add_new_com" style="text-decoration: underline; cursor:pointer" onclick="showCommunity()">booking system!</span></i></p></td>
<td valign='top'><input type='text' name='proj_community' id='proj_community' value='<?php echo $_POST['proj_community']; ?>' maxlength="50" onkeyup="autocomplet()"/>
    <p style="color:red;"><?php echo $error_info2; ?></p>
    <div id="proj_community_id" ></div>
</td>
</tr>

<tr class="add_new_com_field">
    <td valign='top' class='label'>New Community Name: </td>
    <td valign='top'><input type='text' name='new_com_name' value='<?php echo $_POST['new_com_name']; ?>' maxlength="50"/>
    </td>
</tr>

<tr class="add_new_com_field">
    <td valign='top' class='label'>Community Address: </td>
    <td valign='top'><textarea name='new_com_add' class="textarea"><?php echo $_POST['new_com_add']; ?></textarea>
    </td>
</tr>

<tr class="add_new_com_field">
    <td valign='top' class='label'>Language(s) Spoken: </td>
    <td valign='top'><input  type='text' name='new_lang' value='<?php echo $_POST['new_lang']; ?>' maxlength="50">
    </td>
</tr>

<tr class="add_new_com_field">
<td valign='top' class='label'></td>
<td valign='top'>
    <p>The community will be added to Care Positioning System's database upon verification.</p><br>
    <p id="hide_new_com" style="text-decoration: underline;" onclick="hideCommunity()"> <b>Show less</b> </p>
</td>
</tr>


<!-- Organization -->

<tr>
<td valign='top' class='label'>Organization:<br> 
    <i>If applicable (Not found? <span id="add_new_com" style="text-decoration: underline; cursor:pointer" onclick="showOrg()"> Add new </span>)</i> </td>
<td valign='top'><input type='text' name='proj_org' id='proj_org' value='<?php echo $_POST['proj_org']; ?>' maxlength="50" onkeyup="autocomplet_org()"/>
     <p style="color:red;"><?php echo $error_info3; ?></p>
    <div id="proj_org_id" ></div>
</td>
</tr>

<tr class="add_new_org_field">
    <td valign='top' class='label'>New Organization Name: </td>
    <td valign='top'><input type='text' name='new_org_name' value='<?php echo $_POST['new_org_name']; ?>' maxlength="50"/>
    </td>
</tr>

<tr class="add_new_org_field">
    <td valign='top' class='label'>Organization Address: </td>
    <td valign='top'><textarea name='new_org_add' class="textarea"><?php echo $_POST['new_org_add']; ?></textarea>
    </td>
</tr>

<tr class="add_new_org_field">
    <td valign='top' class='label'>Website: </td>
    <td valign='top'><input type='url' name='new_org_web' value='<?php echo $_POST['new_org_web']; ?>' maxlength="50"/>
    </td>
</tr>

<tr class="add_new_org_field">
<td valign='top' class='label'></td>
<td valign='top'>
    <p>The Community will Be Added to Care Positioning System's Database upon Verification.</p><br>
    <p id="hide_new_com" style="text-decoration: underline;" onclick="hideOrg()"> <b>Show less</b> </p>
</td>
</tr>


<!-- URL --> 
<tr>
<td valign='top' class='label'>Make your URL: </td>
<td valign='top'>careps.com/proj/&nbsp;<input type='text' name='proj_url' value='<?php echo $_POST['proj_url']; ?>' maxlength="50"/>
     <p style="color:red;"><?php echo $error_info4; ?></p>
</td>
</tr>

<!-- Attached File --> 
<tr>
<td valign='top' class='label'>Attach your Project Proposal: <br><i>If applicable</i> </td>
<td valign='top'><input type='file' name='proj_file'/>
     <p style="color:red;"><?php echo $error_info5; ?></p>
</td>
</tr>

<!-- Role --> 
<tr>
<td valign='top' class='label'>What is your Role? </td>
<td valign='top'><input type='text' name='usr_role' value='<?php echo $_POST['usr_role']; ?>' placeholder="eg. Team Leader/Mentor/Guide/Teacher..."/>
</td>
</tr>

<!-- Agreement --> 
<tr>
<td valign='top' class='label'></td>
<td valign='top'>
    <input type='checkbox' name='usr_agreement' value="agree"/> I Agree to the Page Terms and I am Authorized to Create this Project.
     <p style="color:red;"><?php echo $error_info6; ?></p>
</td>
</tr>

<tr>
<td valign='top'></td>
<td valign='top'><input type='submit' value='<?php echo $create_button; ?>' class='wallbutton'/>&nbsp;&nbsp;&nbsp;
    <input type="reset" value="Reset" class="wallbutton">

</td>
</tr>

</table>
</form>

</div>