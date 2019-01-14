<?php
Route::set('', function () {
    Controller::createView();

});

Route::set('index', function () {
    Controller::createView();

});

Route::set('index.php', function () {
    Controller::createView();

});

Route::set('categorie', function () {
    Controller::createCategorieView();
});

Route::set('about', function () {
    Controller::createAboutView();
});
