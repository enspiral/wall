<style>
    .form-contact input{
        margin-bottom: 10px !important;
        width:100%;
    }
    .form-contact .btn-submit{
        color:pink;
        background-color: white;
        border:1px solid pink;
        padding:3px 30px;
        width:30px;
    }
    
</style>


<?php
$email_userown = $Wall->userEmail($group_owner_id);
$message = '';
//if "email" variable is filled out, send email
if (isset($_REQUEST['submit'])){
  
    $to = "king.fc168@gmail.com";
    $subject = $_REQUEST['subject'];
    $txt = $_REQUEST['comment'];
    $headers = "From: ".$_REQUEST['email']."\n".
    "CC: ".$ssemail.$email_userown['email'];
    mail($to,$subject,$txt,$headers);

      //Email response
      $message = "Your message have been sent to adminitrator. Thank you for contacting us!";
      
}

?>
    <?php 
    // $contactus= $Wall->Project_Contact($proj_id);
    // $contact_descr = $contactus['contact_intro'];
    // $proj_id = $contactus['proj_id'];
    // echo $proj_id;
    // echo $contact_descr;
    ?>
    <?php

     $result = mysqli_query($db,"SELECT proj_id,contact_intro,contact_img FROM projects WHERE group_id = '$groupID'");
        foreach ($result as $value) {
            $pro_id = $value['proj_id'];
            $contact_decr = $value['contact_intro'];
            $contact_img = $value['contact_img'];
          

        }

    ?>
    
    <!-- start of -->
    <div class="village_name">
        <div class="village_img">
                <img src="<?php echo $base_url; ?>uploads/<?php echo $picture; ?>">
        </div>
        <div class="content">
                <span class="title"><?php echo $com_name; ?></span>
                <br><br>
                <p class="address"><?php echo $location; ?></p>
                <p class="body_content"><?php echo $des; ?></p>
        </div>
        <div class="map">
                <?php echo $map; ?>
                <button class="btn invole " >Get Involved</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn invole"><i class="fa fa-facebook"></i>&nbsp;&nbsp; Tell a friend</button>
        </div>
    </div>
     <div style="clear:both"></div>
     <div class="block-right">
         <!-- <p class="text-right"><a href="" data-toggle="modal" data-target="#modal_contact"><i class="glyphicon glyphicon-edit"></i></a></p> -->
          
    <div class="modal fade" id="modal_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" enctype='multipart/form-data' action="">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Contact</h4>
            </div>
            <div class="modal-body">
                <!-- Image:  <input type="file" name="<?php //echo 'tl_image_'.$content_id; ?>" id="<?php //echo 'tl_image_'.$content_id; ?>" style="display:inline;"> -->
                <input type="file" id="contact_image" name="contact_image" value="<?php echo $contact_img; ?>"/><br/>
                <textarea id="recruitment_des" name="contact_descr" class="text-editor" style="width:540px; height:200px;"><?php echo $contact_decr; ?></textarea>
                
            </div>
            <div class="modal-footer">
                <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                <button id="submit_contact" name="submit_contact" class="btn btn-sm btn-primary update-profile">Update</button>
            </div>
        </form>
        </div>
    </div>
</div>
</div>
<!-- the end of edit recrument -->
   <p class="text-right"></p>
<div class="text">   
 <div style="width:850px; height:auto; background-color:#F5F5F5;">
     <?php  $tl_pic = $base_url.'images/'.$contact_img;
     if($contact_img){
        echo '<div class="recrument-image img_container slider-wrapper"><img src="'.$tl_pic.'"></div>';
    }else{
        echo "<center>Data no found !</center>";
    }
        // echo '<div class="recrument-image"><img src="'.$tl_pic.'/></div>';   
        ?>
    <!-- <img src="images/socail/contactus_banner.jpg" width="850" height="350"> -->
</div> 

<br/>
    <div><p><?php echo $contact_decr; ?></p></div> 
    <h3>Queries</h3>
    <hr>
    <form method="post" style="width:850px;" class="form">
        <?php echo $message!= NULL ?'<div class="msg"><p class="alert alert-info">'. $message.'</p></div>':'' ?>
        <div>
            <center>Thanks you for your interesting us. Please use this form to contact us</center>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <p>Please tell us who you are</p>
                <select class="form-control">
                    <option></option>
                </select>
            </div>
            <div class="col-md-6">
                <p>Please select type of issue</p>
                <select class="form-control">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Please tell us your name </p>
                <input name="name" type="text" class="form-control" placeholder="Name" required=""/>
            </div>
            <div class="col-md-6">
                <p>Please Enter your email address</p>
                <input class="text- form-control" name="email" type="email" placeholder="Email" required=""/>
            </div>
        </div>
        
        <div class="form_contact">
           <p> Please drop your message here</p>
            <textarea style="height: 150px;" class="form-control" name="comment" rows="15" cols="40" placeholder="Message" required=""></textarea><br />
        </div>
        <button name="submit" style="margin-left: 90%;" class=" btn btn-xs btn-submitbtn-info btn-cps">Submit</button>
    </form>
</div>