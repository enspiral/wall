<div class="col-lg-12">
  <?php if($announcement)
{
  foreach($announcement as $data)
  {
    include("announcement.php");
   
  }
  
}else{
  echo "No Annoucenment Found!";
} ?>
</div>