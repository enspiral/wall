<?php
include_once 'includes.php';
include_once 'pagination_header.php';
$Comments_Details_Array=$WallAdmin->Comments_Details($start,$per_page);
$Comments_Count=$WallAdmin->Comments_Count();
$count = $Comments_Count;
$no_of_paginations = ceil($count / $per_page);
$comments=1;
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
                       Comments
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Comments</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Manage Comments</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>User</th>
											<th>Comment</th>
                                            <th>Preview</th>
											
											<th style="width: 150px">Actions</th>
                                            
                                        </tr>
										<?php 
										foreach($Comments_Details_Array as $data)
										{
										
										?>
                                        <tr id="comments<?php echo $data['com_id']; ?>">
										 <td style="width: 10px">#</td>
                                              <td><a href="<?php echo $base_url.$data['username']; ?>" target="_blank"><?php echo $data['username']; ?></a></td>
											  <td class="textContent"><?php echo htmlcode($data['comment']); ?></td>
                                           <td></td>
											<td> <a href="#" class="btn btn-danger btn-sm commentDelete" id="<?php echo $data['com_id']; ?>">Delete</a></td>
                                            
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
