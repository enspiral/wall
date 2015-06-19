 <?php
 //Srinivas Tamada http://9lessons.info
//Load latest update
include_once 'includes.php';

if(isSet($_POST['searchword']))
{
$searchword=$_POST['searchword'];
$type=$_POST['type'];

$updatesarray=$Wall->User_Group_Search($searchword);
if($updatesarray)
{
foreach($updatesarray as $data)
{
$search_id=$data['id'];
$search_name=$data['name'];
$search_aboutme=$data['aboutme'];
$search_face=$data['face'];
$type=$data['type'];
if($type=='user')
{
$search_full_name=$Wall->UserFullName($search_name);
if(strlen($upload_path)<=0){
    $face=$base_url."wall_icons/default.png";
}else{
    $face=$Wall->User_Profilepic($search_id,$base_url,$upload_path);
}
//$search_url=$base_url.$search_name;
// $search_url = $base_url.'other_dashboard.php?username='.$search_name;
$search_url = $base_url.'index.php?p=each_profile_user&profile_id='.$search_id;

}
else
{
$search_url=$base_url.'group.php?gid='.$search_id;
$search_full_name=nameFilter($search_name,25);
$search_aboutme=nameFilter($search_aboutme,35);
if(strlen($upload_path)>0){
    $face=$base_url."wall_icons/default.png";
}else{
    $face=$base_url.$upload_path.$search_face;
}
//$Wall->Group_Profilepic($search_id,$base_url,$upload_path);

}

// User Avatar


?>
<a href='<?php echo $search_url; ?>' style='display:block'>
<div class="display_box" align="left">
<img src="<?php echo $face; ?>" class='search_face'/>
<b>
<?php echo $search_full_name."</b>";

    if($type==1){
        echo "- Project";
    }else if($type==2){
        echo "- Community";
    }else if($type==3){
        echo "- Organization";
    }
    //echo "- Group"; 



echo '<div class="searchDesc">'.$search_aboutme.'</div>';
?>
</div></a>
<?php
}
}
else
{
?>
<div class="display_box" align="left">
<h4 id="noupdates">No Results Found</h4>
</div>

<?php
}


}
?>
