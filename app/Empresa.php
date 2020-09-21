<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'mgempre';
    protected $primaryKey = 'empid';
    public $timestamps = false;
}
