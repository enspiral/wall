<div>
    <select class="list_dashboard">
            <option class="selected" value="my_projects"> My Projects</option>
            <option value="villages_following"> Villages following</option>
            <option value="projects_following"> Projects following</option>
    </select>
</div>
<div class="content-list-dashboard">
    <div class="sub_list_dashboard my_projects">
        <?php
        $groupslist=$Wall->My_Groups_List($uid,'', '', 55,'');
        if($groupslist)
        {
        foreach($groupslist as $f)
        {
        $group_id=$f['group_id'];
        $group_owner=$f['uid_fk'];
        $group_name=$f['group_name'];
        $group_desc=$f['group_desc'];
        $group_name=htmlcode(nameFilter($group_name,25));
        $group_pic=$f['group_pic'];
        $group_pic=imageCheck($group_pic,$upload_path,$base_url);
        $edit=""; ?>
        <div class="dash_proj_wall_container">
        <?php 

        if($group_owner==$uid)
        {
        $edit='<a href="'.$base_url.'editGroup.php?id='.$group_id.'" class="edit" original-title="Edit Group"></a>';
        }

        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'groups/'.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
        echo $group_desc; ?>
        </div>
        <?php } 
        }
        ?>

        <input type='button' onClick="location.href='cps_createProject.php'" value='Create new project'>

        <h3 style="padding-top:20px;"> My Past Projects </h3>
        <?php
        $groupslist=$Wall->My_Groups_List($uid,'', '', 55,'');
        if($groupslist)
        {
        foreach($groupslist as $f)
        {
        $group_id=$f['group_id'];
        $group_owner=$f['uid_fk'];
        $group_name=$f['group_name'];
        $group_desc=$f['group_desc'];
        $group_name=htmlcode(nameFilter($group_name,25));
        $group_pic=$f['group_pic'];
        $group_pic=imageCheck($group_pic,$upload_path,$base_url);
        $edit=""; ?>
        <div class="dash_proj_wall_container">
        <?php 

        if($group_owner==$uid)
        {
        $edit='<a href="'.$base_url.'editGroup.php?id='.$group_id.'" class="edit" original-title="Edit Group"></a>';
        }

        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'groups/'.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
        echo $group_desc; ?>
        </div>
        <?php } 
        }
        ?>
    </div>
    <div class="sub_list_dashboard villages_following">Villages Following</div>
    
    <div class="sub_list_dashboard projects_following">
        <?php
        $groupslist=$Wall->Following_Groups_List($uid,'', '', 55,'');
        if($groupslist)
        {
        foreach($groupslist as $f)
        {
        $group_id=$f['group_id'];
        $group_owner=$f['uid_fk'];
        $group_name=$f['group_name'];
        $group_desc=$f['group_desc'];
        $group_name=htmlcode(nameFilter($group_name,25));
        $group_pic=$f['group_pic'];
        $group_pic=imageCheck($group_pic,$upload_path,$base_url);
        $edit=""; ?>
        <div class="dash_proj_wall_container">
        <?php 

        if($group_owner==$uid)
        {
        $edit='<a href="'.$base_url.'editGroup.php?id='.$group_id.'" class="edit" original-title="Edit Group"></a>';
        }

        echo '<div class="groupListDiv">'.$edit.'<a href="'.$base_url.'groups/'.$group_id.'" ><img src="'.$group_pic.'" class="groupIcon"><div class="groupSmallTitle">'.$group_name.'</div></a></div>';
        echo $group_desc; ?>
        </div>
        <?php } 
        }
        ?>

        <input type='button' onClick="location.href='cps_createProject.php'" value='Create new project'>

       
    </div>
</div>

<script>
$(".villages_following").hide();
$(".projects_following").hide();
$('.list_dashboard').change(function(){
    var selected = $(this).find(':selected');
    $('.sub_list_dashboard').hide();
   $('.'+selected.val()).show(); 
    $('.optionvalue').html(selected.html());
});
</script>

<style>
    .sub_list_dashboard {
        margin-top:20px;
    }   
    
    .list_dashboard {
        width: 268px;
        padding: 5px;
        font-size: 16px;
        line-height: 1;
        border: 0;
        border-radius: 5px;
        height: 34px;
        background: url(http://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/br_down.png) no-repeat right #ddd;
        -webkit-appearance: none;
        background-position-x: 244px;
      
    }
   
</style>