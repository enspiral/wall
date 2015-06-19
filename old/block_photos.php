<div id="friends_container">
<div id="panelTitle" class="panelPadding">
<div >
<span class="photosIcon"></span>
<span class="title">
<?php
if($group_id)
{
echo $group_name.' Photos';
}
else
{
echo "Photos";
}
?>
</span>
</div>

<?php
$photos_of=$_GET['q'];
$move_arrow='';
if($photos_of)
{
$move_arrow="arrowUp_white_move";
}

if(empty($group_id))
{

if($profile_uid==$uid)
{
$pName="Your";
}
else
{
$pName=$Wall->UserFullName($username)."'s";
}

echo "<div id='menuPhoto'> <span class='arrowUp_white ".$move_arrow."'></span><a href='".$base_url."photos/".$username."'>".$pName." Photos</a> <a href='".$base_url."photos_of/".$username."'>Photos of ".$pName."</a>  </div>";

}

?>




</div>
<div id="content" class="panelPadding">
<div id="photosContainer">
<?php
// User Friends List
if(isset($_GET['page']))
{
$page=$_GET['page'];
}
else
{
$page=0;
}
$offset=($page-1)* $photosPerPage;

if($group_id)
{
$updatesarray=$Wall->Group_Photos_List($group_id, $page, $offset, $photosPerPage);
}
else
{

$updatesarray=$Wall->Photos_List($profile_uid, $page, $offset, $photosPerPage,$photos_of);
}


if($updatesarray)
{

 foreach($updatesarray as $data)
 {
 $photo_id=$data['id'];
 $photo_path=$base_url.$upload_path.$data['image_path'];
 $photo_owner_id=$data['uid_fk'];
 $delete='';



 if($profile_uid==$uid)
 {
 $delete='<span class="imageDelete" id="'.$photo_id.'" original-title="Delete Photo"></span>';
 }
 else if($photo_owner_id==$uid || $group_owner_id==$uid)
 {
  $delete='<span class="imageDelete" id="'.$photo_id.'" original-title="Delete Photo"></span>';
 }



 $final=$delete.'<a href="'.$photo_path.'" data-lightbox="lightbox" data-title="'.$Wall->UserFullName($username).'"><img src="'.$photo_path.'" class="photoImg" /></a>';
 ?>

<div class="photoBody">
<?php echo $final; ?>
</div>
 <?php

 }

 }
 else
 {
echo '<div id="noContent">No Photos Uploaded</div>';
 }


//Next Previous Buttons
$photo_count=$Wall->Photos_Check_Count($profile_uid);
if($photo_count > $rowsPerPage)
{

$maxPage = ceil($photo_count/$rowsPerPage);
$self = $_SERVER['PHP_SELF'];
$nav = '';

if ($page > 1)
{
$pagee = $page - 1;
$upload_path=$base_url.'photos/'.$username.'/'.$pagee;
$prev = "<span id=\"prev\" class='nbutton color'> <a href='$upload_path' class='next'><< Prev</a></span> ";
}

if ($page < $maxPage)
{
if($page)
{
$pagee= $page + 1;
}
else
{
$pagee= $page + 2;
}
$upload_path=$base_url.'photos/'.$username.'/'.$pagee;
$next = "<span id=\"next\" class='nbutton color'> <a href='$upload_path' class='next'>Next >></a></span> ";
}
?>
</div>

<div style="padding-top:20px; margin:0px 10px 30px 10px; clear:both">
<?php echo $prev; ?>
<?php echo $next; ?>
</div>
<?php } ?>

</div>

</div>
