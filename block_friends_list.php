<div id="friends_container">
<div id="panelTitle" class="panelPadding">
<div>
<span class="friendsIcon"></span>
<span class="title">
<?php
if($group_id)
{
echo $group_name.' Members';
}
else
{
	if($profile_uid==$uid)
	{
	echo "Your";
	}
	else
	{
	echo $Wall->UserFullName($username)."'s";
	}
	echo " Friends.";
}

?>

</div>
</div>
<div id="content" class="panelPadding">

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
$offset=($page-1)* $rowsPerPage;

if($group_id)
{
$updatesarray=$Wall->Group_Followers($group_id, $page, $offset, $rowsPerPage) ;
}
else
{
$updatesarray=$Wall->Friends_List($profile_uid, $page, $offset, $rowsPerPage) ;
}



if($updatesarray)
{
$i=1;
 foreach($updatesarray as $data)
 {
	$blockStatus=$data['status'];
 if($i%2)
 {
 $marginClass="stbodyRight";
 }
 else
 {
 $marginClass="stbodyLeft";
 }
 $friend_uid=$data['uid'];
 $friend_username=$data['username'];
 $aboutme=nameFilter($data['bio'],40);

$face=$Wall->User_Profilepic($friend_uid,$base_url,$upload_path);
 ?>
<div class="stbody <?php echo  $marginClass; ?>">
<div class="stimg">
<a href='<?php echo $base_url.'other_dashboard.php?username='.$friend_username; ?>'><img src="<?php echo $face;?>" class='big_face' alt='<?php echo $friend_username; ?>'/></a>
</div>
<div class="stfriend">
<div style='padding:10px'>

<?php
$profile_uid=$friend_uid;
include('friend_buttons.php');
?>
<b><a href="<?php echo $base_url.'other_dashboard.php?username='.$friend_username; ?>"><?php echo $Wall->UserFullName($friend_username); ?></a></b></br>
<?php echo $aboutme; ?>

</div>
</div>
</div>

 <?php
$i=$i+1;
 }

 }
 else
 {
echo '<div id="noContent">No friends added</div>';
 }


//Next Previous Buttons

if($friend_count > $rowsPerPage)
{

$maxPage = ceil($friend_count/$rowsPerPage);
$self = $_SERVER['PHP_SELF'];
$nav = '';

if ($page > 1)
{
$pagee = $page - 1;
$upload_path=$base_url.'friends/'.$username.'/'.$pagee;
$prev = "<span id=\"prev\" class='nbutton color'> <a href='$upload_path' class='next wallbutton blackButton'><< Prev</a></span> ";
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
$upload_path=$base_url.'friends/'.$username.'/'.$pagee;
$next = "<span id=\"next\" class='nbutton color'> <a href='$upload_path' class='next wallbutton blackButton'>Next >></a></span> ";
}
?>
<div style="padding-top:20px; margin:0px 10px 30px 10px; clear:both">
<?php echo $prev; ?>
<?php echo $next; ?>
</div>
<?php } ?>

</div>
</div>
