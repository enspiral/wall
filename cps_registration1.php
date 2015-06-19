<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
include_once 'includes/Wall_Updates.php';
session_start();
$session_uid=$_SESSION['uid'];
/*if(empty($session_uid))
{
header("location:login.php");
}*/

$User = new User($db);
$Wall = new Wall_Updates($db);


/* Registration Form Validation */
$validation = true;
$reg_error='';
$reg_error1=''; $reg_error2=''; $reg_error3='';
$reg_error4=''; $reg_error5=''; $reg_error6='';
$reg_error7=''; $reg_error8=''; $reg_error9='';
$message_registration='';

if(isset($_POST['submit']) & $_SERVER['REQUEST_METHOD'] == "POST")
{
    // First name, Last name, Username
    $firstname = $_POST['usr_first_name'];
    $lastname=$_POST['usr_last_name'];
    $username = $_POST['usr_name'];
  
    if(strlen($firstname)<=0){
        $reg_error1 = 'This field is required!';
        $validation = false;
    }
    if(strlen($lastname)<=0){
        $reg_error2 = 'This field is required!';
        $validation = false;
    }
    if(strlen($username)>0){
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        if ($username_check<0) {
            $reg_error6 = 'Invalid username!';
            $validation = false;
        }else{
           // $register_id = 0;
            $register_id = $Wall->existing_username($username);
            if($register_id!=0){
                $reg_error6 = 'Username already exists!';
                $validation = false;
            }
        }
    }else{
        $reg_error6 = 'This field is required!';
        $validation = false;
    }
    // Email
    $email = $_POST['usr_email'];
    $phone = $_POST['usr_phone'];
    if(strlen($email)>0){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $reg_error3 = "Invalid email!";
             $validation = false;
        }else{
            $check_id = $Wall->existing_mail($email);
            if($check_id>0){
                $reg_error3 = 'Email already exists!';
                $validation = false;
            }
        }
    }else{
        $reg_error3 = 'This field is required!';
         $validation = false;
    }
    if(strlen($phone<=0)){
       
        $reg_error4 = "This field is required!";
    }
    /*
    // Province, City
    $province = $_POST['usr_province'];
    $city=$_POST['usr_city'];
  
    if(strlen($province)>0){
        if (!preg_match("/^[a-zA-Z]*$/",$province)) {
            $reg_error5 = 'Incorrect value!';
            $validation = false;
        }
    }else{
        $reg_error5 = 'This field is required!';
        $validation = false;
    }
    if(strlen($city)>0){
        if (!preg_match("/^[a-zA-Z]*$/",$city)) {
            $reg_error6 = 'Incorrect last name!';
            $validation = false;
        }
    }else{
        $reg_error6 = 'This field is required!';
        $validation = false;
    }*/
    
    //Password
    $password = $_POST['usr_pwd'];
    $password2 = $_POST['usr_verify_pwd'];
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
    if(strlen($password)>0){
         if ($password_check<0) {
            $reg_error7 = 'Invalid password (Minimum 6 Characters)!';
            $validation = false;
        }
    }else{
        $reg_error7 = 'This field is required!';
        $validation = false;
    }
    if(strlen(password2)>0){
        if($password != $password2){
            $reg_error8 = "Password doesn not match!";
            $validation = false;
        }
    }else{
        $reg_error8 = 'This field is required!';
        $validation = false;
    }
    // Birthday
    $usr_bd = $_POST['usr_bd'];
    if(strlen($usr_bd)<=0){
        $reg_error9 = "This field is required!";
        $validation = false;
    }
    // Country
    if(strlen($_POST['usr_country'])<0){ 
    //    $reg_error11 = $_POST['usr_country'];
        $reg_error5 = "This field is required!";
    }
    
    // Captcha
    if(strlen($_POST['6_letters_code'])>0){
        if(empty($_SESSION['6_letters_code'] ) ||
            strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
        {
        //Note: the captcha code is compared case insensitively.
        //if you want case sensitive match, update the check above to
        // strcmp()
        $reg_error = "The captcha code does not match!";
        $validation = false;
        }
    }else{
        $reg_error = "The captcha code cannot be blank!";
        $validation = false;
    }
    
    
    
    // If the validation is true
    if($validation){
        $country = $_POST['usr_country'];
        $birthday = $_POST['usr_bd'];
    //    $postal_code = $_POST['usr_postal_code'];
        $address = $_POST['usr_add'];
        $account_type = $_POST['account_type'];
        $length = 10;
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        $reg=$User->CPS_User_Registration($firstname, $lastname, $email, $phone, $country, 
               $username, $password, $birthday, $address, $account_type, $randomString);
        
        $_SESSION['uid']=$reg;
         //   $message_registration = $address;
         //    echo "Information is correct!";
            
            
        
            //$to = $email;
            $to = "Admin@carepositioningsystem.org";
            $subject = 'Mail Verification';
            $headers = "From: CPS Admin";
            $txt = "Dear ".$username.",\n\n"."Here is the code for verification:"."\n".$randomString."\n\n"."Thanks,\nCPS Teams";
            mail($to,$subject,$txt,$headers);
        //    header("Location:index.php");
            header("Location:cps_verification.php");      
    }
}

