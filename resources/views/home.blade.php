@extends('layouts.dash')

@section('content')

    <section class="container" id="contenido_principal">

        <div class="col-md-8 col-md-offset-2">

            <div class="box-header">

                <h4 class="box-title">Facturas</h4>
                <div class="margin" id="botones_control">
                    <a href="{{ url("carga") }}" class="btn btn-xs btn-primary">Actualizar</a>
                  <!--  <a href="{{ url("/listado_usuarios") }}"  class="btn btn-xs btn-primary" >Listado Usuarios</a>-->
                    <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(2);">Vacio</a>
                    <a href="javascript:void(0);" class="btn btn-xs btn-primary" onclick="cargar_formulario(3);" >Vacio</a>
                </div>


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
                            <th>Accion</th>


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
                                <td> <a id="modal-672003" href="#modal-container-672003" role="button" class="btn" data-toggle="modal">TeS</a></td>

                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>



        </div>
    </section>





@endsection
