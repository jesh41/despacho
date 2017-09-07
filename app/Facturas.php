<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table = 'facturas';

    public function sucursal()
    {
        return $this->hasOne('App\CatalogoSucursal','id','sucursal_id');
    }

    public function estado()
    {
        return $this->hasOne('App\CatEstadoFactura','CodEstado','CodValidoFact');
    }



}
