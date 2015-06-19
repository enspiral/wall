<?php 

$userdetails=$Wall->User_Details($uid);
$username=$userdetails['username'];
$email=$userdetails['email'];
$full_name=$userdetails['full_name'];
$profile_pic=$userdetails['profile_pic'];

?>

<p>Name: <?php echo ucfirst($username); ?></p><br>
<p>Email: <?php echo $email; ?></p>