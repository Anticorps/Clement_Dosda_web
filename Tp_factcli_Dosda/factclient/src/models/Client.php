<?php

namespace factcli\models;

require_once 'vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;


class Client extends Model {

    protected $table = 'client';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    //Retourne les factures d'un client
    public function factures() : Object {
        return $this->hasMany('\factcli\models\Facture', 'client_id')->get();
    }

    /**
     * Return Client a partir de son id
     */ 
    public static function getId(int $id) : Client {
        return Client::where('id', '=', $id)->first();
    }
}
    