<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturas;
use App\User;
use Auth;

class DespachoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$fa=Facturas::wheredate('Fecha', '=',Carbon::now()->format('Y-m-d'))->orderbyDesc('Fecha')->paginate(10);
       $fa=null;
        $user=User::find(Auth::user()->id);
        if ($user->hasRole('Administrator')){
            $fa=Facturas::where('estado_id','=',1)->where('CodValidoFact','=','A')->orderbyDesc('Fecha')->get();
            }
        if ($user->hasRole('BodCM')){
            $fa=Facturas::where('estado_id','=',1)->where('sucursal_id', '=', 1)->where('CodValidoFact','=','A')->orderbyDesc('Fecha')->get();
        }
        if ($user->hasRole('BodSD')){
            $fa=Facturas::where('estado_id','=',1)->where('sucursal_id', '=', 2)->where('CodValidoFact','=','A')->orderbyDesc('Fecha')->get();
        }
        if ($user->hasRole('BodTC')){
            $fa=Facturas::where('estado_id','=',1)->where('sucursal_id', '=', 3)->where('CodValidoFact','=','A')->orderbyDesc('Fecha')->get();
        }
        return view('home', ['es' => $fa]);
    }

    public function historial()
    {
       $fa=null;
        $user=User::find(Auth::user()->id);
        if ($user->hasRole('Administrator')){
            $fa=Facturas::select(['Fecha','Factura','Nombre','sucursal_id','CodValidoFact','estado_id'])->where('estado_id','=',2)->orderbyDesc('Fecha')->get();
        }
        if ($user->hasRole('BodCM')){
            $fa=Facturas::select(['Fecha','Factura','Nombre','sucursal_id','CodValidoFact','estado_id'])->where('estado_id','=',2)->where('sucursal_id', '=', 1)->orderbyDesc('Fecha')->get();
        }
        if ($user->hasRole('BodSD')){
            $fa=Facturas::select(['Fecha','Factura','Nombre','sucursal_id','CodValidoFact','estado_id'])->where('estado_id','=',2)->where('sucursal_id', '=', 2)->orderbyDesc('Fecha')->get();
        }
        if ($user->hasRole('BodTC')){
            $fa=Facturas::select(['Fecha','Factura','Nombre','sucursal_id','CodValidoFact','estado_id'])->where('estado_id','=',2)->where('sucursal_id', '=', 3)->orderbyDesc('Fecha')->get();
        }
        //orderbyDesc('Fecha')->get();
        return view('Despacho.historial', ['es' => $fa]);
    }

    public function formdespacho($id)
    {
        $f=Facturas::find($id);
        return view("message.notificar-despacho")->with("f",$f);
    }

    public function despachar(Request $request)
    {
        $des = Facturas::find($request->input("id_factura"));
        if ($des->estado_id==1)
        {
            $des->estado_id=2;
            $notificacion = [
                'message' => 'FACTURA DESPACHADA',
                'alert-type' => 'success',
            ];
        }
        elseif ($des->estado_id==2)
        {
            $notificacion = [
                'message' => 'FACTURA YA FUE DESPACHADA',
                'alert-type' => 'warning',
            ];
        }
        $des->save();


        return back()->with($notificacion);
    }


}
