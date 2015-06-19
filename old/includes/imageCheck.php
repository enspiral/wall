<?php
//Get File Extension 
function imageCheck($imageurl,$upload_path,$base_url) 
{
     
			      /*User Uploaded Picture */
			      if(!empty($imageurl))
			      {
			      $profile_pic_path=$base_url.$upload_path;
			      $data= $profile_pic_path.$imageurl;
		          return $data;
		          }
				  else
				  {
				  $data=$base_url."wall_icons/default.png";
				  return $data;
				  }

 }
?>