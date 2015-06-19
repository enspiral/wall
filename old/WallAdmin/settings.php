<?php
include_once 'includes.php';
include_once 'includes/AdminUser.php';
$AdminUser = new AdminUser($db);

$settings=1;
$msg="";
$pmsg="";
$qmsg="";
$a='';
//Change Password
if(isSet($_POST['newPassword']) && isSet($_POST['confirmPassword']))
{
$npassword=$_POST['newPassword'];
$cpassword=$_POST['confirmPassword'];
if($npassword==$cpassword)
{
if(strlen($npassword)>7)
{
$l=$AdminUser->ChangePassword($npassword,$session_admin_uid);
if($l)
{
$msg="New password saved.";
$a='has-success';
}

}
else
{
$msg="Password minimum 8 characters.";
$a='has-error';
}
}
else
{
$msg="Give valid New password and Confirm password.";
$a='has-error';
}
}

//Image Configuration

if(isSet($_POST['NewsFeedPerPage']) && isSet($_POST['notifications']))
{
$NewsFeedPerPage=$_POST['NewsFeedPerPage'];
$notifications=$_POST['notifications'];
$friends=$_POST['friends'];
$friendsWidget=$_POST['friendsWidget'];
$photos=$_POST['photos'];
$groups=$_POST['groups'];
$admin=$_POST['admin'];
$forgot=$_POST['forgot'];


if($NewsFeedPerPage>=10 && $notifications>=20 && $friends>=20 && $friendsWidget>=20 && $photos>=20 && $groups>=5 && $admin>=10 && strlen($forgot)>=3 )
{

$data=$WallAdmin->Perpage_Config($NewsFeedPerPage,$notifications,$friends,$friendsWidget,$photos,$groups,$admin,$forgot);
$pmsg="Updated Successfully.";
}
else
$pmsg="Give minimum values.";
}


//Confiugration

if(isSet($_POST['UploadImageSize']) && isSet($_POST['banner']) && isSet($_POST['profile']))
{
$uploadimage=$_POST['UploadImageSize'];
$banner=$_POST['banner'];
$profile=$_POST['profile'];
$gravatar=$_POST['gravatar'];
if($uploadimage>0 && $banner>=860 && $profile>=100 && strlen($gravatar)>0)
{
$data=$WallAdmin->Image_Config($uploadimage,$banner,$profile,$gravatar);
$qmsg="Updated Successfully.";
}
else
$qmsg="Give minimum values.";

}
/* Configurations   */
$Get_Configurations=$WallAdmin->Get_Configurations();
$perpage=$Get_Configurations['newsfeedPerPage']; // Updates perpage
$notifications_perpage=$Get_Configurations['notificationPerPage']; // Notification perpage
$gravatar=$Get_Configurations['gravatar']; // 0 false 1 true gravatar image
$rowsPerPage=$Get_Configurations['friendsPerPage']; //friends list
$photosPerPage=$Get_Configurations['photosPerPage']; //Photos list
$groupsList=$Get_Configurations['groupsPerPage']; //friends list
$uploadImageSize=$Get_Configurations['uploadImage']; // Update image file size
$TimelineBannerPX=$Get_Configurations['bannerWidth']; //Timeline banner pixel size
$TimelineProfilePX=$Get_Configurations['profileWidth']; //Timeline banner pixel size
$friend_widget_list_count=$Get_Configurations['friendsWidgetPerPage'];
$admin_perpage=$Get_Configurations['adminPerPage']; // Updates perpage
$forgot=$Get_Configurations['forgot']; // Updates perpage

?>
<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once("header.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           <?php include_once("menu.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Settings

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 <div class="row">
                        <!-- left column -->

                        <!-- right column -->





						   <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Per Page Configurations</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="" name="perPage">
                                    <div class="box-body">
                                        <div class="form-group">



                                            <label for="exampleInputEmail1">News Feed</label>
                                            <input type="text" class="form-control" name="NewsFeedPerPage" value="<?php echo $perpage; ?>">
                                        </div>
										 <div class="form-group">
                                            <label for="exampleInputPassword1">Notifications</label>
                                            <input type="text" class="form-control" name="notifications" value="<?php echo $notifications_perpage; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Friends</label>
                                            <input type="text" class="form-control" name="friends" value="<?php echo $rowsPerPage; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Friends Widget</label>
                                            <input type="text" class="form-control" name="friendsWidget" value="<?php echo $friend_widget_list_count; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Photos</label>
                                            <input type="text" class="form-control" name="photos" value="<?php echo $photosPerPage; ?>">
                                        </div>
										<div class="form-group">
                                            <label for="exampleInputPassword1">Groups</label>
                                            <input type="text" class="form-control" name="groups" value="<?php echo $groupsList; ?>">
                                        </div>

										<div class="form-group">
                                            <label for="exampleInputPassword1">Admin Per Page</label>
                                            <input type="text" class="form-control" name="admin" value="<?php echo $admin_perpage; ?>">
                                        </div>

										<div class="form-group">
                                            <label for="exampleInputPassword1">Forgot Code Key</label>
                                            <input type="text" class="form-control" name="forgot" value="<?php echo $forgot; ?>">
											<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $pmsg; ?></label>
                                        </div>




                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-success" value="Save Changes" />
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->



						 <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Change Admin Password</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="" name="changePassword">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" name="newPassword" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword" placeholder="">

								<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $msg; ?></label>
                                        </div>


                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                        <input type="submit" class="btn btn-success" value="Change Password" />
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (left) -->

						 <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Image Configurations</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="" name="imageConf">
                                    <div class="box-body">


										<div class="form-group">
                                            <label for="exampleInputPassword1">Upload Image Size</label>

                                      <select class="form-control" name="UploadImageSize">
									   <option value=''>Select</option>
									  <?php
									  for($i=1;$i<=10;$i++)
									  {
									  $v=$uploadImageSize/1024;
									  if($v==$i)
									  echo  "<option value='".$i."' selected >".$i." MB</option>";
									  else
									  echo  "<option value='".$i."'>".$i." MB</option>";

									  }
									  ?>




                                      </select>


                    </div>

										<div class="form-group">
                                            <label for="exampleInputPassword1">Timeline Banner Pixel Width</label>
                                            <input type="text" class="form-control" name="banner" placeholder="" value="<?php echo $TimelineBannerPX; ?>">
                                        </div>

										<div class="form-group">
                                            <label for="exampleInputPassword1">Profile Pixel Width</label>
                                            <input type="text" class="form-control" name="profile" placeholder="" value="<?php echo $TimelineProfilePX; ?>">


                    </div>
<div class="form-group">
                                            <label for="exampleInputPassword1">	Gravatar</label>
											<?php if($gravatar)
											{
										?>
										<input type="radio"  class="form-control" name="gravatar" value='1' style="width:20px !important" checked="checked"/> Yes

										<input class="form-control" type="radio" name="gravatar" value='0' style="width:20px !important"/> No
										<?php
											}
											else
											{
											?>
											<input type="radio"  class="form-control" name="gravatar" value='1' style="width:20px !important;" /> Yes &nbsp;&nbsp;&nbsp;&nbsp;

											<input class="form-control" type="radio" name="gravatar" value='0' style="width:20px !important;" checked="checked"/> No
											<?php
											}
											?>



                                             <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?php echo $qmsg; ?></label>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-success" value="Save Changes" />
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </div><!--/.col (left) -->



                    </div>



                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->




    </body>
</html>
