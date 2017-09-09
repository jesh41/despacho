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
    public function formdespacho($id)
    {
        $f=Facturas::find($id);
        return view("message.notificar-despacho")->with("f",$f);
    }

    public function despachar(Request $request)
    {
        $des = Facturas::find($request->input("id_factura"));
        $des->estado_id=2;
        if ($des->save())
        {
            $notificacion = [
                'message' => 'FACTURA DESPACHADA',
                'alert-type' => 'success',
            ];
        }
        else{
            $notificacion = [
                'message' => 'OCURRIO UN PROBLEMA',
                'alert-type' => 'error',
            ];
        }


        return back()->with($notificacion);
    }


}
