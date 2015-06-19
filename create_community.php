<?php 
	ob_start("ob_gzhandler");
	error_reporting(0);
	include_once 'includes/db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <?php
    	include("js.php");
    ?>
    <style type="text/css">
    	.container{
    		width: 860px;
    		height: auto;
    	}	
    </style>
</head>
<body>
<div class="container">
	<div class="text">
		<center>
		<h2 style="color:pink;">Create a Page for Your Community!</h2>
		<p>Despicable Me 2 Minion Wallpapers: Movies are indeed a great source of entertainment.</p>
		</center>
		<hr>
	<form method="post" style="width:850px;" class="form-contact">
		<h4>Community Information</h4>
		<br>
		<div class="row">
            <div class="col-md-6">
                <p>What is your community name ?<span style="color:red;">*</span> </p>
            </div>
            <div class="col-md-6">
                <input class="text- form-control" name="name" type="text" placeholder="E.g. Codingate" required=""/>
            </div>
        </div>        
        <div class="row">
            <div class="col-md-6">
                <p>What is your community address ? <span style="color:red;">*</span></p>
            </div>
            <div class="col-md-6">
                <textarea  name="address" style="height:70px; width:100%;margin-bottom:0px;" required="" placeholder="E.g. No.17 Street 604 Toul Kork District, Phnom Penh, Cambodia"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            	<p>Which languages are spoken ?<span style="color:red;">*</span></p>
            </div>
            <div class="col-md-6">
            	<input class="text- form-control" name="language" required="" type="text" placeholder="E.g. English Chiness Khmer" required=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            	<p>What is your position in community ?<span style="color:red;">*</span></p>
            </div>
            <div class="col-md-6">
            	<input class="text- form-control" name="position" type="text" placeholder="E.g. Leader Teacher co-leader" required=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>What is community location in Google Map ? </p>
            </div>
            <div class="col-md-6">
                <textarea style="height:70px; width:100%; margin-bottom:0px;"  name="map" placeholder="E.g. https://www.google.com.kh/maps/place/Codingate/@11.573362,104.892621,17z/data=!3m1!4b1!4m2!3m1!1s0x310951761b0efa99:0x83be8a97765e155?hl=en"></textarea>
            </div>
        </div>
        <div class="row">
	        <div class="col-md-6">
                <p>What is community Introduction ? </p>
            </div>
            <div class="col-md-6">
                <textarea  style="height:70px; width:100%" name="introduction" placeholder="E.g. Tags:cartoon wallpapers HD, featured, funny cartoon sayings, funny minions quotes, funny momment cartoons, miniones quotes 2014, minions funny pictures, ..."></textarea>
            </div>
	    </div>
	    <div class="row">
	        <div class="col-md-6">
                <p>Do you have your community document ? </p>
            </div>
            <div class="col-md-6">
           		<input type="file" name="doc">
            </div>
	    </div>
	    <input type="submit" name="save" value="Show my Community" style="margin-left:40%;" class=" btn btn-xs btn-submitbtn-info btn-cps">
	</form>
	</div>
</div>
	
</body>
</html>