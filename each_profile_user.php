<script  src="<?php echo $base_url; ?>js/lib-scrool/1.6.1.jquery.min.js"></script>
<script type='text/javascript'> var $jm161 = jQuery.noConflict();</script>
<script>
$jm161(document).ready(function(){
    $jm161(".list_project").hide();
    $jm161(".readmore_pro").click(function(){
        $jm161(".list_project").slideToggle("slow");
        $jm161(".readmore_pro").hide();
    });
    $jm161(".list_org").hide();
    $jm161(".readmore_org").click(function(){
        $jm161(".list_org").slideToggle("slow");
        $jm161(".readmore_org").hide();
    });
    $jm161(".list_com").hide();
    $jm161(".readmore_com").click(function(){
        $jm161(".list_com").slideToggle("slow");
        $jm161(".readmore_com").hide();
    });
    $jm161(".list_pfollow").hide();
    $jm161(".readmore_pfollow").click(function(){
        $jm161(".list_pfollow").slideToggle("slow");
        $jm161(".readmore_pfollow").hide();
    });
});
</script>

<style>
    .profile{
        background: white;
        border-radius: 5px;
        padding:40px;
        padding-top: 10px;
        box-shadow: 0px 0px 2px #888888;
    }
    
    .profile .table td{
        border: none;
    }
    
    .profile .table .btn{
        border-radius: 4px;
    }
    .profile .table .img-circle{
        border-radius: 50%;
    }
    .profile .bootstrap-tagsinput{
        border-radius: 0px;
        width:100%;
    }
</style>
<?php
$each_profile_id=$_GET['profile_id'];

?>
<?php 

$userdetails=$Wall->User_Details($each_profile_id);
$username=$userdetails['username'];
$email=$userdetails['email'];
$full_name=$userdetails['full_name'];
$profile_pic=$userdetails['profile_pic'];
$contact=$userdetails['phone'];
$usr_about = $userdetails['bio'];
$usr_skills=$userdetails['skills'];
$usr_interest=$userdetails['interest'];
$birthday=$userdetails['birthday'];
$country=$userdetails['country'];
$address=$userdetails['address'];
$fname=$userdetails['first_name'];
$lname=$userdetails['last_name'];

if($username)
{
    $project_follow=$Wall->getProject_follow($each_profile_id); //uid
    //$community_follow = $Wall->getCommunity_follow($uid);
   // $getProject_participate = $Wall->getProject_participate($uid);
}
?>


    
    <?php if($each_profile_id != $uid){?>
    <div class="row">
    		<div class="sidebar-left">
    		<?php include_once 'block_profile_each_user.php';?>
    		</div>

    		<?php include_once('profiles/each_profile.php');?>
    			<div class="sidebar-right-dabshoard">
			        <?php include_once 'block_right.php'; ?>
			        <p class="back-top">
			            <a href="#top"><span></span></a>
			        </p>
   			 </div>
   	</div>
    	<?php }else{?>
    	<div class="row">
    	<div class="sidebar-left">
    	<?php include_once 'block_left_dashboard.php';?>
       </div>
       <div class="middle-content" id="top">
    	<?php include_once('profiles/own_profile.php'); ?>
       </div>
       <div class="sidebar-right-dabshoard">
        <?php include_once 'block_right.php'; ?>
           </div></div>
    	<?php } ?>
        <?php //include_once 'block_profile_each_user.php'; ?>


<script> 
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
    
    $("input.usr_skills").val();
    $("input.usr_skills").tagsinput('items');
    
    $("input.usr_interest").val();
    $("input.usr_interest").tagsinput('items');
    
    $('.glyphicon-pencil').css('cursor','pointer');
    
    $('.update-profile').click(function(){
        var about = $('#about').val();
        var contact = $('#contact').val();
        var email = $('#email').val();
        var skills = $('#skills').val();
        var interest = $('#interest').val();
        var birthday = $('#birthday').val();
        var country = $('#countrys').val();
        var address = $('#address').val();
        var first_name = $('#fname').val();
        var last_name = $('#lname').val();
   
        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>project/ajax-project.php',
            data:{
               about    :about,
               contact  :contact,
               email    :email,
               skills    :skills,
               interest  :interest,
               birthday   :birthday,
               country    :country,
               address    :address,
               first_name :first_name,
               last_name  :last_name,
               uid      : "<?php echo $uid; ?>",
               post_type:'edit_profile',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });

</script>
<script>
    $("#birthday").datepicker({
        format: 'yyyy-mm-dd'
    });
</script>