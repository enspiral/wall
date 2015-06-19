<?php
include_once 'includes.php';
include_once 'pagination_header.php';
$Users_Details_Array=$WallAdmin->Users_Details($start,$per_page);
$Users_Count=$WallAdmin->Users_Count();
$count = $Users_Count;
$no_of_paginations = ceil($count / $per_page);
$user=1;
?>
<!DOCTYPE html>
<html>
    <?php include_once("head.php"); ?>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once("header.php"); ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           <?php include_once("menu.php"); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Users

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Users</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Users</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>UserName</th>
											<th>Full Name</th>
											<th>Email</th>
                                            <th>User Type</th>
											<th>Status</th>
											<th>Verified</th>
											<th style="width: 134px">Actions</th>

                                        </tr>
										<?php
										foreach($Users_Details_Array as $data)
										{

										?>
                                        <tr id="users<?php echo $data['uid']; ?>">
										 <td style="width: 10px">#</td>
                                            <td><a href="<?php echo $base_url.$data['username']; ?>" target="_blank"><?php echo $data['username']; ?></a></td>
											<td>
											<?php echo $data['name']; ?>

											</td>
											<td><?php echo $data['email']; ?></td>
                                            <td>
											<?php if($data['provider']) { ?>
											<span class="label label-primary">Social</span>
											<?php } ?>
											</td>
											<td>
											<?php if($data['name']) { ?>
											<span class="label label-success">Complete</span>
											<?php } ?>
											</td>
											<td id="verified<?php echo $data['uid'];?>">
											<?php if($data['verified']) { ?>
											<span class="label label-blue">Verified</span>
											<?php }?>
											</td>
											<td>
											<a href="#" class="btn btn-danger btn-sm block" id="<?php echo $data['uid']; ?>" rel="">Block</a>&nbsp;&nbsp;&nbsp;
											<?php if($data['verified']=='0') { ?>
											<a href="#" class="btn btn-info btn-sm verified" id="<?php echo $data['uid']; ?>" rel="">Verify</a>
											<?php } ?>
											</td>

                                        </tr>
										<?php } ?>



                                    </table>
                                </div><!-- /.box-body -->
								<?php include 'pagination_footer.php'; ?>
      </div><!-- /.box -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->




    </body>
</html>
