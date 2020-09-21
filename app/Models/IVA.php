<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IVA extends Model
{
    protected $table = 'mgartivacat';
    protected $primaryKey = 'icid';
    public $timestamps = false;

    public static function getAll(){
        $datos = IVA::All();
        return $datos;
    }
}
