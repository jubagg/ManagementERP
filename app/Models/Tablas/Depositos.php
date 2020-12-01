<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depositos extends Model
{
    protected $table = 'mgdeposito';
    protected $primaryKey = 'depid';
    public $timestamps = false;
}
