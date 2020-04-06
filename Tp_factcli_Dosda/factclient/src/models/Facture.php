<?php

namespace factcli\models;

require_once 'vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;

class facture extends Model {

    protected $table = 'facture';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    // Retourne les factures d'un client 
    public function client(){
    	return $this->belongsTo('\factclient\models\facture','client_id')->first(); 
    }
}

    