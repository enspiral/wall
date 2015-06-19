<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';

$error_contact_us_1=''; $error_contact_us_2=''; $error_contact_us_3='';
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $contact_name = $_POST['contact-name'];
    $contact_email=$_POST['contact-email'];
    $contact_content = $_POST['contact-content'];
  
    
    $validation = true;
    if(strlen($contact_name)>0){
        if (!preg_match('~^[A-Za-z0-9.,+-_ ]{3,20}$~i', $contact_name)) {
            $error_contact_us_1 = 'Invalid name!';
            $validation = false;
        }
    }else{
        $error_contact_us_1 = 'This field is required!';
        $validation = false;
    }
    
    if(strlen($contact_email)>0){
        if (!filter_var($contact_email, FILTER_VALIDATE_EMAIL)){
            $error_contact_us_2 = "Invalid email!";
             $validation = false;
        }
    }else{
        $error_contact_us_2 = 'This field is required!';
         $validation = false;
    }
    if(strlen($contact_content)<=0){
        $error_contact_us_3 = "This field is required!";
        $validation = false;
    }
   
    if($validation)
    {
        $email_to = "codingate@gmail.com";
        $email_subject = "Contact Us";
        $email_message = "Form details below.\n\n";
        
        $email_message .= "Name: ".$contact_name."\n";
        $email_message .= "Email: ".$contact_email."\n";
        $email_message .= "Content: ".$contact_content."\n";
        
        // create email headers
        $headers = 'From: '.$contact_email."\r\n";
        $headers .= 'Reply-To: '.$contact_email."\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        
     //   mail($email_to, $email_subject, $email_message, $headers) or die ("Failure");  
        mail($email_to, $email_subject, $email_message, $headers);
        
        // include your own success html here
        $msg="<span class='error'>Thank you for contacting us. We will be in touch with you very soon!</span>";
        $_POST['contact-name']='';
        $_POST['contact-email']='';
        $_POST['contact-content']='';        
    }
    else
    {
       $msg="<span class='error'>Your infomation is not completed!</span>";
    }
}
?>
<style>
     div.showcase{
        padding-left:20px;
        float:left;
    }
    
    div.showcase-left{
        float:left;
        width:590px;
    }
   
    div.showcase-right{
        float:left;
        width:190px;
    }
    
     div.showcase-content{
        width:590px;
        float:left;
        margin-bottom:20px;
    }
    
    div.contact_us_photo{
        margin-top:20px; 
        width:590px; 
        height:150px; 
    }

    .article{
        border: 2px solid black; 
        padding:15px; 
        margin-top:15px;
    }
    
    .article .text {
        font-size: 12px;
        line-height: 17px;
        font-family: arial;
    }
    
     .tansa, .arrow {
        display:none;
        position:absolute;
        left:400px; /*[wherever you want it]*/
    }

    .profile_show div{
        float:left;   
    }

    .profile_show{
        width:380px;
    }
    
     .project_profile{
        width:180px;
        float:left;
        margin-right:10px;
    }
    
    .prject_profile img{
        width:170px !important;
        height:170px;
    }
    
    .project_blogpost{
        float:left;
        width:390px;
        margin-top:10px;
    }

</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
</head>
<body>
    
    
    
    
    <?php include_once 'block_logo_menu.php'; ?>
    <div id="main">
        <?php include_once 'block_timeline.php'; ?>
		
<div id="tabs" style="width:100%;">
    <ul>
        <li>
            <a href="#a">Show-off</a>
        </li>
        <li>
            <a href="#b">Content</a>
        </li>
        <li>
            <a href="#c">Our Team</a>
        </li>
        <li>
            <a href="#d">Village's Situation</a>
        </li>
         <li>
            <a href="#e">My Page</a>
        </li>
        <li>
            <a href="#f">Get Involved</a>
        </li>
        <li>
            <a href="#g">Donate</a>
        </li>
        <li>
            <a href="#h">Contact us</a>
        </li>
    </ul>
    <div id="a">
       <?php include_once 'cps_showcase/cps_showcase_p1.php'; ?>
    </div>
    <div id="b">
        <?php include_once 'cps_showcase/cps_showcase_p2.php'; ?>
    </div>
    <div id="c">
       <?php include_once 'cps_showcase/cps_showcase_p3.php'; ?>
    </div>
    <div id="d">
        <?php include_once 'cps_showcase/cps_showcase_p4.php'; ?>
    </div>
     <div id="e">
        <?php include_once 'cps_showcase/cps_showcase_p5.php'; ?>
    </div>
    <div id="f">
        <?php include_once 'cps_showcase/cps_showcase_p6.php'; ?>
    </div>
    <div id="g">
        <?php include_once 'cps_showcase/cps_showcase_p7.php'; ?>
    </div>
    <div id="h">
        <?php include_once 'cps_showcase/cps_showcase_p8.php'; ?>
    </div>
</div>


	<?php include_once 'block_footer.php';?>
	</div>
	</body>
<script type="text/javascript">
  //  $('#tabs')
  //   .tabs()
  //   .addClass('ui-tabs-vertical ui-helper-clearfix');
    $(function(){
        $('#tabs')
        .tabs()
        .addClass('ui-tabs-vertical ui-helper-clearfix');
        var pos = $(window).scrollTop();
        $("#tabs>ul>li>a").on('click', function(event) {
            window.location.hash = event.target.hash; 
            $(window).scrollTop(pos);
        })
    });
   
   // JS for read more  
     $(document).ready(function(){    
    $(".read-more").click(function(){        
        var $elem = $(this).parent().find(".text");
        if($elem.hasClass("short"))
        {
            $elem.removeClass("short").addClass("full");
        }
        else
        {
            $elem.removeClass("full").addClass("short");        
        }       
    });
});

</script>
</html>
