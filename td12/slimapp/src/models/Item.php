<?php

namespace slimapp\models;

require_once 'vendor/autoload.php';

use \Illuminate\Database\Eloquent\Model;

class Item extends Model {

    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public function liste(){
    	return $this->belongsTo('\slimapp\models\liste','liste_id')->get(); 

	}

}

