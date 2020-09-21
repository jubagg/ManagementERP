<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'mgclitipdoc';
    protected $primarykey = 'tdid';
    public $timestamps = false;

    public function querydoc(){
        return $this->where('tdid',  '>=', 80)->get();
    }
    public static function tipDoc(){
        $menus = new TipoDocumento();
        $data = $menus->querydoc();
        return $data;
    }


}
