<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'mgclilocalidad';
    protected $primarykey = 'lid';
    public $timestamps = false;

    public function queryloc(){
        return $this->All();
    }

    public static function getLocalidades(){
        $selec = new Localidad();
        $data = $selec -> queryloc();
        return $data;
    }
}
