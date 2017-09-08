<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatEstadoDespacho extends Model
{
    protected $fillable = [
        'estado',
    ];
    protected $table = 'CatEstDespacho';
}
