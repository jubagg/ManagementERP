<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'mgcliprov';
    protected $primarykey = 'prid';
    public $timestamps = false;

    public function queryprov(){
        return $this->All();
    }

    public static function getProvincias(){
        $selec = new Provincia();
        $data = $selec -> queryprov();
        return $data;
    }
}
