<?php
    require_once '../classes/databases/PlantDatabase.php';

    $id = $_REQUEST["id"];

    echo json_encode(PlantDatabase::get_plant_by_id($id));
?>