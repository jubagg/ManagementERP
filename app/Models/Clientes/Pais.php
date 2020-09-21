<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
        protected $table = 'mgclipais';
        protected $primarykey = 'pid';
        public $timestamps = false;

        public function querypais(){
            return $this->All();
        }

        public static function getPais(){
            $selec = new Pais();
            $data = $selec -> querypais();
            return $data;
        }
}
