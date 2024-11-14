<?php
    require_once '../classes/databases/PlantDatabase.php';
    require_once '../classes/servers/ImagesServer.php';

    $plantId = $_POST["plantId"];
    $categoryId = $_POST["categoryId"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $treatment = $_POST["treatment"];
    $image = $_FILES["image"];
    $imageName = $_POST["imageName"];
    $price = $_POST["price"];

    if(empty($name) || $name === null || $name === "" || empty($categoryId) || $categoryId === null || $categoryId === "" || empty($price) || $price === null || $price === "" || $price == 0)
    {
        echo 0;
        exit();
    }

    $imageServerName = $imageName;

    if($image != 4 && ($image['size'] != 0 && $image['error'] == 0))
    {
        $imageServerName = ImagesServer::change_image($image, $imageName);
    }
    

    if(PlantDatabase::update_plant($plantId, $categoryId, $name, $description, $treatment, $imageServerName, $price))
    {
        echo 1;
        exit();
    }
    else
    {
        ImagesServer::unlink_image($imageServerName);
        echo 0;
        exit();
    }
?>