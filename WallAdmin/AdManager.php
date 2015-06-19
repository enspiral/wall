<?php
include_once 'includes.php';
$Advertisments=$WallAdmin->Advertisments();
$admanager=1;
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
                      Advertisement Manager

                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                 <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Create Advertisement</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->




                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="adTitle" placeholder="Ad Title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <input type="text" class="form-control" id="adDesc" placeholder="Ad Description" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">URL</label>
                                            <input type="text" class="form-control" id="adURL" placeholder="Ad URL" >
											<input type="hidden" id="adImg">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Banner</label>
											 <form id="bigprofileimageform" method="post" enctype="multipart/form-data" action="ajaxImageUpload.php">
                                            <input type="file" id="exampleInputFile" type="file" name="photos" >

											</form>

                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <a href="#" class="btn btn-success" id="adSave">Save</a>
                                    </div>

                            </div><!-- /.box -->





                        </div><!--/.col (left) -->


                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Preview</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->


                                    <div class="box-body">
<div class="ad_block">
<div id="ad_image" class='ad_imagediv'></div>
<div> <a href="#" id="ad_title" class="ad_title" target="blank">Ad Title</a></div>
<div id="ad_url" class="ad_url">Ad URL</div>
<div id="ad_desc" class="ad_desc">Ad Description</div>
</div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                    </div>

                            </div><!-- /.box -->





                        </div><!--/.col (left) -->

						 <!-- left column -->
						 <?php if($Advertisments){ ?>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Advertisments</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->


                                    <div class="box-body" id="AdsBlock">
                                    <?php foreach($Advertisments as $data)
									{
									?>
									<div class="ad_block" id="adBlock<?php echo $data['a_id'];  ?>">
									<a  href="#" id="<?php echo $data['a_id'];  ?>" class="adDelete">X</a>
<div  class='ad_imagedivx'><img src="<?php echo $base_url.$upload_path.$data['a_img']; ?>" style="width:228px"></div>
<div> <a href="<?php echo $data['a_url']; ?>"  class="ad_title" target="blank"><?php echo $data['a_title']; ?></a></div>
<div  class="ad_url"><?php echo $data['a_url']; ?></div>
<div  class="ad_desc"><?php echo $data['a_desc']; ?></div>

</div>

									<?php } ?>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                    </div>

                            </div><!-- /.box -->
                        </div><!--/.col (left) -->
						<?php } ?>


                 </div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->




    </body>
</html>
