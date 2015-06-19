<style>
    .active{
        background-color: #2AA9DE;
        color:white;
    }
    #nav-group ul li .active:hover,#nav-group ul li .active:focus{
        color:white;
    }
    
</style>
</style>

<!-- Timeline Group Nav -->
<div  id="nav-group">
    <div id="timelineButtons">
        <?php
        include('group_follow_buttons.php');
        
        $managetab = $Wall->manageTab($groupID);
        
        if($_GET['ptab']){
            $tab = $_GET['ptab'];
        }else{
            $tab= "";
        }
        
        ?>      
        
    </div>
    <ul>
        <?php if($data.$managetab['home'] ==1 ){ ?><li><a class='<?php echo $tab=="home" || $tab==''?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=home">Home</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['ourwork'] ==1 ){ ?><li><a class='<?php echo $tab=="contents"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contents">Our Work</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['ourteam'] ==1 ){ ?><li><a class='<?php echo $tab=="team"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=team">Our Team</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['beneficiaries'] ==1 ){ 
        	?><li><a class='<?php echo $tab=="beneficiary"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=beneficiary">Beneficiary</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['recruitment'] ==1 ){ ?><li><a class='<?php echo $tab=="recruitment"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=recruitment">Recruitment</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['support'] ==1 ){ ?><li><a class='<?php echo $tab=="donate"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=donate">Support Us</a></li><?php }else{echo "";} ?>
        <?php if($data.$managetab['contact'] ==1 ){ ?><li><a class='<?php echo $tab=="contact"?"active":""; ?>' href="<?php echo $base_url; ?>group.php?gid=<?php echo $groupID; ?>&ptab=contact">Contact</a></li><?php }else{echo "";} ?>
        
        
    </ul>
    <?php if($loginCheck){?>
    <ul class="text-right menu-right">
        <li><button type="button" class="btn btn-xs btn-primary manage-tab" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Manage tab</button></li>
    </ul>
    <?php } ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tab Management</h4>
      </div>
      <div class="modal-body">
         
            <div class="checkbox">
              <label>
                  <input type="checkbox" id="tab_home" name="tab_home" <?php echo $data.$managetab['home'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['home']; ?>"/>Home
              </label>
            </div>
            <div class="checkbox">
              <label>
                  <input type="checkbox" id="tab_ourwork" name="tab_ourwork" <?php echo $data.$managetab['ourwork'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['ourwork']; ?>"/>Our Work
              </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="tab_ourteam" name="tab_ourteam" <?php echo $data.$managetab['ourteam'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['ourteam']; ?>"/>Our Team
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="tab_beneficiary" name="tab_beneficiary" <?php echo $data.$managetab['beneficiaries'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['beneficiaries']; ?>"/> Beneficiary
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="tab_recruitment" name="tab_recruitment" <?php echo $data.$managetab['recruitment'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['recruitment']; ?>"/> Recruitment
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="tab_support" name="tab_support" <?php echo $data.$managetab['support'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['support']; ?>"/> Support Us
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="tab_contact" name="tab_contact" <?php echo $data.$managetab['contact'] ==1 ?"checked":"" ?> value="<?php echo $data.$managetab['contact']; ?>"/> Contact
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="submit" name="save" class="btn btn-primary">Save</button>
            </div>
       
      </div>
    </div>
  </div>
</div>


<script>
    $('#submit').click(function(){
         $.ajax({
           type: "POST",
           url: "<?php echo $base_url; ?>project/ajax-project.php",
           data:{
               home:$('#tab_home').val(),
               id:<?php echo $groupID; ?>,
               our_work:$('#tab_ourwork').val(),
               tab_beneficiary:$('#tab_beneficiary').val(),
               our_team:$('#tab_ourteam').val(),
               tab_recruitment:$('#tab_recruitment').val(),
               tab_support:$('#tab_support').val(),
               tab_contact:$('#tab_contact').val(),
               post_name:'manage_tab',
               
           }, 
           success: function(data)
           {
              location.reload();
              //alert(data);
           },error:function(data){
               alert("Sorry, you have no permission to access this module.");
           }
         });

        return false;
    });
    $("#tab_home").change(function(){
        if ( this.checked ){
            $("#tab_home").attr("value", 1);
        }else{
            $("#tab_home").attr("value", 0);
        }
    });    
   
    $("#tab_ourwork").change(function(){
       if(this.checked){
           $("#tab_ourwork").attr("value", 1);
       }else{
           $("#tab_ourwork").attr("value", 0);
       }
    });
    $("#tab_ourteam").change(function(){
       if(this.checked){
           $("#tab_ourteam").attr("value", 1);
       }else{
            $("#tab_ourteam").attr("value", 0);
       }
    });
    $("#tab_beneficiary").change(function(){
       if(this.checked){
            $("#tab_beneficiary").attr("value", 1);
       }else{
           $("#tab_beneficiary").attr("value", 0);
       }
    });
    $("#tab_recruitment").change(function(){
       if(this.checked){
           $("#tab_recruitment").attr("value", 1);
       }else{
           $("#tab_recruitment").attr("value", 0);
       }
    });
    $("#tab_support").change(function(){
       if(this.checked){
           $("#tab_support").attr("value", 1);
       }else{
           $("#tab_support").attr("value", 0);
       }
    });
    $("#tab_contact").change(function(){
       if(this.checked){
           $("#tab_contact").attr("value", 1);
       }else{
           $("#tab_contact").attr("value", 0);
       }
    });
    
    
    
    
    
</script>