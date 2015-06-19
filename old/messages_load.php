 <?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php
if($lastid=='')
{
$lastid=0;
}

//Status Message Check
if($statusMsgID)
{
$updatesarray=$Wall->Updates($profile_uid,$lastid,$perpage);
$total=$Wall->Total_Updates($profile_uid);
}
else
{

//Profile Page Check
if($profile_uid)
{
$updatesarray=$Wall->Updates($profile_uid,$lastid,$perpage,'');
$total=$Wall->Updates($profile_uid,$lastid,$perpage,'1');
}
else if($groupID)
{
$updatesarray=$Wall->Group_Updates($groupID,$lastid,$perpage,'');
$total=$Wall->Group_Updates($groupID,$lastid,$perpage,'1');
}
//Home Page Feed
else
{
$updatesarray=$Wall->Friends_Updates($uid,$lastid,$perpage,'');
$total=$Wall->Friends_Updates($uid,$lastid,$perpage,'1');
}
}

if($updatesarray)
{

foreach($updatesarray as $data)
{
include("html_messages.php");
}

if($total>$perpage)
{
  ?>
 <!-- More Button here $msg_id values is a last message id value. -->
<?php
$link=$index_url;
$class='';
if($login){
$link='#';
$class='more';
}
?>

<div id="more<?php echo $time; ?>" class="morebox">
<a href="<?php echo $link; ?>" class="<?php echo $class; ?> ee" id="<?php echo $time; ?>" rel='<?php echo $profile_uid ?>' grp='<?php echo $groupID ?>'>More</a>
</div>

  <?php
  }
  }
else
{

if($home)
include 'block_welcome.php';
else
echo '<h3 id="noupdates">No Updates</h3>';

}
?>