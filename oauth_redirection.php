<?php

//Oauth User Login
$usernameOauth=$Wall->usernameCheck($uid);
if(empty($usernameOauth))
{
$username=$base_url.'login.php';
header("location:$username");
}

?>