<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventascon extends Model
{

    protected $table = 'mgcliconven';
    protected $primarykey = 'cvid';
    public $timestamps = false;

    public function queryventas(){
        return $this->All();
    }

    public static function getVentas(){
        $selec = new Ventascon();
        $data = $selec -> queryventas();
        return $data;
    }
}

