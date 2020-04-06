<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/form', function () {
    afficheForm();
})->name('form');

$app->get('/variable/:id', function ($id) {
    etLesPartiesVariables($id);
})->name('var');

$app->get('/affiche', function () {
    $slim = \Slim\Slim::getInstance();
    $nom = $slim->request->get()['nom'];
    repForm($nom);
})->name('repform');

function afficheForm() {
    global $app;
    $act = $app->urlFor('repform');
    $act2 = $app->urlFor('var', ['id' => 5]);
    echo <<< YOP
        <form method="get" action="$act">
           Nom :
           <input type="text" name="nom" />
           <input type="submit" name="Go go go !" />
        </form>
        <form method="get" action="$act2">
           <input type="submit" name="Go go go !" />
        </form>
YOP;
}

function repForm($n) {
    echo $n;
}

function etLesPartiesVariables($n) {
    echo $n;
}

$app->run();