
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
     <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>css/tooltip/tooltipster.css" />
<script type="text/javascript" src="<?php echo $base_url;?>js/tooltip/jquery.tooltipster.js"></script>
<script>
        $(document).ready(function() {
             $('[data-tooltip="tooltip"]').tooltipster();    
        });
    </script> 
      <script type="text/javascript" src="<?php echo $base_url.'js/popup-window.js' ?>"></script>
      <script  src="<?php echo $base_url; ?>js/lib-scrool/1.6.1.jquery.min.js"></script>
<script type='text/javascript'> var $jq = jQuery.noConflict();</script>
      <script>

  //// hide #back-top first
  $jq(".back-top").hide();
  
  //// fade in #back-top
  $jq(function () {
    $jq(window).scroll(function () {
      if ($jq(this).scrollTop() > 100) {
        $jq('.back-top').fadeIn();
      } else {
        $jq('.back-top').fadeOut();
      }
    });

    //// scroll body to 0px on click
    $jq('.back-top a').click(function () {
      $jq('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });
  });

 </script>

<?php 

$userdetails=$Wall->User_Details($uid);
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
    $project_follow=$Wall->getProject_follow($uid); //uid
    $community_follow = $Wall->getCommunity_follow($uid);
    $getProject_participate = $Wall->getProject_participate($uid);
}
?>



<div class="row">
    <div class="sidebar-left">
        <?php include_once 'block_left_dashboard.php'; ?>
    </div>
    <div class="middle-content" id="top">
        <?php include_once('profiles/own_profile.php');?>
    </div>
    <div class="sidebar-right-dabshoard">
        <?php include_once 'block_right.php'; ?>
        <p class="back-top">
            <a href="#top"><span></span></a>
        </p>
    </div>
</div>


<script>     
    ang("input.usr_skills").val();
    ang("input.usr_skills").tagsinput('items');
    
    ang("input.usr_interest").val();
    ang("input.usr_interest").tagsinput('items');
    
    ang('.glyphicon-pencil').css('cursor','pointer');
    
    ang('.update-profile').click(function(){
        var about = ang('#about').val();
        var contact = ang('#contact').val();
        var email = ang('#email').val();
        var skills = ang('#skills').val();
        var interest = ang('#interest').val();
        var birthday = ang('#birthday').val();
        var country = ang('#countrys').val();
        var address = ang('#address').val();
        var first_name = ang('#fname').val();
        var last_name = ang('#lname').val();
   
        ang.ajax({
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