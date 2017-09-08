<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table = 'facturas';
    protected  $primaryKey = 'Factura';

    public function sucursal()
    {
        return $this->hasOne('App\CatalogoSucursal','id','sucursal_id');
    }

    public function estado()
    {
        return $this->hasOne('App\CatEstadoFactura','CodEstado','CodValidoFact');
    }
    public function despacho()
    {
        return $this->hasOne('App\CatEstadoDespacho','id','estado_id');
    }


}
