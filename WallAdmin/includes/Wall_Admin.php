<?php
/**************************
* Srinivas Tamada http://9lessons.info
* Wall_Admin
  __          __   _ _    _____           _       _     ______
 \ \        / /  | | |  / ____|         (_)     | |   |____  |
  \ \  /\  / /_ _| | | | (___   ___ _ __ _ _ __ | |_      / /
   \ \/  \/ / _` | | |  \___ \ / __| '__| | '_ \| __|    / /
    \  /\  / (_| | | |  ____) | (__| |  | | |_) | |_    / /
     \/  \/ \__,_|_|_| |_____/ \___|_|  |_| .__/ \__|  /_/
                                          | |
                                          |_|

**************************/
class Wall_Admin
{
public $perpage = 20; /*Uploads perpage*/
private $db;

	public function __construct($db)
	{
	$this->db = $db;
	}



	 //Users Count
    public function Users_Count()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM users")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	 //Updates Count
    public function Updates_Count()
    {
    $query=mysqli_query($this->db,"SELECT msg_id FROM messages")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Comments Count
    public function Comments_Count()
    {
    $query=mysqli_query($this->db,"SELECT com_id FROM comments")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Groups Count
    public function Groups_Count()
    {
    $query=mysqli_query($this->db,"SELECT group_id FROM groups")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Share Count
    public function Share_Count()
    {
    $query=mysqli_query($this->db,"SELECT share_id FROM message_share")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Like Count
    public function Like_Count()
    {
    $query=mysqli_query($this->db,"SELECT like_id FROM message_like")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Active Users Count
    public function ActiveUsers_Count()
    {
    $query=mysqli_query($this->db,"SELECT uid FROM users where status='1'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Conversations Users Count
    public function Conversations_Count()
    {
    $query=mysqli_query($this->db,"SELECT c_id FROM conversation")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Conversations Users Count
    public function UserUploads_Count()
    {
    $query=mysqli_query($this->db,"SELECT id FROM user_uploads WHERE image_type='0'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	//Conversations Users Count
    public function ProfileUploads_Count()
    {
    $query=mysqli_query($this->db,"SELECT id FROM user_uploads WHERE image_type>'0'")or die(mysqli_error($this->db));
    return mysqli_num_rows($query);
    }

	 /* User Details*/
    public function Users_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT uid,username,email,friend_count,profile_pic,conversation_count,updates_count,profile_bg,group_count,
	profile_pic_status,verified,provider,name  FROM users WHERE status='1' ORDER BY uid DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	 /* User Details*/
    public function Blocked_Users_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT uid,username,email,friend_count,profile_pic,conversation_count,updates_count,profile_bg,group_count,
	profile_pic_status,verified,provider,name  FROM users WHERE status='2' ORDER BY uid DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	 /* User Details*/
    public function Verified_Users_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT uid,username,email,friend_count,profile_pic,conversation_count,updates_count,profile_bg,group_count,
	profile_pic_status,verified,provider,name  FROM users WHERE status='1' AND verified='1' ORDER BY uid DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }


	 /* Updates Details*/
    public function Updates_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT M.msg_id,M.message,U.username  FROM messages M, users U WHERE U.uid=M.uid_fk  ORDER BY msg_id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	 /* Comments Details*/
    public function Comments_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT C.com_id,C.comment,U.username  FROM comments C, users U WHERE U.uid=C.uid_fk  ORDER BY com_id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	/* Group Details*/
    public function Groups_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT G.group_name,G.group_id,G.group_desc,U.username  FROM groups G, users U WHERE U.uid=G.uid_fk AND G.status='1' ORDER BY group_id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

		/* Group Details*/
    public function BlockGroups_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT G.group_name,G.group_id,G.group_desc,U.username  FROM groups G, users U WHERE U.uid=G.uid_fk  AND G.status='0' ORDER BY group_id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	/* UserUploads Details*/
    public function UserUploads_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT G.image_path,G.id,G.group_id_fk,U.username  FROM user_uploads G, users U WHERE U.uid=G.uid_fk  AND image_type='0' ORDER BY id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	/* Profile Details*/
    public function ProfileUploads_Details($start,$per_page)
    {
	$start=mysqli_real_escape_string($this->db,$start);
	$per_page=mysqli_real_escape_string($this->db,$per_page);
    $query=mysqli_query($this->db,"SELECT G.image_path,G.id,G.group_id_fk,U.username  FROM user_uploads G, users U WHERE U.uid=G.uid_fk  AND image_type>'0' ORDER BY id DESC LIMIT $start, $per_page")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
    }

	/* User Block*/
    public function User_Block($uid,$type)
    {
	$uid=mysqli_real_escape_string($this->db,$uid);
	$type=mysqli_real_escape_string($this->db,$type);

	if(strlen($type))
	{
	/* Unblock */
	$query=mysqli_query($this->db,"UPDATE users SET status='1' WHERE uid='$uid'")or die(mysqli_error($this->db));
	}
	else
	{
	/* block */
    $query=mysqli_query($this->db,"UPDATE users SET status='2' WHERE uid='$uid'")or die(mysqli_error($this->db));
     }

	return $query;
    }

	/* User Verify*/
    public function User_Verify($uid,$type)
    {
	$uid=mysqli_real_escape_string($this->db,$uid);
	$type=mysqli_real_escape_string($this->db,$type);
	if(strlen($type))
	{
	/* Unverified */
	$query=mysqli_query($this->db,"UPDATE users SET verified='0' WHERE uid='$uid'")or die(mysqli_error($this->db));
	}
	else
	{
	echo "UPDATE users SET verified='1' WHERE uid='$uid'";
	/* Verified */
    $query=mysqli_query($this->db,"UPDATE users SET verified='1' WHERE uid='$uid'")or die(mysqli_error($this->db));
     }

	return $query;
    }

    /* User Delete*/
    public function User_Delete($uid)
    {
	$uid=mysqli_real_escape_string($this->db,$uid);

	if(strlen($uid))
	{

	mysqli_query($this->db,"DELETE FROM conversation_reply WHERE user_id_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM conversation WHERE user_one='$uid' OR user_two='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM user_uploads WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM comment_like WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM message_share WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM message_like WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM group_users WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM groups WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM comments WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM messages WHERE uid_fk='$uid'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM users WHERE uid='$uid'")or die(mysqli_error($this->db));
	}
	return $query;
    }

	/* User Delete*/
    public function Message_Delete($msg_id)
    {
	$msg_id=mysqli_real_escape_string($this->db,$msg_id);

	if(strlen($msg_id))
	{

	$query=mysqli_query($this->db,"SELECT com_id  FROM comments WHERE msg_id_fk='$msg_id'")or die(mysqli_error($this->db));
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$cid=$row['com_id'];
	mysqli_query($this->db,"DELETE FROM comment_like WHERE com_id_fk='$cid'")or die(mysqli_error($this->db));
	}

	mysqli_query($this->db,"DELETE FROM message_share WHERE uid_fk='$msg_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM message_like WHERE uid_fk='$msg_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM comments WHERE msg_id_fk='$msg_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM messages WHERE msg_id='$msg_id'")or die(mysqli_error($this->db));

	}
	return $query;
    }


	/* Comment Delete*/
    public function Comment_Delete($com_id)
    {
	$com_id=mysqli_real_escape_string($this->db,$com_id);

	if(strlen($com_id))
	{
	mysqli_query($this->db,"DELETE FROM comment_like WHERE com_id_fk='$com_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM comments WHERE com_id='$com_id'")or die(mysqli_error($this->db));
	}
	return true;
    }

	/* Group Delete*/
    public function Group_Delete($group_id)
    {
	$group_id=mysqli_real_escape_string($this->db,$group_id);

	if(strlen($group_id))
	{
	mysqli_query($this->db,"DELETE FROM messages WHERE group_id_fk='$group_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM group_users WHERE group_id_fk='$group_id'")or die(mysqli_error($this->db));
	mysqli_query($this->db,"DELETE FROM groups WHERE group_id='$group_id'")or die(mysqli_error($this->db));
	}
	return true;
    }

	/* Group Block*/
    public function Group_Block($group_id,$type)
    {
	$group_id=mysqli_real_escape_string($this->db,$group_id);
	$type=mysqli_real_escape_string($this->db,$type);

	if(strlen($type))
	{
	/* Unblock */
	$query=mysqli_query($this->db,"UPDATE groups SET status='1' WHERE group_id='$group_id'")or die(mysqli_error($this->db));
	}
	else
	{

	/* Block */
    $query=mysqli_query($this->db,"UPDATE groups SET status='0' WHERE group_id='$group_id'")or die(mysqli_error($this->db));
     }


	return true;
    }

	/*Delete images*/
	public function Delete_Image($pid,$upload_path)
	{
	$com_id=mysqli_real_escape_string($this->db,$pid);
	$query=mysqli_query($this->db,"SELECT id,image_path FROM user_uploads U WHERE id='$pid'");
	$num=mysqli_num_rows($query);

	if($num>0)
	{
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	$final_image="../".$upload_path.$data['image_path'];
	unlink($final_image);

	$q=mysqli_query($this->db,"SELECT uploads,msg_id FROM messages WHERE  uploads!=0 AND  uploads LIKE '%$pid%';");
	$d=mysqli_fetch_array($q,MYSQLI_ASSOC);
	$msgid=$d['msg_id'];
	$str = $d['uploads'];

	$tmp = explode(",", $str);
	$key = array_search($pid, $tmp);
	if($key)
	$tmp[$key] = null;
	$tmp = array_filter($tmp);
	$newSet = implode(",",$tmp);
	$newSet=(string)$newSet;

	if($newSet==$str)
	{
	$pattern = '/(\,)?'.$pid.'(\,)?/i';
	$newSet=preg_replace($pattern, '', $str);
	}

	if(strlen($newSet)==0)
	$newSet='0';

	mysqli_query($this->db,"UPDATE messages SET uploads='$newSet' WHERE msg_id='$msgid'") or die(mysqli_error($this->db));
	$query = mysqli_query($this->db,"DELETE FROM user_uploads WHERE id='$pid'") or die(mysqli_error($this->db));
	return true;
	}

	}


	/* Template Update*/
	public function Template($t_id,$t_order)
	{
	$t_id=mysqli_real_escape_string($this->db,$t_id);
	$t_order=mysqli_real_escape_string($this->db,$t_order);

	if(strlen($t_id) && strlen($t_order))
	{
	mysqli_query($this->db,"UPDATE template SET t_order='$t_id' WHERE t_id='$t_order'")or die(mysqli_error($this->db));
	}
	return true;
	}

	/* Template Update*/
	public function Template_Order()
	{

	$query=mysqli_query($this->db,"SELECT t_id,t_name,t_file,t_order FROM template ORDER BY t_order ASC")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}

	/* Template Update*/
	public function Insert_Advertisment($title,$desc,$url,$image)
	{

	mysqli_query($this->db,"INSERT INTO advertisments(a_title,a_desc,a_url,a_img)VALUES('$title','$desc','$url','$image')")or die(mysqli_error($this->db));
    $query=mysqli_query($this->db,"SELECT a_id,a_title,a_desc,a_url,a_img FROM advertisments ORDER BY a_id DESC LIMIT 1")or die(mysqli_error($this->db));
	$data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $data;
	}

	/* Advertisments*/
	public function Advertisments()
	{

	$query=mysqli_query($this->db,"SELECT a_id,a_title,a_desc,a_url,a_img,status FROM advertisments ORDER BY a_id DESC")or die(mysqli_error($this->db));
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$data[]=$row;
	}
	return $data;
	}

	/* Configurations*/
	public function Get_Configurations()
	{
	$query=mysqli_query($this->db,"SELECT  applicationName,applicationDesc,forgot,newsfeedPerPage,friendsPerPage,photosPerPage,groupsPerPage,adminPerPage,notificationPerPage, uploadImage,bannerWidth, profileWidth,gravatar,friendsWidgetPerPage FROM configurations WHERE con_id='1' ")or die(mysqli_error($this->db));
    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);
	return $data;
	}


	/* Template Update*/
	public function Advertisment_Delete($aid)
	{
  $aid=mysqli_real_escape_string($this->db,$aid);
	echo "DELETE FROM advertisments WHERE a_id='$aid'";
	mysqli_query($this->db,"DELETE FROM advertisments WHERE a_id='$aid'")or die(mysqli_error($this->db));

	return true;
	}

	/* Image Config*/
	public function Image_Config($uploadimage,$banner,$profile,$gravatar)
	{
  $final_uploadimage=$uploadimage*1024;

	mysqli_query($this->db,"UPDATE configurations SET uploadImage='$final_uploadimage',bannerWidth='$banner',profileWidth='$profile',gravatar='$gravatar'  WHERE con_id='1'")or die(mysqli_error($this->db));

	return $data;
	}

	/* PerPage Config*/
	public function Perpage_Config($NewsFeedPerPage,$notifications,$friends,$friendsWidget,$photos,$groups,$admin,$forgot)
	{

	mysqli_query($this->db,"UPDATE configurations SET newsfeedPerPage='$NewsFeedPerPage',notificationPerPage='$notifications',friendsPerPage='$friends',photosPerPage='$photos',groupsPerPage='$groups',adminPerPage='$admin',friendsWidgetPerPage='$friendsWidget',forgot='$forgot'  WHERE con_id='1'")or die(mysqli_error($this->db));

	return $data;
	}
}
?>
