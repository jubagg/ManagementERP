<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ListasPrecios extends Model
{
    protected $table = 'mglistaprecios';
    protected $primaryKey = 'lpid';
    public $timestamps = false;

    public static function getLista($id){
        $lista = DB::select("select * from mglistaprecios where lpsuc = $id");
        return $lista;
    }
}
