<?php
include_once 'includes.php';
include 'includes/getExtension.php';
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
	   $group_id=$_POST['group_id'];
	   if(empty($group_id))
	   {
	   $group_id='';
	   }
	   $v='';	
       $i=1;	   
       foreach ($_FILES['photos']['name'] as $name => $value)
        {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size=filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
	       if($size<(1024*$uploadImageSize))
	       {
		   
		   $actual_image_name = 'user'.$uid.'_'.time().$i.".".$ext;
		
		   	                 if(move_uploaded_file($_FILES['photos']['tmp_name'][$name], $upload_path.$actual_image_name))
								{
								    $data=$Wall->Image_Upload($uid,$actual_image_name,$group_id);
									 $newdata=$Wall->Get_Upload_Image($uid,$actual_image_name);
									 if($newdata)
									{ 
									    if(empty($v))
										$v=$newdata['id'];
										else
										$v=$v.','.$newdata['id'];
										
echo '<img src="'.$base_url.$upload_path.$actual_image_name.'"  class="preview" id="'.$v.'"/>';
								         
									}
								}
								else
							 {
								echo "Fail upload fail.";
						     }
           

	       }
		   else
		   {
			echo '<span class="imgList">You have exceeded the size limit!</span>';
          
	       }
       
          }
          else
         { 
	     	echo '<span class="imgList">Unknown extension!</span>';
           
	     }
           $i=$i+1;
     }
			
		}
?>