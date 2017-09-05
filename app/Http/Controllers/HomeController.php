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
      /**  $estado = DB::connection('sqlsrv')->select('select * from Inventario.CatEstadoFactura');
        return view('home', ['es' => $estado]);
       * **/
        return view('home');
    }
}
