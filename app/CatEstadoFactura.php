<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatEstadoFactura extends Model
{
    protected $fillable = [
        'DesEstado',
    ];
    protected $table = 'CatEstadoFact';
}
