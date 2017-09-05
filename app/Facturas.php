<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table = 'factura';

    public function sucursal()
    {
        return $this->hasOne('App\CatalogoSucursal','id','sucursal_id');
    }

}
