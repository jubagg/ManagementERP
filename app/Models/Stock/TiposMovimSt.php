<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Model;

class TiposMovimSt extends Model
{
    protected $table = 'mgtipmovstk';
    protected $primarykey = 'movid';
    public $timestamps = false;

    public static function getAll(){
        $mov = TiposMovimSt::All();
        return $mov;
    }
}
