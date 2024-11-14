<?php
    class PlantDatabase
    {
        public static function get_short_info_of_every_plant()
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $query = "SELECT plants.id, plant_categories.name as category, plants.name FROM `plants` INNER JOIN plant_categories ON plants.plant_categoires_id = plant_categories.id;";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->get_result();

            $connect->close();

            return $result;
        }

        public static function get_plant_by_id($id)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $filteredId = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $query = "SELECT *, plants.name as name, plant_categories.name as category, plant_categories.id as categoryId FROM `plants` INNER JOIN `plant_categories` ON plants.plant_categoires_id = plant_categories.id WHERE plants.id = ?;";
            $statement = $connect->prepare($query);
            $statement->bind_param("i", $filteredId);
            $statement->execute();
            $result = $statement->get_result();

            $connect->close();

            return $result->fetch_array();
        }

        public static function create_plant($categoryId, $name, $description, $treatment, $image, $price)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $filteredCategoryId = filter_var($categoryId, FILTER_SANITIZE_NUMBER_INT);
            $filteredName = htmlspecialchars($name, ENT_QUOTES);
            $filteredDescription = htmlspecialchars($description, ENT_QUOTES);
            $filteredTreatment = htmlspecialchars($treatment, ENT_QUOTES);
            $filteredImage = htmlspecialchars($image, ENT_QUOTES);
            $filterePrice = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);

            $query = "INSERT INTO `plants`(`plant_categoires_id`, `name`, `description`, `treatment`, `image`, `price`) VALUES (?,?,?,?,?,?)";
            $statement = $connect->prepare($query);
            $statement->bind_param("isssss", $filteredCategoryId, $filteredName, $filteredDescription, $filteredTreatment, $filteredImage, $filterePrice);
            $statement->execute();

            $operationStatus = false;
            if($connect->affected_rows > 0)
            {
                $operationStatus = $connect->insert_id;
            }

            $connect->close();


            return $operationStatus;
        }

        public static function update_plant($plantId, $categoryId, $name, $description, $treatment, $image, $price)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $filteredPlantId = filter_var($plantId, FILTER_SANITIZE_NUMBER_INT);
            $filteredCategoryId = filter_var($categoryId, FILTER_SANITIZE_NUMBER_INT);
            $filteredName = htmlspecialchars($name, ENT_QUOTES);
            $filteredDescription = htmlspecialchars($description, ENT_QUOTES);
            $filteredTreatment = htmlspecialchars($treatment, ENT_QUOTES);
            $filteredImage = htmlspecialchars($image, ENT_QUOTES);
            $filterePrice = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);

            $query = "UPDATE `plants` SET `plant_categoires_id`= ?,`name`= ?,`description`= ?,`treatment`= ?,`image`= ?,`price`= ? WHERE id = ?";
            $statement = $connect->prepare($query);
            $statement->bind_param("isssssi", $filteredCategoryId, $filteredName, $filteredDescription, $filteredTreatment, $filteredImage, $filterePrice, $filteredPlantId);
            $statement->execute();

            $connect->close();

            return true;
        }

        public static function delete_plant($plantId)
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $filteredId = filter_var($plantId, FILTER_SANITIZE_NUMBER_INT);

            $query = "DELETE FROM `plants` WHERE id = ?";
            $statement = $connect->prepare($query);
            $statement->bind_param("i", $filteredId);
            $statement->execute();

            $operationStatus = false;
            if($connect->affected_rows > 0)
            {
                $operationStatus = true;
            }

            $connect->close();

            return $operationStatus;
        }
    }  
?>