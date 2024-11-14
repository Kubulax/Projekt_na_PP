<?php
    class PlantCategoryDatabase
    {
        public static function get_categories_info()
        {
            $connect = new mysqli('localhost', 'root', '', 'plantshop');
            if ($connect->connect_error) 
            {
                return false;
            }

            $query = "SELECT * FROM `plant_categories`;";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->get_result();

            $connect->close();

            return $result;
        }
    }  
?>