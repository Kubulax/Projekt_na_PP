<?php
    require_once 'classes/databases/PlantDatabase.php';
    require_once 'classes/databases/PlantCategoryDatabase.php';
    class PlantOfferCreationPage
    {
        private static $PlantOfferCreationPage;

        private function __construct()
        {

        }

        public static function instance()
        {
            if (self::$PlantOfferCreationPage === null)
            {
                self::$PlantOfferCreationPage = new PlantOfferCreationPage();
            }

            return self::$PlantOfferCreationPage;
        }

        public function render_plant_category_html_option_fields()
        {
            $categories = PlantCategoryDatabase::get_categories_info();

            while($row = $categories->fetch_object())
            {
                echo "<option value='$row->id'>$row->name</option>";
            }
        }
    }
?>