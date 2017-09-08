@extends('layouts.dash')

@section('content')
    <section class="container" id="contenido_principal">

        <div class="col-md-8 col-md-offset-2">

            <div class="box-header">

                <h4 class="box-title">LISTADO DE FACTURAS DESPACHADAS</h4>



            </div>


            <div class="box-body box-white">

                <div class="table-responsive">

                    <table class="table table-hover table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Fecha Fac</th>
                            <th>Factura</th>
                            <th>Nombre</th>
                            <th>Sucursal</th>
                            <th>Estado</th>
                            <th>Despacho</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($es as $fact)
                            <tr role="row" class="odd">
                                <td> {{ $fact->Fecha}}</td>
                                <td>{{ $fact->Factura }}</td>
                                <td>{{ $fact->Nombre}}</td>
                                <td>{{ $fact->sucursal->nombre}}</td>
                                <td>{{ $fact->estado->DesEstado}}</td>
                                <td>{{ $fact->despacho->estado}}</td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>



        </div>
    </section>






@endsection