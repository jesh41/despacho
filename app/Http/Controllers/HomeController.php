<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Facturas;
use app\CatEstadoFactura;
use App\CatalogoSucursal;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;


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

        $fa=Facturas::wheredate('Fecha', '=',Carbon::now()->format('Y-m-d'))->orderbyDesc('Fecha')->get();
      return view('home', ['es' => $fa]);

    }

    public function carga()
    {
        $hoy = date("Ymd");
       $contador=0;
        $consulta = DB::connection('sqlsrv')->select("select FechaFactura,NoFactura,NombreClientePreFac,CodSucursal,CodValidoFact from Inventario.Facturas
where (CONVERT(DATE,FechaFactura) BETWEEN '$hoy' AND '$hoy')order by NoFactura desc");

foreach ($consulta as $c)
    {
        $count = Facturas::where('Factura', $c->NoFactura)->count();
        $copia = Facturas::find( $c->NoFactura);
        // $copia = Facturas::where('Factura', $c->NoFactura);
        if ($copia!=null)
        {
            if (strcmp( $copia->CodValidoFact,$c->CodValidoFact)!== 0)
            {
                $copia->CodValidoFact=$c->CodValidoFact;
                $copia->save();
            }
        }
        if ($count<1)
        {
                 $f =new Facturas;
                $f->Factura=$c->NoFactura;
                $f->Fecha=$c->FechaFactura;
               $f->Nombre=$c->NombreClientePreFac;
                $f->sucursal_id=$c->CodSucursal;
                $f->CodValidoFact=$c->CodValidoFact;
                $f->save();
              $contador=$contador+1;
        }

    }
        if ($contador>=1)
       {
            $c2=(string) $contador;
           $mensaje="Se actualizaron $c2";

           $notificacion = [
                'message' => $mensaje,
                'alert-type' => 'success',
            ];
        }
        else
        {
            $notificacion = [
                'message' => 'Esta Actualizado',
                'alert-type' => 'success',
            ];
        }
        return back()->with($notificacion);

    }


}
