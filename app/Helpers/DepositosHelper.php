<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Depositos;

class DepositosHelper{

    public static function getDepositos(){
        $depositos = Depositos::All();
        return $depositos;
    }

}
