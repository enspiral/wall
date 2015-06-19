<div class="text">
	<h3 class="text-center">Please give us your persional information</h3>
	<h4>Basic Information</h4>
	<hr>
	<?php 
	$com_admin=$Wall->User_Details($uid);
	foreach($com_admin as $value){
	
	?>

	<form method="post" class="form-horizontal">
		<div style="padding-left:10%;">
			<div class="form-group">
	      		<label class="form-control-label col-xs-3">Firstname:</label>
	            <div class="col-xs-8">
	                <input class="text- form-control" value="" name="fname" type="text"/>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Lastname:</label>
	            
	            <div class="col-xs-8">
	                <input class="text- form-control" name="lname" type="text"/>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Gender</label>
	            <div class="col-xs-8">
	                <select class="form-control" name="gender">
	                	<option></option>
	                </select>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Date of Birth:</label>
	            <div class="col-xs-8">
	                <input class="text- form-control" name="dob" type="date"/>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Country</label>
	            <div class="col-xs-8">
	                <select class="form-control" name="country">
	                	<option></option>
	                </select>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Nationality:
	      		</label>
	            <div class="col-xs-8">
	                <select class="form-control" name="nationality">
	                	<option></option>
	                </select>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Email Address:</label>
	            <div class="col-xs-8">
	                <input class="text- form-control" name="email" type="email"/>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Phone Number:</label>
	            <div class="col-xs-2">
	            	<input class="text- form-control" name="pre_phone" type="text" value="+885" />
	            </div>
	            <div class="col-xs-6">
	                <input class="text- form-control" name="phone" type="text"/>
	            </div>
	        </div>
	        <div class="form-group">
	      		<label class="form-control-label col-xs-3">Mailing Address:</label>
	            <div class="col-xs-8">
                <textarea style="height:80px;width:100%;" name="mailing"></textarea>
            	</div>
	        </div>
        </div>
        <h4>Support us</h4>
		<hr>
		<div style="padding-left:2%;">
			<div class="form-group">
	            <div class="col-xs-11">
	                <label>How would you like to support us?</label>
	            </div>
	            <div class="col-xs-11">
	                <input type="text" class="form-control" name="q1" placeholder="E.g Visit us, Donate us, Volunteer with us">
	            </div>
	        </div>
	    </div>
        <h4>Volunteer/Visit us </h4>
		<hr>
		<div class="form-group"style="padding-left:2%;">
            <div class="col-xs-11">
                <label>If you would like to volunteer/visit us, when can you com?</label>
            </div>
            <div class="col-xs-11">
                <textarea style="height:80px;width:100%;" name="q2"></textarea>
            </div>
        </div>
        <div class="form-group"style="padding-left:2%;">
            <div class="col-xs-11">
                <label>What would you like to do?</label>
            </div>
            <div class="col-xs-11">
                <textarea style="height:80px;width:100%;" name="q3"></textarea>
            </div>
        </div>
        <div class="form-group"style="padding-left:2%;">
            <div class="col-xs-11">
                <label>Why are you interesting in coming?</label>
            </div>
            <div class="col-xs-11">
                <textarea style="height:80px;width:100%;" name="q4"></textarea>
            </div>
        </div>
        <h4>Other Information</h4>
		<hr>
		<div class="form-group"style="padding-left:2%;">
            <div class="col-xs-11">
                <label>Is there anything else that you would to ask or tell us?</label>
            </div>
            <div class="col-xs-11">
                <textarea style="height:80px;width:100%;" name="q5"></textarea>
            </div>
        </div>
        <div class="form-group" style="padding-left:10%;">
        	<input type="checkbox">
        	<label>I went to receive more volunteer opportunities from CPS</label>
        </div>
        <div style="padding-left:30%;">
        	<input type="submit" class="btn btn-primary btn_v" value="Submit" name="save">
	        <input type="reset" class="btn btn-danger btn_v" value="Reset" name="reset">
	        <input type="submit" class="btn btn_v" value="Back" name="back">
        </div>
        
	</form>
	<?php } ?>
</div>
<style type="text/css">
	.btn_v{
    	margin: 0px 30px 0px 0px;
	  padding-left: 5%;
	  padding-right: 5%;
	}
</style>