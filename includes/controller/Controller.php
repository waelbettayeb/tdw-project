<?php
/**
 * Created by PhpStorm.
 * User: wael
 * Date: 03/12/18
 * Time: 09:17
 */

class Controller {

    public static function createView() {

        require_once('./includes/view/indexView.php');
    }
    public static function createCategorieView($categorie) {
        $page_categorie = $categorie;
        require_once('./includes/view/categorie.php');
    }

    public static function createAboutView()
    {
        require_once('./includes/view/about.php');
    }
    public static function createSchoolView()
    {
        require_once('./includes/view/school.php');
    }

}
?>