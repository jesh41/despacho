@extends('layouts.dash')
@section('pageTitle','Facturas Entregadas')
@section('content')

    <nav class="navbar navbar-transparent navbar-absolute"> <!-- Barra de navegación con funciones de menu -->
        <div class="container-fluid"> <!--Contenedor ajustado de la Navbar-->
            <div class="navbar-header"> <!--Barra de Navegacion Responsive Izquierda-->
                <button type="button" class="navbar-toggle" data-toggle="collapse"> <!--Boton para descubrir la sidebar-->
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> <!--Cierre de Boton para descubrir la sidebar-->
                <a class="navbar-brand" href="{{ url('/catempleado') }}">FACTURAS DESPACHADAS</a>
            </div> <!-- Cierre de Barra de Navegacion Responsive Izquierda-->

            <div class="collapse navbar-collapse"> <!--Menu para cierre de sesión-->
                <ul class="nav navbar-nav navbar-right"> <!--Lista para agregar mas opciones en dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul><!-- Cierre Lista para agregar mas opciones en dropdown-->


            </div> <!--Cierre de Menu para cierre de sesión-->

        </div> <!--Cierre de Contenedor ajustado de la Navbar-->

    </nav> <!--Cierre de Barra de navegación con funciones de menu-->




    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="red" >
                            <a href="#" ><h5>LISTADO DE FACTURAS DESPACHADAS</h5></a>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active table-responsive">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                        <thead role="row" class="odd">
                                        <tr>
                                            <th>Factura</th>
                                            <th>Fecha Factura</th>
                                            <th>Nombre</th>
                                            <th>Fecha Entregado</th>
                                            <th>Sucursal</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($es))
                                        @foreach($es as $fact)
                                            <tr role="row" class="odd">
                                                <td align="center">{{ $fact->Factura }}</td>
                                                <td> {{  Carbon\Carbon::parse($fact->Fecha)->format('d-M-y g:i A')}}</td>
                                                <td>{{ $fact->Nombre}}</td>
                                                <td>{{ Carbon\Carbon::parse($fact->updated_at)->format('d-M-y g:i A') }}</td>

                                                <td>{{ $fact->sucursal->nombre}}</td>
                                                <td>{{ $fact->despacho->estado}}</td>
                                            </tr>
                                        @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <section class="container" id="contenido_principal">

        <div class="col-md-8 col-md-offset-2">

            <div >

                <div class="table-responsive">



                </div>
            </div>



        </div>
    </section>






@endsection