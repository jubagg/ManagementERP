<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    protected $table = 'mgcajas';
    public $timestamps = false;
    protected  $primaryKey = 'cajid';
}
