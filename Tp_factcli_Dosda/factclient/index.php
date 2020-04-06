<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\models\Client;
use factcli\models\Outils;
use factcli\models\ConnectionFactory;


ConnectionFactory::connection('src/conf/conf.ini');


// configurations de slim et des routes
$app = new \Slim\Slim();
$app->get('/', function(){ home(); })->name("home");

$app->get('/client',function(){
    $slim = \Slim\Slim::getInstance();
    $id = $slim->request->get()['client'];
    affiche_facture($id);
})->name("fact");



function home(){

    global $app;
    $affiche_facture = $app->urlfor("fact");
    Outils::headerHTML('Home');

    $client = Client::get();

    //Création de la liste des clients
    $liste='';
    foreach($client as $cli){
         $liste = $liste . '\r <OPTION value='.$cli->id.'>' . $cli->nomcli .'</OPTION>';
    }

    //affichage de la liste deroulante des clients
    echo "<form method='GET' action='$affiche_facture'>
        <label for='cli'>Acceder aux factures de : </label>
        <SELECT name='client' id='cli'> ".
        $liste
        .
        "</SELECT>
        <input type='submit' value='Valider'/>
        </form>";

   Outils::footerHTML();

}

function affiche_facture($id){

    try{

        //recupération du client
        $client = Client::getId($id);
        $factures = $client->factures();

        Outils::headerHTML('Factures');

        echo "Client : ".$client->nomcli;

        // teste l'existence de facture pour le client
        if (isset($factures[0])) {

            //Création de la liste des factures du client 
            $li = '';
            foreach($factures as $fact){
                $li= $li . "<li>". $fact->datefact . " : " . $fact->montant." €";
            }
            //affichage de la liste des factures
            echo "<ul>".$li."</ul>";

        // si le client n'as pas de factures 
        } else {
            echo "<p>aucune facture trouvée pour ce client</p>";
        }

    // informe l'utilisateur que le client n'est pas dans la BDD
    } catch (Error $e){
        echo "\t<p>Client non présent dans la base..</p>";
    }

    Outils::footerHTML();


}

$app->run();