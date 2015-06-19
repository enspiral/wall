<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';
?>
<!-- Validation -->
<?php
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

if(isset($_POST['submit_p1_intro'])){
    $group_desc = $_POST['p1_intro'];
    $Wall->Update_Group_Desc($group_desc, $uid, $group_id);
    
}
if(isset($_POST['cancel_p1_intro'])){
    $group_desc = $group_desc;
    //$Wall->Update_Group_Desc($group_desc, $uid, $group_id);
    
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
        width:580px;
        float:left;
        margin-bottom:20px;
    }
    
    div.contact_us_photo{
        margin-top:20px; 
        width:590px; 
        height:150px; 
    }

    .article, .sub-article{
        border: 2px solid black; 
        padding:10px; 
        margin-top:10px;
    }
    
    .article .text, .article {
        font-size: 12px;
        line-height: 17px;
        font-family: arial;
    }
    
    .sub-article{
        font-size: 12px; line-height: 17px;  font-family: arial; margin-left:30px; margin-right:30px;   
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
    
    <!--Organization -->
    div.showcase-org-left{
        width:190px !important;
        float:left;
        
    }
    
    div.showcase-org-content{
        float:left;
        width:580px;
        margin-bottom:20px;
    }
  
    
   div.showcase-org-content img{
        width:570px;
        height:200px;
    }
    
    div.org-textbox, div.org-latest-news, div.org-contact-us{
        padding-left:5px;
        margin-bottom:20px;
    }
    
    img.org-members{
        width:100px !important;
        height:100px !important;
        padding-right:10px !important;    
    }
    
    <!-- Community -->
    .readMore{
        margin-top:20px;
        margin-left:450px;
    }
    
     .community_profile{
        width:180px;
        float:left;
        margin-right:10px;
    }
    
    .community_profile img{
        width:170px !important;
        height:170px;
    }
    
    .community_blogpost{
        float:left;
        width:390px;
    }
        
    div.community_overview{
        width:380px;
        margin-right:20px;
        float:left;
    }
    
    div.community_factsheet{
        width:180px;
        float:left;
    }
    
    div.partner_logos img{
        width:100px !important;
        height:100px !important;
    }
    
    div.current-need, div.community-contact-us, div.community-join-us{
        width:180px;
        margin-bottom:20px;
    }
    
    /*Style Popup */
    div.popup_window_css { position: absolute; display: none; }
    
    div.popup_window_css_head { 
        border: 1px solid black; 
        border-width: 1px 1px 1px 1px; 
        padding: 2px 6px 2px 6px; 
        background: #802000; 
        font: 900 14px "Trebuchet MS", Sans-Serif;
        color: #FFFFFF;
        cursor: default;
    }
    
    div.popup_window_css_head img {
        float: right;
        margin: 4px 0px 0px 1px;
        cursor: pointer;
    }
    
    div.popup_window_css_body { 
        height: 200px;
        border: 1px solid black; 
        border-width: 0px 1px 0px 1px; 
        padding: 6px 6px 0px 6px; 
        background: #DBDBBA; 
    }
    
</style>
<script type="text/javascript" src="<?php echo $base_url; ?>/js/popup-window.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script type="text/javascript">
function showMoreOrLess(thisObj,bonusContent){
    var caption = thisObj.innerHTML;
    //alert(caption);
    if ( caption == "Read more" ) {
        document.getElementById(bonusContent).style.display = "inline";
        thisObj.innerHTML = "Read less";
    } else {
        document.getElementById(bonusContent).style.display = "none";
        thisObj.innerHTML = "Read more";
    }
}
</script>
</head>
<body>
	<?php include_once 'block_logo_menu.php'; ?>
	<div id="main">
		<?php include_once 'block_timeline.php'; ?>



		    <?php
			if($track=="showcase"){
                            if($group_type==1){
                                include_once 'cps_project_1.php';
                            }else if($group_type==2){
                                include_once 'cps_community_1.php';
                            }else{
                                include_once 'cps_organization_1.php';
                            }
                        }
		    ?>




	<?php include_once 'block_footer.php';?>
	</div>
	</body>
        
        <?php if($group_type==1){ ?>
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
        <?php } else if($group_type == 2){?>
            <script type="text/javascript">
    $('#tabs')
     .tabs()
     .addClass('ui-tabs-vertical ui-helper-clearfix');
     
function showMoreOrLess(thisObj,bonusContent){
    var caption = thisObj.innerHTML;
    //alert(caption);
    if ( caption == "Read more" ) {
        document.getElementById(bonusContent).style.display = "inline";
        thisObj.innerHTML = "Read less";
    } else {
        document.getElementById(bonusContent).style.display = "none";
        thisObj.innerHTML = "Read more";
    }
}
    
</script>
        <?php } ?>
</html>