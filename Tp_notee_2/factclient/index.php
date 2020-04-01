<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\models\Client;
use factcli\models\Outils;

//Connexion a la BDD
$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

Outils::headerHTML('factcli');

$client = Client::get();

$liste='';
foreach($client as $cli){
     $liste = $liste . '\r <OPTION value='.$cli->id.'>' . $cli->nomcli .'</OPTION>';
	}

echo '<form method="GET" action="affiche_factures.php">
        <label for="client-select">Acceder au factures de : </label>
        <SELECT name="client" id="client-select"> '.
	    $liste
    	.
    	'</SELECT>
    	<input type="submit" value="Valider"/>
    	</form>';

   Outils::footerHTML();


// configurations de slim et des routes
$app = new \Slim\Slim();
$app->get('/', function(){ Client(); });
$app->get('/Client', function(){ Client(); });
$app->run();

