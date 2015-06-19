<?php
include_once 'includes.php';
include_once 'includes/getExtension.php';
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().$uid.".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							
							include 'includes/compressImage.php';
							$widthArray = array(600); /* Image Pixel Size*/
							$prefix='wall'; /* Image Prefix */
							foreach($widthArray as $newwidth)
							{
							$filename=compressImage($ext,$tmp,$upload_path,$actual_image_name,$newwidth,$prefix);
							}
							$final_image_name=$prefix.'_'.$actual_image_name;
							$data=$Wall->Image_Upload($uid,$final_image_name);
							$newdata=$Wall->Get_Upload_Image($uid,$final_image_name);
							if($newdata)
							{
							echo '<img src="'.$base_url.$filename.'"  class="preview" id="'.$newdata['id'].'"/>';
							}
							
							/*
							if(move_uploaded_file($tmp, $upload_path.$actual_image_name))
								{
								    $data=$Wall->Image_Upload($uid,$actual_image_name);
									 $newdata=$Wall->Get_Upload_Image($uid,$actual_image_name);
									 if($newdata)
									{
								         echo '<img src="'.$upload_path.$actual_image_name.'"  class="preview" id="'.$newdata['id'].'"/>';
								         
									}
								}
								*/
							else
							 {
								echo "Fail upload folder with read access.";
						     }
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format.";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>