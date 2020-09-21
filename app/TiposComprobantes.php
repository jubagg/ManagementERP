<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposComprobantes extends Model
{
    protected $table = 'mgtipcom';
    protected $primaryKey = 'autoid';
    public $timestamps = false;
}
