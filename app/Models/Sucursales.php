<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'mgclisuc';
    protected $primarykey = 'sid';
    public $timestamps = false;

    public function querysuc(){
        return $this->All();
    }

    public static function getSucursal(){
        $selec = new Sucursales();
        $data = $selec -> querysuc();
        return $data;
    }
}
