<?php
include_once 'includes.php';
include_once 'includes/getExtension.php';
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			$imageType=$_POST['imageType'];
			$groupID=$_POST['groupID'];
			if(strlen($name))
				{
					 $ext = getExtension($name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*$uploadImageSize))
						{
							$actual_image_name = $uid.time().".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];

							include 'includes/compressImage.php';
						$style='';
						$class='';
						$bgSave='';
						if(empty($groupID))
                        {
							if($imageType)
							{
							/* User Profile Pic */
							$widthArray = array($TimelineProfilePX); /* Image Pixel Size*/
							$prefix='user'; /* Image Prefix */
							foreach($widthArray as $newwidth)
							{
							$filename=compressImage($ext,$tmp,$upload_path,$actual_image_name,$newwidth,$prefix);
							}
							$final_image_name=$prefix.'_'.$actual_image_name;
							$newdata=$Wall->Profile_Image_Upload($uid,$final_image_name);
							$style='timelineIMG';
							}
							/* User Banner Pic */
							else
							{
							$widthArray = array($TimelineBannerPX); /* Image Pixel Size*/
							$prefix='bg'; /* Image Prefix */
							foreach($widthArray as $newwidth)
							{
							$filename=compressImage($ext,$tmp,$upload_path,$actual_image_name,$newwidth,$prefix);
							}
							$final_image_name=$prefix.'_'.$actual_image_name;
							$newdata=$Wall->ProfileBG_Image_Upload($uid,$final_image_name);
							$style='timelineBGload';
							$class='headerimage ui-corner-all';
							$bgSave='<div id="uX'.$uid.'" class="bgSave wallbutton blackButton">Save Cover</div>';
							}
						}
                        else
                        {
						if($imageType)
							{
							/* Group Profile Pic */
							$widthArray = array($TimelineProfilePX); /* Image Pixel Size*/
							$prefix='group'; /* Image Prefix */
							foreach($widthArray as $newwidth)
							{
							$filename=compressImage($ext,$tmp,$upload_path,$actual_image_name,$newwidth,$prefix);
							}
							$final_image_name=$prefix.'_'.$actual_image_name;
							$newdata=$Wall->Group_Image_Upload($uid,$final_image_name,$groupID);
							$style='timelineIMG';
							}
							/* Group Banner Pic */
							else
							{
							$widthArray = array($TimelineBannerPX); /* Image Pixel Size*/
							$prefix='bggroup'; /* Image Prefix */
							foreach($widthArray as $newwidth)
							{
							$filename=compressImage($ext,$tmp,$upload_path,$actual_image_name,$newwidth,$prefix);
							}
							$final_image_name=$prefix.'_'.$actual_image_name;
							$newdata=$Wall->GroupBG_Image_Upload($uid,$final_image_name,$groupID);
							$style='timelineBGload';
							$class='headerimage ui-corner-all';
							$bgSave='<div id="gX'.$groupID.'" class="bgSave wallbutton blackButton">Save Cover</div>';
							}
                        }

							if($newdata)
							{
							echo $bgSave.'<img src="'.$base_url.$filename.'"  id="'.$style.'" class="'.$class.'" style="top:0px"/>';
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
