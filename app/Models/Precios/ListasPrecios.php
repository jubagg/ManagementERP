<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListasPrecios extends Model
{
    protected $table = 'mglistaprecios';
    protected $primaryKey = 'lpid';
    public $timestamps = false;
}
