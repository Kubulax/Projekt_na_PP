<?php
    require_once 'classes/databases/PlantDatabase.php';
    require_once 'classes/databases/PlantCategoryDatabase.php';
    class PlantOfferModificationPage
    {
        private static $PlantOfferModificationPage;

        private function __construct()
        {

        }

        public static function instance()
        {
            if (self::$PlantOfferModificationPage === null)
            {
                self::$PlantOfferModificationPage = new PlantOfferModificationPage();
            }

            return self::$PlantOfferModificationPage;
        }

        public function render_plant_offer_html_option_fields()
        {
            $plants = PlantDatabase::get_short_info_of_every_plant();

            while($row = $plants->fetch_object())
            {
                echo "<option value='$row->id'>$row->id / $row->category / $row->name</option>";
            }
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