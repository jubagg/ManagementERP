<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IIBB extends Model
{
    protected $table = 'mgcliiibb';
    protected $primarykey = 'ibid';
    public $timestamps = false;

    public function queryiibb(){
        return $this->All();
    }

    public static function getIIBB(){
        $selec = new IIBB();
        $data = $selec -> queryiibb();
        return $data;
    }
}
