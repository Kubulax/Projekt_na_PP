<?php
    class ImagesServer
    {
        public static function change_image($imageFile, $oldImageFileName)
        {
            $defaultImageFileName = "null.png";
            $allowedImgTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

            $imageInfo = getimagesize($imageFile['tmp_name']);
            $imageType = $imageInfo[2];
            $imageSize = $imageFile['size'];
            $imageName = $imageFile['name'];

            if(!in_array($imageType, $allowedImgTypes)) 
            {
                return false;
            }

            if($imageSize > 1000000) 
            {
                return false;
            } 

            if(mb_strlen($imageName) > 200 || preg_match('/[\/?*:;\\{}]+/', $imageName))
            {   
                return false;
            }

            $serverFileName = uniqid('user_').'.'.pathinfo($imageFile['name'], PATHINFO_EXTENSION);

            move_uploaded_file($imageFile['tmp_name'], '../../images/'.$serverFileName);
            
            if($oldImageFileName !== "" && file_exists("../../images/".$oldImageFileName) && $oldImageFileName !== $defaultImageFileName)
            {
                unlink("../../images/".$oldImageFileName);
            }

            return $serverFileName;
        }

        public static function unlink_image($imageFileName)
        {
            unlink("../../images/".$imageFileName);
        }
    }
?>