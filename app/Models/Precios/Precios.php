<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precios extends Model
{
    protected $table = 'mgstkcab';
    protected $primaryKey = 'stkid';
    public $timestamps = false;
}