<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturas;

class DespachoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function historial()
    {
        $fa=Facturas::where('estado_id',2)->get();

        //orderbyDesc('Fecha')->get();
        return view('Despacho.historial', ['es' => $fa]);

    }


}
