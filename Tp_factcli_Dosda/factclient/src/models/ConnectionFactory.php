<?php

namespace factcli\models;

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

class ConnectionFactory{

	public static function connection($src){
		//Connexion a la BDD
		$db = new DB();
		$db->addConnection(parse_ini_file($src));
		$db->setAsGlobal();
		$db->bootEloquent();
	}
}