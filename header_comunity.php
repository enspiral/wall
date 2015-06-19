<?php

if($_GET['p']){
        $page = $_GET['p'];
    }  else {
        $page = '';
    }


if($_GET['com']){
        $page = $_GET['com'];
    }  else {
        $page = '';
    }
?>

<div id="div-main-menu">
    <?php if($login) { ?>
    <div id="div-menu-top">
        <div class="header_left">
            <div>
                <div class="logo">
                    <img src="<?php echo $base_url; ?>images/logo.png"/>
                </div>
                <div class="search-box">
                <input type="text" class="topbarSearch" id="searchinput" placeholder="Communities, Organizations Projects and Valenteers"  data-step="2" data-intro="Search for Friends and Groups."/>
                <div id="display" ></div>
                </div>
            </div>
        </div>
        <div class="header_right top-menu">
            <ul class="notivication_menu clearfix" role="navigation">
                <li class="li-notification">
                    <a href="#" id="notificationLink" data-step="5" data-intro="Notifications."><i class="glyphicon glyphicon-bell"></i>
                        <?php
                        if($notifications_count>0){
                            echo "<i id='conversation_count' class='not_count'>$notifications_count</i>";
                        }else{
                            echo "<i>0</i>";
                        } 
                        ?>
                    </a>
                    <?php include_once 'block_notification.php'; ?>
                </li>

                <li class="li-notification">
                  
                    <!--<a href="<?php //echo $base_url.'messages.php';  ?>" data-step="6" data-intro="Your messages."><i class="glyphicon glyphicon-envelope"></i-->
                        <?php //if($session_conversation_count>0) {
                            //echo "<i id='conversation_count' class='msg_count'>$session_conversation_count</i>";
                        //}else{
                            //echo "<i>0</i>";
                        //} ?>
                    <!--</a>-->

                </li>
             
                <li><a href="#" data-toggle="modal" data-target=".send_mail_to_cps_admin"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li class="focus-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i> English</a>
                    
                </li>
                <li class="focus-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Account</a>
                    <ul class="dropdown-menu text-right" role="menu" id="dropdown-account">
                        <li><a href="#" data-toggle="modal" data-target=".send_mail_to_cps_admin">Report a problem</a></li>
                        <li><a href="#">Privacy  </a></li>
                        <li><a href="#">Setting </a></li>
                        <li><a href="<?php echo $base_url.'logout.php'; ?>">Log Out </a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div  id="timelineNav-full">
    <div  id="timelineNav">
        <i id="link-up" class="glyphicon glyphicon-chevron-up arrow-link-main-menu"></i>
        <i id="link-down" class="glyphicon glyphicon-chevron-down arrow-link-main-menu"></i>
        
        <ul class="menu-main">
            
            <li <?php echo ($page == 'dashboard') ? "class='active'" : ""; ?>>
                <?php echo $arrow_updates ?>
                <a href='<?php echo $base_url . 'community.php?gid='.$gid.'&com=dashboard'; ?>'><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
            <li <?php echo ($page == 'booking') ? "class='active'" : ""; ?>>
                <?php echo $arrow_profile ?>
                <a href='<?php echo $base_url . 'community.php?gid='.$gid.'&com=booking'; ?>'><span class="glyphicon glyphicon-user"></span> Booking</a></li>
            <li <?php echo ($page == 'project') ? "class='active'" : ""; ?>>
                <?php echo $arrow_discover ?>
                <a href='<?php echo $base_url . 'community.php?gid='.$gid.'&com=project'; ?>'><span class="glyphicon glyphicon-globe"></span> Project</a></li>
        </ul>

        <div id="right-menu-main">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <label class="white-text">Viewing as:</label>
                    <select class="view-select" onChange="window.location.href=this.value" disabled="">
                        <!--<option value="volunteer">Volunteer</option>-->
                        <option value="<?php echo $base_url; ?>community/community.php?com=dashboard">Community</option>
                        <!--<option value="organization">Organization</option>-->
                    </select>
                </li>

            </ul>
            <!--   <a href="#"  class='wallbutton messageButton'>Language</a>
                <a href="#"  class='wallbutton messageButton'>Create</a>-->
        </div>
    </div>
    </div>
</div>
<?php } else { ?>
<li><a href="<?php echo $base_url; ?>">Login</a></li>
<li><a href="<?php echo $base_url; ?>">Sign Up</a></li>
<?php	} ?>



<!-- Popup send email to CPS admin  -->

<div class="modal fade send_mail_to_cps_admin" id="send_mail_to_cps_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype='multipart/form-data' action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"> Contact CPS Admin </h4>
                </div>

                <div class="modal-body">
                    <label class="alert alert-heading">Thank you for your interest in us. Please use this form to contact us</label>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Please, tell us who you are</span>
                            <select class="form-control">
                                <option>e.g Community, Visitor...</option>
                                <option>Community</option>
                                <option>Visitor</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <span>Please, tell us who you are</span>
                            <select class="form-control">
                                <option>e.g Service, Complain...</option>
                                <option>Service</option>
                                <option>Complain</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Please tell us your name</span>
                            <input name="name" type="text" class="form-control" placeholder="Name" required="" value="<?php echo $session_first_name.' '.$session_last_name; ?>"/>
                        </div>
                        <div class="col-md-6">
                            <span>Please inter your email address</span>
                            <input class="text- form-control" name="email"  value="<?php echo $session_email; ?>" type="email" placeholder="Email" required=""/>
                        </div>
                    </div>
                    <div class="form_contact">
                        <span>Please drop your message here </span>
                        <textarea style="height: 150px;" class="form-control" name="comment" rows="15" cols="40" placeholder="Message" required=""></textarea><br />
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="submit_contact_cps_admin" name="submit_contact_cps_admin" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<!-- End Popup -->



<script type="text/javascript">
    $("#link-down").hide();
    $("#timelineNav #link-up").click(function(){
        $("#div-menu-top").slideToggle();
        $("#link-down").slideDown();
        $("#link-up").slideUp();
        $(".div-content").css("margin-top","10px");
        
    });
    $("#timelineNav #link-down").click(function(){
        $("#div-menu-top").slideToggle();
        $("#link-down").slideUp();
        $("#link-up").slideDown();
        $(".div-content").css("margin-top","10px");
        
    });
</script>