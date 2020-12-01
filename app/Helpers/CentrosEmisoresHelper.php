<?php

namespace App\Helpers;

use App\CentrosEmisores;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CentrosEmisoresHelper{

    public static function getAll(){
        $cem = CentrosEmisores::All();
        return $cem;
    }

}
