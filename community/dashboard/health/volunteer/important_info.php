<?php 
	$important_infos = mysqli_query($db,"select * from com_volunteer_important_info where com_id= ".$com_id.";");
 ?>
<div style="clear:both"></div>
<?php foreach ($important_infos as $important_info) { ?>
<div class="text">
	<h3><?php echo $important_info['title'] ;?></h3>
	<span class="edit-icon" ><a href="" data-toggle="modal" data-target='#edit_<?php echo $important_info['id']; ?>'><i class="glyphicon glyphicon-edit"></i></a></span>
	<hr>
	<p><?php echo $important_info['description'] ;?></p>
</div>
<div style="clear:both"></div>
<div class="modal fade" id="edit_<?php echo $important_info['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit <?php echo $important_info['title'] ;?></h4>
            </div>
            <div class="modal-body">
            	<textarea style="height:150px; width:100%;" name="des" id="des"><?php echo $important_info['description'] ;?></textarea>
                
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                    <button id="<?php echo $important_info['id'] ;?>" name="save" class="btn btn-sm btn-primary update-text">Update</button>
                </div>
        </div>
    </div>
</div>
<?php } ?>


<script type="text/javascript">
	$('.update-text').click(function(){
        var id = $(this).attr('id');
        var content = $('#des').val();

        $.ajax({
            type:'POST',
            url:'<?php echo $base_url; ?>community/ajax_community.php',
            data:{
               content    	:content,
               id    		: id,
               edit_important_info  :'edit_important_info',
            },
            success:function(data){
                location.reload();
            },error:function(data){
                alert(data);
            }
        });
    });
</script>