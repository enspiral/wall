<div class="modal fade" id="edit_proj_location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Project Location </h4>
      </div>
      <div class="modal-body">      
         
            <form method="post" action="">
                <input type="text" name="edit_proj_location"><?php echo $proj_location; ?>
                <input type="submit" class="wallbutton" name="submit_proj_location" value="Save" />
                <input type="submit" class="wallbutton" name="submit_proj_location" value="Cancel" />
            </form>
      </div>
    </div>
  </div>
</div>