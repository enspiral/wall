<?php
include_once 'includes.php';
include_once 'pagination_header.php';
$Groups_Details_Array=$WallAdmin->BlockGroups_Details($start,$per_page);
$Groups_Count=$WallAdmin->Groups_Count();
$count = $Groups_Count;
$no_of_paginations = ceil($count / $per_page);
$blockgroups=1;
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
                       Groups
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Block Groups</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Block Groups</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                           
											<th>Group Name</th>
                                            <th>Group Desc</th>
											 <th>User</th>
											<th style="width: 170px">Actions</th>
                                            
                                        </tr>
                                    	<?php 
										foreach($Groups_Details_Array as $data)
										{
										
										?>
                                        <tr id="groups<?php echo $data['group_id']; ?>">
										 <td style="width: 10px">#</td>
                                          
											<td><a href="<?php echo $base_url.'group/'.$data['group_id']; ?>"><?php echo htmlcode($data['group_name']); ?></a></td>
                                           <td><?php echo htmlcode($data['group_desc']); ?></td>
										     <td><a href="<?php echo $base_url.$data['username']; ?>" target="_blank"><?php echo $data['username']; ?></a></td>
											<td> <a href="#" class="btn btn-warning btn-sm groupBlock" id="<?php echo $data['group_id']; ?>" rel="1">Unblock</a> &nbsp; &nbsp;<a href="#" class="btn btn-danger btn-sm groupDelete" id="<?php echo $data['group_id']; ?>">Delete</a></td>
                                   
                                        </tr>
										<?php } ?>
										
										
                                        
                                        
                                    </table>
									   <?php
                                    if(empty($Groups_Details_Array))
                                    {
                                    echo '<div id="noResults">No Results</div>';
                                    }
                                    ?>
                                </div><!-- /.box-body -->
                             <?php include 'pagination_footer.php'; ?>
                            </div><!-- /.box -->

                            

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        


    </body>
</html>
