<?php
    $query = mysqli_query($db, "SELECT proj_id,group_id,recruit_text,recruit_image FROM projects WHERE group_id = '$groupID'");
    foreach ($query as $value) {
            $recruitment_des = $value['recruit_text'];
            $recruit_image = $value['recruit_image'];
            $pro_id = $value['proj_id'];
            $gid    = $value['group_id'];
    }
    ?>
    <!-- send email to project admin -->
    <?php 
    $gid = $_GET['gid'];
    $email_groupowner = $Wall->groupOwnerEmail($gid);

    if(isset($_POST['submit_join_us'])){
        $email  =  $_POST['email'];
        $join_us   = $_POST['join_uss'];
        $contributes   = $_POST['contributes'];
        $message_leaders   = $_POST['message_leaders'];

        $to = $email_groupowner['email'];
        $subject = "Request To Join";

        $headers = "From: ".$email."\n".
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $message = '<html><body>';
        $message .= '<img src="http://demo.volunteerbetter.com/images/email-logo.png" alt="volunteerbetter logo" />';
        $message .= '<table rules="all" style="border-color: #666;width:600px;" cellpadding="10">';
        $message .= "<tr style='background: #eee;'><td><strong>What is your email?</strong> </td><td>" . strip_tags($email) . "</td></tr>";
        $message .= "<tr><td><strong>Why Do You Join Us?</strong> </td><td>" . htmlentities($join_us) . "</td></tr>";
        $message .= "<tr><td><strong>How Can You Contribute?</strong> </td><td>" . htmlentities($contributes) . "</td></tr>";
        $message .= "<tr><td><strong>Message To The Team Learder</strong> </td><td>" . htmlentities($message_leaders) . "</td></tr>";
        $message .= "</table>";  
        $message .= "</body></html>";


           $valuse = mail($to,$subject,$message,$headers);
           //header("Location:cps_verification.php");
           if($valuse == true)  
           {

             echo "<script type=\"text/javascript\">alert('Your message has been sent successfully.');</script>"; 

            ?>
              
        <?php   }
 }
    ?>
    <!-- the end of email sending -->
     <p class="text-right"></p>
<div class="container text">
	 	
<div class="block-right">    
 <?php if($session_group_admin) { ?>
     <a href="" data-toggle="modal" data-target="#recruit_image"><i class="glyphicon glyphicon-edit custom-file-input eidt-all-icon" original-title="Edit Recruitment" data-toggle="modal" data-target="#modal_recruitment"></i></a>    <?php } ?>    
	<div class="modal fade" id="recruit_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Recruitment</h4>
            </div>
            <div class="modal-body">
                <input type="file" id="recruit_image" name="recruit_image" value="<?php echo $recruit_image; ?>"/><br/>
                <textarea id="recruitment_des" name="recruitment_des" style="width:100%; height:150px;"><?php echo $recruitment_des; ?></textarea>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="proj_id" value="<?php echo $pro_id; ?>">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button id="submit_recruiment" name="submit_recruiment" class="btn btn-sm btn-primary update-profile">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
    
<!-- the end of edit recrument -->

    <p class="text-orange text-title">Recruitment</p><hr style="margin-top:-5px; margin-bottom:10px;">
    <div style="width:850px; background-color:#F5F5F5;">

        <?php  $tl_pic = $base_url.'images/'.$recruit_image;
        if($recruit_image){
            echo '<div class="recrument-image img_container slider-wrapper"><img src="'.$tl_pic.'"></div>';
        }else{
            echo '<div class="recrument-image img_container slider-wrapper"><img src="images/defaul_org_logo.png"></div>';
        }
            
        ?>
    </div> 
<!--     http://localhost/wall/group.php?gid=35&ptab=contact -->
    <div style="text-align: center; margin-top:16px;"><p><?php 
    if($recruitment_des){
    echo $recruitment_des; 
   }else{
    echo "Please describe about recruitment here!";
   }
    ?></p></div>
    
</div>



 <a href="" data-toggle="modal" data-target="#recruit_email"><button class="btn btn-info create-recruitment">Join Us NOW!</button></a>      
    <div class="modal fade" id="recruit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
             <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Join us now</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
               <p>What is your email?</p>
               <input type="text" class="form-control usr_interest" id="interest" name="email" value="" required="" style="width: 100%; height: 30px !important;"></textarea>
            </div>
               <div class="form-group">
               <p>Why Do You Join Us?</p>
               <textarea class="form-control usr_interest" id="interest" name="join_uss" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
            </div>
            <div class="form-group">
               <p>How Can You Contribute?</p>
               <textarea class="form-control usr_interest" id="interest" name="contributes" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
            </div>
            <div class="form-group">
               <p>Message To The Team Learder</p>
                <textarea class="form-control usr_interest" id="interest" name="message_leaders" value="" required="" style="width: 100%; height: 90px !important;"></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="proj_id" value="">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
              <button type="submit" name="submit_join_us" class="btn btn-primary">Save</button>
                <!-- <button id="submit_recruiment" name="submit_join_us" class="btn btn-sm btn-primary update-profile">Update</button> -->
            </div>
        </form>
        </div>
    </div>
</div>
</div>