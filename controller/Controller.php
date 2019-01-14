<?php
/**
 * Created by PhpStorm.
 * User: wael
 * Date: 03/12/18
 * Time: 09:17
 */

class Controller {

    public static function createView() {

        require_once('./view/indexView.php');
    }
    public static function createCategorieView() {

        require_once('./view/categorie.php');
    }

    public static function createAboutView()
    {
        require_once('./view/about.php');
    }

}
?>