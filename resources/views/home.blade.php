@extends('layouts.dash')

@section('content')

    <section class="container" id="contenido_principal">

        <div class="col-md-8 col-md-offset-2">

            <div class="box-header">


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

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($es as $fact)
                            <tr role="row" class="odd">
                                <td> {{ $fact->FechaFactura}}  </td>
                                <td>{{ $fact->NoFactura }}</td>
                                <td>{{ $fact->NombreClientePreFac  }}</td>
                                <td>{{ $fact->CodSucursal }}</td>

                                <td> {{ $fact->CodValidoFact }}   </td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>






        </div>
    </section>





@endsection
