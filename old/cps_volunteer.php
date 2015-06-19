<?php
ob_start("ob_gzhandler");
error_reporting(0);
include_once 'includes/db.php';
include_once 'includes/User.php';
session_start();
$session_uid=$_SESSION['uid'];
if(!empty($session_uid))
{
header("location:index.php");
}

$User = new User($db);

/* Registration Form Validation */
$validation = true;
$reg_error='';
$reg_error1=''; $reg_error2=''; $reg_error3='';
$reg_error4=''; $reg_error5=''; $reg_error6='';
$reg_error7=''; $reg_error8=''; $reg_error9='';
$reg_error10=''; $reg_error11='';
$message_registration='';

if(isset($_POST['submit']))
{
    // User type, Organization type
    $usertype = $_POST['usr_type'];
    $orgtype = $_POST['org_type'];
    
    // First name, Last name, Email, Phone, Username
    $firstname = $_POST['usr_first_name'];
    $lastname=$_POST['usr_last_name'];
    $email = $_POST['usr_email'];
    $phone = $_POST['usr_phone'];
    $username = $_POST['usr_name'];
  
    if(strlen($firstname)>0){
        if (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
            $reg_error1 = 'Incorrect first name!';
            $validation = false;
        }
    }else{
        $reg_error1 = 'This field is required!';
        $validation = false;
    }
    if(strlen($lastname)>0){
        if (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
            $reg_error2 = 'Incorrect last name!';
            $validation = false;
        }
    }else{
        $reg_error2 = 'This field is required!';
         $validation = false;
    }
    
    if(strlen($email)>0){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $reg_error3 = "Invalid email!";
             $validation = false;
        }
    }else{
        $reg_error3 = 'This field is required!';
         $validation = false;
    }
    if(strlen($phone)>0){
        if (!preg_match("/^(?:\(?\+?\d{2,3}\)?[ -]?\d{2,4}[ -]?\d{2,4}[ -]?\d{2,4})$/", $phone)){
            $reg_error4 = "Invalid phone number!";
             $validation = false;
        }
    }else{
        $reg_error4 = 'This field is required!';
         $validation = false;
    }
    
    if(strlen($username)>0){
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        if ($username_check<0) {
            $reg_error5 = 'Invalid username!';
            $validation = false;
        }
    }else{
        $reg_error5 = 'This field is required!';
        $validation = false;
    }
    
    //Password
    $password = $_POST['usr_pwd'];
    $password2 = $_POST['usr_verify_pwd'];
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
    if(strlen($password)>0){
         if ($password_check<0) {
            $reg_error6 = 'Invalid password (Minimum 6 Characters)!';
            $validation = false;
        }
    }else{
        $reg_error6 = 'This field is required!';
        $validation = false;
    }
    if(strlen(password2)>0){
        if($password != $password2){
            $reg_error7 = "Password doesn not match!";
            $validation = false;
        }
    }else{
        $reg_error7 = 'This field is required!';
        $validation = false;
    }
    // Birthday
    $usr_bd = $_POST['usr_bd'];
    if(strlen($usr_bd)<=0){
        $reg_error8 = "This field is required!";
        $validation = false;
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
        $address = $_POST['usr_add1']. " ". $_POST['usr_add2'];
    //    $reg=$User->CPS_User_Registration($firstname, $lastname, $email, $facebook, $country, $province, $city,$postal_code,
      //         $username, $password, $birthday, $address, $account_type);
        
    /*    if($reg){
         //   $message_registration = $address;
            $_SESSION['uid']=$reg;
            header("Location:index.php");
        }else{
            $message_registration = "Username or email is already exists!";
            $reg_error="<span class='error'>Username or Email is already exists.</span>";
       }*/
    }else{
      $reg_error="<span class='error'>Information is incorrected!</span>";
    }
}

?>


<!DOCTYPE html>
<html lang='en'>
<head>
 <meta charset="utf-8">
<?php include_once 'project_title.php'; ?>
<link rel="stylesheet"  href="<?php echo $base_url; ?>css/wall.css" />
<link rel="stylesheet"  href="<?php echo $base_url; ?>css/login.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>

</head>

<body style="background-color: #fbfbfb;">
<?php include_once 'block_logo_menu.php'; ?>
<div id='main'>

<table width='100%' style="margin-top:50px">

<tr>
<td width='50%' valign='top'>

<div>
<div class="box" style="width:300px !important;">
<h4>Tell us about yourself!</h4><br>
<form method="post" action="" name="sign_up_vol" id="sign_up_vol">

<div class="loginLabel"></div>
<input type='radio' name='usr_type' value="1" checked="checked"/>Tourist&nbsp;&nbsp;&nbsp;
<input type='radio' name='usr_type' value="2"/>Volunteer


<div class="loginLabel"><br>Type of organization: *</div>
<select class="input" name="org_type">
  <option selected="selected" value="1">School</option>
  <option value="2">Corporate</option>
  <option value="3">Grassroot</option>
