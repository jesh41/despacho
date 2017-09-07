<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consulta = DB::connection('sqlsrv')->select('select FechaFactura,NoFactura,NombreClientePreFac,CodSucursal,CodValidoFact from Inventario.Facturas
where (CONVERT(DATE,FechaFactura) BETWEEN \'20170907\' AND \'20170907\')order by NoFactura desc');
        return view('home', ['es' => $consulta]);

     //   return view('home');
    }
}
