<?php
/**************************
* Srinivas Tamada http://9lessons.info
  __          __   _ _    _____           _       _     ______
 \ \        / /  | | |  / ____|         (_)     | |   |____  |
  \ \  /\  / /_ _| | | | (___   ___ _ __ _ _ __ | |_      / /
   \ \/  \/ / _` | | |  \___ \ / __| '__| | '_ \| __|    / /
    \  /\  / (_| | | |  ____) | (__| |  | | |_) | |_    / /
     \/  \/ \__,_|_|_| |_____/ \___|_|  |_| .__/ \__|  /_/
                                          | |
                                          |_|

**************************/
class User
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
     $query=mysqli_query($this->db,"SELECT uid,notification_created FROM users WHERE (username='$username' or email='$username') and password='$md5_password' AND status='1'");
     if(mysqli_num_rows($query)==1)
     {
         $row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	 $uid=$row['uid'];
	 $notification_created=$row['notification_created'];
	 $time=time();
   /* Count Reset */
   $photos_query=mysqli_query($this->db,"SELECT id FROM user_uploads WHERE uid_fk='$uid' and group_id_fk='0'");
   $photos_count=mysqli_num_rows($photos_query);

   $updates_query=mysqli_query($this->db,"SELECT msg_id FROM messages WHERE uid_fk='$uid' and group_id_fk='0'");
   $updates_count=mysqli_num_rows($updates_query);

	 mysqli_query($this->db,"UPDATE users SET last_login='$time',photos_count='$photos_count',updates_count='$updates_count' WHERE uid='$uid'") or die(mysqli_error($this->db));
	 if(empty($notification_created))
	 {
	 mysqli_query($this->db,"UPDATE users SET notification_created='$time' WHERE uid='$uid'") or die(mysqli_error($this->db));
	 }
     return $uid;
     }
     else
     {
     return false;
     }
     }
     /* User Registration */
     public function User_Registration($username,$password,$email)
     {
     $username=mysqli_real_escape_string($this->db,$username);
     $email=mysqli_real_escape_string($this->db,$email);
     $password=mysqli_real_escape_string($this->db,$password);
     $md5_password=md5($password);
     $q=mysqli_query($this->db,"SELECT uid FROM users WHERE username='$username' or email='$email' ");
     $time=time();
     if(mysqli_num_rows($q)==0)
     {
	 $time=time();
     $query=mysqli_query($this->db,"INSERT INTO users(username,password,email,last_login)VALUES('$username','$md5_password','$email','$time')");
     $sql=mysqli_query($this->db,"SELECT uid FROM users WHERE username='$username'");
     $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
     $uid=$row['uid'];
     $friend_query=mysqli_query($this->db,"INSERT INTO friends(friend_one,friend_two,role,created)VALUES('$uid','$uid','me','$time')");
	 mysqli_query($this->db,"UPDATE users SET last_login='$time',notification_created='$time' WHERE uid='$uid'") or die(mysqli_error($this->db));
     return $uid ;

     }
     else
     {
     return false;
     }

     }
   
     /* Get verified code */
    public function User_Status($uid){
        $q= mysqli_query($this->db,"SELECT user_status FROM users WHERE uid='$uid' LIMIT 1") or die(mysqli_error($this->db));
        $data=mysqli_fetch_array($q,MYSQLI_ASSOC);
        $status=$data['user_status'];
        return $status;
        
    }

     /* CPS User Registration */
     public function CPS_User_Registration($firstname, $lastname, $email, $phone, $country, $username, $password, $birthday, $address, $account_type, $code)
     {
        $firstname=mysqli_real_escape_string($this->db,$firstname);
        $lastname=mysqli_real_escape_string($this->db,$lastname);
        $username=mysqli_real_escape_string($this->db,$username);
        $email=mysqli_real_escape_string($this->db,$email);
        $phone=mysqli_real_escape_string($this->db,$phone);
        $country=mysqli_real_escape_string($this->db,$country);
        $address=mysqli_real_escape_string($this->db,$address);
        $birthday=mysqli_real_escape_string($this->db,$birthday);
        $account_type=mysqli_real_escape_string($this->db,$account_type);
        $password=mysqli_real_escape_string($this->db,$password);
        $md5_password=md5($password);
    
	$time=time();
        $query=mysqli_query($this->db,"INSERT INTO users(username,password,email,first_name,last_name, birthday, last_login, "
                . "phone, country, address, verification_code) VALUES ('$username','$md5_password','$email', '$firstname',"
                . "'$lastname', '$birthday','$time', '$phone', '$country', '$address', '$code')");
        $sql=mysqli_query($this->db,"SELECT uid FROM users WHERE username='$username'");
        $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
        $uid=$row['uid'];
        $friend_query=mysqli_query($this->db,"INSERT INTO friends(friend_one,friend_two,role,created)VALUES('$uid','$uid','me','$time')");
	mysqli_query($this->db,"UPDATE users SET last_login='$time',notification_created='$time' WHERE uid='$uid'") or die(mysqli_error($this->db));
        return $uid ;

     }

	  public function Forgot($username,$forgot)
     {
     $username=mysqli_real_escape_string($this->db,$username);
	 $query=mysqli_query($this->db,"SELECT uid FROM users WHERE (username='$username' or email='$username') AND status='1'");
     if(mysqli_num_rows($query)==1)
     {
	 $sql=mysqli_query($this->db,"SELECT email FROM users WHERE username='$username'");
     $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
     $email=$row['email'];
	 $active_code=md5($forgot.$email.time());
	 mysqli_query($this->db,"UPDATE users SET forgot_code='$active_code' WHERE username='$username' or email='$username'");


	 return $active_code;
	 }
   else
   {
     return false;
   }

	 }

	  public function Activecode($activecode)
     {
     $activecode=mysqli_real_escape_string($this->db,$activecode);
	 $query=mysqli_query($this->db,"SELECT uid FROM users WHERE  forgot_code='$activecode' AND status='1'");
     if(mysqli_num_rows($query)==1)
     {
	 return true;
	 }
	 }

	 	 /* User New Password Change*/
     public function ChangePassword($newPassword,$activecode)
     {
     $newPassword=md5(mysqli_real_escape_string($this->db,$newPassword));
	 $activecode=mysqli_real_escape_string($this->db,$activecode);

     $query=mysqli_query($this->db,"UPDATE users SET password='$newPassword' WHERE forgot_code='$activecode'");
     mysqli_query($this->db,"UPDATE users SET forgot_code='' WHERE forgot_code='$activecode'");
     return true;
     }

	 public function Get_Configurations()
	{
	$query=mysqli_query($this->db,"SELECT forgot FROM configurations WHERE con_id='1' ")or die(mysqli_error($this->db));
    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $data;
	}

}

?>