</select>

<div class="loginLabel">First name: *</div>
    <input type="text" name="usr_first_name" id="usr_first_name" class="input" value="<?php echo $_POST['usr_first_name'];?>" AUTOCOMPLETE='OFF'/>
<div class="error_message"><p><?php echo $reg_error1; ?></p></div>

<div class="loginLabel">Last name: *</div>
<input type="text" name="usr_last_name" class="input" value="<?php echo $_POST['usr_last_name'];?>" AUTOCOMPLETE='OFF'/>
<div class="error_message"><p><?php echo $reg_error2; ?></p></div>

<div class="loginLabel">Email: *</div>
<input type="email" name="usr_email" class="input" value="<?php echo $_POST['usr_email'];?>" AUTOCOMPLETE='OFF'/>
<div class="error_message"><p><?php echo $reg_error3; ?></p></div>

<div class="loginLabel">Phone number: *</div>
<input type="tel" name="usr_phone" class="input" value="<?php echo $_POST['usr_phone'];?>" AUTOCOMPLETE='OFF'/>
<div class="error_message"><p><?php echo $reg_error4; ?></p></div>

<div class="loginLabel">Username for login: *</div>
<input type="text" name="usr_name" class="input" value="<?php echo $_POST['usr_name'];?>" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error5; ?></p></div>

<div class="loginLabel">Password: *</div>
<input type="password" name="usr_pwd" class="input" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error6; ?></p></div>

<div class="loginLabel">Verify Password: *</div>
<input type="password" name="usr_verify_pwd" class="input" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error7; ?></p></div>

<div class="loginLabel">Birthday: *</div>
<input type="date" name="usr_bd" class="input" value="<?php echo $_POST['usd_bd'];?>" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error8; ?></p></div>

<div class="loginLabel">Address:</div>
<input type="text" name="usr_add1" class="input" value="<?php echo $_POST['usr_add1'];?>" AUTOCOMPLETE='off' />
<input type="text" name="usr_add2" class="input" value="<?php echo $_POST['usr_add2'];?>" AUTOCOMPLETE='off' />

<div>
</div>

</div>
</td>

<td width='50%' valign='top'>

<div class="box" style="width:300px !important;">

<div class="loginLabel">Country preference: *</div>
<?php include_once 'country_list.php';?>
<select class="usr_country input" name="usr_country">
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

<div class="loginLabel">Skills</div>
<input type="text" name="usr_skill" class="input" value="<?php echo $_POST['usr_skill'];?>" AUTOCOMPLETE="OFF" />

<div class="loginLabel">Interests: </div>
<input type="text" name="usr_interest" class="input" value="<?php echo $_POST['usr_interest'];?>" AUTOCOMPLETE="OFF" />

<div class="loginLabel">Duration: </div>
<input type="text" name="usr_duration" class="input" value="<?php echo $_POST['usr_duration'];?>" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error9; ?></p></div>

<div class="loginLabel">Available time: </div>
From : <input type="date" name="usr_date1" class="input" value="<?php echo $_POST['usd_date1'];?>" AUTOCOMPLETE="OFF" />
<br>To: <input type="date" name="usr_date2" class="input" value="<?php echo $_POST['usd_date2'];?>" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error10; ?></p></div>

<div class="loginLabel">Why do you wanna...?</div>
<textarea name='reason' class="textarea"><?php echo $_POST['reason']; ?></textarea><br>

<div class="loginLabel"><br>Do you already have a team?</div>
<input type='radio' name='team' value="Yes" checked="checked"/>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='team' value="No"/>No<br>

<div class="loginLabel"><br>Do you need a tour agency service?</div>
<input type='radio' name='agency_need' value="Yes" checked="checked"/>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='agency_need' value="No"/>No<br>

<div class="loginLabel"><br>Accomodation package: </div>
<input type='radio' name='accomodation' value="Yes" checked="checked"/>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='accomodation' value="No"/>No

<div class="loginLabel"><br>Budget: </div>
<input type="text" name="usr_budget" class="input" value="<?php echo $_POST['usr_budget'];?>" AUTOCOMPLETE="OFF" />
<div class="error_message"><p><?php echo $reg_error11; ?></p></div>

<div class="loginLabel"> Enter the code above here: </div><br>
<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id="captchaimg" ><br>
<input type="text" id="6_letters_code" name="6_letters_code" class="input" AUTOCOMPLETE='off' />
<div class="error_message"><p><?php echo $reg_error; ?></p></div>

<div><p><?php echo $message_registration; ?></p></div>

<div id="button">
    <input type="submit" class="wallbutton" name="submit" value="Submit" />
    <input type="reset" value="Reset" class="wallbutton">
</div>

</form>
</div>
</div>

</td>
</tr></table>

</div>
</body>
</html>