<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';


?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php include_once 'project_title.php';
include_once 'js.php';
?>
 <style>
     .sub-menu1, .sub-menu2, sub-menu3{
         float: left;
         width:320px;
         height: 320px;
         margin-bottom:30px;
        // background-color: red;
     }
     .sub-menu1, .sub-menu2{
          margin-right:10px;
     }
     
     img.proj_type{
         width:300px;
         height:300px;
     }
     
     
 </style>
</head>
<body>
<?php include_once 'block_logo_menu.php'; ?>
<div id='main'>
    <h3 style="margin-bottom:20px; margin-top:50px;"><center>Choose Project Type</center></h3>
    <div class="sub-menu1">
        <center><a href="<?php echo $base_url; ?>cps_createProject.php"><img class="proj_type" src="images/travel-img.jpg"></img></a>
        <a href="#"><p>Visitors/Tourist</p></a></center>
    </div>
    <div class="sub-menu2">
         <center><a href="<?php echo $base_url; ?>cps_createProject.php"><img class="proj_type" src="images/tour-img.jpg"></img></a>
         <a href="#"><p>Visitors/Tourist</p></a></center>
    </div>
    <div class="sub-menu3">
         <center><a href="<?php echo $base_url; ?>cps_createProject.php"><img class="proj_type" src="images/community-img.jpg"></img></a>
         <a href="#"><p>Visitors/Tourist</p></a></center>
    </div>
    <!--a href="cps_report.php"> export the database table </a-->


<?php include_once 'block_footer.php';?>
</div>



</body>
</html>
