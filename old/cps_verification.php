<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
include_once 'includes/Wall_Updates.php';
session_start();
$session_uid = $_SESSION['uid'];
if($_SESSION['login'])
{
header("location:index.php");
}
if(empty($session_uid)){
    header("location:login.php");
}

$User = new User($db);
$Wall = new Wall_Updates($db);
/* Verification */
$reg_error='';
$verification_code='';
if(isset($_POST['submit-for-verify']))
{
    $code = $_POST['usr_code'];
    $verification_code = $Wall->verify_code($session_uid);
    if(strcmp($code, $verification_code)==0){       
       $verification_status = $Wall->verify_status($session_uid);
        $uid = $session_uid;
        $_SESSION['login']=true;
        header("Location:index.php");
    }else{
         $reg_error = "Your code is not correct!";
    }
}
if(isset($_POST['resend'])){
     $length = 10;
     $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    //    $to = $email;
     $to = "lzr.lizhirong@gmail.com";
     $subject = 'Mail Verification';
     $headers = "From: CPS Admin";
     $txt = "Dear ".$username.",\n\n"."Here is the code for verification:"."\n".$randomString."\n\n"."Thanks,\nCPS Teams";
     mail($to,$subject,$txt,$headers);
     $verification_code = $Wall->update_verify_code($session_uid, $randomString);
}
?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <title>CPS - Verification</title>
 <meta charset="utf-8">
<?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
</head>

<body style="background-color: #fbfbfb;">
    <div class="header">
        <h3 class="text-center">Verification</h3>
    </div><hr/>
    <div class="table-form registration" id="" align="center">
        <form method="post" action="" name="verification" id="verification">
            <table>
                <tr>
                    <td colspan="2"class="text-center">We have sent you a code for verification. Please enter your code here!</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">Code:
                        <input type="text" name="usr_code" class="text-input" AUTOCOMPLETE='OFF'/>
                    </td>
                </tr>
                
            </table><br/>
            <div class="error_message"><p class="text-danger"><?php echo $reg_error; ?></p></div>
            <input type="submit" class="wallbutton" name="submit-for-verify" value="Submit" />
            <input type="reset" value="Reset" class="wallbutton"><br><br>
            
            
            <a>Could not find your code? </a>
            <input type="submit" class="wallbutton" value="Resend" name="resend"/>
             
        </form>
    </div><br/><br/>
</body>
</html>
