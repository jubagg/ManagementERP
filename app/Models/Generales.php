<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generales extends Model
{

    protected $table = 'mgpages';
    protected $primarykey = 'id';
    public $timestamps = false;

    public function optionsPages(){
        return $this->all()->toArray();
    }
    public static function paginas(){
        $data = new Generales();
        $pages = $data->optionsPages();
        $pagesAll = [];
        foreach($pages as $p){
            $pagesParcial = array($p['pname'] =>($p));
            $pagesAll = array_merge($pagesAll,$pagesParcial);
        }

        return $pagesAll;
    }

}
