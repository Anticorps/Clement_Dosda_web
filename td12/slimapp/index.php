<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use slimapp\models\Item;
use slimapp\models\Liste;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$app = new \Slim\Slim();
$l = Liste::get();
$app->get('/', function(){
    foreach ($l as $liste){
        echo "\n<p>" . $liste->titre . '</p>';
    }
});
$app->get('/listes', function(){
    foreach (Liste::get() as $liste){
        echo "\n<p><strong>" . $liste->titre . '</strong></p>';
    }
});
$app->get('/listes/:id', function($id){
    $liste = Liste::getId($id);
    echo "\n<p><strong>" . $liste->titre . '</strong></p>';
    foreach($liste->items() as $item){
        echo "\n<p>" . $item->nom . '</p>';
    }
});
$app->get('/items/:id', function($id){
    $item = Item::getId($id);
    echo "\n<p><strong>" . $item->nom . '</strong></p>';
    echo "\n<p>" . $item->descr . '</p>';
});

$app->run();