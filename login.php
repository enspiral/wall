<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
session_start();
$session_uid=$_SESSION['uid'];
$_SESSION['login']=false;
if($_SESSION['login'])
{
header("location:index.php");
}

$User = new User($db);

//Login
$login_error='';
if($_POST['user'] && $_POST['passcode'] )
{
    $username=$_POST['user'];
    $password=$_POST['passcode'];
    if (strlen($username)>0 && strlen($password)>0)
    {
    $login=$User->User_Login($username,$password);

        if($login)
        {
        $_SESSION['uid']=$login;
        $status = $User->User_Status($_SESSION['uid']);
        echo $status;
            if(strcmp($status,'approved')==0){
                $_SESSION['login']=true;
                $user_type = $User->User_type($_SESSION['uid']);
                $_SESSION['user_role'] = $user_type; 
                if($user_type==1){
                    header("Location:index.php");
                }else if($user_type=='2'){
                    header("Location:community.php");
                }
                //header("Location:index.php");
            }else if(strcmp($status, 'pending')==0){
                header("Location:cps_verification.php");
            }else{
                $login_error="<span class='error'>Username or Password is invalid</span>";
             }
        }
    }
}else{
    $reg_error="<span class='error'>Give valid Email/Username and Password.</span>";
    
}


?>
<html lang='en'>
    <head>
        <title>CPS - Login</title>
     <meta charset="utf-8">
        <?php
            include './js.php';
        ?>
     <style>

        @media (min-width: 768px) {
            .omb_row-sm-offset-3 div:first-child[class*="col-"] {
                margin-left: 25%;
            }
        }

        .omb_login .omb_authTitle {
            text-align: center;
            line-height: 300%;
            font-weight: bold;
        }

        .omb_login .omb_socialButtons a {
                color: white;  
                opacity:0.9;
        }
        .omb_login .omb_socialButtons a:hover {
            color: white;
                opacity:1;    	
        }
        .omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
        .omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
        .omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


        .omb_login .omb_loginOr {
                position: relative;
                font-size: 1.5em;
                color: #aaa;
                margin-top: 1em;
                margin-bottom: 1em;
                padding-top: 0.5em;
                padding-bottom: 0.5em;
        }
        .omb_login .omb_loginOr .omb_hrOr {
                background-color: #cdcdcd;
                height: 1px;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
        }
        .omb_login .omb_loginOr .omb_spanOr {
                display: block;
                position: absolute;
                left: 50%;
                top: -0.6em;
                margin-left: -1.5em;
                background-color: white;
                width: 3em;
                text-align: center;
              
        }			

        .omb_login .omb_loginForm .input-group.i {
                width: 2em;
        }
        .omb_login .omb_loginForm  .help-block {
            color: red;
        }


        @media (min-width: 768px) {
            .omb_login .omb_forgotPwd {
                text-align: right;
                        margin-top:10px;
                }		
        }
        .container{
            height:100%;
        }
     </style>
    </head>
    <div class="registration-header">
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    <a href="http://cpsystem.codingate.net/singapore"><img src="images/logo.png"></a>
                <div class="static_menus">
                 
                  <ul class="nav nav-tabs static-tab">
                    <li><a href="http://www.volunteerbetter.com/about" target="_blank">About</a></li>
                    <li><a href="http://www.volunteerbetter.com/our_mission/" target="_blank">Our Mission</a></li>
                    <li><a href="http://www.volunteerbetter.com/our-work/" target="_blank">Our Work</a></li>
                    <li><a href="http://www.volunteerbetter.com/join-us/" target="_blank">Join Us</a></li>
                    <li><a href="http://www.volunteerbetter.com/contact/" target="_blank">Contact Us</a></li>
                 </ul>
                </div>
            </div>
                 <!-- <button class="btn-primarybtn-block"><a href="<?php //echo $base_url;?>">Login</a></button> -->
            </div>
        </div>
    </div>
    <body>
         <div class="table-form registration">
         <div class="bg-regester" style="width: 60%;background-color: #fff;text-align: center;margin-left: 235px;">

            <div class="omb_login">
                <h3 class="omb_authTitle">CARE POSITIONING SYSTEM </h3> <!--<a href="<?php //echo $base_url;?>cps_registration.php">Sign up</a>-->
                 <hr style="width: 41%;margin-left: 240px; margin-top: -11px;">
                 <h4 style="color: #898B90;">Please Login to use your CPS Account</h4>
                <div class="row omb_row-sm-offset-3">
                    <div class="col-xs-12 col-sm-6">	
                        <form class="omb_loginForm" action="" autocomplete="off" method="POST" name="login">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="user" placeholder="E-mail" required="">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  type="password" class="form-control" name="passcode" placeholder="Password" required="">
                            </div>
                            <br/>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                            <br/>
                            <div class="row">
                                <div class="create_account account-color"><h4><a href="<?php echo $base_url.'cps_registration.php';?>">Create New Account</a></h4></div>
                                <div class="forget_pass account-color"><h4><a href="forgot.php">Forgot password?</a></h4></div>
                            </div>
                            <br/>
                            <div class="row omb_row-sm-offset-3">
                                 <h5 style="color: #898B90;">
                                    You can login to get watch only access using social accounts</h5>
                                </div> 
                           
                            </div>

                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                    <div class="col-xs-4 col-sm-3">
                        <a href="#" data-toggle="modal" data-target="#comingsoon" class="btn btn-lg btn-block omb_btn-twitter">
                            <i class="fa fa-twitter visible-xs"></i>
                            <span class="hidden-xs">Facebook</span>
                        </a>
                    </div>  
                    <div class="col-xs-4 col-sm-3">
                        <a href="#" data-toggle="modal" data-target="#comingsoon" class="btn btn-lg btn-block omb_btn-google">
                            <i class="fa fa-google-plus visible-xs"></i>
                            <span class="hidden-xs">Google+</span>
                        </a>
                    </div>  
                </div>
            </form>
                    </div>
                </div>	
                <div>
                <img src="images/commnunities/bg_login.png" height="300px;" width="80%;">
            </div>    	
            </div>

        

    </body>
</html>
<div class="modal fade" id="comingsoon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body">
         
            <div class="text-center">
            	<h1>Coming Soon !!!</h1>
            </div>
                   
      </div>
    </div>
  </div>
</div>


