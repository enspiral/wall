<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once '../includes/db.php';
include_once 'includes/AdminUser.php';
session_start();
$session_uid=$_SESSION['admin_id'];
if(!empty($session_uid))
{
header("location:home.php");
}

$AdminUser = new AdminUser($db);

//Login
$login_error='';
if($_POST['username_admin'] && $_POST['password_admin'] )
{
$username=$_POST['username_admin'];
$password=$_POST['password_admin'];

if (strlen($username)>0 && strlen($password)>0)
{
$login=$AdminUser->User_Login($username,$password);

if($login)
{
$_SESSION['admin_id']=$login;
$url=$admin_base_url.'home.php';
header("Location:$url");
}
else
{
$login_error="<span class='error'>Username or Password is invalid</span>";
}
}
}
?>
<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="../images/logo.png"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->


            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">



           <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Admin Login</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" autocomplete="off" method="post" action="">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username or Email Address</label>
                                            <input type="username" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="username_admin" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_admin" autocomplete="off">
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
        </div><!-- ./wrapper -->




    </body>
</html>