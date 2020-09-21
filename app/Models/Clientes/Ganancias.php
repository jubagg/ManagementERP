<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ganancias extends Model
{
    protected $table = 'mgclicatgan';
    protected $primarykey = 'cgid';
    public $timestamps = false;

    public function queryganancias(){
        return $this->All();
    }

    public static function getGanancias(){
        $selec = new Ganancias();
        $data = $selec -> queryganancias();
        return $data;
    }
}

