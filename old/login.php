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
            if(strcmp($status, 'approved')==0){
                $_SESSION['login']=true;
                header("Location:index.php");
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
    <body>
        <div class="container login">
            <div class="omb_login">
                <h3 class="omb_authTitle">Login or <a href="<?php echo $base_url;?>cps_registration.php">Sign up</a></h3>
                <div class="row omb_row-sm-offset-3 omb_socialButtons">
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" data-toggle="modal" data-target="#comingsoon" class="btn btn-lg btn-block omb_btn-facebook">
                            <i class="glyphicon glyphicon-facebook visible-xs"></i>
                            <span class="hidden-xs">Facebook</span>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" data-toggle="modal" data-target="#comingsoon" class="btn btn-lg btn-block omb_btn-twitter">
                            <i class="fa fa-twitter visible-xs"></i>
                            <span class="hidden-xs">Twitter</span>
                        </a>
                    </div>	
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" data-toggle="modal" data-target="#comingsoon" class="btn btn-lg btn-block omb_btn-google">
                            <i class="fa fa-google-plus visible-xs"></i>
                            <span class="hidden-xs">Google+</span>
                        </a>
                    </div>	
                </div>

                <div class="row omb_row-sm-offset-3 omb_loginOr">
                    <div class="col-xs-12 col-sm-6">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">or</span>
                    </div>
                </div>

                <div class="row omb_row-sm-offset-3">
                    <div class="col-xs-12 col-sm-6">	
                        <form class="omb_loginForm" action="" autocomplete="off" method="POST" name="login">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" name="user" placeholder="Email address" required="">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input  type="password" class="form-control" name="passcode" placeholder="Password" required="">
                            </div>
                            <div class="row omb_row-sm-offset-3">
                                <div class="col-xs-12 col-sm-3">
                                    <label class="checkbox">
                                        <input type="checkbox" value="remember-me">Remember Me
                                    </label>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <p class="omb_forgotPwd">
                                        <a href="forgot.php">Forgot password?</a>
                                    </p>
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                        </form>
                    </div>
                </div>	    	
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



