<h3>Theory of Change Dashoad</h3>
 <?php if ($group_owner_id == $uid) { ?>
        <p class="text-right">
            <a href="" data-toggle="modal" data-target="#edit_theory_of_change"><i class="glyphicon glyphicon-edit"></i>edit theory of change</a>
        </p>
       <?php } ?>

        
         <!-- Popup Edit Theory of Change -->
        <div class="modal fade" id="edit_theory_of_change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
             <form method="post" action="">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Theory of Change</h4>
              </div>
              <div class="modal-body">
                  Introduction:<textarea name="edit_theory_change_intro" style="width:100%; height:150px;"><?php echo $theory_of_change_intro; ?></textarea><br/>
                  Goal:<textarea name="edit_theory_change_goal" style="width:100%; height:150px;"><?php echo $theory_of_change_goal; ?></textarea><br/>
                  Embed Link: <input type="url" name="edit_theory_change_url" style="width:90%; margin-bottom:10px;" value="<?php echo $theory_of_change_url; ?>" class="text-input" required="" />
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="submit" name="submit_edit_thoery_change" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Theory of Change -->
        
	<div class="row updateboxarea">
		<div class="col-lg-2">
			<div class="introduction-image"><img src="images/commnunities/123.png"></div>
			<p id="intor-text">Introduction</p>
		</div>
		<div class="col-lg-10 text-style">
                    <?php echo $theory_of_change_intro; ?>
                </div>
	</div> <!-- the end of updateboxara-->
	<div class="row updateboxarea">
		<div class="col-lg-2">
			<div class="introduction-image"></div>
                        <p id="intor-text">Embed Link</p>
		</div>
            <div class="col-lg-10 text-style">
               
                 <object data=<?php echo $theory_of_change_url; ?> width="580" height="600"> 
        <embed src=<?php echo $theory_of_change_url; ?>  width="480" height="500"> </embed> 
        Error: Embedded data could not be displayed. </object>
            </div>
	</div> <!-- the end of updateboxara-->

	<div class="row updateboxarea">
		<div class="col-lg-2">
			<div class="introduction-image"><img src="images/commnunities/golde.png"></div>
			<p id="intor-text">Goals</p>
		</div>
            
                <div class="col-lg-10 text-style">
                    <?php echo $theory_of_change_goal; ?>
                </div>
        </div> <!-- the end of updateboxara-->
</div>
