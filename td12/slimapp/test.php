<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use slimapp\models\Item;
use slimapp\models\Liste;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$wichlists = Liste::get();
foreach($wichlists as $list){
    echo '<p>' . $list->titre . '</p>';
}

echo '<br>* * * * * * * * * *<br>';

$items = Item::get();
foreach($items as $item){
    echo '<p>' . $item->nom . '</p>';
    //Question 2
    echo '<p>' . $item->liste()->first()->titre . '</p>' ;
}

echo '<br>* * * * * * * * * *<br>';

if (isset($_GET['id'])){
    $itemId = Item::where('id', '=', $_GET['id'])->first();
    echo "<p> $itemId->id : $itemId->nom </p>";
}

echo '<br>* * * * * * * * * *<br>';

/*$nouvelItem = new Item();
$nouvelItem->nom = 'Item test';
$nouvelItem->liste_id = 1;
$nouvelItem->save();
$queryNouvelItem = $itemId = Item::where('nom', '=', 'Item test')->first();
echo "<p> $queryNouvelItem->id : $queryNouvelItem->nom </p>";*/
echo '<br>* * * * * * * * * *<br>';
//question 2

if (isset($_GET['lid'])){
    $listeId = Liste::where('no', '=',$_GET['lid'])->first();
    echo '<p>' . $listeId->titre . '</p>';
    echo '<p> --- Items --- </p>';
    foreach($listeId->items() as $item){
    	echo '<p>' . $item['nom'] . '</p>';
	}
}