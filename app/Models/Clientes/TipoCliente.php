<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $table = 'mgclitipcli';
    protected $primarykey = 'tcid';
    public $timestamps = false;

    public function querytipocliente(){
        return $this->All();
    }

    public static function getTipoCliente(){
        $selec = new TipoCliente();
        $data = $selec -> querytipocliente();
        return $data;
    }
}
