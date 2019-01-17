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

Route::set('maternelle', function () {
    Controller::createCategorieView("maternelle");
});

Route::set('primaire', function () {
    Controller::createCategorieView("primaire");
});

Route::set('moyen', function () {
    Controller::createCategorieView("moyen");
});

Route::set('secondaire', function () {
    Controller::createCategorieView("secondaire");
});

Route::set('formation-professionnelle', function () {
    Controller::createCategorieView("formation-professionnelle");
});

Route::set('universitaire', function () {
    Controller::createCategorieView("universitaire");
});

Route::set('about', function () {
    Controller::createAboutView();
});
