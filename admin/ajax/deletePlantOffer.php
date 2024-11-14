<?php
    require_once '../classes/databases/PlantDatabase.php';
    require_once '../classes/servers/ImagesServer.php';

    $id = $_REQUEST["id"];
    $imageName = $_REQUEST["imageName"];
    
    PlantDatabase::delete_plant($id);
    ImagesServer::unlink_image($imageName);
?>