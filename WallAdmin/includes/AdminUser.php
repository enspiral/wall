<?php
//Srinivas Tamada http://9lessons.info
//User

class AdminUser
{
     /* Database Connection */
     private $db;
     public function __construct($db) {
     $this->db = $db;
     }
	 /* User Login Check */
     public function User_Login($username,$password)
     {
     $username=mysqli_real_escape_string($this->db,$username);
     $password=mysqli_real_escape_string($this->db,$password);
     $md5_password=md5($password);

     $query=mysqli_query($this->db,"SELECT admin_id FROM admin WHERE (admin_username='$username' or admin_email='$username') and admin_password='$md5_password'");
     if(mysqli_num_rows($query)==1)
     {
     $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
     return $row['admin_id'];
     }
     else
     {
     return false;
     }
     }

	 	 /* Admin Password Change*/
     public function ChangePassword($newPassword,$session_admin_uid)
     {
     $newPassword=md5(mysqli_real_escape_string($this->db,$newPassword));

     $query=mysqli_query($this->db,"UPDATE admin SET admin_password='$newPassword' WHERE admin_id='$session_admin_uid'");
     return true;
     }

}

?>
