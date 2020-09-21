<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IVAResponsable extends Model
{
    protected $table = 'mgclicatres';
    protected $primarykey = 'crid';
    public $timestamps = false;

    public function queryiva(){
        return $this->All();
    }

    public static function getIVA(){
        $selec = new IVAResponsable();
        $data = $selec -> queryiva();
        return $data;
    }
}
