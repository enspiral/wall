<!-- Timeline Profile HTML -->
<?php
  
    if($_GET['p']){
        $page = $_GET['p'];
    }  else {
        $page = 'dashboard';
    }
?>

<div id="div-main-menu">
    <?php if($login) { ?>
    <div class="row" id="div-menu-top">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-2">
                    <img src="<?php echo $base_url; ?>images/logo.png"/>
                </div>
                <div class="col-lg-8 search-box">
                <input type="text" class="topbarSearch" id="searchinput" placeholder="Communities, Organizations Projects and Valenteers"  data-step="2" data-intro="Search for Friends and Groups."/>
                <div id="display" ></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 top-menu">
            <ul class="nav navbar-nav navbar-right">
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
                    <a href="<?php echo $base_url.'my_messages.php';  ?>" data-step="6" data-intro="Your messages."><i class="glyphicon glyphicon-envelope"></i>
                        <?php if($session_conversation_count>0) {
                            echo "<i id='conversation_count' class='msg_count'>$session_conversation_count</i>";
                        }else{
                            echo "<i>0</i>";
                        } ?>
                    </a>

                </li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                <li class="focus-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i> English</a>
                    <ul class="dropdown-menu text-center" role="menu" id="dropdown-language">
                        <a href="#">Report a problem</a>
                        <a href="#">Privacy  </a>
                        <a href="#">Setting </a>
                        <a href="<?php echo $base_url.'logout.php'; ?>">Log Out </a>

                    </ul>
                </li>
                <li class="focus-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Account</a>
                    <ul class="dropdown-menu text-right" role="menu" id="dropdown-account">
                        <li><a href="#">Report a problem</a></li>
                        <li><a href="#">Privacy  </a></li>
                        <li><a href="#">Setting </a></li>
                        <li><a href="<?php echo $base_url.'logout.php'; ?>">Log Out </a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div  id="timelineNav">
        <ul class="menu-main">
            <li <?php echo ($page == 'dashboard') ? "class='active'" : ""; ?>>
                <?php echo $arrow_updates ?>
                <a href='<?php echo $base_url . 'my_dashboard.php?p=cps_dashboard'; ?>'><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
            <li <?php echo ($page == 'profile') ? "class='active'" : ""; ?>>
                <?php echo $arrow_profile ?>
                <a href='<?php echo $base_url . 'my_dashboard.php?p=profile'; ?>'><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li <?php echo ($page == 'discover') ? "class='active'" : ""; ?>>
                <?php echo $arrow_discover ?>
                <a href='<?php echo $base_url . 'my_dashboard.php?p=discover'; ?>'><span class="glyphicon glyphicon-globe"></span> Discover</a></li>
        </ul>

        <div id="right-menu-main">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <label class="white-text">Viewing as:</label>
                    <select class="view-select">
                        <option value="volunteer">Volunteer</option>
                        <option value="community">Community</option>
                        <option value="organization">Organization</option>
                    </select>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle white-text" data-toggle="dropdown" role="button" aria-expanded="false">Create Listing <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" id="create-list">
                        <li><a href="<?php echo $base_url . 'my_createproject.php?p=my_createproject'; ?>">Create a Project <label class="glyphicon glyphicon-exclamation-sign text-right"></label></a></li>
                        <li><a href="#">List a Community  <span class="glyphicon glyphicon-exclamation-sign text-right"></span></a></li>
                        <li><a href="#">List an Organization <span class="glyphicon glyphicon-exclamation-sign text-right"></span></a></li>
                    </ul>
                </li>

            </ul>
            <!--   <a href="#"  class='wallbutton messageButton'>Language</a>
                <a href="#"  class='wallbutton messageButton'>Create</a>-->
        </div>
    </div>
</div>
<?php } else { ?>
<li><a href="<?php echo $base_url; ?>">Login</a></li>
<li><a href="<?php echo $base_url; ?>">Sign Up</a></li>
<?php	} ?>