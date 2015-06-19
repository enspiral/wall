 <?php
include_once 'includes.php';

if(isSet($_POST['adTitle']) && isSet($_POST['adDesc']) && isSet($_POST['adURL']) && isSet($_POST['adImg']))
{
$title=$_POST['adTitle'];
$desc=$_POST['adDesc'];
$url=$_POST['adURL'];
$image=$_POST['adImg'];
$data=$WallAdmin->Insert_Advertisment($title,$desc,$url,$image);
if($data)
{
?>
<div class="ad_block" id="adBlock<?php echo $data['a_id'];  ?>">
<a  href="#" id="<?php echo $data['a_id'];  ?>" class="adDelete">X</a>
<div  class='ad_imagedivx'><img src="<?php echo $base_url.$upload_path.$data['a_img']; ?>" style="width:228px"></div>
<div> <a href="<?php echo $data['a_url']; ?>"  class="ad_title" target="blank"><?php echo $data['a_title']; ?></a></div>
<div  class="ad_url"><?php echo $data['a_url']; ?></div>
<div  class="ad_desc"><?php echo $data['a_desc']; ?></div>
</div>
<?php
}
}
?>