?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <title>CPS - Registration</title>
 <meta charset="utf-8">
<?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
</head>

<body>
    <div class="container">
    <div class="registration-header">
        <div class="header">
            <div class="header-content">
                <div class="logo">
                    <a href="http://cpsystem.codingate.net/singapore"><img src="images/logo.png"></a>
                <div class="static_menus">
                 
                  <ul class="nav nav-tabs static-tab">
                    <li><a href="http://www.volunteerbetter.com/about">About</a></li>
                    <li><a href="http://www.volunteerbetter.com/our_mission/">Our Mission</a></li>
                    <li><a href="http://www.volunteerbetter.com/our-work/">Our Work</a></li>
                    <li><a href="http://www.volunteerbetter.com/join-us/">Join Us</a></li>
                    <li><a href="http://www.volunteerbetter.com/contact/">Contact Us</a></li>
                 </ul>
                </div>
            </div>
                 <button class="btn-primarybtn-block"><a href="<?php echo $base_url;?>">Login</a></button>
            </div>
        </div>
    </div>
    <div class="table-form registration">
        <div class="bg-regester">
        <form method="post" action="" name="sign_up" id="sign_up">
            <div style="background-color:#ffffff; text-align: center;">
                <h2 class="text-center register-text">Registration as a CPS Member here</h2>
                <hr style="width: 80%; text-align: center;margin-left: 121px;">

                <div class="row">
                    <div class="table-registeration">
                        <h3>Personal Information</h3>
                            <table>
                                
                                <tr>
                                    <td class="text-right">First Name: <label class="text-pink">*</label></td>
                                    <td>
                                        <input type="text" name="usr_first_name" id="usr_first_name" class="text-input form-control" value="<?php echo $_POST['usr_first_name'];?>" AUTOCOMPLETE='OFF'/>
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error1; ?></p></div></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Last Name: <label class="text-pink">*</label></td>
                                    <td>
                                        <input type="text" name="usr_last_name" class="text-input form-control" value="<?php echo $_POST['usr_last_name'];?>" AUTOCOMPLETE='OFF'/>
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error2; ?></p></div></td>
                                </tr>
                                 
                             <tr>
                                <td class="text-right"><div class="loginLabel">Gender: <label class="text-pink">*</label></div></td>
                                <td>
                                    <select class="input text-input form-control" name="account_type">
                                        <option selected="selected" value="0">-- Please select --</option>
                                        <option value="1">Female</option>
                                        <option value="2">Male</option>
                                        
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                            <td class="text-right"><div class="loginLabel">Date Of Birth: <label class="text-pink">*</label></div></td>
                            <td>
                                <div class="input-append">
                                    <input class="date-picker text-input form-control" id="usr_bd" name="usr_bd"type="text" value="<?php echo $_POST['usr_bd'];?>" AUTOCOMPLETE="OFF" />
                                    <!--<label for="usr_bd" class="add-on"><i class="glyphicon glyphicon-calendar"></i></label> -->
                                </div>
                            </td>
                            <td><div class="error_message"><p class="text-danger"><?php echo $reg_error9; ?></p></div></td>
                        </tr>
                <tr>
                    <td class="text-right">Country: <label class="text-pink">*</label></td>
                    <td>
                        <?php include_once 'country_list.php';?>
                        <select class="usr_country form-control text-input form-control" name="usr_country">
                            <?php 
                            foreach ($country_list as $country_data) {
                                if($_POST['usr_country'] == $country_data)
                                {
                                    $sel = 'selected = "selected"'; 
                                }
                                else
                                {
                                    $sel = " ";
                                }
                                echo '<option value="'.$country_data.'" ' .$sel . ' >'.$country_data.'</option>';

                            }
                            ?>
                        </select>

                    </td>
                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error5; ?></p></div> </td>
                </tr>
                <tr>
                    <td class="text-right"><div class="loginLabel">Nationality: <label class="text-pink">*</label></div></td>
                    <td>
                        <select class="input text-input form-control" name="account_type">
                            <option selected="selected" value="1">Cambodian</option>
                            
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                                <td class="text-right">Phone: <label class="text-pink">*</label></td>
                                <td>
                                    <input type="text" name="usr_phone" class="text-input form-control" value="<?php echo $_POST['usr_phone'];?>" AUTOCOMPLETE='OFF'/>

                                </td>
                                <td><div class="error_message"><p class="text-danger"><?php echo $reg_error4; ?></td>
                            </tr>
                <tr>
                    <td class="text-right"><div class="loginLabel">Type of Account: <label class="text-pink">*</label></div></td>
                    <td>
                        <select class="input text-input form-control" name="account_type">
                            <option selected="selected" value="1">Individual</option>
                            <option value="2">Organization</option>
                            <option value="3">Community</option>
                            <option value="4">Tourist</option>
                            <option value="5">Travel Agent</option>
                            <option value="6">Expert</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                  <tr>
                    <td class="text-right"><div class="addressLabel">Address:</div></td>
                    <td>
                        <textarea style="width:100%; height: 100px !important;" name="usr_add" class="input text-input form-control" value="<?php echo $_POST['usr_add'];?>" AUTOCOMPLETE='off'></textarea>
                        </td>
                    <td></td>
                </tr>
            </table>
                    </div>
                    <div class="table-registeration">
                        <h3>CPS Account Information</h3>
                            <table>
                                <tr>
                                    <td class="text-right">Email: <label class="text-pink">*</label></td>
                                    <td>
                                        <input type="text" name="usr_email" class="text-input form-control" value="<?php echo $_POST['usr_email'];?>" AUTOCOMPLETE='OFF'/>
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error3; ?></p></div></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><div class="loginLabel">Username: <label class="text-pink">*</label></div></td>
                                    <td>
                                        <input type="text" name="usr_name" class="input text-input form-control" value="<?php echo $_POST['usr_name'];?>" AUTOCOMPLETE="OFF" />
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error6; ?></p></div></td>
                                </tr>
                                 <tr>
                                    <td class="text-right"><div class="loginLabel">Password: <label class="text-pink">*</label></div></td>
                                    <td>
                                        <input type="password" name="usr_pwd" class="input text-input form-control" AUTOCOMPLETE="OFF" />
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error7; ?></p></div></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><div class="loginLabel">Verify Password: <label class="text-pink">*</label></div></td>
                                    <td>
                                        <input type="password" name="usr_verify_pwd" class="input text-input form-control" AUTOCOMPLETE="OFF" />
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error8; ?></p></div></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><div class="capt_char_Label"> Input CAPTCHAR:<label class="text-pink">*</label> </div></td>
                                    <td>
                                        <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id="captchaimg" ><br>
                                        <input type="text" id="6_letters_code" name="6_letters_code" class="input text-input form-control" AUTOCOMPLETE='off' />
                                    </td>
                                    <td><div class="error_message"><p class="text-danger"><?php echo $reg_error; ?></p></div></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="reset" value="Reset" class="btn btn-post">
                                        <input type="submit" class="btn btn-post" name="submit" value="Submit" />
                                    </td>
                                </tr>

                            </table>

                    </div>

                <div></div><br/>
            
            </div>
        </form>
        <br/><br/>
    </div>
  
    
    <?php include_once 'block_footer.php'; ?> 
    </div> 
</body>
</html>


<script>
    $("#usr_bd").datepicker({
        format: 'yyyy-mm-dd'
    });
</script>