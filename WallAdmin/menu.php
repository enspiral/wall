 <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">

                        <div class="pull-left" style="font-weight:bold;">
                            <p>Hello, Admin</p>


                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form" style="display:none">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
					<?php
					if($dashboard)
					$dashboard='active';
					else if($user)
					$user='active';
					else if($blockuser)
					$blockuser='active';
					else if($verifieduser)
					$verifieduser='active';
					else if($updates)
					$updates='active';
					else if($comments)
					$comments='active';
					else if($groups)
					$groups='active';
					else if($photos)
					$photos='active';
					else if($blockgroups)
					$blockgroups='active';
					else if($useruploads)
					$useruploads='active';
					else if($admanager)
					$admanager='active';
					else if($templatemanager)
					$templatemanager='active';
					else
					$settings='active';
					?>
                    <ul class="sidebar-menu">
                        <li class="<?php echo $dashboard; ?>">
                            <a href="home.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="<?php echo $user; ?>">
                            <a href="users.php">
                                <i class="fa fa-th"></i> <span>Users</span>
                            </a>
                        </li>
						  <li class="<?php echo $blockuser; ?>">
                            <a href="blockedUsers.php">
                                <i class="fa fa-th"></i> <span>Blocked Users</span>
                            </a>
                        </li>

						 <li class="<?php echo $verifieduser; ?>">
                            <a href="verifiedUsers.php">
                                <i class="fa fa-th"></i> <span>Verified Users</span>
                            </a>
                        </li>

                        <li class="<?php echo $updates; ?>">
                            <a href="updates.php">
                                <i class="fa fa-th"></i> <span>User Updates</span>
                            </a>
                        </li>
                        <li class="<?php echo $comments; ?>">
                           <a href="comments.php">
                                <i class="fa fa-th"></i> <span>Comments</span>
                            </a>
                        </li>
                        <li class="<?php echo $groups; ?>">
                            <a href="groups.php">
                                <i class="fa fa-th"></i> <span>Groups</span>
                            </a>
                        </li>

						  <li class="<?php echo $blockgroups; ?>">
                            <a href="blockedGroups.php">
                                <i class="fa fa-th"></i> <span>Blocked Groups</span> 
                            </a>
                        </li>

                        <li class="<?php echo $photos; ?>">
                            <a href="userPics.php">
                                <i class="fa fa-table"></i> <span>Profile Pics</span>

                            </a>

                        </li>
                        <li class="<?php echo $useruploads; ?>">
                            <a href="userUploads.php">
                                <i class="fa fa-table"></i> <span>User Uploads</span>

                            </a>
                        </li>
						<li class="<?php echo $admanager; ?>">
                             <a href="AdManager.php">
                                <i class="fa fa-table"></i> <span>Ad Manager</span>

                            </a>
                        </li>
						<li class="<?php echo $templatemanager; ?>">
                             <a href="templateManager.php">
                                <i class="fa fa-table"></i> <span>Template Manager</span>

                            </a>
                        </li>
                        <li class="<?php echo $settings; ?>">
                             <a href="settings.php">
                                <i class="fa fa-table"></i> <span>Settings</span>

                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
