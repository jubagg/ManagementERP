<?php

namespace App\Helpers;

use App\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class RolesHelper{


    public static function getAll(){
        $roles = Roles::All();
        return $roles;
    }

}
