<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'mgroles';
    protected $primaryKey = 'rid';
    public $timestamps = false;


    public function users(){
        return $this->belongTo('App\User','role',  'rid');
    }
}


