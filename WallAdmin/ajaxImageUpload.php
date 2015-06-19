<?php
include_once 'includes.php';
include '../includes/getExtension.php';

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
  if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {

        $filename = $_FILES['photos']['name'];
        $size=filesize($_FILES['photos']['tmp_name']);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
        
          $ext = strtolower($ext);

         if(in_array($ext,$valid_formats))
         {
         if($size<(1024*$uploadImageSize))
         {

       $actual_image_name = 'add'.$uid.'_'.time().".".$ext;

              if(move_uploaded_file($_FILES['photos']['tmp_name'], $admin_path.$actual_image_name))
                {
                  //  $data=$Wall->Image_Upload($uid,$actual_image_name,$group_id);

                   if(1)
                  {


echo '<img src="'.$base_url.$upload_path.$actual_image_name.'"  class="ad_image" rel="'.$actual_image_name.'"/>';

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



    }
?>
