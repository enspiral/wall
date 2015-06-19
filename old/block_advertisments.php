<?php
$Advertisments=$Wall->Advertisments();
if($Advertisments)
{

?>
<div class="leftBlock">
<div class="small_title">Sponsored</div>
<?php foreach($Advertisments as $data)
{ ?>
<div class="adBlock">
<div class="adImg">
    <img class="img-responsive" src="<?php echo $base_url.$upload_path.$data['a_img']; ?>"/>
</div>
<div class="adTitle">
<b><a href="<?php echo $data['a_url']; ?>"><?php echo $data['a_title']; ?></a></b>
</div>
<div class="adURL"><a href="<?php echo $data['a_url']; ?>"><?php echo $data['a_url']; ?></a></div>
<div class="adDesc">
<?php echo $data['a_desc']; ?>
</div>
</div>

<?php }
echo '</div>';
} ?>
