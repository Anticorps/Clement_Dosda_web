<?php

/**
 * Script d'affichage
 * @author lsteinmetz
 */

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use factcli\models\Client;
use factcli\models\Facture;
use factcli\models\Outils;

// test du paramètre GET
if (isset($_GET['client'])){

    // initialisation de la bdd
    $db = new DB();
    $db->addConnection(parse_ini_file('src/conf/conf.ini'));
    $db->setAsGlobal();
    $db->bootEloquent();
    
    // Si l'id n'es pas dans la BDD catch
    try{

        // affichage propre au client
        $client = Client::getId($_GET['client']);
        $factures = $client->factures();

        Outils::headerHTML('Factures');

        echo "<h1>Factures de : {$client['nomcli']}</h1>";

        // teste l'existence de facture pour le client
        if (isset($factures[0])) {

            // affiche les facture du client
            $li = '';
            foreach($factures as $facture){
                $li= $li . "<li>{$facture['datefact']} - {$facture['montant']} €";
            }
            echo "<ul>".$li."</ul>";

        // si aucune facture associée au client
        } else {
            echo "<p>Aucune facture</p>";
        }

    // informe l'utilisateur que le client n'est pas dans la BDD
    } catch (TypeError $e){
        echo "\t<p>Le client n'as pas été trouvé</p>";
    }
} else {
    echo "\t<p>Mauvais paramètre</p>";
}

Outils::footerHTML();