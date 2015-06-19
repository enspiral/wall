<?php
include_once 'includes.php';
if($_GET['msgID'])
{
$msg_id=$_GET['msgID'];
$username=$Wall->Status_User($msg_id);
include_once 'public.php';
$msgid=$Wall->Status_ID($msg_id);

if(empty($msg_id))
{

header("Location:$url404");
}
}
else
{
header("Location:$url404");
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php include_once 'project_title.php';
include_once 'js.php';
?>
</head>
<!--<body>
<?php //include_once 'block_logo_menu.php'; ?>
<div id='main'>
		<div id='main_left'>
			<?php
			//include_once 'block_left.php';
      ?>
		</div>

		<div id="main_right">
	   <?php
// Loading Status Message
//include('message_status_load.php');
?>
	    </div>



<?php //include_once 'block_footer.php';?>
</div>
</body>-->
 <body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header.php'; ?>
                <div class="div-content">
                    
                    <div class="row">
                        <div class="col-lg-3 sidebar-left">
                            <?php //include_once 'block_left_dashboard.php'; ?>
                        </div>
                        <div class="col-lg-6 middle-content">
                            <?php
                            include('message_status_load.php'); 
                            ?>
                        </div>
                        <div class="col-lg-3 sidebar-right">
                            <?php include_once 'block_right.php'; ?>
                        </div>
                    </div>
                    
               
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>
