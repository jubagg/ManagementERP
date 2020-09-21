<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zonas extends Model
{
    protected $table = 'mgclizon';
    protected $primarykey = 'zid';
    public $timestamps = false;

    public function queryzon(){
        return $this->All();
    }
    public static function getZonas(){
        $menus = new Zonas();
        $data = $menus->queryzon();
        return $data;
    }
}
