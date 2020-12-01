<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcasEmisores extends Model
{
    protected $table = 'mgcemmarca';
    protected $primaryKey = 'marid';
    public $timestamps = false;
    private $array = [];
    protected $guarded = [];
}
